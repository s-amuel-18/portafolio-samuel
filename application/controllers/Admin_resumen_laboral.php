<?php

class Admin_resumen_laboral extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // helpers
    $this->load->helper([
      "url",
      "message_helper",
      "create_data_helper",
      "customizar_data_helper",
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
      "resumen_laboral_model",
      "informacion_personal_model",
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
    $categorias = $this->db->get("habilidades")->result();
    $resumenes = $this->resumen_laboral_model->resumenes();
    // $resumenes = data_resumen($resumenes);
    $data["categorias"] = $categorias;
    $data["resumenes"] = $resumenes;
    
    $view["body"] = $this->load->view("admin/resumen_laboral/index", $data, true);
    $view["title"] = "Resumen Laboral";
    $view["scripts"] = $this->load->view("admin/resumen_laboral/scripts/index", [], true);
    $this->parser->parse("admin/template/body", $view);
  }

  public function crear()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();
    $nombre = trim($request["nombre"]);

    $insert_data["user_id"] = $this->session->userdata("id");
    $insert_data["categoria_id"] = $request["categoria_id"] ? $request["categoria_id"] : null;
    $insert_data["nombre"] = $nombre;
    $insert_data["descripcion"] = $request["descripcion"];
    $insert_data["fecha_inicio"] = $request["fecha_inicio"];
    $insert_data["fecha_fin"] = $request["fecha_fin"];
    
    $response = $this->db->insert("resumenes_laborales", $insert_data);

    if (!$response) {
      message(
        "Ha ocurrido un error al ingrezar la Habilidad {$request["habilidad"]} por favor intentalo mas tarde",
        "error",
        "danger"
      );
      redirect("admin/proyecto/crear");
      return;
    }

    message(
      "Se ha Generado correctamente un resumen laboral",
      "success",
      "success"
    );

    redirect("admin/resumen_laboral");

  }

  public function delete()
  {
    $table = "resumenes_laborales";
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
