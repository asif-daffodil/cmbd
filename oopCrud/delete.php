<?php
require_once 'header.php';
require_once 'studentClass.php';

use oopcrud\studentClass\studentClass as student;

$student = new student();
$id = $_GET['id'] = isset($_GET['id']) ? $_GET['id'] : header('Location: ./');
$studentData = $student->getSingleData('students', $id);
$studentData->num_rows != 1 ? header('Location: ./') : null;
$data = $studentData->fetch_object();


if (isset($_POST['delStudent'])) {
    $id = $student->clean($_POST['id']);
    if ($student->deleteStudent($id)) {
        $bsAlert = "<div class='alert alert-success alert-dismissible fade show' role='alert' >" . $student->msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo "<script>setTimeout(() => {window.location.href = './';}, 2000);</script>";
    } else {
        $bsAlert = "<div class='alert alert-danger alert-dismissible' role='alert' >" . $student->msg . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 py-5">
            <h2>Delete Student</h2>
            <h3>Do you raly want to delete <?= $data->name ?> </h3>
            <div class="mb-3">
                <form action="" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?= $data->id ?>">
                    <button type="submit" class="btn btn-primary" name="delStudent">Yes</button>
                </form>
                <a href="./" class="btn btn-success">No</a>
            </div>
            <?= $bsAlert ?? null ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>