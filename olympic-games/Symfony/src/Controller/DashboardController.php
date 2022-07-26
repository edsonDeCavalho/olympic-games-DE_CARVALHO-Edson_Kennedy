<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Sport;
use App\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
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
        return $this->render('dashboard/index.html.twig', [
            'form_title' => 'Ajout de catégorie',
            'form_categorie'=>$formCategorie->createView(),
        ]);
    }
}
