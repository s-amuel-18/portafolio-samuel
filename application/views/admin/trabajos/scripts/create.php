<script>
  $(function() {

    $('#form_trabajos').validate({
      rules: {
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
      },
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