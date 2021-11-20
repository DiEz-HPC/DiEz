<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\Project;
use App\Repository\ClientRepository;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\RequestStack;

class ClientCrudController extends AbstractCrudController
{
    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

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
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    return $qb
                        ->from(Project::class, 'p')
                        ->andWhere('p.client = :client')
                        ->setParameter('client', $this->getEntityInstance())
                        ->orWhere('p.client IS NULL');
                })
                ->setTextAlign('center')
                ->onlyWhenUpdating(),
            AssociationField::new('project', 'Projet(s)')
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    return $qb
                        ->select('p')
                        ->from(Project::class, 'p')
                        ->andWhere('p.client IS NULL');
                })
                ->setTextAlign('center')
                ->onlyWhenCreating(),
            AssociationField::new('project', 'Projet(s)')
                ->setTextAlign('center')
                ->onlyOnIndex(),
            AssociationField::new('project', 'Projet(s)')
                ->setTextAlign('center')
                ->onlyOnDetail(),
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

    private function getEntityInstance()
    {
        return $this->getEntityFromRequest();
    }

    private function getEntityFromRequest()
    {
        return $this->request->attributes->get('easyadmin_context')->getEntity()->getPrimaryKeyValue();
    }
}
