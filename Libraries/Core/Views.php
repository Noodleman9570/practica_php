<?php

    class Views
    {
        function  getView($controller,$view,$data="")
        {
            $controller = get_class($controller);
            if($controller == "Home"){
                error_log("Views::Cargando la vista de -> $view");
                $view = "Views/".lcfirst($view).".php";
            }else{
                error_log("Views::Cargando la vista de -> $view");
                $view = "Views/".$controller."/".lcfirst($view).".php";
            }
            require_once($view);
        }
    }

?>
