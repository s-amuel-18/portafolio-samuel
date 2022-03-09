<div class="row">
  <div class="col-md-7">
    <!-- Box Comment -->
    <div class="card card-widget">
      <!-- header -->
      <div class="card-header">
        <h5>Registrar Informacion</h5>

      </div>

      <!-- body -->
      <div class="card-body">
        <form method="POST" action="<?php echo site_url("admin/sobre_mi/informacion_personal_create") ?>" id="informacion_form">
          <!-- <input type="hidden" name="informacion_id" value="0"> -->

          <div class="row">

            <!-- nombre -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
              </div>
            </div>

            <!-- apellido -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input id="apellido" class="form-control" type="text" name="apellido">
              </div>
            </div>

            <!-- dia de nacimiento -->
            <div class="col-sm-6">
              <div class="form-group">
                <label>Fecha Nacimiento</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="fecha_nacimiento" />
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- telefono -->
            <div class="col-sm-6">
              <div class="form-group">
                <label>Numero Telefonico</label>
                <div class="input-group">

                  <input name="telefono" type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+99 999 99999[9]9']" data-mask>
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
              </div>
            </div>

            <!-- email -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Correo Electronico</label>
                <div class="input-group">
                  <input type="email" class="form-control" name="email" id="email">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                </div>
              </div>
            </div>

            <!-- sitio web -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="sitio_web">Sitio Web</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="url_web" id="sitio_web">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                  </div>
                </div>
              </div>
            </div>



            <!-- universitario -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Universitario</label>
                <!-- <input name="universitario" type="text"> -->
                <select name="universitario" class="form-control select2">
                  <option value="">Seleccionar</option>
                  <option value="En Curso">En Curso</option>
                  <option value="Tecnico Superior">Tecnico Superior</option>
                  <option value="Ingeniero">Ingeniero</option>
                </select>
              </div>
            </div>

            <!-- profecion -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="profecion">Profesion</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="profesion" id="profecion">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Inicio de aprendizaje  -->
            <div class="col-sm-6">
              <div class="form-group">
                <label>Inicio de aprendizaje</label>
                <div class="input-group date" id="inicio_de_aprendizaje" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#inicio_de_aprendizaje" name="fecha_inicio_profesion" />
                  <div class="input-group-append" data-target="#inicio_de_aprendizaje" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Inicio de aprendizaje  -->
            <div class="col-sm-6">
              <div class="form-group">
                <label>Inicio de experiencia lavoral</label>
                <div class="input-group date" id="inicio_de_experiencia_lavoral" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#inicio_de_experiencia_lavoral" name="fecha_inicio_experiencia" />
                  <div class="input-group-append" data-target="#inicio_de_experiencia_lavoral" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </form>
      </div>

      <!-- submit -->
      <div class="card-footer">
        <button form="informacion_form" type="submit" class="btn  btn-info float-right">Registrar</button>
      </div>
    </div>
    <!-- /.card -->
  </div>


  <!-- /.col -->
  <div class="col-md-5">
    <!-- Box Comment -->
    <div class="card card-widget">
      <div class="card-header">
        <h5>Informacion Personal</h5>
      </div>
      <!-- /.card-header -->

      <!-- body -->
      <div class="card-body">
        <div>
          <?php if (isset($informacion_personal)) : ?>
            <?php foreach ($informacion_personal as $key => $value) : ?>
              <?php if ($key != "id" and $key != "user_id" and $key != "created_at") : ?>
                <div class="mb-3">
                  <strong class="text-capitalize"><?php echo str_replace("_", " ", $key) ?>: </strong>
                  <span class="inner_information_personal" data-info="<?php echo $value ?>" data-input_name="<?php echo $key ?>"><?php echo $value ?></span>
                </div>
              <?php endif ?>
            <?php endforeach ?>

          <?php else : ?>
            <p class="text-muted">No hay resumen Registrado</p>
          <?php endif ?>
        </div>
      </div>


      <?php if (!empty($informacion_personal)) : ?>

        <div class="card-footer">
          <a href="" class="btn  btn-success float-right" id="button_actualizar">Actualizar</a>
        </div>

      <?php endif ?>

    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>


<script>

  const button_actualizar = document.getElementById("button_actualizar");
  const informacion_form = document.getElementById("informacion_form");
  const inner_information_personal = document.querySelectorAll(".inner_information_personal");

  if( button_actualizar ) {
    
      button_actualizar.addEventListener("click", e => {
        e.preventDefault();
    
        for (let i = 0; i < inner_information_personal.length; i++) {
          let dataSet_name = inner_information_personal[i].dataset.input_name;
          let dataSet_info = inner_information_personal[i].dataset.info;
          informacion_form[dataSet_name].value = dataSet_info;
    
        }
      });

  }
</script>