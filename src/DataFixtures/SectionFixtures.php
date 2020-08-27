<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\Section;
use App\Entity\SectionTitle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SectionFixtures extends Fixture implements DependentFixtureInterface
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
                ->setTitle($sectionName)
                ->setName("section.$sectionName")
                ->setPosition(1)
                ->setSectionTitle($sectionTitle)
            ;
            $manager->persist($newSection);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SectionTitleFixtures::class
        ];
    }
}