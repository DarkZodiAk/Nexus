<?php
    session_start(["use_strict_mode" => true]);
    require('../db/dbconnect.php');
    $query = "CALL nexus.del_message(".$_SESSION['topic_id'] ."," . $_GET['id'] .")";
    $conn->query($query);
    header("Location: ../index.php?page=show_topic&id=".$_SESSION['topic_id']);
    die();