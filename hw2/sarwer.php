<?php

function clean($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}


if (isset($_POST['sub123']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = clean($_POST['name']);
  $email = clean($_POST['email']);
  $gender = clean($_POST['gender'] ?? null);
  $skills = $_POST['skills'] ?? null;

  if (empty($name)) {
    $errName = "Name is required";
  } elseif (!preg_match('/^[A-Za-z. ]*$/', $name)) {
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


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>

  <div class="container">
    <div class="row min-vh-100 d-flex">
      <div class="col-md-6 m-auto border rounded shadow p-4 ">
        <form action="<?= $_SERVER['PHP_SELF']  ?>" method="post">
          <div class="mb-3 form-floating">
            <input type="text" placeholder="Your Name" name="name" class="form-control <?= isset($errName) ? 'is-invalid' : null ?> <?= isset($crrName) ? 'is-valid' : null ?>  " value="<?= $name ?? null ?>">
            <label for="" class="">Your Name</label>
            <div class="invalid-feedback">
              <?= $errName ?? null ?>
            </div>
            <div class="valid-feedback">
              <?= $crrName ?? null ?>
            </div>
          </div>
          <div class="mb-3 form-floating ">
            <input type="email" placeholder="Your Email" name="email" class="form-control <?= isset($errEmail) ? 'is-invalid' : null ?> <?= isset($crrEmail) ? 'is-valid' : null ?>  " value="<?= $email ?? null ?>">
            <label for="" class="">Your Email</label>
            <div class="invalid-feedback">
              <?= $errEmail ?? null ?>
            </div>
            <div class="valid-feedback">
              <?= $crrEmail ?? null ?>
            </div>
          </div>

          <div class="mb-3 py-3 border rounded shadow-sm <?= isset($errGender) ? 'border-danger' : null ?>  <?= isset($gender) ? 'border-success' : null ?>">
            <!-- Gender  -->
            <div for="" class="form-check form-check-inline">

              <label class="form-check-label">Gender :</label>
            </div>

            <div for="" class="form-check form-check-inline">
              <input type="radio" value="Male" class="form-check-input" id="male" name="gender" <?= isset($gender) && $gender == "Male" ? "checked" : null ?>>
              <label for="male" class="form-check-label">Male</label>
            </div>
            <div for="" class="form-check form-check-inline">
              <input type="radio" value="Female" class="form-check-input" id="female" name="gender" <?= isset($gender) && $gender == "Female" ? "checked" : null ?>>
              <label for="female" class="form-check-label">Female</label>
            </div>
            <!-- <div for="" class="form-check form-check-inline">
              <input type="radio" value="Other" class="form-check-input" id="other" name="gender">
              <label for="other" class="form-check-label">Other</label>
            </div> -->

            <div class=" <?= isset($errGender) ? "text-danger " : (isset($gender) ? "text-success" : null) ?> ">
              <?= $errGender ?? $gender ?? null ?>
            </div>

          </div>

          <div class="border  py-3 rounded  shadow-sm <?= isset($errSkills) ? "border-danger" : (isset($crrSkills) ? 'border-success' : null)  ?> ">
            <div class="form-check form-check-inline">
              Skills:
            </div>
            <div class="form-check form-check-inline ">
              <input type="checkbox" class="form-check-input" id="html" name="skills[]" value="HTML" <?= isset($crrSkills) && in_array("HTML", $crrSkills) ? 'checked' : null  ?>>
              <label for="html" class="form-check-label">HTML</label>
            </div>
            <div class="form-check form-check-inline ">
              <input type="checkbox" class="form-check-input" id="css" name="skills[]" value="CSS" <?= isset($crrSkills) && in_array("CSS", $crrSkills) ? 'checked' : null  ?>>
              <label for="css" class="form-check-label">CSS</label>
            </div>
            <div class="form-check form-check-inline ">
              <input type="checkbox" class="form-check-input" id="js" name="skills[]" value="JS" <?= isset($crrSkills) && in_array("JS", $crrSkills) ? 'checked' : null  ?>>
              <label for="js" class="form-check-label">JS</label>
            </div>
            <div class="form-check form-check-inline ">
              <input type="checkbox" class="form-check-input" id="php" name="skills[]" value="PHP" <?= isset($crrSkills) && in_array("PHP", $crrSkills) ? 'checked' : null  ?>>
              <label for="php" class="form-check-label">PHP</label>
            </div>

          </div>

          <div class="<?= isset($errSkills) ? 'text-danger ' : (isset($skills) ? 'text-success' : null)  ?> mb-3">
            <?= $errSkills ?? null ?>
            <?php
            if (isset($skills)) {
              foreach ($skills as $skills) {
                echo $skills . ",";
              }
            }

            ?>

          </div>

          <input type="submit" value="Submit" class="btn btn-dark btn-lg" name="sub123">
        </form>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
  </script>
</body>

</html>