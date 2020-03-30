<?php
namespace FrontBundle\Services;

use Doctrine\ORM\EntityManager;
use FrontBundle\Entity\Doctor;
use FrontBundle\Entity\Hospital;
use FrontBundle\Entity\Patient;
use FrontBundle\Entity\User;
use LogicException;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Class UserService
 * @package FrontBundle\Services
 */
class UserService
{
    private $em;
    private $container;
    /**
     * initialize service components
     * @param EntityManager $em
     * @param Container $container
     */
    public function __construct(Container $container, EntityManager $em)
    {
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * Return current user
     * @return mixed|void
     */
    public function getUserFromToken()
    {
        if (!$this->container->has('security.token_storage')) {
            throw new LogicException('The SecurityBundle is not registered in your application.');
        }
        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return;
        }
        if (!is_object($user = $token->getUser())) {
            return;
        }
        return $user;
    }


    public function addPatient($firstName, $lastName, $age, $lat, $long,$address, $city, $county, $country, $details=null){
        $patient = new Patient();
        $patient->setFirstName($firstName)
            ->setLastName($lastName)
            ->setAge($age)
            ->setAddress($address)
            ->setLatitude($lat)
            ->setLongitude($long)
            ->setCity($city)
            ->setCounty($county)
            ->setCountry($country)
            ->setDetails($details);
        $this->em->persist($patient);
        $this->em->flush();


        return $patient;

    }

    public function addHospital($name, $address, $city, $region, $country, $capacity, $details = null, $lat, $long){
        $hospital = new Hospital();
        $hospital->setName($name)
            ->setAddress($address)
            ->setCity($city)
            ->setRegion($region)
            ->setLatitude($lat)
            ->setLongitude($long)
            ->setCountry($country)
            ->setDetails($details)
            ->setCapacity($capacity);
        $this->em->persist($hospital);
        $this->em->flush();
        return $hospital;
    }

    public function addDoctor($firstName, $lastName, $age, $address, $city, $county, $country, $details=null, $speciality){
        $doctor = new Doctor();
        $doctor->setFirstName($firstName)
            ->setLastName($lastName)
            ->setAge($age)
            ->setAddress($address)
            ->setCity($city)
            ->setCounty($county)
            ->setCountry($country)
            ->setDetails($details)
            ->setSpeciality($speciality);
        $this->em->persist($doctor);
        $this->em->flush();
        return $doctor;
    }

    public function getUserInfo(){
        $data = [];
       $response['data'] = [];
       $response['status'] = 400;
        /** @var User $user */
        $user = $this->container->get('hw.users')->getUserFromToken();
        if($user != null){
            if ($this->container->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
               $data = [
                   'type' => 'hospital',
                   'email' => $user->getEmail(),
                   'name' => $user->getHospital()->getName(),
                   'address' => $user->getHospital()->getAddress(),
                   'city' => $user->getHospital()->getCity(),
                   'county' => $user->getHospital()->getRegion(),
                   'country' => $user->getHospital()->getCountry(),
                   'capacity' => $user->getHospital()->getCapacity(),
                   'details' => $user->getHospital()->getDetails(),
                   'latitude' => $user->getHospital()->getLatitude(),
                   'longitude' => $user->getHospital()->getLongitude()
               ];
                $response['data'] = $data;
                $response['status'] = 200;
            }else  if ($this->container->get('security.authorization_checker')->isGranted('ROLE_DOCTOR')) {
                $data = [
                    'type' => 'doctor',
                    'email' => $user->getEmail(),
                    'first_name' => $user->getDoctor()->getFirstName(),
                    'last_name' => $user->getDoctor()->getLastName(),
                    'address' => $user->getDoctor()->getAddress(),
                    'city' => $user->getDoctor()->getCity(),
                    'county' => $user->getDoctor()->getCounty(),
                    'country' => $user->getDoctor()->getCountry(),
                    'details' => $user->getDoctor()->getDetails(),
                    'specialisation' => $user->getDoctor()->getSpeciality()
                ];
                $response['data'] = $data;
                $response['status'] = 200;
            }else if($this->container->get('security.authorization_checker')->isGranted('ROLE_PATIENT')){
                $data = [
                    'type' => 'patient',
                    'email' => $user->getEmail(),
                    'first_name' => $user->getPatient()->getFirstName(),
                    'last_name' => $user->getPatient()->getLastName(),
                    'address' => $user->getPatient()->getAddress(),
                    'city' => $user->getPatient()->getCity(),
                    'county' => $user->getPatient()->getCounty(),
                    'country' => $user->getPatient()->getCountry(),
                    'details' => $user->getPatient()->getDetails(),
                    'latitude' => $user->getHospital()->getLatitude(),
                    'longitude' => $user->getHospital()->getLongitude()
                ];
                $response['data'] = $data;
                $response['status'] = 200;
            }
        }
        return $response;
    }

}