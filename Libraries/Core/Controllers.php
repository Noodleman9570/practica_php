<?php
    class Controllers
    {
        public function __construct()
        {
            $this->views = new Views();
            $this->loadModel();
        }

        public function loadModel()
        {
            $model = lcfirst(get_class($this)."Model");
            $routClass = "Models/".lcfirst($model).".php";
            if(file_exists($routClass))
            {
                require_once($routClass);
                $this->model = new $model();
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
            header('Location: ' . BASE_URL ."/". $url . $params);
        }
    }
?>