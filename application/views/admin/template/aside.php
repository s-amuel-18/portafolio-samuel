<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a target="_blanck" href="<?php echo site_url("portafolio") ?>" class="brand-link">
    <img src="<?php echo base_url() ?>assets/admin-lte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Portafolio</span>
  </a>
  <a href="" target="_blanck"></a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image" style="cursor:pointer;" data-toggle="modal" data-target="#modal_photo_perfil">
        <img src="<?php
                  $image = $this->db->get_where(
                    "foto_perfil",
                    [
                      "user_id" => $this->session->userdata("id"),
                      "selected" => 1
                    ]
                  );
                  $image = $image->row("url_foto");
                  echo $image ? base_url($image) : base_url("assets/admin-lte/img/user2-160x160.jpg");

                  ?>" id="photo_perfil_aside" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo site_url("admin/sobre_mi/informacion_personal") ?>" class="d-block">
          <?php
          $id = $this->session->userdata("id");
          $data_user = $this->db->get_where("informacion_personal", ["user_id" => $id]);
          $nombre = $data_user->row("nombre");
          $apellido = $data_user->row("apellido");
          $full_name = $nombre . " " . $apellido;
          echo ($nombre and $apellido) ? $full_name : $this->session->userdata("username")
          ?>
        </a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url("admin")?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- sobre mi -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-user nav-icon"></i>
            <p>
              Sobre Mi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url("admin/sobre_mi/habilidad") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>habilidades</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url("admin/sobre_mi/informacion_personal") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Informacion Personal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url("admin/sobre_mi/redes_sociales") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Redes sociales</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url("admin/sobre_mi/resumen") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Resumen Sobre Mi</p>
              </a>
            </li>

          </ul>
        </li>

        <!-- Proyectos -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Proyectos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url("admin/proyecto") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mis Proyectos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url("admin/proyecto/crear") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nuevo Proyecto</p>
              </a>
            </li>

          </ul>
        </li>

        <!-- resumen laboral -->
        <li class="nav-item">
          <a href="<?php echo site_url("admin/resumen_laboral") ?>" class="nav-link">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              Resumen Laboral
            </p>
          </a>
        </li>

        <!-- Proyectos -->
        <li class="nav-item">
          <a href="<?php echo site_url("admin/trabajos") ?>" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
            Trabajos
            </p>
          </a>
        </li>
        <!-- CONTACTO -->
        <li class="nav-item">
          <a href="<?php echo site_url("admin/contacto") ?>" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Panel De Contacto
            </p>
            <?php $this->load->view("admin/components/badge-contacto"); ?>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<div id="modal_photo_perfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Seleccionar Imagen</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center">
          <img id="photo_perfil" src="<?php echo $image ? base_url($image) : base_url("assets/admin-lte/img/user2-160x160.jpg"); ?>" class="w-100" style=" max-width: 200px;" alt="">
        </div>

        <form id="form_foto" enctype="multipart/form-data">
          <div class="form-group mt-3">
            <label for="photo_perfil_input" class="btn btn-primary btn-block m-auto" style="width: fit-content;"><i class="far fa-images"></i> Seleccionar foto</label>
            <input id="photo_perfil_input" class="d-none" type="file" name="photo_url">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>