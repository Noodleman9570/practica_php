<?php 

    class pacientesModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public static function all()
        {
            $res = Mysql::SQL("SELECT p.TMPAC_PID AS id, p.TMPAC_CI AS ced, p.TMPAC_AP AS ap, p.TMPAC_NO AS no, p.TMPAC_SX AS sx, e.TMEDO_CE AS cedo, m.TMMUN_CM AS cmun, m.TMMUN_NO AS mnom, p.TMPAC_DIR AS dir, p.TMPAC_FN AS fn, p.TMPAC_TF AS tf FROM TMBCH_PAC p INNER JOIN TMBCH_MUN m ON p.TMMUN_CM = m.TMMUN_CM INNER JOIN TMBCH_EDO e ON m.TMEDO_CE = e.TMEDO_CE;");
            return $res;
        }

        public static function verifyCed($ced)
        {
            $res = Mysql::SQL("SELECT * FROM TMBCH_PAC where TMPAC_CI = '$ced'");
            return $res;
        }

        public static function onePaciente($idReg)
        {
            $respuesta = Mysql::SQL("SELECT * FROM TMBCH_PAC p WHERE p.TMPAC_PID = $idReg");
            return $respuesta;
        }

        public static function deletePaciente($idUser)
        {
            $iddelete = Mysql::delete('TMBCH_PAC', ['TMPAC_PID' => $idUser]);
            return $iddelete;
        }
        
    }

?>