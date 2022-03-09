<?php

class Resumen_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->table = "resumen";
  }

  public function get()
  {
    $sql = "SELECT * 
            FROM {$this->table}
            ORDER BY activo DESC, created_at DESC";

    return $this->db->query($sql)->result();
  }

  public function activate_resumen($id)
  {
    $sql = "UPDATE {$this->table}
          SET activo = 0";
    $desactivar = $this->db->query($sql);
    
    $activo = false;
    if($desactivar) {
      $sql = "UPDATE {$this->table}
              SET activo = 1
              WHERE id = {$id}";
      $activo = $this->db->query($sql);
    }

    return $activo;
  }
}
