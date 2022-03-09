<?php

class Proyecto_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->table = "proyectos";
  }

  public function find_all()
  {
    $sql = "SELECT 
              IF(  h.nombre IS NULL , 'Sin Categoria', h.nombre ) as categoria,
              p.*,
              DATE_FORMAT(p.fecha_inicio_proyecto, '%d/%m/%Y') AS inicio_fecha,
              DATE_FORMAT(p.fecha_fin_proyecto, '%d/%m/%Y') AS fecha_fin_proyecto,
              DATE_FORMAT(p.created_at, '%d/%m/%Y') AS created_at 
            FROM proyectos p
            LEFT JOIN habilidades h ON h.id = p.categoria_id
            GROUP BY p.id";

    return $this->db->query($sql)->result();
  }

  public function find_one($url_clean)
  {
    $sql = "SELECT 
              IF(  h.nombre IS NULL , 'Sin Categoria', h.nombre )  as categoria,
              p.*, DATE_FORMAT(p.fecha_inicio_proyecto, '%d/%m/%Y') AS inicio_fecha 
            FROM proyectos p
            LEFT JOIN habilidades h ON h.id = p.categoria_id
            WHERE  url_clean = '$url_clean'
            GROUP BY p.id";


    return $this->db->query($sql)->row();
  }

  public function find_categoria($id)
  {
    $sql = "SELECT h.nombre as categoria, p.* FROM proyectos p
            INNER JOIN habilidades h ON h.id = p.categoria_id
            WHERE h.id = $id
            GROUP BY p.id";

    return $this->db->query($sql)->result();
  }

  public function categorias_con_proyectos()
  {
    $sql = "SELECT h.id, h.nombre, COUNT(h.id) AS cantidad
            FROM habilidades h
            INNER JOIN proyectos p ON p.categoria_id = h.id
            GROUP BY h.id";
    return $this->db->query($sql)->result();
  }

  public function find($id)
  {
    $sql = "SELECT 
              if( h.nombre IS NULL , 'Sin Categoria', h.nombre ) as categoria,
              p.*,
              DATE_FORMAT(p.fecha_inicio_proyecto, '%d/%m/%Y') AS fecha_inicio_proyecto,
              DATE_FORMAT(p.fecha_fin_proyecto, '%d/%m/%Y') AS fecha_fin_proyecto,
              DATE_FORMAT(p.created_at, '%d/%m/%Y') AS created_at
             FROM proyectos p
            LEFT JOIN habilidades h ON h.id = p.categoria_id
            WHERE p.id = $id
            GROUP BY p.id";

    return $this->db->query($sql)->row();
  }
}
