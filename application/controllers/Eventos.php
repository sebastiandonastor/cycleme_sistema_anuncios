<?php

class Eventos extends CI_Controller
{

    public function index()
    {

        if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }
        
        $data['main_view'] = 'Admin/Eventos';
        
        $this->load->model('Eventos_model');
        $data['eventos'] = $this->Eventos_model->get_eventoAll();

        $this->load->view('Layouts/main',$data);

    }

    public function Accion()
    {
        if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }
        $data['main_view'] = 'Admin/EventosCU';
        $this->load->view('Layouts/main',$data);
    }


 
        public function CrearOEditar()
    {
        $this->form_validation->set_rules('nombreEven','Nombre','callback_requerido|max_length[40]',array('requerido' => 'Debe ingresar un Titulo',
        'max_length' => 'El Nombre debe tener un maximo de 40 caracteres'));
        $this->form_validation->set_rules('fechaEvento','Fecha de Evento','callback_requerido',array('requerido' => 'Debe ingresar una Fecha'));
        $this->form_validation->set_rules('lugar','Lugar','callback_requerido',array('requerido' => 'Debe ingresar un Lugar'));
        $this->form_validation->set_rules('lat','Latencia','callback_requerido',array('requerido' => 'Debe ingresar la Latencia'));
        $this->form_validation->set_rules('lng','Longitud','callback_requerido',array('requerido' => 'Debe ingresar la Longitud'));
        $this->form_validation->set_rules('hora','Hora','callback_requerido',array('requerido' => 'Debe ingresar una Hora'));
        $this->form_validation->set_rules('href','Enlace','callback_requerido',array('requerido' => 'Debe ingresar un Enlace'));
        $this->form_validation->set_rules('tipo','Tipo','callback_requerido',array('requerido' => 'Debe seleccionar un Tipo'));
        $this->form_validation->set_rules('descripcion','Descripcion','callback_requerido|min_length[15]|max_length[300]', 
        array('requerido' => 'Debe escribir una Descripcion','min_length' => 'La Descripción debe tener más de 15 caracteres',
        'max_length' => 'La Descripción debe tener un maximo 300 de caracteres'));

        $idEventos = $this->input->post('idEventos');

        if($idEventos < 1){
            $this->form_validation->set_rules('upload[]','Subir','callback_error_img|callback_error_ext|callback_error_limite',
            array(
                'error_img' => 'No subiste ninguna imagen',
                'error_ext' => 'Las imagen debe de tener una extension png o jpg',
                'error_limite'=>'No puedes agregar mas de 1 imagen')); 
        }
        
            $fechaEvento = $this->input->post('fechaEvento');
            $nombreEven = $this->input->post('nombreEven');
            $lugar = $this->input->post('lugar');
            $lat = $this->input->post('lat');
            $hora = $this->input->post('hora');
            $lng = $this->input->post('lng');
            $tipo = $this->input->post('tipo');
            $href = $this->input->post('href');
            $descripcion = $this->input->post('descripcion');

            $this->load->model('Eventos_model');

            if($this->form_validation->run() == FALSE){

                $data = array('idEventos'=> $idEventos,'fechaEvento'=> $fechaEvento,'nombreEven'=> $nombreEven ,'lugar'=> $lugar,'href'=> $href 
                ,'lng'=> $lng,'tipo'=> $tipo ,'hora'=> $hora,'descripcion'=> $descripcion,'lat'=> $lat );
                $this->session->set_flashdata($data);
                $this->Accion();

            }else{

                if($_FILES['upload']['size'] > 0){
                    
                    $archivos = $_FILES['upload'];
                    $numero_imagenes = sizeof($_FILES['upload']['tmp_name']);
                    $config['upload_path'] = FCPATH. 'temp_img/';
                    $config['allowed_types'] = 'jpg|png';
                    $config['overwrite'] = false;
                    $imagenes = array();
                    for($i = 0 ; $i < $numero_imagenes ; $i++){
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
                    if(count($imagenes) > 1){
                        $urlImg = implode(',',$imagenes);
                    } else if(count($imagenes) == 1){ {
                        $urlImg = $imagenes[0];
                    }
                }
            }
                if($idEventos < 1)
                {
                    $data = array('idEventos'=> $idEventos,'fechaEvento'=> $fechaEvento,'nombreEven'=> $nombreEven ,'lugar'=> $lugar,'href'=> $href 
                    ,'lng'=> $lng,'tipo'=> $tipo ,'hora'=> $hora,'descripcion'=> $descripcion,'lat'=> $lat ,'imagen'=>  $urlImg  );
                    $this->Eventos_model->create_evento($data);
                    $this->index();
                }else{
                    if($_FILES['upload']['size'] < 1)
                    {
                        $data = array('idEventos'=> $idEventos,'fechaEvento'=> $fechaEvento,'nombreEven'=> $nombreEven ,'lugar'=> $lugar,'href'=> $href 
                        ,'lng'=> $lng,'tipo'=> $tipo ,'hora'=> $hora,'descripcion'=> $descripcion,'lat'=> $lat  );
                        $this->Eventos_model->update_evento($idEventos,$data);
                        $this->index();
                    }else{
                        $data = array('idEventos'=> $idEventos,'fechaEvento'=> $fechaEvento,'nombreEven'=> $nombreEven ,'lugar'=> $lugar,'href'=> $href 
                        ,'lng'=> $lng,'tipo'=> $tipo ,'hora'=> $hora,'descripcion'=> $descripcion,'lat'=> $lat ,'imagen'=>  $urlImg  );
                        $this->Eventos_model->update_evento($idEventos,$data);
                        $this->index();
                    }
                }
            } 
        }


        function editar($id){
            $this->load->model('Eventos_model');
            $datos = $this->Eventos_model->get_evento($id);
            $data = array('idEventos'=> $datos->idEventos,'fechaEvento'=> $datos->fechaEvento,'nombreEven'=> $datos->nombreEven 
            ,'lugar'=> $datos->lugar,'href'=> $datos->href,'lng'=> $datos->lng,'tipo'=> $datos->tipo ,'hora'=> $datos->hora
            ,'descripcion'=> $datos->descripcion,'lat'=> $datos->lat ,'imagen'=>  $datos->imagen  );
            $this->session->set_flashdata($data);
            $this->Accion();
        }

    function requerido($value){
        if($value != ''){
            return true;
        }
        return false;
    }

    function error_img($value){
       $this->load->model('Imagenes_model');
       return $this->Imagenes_model->hayContenido();
    }

    function error_ext($value){
        $this->load->model('Imagenes_model');
        return $this->Imagenes_model->esImagen();
    }

    function error_limite($value){
        $this->load->model('Imagenes_model');
        return $this->Imagenes_model->limiteImgUna();
    }

    function Eliminar($id){
        $this->load->model('Eventos_model');
        $this->Eventos_model->delete_evento($id);
        $this->index();
    }

}


