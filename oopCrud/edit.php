<?php
require_once 'header.php';
require_once 'studentClass.php';

use oopcrud\studentClass\studentClass as student;

$student = new student();
$id = $_GET['id'] = isset($_GET['id']) ? $_GET['id'] : header('Location: ./');
function getStudentData()
{
    global $student, $id;
    $studentData = $student->getSingleData('students', $id);
    $studentData->num_rows != 1 ? header('Location: ./') : null;
    return $studentData->fetch_object();
}

$data = getStudentData();

if (isset($_POST['upStudent'])) {
    $name = $student->clean($_POST['name']);
    if ($student->vallidation($name)) {
        if ($student->updateStudent($name, $id)) {
            $bsAlert = "<div class='alert alert-success alert-dismissible fade show' role='alert' >" . $student->msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            $data = getStudentData();
        } else {
            $bsAlert = "<div class='alert alert-danger alert-dismissible' role='alert' >" . $student->msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 py-5">
            <h2>Update Student</h2>
            <form action="" method="post" class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control <?= $student->errName !== null ? 'is-invalid' : null ?>" id="name" name="name" value="<?= $student->oldName ?? $data->name ?>">
                    <div class="invalid-feedback">
                        <?= $student->errName ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="upStudent">Update</button>
            </form>
            <?= $bsAlert ?? null ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>