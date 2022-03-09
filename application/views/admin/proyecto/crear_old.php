<div class="row">
  <div class="col-md-12">
    <!-- Box Comment -->
    <div class="card card-widget">
      <!-- header -->
      <div class="card-header">
        <h5><?php echo $subtitle?></h5>

      </div>

      <!-- body -->
      <div class="card-body">
        <form method="POST" action="<?php echo site_url("admin/proyecto/create") ?>" id="proyecto_form" enctype="multipart/form-data">

        <input type="hidden" name="id_update" value="<?php echo isset($proyecto) ? $proyecto->id : 0?>">

          <div class="row">
            <div class="col-md-6">
              <label for="avatarInput" class="image-preview">
                <img style="cursor: pointer;" src="<?php echo isset($proyecto) ? base_url($proyecto->poster_img) : img_insert()?>" class="image-preview" alt="preview image" id="innsert_img">
              </label>
            </div>
            <div class="col-md-6">
              <div class="row">

                <!-- nombre -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="nombre">Nombre <span id="insert_length_nombre" class="text-secondary"></span></label>
                    <input value="<?php echo isset($proyecto) ? $proyecto->nombre : ""?>" id="nombre" class="form-control" type="text" name="nombre">
                  </div>
                </div>

                <!-- categoria -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria_id" class="select2 form-control" id="categoria">
                      <option value="">Seleccionar</option>
                      <?php foreach ($categorias as $categoria) : ?>
                        <option <?php echo !isset($proyecto) ? "" : ($proyecto->categoria_id == $categoria->id ? "selected" : "")?> value="<?php echo $categoria->id ?>">
                          <?php echo $categoria->nombre ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <!-- link_proyecto -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="link_proyecto">Link del Proyecto</label>
                    <input id="link_proyecto" value="<?php echo isset($proyecto) ? $proyecto->link_proyecto : ""?>" class="form-control" type="text" name="link_proyecto">
                  </div>
                </div>

                <!-- fecha_inicio_proyecto -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="fecha_inicio_proyecto">Fecha De Inicio Del Proyecto</label>
                    <div class="input-group date" id="fecha_inicio_proyecto" data-target-input="nearest">
                      <input value="<?php echo isset($proyecto) ? $proyecto->fecha_inicio_proyecto : ""?>" type="text" class="form-control datetimepicker-input" data-target="#fecha_inicio_proyecto" name="fecha_inicio_proyecto" />
                      <div class="input-group-append" data-target="#fecha_inicio_proyecto" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- fecha_fin_proyecto -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="fecha_fin_proyecto">Fecha Fin Fel Protecto</label>

                    <div class="input-group date" id="fecha_fin_proyecto" data-target-input="nearest">
                      <input value="<?php echo isset($proyecto) ? $proyecto->fecha_fin_proyecto : ""?>" type="text" class="form-control datetimepicker-input" data-target="#fecha_fin_proyecto" name="fecha_fin_proyecto" />
                      <div class="input-group-append" data-target="#fecha_fin_proyecto" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- imagen -->
                <div class="col-sm-6">
                  <label for="">Seleccionar Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="avatarInput" name="poster_img">
                      <label class="custom-file-label" for="exampleInputFile">Seleccionar Imagen</label>
                    </div>

                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="pequeña_descripcion">Pequeña Descripcion <span class="text-secondary" id="insert_caracters"></span></label>
                    <textarea id="pequeña_descripcion" class="form-control" name="pequeña_descripcion" rows="3"><?php echo isset($proyecto) ? $proyecto->pequeña_descripcion : ""?></textarea>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <textarea name="descripcion" id="descripcion">
                    <?php echo isset($proyecto) ? $proyecto->descripcion : ""?>
                    </textarea>
                    <div class="text-danger" id="insert_error_message_descrip"></div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </form>
      </div>

      <!-- submit -->
      <div class="card-footer">
        <button form="proyecto_form" type="submit" class="btn  btn-info float-right">Registrar</button>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>

