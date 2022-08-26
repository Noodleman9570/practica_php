<?php

    error_reporting(E_ALL);

    ini_set('ignore_repeated_errors', TRUE);

    ini_set('display_errors', FALSE);

    ini_set('log_errors', TRUE);

    ini_set("error_log", __DIR__ . "/php-error.log");

    error_log("Inicio de aplicacion");

    require_once 'libs/app.php';

?>


