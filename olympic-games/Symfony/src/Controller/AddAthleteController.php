<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAthleteController extends AbstractController
{
    #[Route('/add/athlete', name: 'app_add_athlete')]
    public function index(): Response
    {
        return $this->render('add_athlete/index.html.twig', [
            'controller_name' => 'AddAthleteController',
        ]);
    }
}
