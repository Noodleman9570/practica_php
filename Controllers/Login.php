<?php

    class Login extends SessionController
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function Login()
        {
            $data['title'] = "Ingreso al sistema";
            $data['style_css'] = "login.css";
            $data['function_js'] = "login.js";

            $this->views->getView($this,'login',$data);
        }

        function authenticate(){

            $arrJson = [];
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $val = new Validations();
                $val->name('email')->value($_POST['email'])->pattern('email')->required();
                $val->name('password')->value($_POST['password'])->min(6)->max(20)->pattern('alphanum')->required();
                
                if($val->isSuccess()){
                    error_log("Login::authenticate -> validaciones exitosas");
                    $email = $this->getPOST('email');
                    $password = $this->getPOST('password');
        
                    
                    $user = $this->model->login($email, $password);
        
                    if($user != NULL){
                        $this->initialize($user);
                        $arrJson = ['msg'=>'Inicio de sesion exitoso!'];
                    } else {
                        $arrJson = ['error'=>'El usuario no existe o la contraseña es incorrecta'];
                    }
                } else {
                    $arrJson = ['error' => $val->getErrors()];
                }
            }
            echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
        }

        public function signup(){

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
                    if($email == '' || empty($email) || $password == '' || empty($password)){
                        // error al validar datos
                        //$this->errorAtSignup('Campos vacios');
                        error_log('Signup::save -> los campos estan vacios');
                        $this->redirect('signup', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
                    }

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