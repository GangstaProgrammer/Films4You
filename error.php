<?php
$error_type = $_GET['error'];
$message = 'На жаль, щось сталося не так!';
switch ($error_type) {
    case ('login_length'):
        $message = 'Логін повинен бути мінімум 5 та максимум 50 символів!';
        break;
    case ('name_length'):
        $message = 'Ім\'я повинно бути мінімум 5 та максимум 50 символів!';
        break;
    case ('passwords'):
        $message = 'Уведені паролі не збігаютсья!';
        break;
    case ('password_length'):
        $message = 'Пароль повинен бути мінімум 5 та максимум 50 символів!';
        break;
    case ('noUser'):
        $message = 'Користувача з таким логіном та паролем не існує!';
        break;
    case ('emptyLogOrPass'):
        $message = 'Пустий логін або пароль!';
        break;

}
?>
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
    <style>
        main {
            margin-top: 100px;
        }

        h1, h2 {
            display: inline-block;
            width: 100%;
        }
        h1 {
            font-size: 26px;
            border-bottom: 1px solid #ffffff;
            padding-bottom: 7px;
        }

        h2 {
            padding: 20px 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
<?php
require_once('includes_php/header.php');

?>
<main>
    <div class="title">
        <h1>Помилка :(</h1>
    </div>
    <h2> <?= $message ?></h2>
</main>
<?php require_once('includes_php/footer.php'); ?>
</body>
</html>