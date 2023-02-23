<?php

namespace App\DataFixtures;

use App\DataFixtures\ProductFixtures as DataFixturesProductFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct( UserPasswordHasherInterface $passwordHasher )
    {
        $this->hasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('nalmasi');
        $user->setName('Nooshin Almasi');
        $plaintextPassword = 'test';
        $hashedPassword = $this->hasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        $adminUser = new User();
        $adminUser->setUsername('gandrade');
        $adminUser->setName('Giovanny Andrade');
        $adminUser->addRole('ROLE_ADMIN');
        $plaintextPassword = 'test';
        $hashedPassword = $this->hasher->hashPassword(
            $adminUser,
            $plaintextPassword
        );
        $adminUser->setPassword($hashedPassword);
        $manager->persist($adminUser);
        
        $manager->flush();
    }
}
