<?php

function clean($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST['sub123']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $gender = clean($_POST['gender'] ?? null);
    $skills = $_POST['skils'] ?? null;

    if (empty($name)) {
        $errName = "Name is required";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "Only letters and white space allowed";
    } else {
        $crrName = $name;
    }

    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $crrEmail = $email;
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    }

    if (empty($skills)) {
        $errSkills = "Please select your skills";
    } else {
        $crrSkills = $skills;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Validation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>

    <div class="container ">
        <div class="row min-vh-100 d-flex">
            <div class="col-md-6 m-auto border rounded shadow p-3">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-dataS">

                    <div class="text-center">
                        <h1>From Validation</h1>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" placeholder="Your Name" name="name" class="form-control <?= isset($errName) ? 'is-invalid' : null; ?> <?= isset($crrName) ? 'is-valid' : null ?>" value="<?= $name ?? null ?>">
                        <label for="" class="">Your Name</label>
                        <div class="invalid-feedback ">
                            <?= $errName ?? null ?>
                        </div>
                        <div class="valid-feedback ">
                            <?= $crrName ?? null ?>
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" placeholder="Your Email" name="email" class="form-control <?= isset($errEmail) ? 'is-invalid' : null; ?> <?= isset($crrEmail) ? 'is-valid' : null ?>" value="<?= $email ?? null ?>">
                        <label for="" class="">Your Email</label>
                        <div class="invalid-feedback ">
                            <?= $errEmail ?? null ?>
                        </div>
                        <div class="valid-feedback ">
                            <?= $crrEmail ?? null ?>
                        </div>
                    </div>
                    <div class="py-3 rounded border shadow-sm <?= isset($errGender) ? 'border-danger' : null ?> <?= isset($gender) ? "border-success" : null ?>">
                        <div for="" class="form-check form-check-inline">
                            <label class="form-check-label">Gender : </label>
                        </div>
                        <div for="" class="form-check form-check-inline">
                            <input type="radio" value="Male" class="form-check-input" id="male" name="gender" <?= isset($gender) && $gender == "Male" ? "checked" : null ?>>
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div for="" class="form-check form-check-inline">
                            <input type="radio" value="Female" class="form-check-input " id="female" <?= isset($gender) && $gender == "Female" ? "checked" : null ?> name="gender">
                            <label for="female" class="form-check-label">Female</label>
                        </div>
                        <div for="" class="form-check form-check-inline">
                            <input type="radio" value="other" class="form-check-input " id="other" <?= isset($gender) && $gender == "Other" ? "checked" : null ?> name="gender">
                            <label for="other" class="form-check-label">Other</label>
                        </div>
                    </div>
                    <div class="<?= isset($errGender) ? 'text-danger' : (isset($gender) ? "text-success" : null) ?> mb-3">
                        <?= $errGender ?? $gender ?? null ?>
                    </div>
                    <div class="border py-3 rounded shadow-sm <?= isset($errSkills) ? 'border-danger' : (isset($crrSkills) ? 'border-success' : null) ?>">
                        <div class="form-check form-check-inline">
                            Skills :
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="html" name="skils[]" value="HTML" <?= isset($crrSkills) && in_array("HTML", $crrSkills) ? 'checked' : null ?>>
                            <label for="html" class="form-check-label">HTML</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="css" name="skils[]" value="CSS" <?= isset($crrSkills) && in_array("CSS", $crrSkills) ? 'checked' : null ?>>
                            <label for="css" class="form-check-label">CSS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="js" name="skils[]" value="JS" <?= isset($crrSkills) && in_array("JS", $crrSkills) ? 'checked' : null ?>>
                            <label for="js" class="form-check-label">JS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="php" name="skils[]" value="PHP" <?= isset($crrSkills) && in_array("PHP", $crrSkills) ? 'checked' : null ?>>
                            <label for="php" class="form-check-label">PHP</label>
                        </div>
                    </div>
                    <div class="<?= isset($errSkills) ? 'text-danger' : (isset($skills) ? "text-success" : null) ?> mb-3">
                        <?= $errSkills ?? null ?>
                        <?php
                        if (isset($skills)) {
                            foreach ($skills as $skill) {
                                echo $skill . ", ";
                            }
                        }
                        ?>
                    </div>

                    <input type="submit" class="btn btn-dark btn-lg btn-center" name="sub123">
            </div>
            </form>
        </div>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>