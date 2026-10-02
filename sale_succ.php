<?php
$active = "sales";
session_start();
require_once "config/database.php";
$customer_name = $_POST['customer_name'];
$sale_date = $_POST['sale_date'];
$sale_price = $_POST['sale_price'];
$user_id = $_SESSION['user_name'];

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$user_id = $_SESSION['user_name'];
$type = "OUT";
$sub_total = $sale_price * $quantity;
try {
    if ($product_id <= 0 || $quantity <= 0 || $sale_price <= 0 || !$user_id) {
        die("Invalid sale information.");
    }
    $conn->beginTransaction();
    $stockIns = "INSERT INTO `stock_transactions`(`product_id`, `type`, `quantity`, `user_id`) VALUES (?,?,?,?)";
    $db_connection = $conn->prepare($stockIns);
    $db_connection->execute([
        $product_id,
        $type,
        $quantity,
        $user_id
    ]);
    $sale_ins_q = "INSERT INTO `sales`(`customer_name`, `sale_date`, `total_amount`) VALUES (?,?,?)";
    $db_connection = $conn->prepare($sale_ins_q);
    $db_connection->execute([
        $customer_name,
        $sale_date,
        $sub_total

    ]);
    $sale_id = $conn->lastInsertId();
    $sale_items_ins_q = "INSERT INTO `sale_items`(`sale_id`, `product_id`, `quantity`, `sale_price`, `subtotal`) VALUES (?,?,?,?,?)";
    $db_connection = $conn->prepare($sale_items_ins_q);
    $db_connection->execute([
        $sale_id,
        $product_id,
        $quantity,
        $sale_price,
        $sub_total,
    ]);
    $conn->commit();
    header("Location: sales.php?message=Sale Completed SuccessFully");
} catch (PDOException $e) {
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    header("Location: sales.php?message=Failed to Save the Sale");

    echo "Sale failed: " . $e->getMessage();
}
