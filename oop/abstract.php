<?php

interface myInterface
{
    public function myOtherFunction();
}

trait myTrait
{
    public function myTraitFunction()
    {
        return "This is my trait function";
    }
}


abstract class myAbstractClass implements myInterface
{
    public $myName = "Asif Abir";

    use myTrait;

    public function myFunction()
    {
        return "This is my function";
    }
    abstract public function myOtherFunction();
}

final class myOtherClass extends myAbstractClass
{
    public function myOtherFunction()
    {
        return $this->myTraitFunction();
    }
}

$myObject = new myOtherClass;
echo $myObject->myOtherFunction();
