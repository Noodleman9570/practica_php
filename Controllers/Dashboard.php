<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(DASHBOARD);
            parent::__construct();

        }

        public function Dashboard()
        {
            Auth::accessPage();

            $data['page_id'] = 2;
            $data['page_tag'] = "Dashboard - Stats Vacunacion";
            $data['page_title'] = "Dashboard - Estadisticas de Vacunacion";
            $data['page_name'] = "dashboard";
           $this->views->getView($this,"dashboard",$data);
        }

        // public function all()
        // {

        //     $arrJson = [];
        //     $res = dashboardModel::all();
        //     if(empty($res)){
        //         $arrJson = ['msg'=>'No se encontraron registros'];
        //     }else{
        //         $arrJson = $res;
        //     }


        //     echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        // }

        public function  LoadVaccineQuant()
        {
            $arrJson = [];
            $res = dashboardModel::LoadVaccineQ();
            if(empty($res)){
                $arrJson = ['msg'=>'No se encontraron registros'];
            }else{
                $arrJson = $res;
            }
            echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        }


    }
?>