<?php
echo $_GET['name'] ?? null;
?>

<form action="" method="get">
    <input type="text" name="name" placeholder="Enter your name">
    <input type="submit" value="Submit">
</form>