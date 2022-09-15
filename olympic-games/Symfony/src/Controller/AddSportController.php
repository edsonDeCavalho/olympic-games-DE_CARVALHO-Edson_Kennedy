<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddSportController extends AbstractController
{
    #[Route('/add/sport', name: 'app_add_sport')]
    public function index(): Response
    {
        return $this->render('add_sport/index.html.twig', [
            'controller_name' => 'AddSportController',
        ]);
    }
}
