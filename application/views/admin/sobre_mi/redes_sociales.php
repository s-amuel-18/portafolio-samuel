<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget">
      <!-- header -->
      <div class="card-header">
        <h5>Registrar Red Social</h5>
      </div>

      <!-- body -->
      <div class="card-body">
        <form method="POST" action="<?php echo site_url("admin/sobre_mi/red_social_create")?>" id="red_social_form">

          <div class="row">
            <!-- nombre -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
              </div>
            </div>

            <!-- icono -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="icon_class">Clase del icono</label>
                <select id="icon_class" name="icono" class="form-control select2">
                  <option value="">Seleccionar</option>
                  <option value="fab fa-facebook-f">Facebook</option>
                  <option value="fab fa-instagram">Instagram</option>
                  <option value="fab fa-github">GitHub</option>
                  <option value="fab fa-linkedin-in">Linkedin</option>
                </select>
                <!-- <input id="icon_class" class="form-control" type="text" name="icono"> -->
              </div>
            </div>

            <!-- link -->
            <div class="col-sm-12">
              <div class="form-group">
                <label for="url">Url Red Social</label>
                <input id="url" class="form-control" type="text" name="url">
              </div>
            </div>


          </div>


        </form>
      </div>

      <!-- submit -->
      <div class="card-footer">
        <button form="red_social_form" type="submit" class="btn  btn-info float-right">Registrar</button>
      </div>
    </div>
    <!-- /.card -->
  </div>


  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget">
      <div class="card-header">
        <h5>Informacion Personal</h5>
      </div>
      <!-- /.card-header -->

      <!-- body -->
      <div class="card-body">
        <div id="insert_redes">
          <?php foreach($redes_sociales as $red) : ?>
            <!-- nivel avilidad -->
            <div id="red_social-<?php echo $red->id?>" class="row">
              <div class="col-md-8 mb-3">
              <a href="#" class="btn btn-block btn-primary">
                <i class="<?php echo $red->icono?> mr-2"></i> <?php echo $red->nombre?>
              </a>
              </div>
              <div class="col-md-4">
                <button data-id="<?php echo $red->id?>" class="btn btn-danger delete_red_social">Eliminar</button>
                <!-- <a href="" data-id="<?php echo $red->id?>" class="btn btn-danger delete_red_social">Eliminar</a> -->
              </div>

            </div>
            <?php endforeach ?>

        </div>
      </div>

    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
