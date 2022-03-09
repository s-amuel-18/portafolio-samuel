<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // helpers
    $this->load->helper([
      "url",
      "message_helper"
    ]);

    // librerias
    $this->load->library([
      "session",
      "parser",
      "form_validation"
    ]);

    // models
    $this->load->model([
      "Auth_model"
    ]);
  }

  public function index()
  {
    $view["body"] = $this->load->view("auth/index", [], true);
    $this->parser->parse("templates/vista-publica", $view);
  }

  public function login()
  {

    $config = [
      [
        "field" => "username",
        "label" => "nombre de usuario",
        "rules" => "required"
      ],
      [
        "field" => "password",
        "label" => "contraseña",
        "rules" => "required"
      ],
    ];
    $this->form_validation->set_rules($config);

    if (!$this->form_validation->run()) {

      message(
        "el nombre de usuario y contraseña son obligatorios",
        "error",
        "danger"
      );

      redirect("auth");
      return;
    }


    $login = $this->Auth_model->login(set_value("username"), set_value("password"));


    if( !$login ) {
      message(
        "el nombre de usuario o contraseña son incorrectos",
        "error",
        "danger"
      );

      redirect("auth");
      return;
    }

    $data_user = [
      "id" => $login->id,
      "username" => $login->username,
      "is_logged" => true,
      "rol" => $login->rol
    ];

    
    $this->session->set_userdata($data_user);

    if( $data_user["rol"] === "administrador" ) {
      // redirect("/dashboard");
      redirect("admin");
    } else {
      // redirect("/");
    }

  }

  public function logout()
  {
    $sesion_data = [
      "id",
      "username",
      "is_logged",
      "rol",
    ];

    $this->session->unset_userdata($sesion_data);
    $this->session->sess_destroy();
    redirect("/auth");
  }
}
