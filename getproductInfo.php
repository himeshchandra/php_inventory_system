<?php

require_once "config/database.php";

$product_id = $_POST['product_id'];
$product_info = "SELECT 
(SELECT COALESCE(SUM(CASE WHEN type = 'IN' THEN quantity ELSE 0 END),0) - COALESCE(SUM(CASE WHEN type = 'OUT' THEN quantity ELSE 0 END),0) AS current_stock FROM stock_transactions WHERE product_id = ?) AS cur_stock,
 product_code, category FROM products WHERE id = ?";

$db_connection = $conn->prepare($product_info);
$db_connection->execute([$product_id,$product_id]);

$product_data = $db_connection->fetch(PDO::FETCH_ASSOC);
echo json_encode([
    'success' => true,
    'data' => $product_data
]);
