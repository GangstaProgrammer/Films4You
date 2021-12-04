<?php
require_once('connection_db_films.php');

$films = mysqli_query($connect, 'SELECT f.id, f.poster, f.name, f.year, f.country, f.duration_minutes, d.first_name, d.last_name FROM films f, directors d WHERE f.director_id = d.id ORDER BY id;');
$films = mysqli_fetch_all($films);

$films_id = mysqli_fetch_all(mysqli_query($connect, "SELECT id FROM `films` ORDER BY id;"));

foreach ($films_id as $index => $film_id) {
    $query = "SELECT g.name FROM genres g, film_genre fg WHERE fg.film_id = " . ($film_id[0]) . " AND fg.genre_id = g.id";
    $genres_arrays = mysqli_fetch_all(mysqli_query($connect, $query));
    for ($j = 0; $j < count($genres_arrays); $j++) {
        $films[$index][8][$j] = $genres_arrays[$j][0];
    }
}
foreach ($films_id as $index => $film_id) {
    $query = "SELECT a.first_name, a.last_name FROM actors a, film_actor fa WHERE fa.film_id = " . ($film_id[0]) . " AND fa.actor_id = a.id";
    $actors_arrays = mysqli_fetch_all(mysqli_query($connect, $query));
    for ($j = 0; $j < count($actors_arrays); $j++) {
        $films[$index][9][$j] = $actors_arrays[$j][0] . ' ' . $actors_arrays[$j][1];
    }
}

$all_genres = mysqli_fetch_all(mysqli_query($connect, 'SELECT id, name FROM genres ORDER BY name;'));
$all_directors = mysqli_fetch_all(mysqli_query($connect, 'SELECT id, first_name, last_name FROM directors ORDER BY first_name;'));
$all_actors = mysqli_fetch_all(mysqli_query($connect, 'SELECT id, first_name, last_name FROM actors ORDER BY first_name;'));
?>
<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Фільми </title>
    <link rel="stylesheet" href="../css/db.css">
</head>
<body>

<table>
    <tr>
        <th> id</th>
        <th> poster </th>
        <th> name</th>
        <th> year</th>
        <th> country</th>
        <th> genres</th>
        <th> duration</th>
        <th> director</th>
        <th> main actors</th>
    </tr>
    <?php
    foreach ($films as $film) {
        ?>
        <tr>
            <td><?= $film[0] ?></td>
            <td><img src="data:image/;base64, <?= base64_encode($film[1]) ?>" width='70' alt=""></td>
            <td><?= $film[2] ?></td>
            <td><?= $film[3] ?></td>
            <td><?= $film[4] ?></td>
            <td><?= implode($film[8], ', ') ?></td>
            <td><?= $film[5] . ' хв.' ?></td>
            <td><?= $film[6] . ' ' . $film[7] ?></td>
            <td><?= implode($film[9], ', ') ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<h2> Додати новий фільм </h2>
<form action="creating/create_film.php" method="post" enctype="multipart/form-data">
    <h3> Постер </h3>
    <input type="file" name="poster">
    <h3> Назва </h3>
    <input type="text" name="name" placeholder="Чорна вдова">
    <h3> Рік </h3>
    <input type="number" name="year" maxlength="2025" minlength="1950" placeholder="2021" value="2021">
    <h3> Прем'єра </h3>
    <input type="date" name="premiere">
    <h3> Країна </h3>
    <input type="text" name="country" placeholder="США" value="США">
    <h3> Рейтинг IMDB </h3>
    <input type="number" name="imdb_rating" step="0.1">
    <h3> Жанри </h3>
    <select name="genres[]" multiple>
        <?php
        foreach ($all_genres as $genre) {
            ?>
            <option value="<?= $genre[0] ?>"><?= $genre[1] ?></option>
            <?php
        }
        ?>
    </select>
    <h3> Тривалість </h3>
    <input type="number" name="duration" minlength="1" maxlength="600" placeholder="123 хв.">
    <h3> Режисер </h3>
    <select name="director" multiple">
    <?php
    foreach ($all_directors as $key => $director) {
        ?>
        <option value="<?= $director[0] ?>"><?= $director[1] . ' ' . $director[2] ?></option>
        <?php
    }
    ?>
    </select>
    <h3> Головні актори </h3>
    <select name="actors[]" multiple>
        <?php
        foreach ($all_actors as $key => $actor) {
            ?>
            <option value="<?= $actor[0] ?>"><?= $actor[1] . ' ' . $actor[2] ?></option>
            <?php
        }
        ?>
    </select><br>
    <button type="submit"> Додати до бази даних</button>
</form>
<a href="db_main.php"> На головну </a>
</body>
</html>
