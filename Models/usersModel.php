<?php

class usersModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }  
        
        public static function all()
        {
            $res = Mysql::SQL("SELECT id_usuario AS id, id_rol AS rol, nombre AS no, email, telefono AS tf FROM usuarios");
            return $res;
        }
        
    }

?>