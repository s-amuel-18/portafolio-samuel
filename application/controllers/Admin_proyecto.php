<?php



// require_once("./Admin_sobre_mi.php")

class Admin_proyecto extends CI_Controller
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


    $proyectos = $this->proyecto_model->find_all();
    $categorias = $this->proyecto_model->categorias_con_proyectos();
    $cantidad_proyectos = $this->db->get("proyectos")->num_rows();

    $data["cantidad_proyectos"] = $cantidad_proyectos;
    $data["proyectos"] = $proyectos;
    $data["categorias"] = $categorias;
    $view["body"] = $this->load->view("admin/proyecto/index", $data, true);
    $view["title"] = "Proyectos";
    $view["scripts"] = $this->load->view("admin/proyecto/scripts/index", [], true);
    $this->parser->parse("admin/template/body", $view);
  }


  public function filter_x_categoria($id)
  {
    // var_dump($id);die();

    $proyectos = $this->proyecto_model->find_categoria($id);
    $categorias = $this->proyecto_model->categorias_con_proyectos();
    $cantidad_proyectos = $this->db->get("proyectos")->num_rows();

    $categoria = $this->db->select(["nombre"])->get_where("habilidades", ["id" => $id])->row("nombre");
    $data["cantidad_proyectos"] = $cantidad_proyectos;
    $data["proyectos"] = $proyectos;
    $data["categorias"] = $categorias;
    $view["body"] = $this->load->view("admin/proyecto/index", $data, true);
    $view["title"] = "Proyectos de " . $categoria;
    $view["scripts"] = $this->load->view("admin/proyecto/scripts/index", [], true);
    $this->parser->parse("admin/template/body", $view);
  }


  public function crear()
  {

    $categorias = $this->db->get("habilidades")->result();
    $data["categorias"] = $categorias;
    $data["subtitle"] = "Registrar Proyecto";
    $view["body"] = $this->load->view("admin/proyecto/crear", $data, true);
    $view["title"] = "Nuevo Proyecto";

    $view["scripts"] = $this->load->view("admin/proyecto/scripts/crear", [], true);
    $this->parser->parse("admin/template/body", $view);
  }


  public function proyecto_create()
  {
    // var_dump("dsa");die();
    $rm = $this->input->server("REQUEST_METHOD");

    request_method("POST", $rm);

    $request = $this->input->post();
    $nombre = trim($request["nombre"]);

    $existe_nombre = $this->db->get_where("proyectos", ["nombre" => $nombre])->num_rows();

    $data_insert["user_id"] = $this->session->userdata("id");
    $data_insert["categoria_id"] = $request["categoria_id"] ? $request["categoria_id"] : null;
    $data_insert["nombre"] = $nombre;
    $data_insert["link_proyecto"] = trim($request["link_proyecto"]);

    // var_dump($_FILES["poster_img"]["size"]);

    if ($_FILES["poster_img"]["size"] > 0) {
      $name_img_poster = $nombre . uniqid();
      $data_insert["poster_img"] = $this->upload($name_img_poster, 700, "poster_img");
    }

    $data_insert["url_clean"] = url_title($request["nombre"], "-", true);
    $data_insert["pequeña_descripcion"] = trim($request["pequeña_descripcion"]);
    $data_insert["descripcion"] = $request["descripcion"];
    $data_insert["fecha_inicio_proyecto"] = $request["fecha_inicio_proyecto"];
    $data_insert["fecha_fin_proyecto"] = $request["fecha_fin_proyecto"];

    // var_dump($request["id_update"]);die();

    if ($request["id_update"] !=  0) {
      $this->update_save($data_insert, $request["id_update"]);
      return;
    }

    if ($existe_nombre > 0) {
      message(
        "Ya se encuentra registrado un proyecto con el nombre $nombre",
        "error",
        "danger"
      );
      redirect("admin/proyecto/crear");
      return;
    }




    $respose = $this->db->insert("proyectos", $data_insert);

    if (!$respose) {
      message(
        "Ha ocurrido un error al ingrezar la Habilidad {$request["habilidad"]} por favor intentalo mas tarde",
        "error",
        "danger"
      );
      redirect("admin/proyecto/crear");
      return;
    }

    $id_proyecto = $this->db->insert_id();

    message(
      "Se ha Generado correctamente el Proyecto {$request["nombre"]}",
      "success",
      "success"
    );

    redirect("admin/proyecto/ver/$id_proyecto");
  }


  public function view($id = "")
  {
    // echo "sad"
    $exist_proyect = $this->proyecto_model->find($id);
    // var_dump($exist_proyect);die();
    if (empty($exist_proyect)) {
      show_404();
      return;
    }
    // var_dump($exist_proyect);die();
    $data["proyecto"] = $exist_proyect;

    $view["body"] = $this->load->view("admin/proyecto/proyecto", $data, true);
    $view["title"] = $exist_proyect->nombre;
    // $view["scripts"] = $this->load->view("admin/proyecto/scripts/crear", [], true);
    $this->parser->parse("admin/template/body", $view);
  }


  public function update($id_proyecto)
  {
    $exist_proyect = $this->db->get_where("proyectos", ["id" => $id_proyecto])->row();

    if (empty($exist_proyect)) {
      show_404();
      return;
    }

    $categorias = $this->db->get("habilidades")->result();
    $data["categorias"] = $categorias;
    $data["proyecto"] = $exist_proyect;
    $data["subtitle"] = "Editar Proyecto";

    $view["body"] = $this->load->view("admin/proyecto/crear", $data, true);
    $view["title"] = "Editar " . $exist_proyect->nombre;
    $view["scripts"] = $this->load->view("admin/proyecto/scripts/crear", [], true);
    $this->parser->parse("admin/template/body", $view);
  }

  private function update_save($data, $id_proyecto)
  {
    $exist_proyect = $this->db->get_where("proyectos", ["id" => $id_proyecto])->row();

    if (empty($exist_proyect)) {
      show_404();
      return;
    }
    $nombre = $data["nombre"];
    $existe_nombre = $this->db->get_where("proyectos", ["nombre" => $nombre])->row();

    // validar que en caso de que el nombre ingresado sea igual a un nombre de otro proyecto suelte un error
    if ($existe_nombre) {
      // si pasa la condicional es igual a un proyecto, ahora validamos que el proyecto sea el mismo que estamos editando, de lo contrario soltara un error
      $nombre_valido = $existe_nombre->id === $id_proyecto;
      if (!$nombre_valido and !empty($existe_nombre)) {
        message(
          "Ya se encuentra registrado un proyecto con el nombre $nombre",
          "error",
          "danger"
        );
        redirect("admin/proyecto/update/" . $id_proyecto);
        return;
      }
    }


    foreach ($data as $k => $item) {
      $this->db->set($k, $item);
    }
    $this->db->where('id', $id_proyecto);
    $response = $this->db->update('proyectos');


    if (!$response) {
      message(
        "Ha ocurrido un error al ingrezar la Habilidad {$request["habilidad"]} por favor intentalo mas tarde",
        "error",
        "danger"
      );
      redirect("admin/proyecto/update/" . $id_proyecto);
      return;
    }

    message(
      "Se ha Editado correctamente el Proyecto {$data["nombre"]}",
      "success",
      "success"
    );

    redirect("admin/proyecto/ver/$id_proyecto");
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

  public function upload_foto_perfil()
  {
    $file_upload = $this->upload(
      $this->session->userdata("username") . "-" . uniqid(),
      400,
      "photo_url",
      "perfil"
    );

    $messageError = message(
      "ha ocurrido un error al subir el archivo",
      "error",
      "danger",
      false
    );
    if (!$file_upload) {
      // $data["message"] = $messageError;
      echo json_encode($messageError);
      return;
    }

    $this->db->set("selected", 0);
    $this->db->where("selected", 1);
    $this->db->update("foto_perfil");

    $data_insert["user_id"] = $this->session->userdata("id");
    $data_insert["url_foto"] = $file_upload;
    $data_insert["selected"] = 1;

    $response = $this->db->insert(
      "foto_perfil",
      $data_insert
    );

    if (!$response) {
      // $data["message"] = $messageError;
      echo json_encode($messageError);
      return;
    }

    $message = message(
      "El archivo se ha subido correctamente",
      "success",
      "success",
      false
    );
    // $data["message"] = $message;
    echo json_encode($message);
  }

  private function upload($title, $size, $archivo, $carpeta = "proyectos")
  {
    // name del campo que conteine el archivo
    $image = $archivo;

    // configuraciones del archivo
    $config["upload_path"] = "./uploads/$carpeta";
    $config["file_name"] = url_title($title . "-" . $size, "-", true);
    $config["allowed_types"] = "gif|jpg|png|jpeg";
    $config["max_size"] = "5000";
    $config["overwrite"] = true;

    // carga de la libreria
    $this->load->library("upload", $config);

    if (!$this->upload->do_upload($image)) {
      echo "error";
      return false;
    }

    $data = $this->upload->data();

    $this->resize_image($data["full_path"], $size);
    return "uploads/$carpeta/" . $data["orig_name"];
  }


  private function resize_image($path_imgage, $size = 700)
  {
    $config["image_library"] = "gd2";
    $config["source_image"] = $path_imgage;
    $config["maintain_ratio"] = true;
    $config["create_thumb"] = false;
    $config["width"] = $size;
    // $config["height"] = 600;

    $this->load->library("image_lib", $config);
    $this->image_lib->resize();
  }
}
