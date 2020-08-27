<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Milestone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MilestoneFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $milestones = $this->loadAndDecodeJsonDataFile('milestones');
        foreach ($milestones as $milestone) {
            $newMilestone = (new Milestone())
                ->setName($milestone["name"])
                ->setAchieved($milestone["achieved"])
                ->setIcon($milestone["icon"])
                ;
            $manager->persist($newMilestone);
        }
        $manager->flush();
    }

}