<?php

namespace App\Controller\Admin;

use App\Entity\Profile;
use App\Entity\User;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\RequestStack;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProfileCrudController extends AbstractCrudController
{
    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    public static function getEntityFqcn(): string
    {
        return Profile::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user', 'Utilisateur')
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    return $qb
                        ->select('u')
                        ->from(User::class, 'u')
                        ->leftJoin('u.profile', 'p')
                        ->andWhere('p.id = :profileId')
                        ->setParameter('profileId', $this->getEntityInstance())
                        ->orWhere('p.user IS NULL');
                })
                ->setTextAlign('center')
                ->onlyWhenUpdating(),
            AssociationField::new('user', 'Utilisateur')
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    return $qb
                        ->select('u')
                        ->from(User::class, 'u')
                        ->leftJoin('u.profile', 'p')
                        ->andWhere('p.user IS NULL');
                })
                ->setTextAlign('center')
                ->onlyWhenCreating(),
            AssociationField::new('user', 'Utilisateur')
                ->setTextAlign('center')
                ->onlyOnIndex(),
            AssociationField::new('user', 'Utilisateur')
                ->setTextAlign('center')
                ->onlyOnDetail(),
            EmailField::new(propertyName: 'user.email', label: 'Email')
                ->onlyOnIndex()
                ->setTextAlign('center'),
            TextField::new('lastName', 'Nom')
                ->setTextAlign('center'),
            TextField::new('firstName', 'Prénom')
                ->setTextAlign('center'),
            TextField::new('Status', 'Statut')
                ->setTextAlign('center'),
            UrlField::new('linkedin', 'Lien Linkedin')
                ->setTextAlign('center'),
            ImageField::new('imageName', 'Photo')
                ->setBasePath('/uploads/images/')
                ->hideOnForm(),
            TextareaField::new(propertyName: 'imageFile', label: 'Image Profil')
                ->setTextAlign('center')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
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

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $response = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $response->orderBy('entity.id', 'DESC');
        return $response;
    }

    private function getEntityInstance()
    {
        return $this->getEntityFromRequest();
    }

    private function getEntityFromRequest()
    {
        return $this->request->attributes->get('easyadmin_context')->getEntity()->getPrimaryKeyValue();
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Profil')
            ->setEntityLabelInPlural('Profils')
            ->setPageTitle(Crud::PAGE_INDEX, '%entity_label_plural%')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier le %entity_label_singular%')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer un %entity_label_singular%')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

}
