<?php
require_once("./header.php");
if (isset($_POST['ast'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pic = $_FILES['pic'];
    $picName = $pic['name'];
    $picTmpName = $pic['tmp_name'];
    $picSize = $pic['size'];
    $picError = $pic['error'];
    $picType = $pic['type'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $skills = $_POST['skills'] ?? [];
    $skillsStr = implode(", ", $skills);

    $picExt = explode('.', $picName);
    $picActualExt = strtolower(end($picExt));

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    $checkNameQuery = $conn->query("SELECT * FROM `users` WHERE `name` = '$name'");

    if ($checkNameQuery->num_rows > 0) {
        echo "Student Already Exists";
        echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
        exit;
    } else {
        if (in_array($picActualExt, $allowed)) {
            if ($picError === 0) {
                if ($picSize < 10000000) {
                    $picNameNew = uniqid('', true) . "." . $picActualExt;
                    $picDestination = "./uploads/" . $picNameNew;
                    $move = move_uploaded_file($picTmpName, $picDestination);
                    if ($move) {
                        $name = $conn->real_escape_string($name);
                        $city = $conn->real_escape_string($city);

                        $sql = "INSERT INTO `users`(`name`, `city`, `img`, `gender`, `subject`, `skill` ) VALUES ('$name','$city', '$picNameNew', '$gender', '$subject', '$skillsStr' )";
                        $result = $conn->query($sql);
                        if ($result) {
                            echo "Student Added Successfully";
                            echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
                        } else {
                            echo "Student Not Added";
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
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Student Name" name="name" required minlength="3">
    <br><br>
    <input type="text" placeholder="Student City" name="city" required minlength="3">
    <br><br>
    <input type="file" name="pic" id="getPic">
    <br><br>
    Gender:
    <input type="radio" name="gender" value="Male" required>Male
    <input type="radio" name="gender" value="Female" required>Female
    <br><br>
    <select name="subject" required>
        <option value="">--Select Subject--</option>
        <option value="PHP">PHP</option>
        <option value="Python">Python</option>
        <option value="Java">Java</option>
    </select>
    <br><br>
    Skills :
    <input type="checkbox" name="skills[]" value="PHP">PHP
    <input type="checkbox" name="skills[]" value="Python">Python
    <input type="checkbox" name="skills[]" value="Java">Java
    <br><br>
    <input type="submit" value="Add Student" name="ast">
</form>
<img src="" alt="" style="max-width: 300px;" id="showImg">

<script>
    document.getElementById("getPic").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            if (reader.readyState == 2) {
                document.getElementById("showImg").src = reader.result;
            }
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
<?php
require_once("./footer.php");
?>