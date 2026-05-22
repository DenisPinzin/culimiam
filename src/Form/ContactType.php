<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Votre pseudo',
            'attr' => [
                'placeholder' => 'Entrez votre pseudo',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Le pseudo est obligatoire',
                ]),
                new Length([
                    'min' => 2,
                    'max' => 50,
                    'minMessage' => 'Le pseudo doit contenir au moins {{ limit }} caractères',
                    'maxMessage' => 'Le pseudo ne peut pas dépasser {{ limit }} caractères',
                ]),
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => [
                'placeholder' => 'Entrez votre email',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'L email est obligatoire',
                ]),

                new Length([
                    'min' => 5,
                    'max' => 180,

                    'minMessage' => 'L email doit contenir au moins {{ limit }} caractères',
                    'maxMessage' => 'L email ne peut pas dépasser {{ limit }} caractères',
                ]),
            ],
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Message',
                'attr' => [
                'placeholder' => 'Votre message...',
            ],

            'constraints' => [
                new NotBlank([
                    'message' => 'Le message est obligatoire',
                ]),

                new Length([
                    'min' => 10,
                    'max' => 1000,

                    'minMessage' => 'Le message doit contenir au moins {{ limit }} caractères',
                    'maxMessage' => 'Le message ne peut pas dépasser {{ limit }} caractères',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
