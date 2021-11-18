<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new(propertyName: 'email', label: 'Email')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'firstName', label: 'Prénom')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'lastName', label: 'Nom')
                ->setTextAlign('center'),
            UrlField::new(propertyName: 'linkedin', label: 'Linkedin',)
                ->setTextAlign('center'),
            TextareaField::new(propertyName: 'imageFile', label: 'Image Profil')
                ->setTextAlign('center')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new(propertyName: 'image', label: 'Image Profil')
                ->setTextAlign('center')
                ->setBasePath('/uploads/images/')
                ->onlyOnIndex(),
            TextField::new(propertyName: 'status', label: 'Status',)
                ->setTextAlign('center'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete dropdown-item text-danger');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete btn btn-secondary pr-0 text-danger');
            });

        return $actions;
      
    }
}
