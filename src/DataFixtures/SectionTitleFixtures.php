<?php


namespace App\DataFixtures;


use App\DemoData\DemoDataTrait;
use App\Entity\SectionTitle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SectionTitleFixtures extends Fixture
{
    use DemoDataTrait;

    public function load(ObjectManager $manager): void
    {
        $sectionTitles = $this->loadAndDecodeJsonDataFile("section_titles");
        foreach ($sectionTitles as $sectionTitle) {
            $newSectionTitle = (new SectionTitle())
                ->setTitle($sectionTitle["title"])
                ->setSubTitle($sectionTitle["sub_title"])
                ->setAlign($sectionTitle["align"])
            ;
            $sectionName = $sectionTitle["name"];
            $this->addReference("section_title.app.$sectionName", $newSectionTitle);
            $manager->persist($newSectionTitle);
        }

        $manager->flush();
    }
}