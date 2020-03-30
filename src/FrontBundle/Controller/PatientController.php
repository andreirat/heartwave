<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PatientController extends Controller
{
    public function statsAction()
    {
        $response = $this->get('hw.patient')->getLiveStats();
        return new JsonResponse($response['data'], $response['status']);
    }

    public function historyAction(Request $request){
        $data = json_decode($request->getContent(), true);
        $response = $this->get('hw.patient')->getPatientHistoryMeasurements($data);
        return new JsonResponse($response['data'], $response['status']);
    }
}
