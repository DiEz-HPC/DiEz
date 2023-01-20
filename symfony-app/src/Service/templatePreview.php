<?php

namespace App\Service;

use RegexIterator;
use RecursiveRegexIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Repository\TemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;


class templatePreview
{
    const PATH = 'uploads/templates/';
    private string $indexEmpty;
    public function __construct(private TemplateRepository $templateRepository, KernelInterface $appKernel)
    {
        $this->indexEmpty = $appKernel->getProjectDir() . '/src/Service/TemplateSkeleton/index.html';
    }


    public function getTemplate(int $id)
    {
        $template = $this->templateRepository->find($id);
        $templateName = $template->getTemplateName();
        $projectName = $template->getName();
        return $this->unzipFile($projectName, $templateName);
    }

    public function unzipFile(string $projectName, ?string $fileName)

    {
        // si on a un zip on effectue le traitement
        if ($fileName && file_exists(self::PATH . $fileName)){
            $folderName = $this->parseFilename($fileName);
            $extractPath = self::PATH . 'unziped/' . $folderName;
            $zip = new \ZipArchive();
            $zip->open(self::PATH . $fileName);
            $zip->extractTo($extractPath);
            $zip->close();

            $indexPath = $this->findIndex($extractPath);

            if ($indexPath === null) {
                // Aucun fichier "index.html" n'a été trouvé
                return ("Fichier index.html non trouvé");
            } else {
                // On a trouvé le fichier, on affiche son chemin complet
                return $indexPath;
            }
        }

        $path = self::PATH . 'unziped/' . $projectName;

        //on vérifie si le dossier existe sinon on le créé
        if (!file_exists($path)) {
            mkdir(self::PATH . 'unziped/' . $projectName, 0777, true);
        }

        //copie du fichier index.html dans le dossier public
        copy ($this->indexEmpty, $path . '/index.html');
        return $path . '/index.html';
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
