<?php
$str = "Hello World";
$pattern = "/wo/i";
echo preg_match($pattern, $str);

echo "<br>";

// preg_match_all() function
$str = "Hello World. Hello Bangladesh.";
$pattern = "/hello/i";
echo preg_match_all($pattern, $str);

echo "<br>";

// preg_replace() function
$str = "Hello World. Hello Bangladesh.";
$pattern = "/hello/i";
$replace = "Hi";
echo preg_replace($pattern, $replace, $str);

echo "<br>";

// regex pattern
// [] - character classes
//  {} - quantifiers
//  () - group
$mobile = "01700123056";
$pattern = "/^01[0-9]{9}$/";
echo preg_match($pattern, $mobile);

echo "<br>";

// regex strong password with spetial carrecter
$password = "Asif@123";
$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/";
echo preg_match($pattern, $password);

echo "<br>";

// regex email validation
$email = "kuddus@boyati.com";
$pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";
echo preg_match($pattern, $email);
