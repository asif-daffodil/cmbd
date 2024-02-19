<?php
if (isset($_GET['data'])) {
    if ($_GET['data'] === 'Assalamu Alaikum') {
        echo 'আসসালামু আলাইকুম';
    } elseif ($_GET['data'] === 'Hello') {
        echo 'Hi';
    } elseif ($_GET['data'] === 'Nomoshkar') {
        echo 'নমস্কার';
    } else {
        echo $_GET['data'];
    }
}

$conn = mysqli_connect('localhost', 'root', '', 'oopcrud');


if (isset($_GET['search'])) {
    if ($_GET['search'] === '') {
        die();
    }
    $result = $conn->query("SElECT * FROM students WHERE name LIKE '%{$_GET['search']}%'");
    echo json_encode($result->fetch_all());
}
