<?php

namespace App\Service;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;

class GithubApi
{
    private $client;
    private EntityManagerInterface $entityManager;
    private ProjectRepository $projectRepository;
    public function __construct(private string $GITHUB_TOKEN, EntityManagerInterface $entityManager, ProjectRepository $projectRepository)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.github.com/orgs/Diez-HPC/repos',
            'headers' => [
                'Accept' => 'application/vnd.github.v3+json',
                'Authorization' => 'token ' . $this->GITHUB_TOKEN,
            ],
        ]);
        $this->entityManager = $entityManager;
        $this->projectRepository = $projectRepository;
    }

    /**
     *  A FAIRE :
     * 
     * - Enregistré chaque répository dans la base de données
     * - Appeler la méthode getRepos() 1fois par jour maximum 
     * 
     */

    // Retourne 'true' si le project est enregistré depuis plus de 24h, sinon 'false'
    public function checkLastSave()
    {
        $allProject = $this->entityManager->getRepository(Project::class)->findAll();
        $now = new \DateTime('now');
        foreach ($allProject as $project) {
            $lastSave = $project->getLastSave();
            if ($lastSave->diff($now)->format('%a') > 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Retourne la liste des repositories de l'organisation Diez-HPC Si "checkLastSave" retourne 'true'
    public function getRepos()
    {
        if ($this->checkLastSave()) {
            $httpClient = $this->client;
            $response = $httpClient->request(
                'GET'
            );
            $repos = json_decode($response->getBody()->getContents(), true);
            $repos = array_map(function ($repo) {
                return [
                    'name' => $repo['name'],
                    'description' => $repo['description'],
                    'url' => $repo['html_url'],
                    'language' => $repo['language'],
                    'created_at' => $repo['created_at'],
                    'updated_at' => $repo['updated_at'],
                    'open_issues_count' => $repo['open_issues_count'],
                    'visibility' => $repo['visibility'],
                    'repoId' => $repo['id'],
                ];
            }, $repos);
            return $repos;
        }
    }

    // Retourne 'true' si le repository est enregistré dans la base de données, sinon 'false'
    public function chekIfRepoExistInDb(string $repoName)
    {
        $repo = $this->projectRepository->findOneBy(['name' => $repoName]);
        if ($repo) {
            return true;
        }
        return false;
    }

    // Enregistre les repositories dans la base de données si il n'y sont pas déja
    public function saveRepos()
    {
        $repos = $this->getRepos();
        if ($repos) {
            foreach ($repos as $repo) {
                // Si le repo n'existe pas dans la base de données on l'enregistre
                if (!$this->chekIfRepoExistInDb($repo['name'])) {
                    $project = new Project();
                    $project->setName($repo['name']);
                    if ($repo['description']) {
                        $project->setDescription($repo['description']);
                    } else {
                        $project->setDescription('Veuillez configuré votre déscription sur github');
                    }
                    $project->setDescription($repo['description']);
                    $project->setUrl($repo['url']);
                    if ($repo['language']) {
                        $project->setLanguage($repo['language']);
                    } else {
                        $project->setLanguage('N/A');
                    }
                    $project->setCreatedAt($repo['created_at']);
                    $project->setUpdatedAt($repo['updated_at']);
                    $project->setIssueNumber($repo['open_issues_count']);
                    $project->setVisibility($repo['visibility']);
                    $project->setGithubId($repo['repoId']);
                    $project->setLastSave(new \DateTime('now'));
                    ///////////// A faire : Gérer le setImageName ///////////////////
                    $project->setImageName($repo['name']);
                    $this->entityManager->persist($project);
                } elseif ($this->chekIfRepoExistInDb($repo['name'])) {
                    $this->updateProject($repo);
                }
            }
            $this->entityManager->flush();
        }
    }

    // Met a jour les repositories dans la base de données
    public function updateProject($repo)
    {
        $project = $this->projectRepository->findOneBy(['name' => $repo['name']]);
        $project->setName($repo['name']);
        if ($repo['description']) {
            $project->setDescription($repo['description']);
        } else {
            $project->setDescription('Veuillez configuré votre déscription sur github');
        }
        $project->setDescription($repo['description']);
        $project->setUrl($repo['url']);
        if ($repo['language']) {
            $project->setLanguage($repo['language']);
        } else {
            $project->setLanguage('N/A');
        }
        $project->setCreatedAt($repo['created_at']);
        $project->setUpdatedAt($repo['updated_at']);
        $project->setIssueNumber($repo['open_issues_count']);
        $project->setVisibility($repo['visibility']);
        $project->setGithubId($repo['repoId']);
        $project->setLastSave(new \DateTime('now'));
        ///////////// A faire : Gérer le setImageName ///////////////////
        $project->setImageName($repo['name']);
        $this->entityManager->persist($project);
    }
}
