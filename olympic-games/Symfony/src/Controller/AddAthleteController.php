<?php

namespace App\Controller;

use App\Entity\Athletes;
use App\Entity\Categorie;
use App\Entity\Sport;
use App\Form\AthleteFormType;
use App\Form\SportFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAthleteController extends AbstractController
{
    #[Route('/addAthlete', name: 'app_add_athlete')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $athlete = new Athletes();
        $formAthlestes = $this->createForm(AthleteFormType::class);
        $formAthlestes->handleRequest($request);

        if($formAthlestes->isSubmitted() && $formAthlestes->isValid())
        {
            $athlete->setNom($formAthlestes->get('Nom')->getData());
            $athlete->setPrenom($formAthlestes->get('Prenom')->getData());
            $athlete->setPays($formAthlestes->get('Pays')->getData());


            if (isset($_POST['sport'])) {
                $id=$_POST['sport'];
            }else{
                $id=1;
            }

            $sport = $entityManager->getRepository(Sport::class)->find($id);
            $athlete->setSport($sport);

            $entityManager->persist($athlete);
            $entityManager->flush();
            echo "Sport ajouté avec sucsses";

        }

        return $this->render('add_athlete/index.html.twig', [
            'form_title' => 'Ajout de un Athlete',
            'form_athlete'=>$formAthlestes->createView(),
        ]);
    }
}
