<?php
    session_start();
    require_once "config/database.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_info_q = "SELECT * FROM users WHERE email = ? AND password = ?";
    /* already you are using connections from another file then why do you need execution function ? */
    // $db_connection = $conn->prepare($user_info_q);`
    // $db_connection->execute([
    //     ':email' => $email,
    //     ':password' => $password
    // ]);
    // $user = $db_connection->fetch(PDO::FETCH_ASSOC);

    $user = ExecuteSelect($user_info_q, [$email, $password]);
    
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