<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function infoAction()
    {
        $response = $us = $this->get('hw.users')->getUserInfo();
        return new JsonResponse($response['data'], $response['status']);
    }
}
