<?php 

    class vacunasModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public static function all()
        {
            $res = Mysql::SQL("SELECT TMVAE_CV AS id, TMVAE_NO AS nom, TMVAE_DE AS des, TMVAE_FE AS fe FROM TMBCH_VAE");
            return $res;
        }
        // public static function verifyCod($cod)
        // {
        //     $res = Mysql::SQL("SELECT * FROM TMBCH_ESP where TMESP_CE = '$cod'");
        //     return $res;
        // }
        public static function oneRegist($id)
        {
            $respuesta = Mysql::SQL("SELECT * FROM TMBCH_VAE e WHERE e.TMVAE_CV = $id");
            return $respuesta;
        }
        public static function deleteRegist($id)
        {
            $iddelete = Mysql::delete('TMBCH_VAE', ['TMVAE_CV' => $id]);
            return $iddelete;
        }
        
    }

?>