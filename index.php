<?php
require_once 'db/connection_db_films.php';
$connect = new mysqli('localhost', 'root', '', 'films4you');

$query = "SELECT f.poster, f.name, f.year, f.premiere FROM films f WHERE '" .
    date('Y-m-d') . "' > f.premiere + interval 31 day ORDER BY f.premiere DESC LIMIT 5;";
$novelties = mysqli_fetch_all($connect->query($query));

$query = "SELECT f.poster, f.name, f.year, f.imdb_rating FROM films f ORDER BY f.imdb_rating DESC LIMIT 5;";
$top_rating = mysqli_fetch_all($connect->query($query));

$top_rating_log = fopen("top_rating_log.txt", 'a') or die("failed to create file");
date_default_timezone_set('Europe/Kiev');
$log_text = print_r(mysqli_fetch_all($connect->query(
        "SELECT f.name, f.year, f.imdb_rating FROM films f ORDER BY f.imdb_rating DESC LIMIT 5;")), true);
fwrite($top_rating_log, date("Y-m-d H:i:s"). "\n" . $log_text . "\n\n");
fclose($top_rating_log);

$query = "SELECT f.poster, f.name, f.year, f.premiere FROM films f WHERE '"
    . date('Y-m-d') . "' < f.premiere + interval 31 day ORDER BY f.premiere DESC LIMIT 5;";
$now_playing = mysqli_fetch_all($connect->query($query));

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

</head>
<body>
<?php require_once('includes_php/header.php');
?>
<main>
    <div class="roundabout">
        <div class="roundabout_title">
            <h2> <?= $lang->get('NOVELTIES')?> </h2>
            <a href="#"><?= $lang->get('SHOW_ALL')?></a>
        </div>
        <hr>
        <div class="films_row">
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($novelties[0][0]) ?>" alt=""></div>
                    <div class="film_name"> <?= $novelties[0][1]?> (<?= $novelties[0][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($novelties[1][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $novelties[1][1]?> (<?= $novelties[1][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($novelties[2][0]) ?>" alt=""></div>
                    <div class="film_name"> <?= $novelties[2][1]?> (<?= $novelties[2][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($novelties[3][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $novelties[3][1]?> (<?= $novelties[3][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($novelties[4][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $novelties[4][1]?> (<?= $novelties[4][2]?>)</div>
                </a>
            </div>
        </div>
        <hr>
    </div>
    <div class="roundabout">
        <div class="roundabout_title">
            <h2><?= $lang->get('TOP_OF_RATING')?></h2>
            <a href="#"><?= $lang->get('SHOW_ALL')?></a>
        </div>
        <hr>
        <div class="films_row">
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($top_rating[0][0]) ?>" alt=""></div>
                    <div class="film_name"> <?= $top_rating[0][1]?> (<?= $top_rating[0][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($top_rating[1][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $top_rating[1][1]?> (<?= $top_rating[1][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($top_rating[2][0]) ?>" alt=""></div>
                    <div class="film_name"> <?= $top_rating[2][1]?> (<?= $top_rating[2][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($top_rating[3][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $top_rating[3][1]?> (<?= $novelties[3][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($top_rating[4][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $top_rating[4][1]?> (<?= $top_rating[4][2]?>)</div>
                </a>
            </div>
        </div>
        <hr>
    </div>
    <div class="roundabout">
        <div class="roundabout_title">
            <h2><?= $lang->get('NOW_PLAYING')?></h2>
            <a href="#"><?= $lang->get('SHOW_ALL')?></a>
        </div>
        <hr>
        <div class="films_row">
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($now_playing[0][0]) ?>" alt=""></div>
                    <div class="film_name"> <?= $now_playing[0][1]?> (<?= $now_playing[0][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($now_playing[1][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $now_playing[1][1]?> (<?= $now_playing[1][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="#">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($now_playing[2][0]) ?>" alt=""></div>
                    <div class="film_name"> <?= $now_playing[2][1]?> (<?= $now_playing[2][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($now_playing[3][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $now_playing[3][1]?> (<?= $now_playing[3][2]?>)</div>
                </a>
            </div>
            <div class="announcement">
                <a href="">
                    <div class="poster"><img src="data:image/;base64, <?= base64_encode($now_playing[4][0]) ?>" alt=""></div>
                    <div class="film_name"><?= $now_playing[4][1]?> (<?= $now_playing[4][2]?>)</div>
                </a>
            </div>
        </div>
        <hr>
    </div>
</main>
<?php require_once('includes_php/footer.php'); ?>
</body>
</html>