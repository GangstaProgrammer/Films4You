<?php
require_once('connection_db_films.php');

$films = mysqli_fetch_all(mysqli_query($connect, 'SELECT name FROM films ORDER BY name'));
print_r(json_encode($films));
