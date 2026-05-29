<?php

namespace App\Form;

use App\Entity\Recette;
use App\Entity\Typerepas;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'placeholder' => 'Crêpes maison faciles',
                ],

                'constraints' => [
                    new NotBlank([
                        'message' => 'Le titre est obligatoire',
                    ]),
                    new Length([
                        'min' => 3,
                        'max' => 60,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères',
                    ])
                ],  
            ])

            ->add('nombrepersonne', IntegerType::class, [
                'attr' => [
                    'placeholder' => '4',
                    'min' => 1,
                    'max' => 25,
                ],


                'constraints' => [
                    new Range([
                        'min' => 1,
                        'max' => 25,
                        'notInRangeMessage' => 'Le nombre de personnes doit être entre {{ min }} et {{ max }}',
                    ]),
                ],
            ])

            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Délicieuses crêpes maison à ma façon!',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description est obligatoire',
                    ]),
                    new Length([
                        'min' => 5,
                        'max' => 90,
                        'minMessage' => 'La description doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'La description ne peut pas dépasser {{ limit }} caractères',
                    ])
                ],
            ])

            ->add('preparation', TextareaType::class, [
                //ckeditor cache le vrai textarea donc on désactive le required donc Le champ reste obligatoire grâce à notblank
                'required' => false,

                'attr' => [
                    //Ajout d'une class 'ckeditor' dans le textarea de preparation (utilisé après dans le JS pour transformer)
                    'class' => 'ckeditor',
                    'placeholder' => 'Décrivez les étapes de préparation',
                    'rows' => 10,
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La préparation est obligatoire',
                    ]),
                    new Length([
                        'min' => 20,
                        'max' => 5000,
                        'minMessage' => 'La préparation doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'La préparation ne peut pas dépasser {{ limit }} caractères',
                    ])
                ],
            ])
            
            ->add('imageFile', FileType::class,[ //Champ de fichier
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M', //Ajout de contrainte (Optionnel)
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger un fichier au format JPEG, JPG, PNG ou WEBP.'
                    ])
                ]
            ])

            ->add('typerepas', EntityType::class, [
                'class' => Typerepas::class,
                'choice_label' => 'type',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
