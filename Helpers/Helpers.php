<?php

    //Retorna la url del proyecto
    

    function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        require_once($view_header);
    }
    function footerAdmin($data="")
    {
        $view_footer = "Views/Template/footer_admin.php";
        require_once($view_footer);
    }
    
    //Muestra información formateada
    function dep($data)
    {
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    function getFavicon()
    {
        $path = FAVICON;
        $favicon = SITE_FAVICON;
        $type = '';
        $href = '';
        $placeholder = '<link rel="shortcut icon" href="%s" type="%s">';

        switch (pathinfo($path.$favicon, PATHINFO_EXTENSION)) {
            case 'ico':
                $type = 'image/vnd.microsoft.icon';
                $href = $path . $favicon;
                break;
            case 'png':
                $type = 'image/png';
                $href = $path . $favicon;
                break;
            case 'gif':
                $type = 'image/gif';
                $href = $path . $favicon;
                break;
            case 'svg':
                $type = 'image/svg+xml';
                $href = $path . $favicon;
                break;
            case 'jpg':
                $type = 'image/jpg';
                $href = $path . $favicon;
                break;
            default:
                return false;
                break;
        }

        return sprintf($placeholder, $href, $type);
    }
    function getModal(string $view, string $nameModal, $data)
    {
        $view_modal = "Views/{$view}/Modals/{$nameModal}.php";
        require_once($view_modal);
    }
    function strClean($strCadena){
            $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
            $string = trim($string); //Elimina espacios en blanco al inicio y al final
            $string = stripslashes($string); // Elimina las \ invertidas
            $string = str_ireplace("<script>","",$string);
            $string = str_ireplace("</script>","",$string);
            $string = str_ireplace("<script src>","",$string);
            $string = str_ireplace("<script type=>","",$string);
            $string = str_ireplace("SELECT * FROM","",$string);
            $string = str_ireplace("DELETE FROM","",$string);
            $string = str_ireplace("INSERT INTO","",$string);
            $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
            $string = str_ireplace("DROP TABLE","",$string);
            $string = str_ireplace("OR '1'='1","",$string);
            $string = str_ireplace('OR "1"="1"',"",$string);
            $string = str_ireplace('OR ´1´=´1´',"",$string);
            $string = str_ireplace("is NULL; --","",$string);
            $string = str_ireplace("in NULL; --","",$string);
            $string = str_ireplace("LIKE '","",$string);
            $string = str_ireplace('LIKE "',"",$string);
            $string = str_ireplace('LIKE ´',"",$string);
            $string = str_ireplace("OR 'a'='a","",$string);
            $string = str_ireplace('OR "a"="a',"",$string);
            $string = str_ireplace("OR ´a´=´a","",$string);
            $string = str_ireplace("OR ´a´=´a","",$string);
            $string = str_ireplace("--","",$string);
            $string = str_ireplace("^","",$string);
            $string = str_ireplace("[","",$string);
            $string = str_ireplace("]","",$string);
            $string = str_ireplace("==","",$string);
            return $string;
    }
    //Genera una contraseña de 10 caracteres
    function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass = $length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena = strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    //Genera un token
    function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }
    //Formato para valores monetarios
    function formatMoney($cant){
        $cant = number_format($cant,2,SPD,SPM);
        return $cant;
    }

    function getLogo()
    {
        $default_logo = SITE_LOGO;  
        $placeholder_image = 'https://via.placeholder.com/150x60';

        $src = 'IMAGE_PATH'.$default_logo;

        if (@getimagesize($src)) {
            return $placeholder_image;
        }
        return IMG.$default_logo;
    }

    function clearPass($datos)
    {
        $datos = htmlspecialchars($datos, ENT_QUOTES, 'UTF-8');
        $datos = utf8_decode($datos);

        return $datos;
    }

    function clear($datos)
    {
        $datos = trim($datos);
        $datos = htmlspecialchars($datos, ENT_QUOTES, 'UTF-8');
        $datos = utf8_decode($datos);
        $datos = utf8_encode($datos);

        return $datos;
    }

?>