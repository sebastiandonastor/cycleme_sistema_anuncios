<?php

class Anuncio_model extends CI_Model {

    public function create_anuncios($data)
    {
        $this->db->insert('anuncios',$data);
    }

    public function show_anuncios()
    {
        $this->db->where(['estado' => 'true']); 
        $this->db->order_by("idAnuncio", "desc");
        $query = $this->db->get('anuncios');
        return $query->result();
    }

    public function get_anuncios($id)
    {
       $this->db->where(['idAnuncio' => $id]);
       $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
       $query  = $this->db->get('anuncios');
       return $query->row(0);
    }

     public function get_anuncioLogueado()
    {
       $this->db->order_by("idAnuncio", "desc");
       $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
       $query  = $this->db->get('anuncios');
       return $query->result();
    }


     public function update_anuncios($idAnuncio , $data)
    {
        $this->db->where(['idAnuncio' => $idAnuncio]); 
        $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
        $this->db->update('anuncios', $data);
    }

    public function delete_anuncios($id)
    {
       $this->db->where(['idAnuncio' => $id ]);
       $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
       $existe = $this->db->get('anuncios'); 
       
       if($existe->row(0) != null){
        $this->db->where(['idAnuncio' => $id ]);
        $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
        $this->db->delete('anuncios');
        return 1;
       }else{
        return 0;
       }
    }

    public function estado_anuncios($id)
    {
       $this->db->where(['idAnuncio' => $id ]);
       $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
       $existe = $this->db->get('anuncios'); 
       
       if($existe->row(0) != null){
        
        $this->db->where(['idAnuncio' => $id ]);
        $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]); 
        $existe = $this->db->get('anuncios'); 

            if( $existe->row(0)->estado == 1){

                $this->db->where(['idAnuncio' => $id ]);
                $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]);
                $data = array('estado' => 0);
                $this->db->update('anuncios',$data); 

            }else if( $existe->row(0)->estado == 0){

                $this->db->where(['idAnuncio' => $id ]);
                $this->db->where(['idUsuario_fk' => $this->session->userdata('idUsuario')]);
                $data = array('estado' => 1);
                $this->db->update('anuncios',$data);  
                
            }
       }
    }


    function GetCategorias( $categoriaPrincipal){
        $this->db->where(['categoriaPrincipal' => $categoriaPrincipal]); 
        $result  = $this->db->get('categorias');
        return $result->result();
    }
    
    function GetsubCategorias( $id){
        $this->db->where(['idCategoria' => $id]); 
        $result  = $this->db->get('categorias');
        return $result->row(0);
    }
    
    function GetProvincias(){
        $result  = $this->db->get('provincias');
        return $result->result();
    }
    function GetDetalles(){
        $result  = $this->db->get('detallesCategoria');
        return $result->result();
    }

    function getAnunciosPorPagina($limite,$inicio){

        $this->db->select('*');
        $this->db->from('anuncios');
        $this->db->join('categorias','idCategorias_fk = idCategoria');
        $this->db->join('usuario','idUsuario_fk = idUsuario');

        $this->db->limit($limite,$inicio);
        $this->db->order_by('idAnuncio', 'DESC');
        $this->db->where('estado',1);

        $resultado = $this->db->get()->result_array();
        return $resultado;
    }

    public function getAnunciosVisi(){
        $this->db->where('estado',1);
        return $this->db->count_all_results('anuncios');
    }

    function getAnunciosPorPaginaUser($limite,$inicio){
        $this->db->select('*');
        $this->db->from('anuncios');
        $this->db->join('categorias','idCategorias_fk = idCategoria');
        $this->db->join('usuario','idUsuario_fk = idUsuario');

        $this->db->limit($limite,$inicio);
        $this->db->order_by('idAnuncio', 'DESC');
        $this->db->where('idUsuario_fk',$this->session->userdata('idUsuario'));

        $resultado = $this->db->get()->result_array();
        return $resultado;
    }
    public function getAnunciosVisiUser(){
        $this->db->where('idUsuario_fk',$this->session->userdata('idUsuario'));
        return $this->db->count_all_results('anuncios');
    }


    public function getAnuncioVisi($id){
        $this->db->select('*');
        $this->db->from('anuncios');
        $this->db->join('usuario','idUsuario_fk = idUsuario');
        $this->db->where('estado',1);
        $this->db->where('idAnuncio',$id);
        $resultado = $this->db->get()->result_array();
        return $resultado;

    }

    public function existeAnuncio($id){
        $this->db->where('idAnuncio',$id);
        $anuncio = $this->db->count_all_results('anuncios');

        if($anuncio == 1){
            return true;
        }

        return false;
    }


}

?>