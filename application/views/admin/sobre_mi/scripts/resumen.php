

  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote()


    })

    const btn_delete_resumen = document.querySelectorAll(".btn_delete_resumen");
    const btn_avtivate_resumen = document.querySelectorAll(".btn_avtivate_resumen");

    for (let i = 0; i < btn_delete_resumen.length; i++) {
      btn_delete_resumen[i].addEventListener("click", e => {
        deleteElement(
          e,
          "<?php echo site_url("admin/sobre_mi/resumen_delete") ?>",
          "resumen",
          "insert_resumen"
        )
      });
    }


    for (let i = 0; i < btn_avtivate_resumen.length; i++) {
      btn_avtivate_resumen[i].addEventListener("click", e => {
        activate_resumen(
          e,
          "<?php echo site_url("admin/sobre_mi/resumen_activate") ?>",
          btn_avtivate_resumen
        )
      });
    }
  </script>