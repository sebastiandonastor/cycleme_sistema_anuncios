<?php

class Articulo_model extends CI_Model {

    // Obtener todos los articulos.
    function AllArticles(){
        $query = $this->db->get("articulos")->result_array();
        return $query[0];
    }

    // Obtener articulo por id.
    function ArticlesById($idArticulo){
        $this->db->where('idArticulo', $idArticulo);
        $query = $this->db->get("articulos")->result_array();
        return $query[0];
    }

    // Crear articulo.
    function InsertArticle($datos){
        $result = $this->db->insert('articulos', $datos);
        return $result;
    }

    // Actualziar articulo.
    function UpdateArticle($idArticulo, $datos){
        $this->db->where('idArticulo',$idArticulo);
        $result = $this->db->update('articulos', $datos);
        return $result;
    }

    // Borrar articulo.
    function DeleteArticle($idArticulo){
        $this->db->where('idArticulo', $idArticulo);
        $result = $this->db->delete('articulos');
        return $result;
    }
}

?>