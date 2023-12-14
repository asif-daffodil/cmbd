<?php
session_start();

$_SESSION['name'] = "Abul Mia";
$_SESSION['city'] = "Dhaka";
$_SESSION['country'] = "Bangladesh";
$_SESSION['kakku'] = "Chacchu";

echo $_SESSION['name'] . "<br>";
