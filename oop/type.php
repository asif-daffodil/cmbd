<?php
class myType
{
    public string $myName = "Asif Abir";

    public function myFunction(): string
    {
        return "This is my function";
    }

    public function myNumber(int $n1, int $n2): int
    {
        return $n1 + $n2;
    }

    public function myfunc(): void
    {
        echo "ha ha ha";
    }
}

$myObject = new myType;

// clone object

$myObject2 = clone $myObject;
