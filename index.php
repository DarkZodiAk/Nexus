<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require 'header.php'; ?>

    <div class="flex_row min_height">
        <div class="side col-lg-2"
             style="background: linear-gradient(-90deg, #f9f9ff 5%, #415f91 100%)"></div>
        <div class="col-10 col-lg-8 centered_page">

            <h2>Section 1</h2>
            <div class="block">
                <a href="/">
                    <div class="section">
                        <h4>C++</h4>
                        <div class="section-desc">Understandable, have a nice day</div>
                        <div class="section-messages">Сообщений: 118</div>
                    </div>
                </a>
                <div class="divider"></div>
                <div class="section">
                    <h4>Kotlin</h4>
                    <div class="section-desc">Some Kotlin</div>
                    <div class="section-messages">Сообщений: 72</div>
                </div>
            </div>

            <h2>Section 2</h2>
            <div class="block">
                <div class="section">
                    <a href="/">
                        <h4>C++</h4>
                    </a>
                    <div class="section-desc">Understandable, have a nice day</div>
                    <div class="section-messages">Сообщений: 118</div>
                </div>
                <div class="divider"></div>
                <div class="section">
                    <h4>Kotlin</h4>
                    <div class="section-desc">Some Kotlin</div>
                    <div class="section-messages">Сообщений: 72</div>
                </div>
            </div>

        </div>
        <div class="side col-lg-2"
             style="background: linear-gradient(90deg, #f9f9ff 5%, #415f91 100%)"></div>
    </div>

    <footer>
        <div>Автор работы: Павлусенко Евгений Максимович</div>
        <div>Почта: pavlusenko_em@edu.surgu.ru</div>
    </footer>
</body>
</html>