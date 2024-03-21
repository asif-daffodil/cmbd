<?php
require_once 'orders.php';

use classes\orders\Orders as Orders;

$order = new Orders();

if (isset($_POST['add_order'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];
    $payment_method = $_POST['payment_method'];
    $receiver_name = $_POST['receiver_name'];
    $email = $_POST['email'];
    $receiver_phone = $_POST['receiver_phone'];
    $receiver_address = $_POST['receiver_address'];
    $order->createOrder($user_id, $product_id, $quantity, $total_price, $payment_method, $receiver_name, $email, $receiver_phone, $receiver_address);
    echo json_encode(['message' => 'Order placed successfully!']);
    exit;
}
