<?php

    class Categorias extends CI_Controller{

        public function index(){
            $data['main_view'] = 'Categorias/Todas_categorias';
            $data['titulo'] = 'CycleMe categorias';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('categoria_model');
            $this->load->view('Layouts/main', $data);
        }

        public function categorias($categoria){
            $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoriaPrincipal='".$categoria."'"); 
            return $result->num_rows();
        }

    }


?>