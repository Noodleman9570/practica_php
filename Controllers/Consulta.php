<?php

    class Consulta extends Controllers
    {
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(CONSULTA);
            parent::__construct();
        }
        public function Consulta()
        {   
            Auth::accessPage();

            $data['page_name'] = "Consulta Medica";
            $data['page_title'] = "Datos de consulta";
            $data['function_js'] = "/consulta.js";
            $data['style_css'] = "/consulta.css";

            $this->views->getView($this,"consulta",$data);
        }

        public function all()
        {
            $arrJson = [];
            try {
                $info = ConsultaModel::all();
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
                    $val->name('temperatura')->value((int)$_POST['temperatura'])->required()->rangeNum(35, 39);
                    $val->name('peso')->value((int)$_POST['peso'])->required()->rangeNum(21, 99);
                    $val->name('sintomas')->value($_POST['sintomas'])->required();
                    $val->name('diagnostico')->value($_POST['diagnostico'])->required();
                    $val->name('tratamiento')->value($_POST['tratamiento'])->required();

                    if($val->isSuccess()){

                        $data = [
                                'TMPAC_PID' => $_POST['paciente'],
                                'TMMED_MID' => $_POST['medico'],
                                'TTCON_PC' => $_POST['pcr'],  
                                'TTCON_TP' => $_POST['temperatura'],
                                'TTCON_PE' => $_POST['peso'],
                                'TTCON_SI' => clear($_POST['sintomas']),
                                'TTCON_DI' => clear($_POST['diagnostico']),
                                'TTCON_TM' => clear($_POST['tratamiento']),
                                //arreglar el eliminar espacios de la contraseña
                            ];
                            try {
                                $idInsert = consultaModel::insert('TTBCH_CON', $data);
                                $data = ['status' => true, 'msg'=>'Registro guardado'];
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
                $consulta = ConsultaModel::SQL("SELECT * FROM TMBCH_PAC");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }
        public function listarMed()
        {
            try {
                $consulta = ConsultaModel::SQL("SELECT * FROM TMBCH_MED m JOIN TMBCH_ESP e ON m.TMESP_ID = e.TMESP_ID");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }
    }

?>