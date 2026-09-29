<?php
require_once "config/database.php";

$product_name = $_POST['product_name'];
$product_code = $_POST['product_code'];
$category = $_POST['category'];
$unit = $_POST['unit'];
$purchase_price = $_POST['purchase_price'];
$selling_price = $_POST['selling_price'];
$minimum_stock = $_POST['minimum_stock'];
try {
    $product_insert_query = "INSERT INTO products (`product_name`,`product_code`,`category`,`unit`,`purchase_price`,`selling_price`,`minimum_stock`) 
                             VALUES (?,?,?,?,?,?,?)";
    $db_connection = $conn->prepare($product_insert_query);
    $affectedRows =  $db_connection->execute([
        $product_name,
        $product_code,
        $category,
        $unit,
        $purchase_price,
        $selling_price,
        $minimum_stock
    ]);
    if($db_connection->rowCount() > 0){
        header("Location:products.php");
    }else{
        echo "Insertion Failed";
    }
} catch (PDOException $e) {
    echo "Inserted failed" . $e->getMessage();
}
