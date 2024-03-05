<?php
require_once 'header.php';
require_once 'classes/updateProfile.php';

use classes\updateProfile\updateProfile as updateProfile;

$updateProfile = new updateProfile();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id = $session->getSession('user')['id'];
    if ($updateProfile->updateProfile($name, $email, $address, $id)) {
        $msg = "<div class='alert alert-success'>Profile updated successfully</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Profile update failed</div>";
    }
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-5 mx-auto border rounded">
            <h3 class="text-center">Update profile</h3>
            <?= $msg ?? "" ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $session->getSession('user')['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $session->getSession('user')['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?= $session->getSession('user')['city'] ?>" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'footer.php';  ?>