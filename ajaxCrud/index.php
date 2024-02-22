<?php
require_once './header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 py-5 text-center display-5 ">
            Student Management System
        </div>
        <div class="col-md-6 mx-auto">
            <!-- Add Student Form -->
            <form action="" method="post" id="addStudentForm">
                <div class="input-group">
                    <input type="text" placeholder="Student Name" class="form-control shadow-none ">
                    <button class="btn btn-primary btn-sm" name="addStudnet">Add Student</button>
                </div>
            </form>
            <!-- Students List -->
            <ul class="list-group students my-3">
                <!-- Students will be displayed here -->
            </ul>
            <!-- update studnet form -->
            <form action="" method="post" id="updateStudentForm" class="d-none">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Student Name" class="form-control shadow-none ">
                    <button class="btn btn-warning btn-sm" name="updateStudnet">Update Student</button>
                </div>
                <a href="./" class="btn btn-sm btn-primary d-block">Back</a>
            </form>
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>