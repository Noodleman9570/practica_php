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
    }
?>