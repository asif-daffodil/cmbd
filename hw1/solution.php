<?php
// Electric bill calculation (For first 50 units – 3.50 tk/unit For next 100 units – 4.00m tk/unit For next 100 units – 5.20 tk/unit For units above 250 – 6.50 tk/unit)

$eBill = 200;
if ($eBill <= 50) {
    echo 3.50 * $eBill;
} elseif ($eBill <= 150) {
    echo (3.50 * 50) + (4 * ($eBill - 50));
} elseif ($eBill <= 250) {
    echo (3.50 * 50) + (4 * 100) + (5.20 * ($eBill - 150));
} else {
    echo (3.50 * 50) + (4 * 100) + (5.20 * 100) + (6.50 * ($eBill - 250));
}

echo '<br>';

// A PHP calculator using switch case (Addition, Subtraction, Multiplication, Division)

$num1 = 2;
$num2 = 3;
$operator = '*';

switch ($operator) {
    case '+':
        echo $num1 + $num2;
        break;
    case '-':
        echo $num1 - $num2;
        break;
    case '*':
        echo $num1 * $num2;
        break;
    case '/':
        echo $num1 / $num2;
        break;
    default:
        echo "Invalid operator";
}

echo '<br>';

// Check if a person is eligible to vote by age (18 or more than 18)

$age = 18;

if ($age >= 18) {
    echo "You are eligible voter!";
} else {
    echo "Sorry, You are not eligible voter";
}

echo '<br>';

// Check if a person is eligible for marriage in BD by gender.
$gender = "Female";
$age = 18;

if ($gender == "Female") {
    if ($age >= 18) {
        echo "You are eligible for marriage";
    } else {
        echo "You are not eligible for marriage";
    }
} elseif ($gender == "Male") {
    if ($age >= 21) {
        echo "You are eligible for marriage";
    } else {
        echo "You are not eligible for marriage";
    }
}

echo '<br>';

// Check if a number is positive, negative or zero.

$num = 0;

if ($num > 0) {
    echo "Positive";
} elseif ($num < 0) {
    echo "Negative";
} else {
    echo "Zero";
}

echo '<br>';

// Check if number is odd or even.

$num = 0;

if ($num % 2 == 0) {
    echo "Even";
} else {
    echo "Odd";
}

echo '<br>';

// Check if data is integer or string

$data = "5";

if (is_int($data)) {
    echo "Integer";
} elseif (is_string($data)) {
    echo "String";
} else {
    echo "Invalid data";
}
