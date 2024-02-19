<?php
require_once 'header.php';
require_once 'studentClass.php';

use oopcrud\studentClass\studentClass as student;

$student = new student();
$pageNo = $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : header('Location: ./?page=1');
$limit = 5;
$startPoint = ($pageNo - 1) * $limit;
$totalStudents = $student->getAllData('students');
$totalPage = ceil($totalStudents->num_rows / $limit);
$allStudents = $student->getAllData('students', $startPoint, $limit);
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 py-3">
            <?php if ($allStudents->num_rows > 0) { ?>
                <table class="table table-dark table-striped table-hover">
                    <tr>
                        <th>S.N.</th>
                        <th>Student Name</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = $startPoint + 1;
                    while ($row = $allStudents->fetch_object()) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id=<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                            <li class="page-item"><a class="page-link <?= $i == $pageNo ? 'active' : null; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    No data found
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>