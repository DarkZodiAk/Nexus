
<?php require 'header.php'; ?>

<div class="flex_row min_height">
    <div class="side col-lg-2"
         style="background: linear-gradient(-90deg, #f9f9ff 5%, #415f91 100%)"></div>
    <div class="col-10 col-lg-8 centered_page">
        <?php
            if (!isset($_GET['page'])){
                require 'main_page.php';
                require 'login.php';
            } /*elseif ($_GET['page'] == "login"){

            }*/
        ?>

    </div>
    <div class="side col-lg-2"
         style="background: linear-gradient(90deg, #f9f9ff 5%, #415f91 100%)"></div>
</div>

<?php require 'footer.php'; ?>