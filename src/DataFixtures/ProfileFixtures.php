<?php


namespace App\DataFixtures;


use App\Entity\Profile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfileFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $profile = new Profile();
        $profile->setImage('profile_picture.jpeg')
            ->setDescription("I currently work at Galley-La Company, where I spend most of my time crafting and working on awesome projects.")
            ->setResumeToDownload('cv.pdf');
        $manager->persist($profile);
        $manager->flush();
    }
}