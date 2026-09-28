<?php
$host ="localhost";
$dbname = "inventory";
$username = "root";
$password = "";
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
    function ExecuteSelect($query, $values){
        global $conn;
        $stmt = $conn->prepare($query);
        $stmt->execute($values);
        $data = $stmt->fetch();
        return $data;
    }


}catch(PDOException $e){
    echo "Database connection failed";
}
?>