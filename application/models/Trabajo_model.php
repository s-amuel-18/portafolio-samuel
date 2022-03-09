<?php

use FFI\CData;

class Trabajo_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->table = "trabajos";
  }

  public function get_all()
  {
    $sql = "SELECT 
                *,
                IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
                DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha
            FROM {$this->table} 
            ORDER BY created_at DESC";

    return $this->db->query($sql)->result();
  }

  public function sql_inject($sql_inject)
  {
    $sql = $sql_inject;
// var_dump($sql);die();
    return $this->db->query($sql);
  }

  public function get_one($id_trabajo)
  {
    $sql = "SELECT 
              *,
              IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
              DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha
          FROM {$this->table} 
          where id = $id_trabajo
          ORDER BY created_at DESC";

    return $this->db->query($sql)->row();
  }

  public function trabajos_semana_actual($limit = null)
  {    
    $limit = ($limit AND is_numeric($limit)) ? "LIMIT $limit" : ""; 

    $sql = "SELECT 
              *,
              IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
              DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha
          FROM {$this->table} 
          WHERE WEEKOFYEAR(created_at )=WEEKOFYEAR(NOW())  AND YEAR(cast(created_at as date)) = YEAR(NOW()) 
          ORDER BY created_at DESC
          {$limit}";

    return $this->db->query($sql)->result();

    ;
  }

  public function trabajos_mes_actual()
  {    
    $sql = "SELECT 
              *,
              IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
              DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha
          FROM {$this->table} 
          WHERE YEAR(cast(created_at as date)) = YEAR(NOW()) AND MONTH(cast(created_at as date))=MONTH(NOW()) 
          ORDER BY created_at DESC";

    return $this->db->query($sql)->result();
  }

  public function trabajos_anio_actual()
  {    
    $sql = "SELECT 
              *,
              IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
              DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha
          FROM {$this->table} 
          WHERE YEAR(cast(created_at as date)) = YEAR(NOW()) 
          ORDER BY created_at DESC";

    return $this->db->query($sql)->result();
  }

  public function trabajos_dia_actual($limit = null, $count = null)
  {    
    $limit = ($limit AND is_numeric($limit)) ? "LIMIT $limit" : ""; 
    $select = !$count 
                ? "*,
                IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
                DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha" 
                : "COUNT(*) AS cantidad_trabajos";
    
    $sql = "SELECT {$select}
              
          FROM {$this->table} 
          WHERE YEAR(cast(created_at as date)) = YEAR(NOW()) AND MONTH(cast(created_at as date))=MONTH(NOW()) AND DAY(cast(created_at as date)) = DAY(now())  
          ORDER BY created_at DESC
          {$limit}";
      // var_dump($sql);die();
    return $this->db->query($sql)->result();
  }

  public function consulta_custom($arr_data, $count = false)
  {
    
    // var_dump(empty($arr_data["enviado"]));die();
    if( $condicional = (!empty($arr_data["hasta"]) OR !empty($arr_data["desde"]) OR !empty($arr_data["enviado"])) ? "WHERE " : "") {
      // $condicional = ;
      
      $condicional .= $arr_data["enviado"] ? "enviado = 0 AND " : "";
      // echo $condicional;die();
      
      $desde = !empty($arr_data["desde"]) ? "STR_TO_DATE(REPLACE('{$arr_data["desde"]}','/','.') ,GET_FORMAT(date,'EUR'))" : null;
      $hasta = !empty($arr_data["hasta"]) ? "STR_TO_DATE(REPLACE('{$arr_data["hasta"]}','/','.') ,GET_FORMAT(date,'EUR'))" : null;
      
      if( $desde AND $hasta ) {
        $condicional .= "DATE(created_at) >= {$desde} AND DATE(created_at) <= {$hasta}";
      } else if( $desde AND !$hasta ) {
        $condicional .= "DATE(created_at) >= {$desde}";
      } else if( !$desde AND $hasta ) {
        $condicional .= "DATE(created_at) <= {$hasta}";
      } else {
        $condicional .= "created_at";
      }
    }


    $select = "SELECT 
    *,
    IF( enviado = 0, 'Sin Enviar', 'Enviado' ) AS val_enviado,
    DATE_FORMAT(created_at, '%d/%m/%Y') AS for_fecha";

    $count_select = "SELECT COUNT(*) AS cantidad";


    $select_sql = $count ? $count_select : $select;    
    
    $sql = "{$select_sql}
     FROM {$this->table} {$condicional}
     ORDER BY created_at DESC";

     
     $response = $this->db->query($sql);
      // var_dump($response->result());die();

    return $response->result();
    
  }
}


