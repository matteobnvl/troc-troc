<?php

namespace App\DataFixtures;

use App\DBAL\Types\SexeType;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setEmail($faker->email());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'Password123!'));
            $user->setSexe($faker->randomElement([SexeType::MEN, SexeType::WOMEN, SexeType::NOT_PRECISE]));
            $user->setBirthday($faker->dateTimeBetween('-100 years', '-18 years'));
            $user->setStreetNumber($faker->numberBetween(1, 100));
            $user->setStreetName($faker->streetName());
            $user->setPostalCode($faker->postcode());
            $user->setCity($faker->city());

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}