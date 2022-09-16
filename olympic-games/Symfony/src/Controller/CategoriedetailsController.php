<?php

namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriedetailsController extends AbstractController
{
    #[Route('/categoriedetails', name: 'app_categoriedetails')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {



        if (isset($_GET['p'])) {
            $id=$_GET['p'];
            switch($id){
                case "1":
                    $image='https://wallpaperaccess.com/full/6430919.jpg';
                break;
                case "2":
                    $image='https://cdn.create.vista.com/api/media/medium/316716134/stock-photo-wooden-tennis-racket-balls-background?token=';
                break;
                case "3":
                    $image='https://images4.alphacoders.com/293/thumb-1920-293324.jpg';
                break;
                default :
                    $image='https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2447&q=80';
                    break;
            }
            $categorie=$entityManager->getRepository(Categorie::class)->find($id);
            $sports=$categorie->getSports();


            for ($i=0;$i<count($sports);$i++) {
                $listOfSportsToSend[0][$i] = $sports[$i]->getNom();
                $listOfSportsToSend[1][$i] = $sports[$i]->getId();
            }
            $nbDeSports=count($sports);
        }else{
            echo "error paramettre pas trouvée";
        }

        

        return $this->render('categoriedetails/index.html.twig', [
            'controller_name' => 'CategoriedetailsController',
            'listOfSportsToSend' => $listOfSportsToSend,
            'image' => $image,
            'nomCategorie' => $id,
            'nbDeSports' => $nbDeSports-1,

        ]);
    }
}
