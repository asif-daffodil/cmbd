<?php

function clean($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST["formsub"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean($_POST["name"]);
    $email = clean($_POST["email"]);
    $gender = clean($_POST["gender"] ?? null);
    $skills = $_POST["skills"] ?? null;
    $select = clean($_POST["select"]) ?? null;
    $pass = clean($_POST["pass"]) ?? null;
    $cpass = clean($_POST["cpass"]) ?? null;

    //name
    if (empty($name)) {
        $errName = "Name field can't be empty";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "Name can only contain letters and spaces";
    } else {
        $crrName = $name;
    }

    //email
    if (empty($email)) {
        $errEmail = "Email field can't be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "invalid email format";
    } else {
        $crrEmail = $email;
    }

    //gender
    if (empty($gender)) {
        $errGender = "Please select your gender";
    } else {
        $crrGender = $gender;
    }

    //skills
    if (empty($skills)) {
        $errSkills = "Please select your skills";
    } else {
        $crrSkills = $skills;
    }

    //select
    if (empty($select)) {
        $errSelect = "Please select your division";
    } else {
        $crrSelect = $select;
    }

    // password
    if (empty($pass)) {
        $errPass = "Passwaord is required";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/", $pass)) {
        $errPass = "Provide a strong password";
    } else {
        $crrPass = $pass;
    }

    // confirm password
    if (empty($cpass)) {
        $errCpass = "Confirm password is required";
    } elseif ($pass != $cpass) {
        $errCpass = "Password and confirm password do not matched";
    } else {
        $crrCpass = $cpass;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap 5.1.3 cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="<KEY>" crossorigin="anonymous">
    <title>Form Validation</title>


</head>

<body class="p-5 ">

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 w-75 mt-5 mx-auto w-50">
                <form class="shadow p-5 rounded" action="" method="post">

                    <!-- Name field -->
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Your Name" name="name" class="form-control <?= isset($errName) ? "is-invalid" : null ?> <?= isset($crrName) ? "is-valid" : null; ?> " value="<?= $name ?? null; ?>">
                        <div class="invalid-feedback">
                            <?= $errName ?? null; ?>
                        </div>
                        <div class="valid-feedback ">
                            <?= $crrName ?? null ?>
                        </div>
                        <label for="">Your Name</label>
                    </div>

                    <!-- Email field -->
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Your Email" name="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null; ?> <?= isset($crrEmail) ? "is-valid" : null; ?> ">
                        <label for="">Your Email</label>
                        <div class="invalid-feedback">
                            <?= $errEmail ?? null ?>
                        </div>
                        <div class="valid-feedback ">
                            <?= $crrEmail ?? null ?>
                        </div>
                    </div>

                    <!-- Gender Field -->
                    <div class="form-check-inline border p-3 w-100 rounded <?= isset($errGender) ? "border-danger" : (isset($crrGender) ? "border-success" : null) ?> ">
                        <div class="form-check form-check-inline">
                            <label class="fw-bold">Gender :</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="Male" <?= isset($gender) && $gender == "Male" ? "checked" : null ?>>
                            <label class="form-check-label " for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="<?= isset($errGender) ? "text-danger" : (isset($crrGender) ? "text-success" : null) ?>">
                        <?= $errGender ?? $gender ?? null ?>
                    </div>

                    <!-- Skills Field -->
                    <div class="form-check form-check-inline  border rounded p-3 mt-3 w-100 <?= isset($errSkills) ? "border-danger" : (isset($crrSkills) ? "border-success" : null) ?> ">
                        <div class="form-check form-check-inline">
                            <label class="fw-bold">Skills :</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input " type="checkbox" name="skills[]" id="HTML" value="HTML" <?= isset($crrSkills) && in_array("HTML", $crrSkills) ? "checked" : null ?>>
                            <label class="form-check-label" for="HTML">HTML</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input " type="checkbox" name="skills[]" id="CSS" value="CSS" <?= isset($crrSkills) && in_array("CSS", $crrSkills) ? "checked" : null ?>>
                            <label class="form-check-label" for="CSS">CSS</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input " type="checkbox" name="skills[]" id="JS" value="JS" <?= isset($crrSkills) && in_array("JS", $crrSkills) ? "checked" : null ?>>
                            <label class="form-check-label" for="JS">JS</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input " type="checkbox" name="skills[]" id="PHP" value="PHP" <?= isset($crrSkills) && in_array("PHP", $crrSkills) ? "checked" : null ?>>
                            <label class="form-check-label" for="PHP">PHP</label>
                        </div>
                    </div>
                    <div class="<?= isset($errSkills) ? "text-danger" : (isset($crrSkills) ? "text-success" : null) ?>">
                        <?= $errSkills ?? null ?>
                        <?php
                        if (isset($skills)) {
                            foreach ($skills as $skill) {
                                echo $skill . ", ";
                            }
                        }
                        ?>
                    </div>

                    <!-- Selection field -->
                    <div class="mt-3 py-3 px-4 border rounded d-flex align-items-center <?= isset($errSelect) ? "border-danger" : (isset($crrSelect) ? "border-success" : null); ?> ">
                        <label class="fw-bold ms-3 me-3 w-25 ">Select Division :</label>
                        <select class="form-select w-75" name="select">
                            <option value="">--Select Your Division</option>
                            <option value="Dhaka" <?= isset($select) && $select == "Dhaka" ? "selected" : null; ?>>Dhaka</option>
                            <option value="Rajshahi" <?= isset($select) && $select == "Rajshahi" ? "selected" : null; ?>>Rajshahi</option>
                            <option value="Chattogram" <?= isset($select) && $select == "Chattogram" ? "selected" : null; ?>>Chattogram</option>
                            <option value="Khulna" <?= isset($select) && $select == "Khulna" ? "selected" : null; ?>>Khulna</option>
                            <option value="Barisal" <?= isset($select) && $select == "Barisal" ? "selected" : null; ?>>Barisal</option>
                            <option value="Sylhet" <?= isset($select) && $select == "Sylhet" ? "selected" : null; ?>>Sylhet</option>
                            <option value="Rangpur" <?= isset($select) && $select == "Rangpur" ? "selected" : null; ?>>Rangpur</option>
                            <option value="Mymensingh" <?= isset($select) && $select == "Mymensingh" ? "selected" : null; ?>>Mymensingh</option>
                        </select>
                    </div>
                    <div class="<?= isset($errSelect) ? "text-danger" : (isset($crrSelect) ? "text-success" : null); ?>">
                        <?= $errSelect ?? $crrSelect ?? null; ?>
                    </div>

                    <!-- password -->
                    <div class="mt-3 form-floating rounded">
                        <input type="password" placeholder="Type your password" name="pass" class="form-control <?= isset($errPass) ? "is-invalid" : (isset($crrPass) ? "is-valid" : null); ?> ">
                        <label>Password</label>
                        <div class="invalid-feedback">
                            <?= $errPass ?? null ?>
                        </div>
                        <div class="valid-feedback">
                            <?= password_hash($crrPass, PASSWORD_BCRYPT) ?? null ?>
                        </div>
                    </div>

                    <!-- Confirm password -->
                    <div class="mt-3 form-floating rounded">
                        <input type="password" placeholder="Confirm password" name="cpass" class="form-control <?= isset($errCpass) ? "is-invalid" : (isset($crrCpass) ? "is-valid" : null); ?> ">
                        <label>Confirm Password</label>
                        <div class="invalid-feedback">
                            <?= $errCpass ?? null ?>
                        </div>
                        <div class="valid-feedback">
                            <?= password_hash($crrCpass, PASSWORD_BCRYPT) ?? null ?>
                        </div>
                    </div>

                    <!-- Sumbit Button -->
                    <input type="submit" class="btn btn-primary mt-3 " name="formsub" value="Submit">
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>

    <!-- bootstrap 5.1.3 js cdn link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="<KEY>" crossorigin="anonymous"></script>

</body>

</html>