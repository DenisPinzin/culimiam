<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use App\Repository\TyperepasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RecettesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recettes')]
    public function index(Request $request, RecetteRepository $recetteRepository, TyperepasRepository $typerepasRepository): Response
    {   
        // récupère ?mine=1 dans l'URL
        $mine = $request->query->getBoolean('mine');

        // récupère ?type=1, ?type=2, etc.
        $typeId = $request->query->get('type');

        // si "mes recettes" est demandé, on prend l'utilisateur connecté, sinon null = pas de filtre utilisateur
        $user = $mine ? $this->getUser() : null;

        // récupère les recettes filtrées
        $recettes = $recetteRepository->findFiltered(
            $user,
            $typeId ? (int) $typeId : null
        );

        // récupère tous les types pour le select
        $typesRepas = $typerepasRepository->findAll();

        return $this->render('recettes/index.html.twig', [
            'recettes' => $recettes,
            'typesRepas' => $typesRepas,
            'mine' => $mine,
            'selectedType' => $typeId,
        ]);
    }
}
