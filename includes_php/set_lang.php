<?php
require_once 'language/language_class.php';
$chosen_lang = '';
if ($_GET['lang']) {
    $chosen_lang = $_GET['lang'];
    setcookie('language', $chosen_lang, time() + 3600 * 24 * 30, '/');
} else if ($_COOKIE['language']) {
    $chosen_lang = $_COOKIE['language'];
} else {
    $chosen_lang = getLangFromBrowser();
    setcookie('language', $chosen_lang, time() + 3600 * 24 * 30, '/');
}

$chosen_lang = $_GET['lang'] ?? $_COOKIE['language'] ?? getLangFromBrowser();
setcookie('language', $chosen_lang, time() + 3600 * 24 * 30, '/');
$lang = new Language($chosen_lang);
