<?php

class Anuncio_model extends CI_Model {

    // // Obtener todos los Anuncios.
    // function AllAnuncios(){
    //     $query = $this->db->get("anuncios")->result_array();
    //     return $query;
    // }

    // // Obtener Anuncios por id.
    // function AnunciosById($idAnuncio){
    //     $this->db->where('idAnuncio', $idArticulo);
    //     $query = $this->db->get("anuncios")->result_array();
    //     return $query[0];
    // }

    // // Crear Anuncios.
    // function InsertArticle($nombre, $modelo, $tipo, $marca, $tamanoAro, $tamanoCuadro, $accesorio, $accion, $importancia, $fechaCreacion, $fechaCaducidad, $descipcion, $categoria, $precio, $foto, $titulo, $provincia, $numeroVisitas, $idUsuario_fk){

    //     $datos = array(
    //         'nombre' => $nombre,
    //         'modelo' => $modelo,
    //         'tipo' => $tipo,
    //         'marca' => $marca,
    //         'tamanoAro' => $tamanoAro,
    //         'tamanoCuadro' => $tamanoCuadro,
    //         'accesorio' => $accesorio,
    //         'accion' => $accion,
    //         'importancia' => $importancia,
    //         'fechaCreacion' => $fechaCreacion,
    //         'fechaCaducidad' => $fechaCaducidad,
    //         'descripcion' => $descipcion,
    //         'categoria' => $categoria,
    //         'precio' => $precio,
    //         'foto' => $foto,
    //         'titulo' => $titulo,
    //         'provincia' => $provincia,
    //         'numeroVisitas' => $numeroVisitas,
    //         'idUsuario_fk' => $idUsuario_fk
    //     );

    //     $result = $this->db->insert('anuncios', $datos);
    //     return $result;
    // }

    // // Actualziar Anuncios.
    // function UpdateArticle($idAnuncio, $nombre, $modelo, $tipo, $marca, $tamanoAro, $tamanoCuadro, $accesorio, $accion, $importancia, $fechaCreacion, $fechaCaducidad, $descipcion, $categoria, $precio, $foto, $titulo, $provincia, $numeroVisitas, $idUsuario_fk){
    //     $this->db->where('idAnuncio',$idAnuncio);


    //     $datos = array(
    //         'nombre' => $nombre,
    //         'modelo' => $modelo,
    //         'tipo' => $tipo,
    //         'marca' => $marca,
    //         'tamanoAro' => $tamanoAro,
    //         'tamanoCuadro' => $tamanoCuadro,
    //         'accesorio' => $accesorio,
    //         'accion' => $accion,
    //         'importancia' => $importancia,
    //         'fechaCreacion' => $fechaCreacion,
    //         'fechaCaducidad' => $fechaCaducidad,
    //         'descripcion' => $descipcion,
    //         'categoria' => $categoria,
    //         'precio' => $precio,
    //         'foto' => $foto,
    //         'titulo' => $titulo,
    //         'provincia' => $provincia,
    //         'numeroVisitas' => $numeroVisitas,
    //         'idUsuario_fk' => $idUsuario_fk
    //     );

    //     $result = $this->db->update('anuncios', $datos);
    //     return $result;
    // }
    
    public function create_anuncios($data)
    {
        $this->db->insert('anuncios',$data);
    }

    public function show_anuncios()
    {
        $this->db->order_by("idAnuncio", "desc");
        $query = $this->db->get('anuncios');
        return $query->result();
    }

    public function get_anuncios($id)
    {
       $this->db->where(['idAnuncio' => $id]); 
       $query  = $this->db->get('anuncios');
       return $query->row(0);
    }

    public function update_anuncios($id , $data)
    {
        $this->db->where(['idAnuncio' => $id]); 
        $this->db->update('anuncios',$data);
    }

    public function delete_anuncios($id)
    {
       $this->db->where(['idAnuncio'=>$id]);
       $this->db->delete('anuncios');
    }

    function GetCategorias( $categoriaPrincipal){
        $this->db->where(['categoriaPrincipal' => $categoriaPrincipal]); 
        $result  = $this->db->get('categorias');
        return $result->result();
    }
    function GetProvincias(){
        $result  = $this->db->get('provincias');
        return $result->result();
    }
    function GetDetalles(){
        $result  = $this->db->get('detallesCategoria');
        return $result->result();
    }

}

?>