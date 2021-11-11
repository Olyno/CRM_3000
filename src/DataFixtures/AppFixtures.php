<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->createAdminUser($manager);
        $this->createSimpleUser($manager);
        $manager->flush();
    }

    private function createAdminUser(ObjectManager $manager): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('admin@test.test');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'test123'));

        $manager->persist($user);
    }

    private function createSimpleUser(ObjectManager $manager): void
    {
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $user->setEmail('user@test.test');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'test123'));

        $manager->persist($user);
    }
}
