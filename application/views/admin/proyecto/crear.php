<div class="card card-widget">
  <div class="card-body">
    <form class="p-3" method="POST" action="<?php echo site_url("admin/proyecto/create") ?>" id="proyecto_form" enctype="multipart/form-data">
      <input type="hidden" name="id_update" value="<?php echo isset($proyecto) ? $proyecto->id : 0 ?>">

      <?php $this->load->view("admin/components/alert");?>

      <div class="row">
    
    
        <!-- descripcion -->
        <div class="col-md-9">
          <style>
            .note-editable.card-block {
              height: 65vh;
            }
          </style>
          <div class="form-group">
            <textarea name="descripcion" id="descripcion"><?php echo isset($proyecto) ? $proyecto->descripcion : "" ?></textarea>
            <div class="text-danger" id="insert_error_message_descrip"></div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="pr-4" style="height: 64vh; overflow: auto;">
      
            <!-- preview image -->
            <div class="mb-3">
              <label for="avatarInput" class="image-preview">
                <img style="cursor: pointer;" src="<?php echo isset($proyecto) ? base_url($proyecto->poster_img) : img_insert() ?>" class="image-preview" alt="preview image" id="innsert_img">
                <input type="file" class="d-none custom-file-input" id="avatarInput" name="poster_img">
              </label>
            </div>
      
            <!-- nombre -->
            <div class="">
              <div class="form-group">
                <label for="nombre">Nombre <span id="insert_length_nombre" class="text-secondary"></span></label>
                <input value="<?php echo isset($proyecto) ? $proyecto->nombre : "" ?>" id="nombre" class="form-control" type="text" name="nombre">
              </div>
            </div>
      
            <!-- categoria -->
            <div class="">
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
      
            <!-- link_proyecto -->
            <div class="">
              <div class="form-group">
                <label for="link_proyecto">Link del Proyecto</label>
                <input id="link_proyecto" value="<?php echo isset($proyecto) ? $proyecto->link_proyecto : "" ?>" class="form-control" type="text" name="link_proyecto">
              </div>
            </div>
      
            <!-- fecha_inicio_proyecto -->
            <div class="">
              <div class="form-group">
                <label for="fecha_inicio_proyecto">Fecha De Inicio Del Proyecto</label>
                <div class="input-group date" id="fecha_inicio_proyecto" data-target-input="nearest">
                  <input value="<?php echo isset($proyecto) ? $proyecto->fecha_inicio_proyecto : "" ?>" type="text" class="form-control datetimepicker-input" data-target="#fecha_inicio_proyecto" name="fecha_inicio_proyecto" />
                  <div class="input-group-append" data-target="#fecha_inicio_proyecto" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
      
            <!-- fecha_fin_proyecto -->
            <div class="">
              <div class="form-group">
                <label for="fecha_fin_proyecto">Fecha Fin Fel Protecto</label>
      
                <div class="input-group date" id="fecha_fin_proyecto" data-target-input="nearest">
                  <input value="<?php echo isset($proyecto) ? $proyecto->fecha_fin_proyecto : "" ?>" type="text" class="form-control datetimepicker-input" data-target="#fecha_fin_proyecto" name="fecha_fin_proyecto" />
                  <div class="input-group-append" data-target="#fecha_fin_proyecto" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
      
      
      
            <div class="">
              <div class="form-group">
                <label for="pequeña_descripcion">Pequeña Descripcion <span class="text-secondary" id="insert_caracters"></span></label>
                <textarea id="pequeña_descripcion" class="form-control" name="pequeña_descripcion" rows="3"><?php echo isset($proyecto) ? $proyecto->pequeña_descripcion : "" ?></textarea>
              </div>
            </div>
      
            
          </div>
          <button class="btn btn-primary mt-3 float-right" type="submit">Registrar</button>
        </div>
      </div>

    </form>
  </div>

</div>