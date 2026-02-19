<?php

namespace App\Controller;

use App\Form\ResetPasswordFormType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Uid\Uuid;

final class ResetPasswordController extends AbstractController
{
    #[Route('/reset/password', name: 'app_forgot_password')]
    public function request(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class); //Creation du formulaire
        $form->handleRequest($request); //Récupération de la requête

        if ($form->isSubmitted() && $form->isValid()) {

            $email = $form->get('email')->getData(); //Récupération du champ email dans une variable
            $user = $userRepository->findOneBy(['email' => $email]); //Requete DQL pour récuperé l'objet utilisateur associé

            if ($user) {
                $token = Uuid::v4()->toRfc4122(); //Uuid - Universally Unique Identifier permet de créer un Token unique
                $user->setResetToken($token); //On stocke le token dans l'objet user
                $user->setResetTokenExpiresAt((new DateTime())->modify('+1 hour'));
                //On stocke la date d'expiration du token dans l'objet user
                $entityManager->flush();

                $resetLink = $this->generateUrl('app_reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
                //Création du lien intégrant le token
                $email = (new Email()) //création du mail
                    ->from('no-reply@yourdomain.com')
                    ->to($user->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->text("Voici votre lien de réinitialisation : $resetLink");
                //Intégration du lien dans le mail
                $mailer->send($email);
                //Envois du mail
                $this->addFlash('success', 'Un email de réinitialisation a été envoyé.');

                return $this->redirectToRoute('app_login');
            }

            $this->addFlash('error', 'Aucun utilisateur trouvé pour cet email.');
        }

        return $this->render('reset_password/request.html.twig', [
            'requestForm' => $form->createView(),
        ]);
    }

    #[Route('/reset/password/reset', name: 'app_reset_password')]
    public function reset(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $token = $request->query->get('token');

        if (!$token) {
            throw $this->createNotFoundException('Token manquant');
        }

        $user = $userRepository->findOneBy(['resetToken' => $token]);

        if (!$user || !$user->isResetTokenValid()) {
            throw $this->createNotFoundException('Token invalide ou expiré');
        }

        $form = $this->createForm(ResetPasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newPassword = $form->get('password')->getData();

            $user->setPassword(
                $passwordHasher->hashPassword($user, $newPassword)
            );

            $user->setResetToken(null);
            $user->setResetTokenExpiresAt(null);

            $entityManager->flush();

            $this->addFlash('success', 'Mot de passe modifié avec succès');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form->createView(),
        ]);
    }

}
