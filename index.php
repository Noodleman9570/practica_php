<?php

    error_reporting(E_ALL);

    ini_set('ignore_repeated_errors', TRUE);

    ini_set('display_errors', FALSE);

    ini_set('log_errors', TRUE);

    ini_set("error_log", "../php-error.log");

    error_log("Inicio de aplicacion");

    // session_start();
    // session_destroy();
    require_once("Config/Config.php");
    require_once("Helpers/Helpers.php");
    $url = !empty($_GET['url']) ? $_GET['url'] : CONTROLLER_DEFAULT."/".METHOD_DEFAULT;
    $arrUrl = explode("/", $url);
    $controller = $arrUrl[0];
    $method = $arrUrl[0];
    $params = "";

    if(!empty($arrUrl[1]))
    {
        if($arrUrl[1] != "");
        {
            $method = $arrUrl[1];
        }
    }

    if(!empty($arrUrl[2]))
    {
        if($arrUrl[2] != "")
        {
            for ($i=2; $i < count($arrUrl); $i++) { 
                $params .= $arrUrl[$i].',';
            }
            $params = trim($params, ',');
        }
    }

    // Autoloas para clases
    require_once("Libraries/Core/Autoload.php");
    require_once("Libraries/Core/Load.php");



?>