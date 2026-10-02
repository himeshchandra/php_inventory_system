<?php
$host = "localhost";
$dbname = "inventory";
$username = "root";
<<<<<<< HEAD
$password = "123456";

// $host ="sql112.infinityfree.com";
// $dbname = "if0_43022414_inventory";
// $username = "if0_43022414";
// $password = "1J2a3m4m5y";

try{
=======
$password = "";
try {
>>>>>>> 61aaeb39810136ac0766730fc77cbf10521d0f5a
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    // echo "Database connected successfully";
} catch (PDOException $e) {
    echo "Database connection failed" . $e->getMessage();
}
