<?php
require_once 'header.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 py-5">
            <table class="table mb-3">
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
                <tbody id="selectedProducts">
                </tbody>
            </table>
            <div class="text-end">
                <h3>Total: <span id="total"></span></h3>
            </div>
        </div>
        <div class="col-md-6 py-5">
            <h5 class="mb-3">Delivery Address</h5>
            <form action="" method="post" id="addOrders">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>" id="user_id">
                <div class="mb-3">
                    <input type="text" placeholder="User Name" class="form-control" value="<?= $_SESSION['user']['name'] ?>" name="receiver_name" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="email" value="<?= $_SESSION['user']['email'] ?>">
                    <input type="text" class="form-control disabled" value="<?= $_SESSION['user']['email'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Phone" class="form-control" name="receiver_phone" required>
                </div>
                <!-- payment method check box (Cash on delivery and bkash) -->
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="cash_on_delivery" class="form-check-label"><input type="radio" name="payment_method" value="cash_on_delivery" id="cash_on_delivery" class="form-check-input" checked> Cash on Delivery</label>
                        <label for="bkash" class="form-check-label"><input type="radio" value="bkash" id="bkash" class="form-check-input" name="payment_method"> Bkash</label>
                    </div>
                    <input type="text" placeholder="Transection Number" class="form-control d-none" id="transectionNumber">
                </div>
                <div class="mb-3">
                    <textarea name="receiver_address" id="" cols="30" rows="5" class="form-control" default><?= $_SESSION['user']['city'] ?></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="add_order" id="add_order">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // if cookie not exists, redirect user to index.php
    if (!Cookies.get('cart')) {
        window.location.href = './index.php';
    }

    $("#bkash").click(function() {
        if ($("#bkash").is(":checked")) {
            $("#transectionNumber").removeClass('d-none');
        }
    });

    $("#cash_on_delivery").click(function() {
        if ($("#cash_on_delivery").is(":checked")) {
            $("#transectionNumber").addClass('d-none');
        }
    });

    // get cookie with the name cart
    const checkCart = () => {
        var cart = Cookies.get('cart');
        if (!cart) {
            window.location.href = './index.php';
        }
        if (cart) {
            $.ajax({
                url: './classes/cart-info.php',
                type: 'GET',
                data: {
                    cart: cart
                },
                success: function(data) {
                    // $('#cartInfo').html(data);
                    data = JSON.parse(data);
                    var products = data.products;
                    var total = data.total;
                    var html = '';
                    products.forEach(product => {
                        html += `
                            <tr>
                                <td>${product.name}</td>
                                <td><img src="./Assets/images/${product.img}" alt="${product.name}" style="width: 50px;"></td>
                                <td>${product.discount_price}</td>
                                <td>${product.count}</td>
                                <td>${product.discount_price * product.count}</td>
                                <td>
                                    <button class="btn btn-danger removeProduct" data-id="${product.id}" >Remove</button>
                                </td>
                            </tr>
                            `;
                    });
                    $('#selectedProducts').html(html);
                    $('#total').text(total);
                    $("#addOrders").on('submit', (e) => {
                        e.preventDefault();
                        const user_id = $('#user_id').val();
                        const receiver_name = $('input[name="receiver_name"]').val();
                        const email = $('input[name="email"]').val();
                        const receiver_phone = $('input[name="receiver_phone"]').val();
                        const receiver_address = $('textarea[name="receiver_address"]').val();
                        const payment_method = $('input[name="payment_method"]:checked').val();
                        const transectionNumber = $('input[name="transectionNumber"]').val();
                        const add_order = $('#add_order').val();
                        products.forEach(product => {
                            $.ajax({
                                url: './classes/addOrders.php',
                                type: 'POST',
                                data: {
                                    add_order: add_order,
                                    user_id: user_id,
                                    product_id: product.id,
                                    quantity: product.count,
                                    total_price: product.discount_price * product.count,
                                    payment_method: payment_method,
                                    receiver_name: receiver_name,
                                    email: email,
                                    receiver_phone: receiver_phone,
                                    receiver_address: receiver_address
                                },
                                success: function(res) {
                                    console.log(res);
                                }
                            });
                        });
                        toastr.success('Order placed successfully!');
                        Cookies.remove('cart');
                        setTimeout(() => {
                            window.location.href = './index.php';
                        }, 3000);
                    })
                }
            });
        }
    }

    checkCart();
</script>
<?php
require_once 'footer.php';
?>