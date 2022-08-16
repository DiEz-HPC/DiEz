<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Calendar;


class CalendarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
            $rand = rand(1,15);
            $calendar = new Calendar();
            $calendar->setTitle($faker->sentence(3));
            $calendar->setStart('2022-08-'.$rand);
            $calendar->setEnd('2022-08-'.$rand);
            $calendar->setColor($faker->hexColor);
            $manager->persist($calendar);
        }
        


        $manager->flush();
    }
}
