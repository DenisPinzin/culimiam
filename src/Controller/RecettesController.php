<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RecettesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recettes')]
    public function index(RecetteRepository $recetteRepository): Response
    {   
        $recettes = $recetteRepository->findAll();

        return $this->render('recettes/index.html.twig', [
            'recettes' => $recettes,
        ]);
    }
}
