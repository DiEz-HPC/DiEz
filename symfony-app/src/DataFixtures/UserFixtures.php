<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Profile;
use Faker\Generator;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private Generator $faker;
    const USERS = [
       'pings' => [
            'email' => 'loic.pinguet@deviteasy.fr',
            'firstname' => 'Loic',
            'lastname' => 'Pinguet',
            'password' => 'pings',
            'roles' => ['ROLE_ADMIN'],
            'image' => 'https://media-exp1.licdn.com/dms/image/C5603AQEIAhEdEfvu_g/profile-displayphoto-shrink_200_200/0/1622118253572?e=1640217600&v=beta&t=6L-qvC2lkcYJvsXPs3jjUOCLQsyxx_nYQ2wZQcsoY5k',
            'linkedin' => 'https://www.linkedin.com/in/admin',
            'status' => 'Developpeur Full Stack'
       ],
        'mael' => [
            'email' => 'mael.chariault@deviteasy.fr',
            'firstname' => 'Mael',
            'lastname' => 'Chariault',
            'password' => 'mael',
            'roles' => ['ROLE_ADMIN'],
            'image' => 'https://media-exp1.licdn.com/dms/image/D5635AQHWER4YttvKdg/profile-framedphoto-shrink_800_800/0/1621346390927?e=1636110000&v=beta&t=BPOtZKvQ6j0qnxPsDzD18KlFr39m1Ye3gjiDuHa_S1A',
            'linkedin' => 'https://www.linkedin.com/in/admin',
            'status' => 'Developpeur Full Stack'
        ],
        'tens' => [
            'email' => 'tennessee.houry@deviteasy.fr',
            'firstname' => 'Tennessee',
            'lastname' => 'Houry',
            'password' => 'tens',
            'roles' => ['ROLE_ADMIN'],
            'image' => 'https://lh3.googleusercontent.com/a-/AOh14GhjxldFKM7oTm_Ppq4jq05UCNE8TyiqzSddywR1gQ=s288-p-no',
            'linkedin' => 'https://www.linkedin.com/in/admin',
            'status' => 'Developpeur Full Stack'
        ],
    ];


    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {

        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::USERS as $userName => $userData) {
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setPassword($this->passwordHasher->hashPassword($user, $userData['password']));
            $user->setRoles($userData['roles']);
            $manager->persist($user);

            $profile = new Profile();
            $profile->setUser($user);
            $profile->setImageName($userData['image']);
            $profile->setLastName($userData['lastname']);
            $profile->setFirstName($userData['firstname']);
            $profile->setLinkedin($userData['linkedin']);
            $profile->setStatus($userData['status']);
            $manager->persist($profile);
        }
        $manager->flush();
    }
}
