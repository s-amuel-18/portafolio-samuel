<?php 

class Informacion_personal_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();   
    $this->load->database();
    $this->table = "informacion_personal"; 
  }

  public function find_one()
  {
    $sql = "SELECT  email, url_web AS sitio_web, universitario, telefono, profesion, DATE_FORMAT(fecha_nacimiento, '%d de %M del %Y') AS nacimiento
            FROM informacion_personal";

    return $this->db->query($sql)->row();
  }

  public function nombre_completo()
  {
    $sql = "SELECT  CONCAT (nombre,' ', apellido) AS nombre_completo
            FROM informacion_personal";

    return $this->db->query($sql)->row("nombre_completo");
  }
  
  public function update_informacion($id, $data)
  {
    $sql = "UPDATE informacion_personal
            SET user_id = $data[user_id],
                telefono = '$data[telefono]',
                nombre = '$data[nombre]',
                apellido = '$data[apellido]',
                email = '$data[email]',
                url_web = '$data[url_web]',
                universitario = '$data[universitario]',
                profesion = '$data[profesion]',
                fecha_nacimiento = '$data[fecha_nacimiento]',
                fecha_inicio_profesion = '$data[fecha_inicio_profesion]',
                fecha_inicio_experiencia = '$data[fecha_inicio_experiencia]'
            WHERE id = $id";

    return $this->db->query($sql);
  }


}