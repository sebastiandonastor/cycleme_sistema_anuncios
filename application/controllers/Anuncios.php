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

        $this->form_validation->set_rules('provincia','Provincia','callback_requerido'
        ,array('requerido' => 'Debe seleccionar una provincia'));

        if($this->form_validation->run() == FALSE ){
            $this->index();
            return;
        }
    }


}


?>