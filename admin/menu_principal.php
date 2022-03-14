<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Cafe Arte</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <button class="fa fa-user"></button>
        <div class="info">
          <a class="d-block"><?php echo $_SESSION['nombre']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuarios
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="frm_crear_usuarios.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Nuevo Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frm_listar_usuarios.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Listar Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list-ul"></i>
              <p>
                Menú
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-glass"></i>
                  <p>
                    Bebidas
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="frm_listar_elementos_menu.php?categoria=bebidaCaliente" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Bebidas Calientes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frm_listar_elementos_menu.php?categoria=bebidaFria" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Bebidas Frias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frm_listar_elementos_menu.php?categoria=bebidaOrigen" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Bebidas De Origen</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frm_listar_elementos_menu.php?categoria=licor" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Licores</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frm_listar_elementos_menu.php?categoria=cerveza" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Cervezas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frm_listar_elementos_menu.php?categoria=coctel" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Cocteles y Shots</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="frm_listar_elementos_menu.php?categoria=dulce" class="nav-link">
                  <i class="fa fa-search nav-icon"></i>
                  <p>Dulces Tentaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frm_listar_elementos_menu.php?categoria=desayuno" class="nav-link">
                  <i class="fa fa-cutlery nav-icon"></i>
                  <p>Desayunos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frm_listar_elementos_menu.php?categoria=paraPicar" class="nav-link">
                  <i class="fa fa-bars nav-icon"></i>
                  <p>Para Picar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frm_listar_elementos_menu.php?categoria=infusion" class="nav-link">
                  <i class="fa fa-pagelines nav-icon"></i>
                  <p>Infusiones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frm_listar_elementos_menu.php?categoria=jugoterapia" class="nav-link">
                  <i class="fa fa-apple nav-icon"></i>
                  <p>Jugoterapia</p>
                </a>
              </li>
          </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Imagenes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="frm_admin_slider.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Slider principal</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-header">SISTEMA</li>
          <li class="nav-item">
            <a href="frm_cambiar_contraseña.php" class="nav-link">
              <i class="nav-icon fa fa-key text-warning"></i>
              <p>Cambiar Contraseña</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="control/sesionDestruida.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out text-danger"></i>
              <p>Salir</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>