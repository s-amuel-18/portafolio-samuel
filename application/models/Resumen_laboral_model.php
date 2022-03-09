<?php

class Resumen_laboral_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->table = "resumenes_laborales";
  }



  public function resumenes($limit = null)
  {
    if (!$limit) {
      $sql = "SELECT 
                  IF( h.nombre = NULL, '', h.nombre ) AS categoria,
                  r.id,
                  r.nombre,
                  r.descripcion, 
                  CONCAT(
                  DATE_FORMAT(r.fecha_inicio, '%Y'),
                    '-',
                    DATE_FORMAT(r.fecha_fin, '%Y')
                   ) AS duracion
            FROM {$this->table} r
            LEFT JOIN habilidades h ON h.id = r.categoria_id
            GROUP BY r.id";
    } else {
      $sql = "SELECT 
            IF( h.nombre = NULL, '', h.nombre ) AS categoria,
            r.id,
            r.nombre,
            r.descripcion, 
            CONCAT(
            DATE_FORMAT(r.fecha_inicio, '%Y'),
            '-',
            DATE_FORMAT(r.fecha_fin, '%Y')
            ) AS duracion
      FROM {$this->table} r
      LEFT JOIN habilidades h ON h.id = r.categoria_id
      GROUP BY r.id 
      ORDER BY r.created_at DESC
      LIMIT {$limit}";
    }

    return $this->db->query($sql)->result();
  }
}
