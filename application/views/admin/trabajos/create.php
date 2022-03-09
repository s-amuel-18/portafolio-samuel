<div class="row">
  <div class="">
    <!-- Box Comment -->
    <div class="card card-widget">
      <!-- body -->
      <div class="card-body">

        <form action="<?php echo site_url("admin/trabajos/save") ?>" method="POST" id="form_trabajos">

        <?php if(isset( $actualizar )):?>
          <input type="hidden" name="id_trabajo" value="<?php echo $trabajo->id ?>">
        <?php endif?>
        
          <!-- nombre de la empresa -->
          <div class="form-group">
            <label for="nombre">Nombre Empresa</label>
            <input  value="<?php echo isset($trabajo->nombre) ? $trabajo->nombre : "" ?>" id="nombre" class="form-control" type="text" name="nombre" value="<?php echo set_value("nombre") ?>">
          </div>

          <div class="row">
            <div class="col-md-6">

              <!-- url del trabajo -->
              <div class="form-group">
                <label for="url_trabajo">Url de la publicacion</label>
                <input value="<?php echo isset($trabajo->url_trabajo) ? $trabajo->url_trabajo : "" ?>" id="url_trabajo" class="form-control" type="text" value="<?php echo set_value("url_trabajo") ?>" name="url_trabajo">
              </div>
            </div>

            <div class="col-md-6">
              <!-- email de la empresa -->
              <div class="form-group">
                <label for="email">E-mail</label>
                <input value="<?php echo isset($trabajo->email) ? $trabajo->email : "" ?>" id="email" class="form-control" type="email" value="<?php echo set_value("email") ?>" name="email">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea  id="descripcion" class="form-control" value="<?php echo set_value("descripcion") ?>" name="descripcion" rows="5"><?php echo isset($trabajo->descripcion) ? $trabajo->descripcion : "" ?></textarea>
          </div>
          <button  type="submit" class="btn  btn-info float-right text-capitalize">
            <?php echo $accion ?>
          </button>
        </form>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>

