<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\RateLimiter\RateLimiterFactory;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer, RateLimiterFactory $contactLimiter): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            $limit = $contactLimiter
                ->create($request->getClientIp())
                ->consume();

            if (!$limit->isAccepted()) {
                $this->addFlash('danger', 'Trop de tentatives. Réessayez plus tard.');
                return $this->redirectToRoute('app_contact');
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData(); // récupération des champs de formulaire

            $email = (new Email())
                ->from($data['email'])
                ->to('contact@culimiam.sc5duyo5958')
                ->subject('Nouveau message de contact')
                ->text(
                    "Email: {$data['email']}\n\n".
                    "Message: {$data['message']}\n"
                );
                $mailer->send($email);

                $this->addFlash('success', 'Votre message a bien été envoyé.');

                return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
