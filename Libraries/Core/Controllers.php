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
?>