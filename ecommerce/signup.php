<?php
require_once 'header.php';
require_once 'classes/registrationClass.php';

use classes\registration\registrationClass as registrationClass;

$registration = new registrationClass();

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if ($registration->validation($name, $email, $password)) {
        if ($registration->register($name, $email, $password)) {
            $msg = '<div class="alert alert-success" role="alert">Registration successful</div>';
            echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>";
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Registration failed</div>';
        }
    } else {
        $msg = '<div class="alert alert-danger" role="alert">Email already exists</div>';
    }
}

if ($session->getSession('user')) {
    header('location: index.php');
    exit;
}

?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-5 mx-auto border rounded shadow p-5">
            <h2>Sign Up</h2>
            <?= $msg ?? null ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
            </form>
            <p class="mt-3 small">Already have an account? <a href="./login.php">Log in</a></p>
        </div>
    </div>
</div>


<?php
require_once 'footer.php';
?>