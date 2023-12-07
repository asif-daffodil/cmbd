<?php
// indexed array
// $srudentNames = array("Rahim", "Karim", "Rafiq", "Jabbar", "Kamal");
$studentInfo = ["Rahim", 25, true, "null", "Dhaka"];

echo "<pre>";
var_dump($studentInfo);
print_r($studentInfo);
echo "</pre>";
echo gettype($studentInfo) . "<br>";

echo $studentInfo[0] . "<br>";
echo $studentInfo[1] . "<br>";
echo $studentInfo[2] . "<br>";
echo $studentInfo[3] . "<br>";

for ($i = 0; $i < count($studentInfo); $i++) {
    echo $studentInfo[$i] . "<br>";
}

foreach ($studentInfo as $value) {
    echo $value . "<br>";
}

// echo $studentInfo;

// associative array
$studentData = [
    "name" => "Md Kamal",
    "age" => 35,
    "isMale" => true,
    "assets" => 0,
    "address" => "Jourpurhat"
];

echo "<pre>";
print_r($studentData);
echo "</pre>";
echo $studentData["age"] . "<br>";

foreach ($studentData as $k => $val) {
    echo "<div style='color: green'>" . ucfirst($k)  . " : " . $val . "</div>";
}

// multidimensional array
$students = [
    ["Rahim", 25, "Dhaka"],
    ["Karim", 35, "Rajshahi"],
    ["Rafiq", 45, "Khulna"],
    ["Jabbar", 55, "Rongpur"],
    ["Kamal", 65, "Dinajpur", "Kustia", "Faridpur", "Chittagong"]
];

echo "<pre>";
print_r($students);
echo "</pre>";

echo $students[3][2] . "<br>";

foreach ($students as $student) {
    foreach ($student as $key => $value) {
        if ($key == count($student) - 1) {
            echo $value;
        } else {
            echo $value . ", ";
        }
    }
    echo "<br>";
}
// Bangladeshi all cities in array
$bangladeshiCities = [
    "Dhaka",
    "Rajshahi",
    "Khulna",
    "Rongpur",
    "Dinajpur",
    "Kustia",
    "Faridpur",
    "Chittagong",
    "Barishal",
    "Sylhet",
    "Mymensingh",
];

is_array($bangladeshiCities);

?>

<form action="">
    <select>
        <option>--Select City--</option>
        <?php foreach ($bangladeshiCities as $cities) { ?>
            <option><?= $cities; ?></option>
        <?php } ?>
    </select>
</form>