<?php

namespace App\DataFixtures;

use App\Entity\Prestation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PrestationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 6; $i++) {
            $prestation = new Prestation();
            $prestation->setTitle($faker->sentence(random_int(1,5)));
            $prestation->setTeaser($faker->paragraph(2));
            $prestation->setIcon('fas fa-laptop-code');
            $manager->persist($prestation);
        }
        $manager->flush();
    }
}
