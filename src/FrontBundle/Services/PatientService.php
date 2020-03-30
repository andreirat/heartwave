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
 * Class PatientService
 * @package FrontBundle\Services
 */
class PatientService
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

    public function getPatientHistoryMeasurements($req){
        $response['status'] = 400;
        $response['data'] = 'Bad request';
        if($req != null){
            $data = [];
            $response['data'] = [];
            $response['status'] = 400;
            /** @var User $user */
            $user = $this->container->get('hw.users')->getUserFromToken();
            if($user != null){
                if ($this->container->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
                    $hm = $this->em->createQueryBuilder()
                        ->from('FrontBundle:PatientMeasurements','m')
                        ->select('m')
                        ->where('m.pacientid =:p')
                        ->setParameter('p', $req['patient']-1)
                        ->orderBy('m.measurementTimestamp','DESC')
                        ->getQuery()
                        ->getArrayResult();
                    if(!empty($hm)){
                        $data = $hm;
                    }
                    $response['data'] = $data;
                    $response['status'] = 200;
                }else if ($this->container->get('security.authorization_checker')->isGranted('ROLE_DOCTOR')){
                    $hm = $this->em->createQueryBuilder()
                        ->from('FrontBundle:PatientMeasurements','m')
                        ->select('m')
                        ->where('m.pacientid =:p')
                        ->setParameter('p', $req['patient']-1)
                        ->getQuery()
                        ->getArrayResult();
                    if(!empty($hm)){
                        $data = $hm;
                    }
                    $response['data'] = $data;
                    $response['status'] = 200;
                }
            }
        }
        return $response;
    }

    public function getLiveStats(){
        $data = [];
        $response['data'] = [];
        $response['status'] = 400;
        /** @var User $user */
        $user = $this->container->get('hw.users')->getUserFromToken();
        if($user != null){
            if ($this->container->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
                $hospital = $user->getHospital();
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
            }else if ($this->container->get('security.authorization_checker')->isGranted('ROLE_DOCTOR')){
                $doctor = $user->getDoctor();
                $patients = $this->em->createQueryBuilder()
                    ->from('FrontBundle:Patient','p')
                    ->select('p')
                    ->leftJoin('p.doctor','d')
                    ->where('d.id =:doctor')
                    ->setParameter('doctor', $doctor)
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