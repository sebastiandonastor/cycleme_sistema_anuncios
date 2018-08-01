<?php

class Cuentas extends CI_Controller{

    public function index(){
        $data['main_view'] = 'Cuentas/Login';
        $data['titulo'] = 'Inicio Sesion';
        $this->load->view('Layouts/main',$data);
    }

    public function Validar(){

        //Definiendo el modelo.
        $this->load->model('Usuario');


                                            // INICIO REGLAS.

        $this->form_validation->set_rules('email','Email','callback_requerido|callback_user_check|min_length[5]',array(
            'requerido' => '*El campo email tiene que estar lleno*'
        ));

        $this->form_validation->set_message('user_check', 'Cuenta erronea');


        $this->form_validation->set_rules('pass','Passowrd','callback_requerido|min_length[5]',array(
            'requerido' => '*El campo contraseña tiene que estar lleno*',
            'min_length' => 'El campo contraseña tiene que tener más de 4 caracteres'
        ));
                                         // FIN REGLAS.



        $usr = array(
            'email' => ($this->input->post('email') != null) ? $this->input->post('email') != null : '',
            'password' => ($this->input->post('pass') !=null) ? $this->input->post('pass') != null : ''
        );

        //Esto se ejecutara si cualquiera de las reglas falla y el usuario ta incorrecto
        if($this->form_validation->run() == FALSE && !($this->Usuario->existeUsuario($usr))){
            $this->index();
            return;
        }


        //esto se ejecutara si el usr es correcto pero la pass no lo es.
        if($this->passInvalid()){
            $this->session->set_flashdata('contraseña', '*contraseña incorrecta*');
            $this->index();
            return;
        }


        // Si el usr es exitoso :D, Utilizaria el arreglo usr de arriba sin embargo, por una rara razon cuando los validare aqui se ponen nulos.
        if($this->Usuario->existeUsuario(array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('pass')
            ))){

            redirect('Home/index');
        }
    }


    // el require se puso rebede asi que tuve que hacer mi propia funcion.
    function requerido($value){
        if($value != ''){
            return true;
        } else {
            return false;
        }
    }

     function user_check($value)
    {

        if($this->Usuario->existeMail($value)){
            return true;
        } else {
            return false;
        }
    }

    // la validacion de cuando el usr existe pero la pass es incorrecta se puso rebelde asi que le hice una funcion
    function passInvalid(){
        if($this->input->post('email') !=null && $this->input->post('pass') != null){

            $usr = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('pass')
            );

            if(!($this->Usuario->existeMail($usr['email']))){
                return false;
            }

            return !($this->Usuario->existeUsuario($usr));
        }
        return false;
    }






}