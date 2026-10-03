<?php
session_start();
require_once "config/database.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = "staff";
$user_info_q = "SELECT id FROM users WHERE email = ?";
$db_connection = $conn->prepare($user_info_q);
$db_connection->execute([
    $email
]);
$user = $db_connection->fetch(PDO::FETCH_ASSOC);
// var_dump($user);

if ($user) {
    header("Location: register.php?error=Email already Exists");
    exit;
} else {
    $conn->beginTransaction();
    $user_ins_query = "INSERT INTO `users`(`name`, `email`, `password`, `role`, `status`) VALUES (?,?,?,?,?)";
    $db_connection  = $conn->prepare($user_ins_query);
    $db_connection->execute([
        $name,
        $email,
        $password,
        $role,
        "Active"
    ]);
    $affectedRows = $db_connection->rowCount();
    if ($affectedRows > 0) {
        $conn->commit();
        header("Location: index.php?message=Registered Successfully");
        exit;
    } else {
        $conn->rollBack();
    }
}
