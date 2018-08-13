<?php

class Admin extends CI_Controller {

    function crearAdm(){
        $data['titulo'] = 'Crear Administrador';
        $data['main_view'] = 'Admin/crearAdmin';
        $this->load->view('Layouts/main',$data);
    }

    function publicidad(){
        $data['titulo'] = 'Publicidad';
        $data['main_view'] = 'Admin/publicidad';
        $this->load->view('Layouts/main',$data);
    }

    function noticias(){
        $data['titulo'] = 'Noticias';
        $data['main_view'] = 'Admin/noticias';
        $this->load->view('Layouts/main',$data);
    }

    function eventos(){
        $data['titulo'] = 'Eventos';
        $data['main_view'] = 'Admin/publicidad';
        $this->load->view('Layouts/main',$data);
    }

    function crearAdmin(){
        $this->load->model('Usuario');
    }

}