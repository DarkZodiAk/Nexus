<?php
    $sections = $conn->query("SELECT * FROM nexus.`sections`");
    while($row = $sections->fetch()){
?>

<h2><?=$row['name']?></h2>
<div class="block">
    <?php
        $subsections = $conn->query("SELECT * FROM nexus.`subsections` WHERE section_id = " . $row['id']);
        $i = 0;
        while($row = $subsections->fetch()){
            if($i > 0) echo "<div class=\"divider\"></div>";
    ?>
        <a href="?page=topics&subsection=<?=$row['id']?>">
            <div class="section">
                <h4><?=$row['name']?></h4>
                <div class="section-desc"><?=$row['description']?></div>
                <div class="section-messages">Сообщений: <?=$row['messages']?></div>
            </div>
        </a>
    <?php $i++; } ?>
</div>
<?php } ?>


