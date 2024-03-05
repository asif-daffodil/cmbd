<?php
require_once 'header.php';
require_once 'classes/updateProfile.php';

use classes\updateProfile\updateProfile as updateProfile;

$updateProfile = new updateProfile();

if (isset($_POST['updateImg'])) {
    $id = $session->getSession('user')['id'];
    $img = $_FILES['image'];
    if ($updateProfile->validateProfileImg($img)) {
        if ($updateProfile->updateProfileImg($img, $id)) {
            $msg = "<div class='alert alert-success'>Profile image updated successfully</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Profile image update failed</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Invalid file type</div>";
    }
}
?>

<div class="container">
    <div class="row my-5">
        <div class="col-md-5 p-5 mx-auto border rounded shadow text-center">
            <h3 class="text-center">Change profile image</h3>
            <?= $msg ?? "" ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <img src="./Assets/images/<?= ($session->getSession('user')['img'] == null) ? 'profileImage.jpg' : $session->getSession('user')['img'] ?>" alt="profile image" class="img-fluid">
                    <div class="mb-3">
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="updateImg">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>