<?php
    session_start(["use_strict_mode" => true]);
    require 'db/dbconnect.php';

    require 'header.php';

    switch($_GET['page']){
        case "login":
            if(isset($_SESSION["username"])) require 'main_page.php';
            else require 'login.php';
            break;
        default:
            require 'main_page.php';
            break;
    }

    require 'footer.php';