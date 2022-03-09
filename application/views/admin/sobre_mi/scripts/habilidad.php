<script>
  // alert("dsa")
  $(async function() {
    $("#table_habilidad").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }) 
    
    $('#habilidad_form').validate({
      rules: {
        habilidad: {
          required: true
        },
        nivel: {
          required: true
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
</script>



<script>

  const button_delete = document.querySelectorAll(".delete_habilidad");

  for (let i = 0; i < button_delete.length; i++) {
    const boton = button_delete[i];
    boton.addEventListener("click", e => {
      deleteElement(
          e,
          "<?php echo site_url("admin/sobre_mi/habilidad_delete")?>",
          "habilidad",
          "insert_habilidades"
          );
    });
  }

  const insert_habilidades = document.getElementById("insert_habilidades");




  const button_update_habilidad = document.querySelectorAll(".btn_update_habilidad");
const url_get_pagina = site_url + "admin_sobre_mi/find_habilidad/";

for (let i = 0; i < button_update_habilidad.length; i++) {
  const boton = button_update_habilidad[i];
  boton.addEventListener("click", async e => {
    const id = e.currentTarget.dataset.id;
    
    const data_update_await = await axios.get(url_get_pagina + id)
    .then(resp => {
      const data = resp.data;
      return data;
    })
    
    // console.log( );return;


    update_element(
      {
        form_id: "#habilidad_form",
        inputs: {
          id: data_update_await.id,
          habilidad: data_update_await.nombre,
          nivel: data_update_await.nivel
        }
      }
    );
    // $('#collapseTwo').collapse("hide")
    $('#create_habilidad').modal("show")
  });
}
$('#create_habilidad').on('show.bs.modal', function (e) {
  const habilidad_form = document.getElementById("habilidad_form");
  habilidad_form.reset()
})


</script>