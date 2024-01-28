<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
    }

    public function index()
    {
        $this->load->view('view_html_header');
        $this->load->view('view_html_main');
        $this->load->view('view_html_footer');
    }

    public function newuser()
    {
        $this->load->view('view_html_header');
        $this->load->view('view_html_new_user');
        $this->load->view('view_html_footer');
    }
    public function users()
    {
        $table = "users";
     
        if (isset($_GET['busq'])) {
            $busq=$_GET['busq'];
            $where= array("(
               nombre LIKE % $busq % OR
               apellido_p LIKE % $busq % OR
               apellido_m LIKE % $busq % )"
            );
            
            $data = $this->General_model->get($table,$where);
        } else {
            $data = $this->General_model->get($table);
           
        }
        
        $this->load->model('General_model');
        $data = $this->General_model->get($table);
        /*  foreach($sql1 as $d){
          echo  $d->nombre;

        }*/

        $this->load->view('view_html_header');
        $this->load->view('view_html_users', array('data' => $data));
        $this->load->view('view_html_footer');
    }

    public function cp()
    {
        $cp = strip_tags(trim($_POST['cp']));
        //   Ejemplo:
        //  https://api.copomex.com/query/info_cp/09810?token=pruebas

        $apiUrl = 'https://api.copomex.com/query/info_cp/' . $cp . '?token=ca5b2b29-2f45-4796-ba60-bb409839bf92';
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        print($json);
        curl_close($curl);
    }
    protected function random_string()
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 7));

        for ($i = 0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function createuser()
    {
        $v = 0;
        $messages = array();

        if (empty($_POST['nombre'])) {
            $messages['msg_nombre'] = 'Se Requiere del Campo Nombre';
            $v++;
        }
        if (empty($_POST['apellido_p'])) {
            $v++;
            $messages['msg_apellido_p'] = "Se requiere del Campo Apellido Paterno";
        }
        if (empty($_POST['apellido_m'])) {
            $v++;
            $messages['msg_apellido_m'] = "Se requiere del Campo Apellido Materno";
        }
        if (empty($_POST['sexo'])) {
            $v++;
            $messages['msg_sexo'] = "Se requiere del Campo Sexo";
        }
        if (empty($_POST['cp'])) {
            $v++;
            $messages['msg_cp'] = "Se requiere del Campo Codigo Postal";
        }
        if (empty($_POST['colonia'])) {
            $v++;
            $messages['msg_colonia'] = "Se requiere del Campo Colonia";
        }
        if (empty($_POST['estado'])) {
            $v++;
            $messages['msg_estado'] = "Se requiere del Campo Estado";
        }
        if (empty($_POST['telefono'])) {
            $v++;
            $messages['msg_telefono'] = "Se requiere del Campo Telefono";
        }
        if (empty($_POST['permiso'])) {
            $v++;
            $messages['msg_permiso'] = "Se requiere del Campo Tipo de Usuario";
        }
        if (empty($_POST['correo'])) {
            $v++;
            $messages['msg_correo'] = "Se requiere del Campo Tipo de Usuario";
        } else if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
        } else {
            $v++;
            $messages['msg_correo'] = "Formato invalido de Correo";
        }
        if ($v == 0) {

            $nombre = strip_tags(trim($_POST['nombre']));
            $apellido_p = strip_tags(trim($_POST['apellido_p']));
            $apellido_m = strip_tags(trim($_POST['apellido_m']));
            $sexo = strip_tags(trim($_POST['sexo']));
            $correo = strip_tags(trim($_POST['correo']));
            $cp = strip_tags(trim($_POST['cp']));
            $colonia = strip_tags(trim($_POST['colonia']));
            $municipio = strip_tags(trim($_POST['municipio']));
            $estado = strip_tags(trim($_POST['estado']));
            $telefono = strip_tags(trim($_POST['telefono']));
            $permiso = strip_tags(trim($_POST['permiso']));
            $date = date('Y-m-d H:m:s');
            $table = "users";
            $pwd = $this->random_string();



            $data = array(
                'nombre' => $nombre,
                'apellido_p' => $apellido_p,
                'apellido_m' =>  $apellido_m,
                'sexo' =>  $sexo,
                'correo' => $correo,
                'cp' =>  $cp,
                'colonia' => $colonia,
                'municipio' => $municipio,
                'estado' =>  $estado,
                'telefono' =>  $telefono,
                'permiso' =>  $permiso,
                'fecha' => $date,
                'created_at' => $date,
                'estatus' => "Activo",
                'password' => $pwd,

            );

            $this->load->model("General_model");
            if ($this->General_model->insert($table, $data,)) {

                redirect('users');
            }
        } else {
            redirect('newuser');
        }
    }
}
