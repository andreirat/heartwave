<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class HospitalController extends Controller
{
//    public function dashboardAction()
//    {
//        $response = $this->get('hw.hospital')->getStats();
//        return new JsonResponse($response['data'],$response['status']);
//    }
//    public function getDashboardDataAction(){
//        $response = $this->get('hw.hospital')->getStats();
//        return new JsonResponse($response['data'],$response['status']);
//    }
    public function getDoctorsAction()
    {
        $st = $this->get('hw.hospital')->getStats();
        $response = $this->get('hw.hospital')->getDoctors();
        $data['stats'] = $st['data'];
        $data['doctors'] = $response['data'];
        return new JsonResponse($data,$response['status']);
    }
    public function doctorsAction()
    {
        return $this->render('FrontBundle:dashboards/doctors:list.html.twig');
    }
    public function nursesAction()
    {
        return $this->render('FrontBundle:dashboards/nurses:list.html.twig');
    }
    public function patientsAction()
    {
        return $this->render('FrontBundle:dashboards/patients:list.html.twig');
    }

}
