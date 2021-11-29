<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Profile;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\RequestStack;

class UserCrudController extends AbstractCrudController
{
    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new(propertyName: 'email', label: 'Email')
                ->setTextAlign('center'),
            TextField::new(propertyName: 'password', label: 'Password',)
                ->setTextAlign('center')
                ->onlyOnForms()
                ->setFormType(PasswordType::class),
            ChoiceField::new(propertyName: 'roles', label: 'Roles',)
                ->setTextAlign('center')
                ->setChoices(['ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_USER' => 'ROLE_USER'])
                ->allowMultipleChoices()
                ->onlyOnForms(),
            AssociationField::new('profile', 'Profil')
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    return $qb
                        ->from(Profile::class, 'p')
                        ->andWhere('p.user = :user')
                        ->setParameter('user', $this->getEntityInstance())
                        ->orWhere('p.user IS NULL');
                })
                ->setTextAlign('center')
                ->onlyWhenUpdating(),
            AssociationField::new('profile', 'Profil')
                ->setQueryBuilder(function (QueryBuilder $qb) {
                    return $qb
                        ->select('p')
                        ->from(Profile::class, 'p')
                        ->andWhere('p.user IS NULL');
                })
                ->setTextAlign('center')
                ->onlyWhenCreating(),
            AssociationField::new('profile', 'Profil')
                ->setTextAlign('center')
                ->onlyOnIndex(),
            AssociationField::new('profile', 'Profil')
                ->setTextAlign('center')
                ->onlyOnDetail(),
        ];
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
}
