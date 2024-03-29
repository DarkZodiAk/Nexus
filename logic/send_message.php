<?php
    session_start(["use_strict_mode" => true]);
    require('../db/dbconnect.php');

    $query = "CALL nexus.send_message(".$_SESSION['user_id'] .","
        . $_SESSION['topic_id'] .",'" . $_POST["editorContent"] ."')";

    $conn->query($query);

    header("Location: ../index.php?page=show_topic&id=".$_SESSION['topic_id']);
    die();
