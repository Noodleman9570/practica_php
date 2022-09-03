<?php

    class Permisos
    {
        public static function getPermisos($idPagina)
        {            
            if(!empty($_SESSION['userData'])){
                $idRol = $_SESSION['userData']['id_rol'];
                $arrPermisos = self::pagePermissions($idRol); 
                $permisos = '';
                $permisosMod = '';
                if(count($arrPermisos) > 0){
                    $permisos = $arrPermisos;
                    $permisosMod = isset($arrPermisos[$idPagina]) ? $arrPermisos[$idPagina] : "";
                }

                $_SESSION['permisos'] = $permisos;
                $_SESSION['permisosMod'] = $permisosMod;
            }
        }

        private static function pagePermissions(int $idRol)
        {
            $sql = Mysql::SQL("SELECT * FROM permisos p INNER JOIN pages pg ON p.id_page = pg.id WHERE p.id_rol = {$idRol}");
            $arrPermisos = [];

            for ($i=0; $i < count($sql); $i++) { 
                $arrPermisos[$sql[$i]['id']] = $sql[$i];
            }

            return $arrPermisos;
        }

        public static function getMenus()
        {
            $rows = Mysql::SQL("SELECT * FROM pages");
            $menus = [];
            foreach ($rows as $index => $row){
                if ($row['menu_id'] != NULL) {
                    $id = $row['menu_id'];

                    $menus['menu_'.$id]['submenu'][] = [
                        'id' => $row['id'],
                        'titulo' => $row['titulo'],
                        'page' => $row['page'],
                        'icono' => $row['icono']
                    ];
                } else {
                    $id = $row['id'];
                    $menus['menu_'.$id] = [
                        'id' => $row['id'],
                        'titulo' => $row['titulo'],
                        'page' => $row['page'],
                        'icono' => $row['icono']
                    ];
                }
            }
            return $menus;

        }

        public static function showMenus()
        {
            $menus = self::getMenus();
            if (!$menus) {
                return 'No existe ningun menu en la base de datos';
            }

            $html = '';

            foreach ($menus as $menu){
                if (isset($menu['submenu'])) {
                    //title del menu
                    if (!empty($_SESSION['permisos'][$menu['id']]['r'])) {
                        if ($menu['page']) {
                          $html .= "
                            <li class='treeview'>
                                <a class='app-menu__item' href='#' data-toggle='treeview'>
                                    <i class='app-menu__icon ".$menu['icono']."' aria-hidden='true'></i>
                                    <span class='app-menu__label'>".$menu['titulo']."</span>
                                    <i class='treeview-indicator fa fa-angle-right'></i>
                                </a>";
                        } else {
                          $html .= "
                            <li>
                                <a class='app-menu__item' href='".BASE_URL."/".$menu['page']."'>
                                    <i class='app-menu__icon ".$menu['icono']."'></i>
                                    <span class='app-menu__label'>".$menu['titulo']."</span>
                                </a>
                            ";
                        }
              
                        /* 
                       end Title del menu
                      */
              
                        /* 
                       Item de submenu
                      */
                        if (is_array($menu['submenu'])) {
              
                          $html .= "<ul class='treeview-menu'>";
              
                          foreach ($menu['submenu'] as $submenu) {
                            if ($submenu['page']) {
                              $html .= "<li><a class='treeview-item' href='".BASE_URL."/".$submenu['page']."'><i class='icon fa fa-circle-o'></i> ".$submenu['titulo']."</a></li>";
                            } else {
                              $html .= "<li><a class='treeview-item' href='#'><i class='icon fa fa-circle-o'></i> ".$submenu['titulo']."</a></li>";
                            }
                          }
                          $html .= '</ul>';
                          $html .= '</li>';
                        }
                      }
                      /* 
                       end Item de submenu
                      */
                    } else {
                      /* 
                       Menu principal
                      */
                      if (!empty($_SESSION['permisos'][$menu['id']]['r'])) {
                        if ($menu['page']) {
                          $html .= "
                            <li>
                                <a class='app-menu__item' href='".BASE_URL."/".$menu['page']."'>
                                    <i class='app-menu__icon ".$menu['icono']."'></i>
                                    <span class='app-menu__label'>".$menu['titulo']."</span>
                                </a>
                            </li>
                          ";
                        } else {
                          $html .= "
                          <li>
                          <a class='app-menu__item'>
                              <i class='app-menu__icon ".$menu['icono']."'></i>
                              <span class='app-menu__label'>".$menu['titulo']."</span>
                          </a>
                      </li>
                          ";
                        }
                      }
                }
            }

            // return $html;
            echo $html;
        }

        public static function create()
        {
            if(!empty($_SESSION['permisosMod']['c'])){
                return true;
            }
        }
        public static function read()
        {
            if(!empty($_SESSION['permisosMod']['r'])){
                return true;
            }
        }

        public static function update()
        {
            if(!empty($_SESSION['permisosMod']['u'])){
                return true;
            }
        }

        public static function delete()
        {
            if(!empty($_SESSION['permisosMod']['d'])){
                return true;
            }
        }

    }
?>