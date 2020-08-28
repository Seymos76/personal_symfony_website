<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ResumeFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $resumes = $this->loadAndDecodeJsonDataFile("resume");
        foreach ($resumes as $resume) {
            $fromDate = \DateTime::createFromFormat("Y-m-d", $resume["from_date"]);
            $toDate = \DateTime::createFromFormat("Y-m-d", $resume["to_date"]);
            $newResume = (new Experience())
                ->setName($resume["name"])
                ->setDescription($resume["description"])
                ->setFromDate($fromDate)
                ->setToDate($toDate)
            ;
            if (array_key_exists("school_name", $resume) && $resume["type"] === "education") {
                $newResume->setSchoolName($resume["school_name"]);
                $newResume->setType(Experience::EDUCATION);
            } else {
                $newResume->setSchoolName($resume["company"]);
                $newResume->setType($resume["type"]);
            }
            $manager->persist($newResume);
        }
        $manager->flush();
    }
}
