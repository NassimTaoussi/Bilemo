<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PhoneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 200; $i++) {
            $phone = new Phone();
            $phone->setBrand('Nokia');
            $phone->setModel('Model-' . $i);
            $phone->setColor('#F8F8FF');
            $phone->setDescription('Lorem ipsum dolor sit amet. Qui consequuntur repudiandae quo praesentium repellat ut rerum officiis et earum saepe aut facere magnam quo autem nulla ex odio aspernatur! ');
            $phone->setSize('6.1');
            $phone->setWeight('168');
            $phone->setPrice('190');
            $phone->setPhoto('phone.jpg');
            $phone->setCreatedAt(new \DateTimeImmutable());
            $phone->setUpdatedAt(new \DateTimeImmutable());

            $manager->persist($phone);
        }

        $manager->flush();
    }
}
