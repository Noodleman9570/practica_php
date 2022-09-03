<?php
    class auth
    {
        public static function sessionUser(int $iduser)
        {
            $respuesta = Mysql::SQL("SELECT * FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id_rol WHERE u.id_usuario = {$iduser}");
            $_SESSION['userData'] = $respuesta[0];
            return $respuesta[0];
        }
        //Acceso a paginas
        public static function accessPage()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header('Location:'.BASE_URL.'/Home');
            }
        }
        //void Sessiones
        public static function noAuth()
        {
            if (!isset($_SESSION['login'])) {
                header('Location:'.BASE_URL.'/Login');
            }
        }
        public static function logout()
        {
            session_start();
            session_destroy();
            $_SESSION = [];
            header('Location:'.BASE_URL.'/Login');
        }
    }


?>