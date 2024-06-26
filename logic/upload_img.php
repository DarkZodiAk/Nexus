<?php
  $accepted_origins = array("https://localhost", "https://nexus");

  $imageFolder = "../img/";

  if (isset($_SERVER['HTTP_ORIGIN'])) {
    if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
      header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    } else {
      header("HTTP/1.1 403 Origin Denied" . $_SERVER['HTTP_ORIGIN']);
      return;
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    return;
  }

  reset ($_FILES);
  $temp = current($_FILES);
  if (is_uploaded_file($temp['tmp_name'])){
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        header("HTTP/1.1 400 Invalid file name.");
        return;
    }
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        header("HTTP/1.1 400 Invalid extension.");
        return;
    }

    $filetowrite = $imageFolder . md5($temp['name'] . time()) . '.' . strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION));
    move_uploaded_file($temp['tmp_name'], $filetowrite);

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
    $baseurl = $protocol . $_SERVER["HTTP_HOST"] . rtrim(dirname($_SERVER['REQUEST_URI']), "/") . "/";

    echo json_encode(array('location' => $baseurl . $filetowrite));
  } else {
    header("HTTP/1.1 500 Server Error");
  }
?>