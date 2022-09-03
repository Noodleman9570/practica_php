<?php

    class Especialidades extends Controllers
    {
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(ARCHIVOS_MAESTROS);
            parent::__construct();
        }
        public function Especialidades()
        {   
            Auth::accessPage();

            $data['page_name'] = "Especialidades";
            $data['page_title'] = "Hospital";
            $data['function_js'] = "/especialidades.js";
            $data['style_css'] = "/especialidades.css";

            $this->views->getView($this,"especialidades",$data);
        }
        public function all()
        {
            $arrJson = [];
            try {
                $esp = especialidadesModel::all();
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            if(empty($esp)){
                $arrJson = ['msg'=>'No se encontraron registros'];
            }else{
                $arrJson = $esp;
            }


            echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        }
        public function save()
        {
            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
                //validar
                    $val = new Validations();
                    $val->name('nombre')->value(clear($_POST['nombre']))->required();
                    $val->name('nombre')->value(clear($_POST['description']))->required();
                    if($val->isSuccess()){
                        $cod = especialidadesModel::verifyCod(clear($_POST['cod']));

                        if (!$cod) {
                            $data = [
                                'TMESP_CE' => clear($_POST['cod']),
                                'TMESP_NO' => clear($_POST['nombre']),
                                'TMESP_DE' => $_POST['description'],  
                                //arreglar el eliminar espacios de la contraseña
                            ];
                            try {
                                $idInsert = especialidadesModel::insert('TMBCH_ESP', $data);
                                $data = ['status' => true, 'msg'=>'Registro guardado'];
                            } catch (Exception $e) {
                                echo "ERROR: ".$e->getMessage();
                            }
                        } else {
                            $data = ['error'=>'Ya existe esto codigo, por favor pruebe con otro.'];
                        }      
                    }else{
                        $data = ['error'=>$val->getErrors()];
                    }        

            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        public function edit(){


            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //validar
                $val = new Validations();
                $val->name('nombre')->value(clear($_POST['nombre']))->required();
                $val->name('nombre')->value(clear($_POST['description']))->required();
                if($val->isSuccess()){

                    $cod = especialidadesModel::verifyCod(clear($_POST['cod']));
                        
                    if (!$cod) {
                        $data = [
                            'TMESP_CE' => clear($_POST['cod']),
                            'TMESP_NO' => clear($_POST['nombre']),
                            'TMESP_DE' => $_POST['description'],  
                            //arreglar el eliminar espacios de la contraseña
                        ];
                        $ids = array(
                            'TMESP_ES' => $_POST['id'],
                        );

                        try {
                            $idInsert = especialidadesModel::update('TMBCH_ESP', $data, $ids);
                            $data = ['status' => true, 'msg'=>'Registro guardado'];
                        } catch (Exception $e) {
                            echo "ERROR: ".$e->getMessage();
                        }
                    } else {
                        $data = ['error'=>'Ya existe esto codigo, por favor pruebe con otro.'];
                    } 

                } else {
                    $data = ['error'=>$val->getErrors()];
                }
            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        public function delete()
        {
            $id = intval($_POST['id']);
            $res = especialidadesModel::oneRegist($id);

            if(empty($res)){
                Alertas::new("No se encontro el registro", "danger");
                header('Location:'.BASE_URL.'/Especialidades');
            }

            especialidadesModel::deleteRegist($id);
            echo json_encode(['msg' => 'El registro ha sido eliminado'],JSON_UNESCAPED_UNICODE);
            // Alertas::new(sprintf("Se ha eliminado el usuario %s", $pac[0]['nombre']), "success");
            
        }
    }

?>