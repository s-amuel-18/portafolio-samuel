<div class="">
  <div class="row">
    <div class="col-10">
      <a href="<?php echo site_url("admin/proyecto")?>" class="btn btn-outline-light btn-sm mr-2">Todos | <?php echo $cantidad_proyectos?></a>
      <?php foreach ($categorias as $categoria) : ?>
        <a href="<?php echo site_url("admin/proyecto/categoria/".$categoria->id)?>" class="btn btn-outline-light btn-sm mr-2"><?php echo $categoria->nombre?> | <?php echo $categoria->cantidad?> </a>
      <?php endforeach ?>
    </div>

    <div class="col-2 d-flex justify-content-end">
      <a href="<?php echo site_url("admin/proyecto/crear") ?>" class="btn btn-success">Nuevo</a>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mis Proyectos</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php if (count($proyectos) > 0) : ?>
            <table class="table table-hover text-nowrap" id="table_proyectos">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>nombre</th>
                  <th>link Proyecto</th>
                  <th>Categoria</th>
                  <th>Fecha Inicio</th>
                  <th>Fin Proyecto</th>
                  <th>Fecha Creacion</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody id="insert_proyectos">

                <?php foreach ($proyectos as $proyecto) : ?>
                  <tr id="proyecto-<?php echo $proyecto->id ?>">
                    <td style="max-width: 300px;"><?php echo $proyecto->id ?></td>
                    <td style="max-width: 300px;"><?php echo $proyecto->nombre ?></td>
                    <td style="max-width: 300px;">
                      <a class="text-wrap" href="<?php echo $proyecto->link_proyecto ?>"><?php echo $proyecto->link_proyecto ?></a>
                    </td>
                    <td style="max-width: 300px;"><?php echo $proyecto->categoria ?></td>
                    <td style="max-width: 300px;"><?php echo $proyecto->inicio_fecha ?></td>
                    <td style="max-width: 300px;"><?php echo $proyecto->fecha_fin_proyecto ?></td>
                    <td style="max-width: 300px;"><?php echo $proyecto->created_at ?></td>


                    <td style="max-width: 300px;">
                      <div class="dropdown">
                        <button id="accion" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accion</button>
                        <div class="dropdown-menu" aria-labelledby="accion">
                          <a class="dropdown-item" href="<?php echo site_url("admin/proyecto/ver/" . $proyecto->id) ?>">Ver</a>
                          <a class="dropdown-item" href="<?php echo site_url("admin/proyecto/update//" . $proyecto->id) ?>">Editar</a>
                          <!-- <a class="dropdown-item" href="#">Editar</a> -->
                          <button data-id="<?php echo $proyecto->id ?>" class="dropdown-item text-danger delete_proyecto">Eliminar</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else : ?>
              </tbody>
            </table>
            <h3 class="p-2 h5 text-secondary">No Hay Habilidades Registradas</h3>
          <?php endif ?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>