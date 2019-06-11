<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
   <div class="sidebar-nav navbar-collapse slimscrollsidebar">
         <!-- .User Profile -->
         <div class="user-profile">
            <div class="dropdown user-pro-body">
               <div><img src="<?=asset()?>images/users/varun.jpg" alt="user-img" class="img-circle"></div>
               <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave Gection <span class="caret"></span></a>
               <ul class="dropdown-menu animated flipInY">
                     <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                     <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                     <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="login.html"><i class="fa fa-power-off"></i> Logout</a></li>
               </ul>
            </div>
         </div>
         <!-- .User Profile -->
         <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
               <!-- / Search input-group this is only view in mobile-->
               <div class="input-group custom-search-form">
                     <input type="text" class="form-control" placeholder="Search...">
                     <span class="input-group-btn">
               <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
               </span>
               </div>
               <!-- /input-group -->
            </li>
            <li class="nav-small-cap m-t-10">--- Administración</li>
            <li> 
               <a href="<?=base_url()?>admin/inicio" class="waves-effect <?php if($status == 1): ?> active <?php endif; ?>"><i data-icon="&#xe00b;" class="fa fa-house"></i> Inicio</a>
            </li>
            <li> 
               <a href="<?=base_url()?>admin/usuarios" class="waves-effect <?php if($status == 10): ?> active <?php endif; ?>"><i data-icon="&#xe00b;" class="fa fa-group"></i> Usuarios</a>
            </li>
            <li> 
               <a href="<?=base_url()?>admin/clientes" class="waves-effect <?php if($status == 20): ?> active <?php endif; ?>"><i data-icon="&#xe00b;" class="fa fa-user"></i> Clientes</a>
            </li>

            <li><a href="<?=base_url()?>admin/logout" class="waves-effect <?php if($status == 30): ?> active <?php endif; ?>"><i data-icon="&#xe00b;" class="fa fa-power-off"></i> Cerrar Sesión</a> </li>

         </ul>
   </div>
</div>
<!-- Left navbar-header end -->