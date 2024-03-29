<?php
$topic = $conn->query("SELECT * FROM nexus.`topics` WHERE id = ". $_GET['id'])->fetch();
$_SESSION['topic_id'] = $_GET['id'];
?>

<h2><?=$topic['name']?></h2>

<?php
$messages = $conn->query("SELECT * FROM nexus.`messages` WHERE topic_id = ". $_GET['id']);
while($row = $messages->fetch()){
    $author = $conn->query("SELECT * FROM nexus.`users` WHERE id = ". $row['author_id'])->fetch();
?>

    <div class="block">
        <div class="section message-header">
            <?=$author['username']?>, в <?=$row['created_at']?>.
            <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $author['username']) { ?>
                <button delete-msg value=<?=$row['id']?>>Удалить</button>
            <?php } ?>
        </div>
        <div class="divider"></div>
        <div class="section">
            <?=$row['content']?>
        </div>
    </div>

<?php
}
?>

<?php if(isset($_SESSION['username'])) { ?>
<div class="block">
    <form id="message_form">
        <textarea class="article"></textarea>
        <input type="submit" id="save" value="Отправить" required>
    </form>
</div>
<?php } ?>