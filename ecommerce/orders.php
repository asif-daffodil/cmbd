<?php
require_once 'header.php';
require_once './classes/orders.php';

use classes\orders\Orders as Orders;

$orders = new Orders();

if (isset($_POST['changeOrderStatus'])) {
    $status = $_POST['status'];
    $orderId = $_POST['orderId'];
    $upStatus = $orders->updateOrderStatus($status, $orderId);
    if ($upStatus) {
        echo "<script>toastr.success('" . $upStatus . "');</script>";
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once './components/sidebar.php';
        ?>
        <div class="col-md-10 ms-auto">
            <h1 class="">All Orders</h1>
            <?php if (count($orders->getOrders()) > 0) { ?>
                <table class="table table-bordered" id="orders">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                            <th>Receiver Name</th>
                            <th>Email</th>
                            <th>Receiver Phone</th>
                            <th>Receiver Address</th>
                            <th style="width: 200px">update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders->getOrders() as $order) { ?>
                            <tr>
                                <td><?php echo $order['name'] ?></td>
                                <td><?php echo $order['quantity'] ?></td>
                                <td><?php echo $order['total_price'] ?></td>
                                <td><?php echo $order['payment_method'] ?></td>
                                <td><?php echo $order['receiver_name'] ?></td>
                                <td><?php echo $order['email'] ?></td>
                                <td><?php echo $order['receiver_phone'] ?></td>
                                <td><?php echo $order['receiver_address'] ?></td>
                                <td>
                                    <form action="" class="d-flex" method="post">
                                        <input type="hidden" name="orderId" value="<?= $order['orderId'] ?>">
                                        <select name="status" id="status" class="form-control">
                                            <option value=""><?= $order['status'] ?></option>
                                            <option value="pending" <?php echo $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="processing" <?php echo $order['status'] == 'processing' ? 'selected' : '' ?>>Processing</option>
                                            <option value="completed" <?php echo $order['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-success btn-sm" name="changeOrderStatus">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-warning">No orders found</div>
            <?php } ?>
        </div>
    </div>
</div>


<?php
require_once 'footer.php';
?>