<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(RecetteRepository $recetterepository): Response
    {
        $lastcard = $recetterepository->findBy(
            [],                 
            ['id' => 'DESC'],   
            6                   
        );

        return $this->render('accueil/index.html.twig', [
            'lastcard' => $lastcard,
            'controller_name' => 'AccueilController',
        ]);
    }
}
