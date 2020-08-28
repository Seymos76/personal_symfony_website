<?php

namespace App\Controller\Admin;

use App\Entity\Knowledge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KnowledgeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Knowledge::class;
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
