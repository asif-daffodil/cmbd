<?php
// try catch
$city = "Dhaka";
try {
    echo "Welcome to " . $city . "<br>";
} catch (Exception $e) {
    echo "Message : " . $e->getMessage() . "<br>";
} finally {
    echo "Finally block";
}
