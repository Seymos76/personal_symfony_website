<?php

namespace App\Controller\Admin;

use App\Entity\Strength;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StrengthCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Strength::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
