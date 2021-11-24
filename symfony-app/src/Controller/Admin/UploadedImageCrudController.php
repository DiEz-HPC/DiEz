<?php

namespace App\Controller\Admin;

use App\Entity\UploadedImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UploadedImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UploadedImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('imageFile', 'Choisir une image')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('name', 'Image')
                ->setBasePath('/uploads/images/')
                ->onlyOnIndex(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete dropdown-item text-danger');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete btn btn-secondary pr-0 text-danger');
            });
            ;
    }
}
