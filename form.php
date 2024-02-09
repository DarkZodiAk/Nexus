<?php require 'logic/add_topic.php'?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$name = (!empty($_COOKIE['name'])) ? $_COOKIE['name'] : $_POST['name'];
?>
<h2>
    Форма для добавления темы
</h2>
<form name="create_topic" method="post" action="form.php" enctype="multipart/form-data">
    <div>
        <label for="id1">Название темы:</label><br>
        <input name="name" id="id1" type="text" size="20" maxlength="60" value="<?=$name?>">
    </div>
    Раздел:<br>
    <input type="radio" name="section" value="cpp" checked>C++<br>
    <input type="radio" name="section" value="database">Базы данных<br>
    <input type="radio" name="section" value="java">Java<br>
    Подраздел:<br>
    <select name="subsection">
        <option value="cpp_networks" selected>C++: Сети
        <option value="cpp_winapi">C++: WinAPI
        <option value="java_for_beginners">Java для начинающих
        <option value="postgresql">PostgreSQL
    </select><br>
    Теги:<br>
    <select name="tags" multiple>
        <option value="java">java
        <option value="cpp" selected>c++
        <option value="db">бд
        <option value="asio">asio
        <option value="recursion">рекурсия
        <option value="postgresql">postgresql
        <option value="windows">windows
    </select><br>
    Сообщение:<br>
    <textarea name="message" rows="5" cols="30"></textarea><br>
    Закрытая тема:
    <input type="checkbox" name="closed_topic"><br>
    Изображение сообщения:<br>
    <input type="file" name="picture[]" multiple><br>
    <input type="submit" value="Создать тему">
</form>


<?php
if($_POST){
    ?>
    <h2>
        Полученные данные
    </h2>
    <div>Название темы: <?=$_POST['name']?></div>
    <div>Раздел: <?=$_POST['section']?></div>
    <div>Подраздел: <?=$_POST['subsection']?></div>
    <div>Теги: <?=$_POST['tags']?></div>
    <div>Сообщение: <?=$_POST['message']?></div>
    <div>Закрытая тема: <?=$_POST['closed_topic']?></div>
    <?php
    if(!empty($imgFilenames)) {
        echo '<h2>Изображения</h2>';
        for ($i = 0; $i < count($imgFilenames); $i++) {
            ?>
            <img width="700" src="<?=$imgFilenames[$i]?>"/>
            <?php
        }
    }
}
?>
</body>
</html>
