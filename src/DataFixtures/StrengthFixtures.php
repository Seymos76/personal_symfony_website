<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Strength;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StrengthFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $strengths = $this->loadAndDecodeJsonDataFile("strengths");
        foreach ($strengths as $strength) {
            $newStrength = (new Strength())
                ->setName($strength["label"])
                ->setLevel($strength["level"])
                ;
            $manager->persist($newStrength);
        }
        $manager->flush();
    }
}