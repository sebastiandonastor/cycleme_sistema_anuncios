<?php

class Anuncios extends CI_Controller
{
    public function index()
    {
        if($this->session->userdata('idUsuario') == null){
            redirect('Home');
        }

        $data['main_view'] = 'Anuncios/Crear';
        $data['titulo'] = 'Crear Anuncios';
        $this->load->view('Layouts/main',$data);
    }
    public function Crear()
    {
        

    }


}


?>