<?php
require_once('connection_db_films.php');

$actors = mysqli_query($connect, 'SELECT * FROM actors');
$actors = mysqli_fetch_all($actors);
?>
<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Актори </title>
    <link rel="stylesheet" href="../css/db.css">
    <script>
        window.onload = () => {
            document.querySelector('form').addEventListener('submit', evt => {
                evt.preventDefault();
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'creating/create_actor.php');
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send('first_name=' + document.querySelector('form input[name="first_name"]').value +
                    '&last_name=' + document.querySelector('form input[name="last_name"]').value);
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.querySelector('form input[name="first_name"]').value = '';
                        document.querySelector('form input[name="last_name"]').value = '';
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
        <th> first_name</th>
        <th> last_name</th>
    </tr>
    <?php
    foreach ($actors as $actor) {
        ?>
        <tr>
            <td><?= $actor[0] ?></td>
            <td><?= $actor[1] ?></td>
            <td><?= $actor[2] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<h2> Додати нового актора </h2>
<form action="" method="post">
    <h3> Ім'я </h3>
    <input type="text" name="first_name" placeholder="Бен">
    <h3> Прізвище </h3>
    <input type="text" name="last_name" placeholder="Аффлек"><br>
    <button type="submit"> Додати до бази даних</button>
</form>
<a href="db_main.php"> На головну </a>
</body>
</html>