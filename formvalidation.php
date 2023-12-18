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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap 5.1.3 css cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row min-vh-100 d-flex">
            <div class="col-md-6 m-auto border rounded shadow p-4">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
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
                    <input type="submit" class="btn btn-dark btn-lg" name="sub123">
                </form>
            </div>
        </div>
    </div>

    <!-- bootstrap 5.1.3 js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>