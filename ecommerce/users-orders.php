<?php
require_once 'header.php';
// get all orders by userid
$query = "SELECT * FROM orders WHERE user_id = " . $_SESSION['user']['id'];
$result = $conn->query($query);
$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-12 py-5">
            <?php if (count($orders) > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Receiver Name</th>
                            <th>Email</th>
                            <th>Receiver Phone</th>
                            <th>Receiver Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['product_id']; ?></td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo $order['total_price']; ?></td>
                                <td><?php echo $order['payment_method']; ?></td>
                                <td><?php echo $order['status']; ?></td>
                                <td><?php echo $order['receiver_name']; ?></td>
                                <td><?php echo $order['email']; ?></td>
                                <td><?php echo $order['receiver_phone']; ?></td>
                                <td><?php echo $order['receiver_address']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h3>No Orders Found</h3>
            <?php } ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>