<?php
require_once '../connection_db_films.php';

$name = $_POST['name'];
$poster = addslashes(file_get_contents($_FILES['poster']['tmp_name']));
$year = $_POST['year'];
$premiere = $_POST['premiere'];
$imdb_rating = $_POST['imdb_rating'];
$country = $_POST['country'];
$director = $_POST['director'];
$duration = $_POST['duration'];
$genres = $_POST['genres'];
$actors = $_POST['actors'];

if ($imdb_rating == '') {
    $query = "INSERT INTO films (director_id, name, poster, year, country, duration_minutes, premiere) " . "VALUES ($director, '$name', '$poster', '$year', '$country', '$duration', '$premiere');";
} else {
    $query = "INSERT INTO films (director_id, name, poster, year, country, duration_minutes, premiere, imdb_rating) " . "VALUES ($director, '$name', '$poster', '$year', '$country', '$duration', '$premiere', '$imdb_rating');";
}

//echo "INSERT INTO films (director_id, name, poster, year, country, duration_minutes, premiere, imdb_rating) " . "VALUES ($director, '$name', '$poster', '$year', '$country', '$duration', '$premiere', '$imdb_rating');";
mysqli_query($connect, $query);

$films_id = mysqli_fetch_all(mysqli_query($connect, "SELECT id FROM `films` ORDER BY id;"));
$last_id = $films_id[count($films_id) - 1][0];

foreach ($genres as $genre) {
    mysqli_query($connect, "INSERT INTO film_genre (film_id, genre_id) VALUES ($last_id, $genre)");
}
foreach ($actors as $actor) {
    mysqli_query($connect, "INSERT INTO film_actor (film_id, actor_id) VALUES ($last_id, $actor)");
}

header('Location: ../films.php');