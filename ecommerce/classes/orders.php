<?php

namespace classes\orders;

require_once 'db.php';

class Orders
{
    private $conn;
    public function __construct()
    {
        $this->conn = $GLOBALS['conn'];
    }

    public function createOrder($user_id, $product_id, $quantity, $total_price, $payment_method, $receiver_name, $email, $receiver_phone, $receiver_address)
    {
        $query = "INSERT INTO orders (user_id, product_id, quantity, total_price, payment_method, receiver_name, email, receiver_phone, receiver_address) VALUES ('$user_id', '$product_id', '$quantity', '$total_price', '$payment_method', '$receiver_name', '$email', '$receiver_phone', '$receiver_address')";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrders()
    {
        $query = "SELECT orders.id As orderId, orders.user_id, orders.quantity, orders.	total_price, orders.payment_method, orders.status, orders.receiver_name, orders.email, orders.receiver_phone, orders.receiver_address, products.name FROM orders INNER JOIN products ON orders.product_id = products.id ORDER BY orders.id DESC";
        $result = $this->conn->query($query);
        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orders[] = $row;
            }
        }
        return $orders;
    }

    public function updateOrderStatus($status, int $orderId)
    {
        $query = "UPDATE `orders` SET `status` = '$status' WHERE `id` = $orderId";
        $update = $this->conn->query($query);
        if ($update) {
            // retuen mysql result
            return $orderId;
        } else {
            return false;
        }
    }
}
