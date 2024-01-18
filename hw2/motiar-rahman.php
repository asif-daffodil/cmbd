<?php 

function clean($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}




if (isset($_POST['sub123']) && $_SERVER ['REQUEST_METHOD'] == "POST") {
    $name = clean($_POST['name']);
    $email = clean($_POST['email']); 
    $gender = clean($_POST['gender'] ?? null); 
    $skills = $_POST['skills'] ?? null; 

    if (empty($name)) {
        $errName = "Name Is Required";
    } elseif (!preg_match("/^[a-zA-Z. ]*$/", $name)) {
        $errName = "Only letters Whitespace allowed";
    }else {
        $crrName = $name;
    } 
    
    if (empty($email)) {
        $errEmail = "Email is required";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errEmail = "Please enter a valid email"; 
        } else {
            $crrEmail =$email;
          }

      if (empty($gender)){
        $errGender = "Please Select gender";
      }
      
      if  (empty($skills)){
        $errSkills = "Please Select Skill";
      } else {
        $crrSkills = $skills;
      }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 style="text-align:center">Form Valiadition!</h1>

       <div class="container">
        <div class="row min-vh-100 d-flex">
            <div class="col-md-6 m-auto border rounded shadow p-4">
                <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                    <div class="mb-3 form-floating">
                    <input type="text" placeholder="Please Enter Your Name" name="name" class="form-control <?= isset($errName) ? 'is-invalid' : null ?><?= isset($crrName) ? 'is-valid' : null?>" value="<?= $name ?? null ?>">
                    <label for="" class= "label">Your name  </label>
                  <div class="invalid-feedback"><?= $errName ?? null ?></div>
                  <div class="valid-feedback"> <?= $crrName ?? null ?></div>
                  
                  <br>
                  <div class="mb-3 form-floating">
                  <input type="text" placeholder="Please Enter Your Email" name="email" class="form-control <?= isset($errEmail) ? 'is-invalid' : null ?><?= isset($crrEmail) ? 'is-valid' : null?>" value="<?= $email ?? null ?>">
                    <label for="" class= "label">Your Email  </label>
                  <div class="invalid-feedback"><?= $errEmail ?? null ?></div>
                  <div class="valid-feedback"> <?= $crrEmail ?? null ?></div>
                  </div>
                    </div>
                   
                   
                   
                    <div class="mb-3 py-3 rounded border <?= isset($errGender) ? 'border-danger' :null ?> <?= isset($ender) ? 'border-success' :null ?> ">

                  <div class="form-check-inline">
                    <label for="" class="form-check-label form-check">Gender</label>
                  </div>
                        <div for="" class="form-check-inline ">
                          <input type="radio" name="gender" id="mail" value="Mail" class="form-check-input" <?= isset($gender) && $gender== "Mail" ? "checked": null ?>> 
                          <label for="mail">Male</label>
                        </div>
                        <div for="" class="form-check-inline ">
                          <input type="radio" name="gender" id="female" value="Femail" class="form-check-input" <?= isset($gender) && $gender== "Femail" ? "checked": null ?>> 
                          <label for="female">Female</label>
                        </div>
                        
                    </div >
                    <div class=" form-check-inline <?= isset($errGender) ? 'text-danger' : (isset($gender) ? 'text-success' : null)?>">
                          <?=  $errGender?? $gender ?? null?>
                        </div>

                    <div class=" py-3 border rounded mb-3 <?= isset ($errSkills) ? 'border-danger' : (isset($crrSkills) ? "border-success" : null)?>">
                      <div class="form-check-inline form-check">
                        Skill: 
                      </div>
                      <div class="form-check-inline form-check">
                        <input type="checkbox" class="from-check-input" id="html" name="skills[]" value="HTML" <?= isset($crrSkills) && in_array("HTML", $crrSkills)? "checked" : null?>>
                        <label for="html" class="form-check-label">HTML</label>
                      </div>
                      <div class="form-check-inline form-check">
                        <input type="checkbox" class="from-check-input" id="css" name="skills[]" value="CSS" <?= isset($crrSkills) && in_array("CSS", $crrSkills)? "checked" : null?>>
                        <label for="css" class="form-check-label">CSS</label>
                      </div>
                      <div class="form-check-inline form-check">
                        <input type="checkbox" class="from-check-input" id="js" name="skills[]" value="JS" <?= isset($crrSkills) && in_array("JS", $crrSkills)? "checked" : null?>>
                        <label for="js" class="form-check-label">JS</label>
                      </div>
                      <div class="form-check-inline form-check">
                        <input type="checkbox" class="from-check-input" id="php" name="skills[]" value="PHP" <?= isset($crrSkills) && in_array("PHP", $crrSkills)? "checked" : null?>>
                        <label for="php" class="form-check-label">PHP</label>
                      </div>

                    </div>
                    <div class="mb-3 <?= isset($errSkills) ? 'text-danger' : (isset($skills) ? 'text-success' : null)?>">
                      <?= $errSkills ?? null?>

                      <?php
                      if (isset($skills)) {
                     foreach ($skills as $skills) {
                      echo $skills . ",";
                    }
                  }
                      
                      ?>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-dark btn-sm" name="sub123">


                </form>
            </div>
        </div>
       </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>