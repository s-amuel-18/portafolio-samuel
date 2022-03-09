<script>
  $(function() {


    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'Y-M-D'
    });
    $('#inicio_de_aprendizaje').datetimepicker({
      format: 'Y-M-D'
    });
    $('#inicio_de_experiencia_lavoral').datetimepicker({
      format: 'Y-M-D'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
      icons: {
        time: 'far fa-clock'
      }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  $(function() {

    $('#informacion_form').validate({
      rules: {
        nombre: {
          required: true
        },
        apellido: {
          required: true
        },
        fecha_nacimiento: {
          required: true,
          date: true
        },
        numero_telefono: {
          required: true,
          minlength: 11,
          maxlength: 20
        },
        email: {
          required: true,
          email: true
        },
        sitio_web: {
          required: true,
          url: true
        },
        universitario: {
          required: true,
        },
        profecion: {
          required: true,
        },
        fecha_inicio_profesion: {
          required: true,
          date: true
        },
        fecha_inicio_experiencia: {
          required: true,
          date: true
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
  });
</script>