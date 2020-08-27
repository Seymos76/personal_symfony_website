<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\WorkProcess;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WorkProcessFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager)
    {
        $workProcesses = $this->loadAndDecodeJsonDataFile("work_processes");
        foreach ($workProcesses as $workProcess) {
            $newProcess = (new WorkProcess())
                ->setLabel($workProcess["label"])
                ->setSlug($workProcess["slug"])
                ->setPosition($workProcess["position"])
            ;
            $manager->persist($newProcess);
        }
        $manager->flush();
    }
}