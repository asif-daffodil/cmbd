<?php
require_once 'header.php';
if (isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $regular_price = $_POST['regular_price'];
    $discount_price = $_POST['discount_price'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_tmp, "./Assets/images/$img");
    $sql = "INSERT INTO products (`name`, `regular_price`, `discount_price`, `brand`, `description`, `img`) VALUES ('$name', '$regular_price', '$discount_price', '$brand', '$description', '$img')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// get data from products table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// edit product
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $sql = "SELECT * FROM products WHERE id = '$eid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header('location: products.php');
    }
}

// update product
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $regular_price = $_POST['regular_price'];
    $discount_price = $_POST['discount_price'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $eid = $_POST['eid'];
    $sql = "UPDATE products SET `name` = '$name', `regular_price` = '$regular_price', `discount_price` = '$discount_price', `brand` = '$brand', `description` = '$description' WHERE id = '$eid'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product updated successfully');setTimeout(()=>location.href='products.php',1000)</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// upload image and delete the previous image
if (isset($_POST['uploadImg'])) {
    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_tmp, "./Assets/images/$img");
    $sql = "UPDATE products SET `img` = '$img' WHERE id = '$eid'";
    if ($conn->query($sql) === TRUE) {
        unlink("./Assets/images/" . $row['img']);
        echo "<script>alert('Image uploaded successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// delete product
if (isset($_GET['did'])) {
    $did = $_GET['did'];
    // get the image and delete it from the folder
    $sql = "SELECT * FROM products WHERE id = '$did'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    unlink("./Assets/images/" . $row['img']);
    $sql = "DELETE FROM 
    products WHERE id = '$did'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully');setTimeout(()=>location.href='products.php',500)</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once './components/sidebar.php';
        ?>
        <div class="col-md-10 ms-auto">
            <h1 class="">Products</h1>
            <?php if (!isset($_GET['eid'])) { ?>
                <div class="row">
                    <div class="col-md-5">
                        <form action="products.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name mb-3">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Regular price</label>
                                <input type="number" name="regular_price" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Discount price</label>
                                <input type="number" name="discount_price" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Brand</label>
                                <input type="text" name="brand" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Description</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Image</label>
                                <input type="file" name="img" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Discount price</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['discount_price'] ?></td>
                                            <td><?= $row['brand'] ?></td>
                                            <td>
                                                <a href="products.php?eid=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                                <a href="products.php?did=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-5">
                        <form action="products.php" method="post">
                            <div class="form-group">
                                <label for="name mb-3">Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Regular price</label>
                                <input type="number" name="regular_price" class="form-control" value="<?= $row['regular_price'] ?>" required>
                            </div>
                            <input type="hidden" name="eid" value="<?= $row['id'] ?>">
                            <div class="form-group mb-3" value="<?= $row['discount_price'] ?>">
                                <label for="name">Discount price</label>
                                <input type="number" name="discount_price" class="form-control" value="<?= $row['discount_price'] ?>">
                            </div>
                            <div class="form-group mb-3" value="<?= $row['brand'] ?>">
                                <label for="name">Brand</label>
                                <input type="text" name="brand" class="form-control" value="<?= $row['brand'] ?>">
                            </div>
                            <!-- description -->
                            <div class="form-group mb-3" value="<?= $row['description'] ?>">
                                <label for="name">Description</label>
                                <textarea name="description" class="form-control" required><?= $row['description'] ?></textarea>
                            </div>
                            <!-- submit button -->
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </form>
                    </div>

                    <div class="col-md-7">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- upload image -->
                            <div class="form-group">
                                <label for="proImg">
                                    <img src="./Assets/images/<?= $row['img'] ?>" alt="" class="img-fluid mb-3" style="height: 260px">
                                </label>
                                <div class="mb-3">
                                    Click on image to upload a new product image
                                </div>
                                <input type="file" name="img" id="proImg" class="form-control d-none" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="uploadImg">Upload</button>
                        </form>
                    </div>
                </div>
            <?php } ?>

            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
            <?php
            require_once 'footer.php';
            ?>