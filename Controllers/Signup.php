<?php
    class Signup extends SessionController{
        public function __construct()
        {
            // Auth::noAuth();
            // Permisos::getPermisos(USERS);
            parent::__construct();

        }

        // public function all()
        // {
        //     $arrJson = [];
        //     try {
        //         $user = usersModel::all();
        //     } catch (Exception $e) {
        //         echo "ERROR: ".$e->getMessage();
        //     }
            
        //     if(empty($user)){
        //         $arrJson = ['msg'=>'No se encontraron registros'];
        //     }else{
        //         $arrJson = $user;
        //     }


        //     echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);
        // }

    //     public function save()
    //     {
    //         $data = [];
            
    //         if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //             //validar
    //                 $val = new Validations();
    //                 $val->name('nombre')->value(clear($_POST['nombre']))->required();
    //                 $val->name('email')->value(clear($_POST['correo']))->pattern('email')->required();
    //                 $val->name('password')->value(clearPass($_POST['password']))->min(6)->max(20)->pattern('alphanum')->equal(clearPass($_POST['password2']))->required();
    //                 $val->name('telefono')->value(clear($_POST['telefono']))->required();
    //                 if($val->isSuccess()){
                        
    //                     $passHash = usersModel::getHashedPassword($_POST['password']);
          
    //                     $data = [
    //                         'id_rol' => clear($_POST['rol']),
    //                         'nombre' => clear($_POST['nombre']),
    //                         'email' => clear($_POST['correo']),
    //                         'telefono' => clear((string)$_POST['telefono']),
    //                         'password' => $passHash,
    
    //                         //arreglar el eliminar espacios de la contraseña
    //                     ];
    //                     try {
    //                         $idInsert = usersModel::insert('usuarios', $data);
    //                         $data = ['status' => true, 'msg'=>'Registro guardado'];
    //                     } catch (Exception $e) {
    //                         echo "ERROR: ".$e->getMessage();
    //                     }

    //                 } else {
    //                     $data = ['error'=>$val->getErrors()];
    //                 }       

    //         }

    //         echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //     }
        

    // }

        public function save(){

            $arrJson = [];

            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                error_log("Signup::save contenido de form: " . "email: " . $_POST['email'] . " password: " . $_POST['password']);
                $email = $this->getPost('email');
                $password = $this->getPost('password');
                $repeatpass = $this->getPost('password_rep');

                //validar
                $val = new Validations();
                $val->name('email')->value($email)->pattern('email')->required();
                $val->name('password')->value(clearPass($password))->min(6)->max(20)->pattern('alphanum')->equal(clearPass($repeatpass))->required();
                if($val->isSuccess()){
                                            
                    //validate data
                    // if($email == '' || empty($email) || $password == '' || empty($password)){
                    //     // error al validar datos
                    //     //$this->errorAtSignup('Campos vacios');
                    //     error_log('Signup::save -> los campos estan vacios');
                    //     $this->redirect('signup', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
                    // }

                    $user = new UserModel();
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setRole("user");
                    
                    if($user->exists($email)){
                        error_log("Signup::save -> el email ya existe");
                        $arrJson = ['error'=>'Ya existe un email con este nombre'];
                        
                    }else if($user->save()){
                        error_log("Signup::save -> Registro exitoso");
                        $arrJson = ['msg'=>'Registro exitoso!'];

                    }else{
                        /* $this->errorAtSignup('Error al registrar el usuario. Inténtalo más tarde');
                        return; */
                        error_log("Signup::save -> Error al registrar el usuario. Inténtalo más tarde");
                        $arrJson = ['error'=>'Error al registrar el usuario. Inténtalo más tarde'];
                    }

                } else {
                    error_log("Signup::save -> Ha ocurrido un error en las validaciones");
                    $arrJson = ['error' => $val->getErrors()];
                } 
            }      

            echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
        }

    }


?>