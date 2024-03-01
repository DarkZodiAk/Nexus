<?php
    session_start(["use_strict_mode" => true]);
    require_once 'pdoconfig.php';
     
    try {
        $conn = new PDO("mysql:host=$host;port=$port;charset=utf8mb4;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }