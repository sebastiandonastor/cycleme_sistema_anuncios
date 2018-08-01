<?php

class Usuario extends CI_Model {


    public function existeUsuario($usuarioLogin){
        $this->db->where('e-mail',$usuarioLogin['email']);
        $this->db->where('contrasena',$usuarioLogin['password']);
        $this->db->get('usuario');

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function existeMail($email){
        $this->db->where('e-mail',$email);
        $this->db->get('usuario');

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function usrPorEmail($email){
        $this->db->where('e-mail',$email);
        $result = $this->db->get('usuario')->result_array();
        return $result;
    }




}