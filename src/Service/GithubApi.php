<?php

namespace App\Service;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class GithubApi
{
    private const TIME_UPLOAD_LIMIT = 30;    // Value in minutes
    private bool $updated = false;
    private $client;
    private EntityManagerInterface $entityManager;
    private ProjectRepository $projectRepository;

    public function __construct(private string $GITHUB_TOKEN, EntityManagerInterface $entityManager, ProjectRepository $projectRepository, HttpClientInterface $client)
    {
        $this->client = $client->withOptions([
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
     * @throws Exception
     */

    // Retourne 'true' si le project est enregistré depuis plus de 24h, sinon 'false'
    private function checkLastSave(): bool
    {
        $allProject = $this->entityManager->getRepository(Project::class)->findAll();
        $now = (new DateTime('', new \DateTimeZone('Europe/Paris')))->modify(
            '-' . self::TIME_UPLOAD_LIMIT . ' minutes'
        );
        if (empty($allProject)) {
            return true;
        }

        foreach ($allProject as $project) {
            $lastSave = $project->getLastSave();
            if ($lastSave <= $now) {
                return true;
            }
        }

        return false;

    }

    // Retourne la liste des repositories de l'organisation Diez-HPC Si "checkLastSave" retourne 'true'

    /**
     * @throws Exception
     */
    private function getRepos(): array
    {
        $repos = [];
        if ($this->checkLastSave()) {
            $response = $this->client->request('GET', 'https://api.github.com/orgs/Diez-HPC/repos');
            $repos = json_decode($response->getContent(), true);
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
        }
        return $repos;
    }

    // Retourne 'true' si le repository est enregistré dans la base de données, sinon 'false'
    private function chekIfRepoExistInDb(string $repoId): bool
    {
        $repo = $this->projectRepository->findOneBy(['githubId' => $repoId]);
        if ($repo) {
            return true;
        }
        return false;
    }

    // Enregistre les repositories dans la base de données si il n'y sont pas déja

    /**
     * @throws Exception
     */
    public function saveRepos(): bool
    {
        $repos = $this->getRepos();
        if ($repos) {
            $this->updated = true;
            foreach ($repos as $repo) {
                // Si le repo n'existe pas dans la base de données on l'enregistre
                if (!$this->chekIfRepoExistInDb($repo['repoId'])) {
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
                    $project->setLastSave(new DateTime('now'));
                    $this->entityManager->persist($project);
                } elseif ($this->chekIfRepoExistInDb($repo['repoId'])) {
                    $this->updateProject($repo);
                }
            }
            $this->entityManager->flush();
        } else {
            $this->updated = false;
        }
        return $this->updated;
    }

    // Met a jour les repositories dans la base de données
    private function updateProject($repo)
    {
        $project = $this->projectRepository->findOneBy(['githubId' => $repo['repoId']]);
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
        $project->setLastSave(new DateTime('now'));
        $this->entityManager->persist($project);
    }
}
