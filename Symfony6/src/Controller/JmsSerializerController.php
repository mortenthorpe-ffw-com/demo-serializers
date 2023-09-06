<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JmsSerializerController extends AbstractController
{
    #[Route('/jms/serializer', name: 'app_jms_serializer')]
    public function index(): Response
    {
        return $this->render('jms_serializer/index.html.twig', [
            'controller_name' => 'JmsSerializerController',
        ]);
    }
}
