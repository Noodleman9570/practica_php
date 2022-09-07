<?php

    // define("BASE_URL", "http://localhost/Curso%20POO%20Abel%20OS/Hospital")
    const BASE_URL = "http://localhost/practica_php";

    //Zona horaria
    date_default_timezone_set('America/Caracas');

    //Constantes Paginas de navegacion
    const HOME = "0";
    const PERFIL = "0";
    const DASHBOARD = 1;
    const ARCHIVOS_MAESTROS = 2;
    const CONSULTA = 7;
    const HOSPITALIZACION = 8;
    const VACUNACION = 12;
    const USERS = 15;
    const ROLES = 14;

    //Datos de conexion a base de datos
    const DB_HOST = "localhost";
    const DB_NAME = "movies_database";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_CHARSET = "utf8mb4";

    //Directorios de las librerias

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', BASE_URL);
    define('CONTROLLER', ROOT.DS."Controller");
    define('VIEW', ROOT.DS."Views");
    define('TEMPLATE', VIEW.DS."Template");
    define('IMAGE_PATH', ROOT.DS."Assets".DS."images");

    
    //Archivos publicos
    
    define('ASSETS',BASE_URL.'/Assets');
    define('CSS', ASSETS."/css");
    define('JS', ASSETS."/js");
    define('PLUGINS', ASSETS."/plugins");
    define('FONTS', ASSETS."/font-awesome");
    define('IMG', ASSETS."/images");
    define('UPLOADS', IMG."/uploads"); 
    define('FAVICON', ASSETS."/app/favicon");
    define('DATATABLE', PLUGINS."/DataTables");

    //Directorios de la app
    define('APP', ASSETS."/app");

    // Informacion del sitio

    define('SITE_CHARSET', 'UTF-8');
    define('SITE_NAME', 'Cinema Space');
    define('SITE_LANG', 'es');
    define('SITE_VERSION', '1.0.0');
    define('SITE_LOGO', '/logo.png');
    define('SITE_FAVICON', '/favicon.ico');
    define('SITE_DESC', 'Cinema Space');
    define('SITE_LOGO_MAIN', 'main_logo.png');
    define('SITE_AUTHORS', 'Abraham/Jorfren/Kevin/Luis');

    // Imagenes del sitio
    define('HOME_IMG', IMAGE_PATH."/home");

    // Controller y method default

    define('CONTROLLER_DEFAULT', 'home');
    define('METHOD_DEFAULT', 'home');

    //Deliminadores decimal y millar Ej. 24,1345.00
    const SPD = ",";
    const SPM = ".";

    //Simbolo de moneda
    const SMONEY = "$";
?>