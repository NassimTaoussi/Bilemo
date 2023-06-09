<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientFixtures extends Fixture
{

    public const CLIENT_REFERENCE = '1';

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 100; $i++) {
            $client = new Client;
            $client->setUsername('Client-'. $i);
            $client->setEmail('client-' . $i . '@yopmail.com');
            $client->setPassword($this->userPasswordHasher->hashPassword($client, 'password'));
            $client->setCreatedAt(new \DateTimeImmutable());
            $client->setCompanyName('TestCompany');
            $manager->persist($client);
        }

        $this->addReference(self::CLIENT_REFERENCE, $client);
        $manager->flush();
    }

}
