<?php

namespace App\DataFixtures;

use App\DBAL\Types\LibelleCategoryType;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($faker->word());
            $category->setDescription($faker->sentence());
            $category->setLibelle($faker->randomElement([LibelleCategoryType::EATING, LibelleCategoryType::ENTERTAINMENT, LibelleCategoryType::HOME_APPLIANCE, LibelleCategoryType::DIVERS, LibelleCategoryType::SERVICE]));

            $manager->persist($category);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }

}