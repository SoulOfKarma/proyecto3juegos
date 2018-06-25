<?php
//if defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
      
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

    public function getGenero()
    {
        $query = $this->db->get('genero');
        return $query->result();
    }

    public function getJuegosFilGen($id)
    {
        $this->db->select('*');
        $this->db->from('juego');
        $this->db->join('empresa','juego.idEmpresa = empresa.idempresa');
        $this->db->join('genero','juego.idgenero = genero.idgenero');
        $this->db->join('plataforma','juego.idplataforma = plataforma.idplataforma');
        $this->db->where('juego.idgenero',$id);
        $this->db->order_by('idjuego','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJuegosFilPlat($id)
    {
        $this->db->select('*');
        $this->db->from('juego');
        $this->db->join('empresa','juego.idEmpresa = empresa.idempresa');
        $this->db->join('genero','juego.idgenero = genero.idgenero');
        $this->db->join('plataforma','juego.idplataforma = plataforma.idplataforma');
        $this->db->where('juego.idplataforma',$id);
        $this->db->order_by('juego.idplataforma','desc');
        $query = $this->db->get();
        return $query->result();
    } 
    
    public function getJuegosFilEmp($id)
    {
        $this->db->select('*');
        $this->db->from('juego');
        $this->db->join('empresa','juego.idEmpresa = empresa.idempresa');
        $this->db->join('genero','juego.idgenero = genero.idgenero');
        $this->db->join('plataforma','juego.idplataforma = plataforma.idplataforma');
        $this->db->where('juego.idempresa',$id);
        $this->db->order_by('juego.idempresa','desc');
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

    public function getCarritoT()
    {
        $this->db->select('*');
        $this->db->from('carritotemp');
        $this->db->join('login','carritotemp.id_cliente = login.idlogin');
        $this->db->order_by('carritotemp.id_cliente','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCarritoCount()
    {
       
        $query = $this->db->count_all_results('carritotemp');
       
        return $query;
    }

    public function getVenta()
    {
        $query = $this->db->get('ventas');
        return $query->result();
    }

    public function getVentaEspecifica($id)
    {   
        $this->db->select('*');
        $this->db->where('idcliente',$id);
        $this->db->order_by('idventas','desc');
        $query = $this->db->get('ventas',1);

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
        


    }

    public function insertCarritoT($idlogin,$nombrejuego,$preciointernet,$codven)
    {
        $datas = array(
            'nombre_juego' => $nombrejuego,
            'precio' => $preciointernet,
            'id_cliente' => $idlogin,
            'codigoventa' => $codven
           
    );
        $this->db->insert('carritotemp',$datas);
           
        return true;
    }

    public function returnId($user,$pass)
    {  
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('user',$user);
        $this->db->where('pass',$pass);
        $q = $this->db->get();
        
            return $q->result();
    }

    public function eliminarCarTemp($id)
    {  
      
        $this->db->where('idcartemp',$id);
        
        $q = $this->db->delete('carritotemp');
        
           
    }

    public function insertVenta($id)
    {
        $this->db->query(
            "insert into ventas (nombre_producto, precio,id_cliente,codigoventa) select nombre_juego, precio,id_cliente,codigoventa from carritotemp;"
        );

        $this->db->where('codigoventa',$id);
        $this->db->delete('carritotemp');
           
       
    }

    public function returnCodVen()
    {  
        $this->db->select('codigoventa');
        $this->db->order_by('idventas','desc');
        $q = $this->db->get('ventas',1);
        
        if($q->num_rows()>0)
        {
            return $q->result();
        }
        else
        {
            return 0;
        }
          
    }

    public function returnCodVenVal()
    {  
        $this->db->select('codigoventa');
        $this->db->order_by('idcartemp','desc');
        $q = $this->db->get('carritotemp',1);
        
            return $q->result();
       
          
    }

    public function getJuegoV($id)
    {
        $this->db->select('*');
        $this->db->from('juego');
        $this->db->where('nombrejuego',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getJuegoVoucher($id)
    {
        $this->db->select('*');
        $this->db->from('ventas');
        $this->db->where('codigoventa',$id);
        $query = $this->db->get();
        return $query->result();
    }


}
