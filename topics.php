<?php
$subsection = $conn->query("SELECT * FROM nexus.`subsections` WHERE id = ". $_GET['subsection'])->fetch();
$_SESSION['subsection_id'] = $_GET['subsection'];
?>
    <h2><?=$subsection['name']?></h2>
    <div class="subsection-desc"><?=$subsection['description']?></div>

<?php if (isset($_SESSION['username'])){ ?>
    <form action="" method="GET">
        <input type="hidden" name="page" value="write_topic">
        <input type="hidden" name="subsection" value="<?=$_GET['subsection']?>">
        <input type="submit" value="Создать тему" />
    </form>
<?php } ?>

<div class="block">
<?php
$topics = $conn->query("SELECT * FROM nexus.`topics` WHERE subsection_id = ". $_GET['subsection']);
$i = 0;
while($row = $topics->fetch()){
    $author = $conn->query("SELECT * FROM nexus.`users` WHERE id = ". $row['author_id'])->fetch();
    if($i > 0) echo "<div class=\"divider\"></div>";
?>
    <div class="section">
        <a href="?page=show_topic&id=<?=$row['id']?>">
            <h5><?=$row['name']?></h5>
            <div class="section-messages">Автор: <?=$author['username']?>. Сообщений: <?=$row['messages']?>. Обновлено в <?=$row['updated_at']?></div>
        </a>
        <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $author['username']) { ?>
            <button delete-topic value=<?=$row['id']?>>Удалить</button>
        <?php } ?>
    </div>
<?php $i++; } ?>
</div>
