<?php

namespace App\Controller\Admin;

use App\Entity\Template;
use App\Service\templatePreview;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TemplateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Template::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du template'),
            TextareaField::new(propertyName: 'templateFile', label: 'Fichier Zip')
                ->setTextAlign('center')
                ->setFormType(VichFileType::class)
                ->onlyOnForms(),
            TextareaField::new(propertyName: 'templateScreenshotFile', label: 'Screenshot')
                ->setTextAlign('center')
                ->setFormType(VichFileType::class)
                ->onlyOnForms(),
            ImageField::new('templateScreenshot', 'Aperçu du template')
                ->setBasePath('/uploads/images')
                ->onlyOnIndex(),
            ChoiceField::new('templateType', 'Type de template')
                ->setChoices([
                    'Ecommerce' => 'ecommerce',
                    'Site vitrine' => 'vitrine',
                    'Landing page' => 'landing',
                    'Blog' => 'blog',
                ])
                ->autocomplete()
                ->renderAsBadges([
                    'ecommerce' => 'success',
                    'vitrine' => 'info',
                    'landing' => 'warning',
                    'blog' => 'danger',
                ]),
            TextEditorField::new(propertyName: 'templateDescription', label: 'Déscription du template')
                ->setFormType(CKEditorType::class)
                ->setTextAlign('center'),
            UrlField::new('downloadLink', 'Lien de téléchargement')
                ->setFormType(UrlType::class)
                ->setTextAlign('center')
        ];
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addWebpackEncoreEntry('adminTemplatePreview')
            ->addWebpackEncoreEntry('adminTemplatePreviewStyle');
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Template')
            ->setEntityLabelInPlural('Templates')
            ->setPageTitle(Crud::PAGE_INDEX, '%entity_label_plural%')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier le template')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un template')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }
    public function configureActions(Actions $actions): Actions
    {
        // Add new action to the index page
        $actions->add(
            Crud::PAGE_INDEX,
            Action::new('previewTemplate', 'Prévisualiser le thème', 'fa fa-rocket')
                ->linkToCrudAction('previewTemplate')
                ->addCssClass('btn btn-primary admin-template-preview')
                ->setHtmlAttributes(['title' => 'Preview template'])
        )
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
        return $actions;
    }

    public function previewTemplate(AdminContext $context, templatePreview $templatePreview)
    {
        return;
    }
}
