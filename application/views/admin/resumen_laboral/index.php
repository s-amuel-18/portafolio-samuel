<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget">
      <!-- header -->
      <div class="card-header">
        <h5>Registrar Resumen Laboral</h5>
      </div>

      <!-- body -->
      <div class="card-body">
        <form action="<?php echo site_url("admin/resumen_laboral/crear") ?>" method="POST" id="resumen_laboral_form">
          <div class="row">

            <!-- nombre -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
              </div>
            </div>
            <!-- categoria -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria_id" class="select2 form-control" id="categoria">
                  <option value="">Seleccionar</option>
                  <?php foreach ($categorias as $categoria) : ?>
                    <option <?php echo !isset($proyecto) ? "" : ($proyecto->categoria_id == $categoria->id ? "selected" : "") ?> value="<?php echo $categoria->id ?>">
                      <?php echo $categoria->nombre ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <!-- Inicio laboral  -->
            <div class="col-sm-6">
              <div class="form-group">
                <label>Inicio laboral</label>
                <div class="input-group date" id="fecha_inicio" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#fecha_inicio" name="fecha_inicio" />
                  <div class="input-group-append" data-target="#fecha_inicio" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- fin laboral  -->
            <div class="col-sm-6">
              <div class="form-group">
                <label>Fin laboral</label>
                <div class="input-group date" id="fecha_fin" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#fecha_fin" name="fecha_fin" />
                  <div class="input-group-append" data-target="#fecha_fin" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label for="descripcion">Descripcion <span class="text-secondary" id="insert_caracters"></span></label>
                <textarea id="descripcion" class="form-control" name="descripcion" rows="3"></textarea>
              </div>
            </div>

          </div>
        </form>
      </div>


      <!-- submit -->
      <div class="card-footer">
        <button form="resumen_laboral_form" type="submit" class="btn  btn-info float-right">Registrar</button>
      </div>
    </div>
    <!-- /.card -->
  </div>


  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget">
      <div class="card-header">
        <h5>Resumenes</h5>
      </div>
      <!-- /.card-header -->

      <!-- body -->
      <div class="card-body">
        <div id="insert_resumen_laboral">

          <?php foreach ($resumenes as $resumen) : ?>

            <div class="card" id="resumen-<?php echo $resumen->id ?>">
              <div class="card-body">
                <h5 class="card-title font-weight-bold">
                  <?php echo $resumen->nombre ?> <span class="text-muted"><?php echo $resumen->categoria ?></span>
                </h5>
                <br>
                <div style="color: #b4b4b4;">
                  <?php echo $resumen->duracion?>
                </div>
                <!-- <p>1</p> -->
                <p class="card-text"><?php echo $resumen->descripcion ?></p>
              </div>

              <div class="card-footer">
                <button data-id="<?php echo $resumen->id ?>" style="width: fit-content;" class="delete_resumen_laboral btn btn-sm btn-danger d-block ml-auto">Eliminar</button>
              </div>
            </div>

          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>