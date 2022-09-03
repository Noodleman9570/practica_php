    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user"><a href="<?= ROOT; ?>/perfil"><img class="app-sidebar__user-avatar" src="<?= IMG ?>/default_avatar.png" width="65px" alt="User Image"></a>
            <div>
                <a href="<?= ROOT; ?>/perfil">
                    <p class="app-sidebar__user-name"><?=$_SESSION['name'];?></p>
                </a>    
                <p class="app-sidebar__user-designation"><?=$_SESSION['userData']['nombre_rol'];?></p>
            </div>
            <div>
                <a class="dropdown-toggle" id="dropdownMenu3" data-bs-toggle="dropdown" href="<?=ROOT?>/perfil"><i width="60px" class="fa-solid fa-gear" ></i></a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu3">
                    <li><a class="dropdown-item" href="<?= ROOT; ?>/settings"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="<?= ROOT; ?>/perfil"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="<?= ROOT; ?>/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="app-menu">
            <?php Permisos::showMenus(); ?>
            
            <?php if(!empty($_SESSION['permisos'][DASHBOARD]['r'])): ?>
            
            <?php endif ?>

            <?php if(!empty($_SESSION['permisos'][ARCHIVOS_MAESTROS]['r'])): ?>
                
            <?php endif ?>

            <?php if(!empty($_SESSION['permisos'][VACUNACION]['r'])): ?>
            
            <?php endif ?>

            <?php if(!empty($_SESSION['permisos'][HOSPITALIZACION]['r'])): ?>
            
            <?php endif ?>

            <?php if(!empty($_SESSION['permisos'][USERS]['r'])): ?>
            
            <?php endif ?>
            
            <?php if(!empty($_SESSION['permisos'][ROLES]['r'])): ?>
            
            <?php endif ?>


            <li>
                <a class="app-menu__item" href="<?= ROOT; ?>/logout">
                    <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                    <span class="app-menu__label">Logout</span>
                </a>
            </li>
        </ul>
        </aside>