<?php
// string
$personName = 'Akram Khan';
var_dump($personName);

echo "<br>";

// integer
$personAge = 25;
var_dump($personAge);

echo "<br>";

// float
$personHeight = 5.8;
var_dump($personHeight);

echo "<br>";

// boolean
$personIsMale = true;
var_dump($personIsMale);

echo "<br>";

// array
// $personHobbies = array("Reading", "Coding", "Gaming");
$personHobbies = ["Reading", 123, true];
var_dump($personHobbies);

echo "<br>";

// object
class personInfo
{
    public $personName = "Akram Khan";
}
$obj = new personInfo;
var_dump($obj);

echo "<br>";

// null
$personName = null;
var_dump($personName);

echo "<br>";

// resource
$personName = fopen("data-types.php", "r");
var_dump($personName);

// single line comment
# this is also a single line comments
/*
    this is 
    a multi line 
    comment
*/
/**
 * this is a doc block
 * this is also a multi line comment
 * this is also a multi line comment
 */

/* kiasdsad
asdasd
addslashesasdas
asdasd */

$x = 123;
$x = 231;

define("y", 321);
