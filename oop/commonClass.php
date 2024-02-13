<?php
require_once "./folder1/myclass.php";
require_once "./folder2/myclass.php";

use folder1\myStaticClass as folder1;
use folder2\myStaticClass as folder2;

echo folder1::myStaticFunction();
echo "<br>";
echo folder2::myStaticFunction();
