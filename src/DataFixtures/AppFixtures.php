<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\City;

class AppFixtures extends Fixture
{
  public function load (ObjectManager $manager)
  {
    $city = new City();
    $city->setName('Miami');
    $city->setCityServiceId('5304640');
    $manager->persist($city);

    $city = new City();
    $city->setName('Orlando');
    $city->setCityServiceId('4167147');
    $manager->persist($city);

    $city = new City();
    $city->setName('New York');
    $city->setCityServiceId('5128638');
    $manager->persist($city);

    $manager->flush();
  }
}
