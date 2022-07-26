<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Entity\Sport;
use App\Form\SportFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddSportController extends AbstractController
{
    #[Route('/addSport', name: 'app_add_sport')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sport = new Sport();
        $formSport = $this->createForm(SportFormType::class);
        $formSport->handleRequest($request);

        /*Liste de Sports*/
        $listOfSports=$entityManager->getRepository(Sport::class)->findAll();

        for ($i=0;$i<count($listOfSports);$i++) {
            $listOfSportToSend[0][$i] = $listOfSports[$i]->getNom();
            $listOfSportToSend[1][$i] = $listOfSports[$i]->getId();
        }
        $nBSports=count($listOfSports);
        if($formSport->isSubmitted() && $formSport->isValid())
        {
            $sport->setNom($formSport->get('Nom')->getData());
            $sport->setDescription($formSport->get('Description')->getData());
            $sport->setLieu($formSport->get('Lieu')->getData());
            $sport->setTypeDeSport($formSport->get('TypeDeSport')->getData());
            $sport->setCategorie($formSport->get('categorie')->getData());

            $listOfCategories=$entityManager->getRepository(Categorie::class)->findAll();
            $nbCategories=count($listOfCategories);


            //echo $formSport->get('categirie')->getData();
            if (isset($_POST['categirie'])) {
                $id=$_POST['categirie'];
            }else{
                $id=1;
            }

            $categorie = $entityManager->getRepository(Categorie::class)->find($id);
            $sport->setCategirie($categorie);


            $entityManager->persist($sport);
            $entityManager->flush();
            echo "Sport ajouté avec sucsses";

        }
        return $this->render('add_sport/index.html.twig', [
            'form_title' => 'Ajout de Sport',
            'list_of_sport' => $listOfSportToSend,
            'nBSports' => $nBSports-1,
            'form_sport'=>$formSport->createView(),
        ]);
    }
}
