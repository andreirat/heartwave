<?php
namespace FrontBundle\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use FrontBundle\Entity\User;
class AppCreateUsersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('create:users')
            ->setDescription('Create default data.')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->createUser('admin@heartwave.com','admin','admin','ROLE_SUPER_ADMIN');
        $this->createUser('buncker@heartwave.com','BunckerHill','hospital','ROLE_HOSPITAL');
        $this->createUser('johannadowe@yahoo.com','johannadowe','doctor','ROLE_DOCTOR');
        $this->createUser('andreirat@ymail.com','andreirat','patient','ROLE_PATIENT');
        $this->createUser('cristian@yahoo.com','cristian','patient','ROLE_PATIENT');
        $this->createUser('johndowe@yahoo.com','john','patient','ROLE_PATIENT');
        $output->writeln('Data loaded.');
    }

    public function createUser($email, $username, $password, $role){
        $service = $this->getContainer()->get('hw.users');
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $user = new User();
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setRoles([$role]);
        $user->setEnabled(true);
        $user->setRegisterDate(new \DateTime());
        /** @var UserPasswordEncoder $encoder */
        $encoder = $this->getContainer()->get('security.password_encoder');
        $password = $encoder->encodePassword($user, $password);
        $user->setPassword($password);
        if($role == 'ROLE_PATIENT'){
            $hospitalTest = $em->getRepository('FrontBundle:Hospital')->findOneBy(['id'=> 1]);
            $doctorTest = $em->getRepository('FrontBundle:Doctor')->findOneBy(['id'=> 1]);
            $patient = null;
            if($username == 'andreirat'){
                $patient = $service->addPatient('Andrei', 'Rat', 23, '46.778821','23.586847', 'Strada Observatorului','Cluj Napoca', 'Cluj', 'Romania');
            }else if($username == 'cristian'){
                $patient = $service->addPatient('Cristian', 'Dow', 25, '46.779812','23.574412','Strada Mihai Eminescu','Cluj Napoca', 'Cluj', 'Romania');
            }else if($username == 'john'){
                $patient = $service->addPatient('John', 'Dow', 56, '46.772488','23.627480','Bd Avram Iancu 34','Cluj Napoca', 'Cluj', 'Romania');
            }
            $patient->addHospital($hospitalTest);
            $hospitalTest->addPatient($patient);
            $patient->addDoctor($doctorTest);
            $doctorTest->addPatient($patient);
            $patient->setUser($user);
            $user->setPatient($patient);
            $em->persist($patient);
        }else if($role == 'ROLE_HOSPITAL'){
            $h = $service->addHospital('CJH','Strada Republicii 23', 'Cluj Napoca', 'Cluj', 'Romania' , 420,
                'The most modern city in county.','46.752606','23.558030');
            $h->setUser($user);
            $user->setHospital($h);
            $em->persist($h);
        }else if($role == 'ROLE_DOCTOR'){
            $hospitalTest = $em->getRepository('FrontBundle:Hospital')->findOneBy(['id'=> 1]);
            $doctor = $service->addDoctor('Johanna', 'Dow', '45', 'Strada 1 Decembrie 1989', 'Cluj Napoca','Cluj',
                'Romania','Best medic in hospital','General Practice');
            $doctor->addHospital($hospitalTest);
            $hospitalTest->addDoctor($doctor);
            $doctor->setUser($user);
            $user->setDoctor($doctor);
            $em->persist($doctor);
        }
        $em->persist($user);
        $em->flush();
    }
}