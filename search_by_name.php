<?php
require_once 'db/connection_db_films.php';
$keywords = mb_strtolower($_GET['keywords']);
$films = mysqli_fetch_all($connect->query("SELECT poster, name, year FROM films WHERE LOWER(name) LIKE '%$keywords%' ORDER BY premiere DESC;"))
?>
<!doctype html>
<html lang="uk">
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
        .films_row {
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .announcement {
            max-width: 220px;
            margin: 5px 4px;
        }

        h1 {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 1px;
            padding-bottom: 3px;
        }
    </style>
</head>
<body>
<?php require_once('includes_php/header.php'); ?>
<main>
    <?php if (count($films)) { ?>
        <h1> Результати пошуку фільмів за назвою: <i><?= $keywords ?></i></h1>
        <hr>
    <?php } else { ?>
        <h1> Фільмів з назвою <i><?= $keywords ?></i> не знайдено :(</h1>
    <?php } ?>
    <div class="films_row">
        <?php foreach ($films as $film) { ?>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($film[0]) ?>" alt="">
                    </div>
                    <div class="film_name"> <?= $film[1] ?> (<?= $film[2] ?>)</div>
                </a>
            </div>
        <?php } ?>
    </div>

</main>
<?php require_once('includes_php/footer.php'); ?>
</body>
</html>