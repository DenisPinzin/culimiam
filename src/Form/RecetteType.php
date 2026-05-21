<?php

namespace App\Form;

use App\Entity\Recette;
use App\Entity\Typerepas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'placeholder' => 'Crêpes maison faciles',
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
                    ]),
                ],
            ])

            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Délicieuses crêpes maison à ma façon!',
                ],
            ])

            ->add('preparation', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Décrivez les étapes de préparation',
                    'rows' => 10,
                ],
            ])
            
            ->add('image')

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
