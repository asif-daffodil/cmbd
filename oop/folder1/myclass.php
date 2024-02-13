<?php
// namespace
namespace folder1;

class myStaticClass
{
    protected static $myStaticName = "Asif Abir";

    public static function myStaticFunction()
    {
        return myStaticClass::$myStaticName;
    }

    protected function __construct()
    {
        echo "This is constructor<br>";
    }
}
