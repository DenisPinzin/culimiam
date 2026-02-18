<?php

namespace App\Controller;

use App\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DetailController extends AbstractController
{
    #[Route('/detail/{id}', name: 'app_detail')]
    public function index(Recette $recette): Response
    {
        return $this->render('detail/index.html.twig', [
            'recette' => $recette,
        ]);
    }
}
