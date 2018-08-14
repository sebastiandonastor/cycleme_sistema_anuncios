<?php if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }  ?>

<div class="row d-flex justify-content-center" >
    <div class="col-sm bg-light" id="misAnuncios" >
    <h4>Publicidad General</h4>
    <p>En esta pantalla podra administrar la publicidad de la pagina, solo siga las intrucciones de la accion que desea realizar.</p>

    <?php setlocale(LC_ALL, 'es_ES'); ?>
    <?php if($publicidades){ ?>
        <?php  foreach($publicidades as $publicidad){ ?>
        <div class="col-sm divPerfectoAnuncios" > 
                    <div class="row">
                        <div class="col-sm col-lg-3 text-center"  >
                                <img width="120" height="120" class="rounded" src="/cycleme_sistema_anuncios/publicidad/<?php echo $publicidad['imagen'];?>" >
                        </div>
            
                        <div class="col-sm  col-lg-6 anunciosDetalles tituloAnuncio"  >
                            <div class="row">
                                    <h6 class="limitartitulo"> <?php echo $publicidad['titulo']; ?> </h6>
                            </div>
                            <div class="row contenidoAnuncio">
                                <font size="-1">
                                    <p class="limitarDescrip">
                                        <?php echo $publicidad['href'] ?>
                                    </p>
                                </font>
                            </div>
                            
                        </div>
                        <div class="col-sm col-lg-2 text-center"  >
                            <a href="<?php echo base_url('Publicidad/Editar/'.$publicidad['idPublicidad']); ?>" 
                                    class="icon-sizePublici btn btn-sm text-warning" data-toggle="tooltip" data-placement="bottom" 
                                    title="Editar Publicidad"><i class="fas fa-pencil-alt "></i>
                                    </a>
                           
                                    <a href="<?php echo base_url(); ?>Publicidad/Eliminar/<?php echo $publicidad['idPublicidad'] ?>" 
                                    onclick="return confirm('Seguro que desea realizar esta acción?');" class="icon-sizePublici btn btn-sm text-danger" 
                                    data-toggle="tooltip" data-placement="bottom" title="Eliminar Publicidad"><i class="fas fa-trash-alt"></i>
                                    </a>
                            </div>
                        
                    </div>
                </div>
        <?php } ?>

                       
 

        <div class="mx-auto">
        <nav aria-label="...">
            <ul class="pagination">
                <?php if($pagina == 1) : ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Anterior</a>
                </li>

                    <?php elseif($pagina > 1) : ?>
                        <a class="page-link" href="<?php $url = 'Anuncios/index/'.($pagina-1);
                        echo base_url($url);?>">Anterior</a>

                    <?php endif; ?>

                    <?php for($i = 0; $i < $cantidadPublicidad; $i++) { ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php $url = 'Anuncios/index/'.($i+1);
                            echo base_url($url); ?>"><?php echo $i + 1; ?></a></li>

                    <?php } ?>

                    <?php if($pagina >= $cantidadPublicidad) : ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>

                <?php elseif($pagina < $cantidadPublicidad): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php $url = 'Anuncios/index/'.($pagina+1);
                        echo base_url($url);?>">Siguiente</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        </div>

    <?php }else{ ?>
        <div class="anunciosDeUsuario">
            <h5>No existe publicidad por el momento.</h5>
            <p><a href="<?php echo base_url('Publicidad/Accion') ?>">Desea agregar?</a></p>
        </div>
    <?php } ?>

    </div>
    
    <div class="col-sm text-center  bg-light" id="miInfo" >
    <h4>Panel de Opciones</h4>

       <h6>
       <p>
            <a class="text-primary" href="<?php echo base_url('Anuncios/AnunciosUsuario/'.$this->session->userdata('idUsuario')); ?>" >
            <i class="fas fa-user-circle"></i> Mis Anuncios</a>
        </p>
        <p>
            <a class="text-success"href="<?php echo base_url()?>Publicidad/Accion">
            <i class="fas fa-plus-circle"></i> Crear Publicidad</a>
        </p>
        <p>
            <a class="text-danger" href="<?php echo base_url('Cuentas/cerrar') ?>">
            <i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
        </p>

       </h6>
    </div>
</div>
<script>

function detalles(id){
    let trToShow = document.getElementById(id);
    let btnToShowPlus = document.getElementById('botonmas'+id);
    let btnToShowMoinus = document.getElementById('botonmenos'+id);

    if(trToShow.className == 'table-hidden'){
        trToShow.className = 'table-show';
        btnToShowPlus.style.display = 'none';
        btnToShowMoinus.style.display = 'block';

    }else  if(trToShow.className == 'table-show') {
        trToShow.className = 'table-hidden';
        btnToShowPlus.style.display = 'block';
        btnToShowMoinus.style.display = 'none';
    }
   
}

</script>