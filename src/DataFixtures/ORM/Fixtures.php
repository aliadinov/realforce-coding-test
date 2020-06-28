<?php
/**
 * Created by PhpStorm.
 * User: eldar
 * Date: 28.06.2020
 * Time: 21:15
 */

namespace App\DataFixtures\ORM;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $employee = new Employee();
        $employee
            ->setName('Alice')
            ->setAge(26)
            ->setKidsCount(2)
            ->setGross(6000);

        $manager->persist($employee);



        $employee = new Employee();
        $employee
            ->setName('Bob')
            ->setAge(52)
            ->setUsesCar(true)
            ->setGross(4000);

        $manager->persist($employee);



        $employee = new Employee();
        $employee
            ->setName('Charlie')
            ->setAge(36)
            ->setKidsCount(3)
            ->setUsesCar(true)
            ->setGross(5000);

        $manager->persist($employee);
        $manager->flush();
    }
}