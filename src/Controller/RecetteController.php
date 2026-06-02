<?php

namespace App\Controller;

use App\Entity\Dosage;
use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\RateLimiter\RateLimiterFactory;

final class RecetteController extends AbstractController
{   
    //CREATION, MODIFICATION
    #[Route('/recetteform/{id}', name: 'modify_recette')]
    #[Route('/recetteform', name: 'app_recette')]
    public function index(?Recette $recette, Request $request, EntityManagerInterface $entityManager, IngredientRepository $ingredientRepository, RateLimiterFactory $recipeCreationLimiter): Response
    {   
    
        // Vérification si l'objet existe via l'injection de dependance
        // Si injection de dependance = On est en Modification
        // Sinon, on est un Creation et on créé l'objet
        if(!$recette){
            $recette = new Recette;
        }

        // si la recette existe et qu'elle n'appartient pas au user connecté
        if ($recette->getId() && $recette->getUser() !== $this->getUser()) {

            // interdit l'accès
            throw $this->createAccessDeniedException();
        }

        // Récupération du formulaire et association avec l'objet
        $form = $this->createForm(RecetteType::class,$recette);

        // Récupération des données POST du formulaire
        $form->handleRequest($request);

        // Vérification si le formulaire est soumis et Valide
        if($form->isSubmitted() && $form->isValid()){
            
            if (!$recette->getId()) {
                    $limit = $recipeCreationLimiter
                    ->create($this->getUser()->getUserIdentifier())
                    ->consume();

                if (!$limit->isAccepted()) {
                    $this->addFlash('danger', 'Vous avez atteint la limite de créations de recettes. Réessayez plus tard.');
                    return $this->redirectToRoute('app_recettes');
                }

                $recette->setUser($this->getUser());
            }

            foreach ($recette->getDosages()->toArray() as $oldDosage) {
                $entityManager->remove($oldDosage);
            }
            // exécute les opérations en attente et enregistre les modifications en base de données
            $entityManager->flush();
            // récupère tous les identifiants des ingrédients envoyés par le formulaire
            $ingredients = $request->request->all('ingredients');
            // récupère les quantités associées à chaque ingrédient
            $dosages = $request->request->all('dosages');
            
            foreach ($ingredients as $ingredientId) {
                $ingredient = $ingredientRepository->find($ingredientId);
                if ($ingredient && isset($dosages[$ingredientId]) && $dosages[$ingredientId] !== '') {
                    $dosage = new Dosage();
                    $dosage->setRecette($recette);
                    $dosage->setIngredient($ingredient);
                    $dosage->setDosage((int) $dosages[$ingredientId]);
                    $entityManager->persist($dosage);
                }
            }

            // Persistance des données
            $entityManager->persist($recette);
            // Envoi en BDD
            $entityManager->flush();
            // Redirection de l'utilisateur
            return $this->redirectToRoute('app_recettes');
        }

        return $this->render('recetteform/index.html.twig', [
            'recetteForm' => $form->createView(), //envoie du formulaire en VUE
            'isModification' => $recette->getId() !== null, //Envoie d'une variable pour définir si on est en Modif ou Créa
            'recette' => $recette, // contient l'objet Recette complet afin de pouvoir récupérer ses données dans la vue
        ]);
    }

    //ENVOIE EN VUE DANS LE TWIG SHOW
    #[Route('/recette/{id}', name: 'show_recette')]
    public function show(Recette $recette): Response
    {
        return $this->render('show/index.html.twig', [
            'recette' => $recette,
        ]);
    }

    //SUPPRESSION
    #[Route('/recette/remove/{id}', name: 'delete_recette')]
    public function remove(Recette $recette, Request $request, EntityManagerInterface $entityManager)
    {   
        // si la recette n'appartient pas au user connecté
        if ($recette->getUser() !== $this->getUser()) {

            // interdit l'accès
            throw $this->createAccessDeniedException();
        }
        
        if($this->isCsrfTokenValid('SUP'.$recette->getId(),$request->get('_token'))){
            $entityManager->remove($recette);
            $entityManager->flush();
            $this->addFlash('success','La suppression à été effectuée');
            return $this->redirectToRoute('app_home');

        }
    }

    //RECHERCHE D'INGREDIENT
    #[Route('/ingredient/search', name: 'ingredient_search')]
    public function searchIngredient( Request $request, IngredientRepository $ingredientRepository): JsonResponse 
    {
        // récupération de ce que tape l'utilisateur dans l'input depuis JS
        $query = $request->query->get('q', '');
        // appel de la méthode du repository
        $ingredients = $ingredientRepository->searchByName($query);
        // tableau qui sera envoyé en JSON
        $data = [];
        // transformation des objets ingredient en tableau JSON
        foreach ($ingredients as $ingredient) {
            $data[] = [
                'id' => $ingredient->getId(),
                'nom' => $ingredient->getNom(),
                'mesure' => $ingredient->getMesure(),
            ];
        }
        // retour JSON vers JavaScript
        return $this->json($data);
    }
}
