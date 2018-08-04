<?php if($this->session->userdata('idUsuario') == null  ){
            redirect('Home');
        }  ?>
<div  class="crear-div ">
<h4>Crear Anuncio</h4>
    <div class="text-black disabled">
        <ul class="nav nav-tabs justify-content-center" >
            <li class="nav-item" >
                <a id="1" class="nav-link"  data-toggle="tab" href="#categoria">Selecione Categoria</a>
                <div class="iconoSi" id="1"  ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="2" class="nav-link " data-toggle="tab" href="#detallesDeAnuncio" >Detalles de Anuncio</a>
                <div  class="iconoSi" id="2"  ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="3" class="nav-link " data-toggle="tab" href="#profile">Vista Previa</a>
                <div  class="iconoSi" id="3"  ><i class="far fa-check-circle"></i></div>
            </li>
            <!-- <li class="nav-item">
                <a id="4" class="nav-link"  data-toggle="tab" href="#">Opciones/Mejora</a>
                <div   class="icono" id="4" ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="4"style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li> -->
            <li class="nav-item">
                <a id="5" class="nav-link active show" data-toggle="tab" href="#">Listo!</a>
                <div  class="iconoSi" id="5"  ><i class="far fa-check-circle"></i></div>
            </li>
        </ul>
    </div>

    <div   class=" crear-div2 mx-auto" >
        <h6>Su anuncio ha sido Creado, puede verificarlo y editarlo en su perfil.</h6>
        <a href="<?php echo base_url() ?>"  class="btn btn-success"  >Gracias!</a>
    </div>

</div>

<script>


    
</script>