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
            'imageName' => 'test.jpg'
        ],
        [
            'name' => 'Fiverr Helper',
            'description' => 'The site number 1',
            'imageName' => 'logo_goutte.png'
        ],
        [
            'name' => 'Projet qui bug',
            'description' => 'Pas de bol ce dernier rien ne marche',
            'imageName' => '404.png'
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECT_FAKE as $fake) {
            $project = new Project();
            $project->setName($fake['name']);
            $project->setDescription($fake['description']);
            $project->setImageName($fake['imageName']);
            $manager->persist($project);
        }
        $manager->flush();
    }
}
