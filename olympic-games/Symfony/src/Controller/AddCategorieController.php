<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class AddCategorieController extends AbstractController
{
    #[Route('/addCategorie', name: 'app_add_categorie')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorie = new Categorie();
        $formCategorie = $this->createForm(CategorieType::class);
        $formCategorie->handleRequest($request);

        if($formCategorie->isSubmitted() && $formCategorie->isValid())
        {
            $categorie->setNom($formCategorie->get('Nom')->getData());
            $entityManager->persist($categorie);
            $entityManager->flush();
            echo "Categorie ajouté avec sucsses";
        }
        return $this->render('add_categorie/index.html.twig', [
            'form_title' => 'Ajout de catégorie',
            'form_categorie'=>$formCategorie->createView(),
        ]);
    }
}
