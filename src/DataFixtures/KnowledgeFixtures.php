<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Knowledge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class KnowledgeFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $knowledges = $this->loadAndDecodeJsonDataFile("knowledges");
        foreach ($knowledges as $knowledge) {
            $newKnowledge = (new Knowledge())
                ->setName($knowledge["name"])
                ->setLevel($knowledge["level"])
                ->setImage($knowledge["image"])
            ;
            $manager->persist($newKnowledge);
        }
        $manager->flush();
    }
}