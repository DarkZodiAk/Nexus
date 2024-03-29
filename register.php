<div class="block">
    <?php
    if (isset($_SESSION['regmessage']))
        echo($_SESSION['regmessage']);
    unset($_SESSION['regmessage']);
    ?>
    <form action="logic/register.php" method="POST">
        Введите имя
        <input type="text" name="username" required placeholder="Имя">
        Введите электронную почту
        <input type="text" name="login" required placeholder="Почта">
        Введите пароль
        <input type="password" name="password" required placeholder="Пароль">
        Подтвердите пароль
        <input type="password" name="confirm_password" required placeholder="Пароль">
        <input type="submit" name="sender" value="Зарегистрироваться">
    </form>
</div>
