<?php

namespace App\DataFixtures;

use App\Entity\Social;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialFixtures extends Fixture
{
    private const SOCIALS = [
        'facebook' => [
            'link' => 'https://www.facebook.com/Deviteasy.fr/',
            'icon' => 'fab fa-facebook-f'
        ],
        'twitter' => [
            'link' => 'https://twitter.com/DevItEasy',
            'icon' => 'fab fa-twitter'
            ],
        'instagram' => [
            'link' => 'https://www.instagram.com/dev_it_easy/',
            'icon' => 'fab fa-instagram'
            ],
        'linkedin' => [
            'link' => 'https://www.linkedin.com/company/deviteasy/',
            'icon' => 'fab fa-linkedin-in'
            ],
        ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::SOCIALS as $name => $attributes) {
            $social = new Social();
            $social->setName($name);
            $social->setUrl($attributes['link']);
            $social->setIcon($attributes['icon']);
            $manager->persist($social);
        }

        $manager->flush();
    }
}
