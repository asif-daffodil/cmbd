<?php
require_once './classes/db.php';
// latest 6 products
$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 6";
$result = $conn->query($sql);
$product = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 display-6 text-center py-5">
            Latest Products
        </div>
    </div>
    <div class="row">
        <?php foreach ($product as $p) : ?>
            <div class="col-md-2">
                <div class="card">
                    <img src="./Assets/images/<?= $p['img'] ?>" class="card-img-top" alt="..." style="height: 160px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title d-inline overflow-hidden w-100 text-black" style="text-overflow: ellipsis; white-space: nowrap;"><?= $p['name'] ?></h5>
                        <!-- regular_price -->
                        <div>
                            <span class="card-text text-decoration-line-through text-muted "><?= $p['regular_price'] ?></span>
                            <!-- discount_price -->
                            <span class="card-text"><?= $p['discount_price'] ?></span>
                        </div>
                        <button class="btn btn-primary addCartBtn" data-id="<?= $p['id'] ?>">Add to Cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>