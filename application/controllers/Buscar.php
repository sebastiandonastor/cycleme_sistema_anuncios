<?php

class Buscar extends CI_Controller {

    function index(){

        $this->load->model('Anuncio_model');
        $this->load->model('Categoria_model');
        $buscar = $this->input->get('Buscar');
        $categoria = $this->input->get('categoria');

        $seccion = '';
        $resultado = 0;
        $anuncios = array();
        if($buscar == '' && $categoria == 'todos' || $categoria == ''){
            $seccion= '*';
            $anuncios = $this->Anuncio_model->getAnunciosVisibles();
            $resultado = count($anuncios);
        } else if($buscar == '' && $categoria != ''){
            $seccion = '*';
            $anuncios = $this->Anuncio_model->getAnunciosPorCategoriaPrin($categoria);
            $resultado = count($anuncios);
        } else if($buscar != '' && $categoria != ''){
            $seccion = $buscar;
            $anuncios = $this->Anuncio_model->getAnunciosLike($buscar,$categoria);
            $resultado = count($anuncios);
        }

        $data['main_view'] = 'Anuncios/Plantilla_buscar';
        $data['titulo'] = 'Buscar';
        $data['seccion'] = $seccion;
        $data['numResultados'] = $resultado;
        $data['Anuncios'] = $anuncios;
        $data['texto'] = $buscar;
        $data['Accesorios'] = $this->Categoria_model->getSubCategoria('Accesorios');
        $data['Bicicletas'] = $this->Categoria_model->getSubCategoria('Bicicletas');
        $data['Componentes'] = $this->Categoria_model->getSubCategoria('Componentes');
        $data['Servicios'] = $this->Categoria_model->getSubCategoria('Servicios');
        $data['optCategoria'] = $categoria;
        $this->load->view('Layouts/main',$data);
    }

}

?>