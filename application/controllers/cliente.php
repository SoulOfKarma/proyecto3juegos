<?php
//if defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function _construct()
    {
        parent::_construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('cliente_model');
        
        $this->load->helper('file');
        $this->load->model('file');
    }
    
    public function index()
	{
        

        $this->load->model('cliente_model');
        $user = $this->session->user;
        $pass = $this->session->pass;
     
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $data= [
                'arrJuego' => $this->cliente_model->getJuegos(),
                'contador' => $this->cliente_model->getCarritoCount()
            ];
           // redirect('indexAdmin',$data);
           $this->load->view('indexCliente',$data);
          //redirect('login');
           

        }
        else
        {
            redirect('login');
        }

    }

    public function logout()
	{
        $user = $this->session->user;
        $pass = $this->session->pass;
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $newdata=array(
                'user'=>'',
                'pass'=>''
            );
            $this->session->set_userdata($newdata);
           //$this->load->view('welcome_message');
          redirect(base_url());
        }
        else
        {
            redirect('login');
        }

    }

    public function productoCliente()
	{
        $this->load->model('cliente_model');
        $user = $this->session->user;
        $pass = $this->session->pass;
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {

              
        $data= [
            'arrJuego' => $this->cliente_model->getJuegos(),
            'arrGenero' => $this->cliente_model->getGenero(),
            'arrPlataforma' => $this->cliente_model->getPlataforma(),
            'arrEmpresa' => $this->cliente_model->getEmpresa(),
            'contador' => $this->cliente_model->getCarritoCount()
        ];
          $this->load->view('productoCliente',$data);
        }
        else
        {
            redirect('login');
        }

    }

    public function carrito()
	{
        $this->load->model('cliente_model');
        $user = $this->session->user;
        $pass = $this->session->pass;
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $data= [
                'arrJuego' => $this->cliente_model->getCarritoT(),
                'arrVentas' => $this->cliente_model->getVenta(),
                'contador' => $this->cliente_model->getCarritoCount(),
                'codven' => $this->cliente_model->returnCodVenVal()
            ];
       
          $this->load->view('carrito',$data);
        }
        else
        {
            redirect('login');
        }

    }


    public function filtrarPorBusquedagenero()
	{
        $this->load->model('cliente_model');
        $id = $this->input->post('id');
        
        $data= [
            'arrJuego' => $this->cliente_model->getJuegosFilGen($id),
            'arrGenero' => $this->cliente_model->getGenero(),
            'arrPlataforma' => $this->cliente_model->getPlataforma(),
            'arrEmpresa' => $this->cliente_model->getEmpresa(),
            'contador' => $this->cliente_model->getCarritoCount()
        ];
        $this->load->view('productoCliente',$data);
    }

    public function filtrarPorBusquedaPlataforma()
	{
        $this->load->model('cliente_model');
        $id = $this->input->post('id');
        
        $data= [
            'arrJuego' => $this->cliente_model->getJuegosFilPlat($id),
            'arrGenero' => $this->cliente_model->getGenero(),
            'arrPlataforma' => $this->cliente_model->getPlataforma(),
            'arrEmpresa' => $this->cliente_model->getEmpresa(),
            'contador' => $this->cliente_model->getCarritoCount()
        ];
        $this->load->view('productoCliente',$data);
    }

    public function filtrarPorBusquedaEmpresa()
	{
        $this->load->model('cliente_model');
        $id = $this->input->post('id');
        
        $data= [
            'arrJuego' => $this->cliente_model->getJuegosFilEmp($id),
            'arrGenero' => $this->cliente_model->getGenero(),
            'arrPlataforma' => $this->cliente_model->getPlataforma(),
            'arrEmpresa' => $this->cliente_model->getEmpresa(),
            'contador' => $this->cliente_model->getCarritoCount()
        ];
        $this->load->view('productoCliente',$data);
    }

    public function productoEspecifico()
	{
        $this->load->model('cliente_model');
        $id = $this->input->post('idjuego');
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        
        $data= [
            'arrJuego' => $this->cliente_model->getProducto($id),
            'id' => $this->cliente_model->returnId($user,$pass),
            'contador' => $this->cliente_model->getCarritoCount(),
            'codven' => $this->cliente_model->returnCodVen()
        ];
        $this->load->view('productoEspecifico',$data);
    }

    public function guardarCarritoTemp()
	{
        $this->load->model('cliente_model');
        $idlogin = $this->input->post('idcliente');
        $nombrejuego = $this->input->post('nombreJ');
        $preciointernet = $this->input->post('precioJInternet');
        $codven = $this->input->post('codvens');
        
        $this->cliente_model->insertCarritoT($idlogin,$nombrejuego,$preciointernet,$codven);

        $data= [
            'arrJuego' => $this->cliente_model->getJuegos(),
            'arrGenero' => $this->cliente_model->getGenero(),
            'arrPlataforma' => $this->cliente_model->getPlataforma(),
            'arrEmpresa' => $this->cliente_model->getEmpresa(),
            'contador' => $this->cliente_model->getCarritoCount()
           
        ];
        $this->load->view('indexCliente',$data);
    }

    public function insertarVenta()
	{
        $this->load->model('cliente_model');
        
        $id = $this->input->post('id');
        $this->cliente_model->insertVenta($id);

        $data= [
            'arrJuego' => $this->cliente_model->getJuegoVoucher($id),
            'contador' => $this->cliente_model->getCarritoCount()
           
        ];
        $this->load->view('boleta',$data);
    }

    public function eliminarCarritoTemp()
	{
        $this->load->model('cliente_model');
        $id = $this->input->post('id');
        $this->cliente_model->eliminarCarTemp($id);
        
        $data= [
            'arrJuego' => $this->cliente_model->getCarritoT(),
            'contador' => $this->cliente_model->getCarritoCount()
           
        ];
   
      $this->load->view('carrito',$data);
    }

    public function productovendido()
	{
        $this->load->model('cliente_model');
        
        $data= [
            'arrJuego' => $this->cliente_model->getVenta(),
            'contador' => $this->cliente_model->getCarritoCount()  
        ];
   
      $this->load->view('productovendido',$data);
    }

    public function voucher()
	{
        $this->load->model('cliente_model');
        $id = $this->input->post('id');
        
        $data= [
            'arrJuego' => $this->cliente_model->getJuegoV($id),
            'contador' => $this->cliente_model->getCarritoCount()  
        ];
   
      $this->load->view('voucher',$data);
    }




}
