<?php

namespace CalculatorSystem;

use Exception;

class Calculator
{
    protected array $history = [];

    protected array $input = [];

    public function output()
    {
        // gets the last element in the array
        $lastInput = end($this->input);

        // if it is a number input stores the last element
        // if it is not a number it gets the element stored in the previous index
        if(is_numeric($lastInput)){
            $output = $lastInput;
            } else {
            $output = $this->input[count($this->input)-2];
                }

        // returns the most recent number
        return $output;
    }

    public function isOperation($input): bool
    {
        // checks if the operations listed
        return in_array($input, ["+", "-", "*", "/"]);
    }

    public function equals(): Calculator
    {
        // declares current variable
        $total = null;
        $lastOperation = null;

        // loops through array
        foreach ($this->input as $input){
            // if element in array is an operation
            if ($this->isOperation($input)){
                // store the operation in variable and continue loop
                $lastOperation = $input;
                continue;
            } else{
                // otherwise if the total variable is null
                if ($total == null){
                    // store the first element and continue the loop
                    $total = $input;
                    continue;
                }

                // if elseif and else statement goes through all the valid operators and calculates the array accordingly
                if ($lastOperation == "+"){
                    $total += $input;
                } elseif ($lastOperation == "-"){
                    $total -= $input;
                } elseif ($lastOperation == "*"){
                    $total *= $input;
                } elseif ($lastOperation == "/"){
                    $total /= $input;
                } else{
                    throw new Exception('Operation parsed in is not valid for this calculator');
                }
            }
        }

        // adds the sum to the array
        $this->input[] = $total;

        // returns array
        return $this;
    }

    public function generateOutput(): Calculator
    {
        // declaring variables
        $values = $this->history;
        $arr = [];
        $char = "";

        // loops through the array
        foreach ($values as $num){
            // if element in the array is a number or has a "."
            if(is_numeric($num) || $num == "."){
                //stores and concatenates the numbers that come after each other storing them as one number
                $char .= $num;

              // else if the element in the array is not a number
            } elseif (!is_numeric($num)){
                // and the char variable is not empty
                if (!empty($char)){
                    // adds everything stored in the char variable to the array
                    $arr[] = $char;
                    // makes the variable empty again
                    $char = "";
                }
                // adds the non-numeric element e.g. "+" to the array
                $arr[] = $num;
            }
        }
        // if there is something still stored in the char variable add that to the end of the array
        if (!empty($char)){
            $arr[] = $char;
        }

        // stores the array into the class property input
        $this->input = $arr;

        // returns the array
        return $this;
    }

    public function pressNumber(float $newInput): Calculator
    {
        // adds new number to the array
        $this->history[] = $newInput;

        // calls the generateOutput() function
        $this->generateOutput();

        // returns array
        return $this;

    }

    public function add(): Calculator
    {
        // adds string to the array
        $this->history[] = "+";

        // calls generateOutput() function
        $this->generateOutput();

        // returns array
        return $this;
    }

    public function sub(): Calculator
    {
        // adds string to the array
        $this->history[] = "-";

        // calls generateOutput() function
        $this->generateOutput();

        // returns array
        return $this;
    }

    public function times(): Calculator
    {
        // adds string to the array
        $this->history[] = "*";

        // calls generateOutput() function
        $this->generateOutput();

        // returns array
        return $this;
    }

    public function divide(): Calculator
    {
        // adds string to the array
        $this->history[] = "/";

        // calls generateOutput() function
        $this->generateOutput();

        // returns array
        return $this;
    }

    public function point(): Calculator
    {
        // adds string to the array
        $this->history[] = ".";

        // calls generateOutput() function
        $this->generateOutput();

        // returns array
        return $this;
    }


}

