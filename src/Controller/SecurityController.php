<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\RateLimiter\RateLimiterFactory;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        //Sécuriser si deja connecté
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/inscription', name: 'app_register')]
    public function register(Request $request,UserPasswordHasherInterface $passwordEncoder,EntityManagerInterface $entityManager,AuthenticationUtils $authenticationUtils,RateLimiterFactory $registrationLimiter): Response
    {   

        //Sécuriser si deja connecté
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // Vérification si l'objet existe via l'injection de dependance
        // Si injection de dependance = On est en Modification
        // Sinon, on est un Creation et on créé l'objet
    
        $user = new User;
      

        // Récupération du formulaire et association avec l'objet
        $form = $this->createForm(UserType::class,$user);

        // Récupération des données POST du formulaire
        $form->handleRequest($request);

        //A la soumission du formulaire 
        if ($form->isSubmitted()) {
            //Crée un compteur associé à son ip
            $limit = $registrationLimiter
                //IP (Créer ou le récupérer)
                ->create($request->getClientIp())
                //Enleve une tentative
                ->consume();
            //si la limite est dépassée
            if (!$limit->isAccepted()) {
                //message
                $this->addFlash('danger', 'Trop de tentatives d’inscription. Réessayez plus tard.');
                //Renvoie le sur la page d'insciption sans l'authentification
                return $this->redirectToRoute('app_register');
            }
        }

        // Vérification si le formulaire est soumis et Valide
        if($form->isSubmitted() && $form->isValid()){
            $user->setRoles(['ROLE_USER']);
            $user->setPassword(
                $passwordEncoder->hashPassword($user,$form->get('password')->getData())
            );
            // Persistance des données
            $entityManager->persist($user);
            // Envoi en BDD
            $entityManager->flush();

            // Redirection de l'utilisateur
            return $this->redirectToRoute('app_home');
        }
        return $this->render('security/register.html.twig', [
          'userForm' => $form->createView(), //envoie du formulaire en VUE
        ]);
        
    }
}
