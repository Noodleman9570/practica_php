<?php

    //Load
    $controllerFile = "Controllers/".ucfirst($controller).".php";
    if(file_exists($controllerFile))
    {
        require_once($controllerFile);
        $controller = new $controller();
        if(method_exists($controller, $method))
        {
            error_log("Load::carga de controlador-> $controllerFile y el metodo -> $method");
            $controller->{$method}($params);
            
        }else{
            
            require_once("Controllers/Error.php");
        }
    }else
    {
        require_once("Controllers/Error.php"); 
    }

?>