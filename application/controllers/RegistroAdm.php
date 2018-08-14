<?php

class RegistroAdm extends CI_Controller {

    public function index(){

        $data['main_view'] = 'Admin/crearAdmin';
        $data['titulo'] = 'Registro';

        //Esta parte la puse porque no supe como hacer funcionar el boton categorias de otra forma, si encuentras otra eres libre de borrarlo entonces
        $data['AccesoriosNum'] = $this->categorias('Accesorios');
        $data['BicicletasNum'] = $this->categorias('Bicicletas');
        $data['ComponentesNum'] = $this->categorias('Componentes');
        $data['ServiciosNum'] = $this->categorias('Servicios');
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        

        $this->load->view('Layouts/main',$data);
    }

    public function ValidarAdm(){
        $this->load->model('Usuario');
        
        $this->form_validation->set_rules('email','Email','callback_requerido|callback_esUnico|min_length[5]',array(
                'requerido' => 'El campo email es requerido',
                'esUnico'   => 'Este email ya existe',
                'min_length' => '*El campo email tiene que tener más de 4 caracteres*'
            )
        );

        $this->form_validation->set_rules('nombre','Nombre','callback_requerido|callback_userEsUnico|min_length[8]',array(
                'requerido' => 'El campo nombre es requerido',
                'userEsUnico' => 'El apodo ya existe',
                'min_length' => '*El campo nombre tiene que tener más de 7 caracteres*'
            )
        );


        $this->form_validation->set_rules('telefono','Telefono','callback_requerido|min_length[8]|numeric',array(
                'requerido' => 'El campo telefono es requerido',
                'min_length' => '*El campo telefono tiene que tener más de 7 caracteres*',
                'numeric' => '*El campo telefono debe de ser numeros*'
            )
        );

        $this->form_validation->set_rules('pass','Password','callback_requerido|min_length[6]',array(
                'requerido' => 'El campo contraseña es requerido',
                'min_length' => '*El campo contraseña tiene que tener más de 6 caracteres*'
            )
        );

        $this->form_validation->set_rules('pass-re','Password','callback_requerido|min_length[6]|matches[pass]',array(
                'requerido' => 'El campo confirmacion contraseña es requerido',
                'min_length' => '*El campo confirmacion contraseña tiene que tener más de 6 caracteres*',
                'matches' => 'Las contraseñas no son las mismas'
            )
        );


        if($this->form_validation->run() == false){
            $this->index();
            return;
        }

        $datos = array(
            'e-mail' => $this->input->post('email'),
            'tipoUsuario' => 'admin',
            'fechaCreacionUsr' => date('Y-m-d H:i:s'),
            'contrasena' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
            'nombre' => $this->input->post('nombre'),
            'telefono' => $this->input->post('telefono')
        );

        $datosUsr = $this->Usuario->crearAdmin($datos);
        redirect('Home/index');




    }


    function requerido($value){
        if($value != ''){
            return true;
        } else {
            return false;
        }
    }

    function esUnico($valor){
        return !($this->Usuario->existeMail($valor));
    }

    function userEsUnico($valor){
        return !($this->Usuario->existeUser($valor));
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