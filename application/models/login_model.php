<?php
//if defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
      
    }
    
    public function logeo($user,$pass)
    {
        
        $this->db->where('user',$user);
        $this->db->where('pass',$pass);
        $q = $this->db->get('login');
        //$data = $q->result_array();

        if($q->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function returnUsers($user,$pass)
    {  
        $this->db->where('user',$user);
        $this->db->where('pass',$pass);
        $q = $this->db->get('login');
        $data = $q->result_array();
        
        if($q->num_rows()>0)
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function getJuegos()
    {
        $this->db->select('*');
        $this->db->from('juego');
        $this->db->join('empresa','juego.idEmpresa = empresa.idempresa');
        $this->db->join('genero','juego.idgenero = genero.idgenero');
        $this->db->join('plataforma','juego.idplataforma = plataforma.idplataforma');
        $this->db->order_by('idjuego','desc');
        $query = $this->db->get();
        return $query->result();
       

    }

    public function getProducto($id)
    {
        $this->db->select('*');
        $this->db->from('juego');
        $this->db->join('empresa','juego.idEmpresa = empresa.idempresa');
        $this->db->join('genero','juego.idgenero = genero.idgenero');
        $this->db->join('plataforma','juego.idplataforma = plataforma.idplataforma');
        $this->db->where('idjuego',$id);
        $this->db->order_by('idjuego','desc');
        $query = $this->db->get();
        return $query->result();
       

    }


}
