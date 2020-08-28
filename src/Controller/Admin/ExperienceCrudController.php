<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ChoiceField::new('type')->setChoices([
                "Formation" => Experience::EDUCATION,
                "Entreprise" => Experience::WORK,
                "Freelance" => Experience::FREELANCE
            ]),
            TextField::new('schoolName'),
            TextEditorField::new('description'),
            DateField::new('fromDate'),
            DateField::new('toDate')
        ];
    }
}
