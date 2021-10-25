<?php

namespace App\Controller\Admin;

// Entites
use App\Entity\Guide;

// Form
use App\Form\StepType;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class GuideCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Guide::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('description'),
            AssociationField::new('expansion')
                ->formatValue(function ($value, $entity) {
                    return $entity->getExpansion();
                }),
            AssociationField::new('profession')
                ->formatValue(function ($value, $entity) {
                    return $entity->getProfession();
                }),
            AssociationField::new('steps')
                ->setTemplatePath('admin/fields/steps.html.twig')
                ->hideOnForm(),
            CollectionField::new('steps')
                ->allowAdd()
                ->allowDelete()
                ->setEntryIsComplex(true)
                ->setEntryType(StepType::class)
                ->hideOnDetail()
                ->hideOnIndex()
        ];
    }
}
