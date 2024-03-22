<?php
session_start(["use_strict_mode" => true]);
require '../db/dbconnect.php';
unset($_SESSION['message']);

if (isset($_POST['login'])){
    $result = $conn->query("SELECT * FROM users WHERE email = '".$_POST['login']."'");

    if ($row = $result->fetch()) {
        if (MD5($_POST["password"]) == $row['password']){
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            header("Location: ../index.php");
            die();
        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный пароль!';
            header("Location: ../index.php?page=login");
            die();
        }
    }
    else {
        $_SESSION['message'] = 'Вы ввели неправильную почту!';
        header("Location: ../index.php?page=login");
        die();
    }
}
if ($_GET['logout'] == 1){
    session_unset();
    header("Location: ../index.php");
    die();
}