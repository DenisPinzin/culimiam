<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    $builder

        ->add('pseudo', TextType::class, [
            'attr' => [
                'placeholder' => 'Votre pseudo',
            ],
            'constraints' => [

                new NotBlank([
                    'message' => 'Le pseudo est obligatoire',
                ]),

                new Length([
                    'min' => 3,
                    'max' => 20,

                    'minMessage' => 'Le pseudo doit contenir au moins {{ limit }} caractères',
                    'maxMessage' => 'Le pseudo ne peut pas dépasser {{ limit }} caractères',
                ]),

                new Regex([
                    'pattern' => '/^[a-zA-Z0-9_]+$/',
                    'message' => 'Le pseudo ne peut contenir que des lettres, chiffres et underscores',
                ]),
            ],
        ])

        ->add('email', EmailType::class, [
            'attr' => [
                'placeholder' => 'Votre email',
            ],
            'constraints' => [

                new NotBlank([
                    'message' => 'L’email est obligatoire',
                ]),

                new Email([
                    'message' => 'L’email n’est pas valide',
                ]),

                new Length([
                    'max' => 180,

                    'maxMessage' => 'L’email ne peut pas dépasser {{ limit }} caractères',
                ]),
            ],
        ])

        ->add('password', RepeatedType::class, [

            'type' => PasswordType::class,

            'invalid_message' => 'Les mots de passe doivent correspondre.',

            'required' => true,

            'first_options' => [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Mot de passe',
                ],
            ],

            'second_options' => [
                'label' => 'Confirmer le mot de passe',
                'attr' => [
                    'placeholder' => 'Confirmation du mot de passe',
                ],
            ],

            'constraints' => [

                new NotBlank([
                    'message' => 'Le mot de passe est obligatoire',
                ]),

                new Length([
                    'min' => 6,
                    'max' => 20,

                    'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères',
                    'maxMessage' => 'Le mot de passe ne peut pas dépasser {{ limit }} caractères',
                ]),

                new Regex([
                    'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).+$/',

                    'message' => 'Le mot de passe doit contenir une majuscule, une minuscule et un caractère spécial',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
