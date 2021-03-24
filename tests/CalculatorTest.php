<?php

namespace CalculatorSystem\Tests;


use CalculatorSystem\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function testing_calculator_adds_numbers()
    {
        $calculator = new Calculator();

        $calculator->pressNumber(1);
        $this->assertEquals(1, $calculator->output());

        $calculator->pressNumber(3);
        $this->assertEquals(13, $calculator->output());

        $calculator->add();
        $this->assertEquals(13, $calculator->output());

        $calculator->pressNumber(3);
        $this->assertEquals(3, $calculator->output());

        $calculator->add();
        $this->assertEquals(3, $calculator->output());

        $calculator->pressNumber(3);
        $this->assertEquals(3, $calculator->output());

        $calculator->equals();
        $this->assertEquals(19, $calculator->output());
    }

    /** @test */
    public function testing_calculator_subtracts_numbers()
    {
        $calculator = new Calculator();

        $calculator->pressNumber(1);
        $this->assertEquals(1, $calculator->output());

        $calculator->pressNumber(3);
        $this->assertEquals(13, $calculator->output());

        $calculator->sub();
        $this->assertEquals(13, $calculator->output());

        $calculator->pressNumber(3);
        $this->assertEquals(3, $calculator->output());

        $calculator->equals();
        $this->assertEquals(10, $calculator->output());
    }

    /** @test */
    public function testing_calculator_multiplies_numbers()
    {
        $calculator = new Calculator();

        $calculator->pressNumber(1);
        $this->assertEquals(1, $calculator->output());

        $calculator->pressNumber(0);
        $this->assertEquals(10, $calculator->output());

        $calculator->times();
        $this->assertEquals(10, $calculator->output());

        $calculator->pressNumber(3);
        $this->assertEquals(3, $calculator->output());

        $calculator->equals();
        $this->assertEquals(30, $calculator->output());
    }

    /** @test */
    public function testing_calculator_divides_numbers()
    {
        $calculator = new Calculator();

        $calculator->pressNumber(1);
        $this->assertEquals(1, $calculator->output());

        $calculator->pressNumber(0);
        $this->assertEquals(10, $calculator->output());

        $calculator->divide();
        $this->assertEquals(10, $calculator->output());

        $calculator->pressNumber(2);
        $this->assertEquals(2, $calculator->output());

        $calculator->equals();
        $this->assertEquals(5, $calculator->output());
    }

    /** @test */
    public function testing_calculator_handles_decimal_numbers()
    {
        $calculator = new Calculator();

        $calculator->pressNumber(1);
        $this->assertEquals(1, $calculator->output());

        $calculator->point();
        $this->assertEquals(1., $calculator->output());

        $calculator->pressNumber(2);
        $this->assertEquals(1.2, $calculator->output());

        $calculator->add();
        $this->assertEquals(1.2, $calculator->output());

        $calculator->pressNumber(1);
        $this->assertEquals(1, $calculator->output());

        $calculator->point();
        $this->assertEquals(1., $calculator->output());

        $calculator->pressNumber(2);
        $this->assertEquals(1.2, $calculator->output());

        $calculator->equals();
        $this->assertEquals(2.4, $calculator->output());
    }
}