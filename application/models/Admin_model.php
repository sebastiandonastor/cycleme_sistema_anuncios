<?php

class Admin_model extends CI_Model {

    function crearNoticia($noticia){
        $this->db->insert('noticias',$noticia);
    }

}