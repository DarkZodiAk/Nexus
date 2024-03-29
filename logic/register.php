<?php
session_start(["use_strict_mode" => true]);
require '../db/dbconnect.php';
unset($_SESSION['regmessage']);
if(isset($_POST['username']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
    $result = $conn->query("SELECT * FROM users WHERE email = '".$_POST['login']."'")->rowCount();

    if($result == 0){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];


        if($password == $confirm_password){
            $conn->query("INSERT INTO nexus.`users`(username, email, password)
                VALUES ('".$_POST['username']. "', '" .$_POST['login']. "', '" .MD5($password)."')");
            $user_id = $conn->lastInsertId();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['user_id'] = $user_id;
            header("Location: ../index.php");
            die();
        } else {
            $_SESSION['regmessage'] = 'Неверно подтвержден пароль!';
            header("Location: ../index.php?page=register");
            die();
        }
    } else {
        $_SESSION['regmessage'] = 'Пользователь с такой почтой уже существует!';
        header("Location: ../index.php?page=register");
        die();
    }
}