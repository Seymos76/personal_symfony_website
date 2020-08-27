<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $skills = $this->loadAndDecodeJsonDataFile("skills");
        foreach ($skills as $skill) {
            $newSkill = (new Skill())
                ->setName($skill["name"])
                ->setLevel($skill["level"])
                ->setImage($skill["image"])
                ;
            $manager->persist($newSkill);
        }
        $manager->flush();
    }
}