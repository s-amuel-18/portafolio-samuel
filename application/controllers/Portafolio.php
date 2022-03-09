<?php

use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');

class Portafolio extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // helpers
    $this->load->helper([
      "url",
      "message_helper",
      "request_method_helper",
      "customizar_data_helper"
    ]);

    // librerias
    $this->load->library([
      "session",
      "parser",
      "pdf",
      "form_validation"
    ]);

    // model
    $this->load->model([
      "informacion_personal_model",
      "habilidad_model",
      "proyecto_model",
      "resumen_laboral_model",
      "resumen_model"
    ]);

    $this->data_post = (object)json_decode(file_get_contents("php://input"), true);
       $this->resumen = $this->db->get_where("resumen", ["activo" => 1])->row("resumen");
    
    $this->redes_sociales = $this->db->get("redes_sociales")->result();;
    $this->telefono = $this->db->get("informacion_personal")->row("telefono");
        $this->nombre_completo = $this->informacion_personal_model->nombre_completo();

  }

  public function index()
  {
    $info_personal = $this->informacion_personal_model->find_one();
    $data["info_personal"] = $info_personal;

    // nombre completo
    $nombre_completo = $this->informacion_personal_model->nombre_completo();
    $data["nombre_completo"] = $nombre_completo;

    // resumen
    $resumen = $this->db->get_where("resumen", ["activo" => 1])->row("resumen");
    $data["resumen"] = $resumen;

    // habilidades
    $habilidades = $this->habilidad_model->get(5);
    $data["habilidades"] = $habilidades;


    // redes sociales
    $redes_sociales = $this->redes_sociales;;
    $data["redes_sociales"] = $redes_sociales;

    // imagen de perfil
    $img_perfil = $this->db->get_where("foto_perfil", ["selected" => 1])->row("url_foto");
    $data["img_perfil"] = $img_perfil;

    // proyectos
    $proyectos = $this->proyecto_model->find_all();
    $data["proyectos"] = $proyectos;

    // categorias por proyecto
    $categorias_con_proyectos = $this->proyecto_model->categorias_con_proyectos();
    $data["categorias_con_proyectos"] = $categorias_con_proyectos;

    // resumenes laborales
    $resumenes_laborales = $this->resumen_laboral_model->resumenes();
    $data["resumenes_laborales"] = $resumenes_laborales;

    $testimonios = [
      [
        "nombre" => "Estevan Geraldo",
        "puesto" => "CEO ILatinMedia",
        "testimonio" => $nombre_completo. " Realizo un excelente trabajo, siempre atento a las recomendaciones que necesitaba y con una muy buena actitud y proactividad, muy recomendable."
      ],
      [
        "nombre" => "Gabriel Castro",
        "puesto" => "CEO Negocia Ecuador",
        "testimonio" => $nombre_completo. " es un empleado muy dedicado en sus tareas asignadas, siempre muy atento con el trabajo que está realizando, lo recomiendo. Ha sido bastante atento con las tareas planeadas."
      ],
      [
        "nombre" => "Armando Graterol",
        "puesto" => "CEO Avimark",
        "testimonio" => $nombre_completo. " Es muy puntual con el trabajo realizado, es 100% recomendable muy profesional y rápido.  Es muy respetuoso y comprometido con su trabajo."
      ],
    ];

    $data["testimonios"] = $testimonios;

    // var_dump($nombre_completo);die();

    $view["body"] = $this->load->view("portafolio/index", $data, true);
    $view["title"] = "Dashboard";
    $this->parser->parse("portafolio/template/body", $view);
  }



  public function proyecto($url_clean = null)
  {
    // proyectos
    $proyecto = $this->proyecto_model->find_one(urldecode($url_clean));

    if( empty($proyecto ) OR !$url_clean ) {
      show_404();return;
    }
    
    $data["proyecto"] = $proyecto;

        // nombre completo
        $nombre_completo = $this->informacion_personal_model->nombre_completo();
        $data["nombre_completo"] = $nombre_completo;
    

    $view["body"] = $this->load->view("portafolio/view", $data, true);
    $view["title"] = "Dashboard";
    $this->parser->parse("portafolio/template/body", $view);

    // var_dump($proyecto);die();


  }

  public function contacto()
  {
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();

    $config = [
      [
        "field" =>  "nombre",
        "label" => "nombre",
        "rules" =>  "required",
      ],
      [
        "field" =>  "email",
        "label" => "email",
        "rules" =>  "required|valid_email"
      ],
      [
        "field" =>  "asunto",
        "label" => "asunto",
        "rules" =>  "required"
      ],
      [
        "field" =>  "descripcion",
        "label" => "descripcion",
        "rules" =>  "required|max_length[700]"
      ],

    ];

    $this->form_validation->set_rules($config);

    if (!$this->form_validation->run()) {
      message(
        "Todos los campos son obligatorios",
        "error",
        "danger"
      );
      redirect("portafolio");

      return;
    }

    $data_insert["nombre"] = set_value("nombre");
    $data_insert["email"] = set_value("email");
    $data_insert["asunto"] = set_value("asunto");
    $data_insert["descripcion"] = set_value("descripcion");

    $response = $this->db->insert("contacto", $data_insert);

    if (!$response) {
      message(
        "Ha ocurrido un error al ingrezar la Habilidad {$request["habilidad"]} por favor intentalo mas tarde",
        "error",
        "danger"
      );
      redirect("portafolio");
      return;
    }

    message(
      "Se ha Envido correctamen el mensaje",
      "success",
      "success"
    );
    redirect("portafolio");
  }

  public function view_curriculum()
  {
    $img_perfil = $this->db->get_where("foto_perfil", ["selected" => 1])->row("url_foto");
    $data["img_perfil"] = $img_perfil;
    
    // informacion personal
    $info_personal = $this->informacion_personal_model->find_one();
    $data["info_personal"] = $info_personal;

    // nombre completo
    $nombre_completo = $this->informacion_personal_model->nombre_completo();
    $data["nombre_completo"] = $nombre_completo;

    // resumen
    $resumen = $this->db->get_where("resumen", ["activo" => 1])->row("resumen");
    $data["resumen"] = $resumen;

    // habilidades
    $habilidades = $this->habilidad_model->get(5);
    $data["habilidades"] = $habilidades;

    
    // resumenes laborales
    $resumenes_laborales = $this->resumen_laboral_model->resumenes(4);
    $data["resumenes_laborales"] = $resumenes_laborales;
    
    $dompdf = new Dompdf();

    $html = $this->load->view("curriculum", $data, true);
    $opt = $dompdf->getOptions();
    $opt->set(["isRemoteEnabled" => true]);
    $dompdf->setOptions($opt);

    $dompdf->loadHtml($html);
    $dompdf->setPaper("letter");
    $dompdf->render();

    $dompdf->stream("{$nombre_completo}.pdf", ["Attachment" => false]);
  }
}
