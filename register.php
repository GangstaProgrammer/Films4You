<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Films4You</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Azeret+Mono&family=Montserrat&display=swap"
          rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
require_once('includes_php/header.php');

?>
<main>
    <div class="title">
        <h1>Реєстрація нового користувача</h1>
    </div>
    <div class="flex_container">
        <form action="creating/create_user.php" method="post" class="register">
            <span>Уведіть ім'я:</span><br>
            <input type="text" name="name"><br>
            <span>Уведіть логін:</span><br>
            <input type="text" name="login"><br>
            <span>Уведіть пароль:</span><br>
            <input type="password" name="password"><br>
            <span>Повторіть пароль:</span><br>
            <input type="password" name="password2"><br>
            <button type="submit">Зареєструватися</button>
        </form>
        <div class="opportunities">
            <p>Вітаємо, шановний відвідувач нашого сайту!<br>
                Реєстрація на нашому сайті дозволить Вам бути його повноцінним учасником.<br>
                Зареєстровані користувачі можуть додавати коментарі до фільмів та додавати фільми до списку обраних.<br>
                У разі виникнення проблем із реєстрацією зверніться до <a>адміністратора</a> сайту. </p>
        </div>
    </div>
</main>
<?php require_once('includes_php/footer.php'); ?>
</body>
</html>