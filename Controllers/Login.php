<?php

    class Login extends Controllers
    {
        public function __construct()
        {
            if (isset($_SESSION['login'])) {
                header('Location:'.BASE_URL.'/Home');
            }
            parent::__construct();
        }
        public function Login()
        {
            $data['title'] = "Ingreso al sistema";
            $data['style_css'] = "login.css";
            $data['function_js'] = "login.js";

            $this->views->getView($this,'login',$data);
        }

        // public function access()
        // {
        //     $arrJson = [];
        //     if($_SERVER['REQUEST_METHOD'] == "POST") {
        //         $val = new Validations();
        //         $val->name('email')->value($_POST['email'])->pattern('email')->required();
        //         $val->name('contraseña')->value($_POST['password'])->min(6)->max(20)->pattern('alphanum')->required();
        //         // Si todo esta bien se logea 
        //         if($val->isSuccess()){
        //             // Logearse
        //             $usuario = loginModel::login(clear($_POST['email']), hash("sha256", clearPass($_POST['password'])));

        //             if (empty($usuario)) {
        //                 $arrJson = ['error'=>'El usuario no existe o la contraseña es incorrecta'];
        //             } else {
        //                 // Crear nuestras sesiones
        //                 $_SESSION['iduser'] = $usuario['id_usuario'];
        //                 $_SESSION['name'] = $usuario['nombre'];
        //                 $_SESSION['email'] = $usuario['email'];
        //                 $_SESSION['login'] = true;
        //                 Auth::sessionUser($_SESSION['iduser']);
        //                 $arrJson = ['msg'=>'Inicio de sesion exitoso!'];
        //             }
        //         } else {
        //             $arrJson = ['error' => $val->getErrors()];
        //         }
        //     }

        //     echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
        // }
    }

?>