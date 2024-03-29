<?php session_start(["use_strict_mode" => true]); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js" defer></script>
</head>
<body>
<header>
    <div class="col-10 col-lg-8 centered_page space_between">
        <span id="logo">
            <a href="/" >Nexus</a>&nbsp;&nbsp;
        </span>
        <?php if (!isset($_SESSION['username'])){ ?>
        <div class="sign">
            <a href="?page=register">
                <span>Регистрация</span>
            </a>
            <a href="?page=login">
                <span>Войти</span>
            </a>
        </div>
        <?php } else { ?>
        <div class="sign">
            <span><?=$_SESSION['username']?></span>
            <a href="logic/auth.php?logout=1">
                <span>Выйти</span>
            </a>
        </div>
        <?php } ?>
    </div>
</header>

<div class="flex_row min_height">
    <div class="side col-lg-2"
         style="background: linear-gradient(-90deg, #f9f9ff 5%, #415f91 100%)"></div>
    <div class="col-10 col-lg-8 centered_page">