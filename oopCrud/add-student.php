<?php
require_once 'header.php';
require_once 'studentClass.php';

use oopcrud\studentClass\studentClass as student;

$student = new student();

if (isset($_POST['addStudent'])) {
    $name = $student->clean($_POST['name']);
    if ($student->vallidation($name)) {
        if ($student->addStudent($name)) {
            $bsAlert = "<div class='alert alert-success alert-dismissible fade show' role='alert' >" . $student->msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            $bsAlert = "<div class='alert alert-danger alert-dismissible' role='alert' >" . $student->msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 py-5">
            <h2>Add New Student</h2>
            <form action="" method="post" class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control <?= $student->errName !== null ? 'is-invalid' : null ?>" id="name" name="name" value="<?= $student->oldName ?>">
                    <div class="invalid-feedback">
                        <?= $student->errName ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="addStudent">Add Student</button>
            </form>
            <?= $bsAlert ?? null ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>