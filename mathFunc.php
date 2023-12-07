<?php
// math functions
$y = 5.9123456;
echo round($y) . "<br>";
echo ceil($y) . "<br>";
echo floor($y) . "<br>";
echo pi() . "<br>";
echo min(0, 150, 30, 20, -8, -200) . "<br>";
echo max(0, 150, 30, 20, -8, -200, 200) . "<br>";
echo abs(-6.7) . "<br>";

// get two value after decimal point
echo number_format(pi(), 2) . "<br>";
echo rand() . "<br>";
echo uniqid() . "<br>";
echo rand(1, 100) . "<br>";
echo mt_rand(1, 100) . "<br>";
echo sqrt(100) . "<br>";
echo pow(2, 3) . "<br>";
