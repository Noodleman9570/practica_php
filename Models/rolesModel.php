<?php

    class rolesModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }  
        
        //Anterior forma de realizar consultas en la BBDD

        // public function setRol(string $nombre, int $edad)
        // {
        //     $query_insert = "INSERT INTO rol(nombre,edad) VALUES(?,?)";
        //     $arrData = array($nombre, $edad);
        //     $request_insert = $this->insert($query_insert,$arrData);
        //     return $request_insert;

        // }
        // public function updateRol(int $id, string $nombre, int $edad)
        // {
        //     $sql = "UPDATE rol SET nombre = ?, edad = ? WHERE id = $id";
        //     $arrData = array($nombre, $edad);
        //     $request = $this->update($sql,$arrData);
        //     return $request;
        // }
        // public function listRoles()
        // {
        //     $sql = "SELECT * FROM rol WHERE status != 0";
        //     $request = $this->selectAll($sql);
        //     return $request;
        // }
        // public function delRol($id)
        // {
        //     $sql = "DELETE FROM rol WHERE id = $id";
        //     $request = $this->delete($sql);
        //     return $request;
        // }
    }

?>