<?php 

function data_resumen($data) {
  foreach ($data as $value) {
    $date1 = date_create($value->fecha_inicio);
    $date1 = date_format($date1, "Y");
    $value->fecha_inicio = $date1;
    
    $date2 = date_create($value->fecha_fin);
    $date2 = date_format($date2, "Y");
    $value->fecha_fin = $date2;
    // var_dump($date1);die();
  }

  // var_dump($data);die();
  return $data;
}

function determinar_url_inicio() {
  return 
    ($_SERVER["REQUEST_URI"] === "/portafolio-2021/" OR
    $_SERVER["REQUEST_URI"] === "/portafolio-2021/portafolio" OR
    $_SERVER["REQUEST_URI"] === "/portafolio-2021/portafolio/" OR
    $_SERVER["REQUEST_URI"] === "/portafolio-2021/portafolio/index" OR
    $_SERVER["REQUEST_URI"] === "/portafolio-2021/portafolio/index/") ? "" : site_url();
}

function omitir_datos_arr($arr, $count)
{
  if(isset($count) AND is_numeric($count) AND isset($arr) AND is_array($arr)) {
    $new_arr = [];
    $loops = 0;
    foreach ($arr as  $el) {
      if( $loops < $count ) {
        array_push($new_arr, $el);
        $loops++;
      }
    }

    return $new_arr;
  }
  return $arr;
}