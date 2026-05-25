<?php

namespace App\Controller;

use Symfony\Component\Uid\Uuid;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Mailer\MailerInterface;
use App\Repository\UserRepository;
use App\Form\ResetPasswordFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ResetPasswordRequestFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\RateLimiter\RateLimiterFactory;


final class ResetPasswordController extends AbstractController
{
    #[Route('/reset/password', name: 'app_forgot_password')]
    public function request(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, MailerInterface $mailer, RateLimiterFactory $forgotPasswordLimiter): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class); // Creation du formulaire
        $form->handleRequest($request); // recuperation de la requête

        if ($form->isSubmitted()) {
            $limit = $forgotPasswordLimiter
                ->create($request->getClientIp())
                ->consume();

            if (!$limit->isAccepted()) {
                $this->addFlash('danger', 'Trop de demandes. Réessayez plus tard.');
                return $this->redirectToRoute('app_forgot_password');
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData(); // recuperation du champ email dans une variable

            $user = $userRepository->findOneBy(['email' => $email]); //requete DQL pour récupéré l'objet utilisateur associé

            if ($user) {
                $token = Uuid::v4()->toRfc4122(); //Universal Unique Identifier va créer le token unique

                $user->setResetToken($token); // on stocke le token dan l'objet user
                $user->setResetTokenExpiresAt(new \DateTime('+1 hour')); 
                // on stocke la date d'expiration du token dans l'objet user

                $entityManager->persist($user);
                $entityManager->flush();

                $resetLink = $this->generateUrl('app_reset_password', ['token' => $token,], UrlGeneratorInterface::ABSOLUTE_URL);
                // creation du lien integrant le token

                $email = (new Email())
                    ->from('noreply@yourdomain.com')
                    ->to($user->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->text("Voici votre lien de réinitialisation : $resetLink");

                $mailer->send($email); // envoie du mail

                $this->addFlash('success', 'Un email de réinitialisation a été envoyé.');

                return $this->redirectToRoute('app_forgot_password');
                }

                $this->addFlash('error', 'Aucun utilisateur trouvé pour cet email');

            }


            return $this->render('reset_password/request.html.twig', [
                'requestForm' => $form->createView(),
            ]);
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function reset(string $token, Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $userRepository->findOneBy(['resetToken' => $token,]); 
        //requete DQL pour récupérer l'objet User associé au token

        if (!$user || !$user->isResetTokenValid()) {
            // verification si l'objet User n'a pas été trouvé ou que le token est pas valide (via la méthode créé dans le User)
            $this->addFlash('danger', 'Le lien de réinitialisation est invalide ou expiré.');
            return $this->redirectToRoute('app_forgot_password');
        }

        $form = $this->createForm(ResetPasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // création d'un nouveau mot de passe
            $password = $form->get('plainPassword')->getData();
            $hashedPassword = $passwordHasher->hashPassword($user, $password);
            $user->setPassword($hashedPassword);

            //réinitialisation des propriété resetToken et tokenExpireAt de l'objet User
            $user->setResetToken(null);
            $user->setResetTokenExpiresAt(null);

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre mot de passe a été modifié.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form->createView(),
        ]);
    }
}
