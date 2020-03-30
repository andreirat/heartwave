<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AlertsController extends Controller
{
    /**
     * Function to reproduce heart alert
     * @return JsonResponse
     */
    public function heartAction()
    {
        /** @var Patient $patient */
        $patient = $this->get('doctrine.orm.default_entity_manager')
            ->getRepository('FrontBundle:Patient')->findOneBy(['id'=> 1]);
        $data = [
            'heart_rate' => 176,
            'type' => 'Aritmic',
            'max_pressure'=> 198,
            'low_pressure' => 88,
            'pressure_disease' => 'Hypertension',
            'name' => $patient->getFirstName().' '.$patient->getLastName(),
            'age' => $patient->getAge(),
            'longitude' => $patient->getLongitude(),
            'latitude' => $patient->getLatitude()
        ];
        return new JsonResponse($data, 200);
    }

    /**
     * Function to reproduce second alert
     * @return JsonResponse
     */
    public function secondAction()
    {
        $data = [

        ];
        return new JsonResponse($data, 200);
    }

    public function demoAction(Request $request){

    }
}
