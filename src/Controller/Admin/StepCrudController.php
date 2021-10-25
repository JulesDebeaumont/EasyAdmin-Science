<?php

namespace App\Controller\Admin;

use App\Entity\Step;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class StepCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Step::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('start'),
            NumberField::new('end'),
            NumberField::new('count'),
            NumberField::new('recipeId'),
            AssociationField::new('guide')
                ->formatValue(function ($value, $entity) {
                    return $entity->getGuide();
                }),
        ];
    }


    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('guide'));
    }
}
