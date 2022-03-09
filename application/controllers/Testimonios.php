<?php

class Testimonios extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // helpers
    $this->load->helper([
      "url"
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
    ]);

    $this->data_post = (object)json_decode(file_get_contents("php://input"), true);;

    if (!$this->session->userdata("is_logged")) {
      redirect("auth");
      return;
    }
  }

  public function index()
  {
    
  }
}
