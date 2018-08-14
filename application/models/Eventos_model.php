<?php

class Eventos_model extends CI_Model {

    public function create_evento($data)
    {
        $this->db->insert('eventos',$data);
    }

    public function get_evento($id)
    {
       if($this->session->userdata('tipoUsuario') == 'admin'){
            $this->db->where(['idEventos' => $id]);
            $query  = $this->db->get('eventos');
            return $query->row(0);
       } 
    }

    public function get_eventoAll()
    {
       if($this->session->userdata('tipoUsuario') == 'admin'){
            $query  = $this->db->get('eventos');
            return $query->result_array();
       } 
    }

     public function update_evento($idEventos , $data)
    {
        $this->db->where(['idEventos' => $idEventos]); 
        $this->db->update('eventos', $data);
    }

    public function delete_evento($id)
    {
       $this->db->where(['idEventos' => $id ]);
       $existe = $this->db->get('eventos'); 
       
       if($existe->row(0) != null){
        $this->db->where(['idEventos' => $id ]);
        $this->db->delete('eventos');
       }
    }
}

?>