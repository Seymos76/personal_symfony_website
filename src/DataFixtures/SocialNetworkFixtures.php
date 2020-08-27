<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\SocialNetwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialNetworkFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $socialNetworks = $this->loadAndDecodeJsonDataFile('social_networks');
        foreach ($socialNetworks as $network) {
            $newSocialNetwork = (new SocialNetwork())
                ->setName($network["name"])
                ->setUrl($network["url"])
                ->setIcon($network["icon"])
                ;
            $manager->persist($newSocialNetwork);
        }
        $manager->flush();
    }

}