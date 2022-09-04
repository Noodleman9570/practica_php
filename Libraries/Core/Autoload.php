<?php

    spl_autoload_register(
        function($class){
            if(file_exists("Libraries/".'Core/'.$class.".php")){

                error_log("Autoload::libraries Se requiere del archivo -> $class.php");
                require_once("Libraries/".'Core/'.$class.".php");

            }  else if(file_exists("classes/" . $class . ".php")) {
                
                error_log("Autoload::classes Se requiere del archivo -> $class.php");
                require_once("classes/" . $class . ".php");
            } else if(strpos($class, "Model")){
                error_log("Autoload::models Se requiere del archivo -> $class Model.php");
                require_once("Models/" . lcfirst($class) . ".php");
            }
        }
    );

?>