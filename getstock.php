<?php
require_once "functions.php";
$product_id = $_POST['product_id'];
$current_Stock = getAvailableStock($product_id);
echo json_encode([
    'success' => true,
    'data' => $current_Stock
]);
