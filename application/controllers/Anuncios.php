<?php

class Anuncios extends CI_Controller
{
    public function index($id = 1)
    {
        if($this->session->userdata('idUsuario') == null){
            redirect('Home');
        }
        if(!is_numeric($id)){
            redirect('Anuncios');
        }
     

        //Esta parte la puse porque no supe como hacer funcionar el boton categorias de otra forma, si encuentras otra eres libre de borrarlo entonces
        $data['AccesoriosNum'] = $this->categorias('Accesorios');
        $data['BicicletasNum'] = $this->categorias('Bicicletas');
        $data['ComponentesNum'] = $this->categorias('Componentes');
        $data['ServiciosNum'] = $this->categorias('Servicios');
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $pagina = $id;
        $postPorPagina = 10;
        $inicio = ($pagina > 1) ? ($postPorPagina * $pagina - $postPorPagina) : 0;
        $data['AnunciosUser'] = $this->Anuncio_model->getAnunciosPorPaginaUser($postPorPagina,$inicio);
        $data['cantidadAnunciosUser'] = ceil($this->Anuncio_model->getAnunciosVisiUser() / $postPorPagina);

        $data['pagina'] = $id;

        $data['main_view'] = 'Anuncios/Administrar';
        $this->load->view('Layouts/main',$data);

    }

