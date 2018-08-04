<?php

class Registro extends CI_Controller {

    public function index(){
        if($this->session->userdata('idUsuario')!= null){
            redirect('Home');
        }
        $data['main_view'] = 'Cuentas/Registro';
        $data['titulo'] = 'Registro';
        $this->load->view('Layouts/main',$data);
    }


    public function Validar(){
        $this->load->model('Usuario');

        $this->form_validation->set_rules('email','Email','callback_requerido|callback_esUnico|min_length[5]',array(
                'requerido' => 'El campo email tiene que estar lleno',
                'esUnico'   => 'Este email ya existe',
                'min_length' => '*El campo email tiene que tener más de 4 caracteres*'
            )
        );

        $this->form_validation->set_rules('nombre','Nombre','callback_requerido|min_length[8]',array(
                'requerido' => 'El campo nombre tiene que estar lleno',
                'min_length' => '*El campo nombre tiene que tener más de 7 caracteres*'
            )
        );


        $this->form_validation->set_rules('telefono','Telefono','callback_requerido|min_length[8]|numeric',array(
                'requerido' => 'El campo telefono tiene que estar lleno',
                'min_length' => '*El campo telefono tiene que tener más de 7 caracteres*',
                'numeric' => '*El campo telefono debe de ser numeros*'
            )
        );

        $this->form_validation->set_rules('pass','Password','callback_requerido|min_length[6]',array(
                'requerido' => 'El campo contraseña tiene que estar lleno',
                'min_length' => '*El campo contraseña tiene que tener más de 6 caracteres*'
            )
        );

        $this->form_validation->set_rules('pass-re','Password','callback_requerido|min_length[6]|matches[pass]',array(
                'requerido' => 'El campo confirmacion contraseña tiene que estar lleno',
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
            'tipoUsuario' => 'cliente',
            'fechaCreacion' => date('m.d.y'),
            'contrasena' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
            'nombre' => $this->input->post('nombre'),
            'telefono' => $this->input->post('telefono')
        );

        $datosUsr = $this->Usuario->crearUsuario($datos);
        $this->session->set_userdata($datosUsr[0]);
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


}