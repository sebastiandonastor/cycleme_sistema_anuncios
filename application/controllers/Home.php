<?php

    class Home extends CI_Controller
    {
        public function index($id = 1)
        {
            if(!is_numeric($id)){
                redirect('Home');
            }
            
            $this->Anuncio_model->limiteCumplido();

            $data['main_view'] = 'home_view';
            $data['titulo'] = 'CycleMe';
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');


            $pagina = $id;
            $postPorPagina = 15;
            $inicio = ($pagina > 1) ? ($postPorPagina * $pagina - $postPorPagina) : 0;
            $data['Anuncios'] = $this->Anuncio_model->getAnunciosPorPagina($postPorPagina,$inicio);
            $data['cantidadAnuncios'] = ceil($this->Anuncio_model->getAnunciosVisi() / $postPorPagina);
            $data['pagina'] = $id;
        $this->load->model('Categoria_model');
            $data['Accesorios'] = $this->Categoria_model->getSubCategoria('Accesorios');
            $data['Bicicletas'] = $this->Categoria_model->getSubCategoria('Bicicletas');
            $data['Componentes'] = $this->Categoria_model->getSubCategoria('Componentes');
            $data['Servicios'] = $this->Categoria_model->getSubCategoria('Servicios');

            $this->load->model('Publicidad_model');
            $data['publicidades'] = $this->Publicidad_model->publicidadRamdon();


            $this->load->model('Usuario');

            $this->load->view('Layouts/main',$data);
        }

        public function categorias($categoria){
            $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoriaPrincipal='".$categoria."'"); 
            return $result->num_rows();
        }

        public function pag_categorias(){
            $this->load->model('Publicidad_model');
            $data['publicidades'] = $this->Publicidad_model->publicidadRamdon();

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
            $this->load->model('Publicidad_model');
            $data['publicidades'] = $this->Publicidad_model->publicidadRamdon();
            
            $data['main_view'] = 'Categorias/categoria';
            $data['titulo'] = 'CycleMe categorias';
            $data['categoria_deseada'] = $categoria;
            $data['AccesoriosNum'] = $this->categorias('Accesorios');
            $data['BicicletasNum'] = $this->categorias('Bicicletas');
            $data['ComponentesNum'] = $this->categorias('Componentes');
            $data['ServiciosNum'] = $this->categorias('Servicios');

            $this->load->model('Categoria_model');
            $data['anuncios'] = $this->Categoria_model->anunciosCategoriaPrincipal($categoria);

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
            $data['main_view'] = 'vistas_secundarias/eventos';
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
            $this->load->Model('Noticia_model');
            $data['noticias'] = $this->Noticia_model->obtenerNoticias();
            $this->load->view('Layouts/main',$data);
        }



    }


?>