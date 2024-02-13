<?php
class myClass
{
    public $myName = "Asif Abir";

    public function myFunction()
    {
        return "This is my function";
    }
}

// instance of class

$myObject = new myClass;

echo $myObject->myName;
echo "<br>";
echo $myObject->myFunction();
