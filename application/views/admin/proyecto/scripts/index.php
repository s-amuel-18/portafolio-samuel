<script>
  $("#table_proyectos").DataTable({
    "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
  });
  
  const button_delete = document.querySelectorAll(".delete_proyecto");

  for (let i = 0; i < button_delete.length; i++) {
    const boton = button_delete[i];
    boton.addEventListener("click", e => {
      deleteElement(
        e,
        "<?php echo site_url("admin/proyecto/delete") ?>",
        "proyecto",
        "insert_proyectos"
      );
    });
  }
</script>