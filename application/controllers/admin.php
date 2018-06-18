<?php
//if defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function _construct()
    {
        parent::_construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->model('admin_model');
        $this->load->helper('file');
        $this->load->model('file');
    }
    
    public function index()
	{
        

        $this->load->model('admin_model');
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $data= [
                'arrJuego' => $this->admin_model->getJuegos()
            ];
           // redirect('indexAdmin',$data);
           $this->load->view('indexAdmin',$data);
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

    public function agregarJuego()
	{
        
        $user = $this->session->user;
        $pass = $this->session->pass;
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
            $datas= [
                'arrEmpresa' =>$this->admin_model->getEmpresa(),
                'arrPlataforma' =>$this->admin_model->getPlataforma(),
                'arrGenero' =>$this->admin_model->getGenero()
            ];
           
           $this->load->view('agregarJuegos',$datas);
          
        }
        else
        {
            redirect('login');
        }

    }

    public function do_upload() {
   
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->model('admin_model');
        
       
      /* $config['upload_path'] = './fotos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
 
        $this->load->library('upload',$config);*/
        $ram = random_string('alnum', 16);
        $file_name = $_FILES['userfile']['name'];
        $tmp = explode('.', $file_name);
        $extension_img = end($tmp);

        $user_img_profile =$ram .'.' . $extension_img;

        $config['upload_path'] = './fotos/';
//              'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '5000000';
        $config['quality'] = '90%';
        $config['file_name'] = $user_img_profile;
        $this->load->library('upload', $config);
        
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload("userfile")) {
           
            $error['error'] = $this->upload->display_errors();
            $this->load->view('upload_view', $error);
        }else{
        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

            $this->_create_thumbnail($user_img_profile);
           // $data = array('upload_data' => $this->admin->data());
            $titulo = $this->input->post('titulo');
            $precion = $this->input->post('precion');
            $precioi = $this->input->post('precioi');
            $stock = $this->input->post('stock');
            $idemp = $this->input->post('selEmpresa');
            $idgen = $this->input->post('selGenero');
            $idpla = $this->input->post('selPlataforma');
            $imagen = $user_img_profile;
           
            $subir = $this->admin_model->subir($titulo,$imagen,$precion,$precioi,$stock,$idemp,$idgen,$idpla);      
            $data= [
                'arrJuego' => $this->admin_model->getJuegos()
            ];
            $this->load->view('indexAdmin', $data);
        
        }
        
      
    }
    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    public function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'fotos/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['thumb_marker']='';
        $config['new_image']='fotos/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }

    public function crudG()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
           // redirect('indexAdmin',$data);
           $datas= [
            'arrGenero' =>$this->admin_model->getGenero()
            ];
           $this->load->view('adminCrudGenero',$datas);
          //redirect('login');
        }
        else
        {
            redirect('login');
        }
    }

    public function crudE()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
            $datas= [
                'arrEmpresa' =>$this->admin_model->getEmpresa()
            ];
           // redirect('indexAdmin',$data);
           $this->load->view('adminCrudEmpresa',$datas);
          //redirect('login');
        }
        else
        {
            redirect('login');
        }
    }

    public function crudP()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
            $datas= [
                'arrPlataforma' =>$this->admin_model->getPlataforma()
            ];
           // redirect('indexAdmin',$data);
           $this->load->view('adminCrudPlataforma',$datas);
          //redirect('login');
          
        }
        else
        {
            redirect('login');
        }
    }

    public function crudInsertGenero()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
           // redirect('indexAdmin',$data);
           $data = $this->input->post('titulo');
           $this->admin_model->insertGenero($data);
           $datas= [
            'arrGenero' =>$this->admin_model->getGenero()
            ];
           $this->load->view('adminCrudGenero',$datas);
          //redirect('login');
        }
        else
        {
            redirect('indexAdmin');
        }
    }

    public function crudInsertPlataforma()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data = $this->input->post('titulo');
            $this->admin_model->insertPlataforma($data);
           // redirect('indexAdmin',$data);
           $this->load->model('admin_model');
            $datas= [
                'arrPlataforma' =>$this->admin_model->getPlataforma()
            ];
           // redirect('indexAdmin',$data);
           $this->load->view('adminCrudPlataforma',$datas);
          //redirect('login');
        }
        else
        {
            redirect('login');
        }
    }

    public function crudInsertEmpresa()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data = $this->input->post('titulo');
            $this->admin_model->insertEmpresa($data);
           // redirect('indexAdmin',$data);
           $datas= [
            'arrEmpresa' =>$this->admin_model->getEmpresa()
        ];
       // redirect('indexAdmin',$data);
       $this->load->view('adminCrudEmpresa',$datas);
          //redirect('login');
        }
        else
        {
            redirect('login');
        }
    }

    public function crudModificarEmpresa()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('idemp');
            $data = $this->input->post('modEmp');
          
            $this->admin_model->actualizarEmpresa($data,$data2);
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrEmpresa' =>$this->admin_model->getEmpresa()
        ];
           $this->load->view('adminCrudEmpresa',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudBuscarEmpresa()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('id');
           
           
            
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrEmpresa' =>$this->admin_model->buscarEmpresa($data2)
        ];
           $this->load->view('adminEmpresamod',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudEliminarEmpresa()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('id');
           
            $this->admin_model->eliminarEmpresa($data2);
            
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrEmpresa' =>$this->admin_model->getEmpresa()
        ];
           $this->load->view('adminCrudEmpresa',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudModificarGenero()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('idemp');
            $data = $this->input->post('modEmp');
          
            $this->admin_model->actualizarGenero($data,$data2);
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrGenero' =>$this->admin_model->getGenero()
        ];
           $this->load->view('adminCrudGenero',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudBuscarGenero()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('id');
           
           
            
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrGenero' =>$this->admin_model->buscarGenero($data2)
        ];
           $this->load->view('adminGeneromod',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudEliminarGenero()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('id');
           
            $this->admin_model->eliminarGenero($data2);
            
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrGenero' =>$this->admin_model->getGenero()
        ];
           $this->load->view('adminCrudGenero',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudModificarPlataforma()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('idemp');
            $data = $this->input->post('modEmp');
          
            $this->admin_model->actualizarPlataforma($data,$data2);
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrPlataforma' =>$this->admin_model->getPlataforma()
        ];
           $this->load->view('adminCrudPlataforma',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudBuscarPlataforma()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('id');
           
           
            
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrPlataforma' =>$this->admin_model->buscarPlataforma($data2)
        ];
           $this->load->view('adminPlataformamod',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

    public function crudEliminarPlataforma()
    {
        $user = $this->session->user;
        $pass = $this->session->pass;
        
        if(isset($user)&&!empty($user)&&isset($pass)&&!empty($pass))
        {
            
            $this->load->model('admin_model');
            // redirect('indexAdmin',$data);
            $data2 = $this->input->post('id');
           
            $this->admin_model->eliminarPlataforma($data2);
            
           // redirect('indexAdmin',$data);
           $dataa= [
            'arrPlataforma' =>$this->admin_model->getPlataforma()
        ];
           $this->load->view('adminCrudPlataforma',$dataa);
          //redirect('login');
        }
        else
        {
            
            redirect('login');
        }
    }

}
