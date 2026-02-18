<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AddrecetteController extends AbstractController
{
    #[Route('/addrecette/{id}', name: 'modify_recette')]
    #[Route('/addrecette', name: 'add_recette')]
    public function index(?Recette $recette, Request $request, EntityManagerInterface $entityManager): Response
    {

        // Vérification si l'objet existe via l'injection de dependance
        // Si injection de dependance = On est en Modification
        // Sinon, on est un Creation et on créé l'objet
        if(!$recette){
            $recette = new Recette;
        }

        // Récupération du formulaire et association avec l'objet
        $form = $this->createForm(RecetteType::class,$recette);

        // Récupération des données POST du formulaire
        $form->handleRequest($request);

        // Vérification si le formulaire est soumis et Valide
        if($form->isSubmitted() && $form->isValid()){

            // Rempli le champ recette-ID, cette carte est lié avec son créateur
            $recette->setUser($this->getUser());
            // Persistance des données
            $entityManager->persist($recette);
            // Envoi en BDD
            $entityManager->flush();

            // Redirection de l'utilisateur
            return $this->redirectToRoute('app_recettes');
        }




        return $this->render('addrecette/index.html.twig', [
            'recetteForm' => $form->createView(), //envoie du formulaire en VUE
            'isModification' => $recette->getId() !== null //Envoie d'un variable pour définir si on est en Modif ou Créa
        ]);
    }

    #[Route('/recette/remove/{id}', name: 'delete_recette')]
    public function remove(Recette $recette, Request $request, EntityManagerInterface $entityManager)
    {
        if($this->isCsrfTokenValid('SUP'.$recette->getId(),$request->get('_token'))){
            $entityManager->remove($recette);
            $entityManager->flush();
            $this->addFlash('success','La suppression à été effectuée');
            return $this->redirectToRoute('app_recettes');
        }
    }
}
