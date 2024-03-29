<?php
    session_start(["use_strict_mode" => true]);
    require('../db/dbconnect.php');

    $messages = $conn->query("SELECT id FROM nexus.`messages` WHERE topic_id = ".$_GET['id']);
    while($id = $messages->fetch()){
        $query = "CALL nexus.del_message(".$_GET['id'] ."," . $id[0] .")";
        $conn->query($query);
    }

    $conn->query("DELETE FROM nexus.`topics` WHERE id = ".$_GET['id']);

    header("Location: ../index.php?page=topics&subsection=".$_SESSION['subsection_id']);
    die();