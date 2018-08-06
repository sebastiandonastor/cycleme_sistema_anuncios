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
    public function opcion($donde)
    {
        if($this->session->userdata('idUsuario') == null){
            redirect('Home');
        }

        $data['main_view'] = 'Anuncios/'.$donde;
        $data['titulo'] = 'Crear Anuncios';

        $this->load->view('Layouts/main',$data);
    }



    public function Crear()
    {
        $this->form_validation->set_rules('categoria','Categoria','callback_requerido',array('requerido' => 'Debe seleccionar una Categoria'));

        $categoria = $this->input->post('categoria');
        $subCategoria = $this->input->post('subCategoria');

            $data = array('categoria'=> "{$categoria}", 'subCategoria'=> "{$subCategoria}");
            $this->session->set_flashdata($data);

            $this->opcion('Detalles');

        
    }
        public function Detalles()
        {
            $this->form_validation->set_rules('provincia','Provincia','callback_requerido',array('requerido' => 'Debe seleccionar una Provincia'));
            $this->form_validation->set_rules('telefono','Telefono','callback_requerido',array('requerido' => 'Debe digitar un Celular/Telefono'));
            $this->form_validation->set_rules('accion','accion','callback_requerido',array('requerido' => 'Debe seleccionar una Accíon'));
            $this->form_validation->set_rules('moneda','Moneda','callback_requerido',array('requerido' => 'Debe seleccionar una Moneda'));
            $this->form_validation->set_rules('precio','Precio','callback_requerido',array('requerido' => 'Debe digitar un Precio'));
            $this->form_validation->set_rules('titulo','Titulo','callback_requerido',array('requerido' => 'Debe dscribir un Titulo'));
            $this->form_validation->set_rules('descripcion','Descripcion','callback_requerido|min_length[15]', array('requerido' => 'Debe escribir una Descripcion','min_length' => 'La Descripción debe tener más de 15 caracteres'));
    
            $categoria = $this->input->post('categoria');
            
            if( $categoria == 'Accesorios'){
                $this->form_validation->set_rules('accesorio','Accesorio','callback_requerido',array('requerido' => 'Debe digitar un Accesorio'));
                $this->form_validation->set_rules('marca','Marca','callback_requerido',array('requerido' => 'Debe seleccionar una Marca'));
            }else if( $categoria == 'Bicicletas'){
                $this->form_validation->set_rules('tipo','Tipo','callback_requerido',array('requerido' => 'Debe seleccionar una Tipo'));
                $this->form_validation->set_rules('marca','Marca','callback_requerido',array('requerido' => 'Debe seleccionar una Marca'));
                $this->form_validation->set_rules('tamanoCuadro','Tamaño de Cuadro','callback_requerido',array('requerido' => 'Debe seleccionar un Tamaño de Cuadro'));
                $this->form_validation->set_rules('tamanoAro','Tamaño de Aro','callback_requerido',array('requerido' => 'Debe seleccionar un Tamaño de Aro'));  
            }

                $subCategoria = $this->input->post('subCategoria');
                $provincia = $this->input->post('provincia');
                $telefono = $this->input->post('telefono');
                $accion = $this->input->post('accion');
                $moneda = $this->input->post('moneda');
                $precio = $this->input->post('precio');
                $titulo = $this->input->post('titulo');
                $descripcion = $this->input->post('descripcion');
                
                $accesorio = $this->input->post('accesorio');
                $marca = $this->input->post('marca');
                $telefono = $this->input->post('telefono');
                $tamanoCuadro = $this->input->post('tamanoCuadro');
                $tamanoAro = $this->input->post('tamanoAro');
                $tipo = $this->input->post('tipo');
                $modelo = $this->input->post('modelo');
                $fechaCreacion = date("Y-m-d");
                $fechaCaducidad = date('Y-m-d', strtotime($fechaCreacion. ' + 45 days'));
                $idUsuario_fk = $this->session->userdata('idUsuario');
                $importancia = 0; 
            // C:\Program Files (x86)\Ampps\www\web\ProyectoFinal\cycleme_sistema_anuncios\Assets\img
            if($this->form_validation->run() == FALSE){
                $data = array('categoria'=> "{$categoria}",'provincia'=> "{$provincia}",'telefono'=> "{$telefono}",'accion'=> "{$accion}",
                'moneda'=> "{$moneda}" ,'precio'=> "{$precio}",'titulo'=> "{$titulo}",'descripcion'=> "{$descripcion}",'subCategoria'=> "{$subCategoria}",
                'tipo'=> "{$tipo}",'accesorio'=> "{$accesorio}",'marca'=> "{$marca}",'tamanoCuadro'=> "{$tamanoCuadro}",'modelo'=> "{$modelo}",
                'tamanoAro'=> "{$tamanoAro}");
                $this->session->set_flashdata($data);
                $this->opcion('Detalles');
                return;
               
            }else{
                $data = array('categoria'=> $categoria,'subCategoria'=> "$subCategoria",'provincia'=> $provincia,'telefono'=> $telefono,'accion'=> $accion,
                'precio'=> $precio,'titulo'=> $titulo,'descripcion'=> $descripcion,'tipo'=> $tipo,'accesorio'=> $accesorio,'marca'=> $marca,
                'tamanoCuadro'=> $tamanoCuadro,'modelo'=> $modelo, 'tamanoAro'=> $tamanoAro ,'fechaCreacion'=> $fechaCreacion ,'fechaCaducidad'=> $fechaCaducidad ,
                'idUsuario_fk'=> $idUsuario_fk , 'importancia'=> $importancia ,'moneda'=> $moneda   );

                $this->session->set_tempdata($data,  300);
                //$this->Anuncio_model->create_anuncios($data);




                $this->opcion('Prevista');

              
            }
    }

        public function Prevista(){

            $this->form_validation->set_rules('upload[]','Subir','callback_error_img|callback_error_ext|callback_error_limite',
                array(
                    'error_img' => 'No subiste ninguna imagen',
                    'error_ext' => 'Las imagenes debe de tener una extension png o jpg',
                    'error_limite'=>'No puedes agregar mas de 5 imagenes'));

            $subCategoria = $this->input->post('subCategoria');
            $provincia = $this->input->post('provincia');
            $telefono = $this->input->post('telefono');
            $accion = $this->input->post('accion');
            $moneda = $this->input->post('moneda');
            $precio = $this->input->post('precio');
            $titulo = $this->input->post('titulo');
            $descripcion = $this->input->post('descripcion');
            
            $accesorio = $this->input->post('accesorio');
            $marca = $this->input->post('marca');
            $telefono = $this->input->post('telefono');
            $tamanoCuadro = $this->input->post('tamanoCuadro');
            $tamanoAro = $this->input->post('tamanoAro');
            $tipo = $this->input->post('tipo');
            $modelo = $this->input->post('modelo');
            $fechaCreacion = date("Y-m-d");
            $fechaCaducidad = date('Y-m-d', strtotime($fechaCreacion. ' + 45 days'));
            $idUsuario_fk = $this->session->userdata('idUsuario');
            $importancia = 0;


            if($this->form_validation->run() == false){
            $this->opcion('Prevista');
            return;
            }

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

            $urlImg = '';
            if(count($imagenes) > 1){
                $urlImg = implode(',',$imagenes);
            } else {
                $urlImg = $imagenes[0];
            }

            // fin proceso.

            $data = array('categoria'=> $subCategoria,'provincia'=> $provincia,'telefono'=> $telefono,'accion'=> $accion,
            'precio'=> $moneda.$precio,'titulo'=> $titulo,'descripcion'=> $descripcion,'tipo'=> $tipo,'accesorio'=> $accesorio,'marca'=> $marca,'tamanoCuadro'=> $tamanoCuadro,'modelo'=> $modelo,
            'tamanoAro'=> $tamanoAro ,'fechaCreacion'=> $fechaCreacion ,'fechaCaducidad'=> $fechaCaducidad ,'idUsuario_fk'=> $idUsuario_fk ,
            'importancia'=> $importancia,
            'foto' => $urlImg
            );


            $this->Anuncio_model->create_anuncios($data);

            $this->opcion('Listo');

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
        return $this->Imagenes_model->limiteImg();
    }





}


