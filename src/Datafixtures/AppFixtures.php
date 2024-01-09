<?php

namespace App\DataFixtures;

use App\Entity\ContactUs;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        //contact 
        for($i=0; $i < 5; $i++){
            $contact = new ContactUs();
            $contact->setEmail($this->faker->email())
            ->setSubject('Demande n°' + ($i + 1 ))
            ->setMessage($this->faker->text());
            $manager->persist($contact);
        }
        $manager->flush();
    }
}


//contact 
for($i=0; $i < 5; $i++){
    $contact = new ContactUs();
    $contact->setEmail($this->faker->email())
    ->setSubject('Demande n°' + ($i + 1 ))
    ->setMessage($this->faker->text());
    $manager->persist($contact);
}