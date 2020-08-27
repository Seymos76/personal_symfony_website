<?php


namespace App\Tests\DemoDataTest;


use App\DemoData\DemoData;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Test\TestCase;

class DemoDataTest extends TestCase
{
    public function testLoad()
    {
        $result = (new DemoData())->load(new \MockObjectTest());
    }
}