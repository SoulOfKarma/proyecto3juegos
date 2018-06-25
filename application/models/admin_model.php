<?php
//if defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
      
    }
    
    function subir($titulo,$imagen,$precion,$precioi,$stock,$idemp,$idgen,$idpla)
    {
        $data = array(
            'nombrejuego' => $titulo,
            'precionormal' => $precion,
            'preciointernet' => $precioi,
            'idEmpresa' => $idemp,
            'linkfoto' => $imagen,
            'idgenero' => $idgen,
            'idplataforma' => $idpla,
            'stock' => $stock
        );
        return $this->db->insert('juego', $data);

        
    }

    public function getGenero()
    {
        $query = $this->db->get('genero');
        return $query->result();
       

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

    public function getPlataforma()
    {
        $query = $this->db->get('plataforma');
        return $query->result();
       

    }
    
    public function getEmpresa()
    {
       $query = $this->db->get('empresa');
       return $query->result();
    }

    public function insertGenero($data)
    {
        $datas = array(
            'descripcion' => $data,
           
    );
        $this->db->insert('genero',$datas);
           
        return true;
    }

    public function insertEmpresa($data)
    {
        $datas = array(
            'des_emp' => $data,
           
    );
        $this->db->insert('empresa',$datas);
           
        return true;
    }

    public function insertPlataforma($data)
    {
        $datas = array(
            'des_plat' => $data,
           
    );
        $this->db->insert('plataforma',$datas);
           
        return true;
    }

    public function actualizarEmpresa($data,$id)
    {
        $datas = array(
            'des_emp' => $data,
           
    );
    
    $this->db->where('idempresa', $id);
    $this->db->update('empresa', $datas);
           
        return true;
    }

    public function buscarEmpresa($data)
    {
        $this->db->where('idempresa',$data);
       $query = $this->db->get('empresa');
       return $query->result();
    }

    public function eliminarEmpresa($data)
    {
        $this->db->where('idempresa',$data);
       $query = $this->db->delete('empresa');
       
    }

    public function actualizarGenero($data,$id)
    {
        $datas = array(
            'descripcion' => $data,
           
    );
    
    $this->db->where('idgenero', $id);
    $this->db->update('genero', $datas);
           
        return true;
    }

    public function buscarGenero($data)
    {
        $this->db->where('idgenero',$data);
       $query = $this->db->get('genero');
       return $query->result();
    }

    public function eliminarGenero($data)
    {
        $this->db->where('idgenero',$data);
       $query = $this->db->delete('genero');
       
    }
    public function actualizarPlataforma($data,$id)
    {
        $datas = array(
            'des_plat' => $data,
           
    );
    
    $this->db->where('idplataforma', $id);
    $this->db->update('plataforma', $datas);
           
        return true;
    }

    public function buscarPlataforma($data)
    {
        $this->db->where('idplataforma',$data);
       $query = $this->db->get('plataforma');
       return $query->result();
    }

    public function eliminarPlataforma($data)
    {
        $this->db->where('idplataforma',$data);
       $query = $this->db->delete('plataforma');
       
    }

    public function eliminarJuego($data)
    {
        $this->db->where('idjuego',$data);
       $query = $this->db->delete('juego');
       
    }

    public function buscarJuego($data)
    {
        $this->db->where('idjuego',$data);
       $query = $this->db->get('juego');
       return $query->result();
    }

    public function modJuego($id,$titulo,$imagen,$precion,$precioi,$stock,$idemp,$idgen,$idpla)
    {
        $datas = array(
            'nombrejuego' => $titulo,
            'precioNormal' => $precion,
            'precioInternet' => $precioi,
            'idEmpresa' => $idemp,
            'linkfoto' => $imagen,
            'idgenero' => $idgen,
            'idplataforma' => $idpla,
            'stock' => $stock,
    );
    
    $this->db->where('idjuego', $id);
    $this->db->update('juego', $datas);
           
        return true;
    }


}
