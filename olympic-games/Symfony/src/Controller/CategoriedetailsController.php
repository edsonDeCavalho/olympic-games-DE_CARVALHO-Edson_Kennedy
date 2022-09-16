<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriedetailsController extends AbstractController
{
    #[Route('/categoriedetails', name: 'app_categoriedetails')]
    public function index(): Response
    {
        return $this->render('categoriedetails/index.html.twig', [
            'controller_name' => 'CategoriedetailsController',
        ]);
    }
}
