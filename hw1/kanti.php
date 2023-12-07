<?php


//i. Electric bill calculation

echo '<br><p style="color:gray;">i. Electric bill calculation</p>';

$eBill = 200;
if ($eBill <= 50) {
    echo 'Total used unit ' . $eBill . ' * 3.50 (unit price) : BDT = ' . $eBill * 3.50;
} elseif ($eBill <= 100) {
    echo 'Total used unit ' . $eBill . ' * 4 (unit price) : BDT = ' . $eBill * 4;
} elseif ($eBill <= 150) {
    echo 'Total used unit ' . $eBill . ' * 5.20 (unit price) : BDT = ' . $eBill * 5.20;
} elseif ($eBill <= 250) {
    echo 'Total used unit ' . $eBill . ' * 6.50 (unit price) : BDT = ' . $eBill * 6.50;
} else {
    echo 'Total used unit ' . $eBill . ' * undefine (unit price) : BDT = ' . $eBill * 7.50;
}


//ii. A PHP calculator using switch case...

echo '<br><p style="color:gray;">ii. A PHP calculator using switch case...</p>';

$myMarks = 80;
switch ($myMarks) {
    case ($myMarks >= 33 && $myMarks < 60):
        echo "You passed";
        break;
    case ($myMarks >= 60 && $myMarks < 75):
        echo "You are pased with Grade - B";
        break;
    case ($myMarks >= 75 && $myMarks < 80):
        echo "You passed with Grade - A";
        break;
    case ($myMarks >= 80):
        echo "Congratulations! You apassed with Grade - A+";
        break;
    default:
        echo "Sorry, You are failed";
}


//iii. Check if a person is eligible to vote by age....

echo '<br><p style="color:gray;">iii. Check if a person is eligible to vote by age....</p>';

$voterAge = 18;

if ($voterAge >= 18) {
    echo "You are eligible voter!";
} else {
    echo "Sorry, You are not eligible voter";
}


//iv. Check if a person is eligible to marriage in BD by gender... 

echo '<br><p style="color:gray;">iv. Check if a person is eligible to marriage in BD by gender...</p>';

$myGender1 = "Male";
$myGender2 = "Female";
if ($myGender1 ==  "Male" && $myGender2 == "Female") {
    echo "Congratulation! You are eligible to marriage.";
} else {
    echo "Sorry! You are not eligible to marriage.";
}


//v. Check if number is positive or negetive... 

echo '<br><p style="color:gray;">v. Check if number is positive or negetive...</p>';

$myNum = -55.33;
if (isset($myNum)) {
    if (substr(strval($myNum), 0, 1) == "-") {
        echo "Your number is negetive";
    } else {
        echo "Your number is positive";
    }
}

// vi. Check if number is odd or even...

echo '<br><p style="color:gray;">vi. Check if number is odd or even...</p>';

$myNumber = 77;

if ($myNumber % 2 == 0) {
    echo "Even";
} else {
    echo "Odd";
}


// vii. Check if data is interger or sting...

echo '<br><p style="color:gray;">vii. Check if data is interger or sting...</p>';


$checkNumber = "Jamal";

var_dump($checkNumber);
