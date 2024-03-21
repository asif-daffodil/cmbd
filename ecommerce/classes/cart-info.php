<?php
require_once 'db.php';
$cart = $_GET['cart'];
$cart = explode(',', $cart);
// convert cart into associative array depend on value count
$cart = array_count_values($cart);
// get product info from db
$query = "SELECT * FROM products WHERE id IN (" . implode(',', array_keys($cart)) . ")";
$result = $conn->query($query);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['count'] = $cart[$row['id']]; // Add product count to each product
        $products[] = $row;
    }
}
// calculate total price
$total = 0;
foreach ($products as $product) {
    $total += $product['discount_price'] * $product['count']; // Use product count in calculation
}
echo json_encode(['products' => $products, 'total' => $total]);
