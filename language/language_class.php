<?php

class Language {
    private $data;

    public function  __construct($language) {
        $this->data = parse_ini_file("language/system_ini/system_$language.ini");
    }

    public function get($name) {
        return $this->data[$name];
    }
}
function getLangFromBrowser() {
    return mb_strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
}