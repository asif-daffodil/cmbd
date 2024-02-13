<?php

class testClass
{
    public $name = "Asif Abir";
    protected $age = 36;
    private $email = "asif@dti.ac";
    public const dob = "1987-09-10";

    public function myFunction()
    {
        return $this->name . " " . $this->age . " " . $this->email;
    }

    public function __construct()
    {
        echo "This is constructor<br>";
    }

    public function __destruct()
    {
        echo "<br>This is destructor";
    }
}

$testObject = new testClass;
echo $testObject->name;
echo "<br>";
echo testClass::dob;
echo "<br>";
echo $testObject::dob . "<br>";

// echo $testObject->age;


class otherTestClass extends testClass
{
    public function myOtherFunction()
    {
        return $this->name . " " . $this->age;
    }
}

$otherTestObject = new otherTestClass;
