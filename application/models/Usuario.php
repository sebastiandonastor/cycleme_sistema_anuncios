<?php

class Usuario extends CI_Model {


    public function crearUsuario($usuarioCrear){
        $this->db->insert('usuario',$usuarioCrear);
        return $this->usrPorEmail($usuarioCrear['e-mail']);
    }

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

    public function comprobarPass($usr){
        $resultado = $this->usrPorEmail($usr['email']);
        $usrDB = $resultado[0];
        return password_verify($usr['password'],$usrDB['contrasena']);
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

    public function getUser($id){
        $this->db->where('idUsuario',$id);
        $result = $this->db->get('usuario');
        return $result->row(0);
    }

    public function crearAdmin($info){
        $result = $this->db->insert('usuario', $info);
        return $this->usrPorEmail($info['e-mail']);
    }
}