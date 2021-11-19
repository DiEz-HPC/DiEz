<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(propertyName: 'lastName', label: 'Nom')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'firstName', label: 'Prénom')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'adress', label: 'Adresse',)
                ->setTextAlign('center'),
            TextField::new(propertyName: 'phone', label: 'Téléphone',)
                ->setTextAlign('center'),
            EmailField::new(propertyName: 'email', label: 'Email',)
                ->setTextAlign('center'),
            TextField::new(propertyName: 'contract', label: 'Contrat',)
                ->setTextAlign('center'),
            AssociationField::new('project', 'Projet(s)')
                ->setTextAlign('center'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter un %entity_label_singular%');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Créer et ajouter un nouveau %entity_label_singular%');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Créer');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete dropdown-item text-danger');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setCssClass('action-delete btn btn-secondary pr-0 text-danger');
            });
    }
}
