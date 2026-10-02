<?php
$host ="localhost";
$dbname = "inventory";
$username = "root";
$password = "123456";

// $host ="sql112.infinityfree.com";
// $dbname = "if0_43022414_inventory";
// $username = "if0_43022414";
// $password = "1J2a3m4m5y";

try{
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );
$conn->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
    echo "Database connected successfully";

}catch(PDOException $e){
    echo "Database connection failed";
}
?>
