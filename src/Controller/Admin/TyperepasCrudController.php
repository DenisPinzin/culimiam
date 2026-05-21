<?php

namespace App\Controller\Admin;

use App\Entity\Typerepas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TyperepasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Typerepas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            // nom du type de repas
            TextField::new('type'),

            // couleur de l'étiquette
            ColorField::new('couleur'),
        ];
    }
}
