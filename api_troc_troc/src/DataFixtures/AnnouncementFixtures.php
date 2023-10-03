<?php

namespace App\DataFixtures;

use App\DBAL\Types\AnnouncementType;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Announcement;
use App\Entity\User;
use App\Entity\Category;
use Faker\Factory;

class AnnouncementFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserRepository $userRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(UserRepository $userRepository, CategoryRepository $categoryRepository)
    {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $users = $this->userRepository->findAll();
        $categories = $this->categoryRepository->findAll();

        if (empty($users) || empty($categories)) {
            throw new \Exception('Ensure you have some users and categories in your database.');
        }

        for ($i = 0; $i < 20; $i++) {
            $announcement = new Announcement();
            $announcement->setTitre($faker->sentence(3));
            $announcement->setDescription($faker->text());
            $announcement->setIsDelete($faker->boolean());
            $announcement->setIsFinish($faker->boolean());
            $announcement->setStartDate($faker->dateTimeBetween('-2 months', 'now'));
            $announcement->setEndDate($faker->dateTimeBetween('now', '+2 months'));
            $announcement->setType($faker->randomElement([AnnouncementType::PROPOSE, AnnouncementType::SEARCH]));
            $announcement->setLongitude($faker->longitude());
            $announcement->setLattitude($faker->latitude());
            $announcement->setCategory($faker->randomElement($categories));
            $announcement->setPublishedBy($faker->randomElement($users));
            $announcement->setCreatedAt(new \DateTimeImmutable('now'));
            $announcement->setUpdatedAt($faker->dateTimeBetween('-1 month', 'now'));

            $manager->persist($announcement);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}
