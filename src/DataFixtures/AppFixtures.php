<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Property;

class AppFixtures extends Fixture
{
    /**
     * @SuppressWarnings
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager)
    {   
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $property = new Property();
            $property
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))

                ->setSurface($faker->numberBetween(20, 350))
                ->setBedrooms($faker->numberBetween(1, 10))
                ->setFloor($faker->numberBetween(1, 50))
                ->setHeat($faker->numberBetween(0, 2))
                ->setRooms($faker->numberBetween(1, 10))


                ->setPostalCode($faker->postcode)
                ->setCity($faker->city)
                ->setAdress($faker->address)

                ->setSold(false)
                ->setPrice($faker->numberBetween(10000, 1000000));

            $manager->persist($property);
        }


        $manager->flush();
    }
}
