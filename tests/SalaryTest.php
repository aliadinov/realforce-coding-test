<?php
/**
 * Created by PhpStorm.
 * User: eldar
 * Date: 29.06.2020
 * Time: 00:32
 */

namespace App\Tests\Util;

use App\Entity\Employee;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    public function testAdd()
    {
        $employee = new Employee();
        $employee
            ->setGross(10000)
            ->setAge(20);
        $this->assertEquals(8000, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(10000)
            ->setAge(20)
            ->setKidsCount(2);
        $this->assertEquals(8000, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(10000)
            ->setAge(20)
            ->setKidsCount(3);
        $this->assertEquals(8200, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(10000)
            ->setAge(20)
            ->setUsesCar(true);
        $this->assertEquals(7600, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(10000)
            ->setAge(50);
        $this->assertEquals(8000, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(10000)
            ->setAge(51);
        $this->assertEquals(8560, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(6000)
            ->setAge(26)
            ->setKidsCount(2);
        $this->assertEquals(4800, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(4000)
            ->setAge(52)
            ->setUsesCar(true);
        $this->assertEquals(3024, $employee->getSalary());


        $employee = new Employee();
        $employee
            ->setGross(5000)
            ->setAge(36)
            ->setKidsCount(3)
            ->setUsesCar(true);
        $this->assertEquals(3690, $employee->getSalary());
    }
}


