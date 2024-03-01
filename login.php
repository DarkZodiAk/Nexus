<div class="block">
    <?php
    if (isset($_SESSION['message']))
        echo($_SESSION['message']);
        unset($_SESSION['message']);
    ?>
    <form action="logic/auth.php" method="POST">
        Введите электронную почту
        <input type="text" name="login" required placeholder="Почта">
        Введите пароль
        <input type="password" name="password" required placeholder="Пароль">
        <input type="submit" name="sender" value="Войти">
    </form>
</div>
