<?php

class Imagenes_model extends  CI_Model{

    function hayContenido(){
        $numero_imagenes = sizeof($_FILES['upload']['tmp_name']);

        for($i = 0 ; $i < $numero_imagenes ; $i++) {
            if ($_FILES['upload']['error'][$i] == 4) {
                return false;
            }
        }
        return true;
    }


    function esImagen(){
        $numero_imagenes = sizeof($_FILES['upload']['tmp_name']);

        for($i = 0 ; $i < $numero_imagenes ; $i++) {

            $path = $_FILES['upload']['name'][$i];
            $ext = pathinfo($path, PATHINFO_EXTENSION);

                if($ext != 'jpg' && $ext != 'png'){
                return false;
                }
        }

        return true;
    }

    function limiteImg(){
        $numero_imagenes = sizeof($_FILES['upload']['tmp_name']);
        if($numero_imagenes <= 5){
            return true;
        }
        return false;
    }
}