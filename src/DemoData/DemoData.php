<?php


namespace App\DemoData;


use Doctrine\ORM\EntityManagerInterface;

class DemoData
{
    public function load(EntityManagerInterface $entityManager)
    {

    }

    private function loadServices(): array
    {
        return [];
    }
}