<div class="row">
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget">
      <!-- header -->
      <div class="card-header">
        <h5>Registrar habilidad</h5>

      </div>

      <!-- body -->
      <div class="card-body">
        <form method="POST" action="<?php echo site_url("admin/sobre_mi/habilidad_create") ?>" id="habilidad_form">

          <!-- habilidad -->
          <div class="form-group">
            <label for="habilidad">habilidad</label>
            <input require id="habilidad" class="form-control" type="text" name="habilidad" placeholder="habilidad">
          </div>

          <!-- nivel de la habilidad -->
          <div class="form-group">
            <label for="customRange1">Custom range</label>
            <input name="nivel" type="range" min="0" max="100" class="custom-range" id="customRange1">
          </div>

        </form>
      </div>

      <!-- submit -->
      <div class="card-footer">
        <button form="habilidad_form" type="submit" class="btn  btn-info float-right">Registrar</button>
      </div>
    </div>
    <!-- /.card -->
  </div>


  <!-- /.col -->
  <div class="col-md-6">
    <!-- Box Comment -->
    <div class="card card-widget">
      <div class="card-header">
        <h5>Mis habilidades</h5>
      </div>
      <!-- /.card-header -->

      <!-- body -->
      <div class="card-body">
        <div id="insert_habilidades">

          <?php if (count($habilidades) > 0) : ?>
            <?php foreach ($habilidades as $habilidad) : ?>
              <!-- nivel habilidad -->
              <div class="progress-group mb-3" id="habilidad-<?php echo $habilidad->id ?>">
                <div class="mb-2">
                  <?php echo $habilidad->nombre ?>
                  <span class="float-right">
                    <a href="#" data-id="<?php echo $habilidad->id ?>" class="text-danger delete_habilidad">Eliminar</a>
                  </span>
                </div>

                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: <?php echo $habilidad->nivel ?>%"></div>
                </div>
              </div>

            <?php endforeach ?>
          <?php else : ?>
            <h3 class="h5 text-secondary">No Hay Habilidades Registradas</h3>
          <?php endif ?>
        </div>
      </div>

    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>