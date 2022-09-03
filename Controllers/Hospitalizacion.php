<?php

    class Hospitalizacion extends Controllers
    {
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(HOSPITALIZACION);
            parent::__construct();
        }
        public function Hospitalizacion()
        {   
            Auth::accessPage();

            $data['page_name'] = "Info de Hospitalizacion";
            $data['page_title'] = "Información";
            $data['function_js'] = "/hospitalizacion.js";
            $data['style_css'] = "/hospitalizacion.css";

            $this->views->getView($this,"hospitalizacion",$data);
        }

        public function all()
        {
            $arrJson = [];
            try {
                $info = HospitalizacionModel::all();
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            if(empty($info)){
                $arrJson = ['msg'=>'No se encontraron registros'];
            }else{
                $arrJson = $info;
            }
            echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        }

        public function save()
        {
            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
                //validar
                    $val = new Validations();
                    $val->name('cedula')->value(clear($_POST['hospitCedula']))->required();
                    $pac = hospitalizacionModel::verifyCed($_POST['hospitCedula']);

                    if ($pac) {                                        
                        if($val->isSuccess()){

                            $data = [
                                    'TMPAC_PID' => $pac[0]['TMPAC_PID'],
                                    'TTHIFO_NC' => $_POST['cama'],  
                                    //arreglar el eliminar espacios de la contraseña
                                ];
                                try {
                                    $idInsert = hospitalizacionModel::insert('TTBCH_HIFO', $data);
                                    $data = ['status' => true, 'msg'=>'Paciente en estado de hospitalización'];
                                } catch (Exception $e) {
                                    echo "ERROR: ".$e->getMessage();
                                }  
                        }else{
                            $data = ['error'=>$val->getErrors()];
                        }        

                } else {
                    $data = ['error'=>'La cedula es incorrecta o el paciente no se encuentra registrado'];
                }       

            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        public function vacunacion()
        {
            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
                //validar
                    $val = new Validations();
                    $val->name('cedula')->value(clear($_POST['hospitCedula']))->required();
                    $pac = hospitalizacionModel::verifyCed($_POST['hospitCedula']);

                    if ($pac) {                                        
                        if($val->isSuccess()){

                            $data = [
                                    'TMPAC_PID' => $pac[0]['TMPAC_PID'],
                                    'TTHIFO_NC' => $_POST['cama'],  
                                    //arreglar el eliminar espacios de la contraseña
                                ];
                                try {
                                    $idInsert = hospitalizacionModel::insert('TTBCH_HIFO', $data);
                                    $data = ['status' => true, 'msg'=>'Paciente en estado de hospitalización'];
                                } catch (Exception $e) {
                                    echo "ERROR: ".$e->getMessage();
                                }  
                        }else{
                            $data = ['error'=>$val->getErrors()];
                        }        

                } else {
                    $data = ['error'=>'La cedula es incorrecta o el paciente no se encuentra registrado'];
                }       

            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        public function addVaccine()
        {
            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $oldValue = hospitalizacionModel::SQL("SELECT TTVST_VQT, v.TMVAE_NO FROM TTBCH_VSTK s INNER JOIN TMBCH_VAE v ON s.TMVAE_CV = v.TMVAE_CV WHERE s.TMVAE_CV = ".$_POST['vacuna']);
                //validar
                    $val = new Validations();
                    $val->name('cantidad')->value(clear($_POST['cantidad']))->required()->rangeNum(20, 300);
                    $suma = $oldValue[0]['TTVST_VQT'] + $_POST['cantidad'];

                                 
                        if($val->isSuccess()){

                                try {
                                    $idInsert = hospitalizacionModel::SQL("UPDATE TTBCH_VSTK SET TTVST_VQT = ".$suma." where TMVAE_CV = ".$_POST['vacuna']);
                                    $data = ['status' => true, 'msg'=>'Se agregaron '.$suma. ' A la vacuna '.$oldValue[0]['TMVAE_NO']];
                                } catch (Exception $e) {
                                    echo "ERROR: ".$e->getMessage();
                                }  
                        }else{
                            $data = ['error'=>$val->getErrors()];
                        }        

            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        
        public function listarPac()
        {
            try {
                $consulta = ConsultaModel::SQL("SELECT * FROM TMBCH_CAM");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }

        public function listarCTO()
        {
            try {
                $consulta = hospitalizacionModel::SQL("SELECT * FROM TMBCH_CTO ORDER BY TMCTO_NC ASC");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }

        public function listarCAM()
        {
            try {
                $idedo = $_POST['idedo'];
                $consulta = hospitalizacionModel::SQL("SELECT * FROM TMBCH_CAM WHERE TMCTO_NC = ".$idedo.";");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }
    }

?>