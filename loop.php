<?php
// start point
// end point
// increment/decrement

//  while loop

$x = 0;
while ($x < 10) {
    echo $x . ", ";
    $x++;
}

echo "<br>";

//  do while loop
$y = 35;
do {
    echo $y . ", ";
    $y++;
} while ($y < 10);

echo "<br>";

for ($i = 6; $i <= 100; $i += 6) {
    if ($i == 42) {
        continue;
    }
    if ($i % 6 == 0) {
        echo $i . ", ";
    }
    if ($i >= 66) {
        break;
    }
}

echo "<br>";

// foreach loop
$colors = ["red", "green", "blue", "yellow"];
foreach ($colors as $value) {
    echo $value . ", ";
}
echo "<br>";

$ghor = 15;
for ($i = 1; $i <= 10; $i++) {
    echo $ghor . " x " . $i . " = " . $ghor * $i . "<br>";
}
