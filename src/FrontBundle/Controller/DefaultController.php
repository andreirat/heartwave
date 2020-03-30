<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $dashboard = '';
        if ($this->get('hw.users')->getUserFromToken() != null) {
            if ($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
                return $this->redirectToRoute('admin_homepage');
            } else{
                if ($this->get('security.authorization_checker')->isGranted('ROLE_PATIENT')) {
                    $dashboard = 'patient';
                } else if ($this->get('security.authorization_checker')->isGranted('ROLE_HOSPITAL')) {
                   $dashboard = 'hospital';
                }else if($this->get('security.authorization_checker')->isGranted('ROLE_DOCTOR')){
                    $dashboard = 'doctor';
                }
                return $this->render('FrontBundle:dashboards:'.$dashboard.'.html.twig');
            }
        } else{
            return $this->render('@Front/Default/index.html.twig');
        }
    }

    public function mapAction()
    {
        return $this->render('FrontBundle:dashboards:map.html.twig');
    }
}
