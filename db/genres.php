<?php
require_once('connection_db_films.php');

$genres = mysqli_query($connect, 'SELECT * FROM genres ORDER BY name');
$genres = mysqli_fetch_all($genres);
?>
<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Жанри </title>
    <link rel="stylesheet" href="../css/db.css">
    <script>
        window.onload = () => {
            document.querySelector('form').addEventListener('submit', evt => {
                evt.preventDefault();
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'creating/create_genre.php');
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send('name=' + document.querySelector('form input[name="name"]').value);
                xhr.onreadystatechange = () => {
                    if(xhr.readyState === 4 && xhr.status === 200) {
                        document.querySelector('form input[name="name"]').value = '';
                    }
                }
            });
        }
    </script>
</head>
<body>

<table>
    <tr>
        <th> id</th>
        <th> name </th>
    </tr>
    <?php
    foreach ($genres as $genre) {
        ?>
        <tr>
            <td><?= $genre[0] ?></td>
            <td><?= $genre[1] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<h2> Додати новий жанр </h2>
<form action="" method="post">
    <h3> Назва </h3>
    <input type="text" name="name" placeholder="Бойовик"><br>
    <button type="submit"> Додати до бази даних </button>
</form>
<a href="db_main.php"> На головну </a>
</body>
</html>