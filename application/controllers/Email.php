<?php



// require_once("./Admin_sobre_mi.php")

class Email extends CI_Controller
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
  }

  public function index()
  {
    // resumen
    $resumen = $this->db->get_where("resumen", ["activo" => 1])->row("resumen");
    $data["resumen"] = $resumen;
    $this->load->view("email/presentacion", $data);
  }








  // public function enviar_email()
  // {
  //   $this->load->library("email");
  //   $config = array(
  //     'protocol' => 'smtp',
  //     'smtp_host' => 'ssl://smtp.gmail.com',
  //     'smtp_port' => 465,
  //     'smtp_user' => 'samuelgraterol12@gmail.com',
  //     'smtp_pass' => 'iktvkotutijzbkix',
  //     'mailtype'  => 'html',
  //     'charset'   => 'iso-8859-1'
  //   );

  //   // $config["mailtype"] = "html";
  //   $this->email->initialize($config);
  //   $this->email->from("samuelgraterol12@gmail.com", "Samuel Graterol");
  //   $this->email->to("samuelgraterol12@gmail.com");

  //   $resumen = $this->db->get_where("resumen", ["activo" => 1])->row("resumen");
  //   $data["resumen"] = $resumen;
  //   $message = $this->load->view("email/presentacion", $data, true);
  //   $this->email->subject('This is an email test');
  //   $this->email->message($message);

  //   if ($this->email->send()) {
  //     echo "se envio correctamente";
  //   } else {
  //     echo $this->email->print_debugger();
  //   }
  // }
  public function enviar_email()
  {

    /*
       * Cuando cargamos una librería
       * es similar a hacer en PHP puro esto:
       * require_once("libreria.php");
       * $lib=new Libreria();
       */

    //Cargamos la librería email
    $this->load->library('email');

    /*
        * Configuramos los parámetros para enviar el email,
        * las siguientes configuraciones es recomendable
        * hacerlas en el fichero email.php dentro del directorio config,
        * en este caso para hacer un ejemplo rápido lo hacemos 
        * en el propio controlador
        */

    //Indicamos el protocolo a utilizar
    $config['protocol'] = 'smtp';

    //El servidor de correo que utilizaremos
    $config["smtp_host"] = 'smtp.gmail.com';

    //Nuestro usuario
    $config["smtp_user"] = 'samuelgraterol12@gmail.com';

    //Nuestra contraseña
    $config["smtp_pass"] = 'iktvkotutijzbkix';

    //El puerto que utilizará el servidor smtp
    $config["smtp_port"] = '587';

    //El juego de caracteres a utilizar
    $config['charset'] = 'utf-8';

    //Permitimos que se puedan cortar palabras
    $config['wordwrap'] = TRUE;

    //El email debe ser valido  
    $config['validate'] = true;


    //Establecemos esta configuración
    $this->email->initialize($config);

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('samuelgraterol12@gmail.com', 'Victor Robles');

    /*
       * Ponemos el o los destinatarios para los que va el email
       * en este caso al ser un formulario de contacto te lo enviarás a ti
       * mismo
       */
    $this->email->to('samuelgraterol12@gmail.com', 'Víctor Robles');

    //Definimos el asunto del mensaje
    $this->email->subject($this->input->post("asunto"));

    //Definimos el mensaje a enviar
    $this->email->message(
      "Email: " . $this->input->post("email") .
        " Mensaje: " . $this->input->post("mensaje")
    );

    //Enviamos el email y si se produce bien o mal que avise con una flasdata
    if ($this->email->send()) {
      echo 'envio Email enviado correctamente';
    } else {
      echo 'NOOOOOOOOOOOOO';
      // $this->session->set_flashdata('envio', 'No se a enviado el email');
    }
  }
}
