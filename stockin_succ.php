<?php
session_start();
require_once "config/database.php";
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$user_id = $_SESSION['user_name'];
$type = "IN";
if ($product_id && $quantity && $user_id) {
    $stockIns = "INSERT INTO `stock_transactions`(`product_id`, `type`, `quantity`, `user_id`) VALUES (?,?,?,?)";
    $db_connection = $conn->prepare($stockIns);
    $db_connection->execute([
        $product_id,
        $type,
        $quantity,
        $user_id
    ]);
    header("Location: stock.php");
} else {
    echo "Insertion Failed<br>";
    echo "Product ID: " . $product_id . "<br>";
    echo "Type: " . $type . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "User ID: " . $user_id;
}
