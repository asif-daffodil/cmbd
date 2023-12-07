<?php
// if statement
$age = 15;
if ($age <= 12) {
    echo "You are a child";
} elseif ($age <= 19) {
    echo "You are a teenager";
} elseif ($age <= 30) {
    echo "You are a adult";
} elseif ($age <= 50) {
    echo "You are a middle aged person";
} elseif ($age > 50) {
    echo "You are an old person";
} else {
    echo "You are not eligible to vote";
}

echo "<br>";

// switch statement
$day = "Saturday";

switch ($day) {
    case "Saturday":
        echo "Today is Saturday";
        break;
    case "Sunday":
        echo "Today is Sunday";
        break;
    case "Monday":
        echo "Today is Monday";
        break;
    case "Tuesday":
        echo "Today is Tuesday";
        break;
    case "Wednesday":
        echo "Today is Wednesday";
        break;
    case "Thursday":
        echo "Today is Thursday";
        break;
    case "Friday":
        echo "Today is Friday";
        break;
    default:
        echo "Invalid day";
}

echo "<br>";

$myAge = 38;
switch ($myAge) {
    case ($myAge <= 30):
        echo "Your are a young person";
        break;
    default:
        echo "Your are an old person";
}

$myCity = "Dhaka";
if ($myCity == "Dhaka") {
    echo "You are from Dhaka";
} else {
    echo "You are not from Dhaka";
}

echo ($myCity == "Dhaka") ? "You are from Dhaka" : "You are not from Dhaka";

if (isset($country)) {
    echo $country;
} else {
    echo "Country is not set";
}

echo (isset($country)) ? $country : "Country is not set";

echo $country ?? "Country is not set";
