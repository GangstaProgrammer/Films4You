<?php
require_once '../connection_db_films.php';

$name = $_POST['name'];

mysqli_query($connect, "INSERT INTO genres (name) VALUES ('$name')");

header('Location: ../genres.php');