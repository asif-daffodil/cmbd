<?php
class magicClass
{
    public $myName = "Asif Abir";
    public $unknownProperty = [];

    public function __get($name)
    {
        if (isset($this->unknownProperty[$name])) {
            echo $this->unknownProperty[$name];
        } else {
            echo "You are trying to access non-existing or private property ($name)";
        }
    }

    public function __set($name, $value)
    {
        $this->unknownProperty[$name] = $value;
    }

    public function __call($name, $arguments)
    {
        echo "You are calling an undefined function $name";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "You are calling an undefined static function $name";
    }
}

$magicObject = new magicClass;
echo $magicObject->myName;
echo "<br>";
echo $magicObject->myAge;
echo "<br>";
$magicObject->myAge = 36;
echo $magicObject->myAge;
$magicObject->myCity = "Dhaka";
echo "<br>";
echo $magicObject->myCity;
echo "<br>";
$magicObject->myFunction();
echo "<br>";
magicClass::myStaticFunction();
