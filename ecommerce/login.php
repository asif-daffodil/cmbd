<?php
require_once 'header.php';
require_once 'classes/loginClass.php';


use classes\login\loginClass as login;

$login = new login();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($login->login($email, $password)) {
        $msg = '<div class="alert alert-success" role="alert">Login successful</div>';
        echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
    } else {
        $msg = '<div class="alert alert-danger" role="alert">Login failed</div>';
    }
}

if ($session->getSession('user')) {
    header('location: index.php');
    exit;
}

?>
<div class="container"></div>
<div class="container">
    <div class="row py-5">
        <div class="col-md-5 mx-auto border rounded shadow p-5">
            <h2>Login</h2>
            <?= $msg ?? null ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
            <!-- sign up form link -->
            <p class="mt-3 small">Don't have an account? <a href="./signup.php">Sign up</a></p>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>