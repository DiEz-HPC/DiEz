<?php

namespace App\Controller\Admin;

use App\Entity\Theme;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ThemeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Theme::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ColorField::new('primaryColor', 'Primary'),
            ColorField::new('secondaryColor', 'Secondary'),
            ColorField::new('darkColor', 'Dark'),
            ColorField::new('lightColor', 'Light'),
            BooleanField::new('isActive', 'Actif')
                ->setTextAlign('center')
                ->setCssClass('radioColor'),
        ];
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $response = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $response->orderBy('entity.name', 'ASC');
        return $response;
    }

}
