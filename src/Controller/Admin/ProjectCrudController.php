<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete dropdown-item text-danger');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete btn btn-secondary pr-0 text-danger');
            });

        return $actions;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(propertyName: 'name', label: 'Nom du projet')
                ->setTextAlign('center'),
            AssociationField::new(propertyName: 'client', label: 'Nom du client')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'visibility', label: 'Visibilité Projet Github')
                ->onlyOnIndex()
                ->setTextAlign('center'),
            UrlField::new(propertyName: 'url', label: 'Lien Github',)
                ->setTextAlign('center')
                ->onlyOnIndex(),
            TextField::new(propertyName: 'description', label: 'Description')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'issue_number', label: 'Nombre d\'issues')
                ->setTextAlign('center')
                ->onlyOnIndex(),
            TextareaField::new(propertyName: 'imageFile', label: 'Image carousel')
                ->setTextAlign('center')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new(propertyName: 'imageName', label: 'Image carousel')
                ->setTextAlign('center')
                ->setBasePath('/uploads/images/')
                ->onlyOnIndex(),
            UrlField::new(propertyName: 'link', label: 'Lien site en prod',)
                ->setTextAlign('center'),
            BooleanField::new(propertyName: 'homeVisible', label: 'Affichage')
                ->setTextAlign('center'),
        ];
    }
}
