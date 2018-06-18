<?php
//if defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $newdata=array(
            'user'=>'',
            'pass'=>''
        );
        $this->session->set_userdata($newdata);
        $this->load->view('welcome_message');
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->database();
        
    }
    
    public function index()
	{
        $this->load->model('login_model');
        $data= [
            'arrJuego' => $this->login_model->getJuegos()
        ];
        $this->load->view('welcome_message',$data);
    }

    public function iniciarSession()
    {
        $this->load->view('iniciarSession');
    }

    public function logearse()
    {
        $newdata=array(
            'user'=>'',
            'pass'=>''
        );
        $this->session->set_userdata($newdata);


        if(isset($_POST['pass'])&&isset($_POST['user']))
        {
            $this->load->model('login_model');

            $data = $this->login_model->returnUsers($_POST['user'],$_POST['pass']);
            
            $val = $data[0]['id_perfil'];
            echo $val;

            if($this->login_model->logeo($_POST['user'],$_POST['pass']))
            {
                if($val==1)
                {
                    $newdata=array(
                        'user'=>$_POST['user'],
                        'pass'=>$_POST['pass']
                    );
                    $this->session->set_userdata($newdata);
                    redirect('admin');
                }
                else if($val==2)
                {
                    $newdata=array(
                        'user'=>$_POST['user'],
                        'pass'=>$_POST['pass']
                    );
                    $this->session->set_userdata($newdata);
                    redirect('cliente');
                }
               
            }
            else
            {
            
           redirect('login');
               
            }
        }else
        {
            redirect('login');
        }
      

     /*   $mensaje = '';
        $data = [
            'mensaje' => $mensaje,
          
         ];
  */
    }

    public function inicio()
	{
        $this->load->model('login_model');
        $data= [
            'arrJuego' => $this->login_model->getJuegos()
        ];
        $this->load->view('inicio',$data);
    }

    public function productoS()
	{
        $this->load->model('login_model');
        $id = $this->input->post('idjuego');
        
        $data= [
            'arrJuego' => $this->login_model->getProducto($id)
        ];
        $this->load->view('productoS',$data);
    }


    public function product()
	{
        $this->load->model('login_model');
        $id = $this->input->post('idjuego');
        
        $data= [
            'arrJuego' => $this->login_model->getJuegos()
        ];
        $this->load->view('product',$data);
    }
   
}
