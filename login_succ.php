<?php
    session_start();
    require_once "config/database.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_info_q = "SELECT * FROM users WHERE email = :email AND password = :password";
    $db_connection = $conn->prepare($user_info_q);
    $db_connection->execute([
        ':email' => $email,
        ':password' => $password
    ]);
    $user = $db_connection->fetch(PDO::FETCH_ASSOC);
    if($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        header("Location: dashboard.php");
        exit;
    }else{
        header("Location: index.php?error=Invalid Username or Password");
        exit;
    }
    
?>