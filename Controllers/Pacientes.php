<?php

    class Pacientes extends Controllers
    {
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(ARCHIVOS_MAESTROS);
            parent::__construct();
        }
        public function Pacientes()
        {
            Auth::accessPage();
            
            $data['page_title'] = "Hospital";
            $data['page_name'] = "Pacientes";
            $data['function_js'] = "/pacientes.js";
            $data['style_css'] = "/pacientes.css";
            $this->views->getView($this,"pacientes",$data);
        }
        public function all()
        {

            $arrJson = [];
            $pac = pacientesModel::all();
            if(empty($pac)){
                $arrJson = ['msg'=>'No se encontraron registros'];
            }else{
                $arrJson = $pac;
            }


            echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        }
        public function save()
        {
            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                //validar
                    $val = new Validations();
                    $val->name('cedula')->value(clear($_POST['cedula']))->required();
                    $val->name('apellido')->value(clear($_POST['apellido']))->required();
                    $val->name('nombre')->value(clear($_POST['nombre']))->required();
                    $val->name('Fecha de nacimiento')->value(clear($_POST['fechaNacimiento']))->dateLimit()->required();
                    $val->name('telefono')->value(clear($_POST['telefono']))->pattern('tel')->required();
                    if($val->isSuccess()){

                        $pac = pacientesModel::verifyCed(clear($_POST['cedula']));

                        if (!$pac) {
                            $data = [
                                'TMPAC_CI' => clear($_POST['cedula']),
                                'TMMUN_CM' => $_POST['municipio'],
                                'TMPAC_NO' => clear($_POST['nombre']),
                                'TMPAC_AP' => clear($_POST['apellido']),
                                'TMPAC_SX' => $_POST['sexo'],
                                'TMPAC_DIR' => clear($_POST['direccion']),
                                'TMPAC_FN' => $_POST['fechaNacimiento'],
                                'TMPAC_TF' => clear((string)$_POST['telefono'])    
                                //arreglar el eliminar espacios de la contraseña
                            ];
                            try {
                                $idInsert = pacientesModel::insert('TMBCH_PAC', $data);
                                $data = ['status' => true, 'msg'=>'Registro guardado'];
                            } catch (Exception $e) {
                                echo "ERROR: ".$e->getMessage();
                            }
    
                        } else {
                            $data = ['error'=>'La cedula ya le pertenece a otro paciente'];
                        }       
                    }else{
                        $data = ['error'=>$val->getErrors()];
                    }
          
                        

            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        public function lastInsert()
        {
            $idInsert = pacientesModel::SQL('SELECT MAX(TMPAC_PID) FROM TMBCH_PAC');
            echo json_encode($idInsert);
        }

        public function edit(){

            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //validar
                    $val = new Validations();
                    $val->name('cedula')->value(clear($_POST['ced']))->required();
                    $val->name('apellido')->value(clear($_POST['ap']))->required();
                    $val->name('nombre')->value(clear($_POST['nom']))->required();
                    $val->name('Fecha de nacimiento')->value(clear($_POST['fn']))->dateLimit()->required();
                    $val->name('tel')->value(clear($_POST['tf']))->required();
                    
                    if($val->isSuccess()){
                        
                            $data = [
                                'TMPAC_CI' => clear($_POST['ced']),
                                'TMMUN_CM' => $_POST['mun'],
                                'TMPAC_NO' => clear($_POST['nom']),
                                'TMPAC_AP' => clear($_POST['ap']),
                                'TMPAC_SX' => $_POST['sx'],
                                'TMPAC_DIR' => $_POST['dir'],
                                'TMPAC_FN' => $_POST['fn'],
                                'TMPAC_TF' => clear((string)$_POST['tf'])    
                                //arreglar el eliminar espacios de la contraseña
                            ];

                            $ids = array(
                                'TMPAC_PID' => $_POST['id'],
                            );

                            try {
                                $idInsert = pacientesModel::update('TMBCH_PAC', $data, $ids);
                                $data = ['status' => true, 'msg'=>'Registro actualizado'];
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
            $pac = pacientesModel::onePaciente($id);

            if(empty($pac)){
                Alertas::new("No se encontro el usuario", "danger");
                header('Location:'.BASE_URL.'/Pacientes');
            }

            pacientesModel::deletePaciente($id);
            echo json_encode(['msg' => 'El registro ha sido eliminado'],JSON_UNESCAPED_UNICODE);
            // Alertas::new(sprintf("Se ha eliminado el usuario %s", $pac[0]['nombre']), "success");
            
        }


        public function listarEDO()
        {
            try {
                $consulta = pacientesModel::SQL("SELECT * FROM TMBCH_EDO ORDER BY TMEDO_NO ASC");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }

        public function listarMUN()
        {
            try {
                $idedo = $_POST['idedo'];
                $consulta = pacientesModel::SQL("SELECT * FROM TMBCH_MUN WHERE TMEDO_CE = ".$idedo.";");
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            echo json_encode($consulta);
        }

        
    }

?>
