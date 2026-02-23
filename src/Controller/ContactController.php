<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new Email())
                ->from('contact@culimiam.sc5duyo5958.universe.wf')
                ->to('contact@culimiam.sc5duyo5958.universe.wf')
                ->subject('FORMULAIRE ' . date('H:i:s'))
                ->text(
                    "Nom: {$data['name']}\n".
                    "Email: {$data['email']}\n".
                    "Message:\n{$data['message']}\n"
                );
             $mailer->send($email);
             $this->addFlash('success', 'Message envoyé!');
             return $this->redirectToRoute('app_contact');
        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
