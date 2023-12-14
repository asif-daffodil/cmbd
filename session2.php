<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location: session.php");
}
echo $_SESSION['name'] . "<br>";
echo $_SESSION['city'] . "<br>";
echo $_SESSION['country'] . "<br>";
echo $_SESSION['kakku'] . "<br>";
