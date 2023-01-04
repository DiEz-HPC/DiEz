<?php

namespace App\Controller\Admin;

use App\Entity\Template;
use App\Service\templatePreview;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
                ->setTextAlign('center')
            ,
        ];
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addWebpackEncoreEntry('adminTemplatePreview')
            ->addWebpackEncoreEntry('adminTemplatePreviewStyle');
    }

    public function configureActions(Actions $actions): Actions
    {
        // Add new action to the index page
        $actions->add(Crud::PAGE_INDEX, Action::new('previewTemplate', 'Prévisualiser le thème', 'fa fa-rocket')
            ->linkToCrudAction('previewTemplate')
            ->addCssClass('btn btn-primary admin-template-preview')
            ->setHtmlAttributes(['title' => 'Preview template'])
        );
        return $actions;
    }
    
    public function previewTemplate(AdminContext $context, templatePreview $templatePreview)
    {
        return;
    }
}
