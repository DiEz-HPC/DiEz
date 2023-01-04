<?php

namespace App\Service;

use RegexIterator;
use RecursiveRegexIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Repository\TemplateRepository;
use Doctrine\ORM\EntityManagerInterface;


class templatePreview
{
    const PATH = 'uploads/templates/';
    public function __construct(private TemplateRepository $templateRepository)
    {
    }


    public function getTemplate(int $id)
    {
        $template = $this->templateRepository->find($id);
        $templateName = $template->getTemplateName();
        return $this->unzipFile($templateName);
    }

    public function unzipFile(string $fileName)
    {

        // On vérifie si le fichier existe
        if (!file_exists(self::PATH . $fileName)) {
            return false;
        }
        $folderName = $this->parseFilename($fileName);
        $extractPath = self::PATH . 'unziped/' . $folderName;
        $zip = new \ZipArchive();
        $zip->open(self::PATH . $fileName);
        $zip->extractTo($extractPath);
        $zip->close();


        // On appelle la fonction de recherche avec le chemin de départ
        $indexPath = $this->findIndex($extractPath);

        if ($indexPath === null) {
            // Aucun fichier "index.html" n'a été trouvé
            return ("Fichier index.html non trouvé");
        } else {
            // On a trouvé le fichier, on affiche son chemin complet
            return $indexPath;
        }
    }



    // Fonction récursive pour parcourir l'arborescence de dossiers
    function findIndex($path)
    {
        // On ouvre le dossier en lecture
        $dir = opendir($path);
        // On parcours le contenu du dossier
        while (($entry = readdir($dir)) !== false) {
            // On ignore les entrées "." et ".."
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Si l'entrée est un fichier et que son nom est "index.html"
            if (is_file($path . '/' . $entry) && $entry == 'index.html') {
                // On a trouvé le fichier, on retourne son chemin complet
                return $path . '/' . $entry;
            }

            // Si l'entrée est un dossier, on appelle la fonction récursivement sur ce dossier
            if (is_dir($path . '/' . $entry)) {
                $result = $this->findIndex($path . '/' . $entry);
                // Si la fonction a trouvé un résultat dans ce dossier, on le retourne
                if ($result !== null) {
                    return $result;
                }
            }
        }
        // On a parcouru tout le dossier sans trouver de fichier "index.html"
        return null;
    }


    public function parseFilename(string $fileName)
    {
        $fileName = str_replace('.zip', '', $fileName);
        return $fileName;
    }
}
