<?php

namespace App\Form;

use App\Entity\TypeRepas;
use App\Entity\Ingredient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'label' => 'Nom de la recette',
            ])
            ->add('nombrepersonne', null, [
                'label' => 'Nombre de personnes',
            ])
            ->add('ingredient', EntityType::class, [
                'class' => Ingredient::class,
                'choice_label' => 'nom',   
                'multiple' => true,       
                'expanded' => true,       
                'required' => false,
                'by_reference' => false,   
            ])
            ->add('description', null, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Donne envie de goûter en une phrase',
                ],
            ])
            ->add('preparation', null, [
                'label' => 'Réalisation',
                'attr' => [
                    'placeholder' => 'Décris ici les étapes de la recette…',
                ],
            ])
            ->add('typeRepas', EntityType::class, [
                'class' => TypeRepas::class,
                'choice_label' => 'nom',
                'placeholder' => '-- Choisir un type --',
            ])
            
            ->add('imageFile', FileType::class, [
                'required' => false,
                'mapped' => true,
                'label' => 'Choisir une image',
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
