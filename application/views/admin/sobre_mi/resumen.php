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
        <form method="POST" action="<?php echo site_url("admin/sobre_mi/resumen_create")?>" id="resumen_form">

          <div class="form-group">
            <textarea name="resumen" id="summernote"></textarea>
          </div>


        </form>
      </div>

      <!-- submit -->
      <div class="card-footer">
        <button form="resumen_form" type="submit" class="btn  btn-info float-right">Registrar</button>
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
        <div id="insert_resumen">
          <?php foreach( $resumenes as $resumen ) : ?>
            <div class="card" id="resumen-<?php echo $resumen->id?>">
              <div class="card-body ">
                <?php echo $resumen->resumen?>
              </div>
              <div class="card-footer text-right">
                <a href="" class="btn btn-success">Editar</a>
                <button data-id="<?php echo $resumen->id?>" class="btn btn-danger btn_delete_resumen">Eliminar</button>
                <button <?php echo $resumen->activo == 1 ? "disabled" : ""?> data-id="<?php echo $resumen->id?>" class="btn_avtivate_resumen btn 
                  <?php echo $resumen->activo == 1 ? "btn-info" : "btn-outline-info"?>
                ">
                <?php echo $resumen->activo == 1 ? "Activado" : "Activar"?>
              </button>
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

<script>
  const summernote = document.querySelector("#summernote")
  const resumen_form = document.querySelector("#resumen_form")

  resumen_form.addEventListener("submit", e => {
    if (summernote.value.length < 1) {
      e.preventDefault();
      alert("No puedes registrar un resumen vacio")
    }
  })
</script>