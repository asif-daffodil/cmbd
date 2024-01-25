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
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $skills = $_POST['skills'] ?? [];
    $skillsStr = implode(", ", $skills);

    $name = $conn->real_escape_string($name);
    $city = $conn->real_escape_string($city);

    $result = $conn->query("UPDATE `users` SET `name`='$name',`city`='$city', `gender` = '$gender', `subject` = '$subject', `skill` = '$skillsStr'  WHERE `id`= $id");

    if ($result) {
        echo "Student Updated Successfully";
        echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
    } else {
        echo "Student Not Updated";
    }
}

if (isset($_POST['ustp'])) {
    $pic = $_FILES['pic'];
    $picName = $pic['name'];
    $picTmpName = $pic['tmp_name'];
    $picSize = $pic['size'];
    $picError = $pic['error'];
    $picType = $pic['type'];

    $picExt = explode('.', $picName);
    $picActualExt = strtolower(end($picExt));

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($picActualExt, $allowed)) {
        if ($picError === 0) {
            if ($picSize < 10000000) {
                $picNameNew = uniqid('', true) . "." . $picActualExt;
                $picDestination = "./uploads/" . $picNameNew;
                $move = move_uploaded_file($picTmpName, $picDestination);
                if ($move) {
                    $result = $conn->query("UPDATE `users` SET `img`='$picNameNew' WHERE `id`= $id");
                    if ($result) {
                        $delFile = unlink("./uploads/" . $row->img);
                        if ($delFile) {
                            echo "Student Updated Successfully";
                            echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
                        }
                    } else {
                        echo "Student Not Updated";
                    }
                } else {
                    echo "File Not Uploaded";
                }
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "You cannot upload files of this type";
    }
}

?>
<h2>Edit Stident</h2>
<form action="" method="post">
    <input type="text" placeholder="Student Name" name="name" required minlength="3" value="<?= $row->name ?>">
    <br><br>
    <input type="text" placeholder="Student City" name="city" required minlength="3" value="<?= $row->city ?>">
    <br><br>
    Gender:
    <input type="radio" name="gender" value="Male" <?= $row->gender == "Male" ? "checked" : null ?> required>Male
    <input type="radio" name="gender" value="Female" <?= $row->gender == "Female" ? "checked" : null ?> required>Female
    <br><br>
    <select name="subject" required>
        <option value="">--Select Subject--</option>
        <option value="PHP" <?= $row->subject == "PHP" ? "selected" : null ?>>PHP</option>
        <option value="Python" <?= $row->subject == "Python" ? "selected" : null ?>>Python</option>
        <option value="Java" <?= $row->subject == "Java" ? "selected" : null ?>>Java</option>
    </select>
    <br><br>
    Skills :
    <input type="checkbox" name="skills[]" value="PHP" <?= isset($skills) && in_array("PHP", $skills) ? "checked" : (!isset($skills) && in_array("PHP", explode(", ", $row->skill)) ? "checked" : null) ?>>PHP
    <input type="checkbox" name="skills[]" value="Python" <?= isset($skills) && in_array("Python", $skills) ? "checked" : (!isset($skills) && in_array("Python", explode(", ", $row->skill)) ? "checked" : null) ?>>Python
    <input type="checkbox" name="skills[]" value="Java" <?php
                                                        if (isset($skills) && in_array("Java", $skills)) {
                                                            echo "checked";
                                                        } elseif (!isset($skills) && in_array("Java", explode(", ", $row->skill))) {
                                                            echo "checked";
                                                        }
                                                        ?>>Java
    <br><br>
    <input type="submit" value="Update Student" name="ust">
</form>
<br><br>
<h2>Change Image</h2>
<label for="getPic">
    <img src="./uploads/<?= $row->img ?>" alt="" width="150" id="showImg">
</label>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="pic" id="getPic" style="display: none;">
    <br><br>
    <input type="submit" value="Change image" name="ustp">
</form>

<script>
    const getPic = document.querySelector("#getPic");
    const showImg = document.querySelector("#showImg");
    getPic.addEventListener("change", () => {
        const [file] = getPic.files;
        if (file) {
            showImg.src = URL.createObjectURL(file);
        }
    })
</script>

<?php
require_once("./footer.php");
?>