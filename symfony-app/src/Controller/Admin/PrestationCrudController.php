<?php

namespace App\Controller\Admin;

use App\Entity\Prestation;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PrestationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prestation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(propertyName: 'title', label: 'Titre')
                ->setTextAlign('center'),
            TextareaField::new(propertyName: 'intro', label: 'Texte card')
                ->setTextAlign('center')
                ->setHelp('Texte affiché sur la card, max 255 caractères'),
            TextareaField::new(propertyName: 'teaser', label: 'Résumé')
                ->setTextAlign('center')
                ->setHelp('Texte d\'introduction affiché sur la page détail')
                ->hideOnIndex(),
            TextField::new(propertyName: 'icon', label: 'Icon font awesome')
                ->setTextAlign('center')
                ->setHelp('Exemple: fas fa-rocket'),
            NumberField::new(propertyName: 'position', label: 'Position')
                ->setTextAlign('center')
                ->setHelp('Plus la position est élevée, plus la prestation sera en haut de la liste'),
            TextEditorField::new(propertyName: 'content', label: 'Contenu')
                ->setFormType(CKEditorType::class)
                ->setFormTypeOptions(
                    [
                        'config' => [
                            'rows' => '20',
                        ],
                        'attr' => ['rows' => '20'],
                    ]
                )
                ->setTextAlign('center')
                ->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Prestation')
            ->setEntityLabelInPlural('Prestations')
            ->setPageTitle(Crud::PAGE_INDEX, '%entity_label_plural%')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier la prestation')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter une prestations')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter une %entity_label_singular%');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Créer et ajouter une nouvelle %entity_label_singular%');
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

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addJsFile('https://code.jquery.com/jquery-3.6.3.min.js')
            ->addJsFile('https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js')
            ->addJsFile('https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js')

            ->addWebpackEncoreEntry('adminDraggable');
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $response = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $response->orderBy('entity.position', 'ASC');
        return $response;
    }
}
