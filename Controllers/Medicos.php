<?php

    class Medicos extends Controllers
    {
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(ARCHIVOS_MAESTROS);
            parent::__construct();
        }
        public function Medicos()
        {
            Auth::accessPage();
            
            $data['page_name'] = "Medicos";
            $data['page_title'] = "Hospital";
            $data['function_js'] = "/medicos.js";
            $data['style_css'] = "/medico.css";

            $this->views->getView($this,"medicos",$data);
        }

        public function all()
        {
            $arrJson = [];
            try {
                $med = MedicosModel::all();
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            if(empty($med)){
                $arrJson = ['msg'=>'No se encontraron registros'];
            }else{
                $arrJson = $med;
            }


            echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        }
        public function save()
        {
            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
                //validar
                    $val = new Validations();
                    $val->name('cedula')->value(clear($_POST['ced']))->required();
                    $val->name('apellido')->value(clear($_POST['ap']))->required();
                    $val->name('nombre')->value(clear($_POST['nom']))->required();
                    $val->name('telefono')->value(clear($_POST['tf']))->pattern('tel')->required();
                    $val->name('direccion')->value(clear($_POST['dir']))->required();

                    //Comprobar si se Cumplen todas las validaciones
                    if($val->isSuccess()){
                        $res = MedicosModel::verifyCed(clear($_POST['ced']));

                        if (!$res) {
                            $data = [
                                'TMMED_CI' => clear($_POST['ced']),
                                'TMMUN_CM' => $_POST['mun'],
                                'TMMED_AP' => clear($_POST['ap']),
                                'TMMED_NO' => clear($_POST['nom']),
                                'TMMED_DIR' => clear($_POST['dir']),
                                'TMMED_TF' => clear((string)$_POST['tf']),    
                                'TMESP_CE' => clear($_POST['esp']),
                                //arreglar el eliminar espacios de la contraseña
                            ];
                            try {
                                $idInsert = MedicosModel::insert('TMBCH_MED', $data);
                                $data = ['status' => true, 'msg'=>'Registro guardado'];
                            } catch (Exception $e) {
                                echo "ERROR: ".$e->getMessage();
                            }
    
                        } else {
                            $data = ['error'=>'La cedula ya le pertenece a otro medico'];
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
                    $val->name('cedula')->value(clear($_POST['ced']))->required();
                    $val->name('apellido')->value(clear($_POST['ap']))->required();
                    $val->name('nombre')->value(clear($_POST['nom']))->required();
                    $val->name('telefono')->value(clear($_POST['tf']))->required();
                    $val->name('direccion')->value(clear($_POST['dir']))->required();

                    //Comprobar si se Cumplen todas las validaciones
                    if($val->isSuccess()){
                       
                            $data = [
                                'TMMED_CI' => clear($_POST['ced']),
                                'TMMUN_CM' => $_POST['mun'],
                                'TMMED_AP' => clear($_POST['ap']),
                                'TMMED_NO' => clear($_POST['nom']),
                                'TMMED_DIR' => $_POST['dir'],
                                'TMMED_TF' => clear((string)$_POST['tf']),    
                                'TMESP_CE' => clear($_POST['esp']),
                                //arreglar el eliminar espacios de la contraseña
                            ];

                            $ids = array(
                                'TMMED_MID' => $_POST['id'],
                            );

                            try {
                                $idInsert = MedicosModel::update('TMBCH_MED', $data, $ids);
                                $data = ['status' => true, 'msg'=>'Registro atualizado'];
                            } catch (Exception $e) {
                                echo "ERROR: ".$e->getMessage();
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
            $pac = MedicosModel::oneMedico($id);

            if(empty($pac)){
                Alertas::new("No se encontro el usuario", "danger");
                header('Location:'.BASE_URL.'/Pacientes');
            }

            MedicosModel::deleteMedico($id);
            echo json_encode(['msg' => 'El registro ha sido eliminado'],JSON_UNESCAPED_UNICODE);
            // Alertas::new(sprintf("Se ha eliminado el usuario %s", $pac[0]['nombre']), "success");
            
        }

        public function listarEDO()
        {
            try {
                $consulta = MedicosModel::SQL("SELECT * FROM TMBCH_EDO ORDER BY TMEDO_NO ASC");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }

        public function listarMUN()
        {
            try {
                $idedo = $_POST['idedo'];
                $consulta = MedicosModel::SQL("SELECT * FROM TMBCH_MUN WHERE TMEDO_CE = ".$idedo.";");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }
        public function listarEsp()
        {
            try {
                $consulta = MedicosModel::SQL("SELECT * FROM TMBCH_ESP");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }
        
    }

?>