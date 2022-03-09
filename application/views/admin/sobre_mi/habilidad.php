<?php $this->load->view("admin/components/alert"); ?>

<div class="">
  <div class="card">
    <div class="card-header">
      <div class="d-flex flex-column flex-sm-row justify-content-between">
        <h3 class="card-title">Habilidades Registradas</h3>
        <div class="mt-3 mt-sm-0">
          <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#create_habilidad">Nuevo Habilidad</button>
        </div>
      </div>
    </div>


    <!-- /.card-header -->
    <div class="card-body">
      <div class="mb-3">

      </div>
      <table id="table_habilidad" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="insert_habilidades">

          <?php foreach ($habilidades as $habilidad) : ?>
            <!-- nivel habilidad -->
            <tr id="habilidad-<?php echo $habilidad->id ?>">
              <td>
                <?php echo $habilidad->id ?>
              </td>
              <td>
                <?php echo $habilidad->nombre ?>
              </td>

              <td>
                <div class="progress-group">
                  <div class="progress">
                    <div class="progress-bar bg-info" style="width: <?php echo $habilidad->nivel ?>%"><?php echo $habilidad->nivel ?>%</div>
                  </div>
                </div>
              </td>
              <td class="d-flex justify-content-end">
                <button data-id="<?php echo $habilidad->id ?>" class="btn_update_habilidad btn btn-link text-light" type="button">
                  <i class="fas fa-edit"></i>
                </button>
                <button data-id="<?php echo $habilidad->id ?>" class="delete_habilidad btn btn-link text-light" type="submit">
                  <i class="far fa-times-circle"></i>
                </button>
              </td>
            </tr>




          <?php endforeach ?>


        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <div id="create_habilidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create_habilidad" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create_habilidad">Nueva Habilidad</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" action="<?php echo site_url("admin/sobre_mi/habilidad_create") ?>" id="habilidad_form">

            <input type="hidden" name="id" value="0">

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

            <button class="btn btn-info float-right" type="submit">Registrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>