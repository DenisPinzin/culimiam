<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RecettesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recettes')]
    public function index( RecetteRepository $repository): Response
    {
        $recettes = $repository->findall();
        return $this->render('recettes/index.html.twig', [
            'controller_name' => 'RecettesController',
            'recettes' => $recettes,
        ]);
    }
}
