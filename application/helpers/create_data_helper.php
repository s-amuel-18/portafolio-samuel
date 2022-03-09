<?php
function create_proyectos($count = 10, $categories, $insert)
{

  for ($i=0; $i < $count; $i++) { 
    foreach ($categories as $value) {
      $data_insert["user_id"] = 1;
      $data_insert["categoria_id"] = $value->id;
      $data_insert["nombre"] = "lorem ". ($i + $value->id * 37);
      $data_insert["link_proyecto"] = "https://www.youtube.com";
      $data_insert["poster_img"] = "uploads/proyectos/sistema-dorado-700_thumb.jpg";
      $data_insert["url_clean"] = url_title($data_insert["nombre"], "-", true);
      $data_insert["pequeña_descripcion"] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste repudiandae voluptatem tenetur veritatis reiciendis, numquam eveniet deleniti rem odit accusantium.";
      $data_insert["descripcion"] = '<div style="background-color: rgb(52, 58, 64);">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste repudiandae voluptatem tenetur veritatis reiciendis, numquam eveniet deleniti rem odit accusantium.</div><div style="background-color: rgb(52, 58, 64);"><br></div><div style="background-color: rgb(52, 58, 64);">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor recusandae quidem, officia perferendis, alias et impedit debitis qui reiciendis accusantium obcaecati unde voluptates eum provident nulla quibusdam deleniti, accusamus numquam. Quo suscipit pariatur repellendus id!</div><div style="background-color: rgb(52, 58, 64);"><br></div><div style="background-color: rgb(52, 58, 64);">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati saepe sit perspiciatis, porro molestiae unde at sint quis accusamus minus nihil a facere quod deleniti tenetur fugiat nisi inventore et reprehenderit animi modi. Nisi exercitationem asperiores consequuntur quod nesciunt, praesentium tempora molestiae. Est quis optio quas dolorem ipsum delectus?</div>';
      $data_insert["fecha_inicio_proyecto"] = date(time());
      $data_insert["fecha_fin_proyecto"] = date(time());
  
      $insert->insert("proyectos", $data_insert);
    }
  }
}
