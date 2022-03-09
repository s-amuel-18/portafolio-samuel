<script src="<?php echo base_url("assets/js/functions/fn_trabajos.js") ?>"></script>
<script src="<?php echo base_url("assets/js/trabajos.js") ?>"></script>



<script>
  $(function() {
    //Date picker
    let minima_fecha = moment().startOf('month').format();
    // console.log(minima_fecha);
    $('#trabajos_desde').datetimepicker({
      format: 'D/M/Y',
      maxDate: new Date(),
      date: minima_fecha,
    });

    $('#trabajos_hasta').datetimepicker({
      format: 'D/M/Y',
      maxDate: new Date(),
      minDate: minima_fecha,
      useCurrent: true,
      defaultDate: new Date(),
    });


    $("#trabajos_desde").on("change.datetimepicker", function(e) {
      $('#trabajos_hasta').datetimepicker('minDate', e.date);
    });

    let obj_dataTable = {
      "ajax": "<?php echo site_url("/admin/trabajos/api") ?>",
      "responsive": true,
      "autoWidth": false,
      // "processing": true,
      // "serverSide": true,
      "dom": "Bfrtip",
      "language": {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      "buttons": ["csv", "excel"],
    };

    $("#example1")
      .on("init.dt", function() {

        const button_delete_trabajo = document.querySelectorAll(".delete_trabajo");

        for (let i = 0; i < button_delete_trabajo.length; i++) {
          const boton = button_delete_trabajo[i];
          boton.addEventListener("click", e => {
            deleteElement(
              e,
              site_url + "admin/trabajos/delete/trabajos",
              "trabajo",
              "insert_trabajos"
            );
          });
        }



      })
      .DataTable(obj_dataTable)



    /* .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        }); */

    $("#table_paginas").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    })
  });


  $(function() {
    const reglas = {
      nombre: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      url_trabajo: {
        required: true,
        url: true
      },
      descripcion: {
        required: true,
      }
    }

    $('#form_trabajos').validate({
      rules: reglas,
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

    const reglas_pg_nueva = {
      nombre: {
        required: true
      },
      url_nueva_pagina: {
        required: true,
        url: true
      }
    }

    $('#form_pagina_nueva').validate({
      rules: reglas_pg_nueva,
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
  });

  $url = "http://localhost/samuel-graterol-dev/admin/trabajos_sin_envio/api";
  $params = {
    headers: {
      "content-type": "application/json; charset=UTF-8"
    },
    body: {
      password: "04242805116"
    },
    method: "GET"
  };

  fetch($url, $params)
    .then(resp => {
      return resp.json();
    })
    .then(data => {
      console.log(data);
    })
    .catch(err => {
      console.log(err);
    })
</script>