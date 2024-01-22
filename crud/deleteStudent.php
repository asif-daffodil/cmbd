<?php
require_once("./header.php");
$id = $_GET['id'] ?? header("location:./");
$id = $conn->real_escape_string($id);
$sql = "SELECT * FROM `users` WHERE `id`='$id'";
$result = $conn->query($sql);
$result->num_rows == 0 ? header("location:./") : null;
$obj = $result->fetch_object();
if (isset($_POST['dst'])) {
    $result = $conn->query("DELETE FROM `users` WHERE `id`=$id");
    if ($result) {
        $delFile = unlink("./uploads/" . $obj->img);
        if ($delFile) {
            echo "Student Deleted Successfully";
            echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
        }
    } else {
        echo "Student Not Deleted";
    }
}
?>
<form action="" method="post">
    <h2>Are you sure you want to delete this student?</h2>
    <input type="submit" value="Yes" name="dst">
    <a href="./"><button type="button">No</button></a>
</form>
<?php
require_once("./footer.php");
?>