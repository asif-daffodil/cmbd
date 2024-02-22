<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function showUpdateForm(id) {
        $("#updateStudentForm").removeClass("d-none");
        $("#updateStudentForm").find("button").attr("id", id);
        $("#addStudentForm").addClass("d-none");
        $.get({
            url: "./crud.php",
            data: {
                getSingleStudent: true,
                id: id
            },
            success: function(response) {
                var data = JSON.parse(response);
                $("#updateStudentForm").find("input").val(data.name);
            }
        });
    }

    function deleteStudent(id) {
        var confirm = window.confirm("Are you sure you want to delete this student?");
        if (confirm) {
            $.post({
                url: "./crud.php",
                data: {
                    id: id,
                    deleteStudnet: true
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        alert(data.success);
                        window.location.reload();
                    } else {
                        alert(data.err);
                    }
                }
            });
        }
    }

    $(document).ready(function() {
        $("#addStudentForm").submit(function(e) {
            e.preventDefault();
            var studentName = $(this).find("input").val();
            var btnName = $(this).find("button").attr("name");
            $.post({
                url: "./crud.php",
                data: {
                    studentName: studentName,
                    addStudnet: btnName
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        alert(data.success);
                        window.location.reload();
                    } else {
                        alert(data.err);
                    }
                }
            });
        });

        $.get({
            url: "./crud.php",
            data: {
                getAllStudents: true
            },
            success: function(response) {
                var data = JSON.parse(response);
                var html = "";
                data.forEach(function(item) {
                    html += `
                    <li class="list-group-item position-relative">${item.name} 
                    <div class=" d-inline-block position-absolute top-50 end-0 translate-middle ">
                        <button class="btn btn-sm btn-warning" onclick="showUpdateForm(${item.id})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteStudent(${item.id})">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>
                    </li>
                    `;
                });
                $(".students").html(html);
            }
        });

        $("#updateStudentForm").submit(function(e) {
            e.preventDefault();
            var studentName = $(this).find("input").val();
            var btnName = $(this).find("button").attr("name");
            var id = $(this).find("button").attr("id");
            $.post({
                url: "./crud.php",
                data: {
                    studentName: studentName,
                    id: id,
                    updateStudnet: btnName
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        alert(data.success);
                        window.location.reload();
                    } else {
                        alert(data.err);
                    }
                }
            });
        });
    });
</script>
</body>

</html>