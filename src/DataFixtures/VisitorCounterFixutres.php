<?php

namespace App\DataFixtures;

use DateTimeZone;
use DateTimeImmutable;
use App\Entity\VisitorCounter;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VisitorCounterFixutres extends Fixture
{
    private const NB_MONTH = 12;

    public function load(ObjectManager $manager): void
    {
        $year = date('Y');
        for ($month = 1; $month <= self::NB_MONTH; $month++) {
            for ($day = 1; $day <= rand(0, 30); $day++)
            {
                $visitorCounter = new VisitorCounter();
                $visitorCounter->setDate(new DateTimeImmutable("$year-$month-$day", new DateTimeZone('Europe/Paris')));
                $visitorCounter->setIpAdress(rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255));
                $manager->persist($visitorCounter);
            }
        }
        $manager->flush();
    }
}
