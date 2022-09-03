<?php

use FTP\Connection;

class Mysql extends Conexion
{
    //Anterior forma de realizar consultas a la BBDD


    // private $conexion;
    // private $strquery;
    // private $arrValues;

    // function __construct()
    // {
    //     $this->conexion = new Conexion();    
    //     $this->conexion = $this->conexion->getConnect();
    // }

    // //Inserta un registro
    // public function insert(string $query, array $arrValues)
    // {
    //     $this->strquery = $query;
    //     $this->arrValues = $arrValues;

    //     $insert = $this->conexion->prepare($this->strquery);
    //     $resInsert = $insert->execute($this->arrValues);
    //     if($resInsert)
    //     {
    //         $lastInsert = $this->conexion->lastInsertId();
    //     }else{
    //         $lastInsert = 0;
    //     }
    //     return $lastInsert;
    // }
    // //Busca un registro
    // public function select(string $query)
    // {
    //     $this->strquery = $query;
    //     $result = $this->conexion->prepare($this->strquery);
    //     $result->execute();
    //     $data = $result->fetch(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    // //Devuelve todos los registros
    // public function selectAll(string $query)
    // {
    //     $this->strquery = $query;
    //     $result = $this->conexion->prepare($this->strquery);
    //     $result->execute();
    //     $data = $result->fetchall(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    // //Actualiza registros
    // public function update(string $query, array $arrValues)
    // {
    //     $this->strquery = $query;
    //     $this->arrValues = $arrValues;
    //     $update = $this->conexion->prepare($this->strquery);
    //     $resExecute = $update->execute($this->arrValues);
    //     return $resExecute;
    // }

    // //Eliminar un registro
    // public function delete(string $query)
    // {
    //     $this->strquery = $query;
    //     $result = $this->conexion->prepare($this->strquery);
    //     $del = $result->execute();
    //     return $del;
    // }
    public static function consultarSQL($query)
    {
        $link = new Conexion();
        $link =  (object)$link->getConnect();
        $resultado = $link->query($query);
        $array = [];

        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $array[] = $registro;
        }

        $resultado->closeCursor();
        return $array;
    }

    /**
    *
    * Cosultar de forma plana un SQL 
    * @param string $sql
    *
    */
    

    public static function SQL($query)
    {
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    

    //Listar registros desde la base de datso o un solo registro


    public static function listEqual($table, $params = [], $limit = null)
    {
        $cols_values = "";
        $limits = "";

        if (!empty($params)) {
            $cols_values .= "WHERE";
            foreach($params as $key => $value)
            {
                $cols_values .= " {$key} = :{$key} AND";
            }
            $cols_values = substr($cols_values, 0, -3);
        }

        if ($limit !== null) 
        {
            $limits = " LIMIT {$limit}";
        }

        $stmt = "SELECT * FROM $table {$cols_values}{$limits}";

        //Call base de datos del query

        if(!$rows = parent::query($stmt, $params))
        {
            return false;
        }
        
        return $limit === 1 ? $rows[0] : $rows;
    }

    public static function join($table1, $table2, $val1,$val2, $params = [], $limit = null)
    {
        $cols_values = "";
        $limits = "";

        if (!empty($params)) {
            $cols_values .= "WHERE";
            foreach($params as $key => $value)
            {
                $cols_values .= " {$key} = :{$key} AND";
            }
            $cols_values = substr($cols_values, 0, -3);
        }

        if ($limit !== null) 
        {
            $limits = " LIMIT {$limit}";
        }
        /*SELECT * FROM productos
            INNER JOIN categorias
            ON productos.id_categoria_pro = categorias.id_cat;*/

        $stmt = "SELECT * FROM $table1
                INNER JOIN $table2
                ON $table1.$val1 = $table2.$val2
                {$cols_values}{$limits}";

        //Call base de datos del query

        if(!$rows = parent::query($stmt, $params))
        {
            return false;
        }
        
        return $limit === 1 ? $rows[0] : $rows;
    }

    //Insertar registros

    public static function insert($table, $params)
    {
        $cols = "";
        $placeholders = "";
        foreach($params as $key => $value) // INSERT INTO roles(name_rol, estado_rol) values (:name_rol,:estado_rol)
        {
            $cols .= "{$key} ,";
            $placeholders .= ":{$key} ,";
        }
        $cols = substr($cols, 0, -1);
        $placeholders = substr($placeholders, 0, -1);
        $stmt = "INSERT INTO {$table}({$cols}) VALUES ({$placeholders})";

        if($id = parent::query($stmt,$params))
        {
            return $id;
        }
        else 
        {
            return false;
        }
    }

    // Update Registros

    public static function update($table, $params = [], $id = [])
    {
        $cols = "";
        $placeholders = "";
        foreach ($params as $key => $value) {
            $placeholders .= " {$key} = :{$key} ,";
        }
        $placeholders = substr($placeholders, 0, -1);

        if (count($id) > 1) {
            foreach ($id as $key => $value) {
                $cols .= " $key = :$key AND";
            }
            $cols = substr($cols, 0, -3);
        } else {
            foreach ($id as $key => $value) {
                $cols .= " $key = :$key";
            }
        }

        $stmt = "UPDATE $table SET $placeholders WHERE $cols";

        if (!parent::query($stmt, array_merge($params, $id))) {
            return false;
        }

        return true;
    }

    public static function delete($table, $params = [], $limit = 1)
    {
        // DLETE FROM rol WHERE idrol = 1 AND status = 2
        $cols_values = "";
        $limits = "";
        if (!empty($params)) {
            $cols_values .= "WHERE";
            foreach ($params as $key => $value){
                $cols_values .= " {$key} = :{$key} AND";
            }
            $cols_values = substr($cols_values, 0, -3);
        }

        if ($limit != null) {
            $limits = " LIMIT {$limit}"; 
        }

        $stmt = "DELETE FROM $table {$cols_values}{$limits}";

        if (!$row = parent::query($stmt, $params)) {
            return false;
        }
        
        return $row;
    }
}

?>