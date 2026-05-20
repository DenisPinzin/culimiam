<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RecetteRepository $recetteRepository): Response
    {

        $lastRecipe = $recetteRepository->findBy (
            [],                 
            ['id' => 'DESC'],   
            3 
        );
        return $this->render('home/index.html.twig', [
            'lastRecipe' => $lastRecipe,
        ]);
    }
}
