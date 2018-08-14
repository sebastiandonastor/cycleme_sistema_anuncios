<?php

class Publicidad extends CI_Controller
{

    public function index($id = 1)
    {

        if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }
        if(!is_numeric($id)){
            redirect('Publicidad');
        }
        $data['main_view'] = 'Admin/Publicidad';
        
        $this->load->model('Publicidad_model');

        $pagina = $id;
        $postPorPagina = 10;
        $inicio = ($pagina > 1) ? ($postPorPagina * $pagina - $postPorPagina) : 0;
        $data['publicidades'] = $this->Publicidad_model->getPublicidadPorPagina($postPorPagina,$inicio);
        $data['cantidadPublicidad'] = ceil($this->Publicidad_model->getPublicidad() / $postPorPagina);
        $data['pagina'] = $id;

        $this->load->view('Layouts/main',$data);

    }

    public function Accion()
    {
        if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }
        $data['main_view'] = 'Admin/PublicidadCU';
        $this->load->view('Layouts/main',$data);
    }


 
        public function CrearOEditar()
    {
        $this->form_validation->set_rules('titulo','Titulo','callback_requerido|max_length[40]',array('requerido' => 'Debe ingresar un Titulo',
        'max_length' => 'El Titulo debe tener un maximo de 40 caracteres'));
        $this->form_validation->set_rules('href','Enlace de Publicidad','callback_requerido',array('requerido' => 'Debe ingresar un Enlace'));
            
        $idPublicidad = $this->input->post('idPublicidad');

        if($idPublicidad < 1){
            $this->form_validation->set_rules('upload[]','Subir','callback_error_img|callback_error_ext|callback_error_limite',
            array(
                'error_img' => 'No subiste ninguna imagen',
                'error_ext' => 'Las imagen debe de tener una extension png o jpg',
                'error_limite'=>'No puedes agregar mas de 1 imagen')); 
        }
        
            $titulo = $this->input->post('titulo');
            $href = $this->input->post('href');
           
            $this->load->model('Publicidad_model');

            if($this->form_validation->run() == FALSE){
                $data = array('idPublicidad'=> "{$idPublicidad}",'titulo'=> "{$titulo}",'href'=> "{$href}");
                $this->session->set_flashdata($data);
                $this->Accion();
            }else{

                if($_FILES['upload']['size'] > 0){
                    
                    $archivos = $_FILES['upload'];
                    $numero_imagenes = sizeof($_FILES['upload']['tmp_name']);
                    $config['upload_path'] = FCPATH. 'publicidad/';
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
                if($idPublicidad < 1)
                {
                    $data = array('titulo'=> "{$titulo}",'href'=> "{$href}",'img'=>  $urlImg  );
                    $this->Publicidad_model->create_publicidad($data);
                    $this->index();
                }else{
                    if($_FILES['upload']['size'] < 1)
                    {
                        $data = array('titulo'=> "{$titulo}",'href'=> "{$href}"  );
                        $this->Publicidad_model->update_publicidad($idPublicidad,$data);
                        $this->index();
                    }else{
                        $data = array('titulo'=> "{$titulo}",'href'=> "{$href}" ,'img'=>  $urlImg );
                        $this->Publicidad_model->update_publicidad($idPublicidad,$data);
                        $this->index();
                    }
                }
                   
                
                  

            } 
        }


        function editar($id){
            $this->load->model('Publicidad_model');
            $datos = $this->Publicidad_model->get_publicidad($id);
            $data = array('idPublicidad'=> $datos->idPublicidad ,'titulo'=>$datos->titulo ,'href'=> $datos->href ,'img'=> $datos->img );
            $this->session->set_flashdata($data);
            $this->db->close();
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
        $this->load->model('Publicidad_model');
        $this->Publicidad_model->delete_publicidad($id);
        $this->index();
    }

}


