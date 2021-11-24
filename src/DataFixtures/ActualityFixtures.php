<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActualityFixtures extends Fixture
{
    const AUTHOR = [
        'Tens',
        'Mael',
        'Pings'
    ];
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $random = array_rand(self::AUTHOR);
            $actuality = new Post();
            $actuality->setTitle($faker->sentence(3));
            $actuality->setSlug($faker->slug());
            $actuality->setUrl($faker->url());
            $actuality->setCreatedAt(new \DateTimeImmutable('now'));
            $actuality->setAuthor(self::AUTHOR[$random]);
            $actuality->setArticle($faker->paragraph(4, true));
            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
