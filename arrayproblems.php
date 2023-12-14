<?php
// Find maximum number from an array:
$numbers = [12, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90, 23, 45, 67, 89, 34, 56, 78, 90];
$max = max($numbers);
echo $max;
echo "<br>";

// Find 2nd max number from an array:
rsort($numbers);
$uniqueNumbers = array_values(array_unique($numbers));
echo $uniqueNumbers[1];
echo "<br>";

// Sort array from min to max:
$smallnum = [2, 3, 4, 7];
sort($smallnum);
print_r($smallnum);
echo "<br>";

// Calculate average number of an array:
$avg = array_sum($smallnum) / count($smallnum);
echo $avg;
echo "<br>";

strtolower("HELLO WORLD");

$username = 'john_doe';
$existingUsernames = array('jane_doe', 'john_doe', 'user123');
$isUnique = !in_array($username, $existingUsernames);
echo $isUnique ? 'Username is unique.' : 'Username already exists.';
echo "<br>";

$list1 = 'apple, orange, banana';
$listArr = explode(',', $list1);
print_r($listArr);
echo "<br>";

$names = ['John', 'Jane', 'James'];
$namesStr = implode(' ', $names);
echo $namesStr;

// Check if all values are string or not:
$names = ['John', 'Jane', 'James', 123];
echo "<br>";

$allString = array_filter($names, 'is_string');
echo count($names) === count($allString) ? 'All values are string.' : 'All values are not string.';
echo "<br>";

$data = array('name' => 'John', 'age' => 25, 'city' => 'New York');
$allowedKeys = array('name', 'city');
$filteredData = array_intersect_key($data, array_flip($allowedKeys));
print_r($filteredData);
