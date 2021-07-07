<?php

namespace App\DataFixtures;

use App\Entity\Hiking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class HikingFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $level = ["Easy","Medium", "Hard"];
        $typpe = ["Vélo", "A pied"];
        $faker = Factory::create('fr_FR');
        for($i = 0; $i< 17 ; $i++){
            $hiking = new Hiking();
            $hiking
                ->setCreator($faker->email)
                ->setCrossingPoints($faker->latitude($min = -90, $max = 90))
                ->setTitle($faker->sentence(5,true))
                ->setTime($faker->numberBetween(30,1000))
                ->setDistance($faker->numberBetween(30,1000))
                ->setElevation($faker->numberBetween(30,10000))
                ->setHighest($faker->numberBetween(30,10000))
                ->setLowest($faker->numberBetween(30,10000))
                ->setDifficulty($level[$faker->numberBetween(0,2)])
                ->setReturnPoint($faker->latitude($min = -90, $max = 90))
                ->setType($typpe[$faker->numberBetween(0,1)])
                ->setRegion($faker->city)
                ->setTown($faker->city)
                ->setStartPoint($faker->latitude($min = -90, $max = 90))
                ->setDescription($faker->sentence(20,true))
                ->setImage($faker->imageUrl($width = 150, $height = 150));
            $manager->persist(($hiking));

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
