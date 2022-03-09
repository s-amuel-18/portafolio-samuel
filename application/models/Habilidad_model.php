<?php 

class Habilidad_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();   
    $this->load->database();
    $this->table = "habilidades"; 
  }

  public function get($limit = null)
  {
    $sql = "SELECT * 
            FROM habilidades
            ORDER BY nivel DESC
            LIMIT {$limit}";

    return $this->db->query($sql)->result();
  }

  public function insert($data)
  {
    $sql = "INSERT INTO {$this->table} (user_id, nombre, nivel) VALUES($data[user_id], '$data[nombre]', $data[nivel])";

    return $this->db->query($sql);
  }

  public function delete_where($id)
  {
    $sql = "DELETE FROM {$this->table} WHERE id = {$id}";

    return $this->db->query($sql);
  }
}