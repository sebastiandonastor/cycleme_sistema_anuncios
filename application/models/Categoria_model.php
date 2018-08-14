<?php

class Categoria_model extends CI_Model{

    public function listar_categorias($categoria){
        $this->db->where("categoriaPrincipal", $categoria);
        $query=$this->db->get("categorias");
        return $query->result_array();
    }

    public function subCategorias($subcategoria){
        $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoria='".$subcategoria."'"); 
        return $result->result_array();
    }

    public function subCategoriasNum($subcategoria){
        $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoria='".$subcategoria."'"); 
        return $result->num_rows();
    }

    public function anunciosCategoriaPrincipal($categoria){
        $result = $this->db->query("SELECT * ,usuario.nombre FROM anuncios 
        INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria 
        INNER JOIN usuario ON anuncios.idUsuario_fk = usuario.idUsuario
        WHERE categorias.categoriaPrincipal='".$categoria."'");
        return $result->result_array();
    }

    public function anunciosCategoriaPrincipalNum($categoria){
        $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoriaPrincipal='".$categoria."'");
        return $result->num_rows();
    }

    public function getSubCategoria($categoria){
        $this->db->select('categoria');
        $this->db->from('Categorias');
        $this->db->where('categoriaPrincipal',$categoria);
        $resultado = $this->db->get()->result_array();

        return $resultado;
    }

    public function getSubCategoriaCount($categoria){


        $total = $this->db->query("SELECT `categorias`.`categoriaPrincipal` as `cantidad` FROM `anuncios` inner join `categorias` on `anuncios`.`idCategorias_fk` = `categorias`.`idCategoria` where `anuncios`.`estado` = 1 and `categorias`.`categoriaPrincipal` = '$categoria'");
        return $total->num_rows();

    }



}


?>