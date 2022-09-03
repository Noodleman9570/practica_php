<?php 

    class HospitalizacionModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public static function all()
        {
            $res = Mysql::SQL("SELECT pac.TMPAC_PID AS idpac, pac.TMPAC_CI AS cipac, pac.TMPAC_NO AS nombre,  pac.TMPAC_AP AS apellido, TTHIFO_CDH AS codhos, TTHIFO_FI AS fecha, TTHIFO_NC AS numcama, con.TTCON_CC AS codcon, TTHIFO_ST AS status FROM TTBCH_HIFO info JOIN TTBCH_CON con ON info.TTCON_CC = con.TTCON_CC JOIN TMBCH_PAC pac ON pac.TMPAC_PID = con.TMPAC_PID");
            return $res;
        }

        public static function verifyCed($ced)
        {
            $res = Mysql::SQL("SELECT * FROM TMBCH_PAC where TMPAC_CI = '$ced'");
            return $res;
        }
        
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