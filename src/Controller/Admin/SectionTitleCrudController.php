<?php

namespace App\Controller\Admin;

use App\Admin\Field\SectionField;
use App\Entity\Section;
use App\Entity\SectionTitle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SectionTitleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SectionTitle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('sub_title'),
            ChoiceField::new('align')->setChoices([
                "Gauche" => SectionTitle::ALIGN_LEFT,
                "Centre" => SectionTitle::ALIGN_CENTER,
                "Droite" => SectionTitle::ALIGN_RIGHT
            ]),
            SectionField::new('section')
        ];
    }
}
