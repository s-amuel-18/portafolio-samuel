<script>
  $(function() {
    $('#fecha_inicio').datetimepicker({
      format: 'Y-M-D'
    });
    $('#fecha_fin').datetimepicker({
      format: 'Y-M-D'
    });



    // VALIDACION
    $('#resumen_laboral_form').validate({
      rules: {
        nombre: {
          required: true,
          maxlength: 30
        },
        fecha_inicio: {
          required: true,
          date: true
        },
        fecha_fin: {
          required: true,
          date: true
        },
        descripcion: {
          required: true,
          minlength: 90,
          maxlength: 140
        },
      },
      // messages: {
      //   nombre: {
      //     required: "El campo Nombre es requerido"
      //   },
      //   apellido: {
      //     required: "El campo Apellido es requerido"
      //   },
      //   fecha_nacimiento: {
      //     required: "El campo Fecha Nacimiento es requerido",
      //     date: "el formato del Campo fecha nacimiento es incorrecto"
      //   },
      //   numero_telefono: {
      //     required: "El campo Numero Telefonico es requerido",
      //   },
      // },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  })

    // insertar caracteres
    const pequeña_descripcion = document.getElementById("descripcion");
  // const nombre = document.getElementById("nombre");
  // const descripcion = document.getElementById("descripcion");
  // const proyecto_form = document.getElementById("proyecto_form");

  pequeña_descripcion.addEventListener("keyup", e => {
    insertar_caraceteres("insert_caracters", e.target.value.length);
  })
</script>


<script>
  const button_delete = document.querySelectorAll(".delete_resumen_laboral");

  for (let i = 0; i < button_delete.length; i++) {
    const boton = button_delete[i];
    boton.addEventListener("click", e => {
      deleteElement(
        e,
        "<?php echo site_url("admin/resumen_laboral/delete") ?>",
        "resumen",
        "insert_resumen_laboral"
      );
    });
  }
</script>