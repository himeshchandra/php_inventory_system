<?php
session_start();
require_once "config/database.php";
$supplier_name = $_POST['supplier_name'];
$purchase_date = $_POST['purchase_date'];
$product_id = $_POST['product_id'];
$quantity = (float) $_POST['quantity'];
$purchase_price = (int) $_POST['purchase_price'];
$sub_total = $quantity * $purchase_price;
try {
    $conn->beginTransaction();
    $purchase_query  = "INSERT INTO `purchase`(`supplier_name`, `purchase_date`, `total_amount`) VALUES (?,?,?)";
    $db_connection = $conn->prepare($purchase_query);
    $db_connection->execute([
        $supplier_name,
        $purchase_date,
        $sub_total
    ]);

    $purchase_id = $conn->lastInsertId();

    $purchase_item_query  = "INSERT INTO `purchase_items`(`purchase_id`, `product_id`, `quantity`, `purchase_price`, `sub_total`) VALUES (?,?,?,?,?)";
    $db_connection = $conn->prepare($purchase_item_query);
    $db_connection->execute([
        $purchase_id,
        $product_id,
        $quantity,
        $purchase_price,
        $sub_total
    ]);

    $type = "IN";
    $user_id = $_SESSION['user_name'];

    $stock_ins = "INSERT INTO `stock_transactions`(`product_id`, `type`, `quantity`, `user_id`) VALUES (?,?,?,?)";
    $db_connection = $conn->prepare($stock_ins);
    $db_connection->execute([$product_id, $type, $quantity, $user_id]);
    $conn->commit();
    header("location: purchase.php");
} catch (Exception $e) {
    if($conn->inTransaction()){
        $conn->rollBack();
    }
    echo $e->getMessage();
}
