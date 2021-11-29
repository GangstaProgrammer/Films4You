<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password2 = filter_var(trim($_POST['password2']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 50) {
    header('Location: /error.php?error=login_length');
    exit();
} elseif (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    header('Location: /error.php?error=name_length');
    exit();
} elseif (strcmp($password, $password2) !== 0) {
    header('Location: /error.php?error=passwords');
    exit();
} elseif (mb_strlen($password) < 5 || mb_strlen($password) > 50) {
    header('Location: /error.php?error=password_length');
    exit();
}
$password_hash = md5($password.'salt');
require_once '../includes_php/connection_mysql.php';
$connect->query("INSERT INTO users (name, login, password_hash) VALUES ('$name', '$login', '$password_hash')");
setcookie('user', $user['name'], time() + 3600 * 24 * 30, '/');
header('Location: /');
