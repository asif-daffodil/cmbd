<?php
//  convert PHP data into json data
$data = [
    "name" => "Asif",
    "email" => "asif@dti.ac",
    "gender" => "Male",
    "city" => "Dhaka",
];

// convert PHP data into json data
$jsonData = json_encode($data);
echo $jsonData;

// convert json data into PHP data
$phpData = json_decode($jsonData);
echo "<pre>";
print_r($phpData);
echo "</pre>";
