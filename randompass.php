<?php
$chars = date('YFdDHhisla') . uniqid() . rand(0, 9999999999) . "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@#$%^&*";
$sflStr = str_shuffle($chars);
echo substr($sflStr, 0, 8);
?>
<br>
<a href="./randompass.php">
    <button>Random Password</button>
</a>