<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_EDIT, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            // titre recette
            TextField::new('titre'),

            // description courte
            TextareaField::new('description'),

            // préparation
            TextareaField::new('preparation'),

            // nombre de personne
            IntegerField::new('nombrepersonne'),

            // upload image formulaire
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),

            // affichage image
            ImageField::new('imageName')
                ->setBasePath('images/upload')
                ->onlyOnIndex(),

            // type repas
            AssociationField::new('typerepas')
                ->setFormTypeOptions([
                    'choice_label' => 'type',
                ]),

            // auteur recette
            AssociationField::new('user')
                ->setFormTypeOptions([
                    'choice_label' => 'pseudo',
                ]),
        ];
    }
}

