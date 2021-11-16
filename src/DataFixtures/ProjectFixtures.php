<?php

namespace App\DataFixtures;

use App\Service\GithubApi;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function __construct(private GithubApi $githubApi)
    { }
    public function load(ObjectManager $manager): void
    {
        $this->githubApi->saveRepos();
    }
}
