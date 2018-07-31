<?php

class Anuncio_model extends CI_Model {

    // Obtener todos los Anuncios.
    function AllAnuncios(){
        $query = $this->db->get("anuncios")->result_array();
        return $query;
    }

    // Obtener Anuncios por id.
    function AnunciosById($idAnuncio){
        $this->db->where('idAnuncio', $idArticulo);
        $query = $this->db->get("anuncios")->result_array();
        return $query[0];
    }

    // Crear Anuncios.
    function InsertArticle($nombre, $modelo, $tipo, $marca, $tamanoAro, $tamanoCuadro, $accesorio, $accion, $importancia, $fechaCreacion, $fechaCaducidad, $descipcion, $categoria, $precio, $foto, $titulo, $provincia, $numeroVisitas, $idUsuario_fk){

        $datos = array(
            'nombre' => $nombre,
            'modelo' => $modelo,
            'tipo' => $tipo,
            'marca' => $marca,
            'tamanoAro' => $tamanoAro,
            'tamanoCuadro' => $tamanoCuadro,
            'accesorio' => $accesorio,
            'accion' => $accion,
            'importancia' => $importancia,
            'fechaCreacion' => $fechaCreacion,
            'fechaCaducidad' => $fechaCaducidad,
            'descripcion' => $descipcion,
            'categoria' => $categoria,
            'precio' => $precio,
            'foto' => $foto,
            'titulo' => $titulo,
            'provincia' => $provincia,
            'numeroVisitas' => $numeroVisitas,
            'idUsuario_fk' => $idUsuario_fk
        );

        $result = $this->db->insert('anuncios', $datos);
        return $result;
    }

    // Actualziar Anuncios.
    function UpdateArticle($idAnuncio, $$nombre, $modelo, $tipo, $marca, $tamanoAro, $tamanoCuadro, $accesorio, $accion, $importancia, $fechaCreacion, $fechaCaducidad, $descipcion, $categoria, $precio, $foto, $titulo, $provincia, $numeroVisitas, $idUsuario_fk){
        $this->db->where('idAnuncio',$idAnuncio);


        $datos = array(
            'nombre' => $nombre,
            'modelo' => $modelo,
            'tipo' => $tipo,
            'marca' => $marca,
            'tamanoAro' => $tamanoAro,
            'tamanoCuadro' => $tamanoCuadro,
            'accesorio' => $accesorio,
            'accion' => $accion,
            'importancia' => $importancia,
            'fechaCreacion' => $fechaCreacion,
            'fechaCaducidad' => $fechaCaducidad,
            'descripcion' => $descipcion,
            'categoria' => $categoria,
            'precio' => $precio,
            'foto' => $foto,
            'titulo' => $titulo,
            'provincia' => $provincia,
            'numeroVisitas' => $numeroVisitas,
            'idUsuario_fk' => $idUsuario_fk
        );

        $result = $this->db->update('anuncios', $datos);
        return $result;
    }
    

    // Borrar Anuncios.
    function DeleteArticle($idAnuncio){
        $this->db->where('idAnuncio', $idAnuncio);
        $result = $this->db->delete('anuncios');
        return $result;
    }
}

?>