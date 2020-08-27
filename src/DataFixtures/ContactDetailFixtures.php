<?php


namespace App\DataFixtures;


use App\Entity\ContactDetail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactDetailFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $details['name'] = ContactDetail::create("Louis Thomas");
        $details['address'] = ContactDetail::create("18 Rue de Soubié, 31140 Montberon");
        $details['phone'] = ContactDetail::create("+336 65 54 66 77");
        $details['email'] = ContactDetail::create("hapinow@mailo.com");
        $details['website_url'] = ContactDetail::create("https://louisthomas.fr");

        foreach ($details as $contactDetail) {
            if ($contactDetail instanceof ContactDetail && $contactDetail->getDetail() !== null) {
                $manager->persist($contactDetail);
            }
        }
        $manager->flush();
    }
}