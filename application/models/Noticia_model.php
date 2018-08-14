<?php

class Noticia_model extends CI_Model {

    function obtenerNoticias(){
        $this->db->order_by('idNoticias', 'DESC');
        $resultado = $this->db->get('noticias')->result_array();
        return $resultado;

    }

}