<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setUsername('User-'. $i);
            $user->setEmail('user-' . $i . '@yopmail.com');
            $user->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
            $user->setCreatedAt(new \DateTimeImmutable());
            $user->setClient($this->getReference(ClientFixtures::CLIENT_REFERENCE));
            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ClientFixtures::class
        ];
    }
}
