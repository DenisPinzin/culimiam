<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Form\ResetPasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ResetPasswordController extends AbstractController
{
    #[Route('/reset/password', name: 'app_forgot_password')]
    public function request(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();

            $user = $userRepository->findOneBy([
                'email' => $email,
            ]);

           if (!$user) {
                dd('Aucun utilisateur trouvé avec cet email');
            }

            $token = bin2hex(random_bytes(32));

            $user->setResetToken($token);
            $user->setResetTokenExpiresAt(new \DateTime('+1 hour'));

            $entityManager->persist($user);
            $entityManager->flush();

            dd(
                $user->getResetToken(),
                $user->getResetTokenExpiresAt()
            );
        }


        return $this->render('reset_password/request.html.twig', [
            'requestForm' => $form->createView(),
        ]);
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function reset(string $token, Request $request): Response
    {
        $form = $this->createForm(ResetPasswordFormType::class);

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form->createView(),
        ]);
    }
}
