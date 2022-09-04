<?php

    class Login extends Controllers
    {
        public function __construct()
        {
            // if (isset($_SESSION['login'])) {
            //     header('Location:'.BASE_URL.'/Home');
            // }
            parent::__construct();
        }
        public function Login()
        {
            $data['title'] = "Ingreso al sistema";
            $data['style_css'] = "login.css";
            $data['function_js'] = "login.js";

            $this->views->getView($this,'login',$data);
        }

        public function access()
        {
            $arrJson = [];
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $val = new Validations();
                $val->name('email')->value($_POST['email'])->pattern('email')->required();
                $val->name('contraseña')->value($_POST['password'])->min(6)->max(20)->pattern('alphanum')->required();
                // Si todo esta bien se logea 
                if($val->isSuccess()){
                    // Logearse
                    $usuario = loginModel::login(clear($_POST['email']), hash("sha256", clearPass($_POST['password'])));

                    if (empty($usuario)) {
                        $arrJson = ['error'=>'El usuario no existe o la contraseña es incorrecta'];
                    } else {
                        // Crear nuestras sesiones
                        $_SESSION['iduser'] = $usuario['id_usuario'];
                        $_SESSION['name'] = $usuario['nombre'];
                        $_SESSION['email'] = $usuario['email'];
                        $_SESSION['login'] = true;
                        Auth::sessionUser($_SESSION['iduser']);
                        $arrJson = ['msg'=>'Inicio de sesion exitoso!'];
                    }
                } else {
                    $arrJson = ['error' => $val->getErrors()];
                }
            }

            echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
        }

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