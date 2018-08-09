<?php

    class Home extends CI_Controller
    {
        public function index()
        {
            $data['main_view'] = 'home_view';
            $data['titulo'] = 'CycleMe';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }

        public function categorias($categoria){
            $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoriaPrincipal='".$categoria."'"); 
            return $result->num_rows();
        }

        public function pag_categorias(){
            $data['main_view'] = 'Categorias/Todas_categorias';
            $data['titulo'] = 'CycleMe categorias';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Categoria_model');
            $this->load->view('Layouts/main',$data);
        }

        public function categorias_principales($categoria){
            $data['main_view'] = 'Categorias/categoria';
            $data['titulo'] = 'CycleMe categorias';
            $data['categoria_deseada'] = $categoria;
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Categoria_model');
            $this->load->view('Layouts/main', $data);
        }

        public function categorias_secundarias($categoria){
            $data['main_view'] = 'Categorias/subcategoria';
            $data['titulo'] = 'CycleMe subcategorias';
            $data['categoria_deseada'] = $categoria;
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Categoria_model');
            $this->load->view('Layouts/main', $data);
        }

        public function eventos(){
            //$data['main_view'] = 'vistas_secundarias/eventos';
            $data['main_view'] = 'Anuncios/Plantilla_anuncios';
            $data['titulo'] = 'CycleMe eventos';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }

        public function nosotros(){
            $data['main_view'] = 'vistas_secundarias/nosotros';
            $data['titulo'] = 'CycleMe nosotros';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }

        public function noticias(){
            $data['main_view'] = 'vistas_secundarias/noticias';
            $data['titulo'] = 'CycleMe noticias';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }



    }


?>