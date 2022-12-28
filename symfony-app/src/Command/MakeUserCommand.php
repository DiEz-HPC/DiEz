<?php

namespace App\Command;

use App\Entity\User;
use App\Entity\Profile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:make-user',
    description: 'Create a user',
)]
class MakeUserCommand extends Command
{
    public function __construct(private UserPasswordHasherInterface $hasher, private EntityManagerInterface $em)
    {
        parent::__construct();
    }
    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Welcome to create user command');
        // ask a email
        $email = $io->ask('Email', '    ');

        // ask a password
        $password = $io->askHidden('Password', function ($password) {
            if (strlen($password) < 6) {
                throw new \RuntimeException('The password is too short');
            }

           
            return $password;
        });

        // create user
        $io->text('Creating user...');

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->hasher->hashPassword($user, $password));
        $user->setRoles(["ROLE_ADMIN"]);
        $this->em->persist($user);
        $this->em->flush();

        $io->success($email);

        return Command::SUCCESS;
    }
}
