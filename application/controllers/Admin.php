<?php

class Admin extends CI_Controller {

    function crearAdm(){
        $data['titulo'] = 'Crear Administrador';
        $data['main_view'] = 'Admin/crearAdmin';
        $this->load->model('Usuario');
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

    function validarNoticia(){
        if($this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }
        $this->form_validation->set_rules('editor1','editor1','callback_existeEncabezado|callback_existeParrafo',array(
            'existeEncabezado' => 'No tienes ningun titulo',
            'existeParrafo' => 'No tienes ningun parrafo'
        ));

        if($this->form_validation->run() == FALSE){
            $this->noticias();
            return;
        }
        $this->session->set_tempdata('datos',$this->input->post(),1000);
        redirect('Admin/Prevista');
    }

    function Prevista(){
        if($this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }

        if($this->session->tempdata('datos') == null) {
            redirect('Admin/crearAdm');
        }
        $data['titulo'] = 'Prevista';
        $data['main_view'] = 'Admin/Prevista';
        $this->load->view('Layouts/main',$data);
    }

    function Exito(){
        if($this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }

        $this->form_validation->set_rules('editor1','editor','callback_error_img|callback_error_ext',array
        (   'error_img' => 'Tienes que Subir una imagen',
            'error_ext' => 'Solo png o jpg'
        ));

        if($this->form_validation->run() == false){
            $this->Prevista();
            return;
        }

        $contenido = $this->input->post('editor1');


        $archivos = $_FILES['upload'];
        $numero_imagenes = sizeof($_FILES['upload']['tmp_name']);
        $config['upload_path'] = FCPATH. 'noticias_img/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = false;
        $imagenes = array();
        for($i = 0 ; $i < 1 ; $i++){
            $_FILES['upload']['name'] = $archivos['name'][$i];
            $_FILES['upload']['type'] = $archivos['type'][$i];
            $_FILES['upload']['tmp_name'] = $archivos['tmp_name'][$i];
            $_FILES['upload']['error'] = $archivos['error'][$i];
            $_FILES['upload']['size'] = $archivos['size'][$i];
            $this->upload->initialize($config);

            if($this->upload->do_upload('upload')){
                $this->upload->data();
                array_push($imagenes,$archivos['name'][$i]);
            }
        }

        $urlImg = '';
        if(count($imagenes) > 1){
            $urlImg = implode(',',$imagenes);
        } else {
            $urlImg = $imagenes[0];
        }


        $noticia = array('contenido' => $contenido, 'imagen' => $urlImg);
        $this->load->model('Admin_model');
        $this->Admin_model->crearNoticia($noticia);
        redirect('Home/noticias');

    }


    function existeEncabezado($value){
        if(strpos($value,'h1') !== false){
            return true;
        } else {
            return false;
        }
    }

    function existeParrafo($value)
    {
        if (strpos($value, 'p') !== false) {
            return true;
        } else {
            return false;
        }


    }

    function error_img($value){
        $this->load->model('Imagenes_model');
        return $this->Imagenes_model->hayContenido();
    }

    function error_ext($value){
        $this->load->model('Imagenes_model');
        return $this->Imagenes_model->esImagen();
    }


}