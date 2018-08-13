<?php

class Publicidad_model extends CI_Model {

    public function create_publicidad($data)
    {
        $this->db->insert('publicidad',$data);
    }

    public function get_publicidad($id)
    {
       if($this->session->userdata('tipoUsuario') == 'admin'){
            $this->db->where(['idPublicidad' => $id]);
            $query  = $this->db->get('publicidad');
            return $query->row(0);
       } 
    }

     public function update_publicidad($idPublicidad , $data)
    {
        $this->db->where(['idPublicidad' => $idPublicidad]); 
        $this->db->update('publicidad', $data);
    }

    public function delete_publicidad($id)
    {
       $this->db->where(['idPublicidad' => $id ]);
       $existe = $this->db->get('publicidad'); 
       
       if($existe->row(0) != null){
        $this->db->where(['idPublicidad' => $id ]);
        $this->db->delete('publicidad');
       }
    }

    function getPublicidadPorPagina($limite,$inicio)
    {
        $this->db->select('*');
        $this->db->from('publicidad');
        $this->db->limit($limite,$inicio);
        $this->db->order_by('idPublicidad', 'DESC');

        $resultado = $this->db->get()->result_array();
        return $resultado;
    }

    public function getPublicidad(){
        $this->db->get('publicidad');
        return $this->db->count_all_results('publicidad');
    }

    public function publicidadRamdon(){
     
        $this->db->select('*');
        $this->db->from('publicidad');
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4);
        
        $resultados = $this->db->get()->result_array();
        return $resultados;
    }

}

?>