<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    private const PROJECT_FAKE = [
        [
            'name' => 'JobPermut',
            'description' => 'The site of de la mort qui tue',
            'url' => 'https://github.com/',
            'language' => 'php',
            'created_at' => '2021-10-04T12:31:36Z',
            'updated_at' => '2021-10-04T12:31:36Z',
            'open_issues_count' => '0',
            'visibility' => 'private',
            'imageName' => 'test.jpg'
        ],
        [
            'name' => 'Fiverr Helper',
            'description' => 'The site number 1',
            'url' => 'https://github.com/',
            'language' => 'php',
            'created_at' => '2021-10-04T12:31:36Z',
            'updated_at' => '2021-10-04T12:31:36Z',
            'open_issues_count' => '0',
            'visibility' => 'private',
            'imageName' => 'logo_goutte.png'
        ],
        [
            'name' => 'Projet qui bug',
            'description' => 'Pas de bol ce dernier rien ne marche',
            'url' => 'https://github.com/',
            'language' => 'php',
            'created_at' => '2021-10-04T12:31:36Z',
            'updated_at' => '2021-10-04T12:31:36Z',
            'open_issues_count' => '0',
            'visibility' => 'private',
            'imageName' => '404.png'
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECT_FAKE as $fake) {
            $project = new Project();
            $project->setName($fake['name']);
            $project->setDescription($fake['description']);
            $project->setUrl($fake['url']);
            $project->setLanguage($fake['language']);
            $project->setCreatedAt($fake['created_at']);
            $project->setUpdatedAt($fake['updated_at']);
            $project->setIssueNumber($fake['open_issues_count']);
            $project->setVisibility($fake['visibility']);
            $project->setImageName($fake['imageName']);
            $project->setLastSave(new \DateTime('now'));
            $manager->persist($project);
        }
        $manager->flush();
    }
}
