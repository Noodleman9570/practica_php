<?php
    class Home extends Controllers{
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(HOME);
            parent::__construct();

        }

        public function home()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "Home";
            $data['page_title'] = "Página principal";
            $data['page_name'] = "home";
            $data['style_css'] = "/home.css";
            $this->views->getView($this,"home",$data);
        }

    }
?>