<?php
require_once('./test2.php');
if (isset($_POST['submit'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    // validation
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (empty($fileName)) {
        $errFile = "<span style='color: red'>Please select a file to upload</span>";
    } elseif (!in_array($fileActualExt, $allowed)) {
        $errFile = "<span style='color: red'>Please select a valid file format</span>";
    } else {
        // check dir uploads
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }

        // crete new name
        $fileNewName = str_shuffle(date('HisAFdYDyl')) . uniqid('', true) . '.' . $fileActualExt;

        // upload file
        $fileUpload = move_uploaded_file($fileTmpName, 'uploads/' . $fileNewName);
        if ($fileUpload) {
            echo "<span style='color: green'>File uploaded successfully</span>";
        } else {
            echo "<span style='color: red'>Something went wrong</span>";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload" name="submit">
</form>
<br>
<?= $errFile ?? null; ?>