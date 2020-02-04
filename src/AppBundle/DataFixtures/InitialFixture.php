<?php

namespace AppBundle\DataFixtures;

use Faker;
use AppBundle\Entity\Skewer;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class InitialFixture implements ORMFixtureInterface {

    public function load(ObjectManager $manager) {
        // Creating 20 job offers
        for ($i = 0; $i < 20; $i++) {
            $jobFaker = Faker\Factory::create();
            // Employeer
            $skewer = new Skewer();
            $skewer->setName("Brocheta de gamabas");
            $skewer->setCalories("458");
            
            $manager->persist($skewer);
            
            
        }
        $manager->flush();
    }

}
