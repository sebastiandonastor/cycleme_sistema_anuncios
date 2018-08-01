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
    }


?>