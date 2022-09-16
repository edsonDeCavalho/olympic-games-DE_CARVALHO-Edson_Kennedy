<?php

namespace App\Controller;


use App\Entity\Categorie;
use App\Entity\Sport;
use App\Repository\SportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SportdetailsController extends AbstractController
{
    #[Route('/sportdetails', name: 'app_sportdetails')]
    public function index( EntityManagerInterface $entityManager): Response
    {

        if(isset($_GET["p"])){
           $id=$_GET["p"];
           $sport=$entityManager->getRepository(Sport::class)->find($id);
        }
        return $this->render('sportdetails/index.html.twig', [
            'controller_name' => 'SportdetailsController',
            'description' => $sport->getDescription(),
            'nom' => $sport->getNom(),
            'liu' => $sport->getLieu(),
            'typeDeSport' => $sport->getTypeDeSport(),
        ]);
    }
}
