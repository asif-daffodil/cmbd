<?php
if ($_SERVER['REQUEST_METHOD'] !== "GET") {
    echo "You are not allowed to visit this page";
    exit();
}
$personOne = "Abul mia";

function person()
{
    global $personOne;
    echo $personOne;
}

person();
echo "<br>";

// $_SERVER superglobal
echo $_SERVER['PHP_SELF'] . "<br>";
echo $_SERVER['SERVER_NAME'] . "<br>";
echo $_SERVER['SCRIPT_FILENAME'] . "<br>";
echo $_SERVER['SERVER_PORT'] . "<br>";
echo $_SERVER['REQUEST_URI'] . "<br>";
echo $_SERVER['SCRIPT_NAME'] . "<br>";

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
