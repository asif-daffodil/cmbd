<?php

function clean($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['sub123']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $gender = $_POST['gender'] ?? null;
    $skills = $_POST['skills'] ?? null;

    if (empty($name)) {
        $errName = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z. ]*$/", $name)) {
        $errName = "Only Alphabets and white space allowed";
    } else {
        $crrName = $name;
    }
    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
        $errEmail = "Invalid Email";
    } else {
        $crrEmail = $email;
    }
    if (empty($gender)) {
        $errGender = "Gender is required";
    } else {
        $crrGender = $gender ?? null;
    }
    if (empty($skills)) {
        $errSkills = "Skills is required";
    } else {
        $crrSkills = $skills ?? null;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation</title>
  <!-- bootstrap css cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row min-vh-100 d-flex">
    <div class="col-md-6 m-auto border rounded shadow p-4">
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
      <!-- Name -->
        <div class="mb-3 form-floating ">
          <input type="text" placeholder="Enter Name" name="name" value= "<?=$name ?? null;?>" class="form-control <?=isset($errName) ? 'is-invalid' : null?> <?=isset($crrName) ? 'is-valid' : null;?>">
          <label for="" class="form-label">Enter Name</label>
          <div class="invalid-feedback">
            <?=$errName ?? null;?>
          </div>
          <div class="valid-feedback ">
          <?=$crrName ?? null;?>
          </div>
        </div>
        <!-- Email -->
        <div class="mb-3 form-floating ">
          <input type="text" placeholder="Enter Email" name="email" value="<?=$email ?? null;?>" class="form-control <?=isset($errEmail) ? 'is-invalid' : null?> <?=isset($crrEmail) ? 'is-valid' : null;?> ">
          <label for="">Enter Email</label>
          <div class="invalid-feedback">
            <?=$errEmail ?? null;?>
          </div>
          <div class="valid-feedback">
            <?=$crrEmail ?? null;?>
          </div>
        </div>
          <!-- Gender -->
          <div class="mb-2 form-floating border rounded py-3 <?=isset($errGender) ? 'border-danger' : 'text-secondary'?> <?=isset($crrGender) ? 'border-success' : null?>">
            <div class="form-check form-check-inline">
              <label class="form-check-label">Gender : </label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" value ="Male" name="gender" id ="male" class="form-check-input" <?=isset($gender) && $gender == 'Male' ? 'checked' : null?>>
              <label for="male" class="form-check-label">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="gender" value="Female" id="female" class="form-check-input" <?=isset($gender) && $gender == 'Female' ? 'checked' : null?>>
              <label for="female" class="form-check-label">Female</label>
            </div>
          </div>
            <div class="<?=isset($errGender) ? 'text-danger' : (isset($gender) ? 'text-success' : null)?>">
                <?=$errGender ?? $gender ?? null;?>
            </div>
            <!-- skills -->
            <div class="mb-3 form-floating border rounded py-3  <?=isset($errSkills) ? 'border-danger' : (isset($skills) ? 'border-success' : null);?>">
              <div class="form-check form-check-inline">
                <label class="form-check-label">Skills : </label>
              </div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" id="php" value="php" class="form-check-input" <?=isset($skills) && in_array('php', $skills) ? 'checked' : null?>>
                <label for="php" class="form-check-label">PHP</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" id="javascript" value="javascript" class="form-check-input" <?=isset($skills) && in_array('javascript', $skills) ? 'checked' : null?>>
                <label for="javascript" class="form-check-label">Javascript</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" id="python" value="python" class="form-check-input" <?=isset($skills) && in_array('python', $skills) ? 'checked' : null?>>
                <label for="python" class="form-check-label">Python</label>
              </div>
            </div>
            <div class="<?=isset($errSkills) ? 'text-danger' : (isset($skills) ? 'text-success' : null);?>">
              <?=$errSkills ?? null;?>
              <?php
if (isset($skills)) {
    foreach ($skills as $skill) {
        echo ucfirst($skill) . ', ';}
}?>
            </div>
            <input type="submit" class="btn btn-dark btn-lg" name="sub123">
      </form>
    </div>
  </div>
</div>

<!-- bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
