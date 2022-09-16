<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SportdetailsController extends AbstractController
{
    #[Route('/sportdetails', name: 'app_sportdetails')]
    public function index(): Response
    {
        return $this->render('sportdetails/index.html.twig', [
            'controller_name' => 'SportdetailsController',
        ]);
    }
}
