<?php

class App {

    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if(empty($url[0])){ // si no existe el archivo carga el controlador login
            error_log('APP::construct-> no hay controlador especificado');
            $controllerFile = 'controllers/login.php';
            require_once $controllerFile;
            $controller = new Login();
            // $controller->loadModel('login');
            $controller->render();
            return false;
        }
        $controllerFile = 'controllers/' . $url[0] . '.php';
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if (isset($url[1])) {
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        // nro de parametros
                        $nparam = count($url) - 2;
                        // arreglo de parametros
                        $params = [];

                        for ($i=0; $i < $nparam; $i++) { 
                            array_push($params, $url[$i + 2]);
                        }

                        $controller->{$url[1]}($params);
                    } else {
                        // no tiene parametros, se manda a llamar el metodo tal cual
                        $controller->{$url[1]}();
                    }
                } else {
                    // error, no existe el metodo
                }
            } else {
                $controller->render();
            }
            
        } else {
            // no existe el archivo, manda error
        }
        
    }

}

?>