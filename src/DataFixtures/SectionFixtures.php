<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Section;
use App\Entity\SectionTitle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SectionFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $sections = $this->loadAndDecodeJsonDataFile('sections');
        foreach ($sections as $section) {
            /** @var SectionTitle $sectionTitle */
            $sectionName = $section["name"];
            $sectionTitle = $this->getReference("section_title.$sectionName");
            $newSection = new Section();
            $newSection
                ->setTitle('profile')
                ->setName('section.profile')
                ->setPosition(1)
                ->setSectionTitle($sectionTitle)
            ;
            $manager->persist($section);
        }
        $manager->flush();
    }
}