<?php 

class Contacto_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();   
    $this->load->database();
    $this->table = "contacto"; 
  }

  public function get()
  {
    $sql = "SELECT *, DATE_FORMAT(created_at, '%d/%m/%Y %H:%S') AS fecha_creacion
            FROM contacto
            ORDER BY created_at DESC, leido DESC";

    return $this->db->query($sql)->result();
  }
}