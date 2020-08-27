<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $services = $this->loadAndDecodeJsonDataFile("services");
        foreach ($services as $service) {
            $newService = (new Service())
                ->setName($service["name"])
                ->setDescription($service["description"])
                ;
            $manager->persist($newService);
        }
        $manager->flush();
    }
}