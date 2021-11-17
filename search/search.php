<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Slider functionality</title>
    <link href="styles/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<p>
    <label for="price">Виберіть рік:</label>
    <input type="text" id="price" style="border:0; color:#000000; font-weight:bold;">
</p>
<div id="yearslider" style="width: 400px"></div>
<br><br>

<form action="search.php" method="post">
    <textarea name="message" cols="30" rows="10" placeholder="Уведіть повідомлення"></textarea><br>
    <button type="submit"> Відправити</button>
</form>
<?php
if ($_POST['message']) {
    echo '<br> Отримано повідомлення: ' . htmlspecialchars($_POST['message']);
}
echo '<br><br> Поточна дата та час: ';
date_default_timezone_set('Europe/Kiev');
echo date("Y-m-d H:i:s");
?>
</body>
</html>