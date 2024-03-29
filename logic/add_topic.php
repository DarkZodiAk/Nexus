<?php
    session_start(["use_strict_mode" => true]);
    require('../db/dbconnect.php');
    $query = "INSERT INTO nexus.`topics`(name, subsection_id, author_id) 
        VALUES ('". $_POST['title'] ."', " . $_SESSION['subsection_id'] .", " . $_SESSION['user_id'] .");";
    $conn->query($query);

    $topic_id = $conn->lastInsertId();

    $query = "CALL nexus.send_message(".$_SESSION['user_id'] .","
        . $topic_id .",'" . $_POST["editorContent"] ."')";
    $_SESSION['query'] = $query;
    $conn->query($query);

    header("Location: ../index.php?page=topics&subsection=".$_SESSION['subsection_id']);
    die();