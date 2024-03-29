<?php
    session_start(["use_strict_mode" => true]);
    require 'db/dbconnect.php';

    require 'header.php';

    switch($_GET['page']){
        case "login":
            if(isset($_SESSION["username"])) require 'main_page.php';
            else require 'login.php';
            break;
        case "register":
            if(isset($_SESSION["username"])) require 'main_page.php';
            else require 'register.php';
            break;
        case "topics":
            require 'topics.php';
            break;
        case "show_topic":
            require 'show_topic.php';
            break;
        case "write_topic":
            require 'write_topic.php';
            break;
        default:
            require 'main_page.php';
            break;
    }

    require 'footer.php';