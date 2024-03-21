<?php
require_once 'header.php';
?>

<div class="container">
    <div class="row" style="min-height: 400px;">
        <div class="col-12 py-5">
            <h1 class="text-center">Cart</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="productsInCart">

                </tbody>
            </table>
            <div class="text-end">
                <h3>Total: <span id="total"></span></h3>
                <a href="./checkout.php" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>