    public function opcion($donde)
    {
        if($this->session->userdata('idUsuario') == null){
            redirect('Home');
        }

        $data['main_view'] = 'Anuncios/'.$donde;
        $data['titulo'] = 'Crear Anuncios';
        
        //Esta parte la puse porque no supe como hacer funcionar el boton categorias de otra forma, si encuentras otra eres libre de borrarlo entonces
        $data['AccesoriosNum'] = $this->categorias('Accesorios');
        $data['BicicletasNum'] = $this->categorias('Bicicletas');
        $data['ComponentesNum'] = $this->categorias('Componentes');
        $data['ServiciosNum'] = $this->categorias('Servicios');
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
            $idCategorias_fk = $this->input->post('subCategoria');

            $importancia = 0;
            $estado = 1;


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

            $data = array('provincia'=> $provincia,'telefono'=> $telefono,'accion'=> $accion,
            'precio'=> $moneda.$precio,'titulo'=> $titulo,'descripcion'=> $descripcion,'tipo'=> $tipo,'accesorio'=> $accesorio,'marca'=> $marca,'tamanoCuadro'=> $tamanoCuadro,'modelo'=> $modelo,
            'tamanoAro'=> $tamanoAro ,'fechaCreacion'=> $fechaCreacion ,'fechaCaducidad'=> $fechaCaducidad ,'idUsuario_fk'=> $idUsuario_fk ,
            'importancia'=> $importancia,'estado'=> $estado,'foto' => $urlImg,'idCategorias_fk'=> $idCategorias_fk,
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

    function Eliminar($id){
        $estado = $this->Anuncio_model->delete_anuncios($id);

        if($estado > 0){
            $data = array('exito'=> "Anuncio Eliminado");
            $this->session->set_flashdata($data);
            $this->index();
        }else{
            $data = array('error'=> "Anuncio No Encontrado");
            $this->session->set_flashdata($data);
            $this->index();
        }
    }

    function Estado($id){
        $estado = $this->Anuncio_model->estado_anuncios($id);
        $this->index();
    }



    function Editar($id){

        $data = $this->Anuncio_model->get_anuncios($id);

        $idCategorias_fk =  $data->idCategorias_fk;

        $data2 = $this->Anuncio_model->GetsubCategorias($idCategorias_fk);
        
        $categoria = $data2->categoriaPrincipal;

        $idUsuario_fk = $data->idUsuario_fk;
        $idAnuncio = $data->idAnuncio;

        $provincia = $data->provincia;
        $telefono = $data->telefono;
        $accion = $data->accion;

        $dinero = explode('$', $data->precio);
        $precio = trim($dinero[1]);
        $moneda = $dinero[0].'$';

        $titulo = $data->titulo;
        $descripcion = $data->descripcion;
        $accesorio = $data->accesorio;
        $marca = $data->marca;

        $tamanoCuadro = $data->tamanoCuadro;
        $tamanoAro = $data->tamanoAro;
        $tipo = $data->tipo;
        $modelo = $data->modelo;

        $foto  = explode(',',  $data->foto);
        $imagenes  =  $data->foto;


        $data = array( 'idCategorias_fk'=>  $idCategorias_fk, 'categoria'=> $categoria  ,'provincia'=> $provincia,
        'telefono'=> $telefono,'accion'=> $accion,'precio'=> $precio,'moneda'=> $moneda, 'titulo'=> $titulo, 'idUsuario_fk'=> $idUsuario_fk ,
        'descripcion'=> $descripcion,'tipo'=> $tipo,'accesorio'=> $accesorio,'marca'=> $marca, 'tamanoCuadro'=> $tamanoCuadro,
        'modelo'=> $modelo, 'tamanoAro'=> $tamanoAro ,'idAnuncio' => $idAnuncio,'foto' => $foto ,'imagenes' => $imagenes );

        $this->session->set_tempdata($data, 300);

        $this->opcion('Editar');
    }
	
    function Save($idAnuncio){

        $this->form_validation->set_rules('provincia','Provincia','callback_requerido',array('requerido' => 'Debe seleccionar una Provincia'));
        $this->form_validation->set_rules('telefono','Telefono','callback_requerido',array('requerido' => 'Debe digitar un Celular/Telefono'));
        $this->form_validation->set_rules('accion','accion','callback_requerido',array('requerido' => 'Debe seleccionar una Accíon'));
        $this->form_validation->set_rules('moneda','Moneda','callback_requerido',array('requerido' => 'Debe seleccionar una Moneda'));
        $this->form_validation->set_rules('precio','Precio','callback_requerido',array('requerido' => 'Debe digitar un Precio'));
        $this->form_validation->set_rules('titulo','Titulo','callback_requerido',array('requerido' => 'Debe dscribir un Titulo'));
        $this->form_validation->set_rules('descripcion','Descripcion','callback_requerido|min_length[15]',
         array('requerido' => 'Debe escribir una Descripcion','min_length' => 'La Descripción debe tener más de 15 caracteres'));

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
            $idCategorias_fk = $this->input->post('idCategorias_fk');

            $data2 = $this->Anuncio_model->GetsubCategorias($idCategorias_fk);
            $categoria = $data2->categoriaPrincipal;
    
            $data = $this->Anuncio_model->get_anuncios($idAnuncio);
            $foto  = explode(',',  $data->foto);
            $imagenes  =  $data->foto;
           

            if ($_FILES['upload']['size'] > 0 ){

                $this->form_validation->set_rules('upload[]','Subir','callback_error_limite',
                array(
                    'error_limite'=>'No puedes agregar mas de 5 imagenes'));
                    
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
                } else if(count($imagenes) == 1){ {
                    $urlImg = $imagenes[0];
                }
              }
            }
         
        if($this->form_validation->run() == FALSE){
            $data = array( 'idCategorias_fk'=> "{$idCategorias_fk}" , 'categoria'=> "{$categoria}",'provincia'=> "{$provincia}",'telefono'=> "{$telefono}",'accion'=> "{$accion}",
            'moneda'=> "{$moneda}" ,'precio'=> "{$precio}",'titulo'=> "{$titulo}",'descripcion'=> "{$descripcion}",
            'tipo'=> "{$tipo}",'accesorio'=> "{$accesorio}",'marca'=> "{$marca}",'tamanoCuadro'=> "{$tamanoCuadro}",'modelo'=> "{$modelo}",
            'tamanoAro'=> "{$tamanoAro}", 'imagenes'=>  $foto ,'idAnuncio' => $idAnuncio );
            $this->session->set_tempdata($data, 300);
            $this->opcion('Editar');
            return;
        }else{
            if($urlImg  == null){
            $data = array('provincia'=> $provincia,'telefono'=> $telefono,'accion'=> $accion,
            'precio'=> $moneda.$precio,'titulo'=> $titulo,'descripcion'=> $descripcion,'tipo'=> $tipo,'accesorio'=> $accesorio,
            'marca'=> $marca,'tamanoCuadro'=> $tamanoCuadro,'modelo'=> $modelo, 'tamanoAro'=> $tamanoAro );
            }else{
                $data = array('provincia'=> $provincia,'telefono'=> $telefono,'accion'=> $accion,
                'precio'=> $moneda.$precio,'titulo'=> $titulo,'descripcion'=> $descripcion,'tipo'=> $tipo,'accesorio'=> $accesorio,
                'marca'=> $marca,'tamanoCuadro'=> $tamanoCuadro,'modelo'=> $modelo, 'tamanoAro'=> $tamanoAro, 'foto'=>  $urlImg  );
            }
        


            $this->Anuncio_model->update_anuncios( $idAnuncio ,$data );

            $this->index();
            
        }
	}

    //Esta parte la puse porque no supe como hacer funcionar el boton categorias de otra forma, si encuentras otra eres libre de borrarlo entonces
    public function categorias($categoria){
        $result = $this->db->query("SELECT * FROM anuncios INNER JOIN categorias ON anuncios.idCategorias_fk = categorias.idCategoria WHERE categorias.categoriaPrincipal='".$categoria."'"); 
        return $result->num_rows();
    }

    public function pag_categorias(){
        $data['main_view'] = 'Categorias/Todas_categorias';
        $data['titulo'] = 'CycleMe categorias';
        $data['AccesoriosNum'] = $this->categorias('Accesorios');
        $data['BicicletasNum'] = $this->categorias('Bicicletas');
        $data['ComponentesNum'] = $this->categorias('Componentes');
        $data['ServiciosNum'] = $this->categorias('Servicios');
        $this->load->model('Categoria_model');
        $this->load->view('Layouts/main',$data);
    }

    public function categorias_principales($categoria){
        $data['main_view'] = 'Categorias/categoria';
        $data['titulo'] = 'CycleMe categorias';
        $data['categoria_deseada'] = $categoria;
        $data['AccesoriosNum'] = $this->categorias('Accesorios');
        $data['BicicletasNum'] = $this->categorias('Bicicletas');
        $data['ComponentesNum'] = $this->categorias('Componentes');
        $data['ServiciosNum'] = $this->categorias('Servicios');
        $this->load->model('Categoria_model');
        $this->load->view('Layouts/main', $data);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






}


