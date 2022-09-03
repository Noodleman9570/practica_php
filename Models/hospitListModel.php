<?php 

    class HospitListModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public static function all()
        {
            $res = Mysql::SQL("SELECT p.TMPAC_PID AS id, p.TMPAC_CI AS ced, p.TMPAC_AP AS ap, p.TMPAC_NO AS no, h.TTHIFO_FI AS fechaIngreso, h.TTHIFO_NC AS nroCama FROM TMBCH_PAC p INNER JOIN TTBCH_HIFO h ON p.TMPAC_PID = h.TMPAC_PID;");
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