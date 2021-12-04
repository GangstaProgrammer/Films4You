<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if ($login == '' || $password == '') {
    header('Location: /error.php?error=emptyLogOrPass');
    exit();
}

$password_hash = md5($password . 'salt');
require_once 'db/connection_db_users.php';
$user = ($connect->query("SELECT name FROM users WHERE login = '$login' AND password_hash = '$password_hash'"));
$user = mysqli_fetch_assoc($user);

if (count($user) == 0) {
    header('Location: /error.php?error=noUser');
    exit();
}

setcookie('user', $user['name'], time() + 3600 * 24 * 30, '/');
if ($login == 'admin')
    setcookie('admin', 'yes', time() + 3600 * 24 * 30, '/');
else
    setcookie('admin', 'no', time() + 3600 * 24 * 30, '/');

header('Location: /');
