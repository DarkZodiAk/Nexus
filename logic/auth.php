<?php
session_start(["use_strict_mode" => true]);
unset($_SESSION['message']);

if (isset($_POST['login'])){
    if ($_POST["login"] == "evgeny") {
        if ($_POST["password"] == "12345"){
            $_SESSION['username'] = "evgeny";
            $_SESSION['message'] = 'Вы успешно вошли в систему';
            header("Location: ../index.php");
            die();
        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный пароль!';
            header("Location: ../index.php");
            die();
        }
    }
    else {
        $_SESSION['message'] = 'Вы ввели неправильный логин!';
        header("Location: ../index.php");
        die();
    }
}
if ($_GET['logout'] == 1){
    session_unset();
    $_SESSION['message'] = 'Вы успешно вышли из системы';
    header("Location: ../index.php");
    die();
}