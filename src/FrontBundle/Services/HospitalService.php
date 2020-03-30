<?php
namespace FrontBundle\Services;

use Doctrine\ORM\EntityManager;
use FrontBundle\Entity\Doctor;
use FrontBundle\Entity\Hospital;
use FrontBundle\Entity\Patient;
use FrontBundle\Entity\User;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Class HospitalService
 * @package FrontBundle\Services
 */
class HospitalService
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

    public function getStats(){
        $response['data'] = [];
        $response['status'] = 400;
        /** @var User $user */
        $user = $this->container->get('hw.users')->getUserFromToken();
        $hospital = $user->getHospital();
        if($user != null){
            if ($this->container->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
                $qb = $this->em->createQueryBuilder()
                    ->from('FrontBundle:Doctor','d')
                    ->select('d')
                    ->leftJoin('d.hospital','h')
                    ->where('h.id =:hospital')
                    ->setParameter('hospital', $hospital)
                    ->getQuery()
                    ->getArrayResult();

                $qb1 = $this->em->createQueryBuilder()
                    ->from('FrontBundle:Patient','p')
                    ->select('p')
                    ->leftJoin('p.hospital','h')
                    ->where('h.id =:hospital')
                    ->setParameter('hospital', $hospital)
                    ->getQuery()
                    ->getArrayResult();
                $doctors = count($qb);
                $patients = count($qb1);

                $response['data'] = [
                    'doctors' => $doctors,
                    'patients' => $patients
                ];
                $response['status'] = 200;
            }
        }
        return $response;
    }

    public function getDoctors(){
        $data = [];
        $response['data'] = [];
        $response['status'] = 400;
        /** @var User $user */
        $user = $this->container->get('hw.users')->getUserFromToken();
        if($user != null){
            if ($this->container->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
                $hospital = $user->getHospital();

                $doctors = $this->em->createQueryBuilder()
                   ->from('FrontBundle:Doctor','d')
                   ->select('d')
                   ->leftJoin('d.hospital','h')
                   ->where('h.id =:hospital')
                   ->setParameter('hospital', $hospital)
                   ->getQuery()
                   ->getArrayResult();
                if(!empty($doctors)){
                    $data = $doctors;
                }
                $response['data'] = $data;
                $response['status'] = 200;
            }
        }
        return $response;
    }

    public function getPatients(){
        $data = [];
        $response['data'] = [];
        $response['status'] = 400;
        /** @var User $user */
        $user = $this->container->get('hw.users')->getUserFromToken();
        $hospital = $user->getHospital();
        if($user != null){
            if ($this->container->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
                $patients = $this->em->createQueryBuilder()
                    ->from('FrontBundle:Patient','p')
                    ->select('p')
                    ->leftJoin('p.hospital','h')
                    ->where('h.id =:hospital')
                    ->setParameter('hospital', $hospital)
                    ->getQuery()
                    ->getArrayResult();
                if(!empty($patients)){
                    $data = $patients;
                }
                $response['data'] = $data;
                $response['status'] = 200;
            }
        }
        return $response;
    }

}