<?php

    class Home extends CI_Controller
    {
        public function index()
        {
            $data['main_view'] = 'home_view';
            $data['titulo'] = 'CycleMe';
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }

        public function eventos(){
            $data['main_view'] = 'vistas_secundarias/eventos';
            $data['titulo'] = 'CycleMe eventos';
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }

        public function nosotros(){
            $data['main_view'] = 'vistas_secundarias/nosotros';
            $data['titulo'] = 'CycleMe nosotros';
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }

        public function noticias(){
            $data['main_view'] = 'vistas_secundarias/noticias';
            $data['titulo'] = 'CycleMe noticias';
            $this->load->model('Usuario');
            $this->load->view('Layouts/main',$data);
        }



    }


?>