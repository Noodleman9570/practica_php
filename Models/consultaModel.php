<?php 

    class ConsultaModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public static function all()
        {
            $res = Mysql::SQL("SELECT m.TMMED_MID AS id, m.TMMED_CI AS ced, m.TMMED_AP AS ap, m.TMMED_NO AS no, es.TMESP_CE AS esp,es.TMESP_NO AS nesp, es.TMESP_ID AS code, e.TMEDO_CE AS cedo, mu.TMMUN_CM AS cmun, mu.TMMUN_NO AS mnom, m.TMMED_DIR AS dir, m.TMMED_TF AS tf FROM TMBCH_MED m INNER JOIN TMBCH_MUN mu ON m.TMMUN_CM = mu.TMMUN_CM INNER JOIN TMBCH_EDO e ON mu.TMEDO_CE = e.TMEDO_CE INNER JOIN TMBCH_ESP es ON es.TMESP_ID = m.TMESP_CE;");
            return $res;
        }
        public static function verifyCed($ced)
        {
            $res = Mysql::SQL("SELECT * FROM TMBCH_MED where TMMED_CI = '$ced'");
            return $res;
        }
        public static function oneMedico($idReg)
        {
            $respuesta = Mysql::SQL("SELECT * FROM TMBCH_MED p WHERE p.TMMED_MID = $idReg");
            return $respuesta;
        }

        public static function deleteMedico($idReg)
        {
            $iddelete = Mysql::delete('TMBCH_MED', ['TMMED_MID' => $idReg]);
            return $iddelete;
        }
    }

?>