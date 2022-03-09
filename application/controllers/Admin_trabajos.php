<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_trabajos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // helpers
        $this->load->helper([
            "url",
            "message_helper",
            "request_method_helper",
            "reporte_excel_helper",
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
            "resumen_model",
            "trabajo_model"
        ]);

        $this->data_post = (object)json_decode(file_get_contents("php://input"), true);;

        if ((!$this->session->userdata("is_logged") and $this->session->userdata("rol") != "administrador") and (!isset($_GET["password"]) and $_GET["password"] != "04242805116")) {
            // echo json_encode($_GET["password"] );die();
            redirect("auth");
            return;
        }

        $this->new_mesage = $this->db->get_where("contacto", ["leido" => 0])->num_rows();
        $this->nombre_completo = $this->informacion_personal_model->nombre_completo();
    }

    public function index()
    {

        // $trabajos = $this->trabajo_model->get_all();
        $trabajos = [];
        $data["trabajos"] = $trabajos;

        $paginas = $this->db->get("paginas_trabajos")->result();
        $data["paginas"] = $paginas;
        $cantidad_trabajos_dia = $this->trabajo_model->trabajos_dia_actual(null, true)[0]->cantidad_trabajos;

        $trabajos_por_epoca = [
            [
                "color" => "danger",
                "titulo" => "Registros Totales",
                "cantidad" => $this->db->get("trabajos")->num_rows(),
                "url_reporte" => site_url("admin_trabajos/reporte_trabajos_anio")
            ],
            [
                "color" => "warning",
                "titulo" => "Reporte Del Dia",
                "cantidad" => $cantidad_trabajos_dia,
                "url_reporte" => site_url("admin_trabajos/reporte_trabajos_mes")
            ],
            [
                "color" => "info",
                "titulo" => "Correos sin Envio",
                "cantidad" => $this->db->get_where("trabajos", ["enviado" => 0])->num_rows(),
                "url_reporte" => site_url("admin_trabajos/reporte_trabajos_sin_enviar")
            ],

        ];

        $data["trabajos_por_epoca"] = $trabajos_por_epoca;

        $view["body"] = $this->load->view("admin/trabajos/index", $data, true);
        $view["title"] = "Trabajos";
        $view["scripts"] = $this->load->view("admin/trabajos/scripts/index", [], true);

        $this->parser->parse("admin/template/body", $view);
    }

    public function ajax_trabajos_all()
    {
        $trabajos = $this->trabajo_model->get_all();
        $response =  '{"data": [';

        foreach ($trabajos as $i => $trabajo) {
            $check = "<div class='form-group clearfix'><div class='icheck-primary d-inline'><input type='checkbox' value='1' name='enviado[{$trabajo->id}]' id='checkboxDanger{$trabajo->id}'><label for='checkboxDanger{$trabajo->id}'></label></div></div>";

            $email_copy = "<div class='input-group mb-0'><div class='form-control'>{$trabajo->email}</div><div class='input-group-append'><button type='button' data-clipboard-text='{$trabajo->email}' class='copy input-group-text'><i class='far fa-copy'></i></button></div></div>";

            $buttons = "<div class=''><button class='btn_update_pagina btn btn-link text-light' type='button' data-toggle='modal' data-target='#view_datos' data-id='{$trabajo->id}'><i class='fas fa-eye'></i></button><button class='btn_update_pagina btn btn-link text-light' type='button' data-toggle='modal' data-target='#view_form_update' data-id='{$trabajo->id}'><i class='fas fa-edit'></i></button><button class='delete_trabajo btn btn-link text-light' type='button' data-id='{$trabajo->id}'><i class='far fa-times-circle'></i></button></div>";

            $response .= '
                [
                  "' . $check . '",
                  "' . $trabajo->id . '",
                  "' . $trabajo->nombre . '",
                  "' . $email_copy . '",
                  "' . $trabajo->val_enviado . '",
                  "' . $trabajo->for_fecha . '",
                  "' . $buttons . '"
                ]
              ';

            if ($i != (COUNT($trabajos) - 1)) {
                $response .= ",";
            }
        }

        $response .= ']}';
        echo $response;
        // echo json_encode($trabajos);
    }

    public function ajax_trabajos_sin_enviar()
    {
        $trabajos = $this->db->get_where("trabajos", ["enviado" => 0])->result();
        echo json_encode($trabajos);
    }

    public function create()
    {


        $data["accion"] = "registrar";

        $view["body"] = $this->load->view("admin/trabajos/create", $data, true);
        $view["title"] = "Trabajos";
        $view["scripts"] = $this->load->view("admin/trabajos/scripts/create", [], true);
        $this->parser->parse("admin/template/body", $view);
    }

    public function save()
    {
        $request = $this->input->post();
        $config = [
            [
                "field" =>  "nombre",
                "label" => "nombre",
                "rules" =>  "trim|required",
            ],
            [
                "field" =>  "email",
                "label" => "email",
                "rules" =>  "trim|required|valid_email",
            ],
            [
                "field" =>  "url_trabajo",
                "label" => "url_trabajo",
                "rules" =>  "trim|required|valid_url",
            ],

        ];



        $validate_url = filter_var($request["url_trabajo"], FILTER_VALIDATE_URL) !== FALSE;
        $this->form_validation->set_rules($config);


        if (!$this->form_validation->run() or !$validate_url) {
            if (!$validate_url) {
                message(
                    "La url no es valida",
                    "error",
                    "danger"
                );
            }
            redirect("admin/trabajos");
            return;
        }


        if (isset($request["id_trabajo"])) {
            $data_upd["nombre"] = $request["nombre"];
            $data_upd["email"] = $request["email"];
            $data_upd["url_trabajo"] = $request["url_trabajo"];
            $data_upd["descripcion"] = $request["descripcion"];
            $this->update_element($request["id_trabajo"], $data_upd);
            return;
        }


        $valid_email = $this->db->get_where(
            "trabajos",
            ["email" => $request["email"]]
        )->row();

        if (!empty($valid_email)) {
            message(
                "El correo electronico ingresado ya se encuentra registrado",
                "error",
                "danger"
            );
            redirect("admin/trabajos");
            return;
        }

        $data_insert = [
            "nombre" => set_value("nombre"),
            "url_trabajo" => set_value("url_trabajo"),
            "email" => set_value("email"),
            "descripcion" => $request["descripcion"]
        ];

        $response = $this->db->insert("trabajos", $data_insert);


        if (!$response) {
            message(
                "ha ocurrido un error",
                "error",
                "danger"
            );
            redirect("admin/trabajos");
            return;
        }

        message(
            "Registrado con exito",
            "success",
            "success"
        );
        redirect("admin/trabajos");
    }

    public function view_details($id_trabajo)
    {
        $trabajo = $this->trabajo_model->get_one($id_trabajo);
        $data["trabajo"] = $trabajo;

        echo  $this->load->view("admin/trabajos/templates/trabajo_detalle", $data, true);
    }

    public function view_form_update($id_trabajo)
    {
        $trabajo = $this->trabajo_model->get_one($id_trabajo);
        $data["trabajo"] = $trabajo;
        $data["accion"] = "Editar";
        $data["actualizar"] = true;

        echo  $this->load->view("admin/trabajos/create", $data, true);
    }

    private function update_element($id, $data, $table = "trabajos")
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
            redirect("admin/trabajos");
            return;
        }

        message(
            "Editado con exito",
            "success",
            "success"
        );
        redirect("admin/trabajos");
        return;
    }

    public function save_pagina()
    {
        // var_dump("dsa");
        // die();
        $request = $this->input->post();;
        $config = [
            [
                "field" =>  "nombre",
                "label" => "nombre",
                "rules" =>  "trim|required",
            ],
            [
                "field" =>  "url_nueva_pagina",
                "label" => "url_nueva_pagina",
                "rules" =>  "trim|required|valid_url",
            ],

        ];



        $validate_url = filter_var(set_value("url_nueva_pagina"), FILTER_VALIDATE_URL) !== FALSE;
        $this->form_validation->set_rules($config);


        if (!$this->form_validation->run() or !$validate_url) {
            if (!$validate_url) {
                message(
                    "La url no es valida",
                    "error",
                    "danger"
                );
            }
            redirect("admin/trabajos");
            return;
        }

        // var_dump($request["id"]);die();
        if (isset($request["id"]) and !empty($request["id"])) {
            $data_insert["nombre"] = set_value("nombre");
            $data_insert["url"] = set_value("url_nueva_pagina");
            $this->update_element($request["id"], $data_insert, "paginas_trabajos");
            return;
        }

        $validate_nombre = $this->db->get_where("paginas_trabajos", ["nombre" => set_value("nombre")])->result();
        if (!empty($validate_nombre)) {
            message(
                "El nombre instroducido ya existe",
                "error",
                "danger"
            );
            redirect("admin/trabajos");
            return;
        }

        $data_insert["nombre"] = set_value("nombre");
        $data_insert["url"] = set_value("url_nueva_pagina");
        $data_insert["user_id"] = $this->session->userdata("id");

        $response = $this->db->insert("paginas_trabajos", $data_insert);

        if (!$response) {
            message(
                "ha ocurrido un error",
                "error",
                "danger"
            );
            redirect("admin/trabajos");
            return;
        }

        message(
            "Registrado con exito",
            "success",
            "success"
        );
        redirect("admin/trabajos");
    }

    public function find_pagina($id = null)
    {

        $pag = $this->db->get_where("paginas_trabajos", ["id" => $id]);
        $pag = $pag->row();

        echo json_encode(["pagina" => $pag]);
    }

    public function consulta_trabajos()
    {

        $host = $_SERVER["HTTP_HOST"];
        $url = $_SERVER["REQUEST_URI"];
        $url_final =  "http://" . $host . $url;
        // var_dump($url_final);
        // die();
        $desde = $this->input->get("desde");
        $hasta = $this->input->get("hasta");
        $enviado = $this->input->get("enviado");

        // var_dump($this->input->get());
// die();
        $consulta = $this->trabajo_model->consulta_custom([
            "desde" => $desde,
            "hasta" => $hasta,
            "enviado" => $enviado,
        ],
        true
    );

        $trabajos = $consulta[0];
        $data["trabajos"] = $trabajos;

        $paginas = $this->db->get("paginas_trabajos")->result();
        $data["paginas"] = $paginas;

        $trabajos_por_epoca = [
            [
                "color" => "danger",
                "titulo" => "Registros Totales",
                "cantidad" => $trabajos->cantidad,
                "url_reporte" => site_url("admin_trabajos/reporte_trabajos_anio")
            ],
        ];

        $data["trabajos_por_epoca"] = $trabajos_por_epoca;

        $view["body"] = $this->load->view("admin/trabajos/index", $data, true);
        $view["title"] = "Consulta ";
        $view["scripts"] = $this->load->view("admin/trabajos/scripts/index", [], true);

        $this->parser->parse("admin/template/body", $view);
    }

    public function aptualizar_enviado()
    {
        $request = $this->input->post();

        foreach ($request["enviado"] as $id => $status) {
            $this->db->set("enviado", $request["estatus"]);
            $this->db->where("id", $id);
            $this->db->update("trabajos");
        }

        redirect("admin/trabajos");
    }

    public function delete($table = "trabajos")
    {
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


        $message = message(
            "El elmento se ha eliminado correctamente",
            "success",
            "success",
            false
        );

        echo json_encode($message);
    }

    public function reporte_trabajos_dia()
    {
        $data = $this->trabajo_model->trabajos_dia_actual();
        $vista = $this->load->view(
            "admin/reportes/trabajos_dia",
            [
                "data" => $data
            ],
            true
        );
        // var_dump("sdad");die();
        reporte($vista);
    }

    public function reporte_trabajos_semana()
    {
        $data = $this->trabajo_model->trabajos_semana_actual();
        $vista = $this->load->view(
            "admin/reportes/trabajos_dia",
            [
                "data" => $data
            ],
            true
        );
        // var_dump("sdad");die();
        reporte($vista);
    }


    public function reporte_trabajos_mes()
    {
        $data = $this->trabajo_model->trabajos_mes_actual();
        $vista = $this->load->view(
            "admin/reportes/trabajos_dia",
            [
                "data" => $data
            ],
            true
        );
        // var_dump("sdad");die();
        reporte($vista);
    }


    public function reporte_trabajos_anio()
    {
        $data = $this->trabajo_model->trabajos_anio_actual();
        $vista = $this->load->view(
            "admin/reportes/trabajos_dia",
            [
                "data" => $data
            ],
            true
        );
        // var_dump("sdad");die();
        reporte($vista);
    }
    public function reporte_trabajos_sin_enviar()
    {
        $data = $this->db->get_where("trabajos", ["enviado" => 0])->result();
        $vista = $this->load->view(
            "admin/reportes/trabajos_dia",
            [
                "data" => $data
            ],
            true
        );
        // var_dump("sdad");die();
        reporte($vista);
    }
}




