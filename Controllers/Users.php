<?php
    class Users extends Controllers{
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(USERS);
            parent::__construct();

        }

        public function Users()
        {
            Auth::accessPage();
        

            $data['page_id'] = 3;
            $data['page_tag'] = "Usuarios";
            $data['page_name'] = "Usuarios <small>Hospital</small>";
            $data['page_title'] = "Hospital";
            $data['function_js'] = "/users.js";
           $this->views->getView($this,"users",$data);
        }

        public function all()
        {
            $arrJson = [];
            try {
                $user = usersModel::all();
            } catch (Exception $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
            if(empty($user)){
                $arrJson = ['msg'=>'No se encontraron registros'];
            }else{
                $arrJson = $user;
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
                    $val->name('email')->value(clear($_POST['correo']))->pattern('email')->required();
                    $val->name('password')->value(clearPass($_POST['password']))->min(6)->max(20)->pattern('alphanum')->equal(clearPass($_POST['password2']))->required();
                    $val->name('telefono')->value(clear($_POST['telefono']))->required();
                    if($val->isSuccess()){
                        
                        $passHash = hash("sha256", clearPass($_POST['password']));
          
                        $data = [
                            'id_rol' => clear($_POST['rol']),
                            'nombre' => clear($_POST['nombre']),
                            'email' => clear($_POST['correo']),
                            'telefono' => clear((string)$_POST['telefono']),
                            'password' => $passHash,
    
                            //arreglar el eliminar espacios de la contraseña
                        ];
                        try {
                            $idInsert = usersModel::insert('usuarios', $data);
                            $data = ['status' => true, 'msg'=>'Registro guardado'];
                        } catch (Exception $e) {
                            echo "ERROR: ".$e->getMessage();
                        }

                    } else {
                        $data = ['error'=>$val->getErrors()];
                    }       

            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        

    }
?>