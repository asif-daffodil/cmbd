<?php
if (isset($_FILES['img'])) {
    $img = $_FILES['img'];
    $imgName = $img['name'];
    $imgType = $img['type'];
    $imgTmpName = $img['tmp_name'];
    $imgError = $img['error'];
    $imgSize = $img['size'];

    $imgExt = explode('.', $imgName);
    $imgActualExt = strtolower(end($imgExt));

    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    if (in_array($imgActualExt, $allowed)) {
        if ($imgError === 0) {
            if ($imgSize < 100000) {
                $imgNewName = uniqid('', true) . "." . $imgActualExt;
                $imgDestination = 'uploads/' . $imgNewName;
                move_uploaded_file($imgTmpName, $imgDestination);
                echo "success";
            } else {
                echo "Maximum file size is 100kb And your image size is $imgSize $imgType";
            }
        } else {
            echo "error uploading file";
        }
    } else {
        echo "file type not allowed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img" id="imgFile">
        <input type="radio" name="gender" value="M">Male
        <input type="radio" name="gender" value="F">Female
        <input type="submit" value="upload image">
    </form>
    <img src="" alt="" id="imgTag" style="max-width: 600px;">

    <script>
        const imgFile = document.getElementById('imgFile');
        const imgTag = document.getElementById('imgTag');

        imgFile.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    imgTag.setAttribute('src', this.result);
                });
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>