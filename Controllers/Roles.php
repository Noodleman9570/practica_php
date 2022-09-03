<?php
    class Roles extends Controllers{
        public function __construct()
        {
            Auth::noAuth();
            Permisos::getPermisos(ROLES);
            parent::__construct();

        }

        public function Roles()
        {

            Auth::accessPage();
            //SELECT
            // $data['roles'] = Mysql::SQL("SELECT * FROM `TMBCH-PAC`");
            // INSERT
            // $datos = [
            //     'id_permisos' => '1',
            //     'nombre_rol' => 'website',
            //     'status' => '0'
            // ];
            // rolesModel::insert('roles',$datos);

            //UPDATE
            // $datosUpdate = [
            //     'nombrerol' => 'sapo',
            // ];

            // rolesModel::update('rol',$datosUpdate, ['idrol'=>2]);
            
            // DELETE
            $id_roles = 6;
            // rolesModel::delete('rol', ['idrol'=>3]);

            $data['page_id'] = 3;
            $data['page_tag'] = "Roles Usuario";
            $data['page_name'] = "rol_usuario";
            $data['page_title'] = "Roles Usuario <small>Tienda Virtual</small>";
           $this->views->getView($this,"roles",$data);
        }

        

    }
?>