<?php
    class Home extends Controllers{
        public function __construct()
        {
            // Auth::noAuth();
            // Permisos::getPermisos(PERFIL);
            parent::__construct();

        }

        public function Home()
        {
            $data['page_name'] = "Perfil de usuario";
            $data['function_js'] = '/perfil.js';
            $this->views->getView($this,"home",$data);
        }

    }
?>