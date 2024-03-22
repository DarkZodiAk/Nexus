<?php
$imgFilenames = [];
if(!empty($_FILES)) {
    for ($i = 0; $i < count($_FILES['picture']['tmp_name']); $i++) {
        if (!empty($_FILES['picture']['tmp_name'][$i])) {
            $file = fopen($_FILES['picture']['tmp_name'][$i], 'r+');
            $target_dir = "uploads/";
            $ext = explode('.', $_FILES["picture"]["name"][$i]);
            $ext = $ext[count($ext) - 1];
            $filename = 'file' . rand(100000, 999999) . '.' . $ext;
            move_uploaded_file($_FILES["picture"]["tmp_name"][$i], $target_dir . $filename);
            array_push($imgFilenames, $target_dir . $filename);
        }
    }
}

setcookie('name', $_POST['name']);
?>