<?php
require_once("./header.php");
$id = $_GET['id'] ?? header("location:./");
$id = $conn->real_escape_string($id);
$sql = "SELECT * FROM `users` WHERE `id`='$id'";
$result = $conn->query($sql);
$result->num_rows == 0 ? header("location:./") : null;
$row = $result->fetch_object();
if (isset($_POST['ust'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];

    $name = $conn->real_escape_string($name);
    $city = $conn->real_escape_string($city);

    $result = $conn->query("UPDATE `users` SET `name`='$name',`city`='$city' WHERE `id`=$id");
    if ($result) {
        echo "Student Updated Successfully";
        echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
    } else {
        echo "Student Not Updated";
    }
}
?>
<h2>Edit Stident</h2>
<form action="" method="post">
    <input type="text" placeholder="Student Name" name="name" required minlength="3" value="<?= $row->name ?>">
    <br><br>
    <input type="text" placeholder="Student City" name="city" required minlength="3" value="<?= $row->city ?>">
    <br><br>
    <input type="submit" value="Update Student" name="ust">
</form>
<?php
require_once("./footer.php");
?>