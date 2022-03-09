<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_sobre_mi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // helpers
    $this->load->helper([
      "url",
      "message_helper",
      "request_method_helper",
    ]);

    // librerias
    $this->load->library([
      "session",
      "parser",
      "form_validation"
    ]);

    // model
    $this->load->model([
      "informacion_personal_model",
      "habilidad_model",
      "resumen_model"
    ]);

    $this->data_post = (object)json_decode(file_get_contents("php://input"), true);;

    if (!$this->session->userdata("is_logged") and $this->session->userdata("rol") != "administrador") {
      redirect("auth");
      return;
    }

    $this->new_mesage = $this->db->get_where("contacto", ["leido" => 0])->num_rows();
    $this->nombre_completo = $this->informacion_personal_model->nombre_completo(); 

  }

  public function index()
  {
    $view["body"] = $this->load->view("admin/index", [], true);
    $view["title"] = "Dashboard";
    $this->parser->parse("admin/template/body", $view);
  }

  // ============================== habilidad ============================== 
  public function habilidad()
  {
    $data["habilidades"] = $this->db->select(["id", "nombre", "nivel"])->get("habilidades")->result();

    $view["body"] = $this->load->view("admin/sobre_mi/habilidad", $data, true);
    $view["title"] = "Habilidades";
    $view["scripts"] = $this->load->view("admin/sobre_mi/scripts/habilidad", [], true);
    $this->parser->parse("admin/template/body", $view);
  }
  
  public function habilidad_create()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();

    $data_insert["user_id"] = $this->session->userdata("id");
    $data_insert["nombre"] = $request["habilidad"];
    $data_insert["nivel"] = $request["nivel"];

    
    if( $request["id"] > 0  ) {
      $this->update_element($request["id"], $data_insert, "habilidades");
    }
    
    
    $exist_habilidad = $this->db->get_where("habilidades", ["nombre" => $request["habilidad"]]);
    $exist_habilidad = $exist_habilidad->num_rows();
    
    if( $exist_habilidad > 0 ) {
      message(
        "La habilidad {$request["habilidad"]} ya esta registrada",
        "error",
        "danger"
      );
      redirect("admin/sobre_mi/habilidad");
      return;
    }
    


    
    $reponse = $this->habilidad_model->insert($data_insert);
    
    if( !$reponse ) {
      message(
        "Ha ocurrido un error al ingrezar la Habilidad {$request["habilidad"]} por favor intentalo mas tarde",
        "error",
        "danger"
      );
      redirect("admin/sobre_mi/habilidad");
      return;
    }

    message(
      "Se ha Generado correctamente la Habilidad {$request["habilidad"]}",
      "success",
      "success"
    );
    redirect("admin/sobre_mi/habilidad");

  }

  public function habilidad_delete()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->data_post;


    $validate_id = $this->db->get_where("habilidades", ["id" => $request->id])->row();

    if(empty($validate_id )) {
      $message = message(
        "El elemento que deseas eliminar no existe",
        "error",
        "danger",
        false
      );
      echo json_encode($message);
      return;
    }
      $this->update_categoria_id($request->id, "proyectos");
      $this->update_categoria_id($request->id, "resumenes_laborales");
    
    $response = $this->habilidad_model->delete_where($request->id);
    
    if( !$response ) {
      $message = message(
        "Ha ocurrido un error al intentareliminar este elemento",
        "error",
        "danger",
        false
      );

      echo json_encode($message);
      return;
    }

    $message = message(
      "El elmento \"{$validate_id->nombre}\" se ha eliminado correctamente",
      "success",
      "success",
      false
    );

    echo json_encode($message);
  }
  // ============================== end habilidad ============================== 
  
  
  
  // ============================== informacion personal ============================== 
  public function informacion_personal()
  {
    $informacion_personal = $this->db->get_where("informacion_personal", ["user_id" => $this->session->userdata("id")]);
    $informacion_personal = $informacion_personal->row();
    $data["informacion_personal"] = $informacion_personal;


    
    // die();
    
    $view["body"] = $this->load->view("admin/sobre_mi/informacion_personal", $data, true);
    $view["title"] = "Informacion Personal";
    $view["scripts"] = $this->load->view("admin/sobre_mi/scripts/informacion_personal", [], true);
    $this->parser->parse("admin/template/body", $view);
  }

  public function informacion_personal_create()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();

    $user_id = $this->session->userdata("id");
    
    $exist_info = $this->db->get_where("informacion_personal", ["user_id" => $user_id]);
    $exist_info = $exist_info->row();

    $data["user_id"] = $user_id;
    $data["telefono"] = $request["telefono"];
    $data["nombre"] = $request["nombre"];
    $data["apellido"] = $request["apellido"];
    $data["email"] = $request["email"];
    $data["url_web"] = $request["url_web"];
    $data["universitario"] = $request["universitario"];
    $data["profesion"] = $request["profesion"];
    $data["fecha_nacimiento"] = $request["fecha_nacimiento"];
    $data["fecha_inicio_profesion"] = $request["fecha_inicio_profesion"];
    $data["fecha_inicio_experiencia"] = $request["fecha_inicio_experiencia"];
    
    $action = "";

    if( empty($exist_info) ) {
      $db_action = $this->db->insert("informacion_personal", $data);
      $action = "Creado";
    } else {
      $db_action = $this->informacion_personal_model->update_informacion($exist_info->id, $data);
      $action = "Actualizado";
    }

    if( !$db_action ) {
      message(
        "Ha ocurrido un error, intentalo de nuevo",
        "error",
        "danger"
      );

      redirect("admin/sobre_mi/informacion_personal");
    }
    
      message(
        "La informacion se ha {$action} Correctamente",
        "success",
        "success"
      );

      redirect("admin/sobre_mi/informacion_personal");
  }
  // ============================== end informacion personal ============================== 

  
  
  // ============================== redes Sociales ============================== 
  
  public function redes_sociales()
  {
    $data_redes_sociales = $this->db->get("redes_sociales")->result();

    $data["redes_sociales"] = $data_redes_sociales; 
    
    $view["body"] = $this->load->view("admin/sobre_mi/redes_sociales", $data, true);
    $view["title"] = "Redes Sociales";
    $view["scripts"] = $this->load->view("admin/sobre_mi/scripts/red_social", [], true);
    $this->parser->parse("admin/template/body", $view);
  }

  public function red_social_create()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();

    $existe_red_social = $this->db->get_where("redes_sociales", ["nombre" => $request["nombre"]])->num_rows();

    if( $existe_red_social > 0 ) {
      message(
        "La Red Social {$request["nombre"]} Ya se encuentra Registrada",
        "error",
        "danger"
      );
  
      redirect("admin/sobre_mi/redes_sociales");
      return;
    }
    $user_id = $this->session->userdata("id");
    $data_insert["nombre"] = $request["nombre"];
    $data_insert["user_id"] = $user_id;
    $data_insert["icono"] = $request["icono"];
    $data_insert["url"] = $request["url"];
    
    $this->db->insert("redes_sociales", $data_insert);

    message(
      "La Red Social {$request["nombre"]} se ha Creado Correctamente",
      "success",
      "success"
    );

    redirect("admin/sobre_mi/redes_sociales"); 
  }

  public function red_social_delete()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->data_post;

    $validate_id = $this->db->get_where("redes_sociales", ["id" => $request->id])->row();

    if(empty($validate_id )) {
      $message = message(
        "El elemento que deseas eliminar no existe",
        "error",
        "danger",
        false
      );
      echo json_encode($message);
      return;
    }
    
    $response = $this->db->delete("redes_sociales", ["id" => $request->id]);
    
    if( !$response ) {
      $message = message(
        "Ha ocurrido un error al intentareliminar este elemento",
        "error",
        "danger",
        false
      );

      echo json_encode($message);
      return;
    }

    $message = message(
      "El elmento \"{$validate_id->nombre}\" se ha eliminado correctamente",
      "success",
      "success",
      false
    );

    echo json_encode($message);
  }
  
  // ============================== end redes Sociales ============================== 
  
  // ============================== resumen ============================== 
  public function resumen()
  {

    $data["resumenes"] = $this->resumen_model->get();
    
    $view["body"] = $this->load->view("admin/sobre_mi/resumen", $data, true);
    $view["title"] = "Mi Resumen";
    $view["scripts"] = $this->load->view("admin/sobre_mi/scripts/resumen", [], true);
    $this->parser->parse("admin/template/body", $view);
  }

  public function resumen_create()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();

    $user_id = $this->session->userdata("id");
    $data_insert["resumen"] = $request["resumen"];
    $data_insert["user_id"] = $user_id;
  

    $this->db->insert("resumen", $data_insert);
    message(
      "El resumen se ha creado correctamente",
      "success",
      "success"
    );

    redirect("admin/sobre_mi/resumen"); 

  }

  public function resumen_delete()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);
    $this->delete_element("resumen");
  }

  public function resumen_activate()
  {
    $request = $this->data_post;

    $validate_id = $this->db->get_where("resumen", ["id" => $request->id])->row();

    if(empty($validate_id )) {
      $message = message(
        "El elemento que deseas eliminar no existe",
        "error",
        "danger",
        false
      );
      echo json_encode($message);
      return;
    }

    $response = $this->resumen_model->activate_resumen($request->id);

    if( !$response ) {
      $message = message(
        "Ha ocurrido un error al intentareliminar este elemento",
        "error",
        "danger",
        false
      );

      echo json_encode($message);
      return;
    }

    $message = message(
      "El elmento se ha activado correctamente",
      "success",
      "success",
      false
    );

    $data["message"] = $message;
    $data["id"] = $response;

    echo json_encode($data);
  }
 // ============================== end resumen ============================== 
  

  private function delete_element($table) {
    $request = $this->data_post;

    $validate_id = $this->db->get_where($table, ["id" => $request->id])->row();

    if(empty($validate_id )) {
      $message = message(
        "El elemento que deseas eliminar no existe",
        "error",
        "danger",
        false
      );
      echo json_encode($message);
      return;
    }
 


    
    $response = $this->db->delete($table, ["id" => $request->id]);
    
    if( !$response ) {
      $message = message(
        "Ha ocurrido un error al intentareliminar este elemento",
        "error",
        "danger",
        false
      );

      echo json_encode($message);
      return;
    }

    $message = message(
      "El elmento se ha eliminado correctamente",
      "success",
      "success",
      false
    );

    echo json_encode($message);
  }

  private function update_categoria_id($id, $table)
  {
    $this->db->set("categoria_id", null);
    $this->db->where("categoria_id", $id);
    $this->db->update($table);
  }

  public function find_habilidad($id = null)
  {
      $tabla = "habilidades";

      // var_dump($id);die();
      
      $pag = $this->db->get_where($tabla, ["id" => $id]);
      $pag = $pag->row();

      echo json_encode($pag);
  }
  
  private function update_element($id, $data, $table)
  {
      $trabajo = $this->db->get_where($table, ["id" => $id])->row();

      if (empty($trabajo)) {
          show_404();
          return;
      }

      foreach ($data as $key => $value) {
          $this->db->set($key, $value);
      }

      $this->db->where("id", $id);
      $response = $this->db->update($table);

      if (!$response) {
          message(
              "ha ocurrido un error",
              "error",
              "danger"
          );
          redirect("admin/sobre_mi/habilidad");
          return;
      }

      message(
          "Editado con exito",
          "success",
          "success"
      );
      redirect("admin/sobre_mi/habilidad");
      return;
  }
}
