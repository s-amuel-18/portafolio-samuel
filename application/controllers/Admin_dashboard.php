<?php



// require_once("./Admin_sobre_mi.php")

use function PHPSTORM_META\type;

class Admin_dashboard extends CI_Controller
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
      "customizar_data_helper"
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
      "trabajo_model",
      "contacto_model"
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


    $trabajos_del_dia = $this->trabajo_model->trabajos_dia_actual(5);
    $trabajos_del_dia_cantidad = $this->trabajo_model->trabajos_dia_actual(null, true);
    $data["trabajos_del_dia"]["trabajos"] = $trabajos_del_dia;
    $data["trabajos_del_dia"]["cantidad"] = $trabajos_del_dia_cantidad[0]->cantidad_trabajos;
    
    $count_proyects = $this->db->get("proyectos")->num_rows();
    $data["count_proyects"] = $count_proyects;

    $correos_sin_leer = $this->db->get_where("contacto", ["leido" => 0])->result();
    $data["correos_sin_leer"] = $correos_sin_leer;
    
    $view["body"] = $this->load->view("admin/dashboard/index", $data, true);
    $view["title"] = "Dashboard";
    $this->parser->parse("admin/template/body", $view);
  }
}
