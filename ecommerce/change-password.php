<?php
require_once 'header.php';
require_once 'classes/updateProfile.php';

use classes\updateProfile\updateProfile as updateProfile;

$updateProfile = new updateProfile();

if (isset($_POST['changePassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $id = $session->getSession('user')['id'];
    if ($updateProfile->validatePassword($currentPassword, $newPassword, $confirmPassword, $id)) {
        if ($updateProfile->updatePassword($newPassword, $id)) {
            $msg = "<div class='alert alert-success'>Password updated successfully</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Password update failed</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Invalid password</div>";
    }
}
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-5 p-5 mx-auto border rounded shadow">
            <h3 class="">Change password</h3>
            <div id="msg"></div>
            <?= $msg ?? "" ?>
            <form action="" method="post" id="changePasswordForm">
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current password</label>
                    <input type="password" name="currentPassword" id="currentPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New password</label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="changePassword">Change password</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once 'footer.php';
?>