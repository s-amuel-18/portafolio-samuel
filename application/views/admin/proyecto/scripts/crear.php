<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function() {
    bsCustomFileInput.init();

    // Summernote
    $('#descripcion').summernote()

    //Date picker
    $('#fecha_inicio_proyecto').datetimepicker({
      format: 'Y-M-D'
    });
    $('#fecha_fin_proyecto').datetimepicker({
      format: 'Y-M-D'
    });


    // VALIDACION
    $('#proyecto_form').validate({
      rules: {
        nombre: {
          required: true,
          maxlength: 30
        },
        link_proyecto: {
          required: true,
          url: true
        },
        fecha_inicio_proyecto: {
          required: true,
          date: true
        },
        fecha_fin_proyecto: {
          required: true,
          date: true
        },
        <?php if( !isset($proyecto) ):?>
          poster_img: {
            required: true,
          },
        <?php endif?>
        pequeña_descripcion: {
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


  const avatarInput = document.querySelector('#avatarInput');
  const avatarName = document.querySelector('.input_file__button');
  const imagePreview = document.querySelector('#innsert_img');
  const button_select_img = document.querySelector('#button_select_img');
  // alert("sdsa");
  avatarInput.addEventListener('change', e => {
    let input = e.currentTarget;
    let fileName = input.files[0].name;
    const file =input.files[0]; 

    if( !file.type.includes("image/") ) {
      input.value = "";
      imagePreview.setAttribute('src', "https://i.ibb.co/0Jmshvb/no-image.png");
      return;
    } 
    console.log(input.files[0]);
    // button_select_img.innerText = `File: ${fileName}`;

    const fileReader = new FileReader();
    fileReader.addEventListener('load', e => {
      let imageData = e.target.result;
      imagePreview.setAttribute('src', imageData);
    })

    fileReader.readAsDataURL(input.files[0]);
  });

  // insertar caracteres
  const pequeña_descripcion = document.getElementById("pequeña_descripcion");
  const nombre = document.getElementById("nombre");
  const descripcion = document.getElementById("descripcion");
  const proyecto_form = document.getElementById("proyecto_form");

  pequeña_descripcion.addEventListener("keyup", e => {
    insertar_caraceteres("insert_caracters", e.target.value.length);
  })

  nombre.addEventListener("keyup", e => {
    insertar_caraceteres("insert_length_nombre", e.target.value.length);
  })

  proyecto_form.addEventListener("submit", e => {
    const insert_error_message_descrip = document.getElementById("insert_error_message_descrip");
    if (descripcion.value.length < 1) {
      e.preventDefault();
      insert_error_message_descrip.textContent = "This field is required."
    }
  })
</script>

