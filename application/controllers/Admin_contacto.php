<?php



// require_once("./Admin_sobre_mi.php")

class Admin_contacto extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // helpers
    $this->load->helper([
      "url",
      "message_helper",
      "create_data_helper",
      "request_method_helper",
      "mostrar_img_helper",
    ]);

    // librerias
    $this->load->library([
      "session",
      "parser",
      "form_validation"
    ]);

    // model
    $this->load->model([
      "proyecto_model",
      "informacion_personal_model",
      "contacto_model"
    ]);

    $this->data_post = (object)json_decode(file_get_contents("php://input"), true);;

    if (!$this->session->userdata("is_logged") and $this->session->userdata("rol") != "administrador") {
      redirect("auth");
      return;
    }
    $this->nombre_completo = $this->informacion_personal_model->nombre_completo();
    $this->new_mesage = $this->db->get_where("contacto", ["leido" => 0])->num_rows();
  }


public function index()
{
  $mensajes = $this->contacto_model->get();
  $data["mensajes"] = $mensajes;

  $consulta_id_no_leidos = $this->db->select("id")->get_where("contacto", ["leido" => 0])->result();  
  $new_mensajes_id = [];

  foreach ($consulta_id_no_leidos as $item) {
    $new_mensajes_id[count($new_mensajes_id)] = $item->id;
  }

  
  $_SESSION["new_mensajes_id"] = $new_mensajes_id;
  $this->new_mesage = 0;

      $this->db->set("leido", 1);
      $this->db->where("leido", 0);
      $this->db->update("contacto");

  
  $view["body"] = $this->load->view("admin/contacto/index", $data, true);
  $view["title"] = "Mensajes";
  $this->parser->parse("admin/template/body", $view);
}


  public function delete()
  {
    $table = "proyectos";
    $request = $this->data_post;
    // echo $request->id;die();

    $validate_id = $this->db->get_where($table, ["id" => $request->id])->row();

    if (empty($validate_id)) {
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
    $path1 = $validate_id->poster_img;
    // $path2 = str_replace("_thumb", "", $validate_id->poster_img);
    unlink($path1);
    // unlink($path2);
    if (!$response) {
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
}
