<script>
  $(function() {

    $('#red_social_form').validate({
      rules: {
        nombre: {
          required: true
        },
        icon_class: {
          required: true
        },
        url: {
          required: true,
          url: true
        },

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





  const delete_red_social = document.querySelectorAll(".delete_red_social");

  for (let i = 0; i < delete_red_social.length; i++) {
    delete_red_social[i].addEventListener("click", e => {
      deleteElement(
          e,
          "<?php echo site_url("admin/sobre_mi/red_social_delete") ?>",
          "red_social",
          "insert_redes"
          );
    });
  }
</script>