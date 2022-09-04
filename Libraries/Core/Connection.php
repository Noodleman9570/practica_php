<?php    

    class Connection{

        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct()
        {
            $this->host = DB_HOST;
            $this->db = DB_NAME;
            $this->user = DB_USER;
            $this->password = DB_PASSWORD;
            $this->charset = DB_CHARSET;
        }
        
        public function Connect()
        {
            try{
                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                
                $pdo = new PDO($connection, $this->user, $this->password, $options);
                error_log("Connection::connect -> conexion exitosa!");
                return $pdo;
            }catch(PDOException $e){
                error_log("Connection::connect -> Ha ocurrido un error en la conexion: " . $e->getMessage());
                print_r('Error connection: ' . $e->getMessage());
            }
        }

        public static function query($sql, $params = [])
        {
            $db = new Connection();
            $link = (object)$db->Connect();
            $link->beginTransaction(); // Por cualquier error, chekpoint
            $query = $link->prepare($sql);

            if(!$query->execute($params))
            {
                $link->rollBack();
                $error = $query->errorInfo();
                throw new Exception($error[2]);
            }
            
            
            // SELECT | INSERT | UPDATE | DELETE | ALTER TABLE
            //Manejo del tipo de query
            //SELECT * FROM roles;
            if (strpos($sql, 'SELECT') !== false) {
                return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
            } elseif(strpos($sql, 'INSERT') !== false)
            {
                $id = $link->lastInsertId();
                $link->commit();
                return $id;
            } elseif(strpos($sql, 'UPDATE') !== false)
            {
                $link->commit();
                return true;
            } elseif(strpos($sql, 'DELETE') !== false)
            {
                if ($query->rowCount() > 0) {
                    $link->commit();
                    return true;
                }

                $link->rollBack();
                return false; //no se borro nada

            } else {
                //Alter table / drop table
                $link->commit();
                return true;
            }
        }
    }

    // para probar la conexion
    // $pruebaconexion = new Connection;
    // var_dump($pruebaconexion->Connect());

