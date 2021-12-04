<?php
require_once '../connection_db_films.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

mysqli_query($connect, "INSERT INTO directors (first_name, last_name) VALUES ('$first_name', '$last_name')");

header('Location: ../directors.php');