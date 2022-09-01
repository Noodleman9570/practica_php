<?php

class Controller{
    
    function __construct(){

        $this->view = new View();

    }

    function loadModel($model)
    {
        $url = 'models/' . $model . 'model.php';

        if (file_exists($url)) {
            require_once $url;

            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params)
    {
        foreach ($params as $param ) {
            if(!isset($_POST[$param])){
                error_log('CONTROLLER::existsPOST => No existe el parametro' . $param);
                return false;
            }
            error_log('CONTROLLER::existPOST => Si existe parametros' . $param);
            return true;
        }
    }

    function existGET($params)
    {
        foreach ($params as $param ) {
            if(!isset($_GET[$param])){
                error_log('CONTROLLER::existsGET => No existe el parametro' . $param);
                return false;
            }

            return true;
        }
    }

    function getPOST($name)
    {
        return $_POST[$name];
    }

    function getGET($name)
    {
        return $_GET[$name];
    }

    function redirect($url, $mensajes = [])
    {
        $data = [];
        $params = '';
        
        foreach ($mensajes as $key => $value) {
            array_push($data, $key . '=' . $value);
        }
        $params = join('&', $data);
        
        if($params != ''){
            $params = '?' . $params;
        }
        header('location: ' . constant('URL') . $url . $params);
    }
}