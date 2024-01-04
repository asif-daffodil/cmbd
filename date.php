<?php
date_default_timezone_set("Asia/Dhaka");

// mktime(hour, minute, second, month, day, year)
$myBirthday = mktime(12, 5, 3, 9, 10, 2024);
echo Date("F-d-Y h:i:s A l", $myBirthday) . "<br>";

// strtotime(time)

$myBirthday2 = strtotime("10 September 2024");
echo Date("F-d-Y h:i:s A l", $myBirthday2) . "<br>";

$myStrTime = strtotime("tomorrow");
echo Date("F-d-Y h:i:s A l", $myStrTime) . "<br>";

$myStrTime2 = strtotime("next Sunday");
echo Date("F-d-Y h:i:s A l", $myStrTime2) . "<br>";

$myStrTime3 = strtotime("+2 Months");
echo Date("F-d-Y h:i:s A l", $myStrTime3) . "<br>";

$myStrTime4 = strtotime("+2 Years +3 Months -5 Days");
echo Date("F-d-Y h:i:s A l", $myStrTime4) . "<br>";

$myStrTime5 = strtotime("+1 Week", $myBirthday2);
echo Date("F-d-Y h:i:s A l", $myStrTime5) . "<br>";

// Next 7 fridays
$startDate = strtotime("next Friday");
$endDate = strtotime("+6 Weeks", $startDate);

while ($startDate <= $endDate) {
    echo Date("F-d-Y /l;", $startDate) . "<br>";
    $startDate = strtotime("+1 Week", $startDate);
}
