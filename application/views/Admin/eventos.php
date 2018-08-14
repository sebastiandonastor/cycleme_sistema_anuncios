<?php if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }  ?>

<div class="row d-flex justify-content-center" >
    <div class="col-sm bg-light" id="misAnuncios" >
    <h4>Publicidad General</h4>
    <p>En esta pantalla podra administrar los eventos de la pagina, solo siga las intrucciones de la accion que desea realizar.</p>

    <?php setlocale(LC_ALL, 'es_ES'); ?>
    <?php if($eventos){ ?>
        <?php  foreach($eventos as $evento){ ?>
        <div class="col-sm divPerfectoAnuncios" > 
                    <div class="row">
                        <div class="col-sm col-lg-3 text-center"  >
                                <img width="120" height="120" class="rounded" src="/cycleme_sistema_anuncios/temp_img/<?php echo $evento['imagen'];?>" >
                        </div>
            
                        <div class="col-sm  col-lg-6 anunciosDetalles tituloAnuncio"  >
                            <div class="row">
                                    <h6 class="limitartitulo"> <?php echo $evento['nombreEven']; ?> </h6>
                            </div>
                            <div class="row contenidoAnuncio">
                                <font size="-1">
                                        <?php 
                                        $fechaCreacion = date_create_from_format('Y-m-d H:i:s', $evento['fechaEvento']);
                                        echo strftime("%d de %B, %Y",$fechaCreacion->getTimestamp()).', Hora: '.$evento['hora']; 
                                        ?>
                                </font>
                            </div>
                            <div class="row contenidoAnuncio">
                                <font size="-1">
                                    <p class="limitarDescrip">
                                        <?php echo $evento['lugar'].', Tipo de evento: '.$evento['tipo'] ?>
                                    </p>
                                </font>
                            </div>
                          
                            <div class="row contenidoAnuncio">
                                <font size="-1">
                                <p class="limitarDescrip">
                                    <?php echo $evento['descripcion'];?>
                                </p>
                                </font>
                            </div>
                            
                        </div>
                        <div class="col-sm col-lg-2 text-center"  >
                            <a href="<?php echo base_url('Eventos/Editar/'.$evento['idEventos']); ?>" 
                                    class="icon-sizePublici btn btn-sm text-warning" data-toggle="tooltip" data-placement="bottom" 
                                    title="Editar Evento"><i class="fas fa-pencil-alt "></i>
                                    </a>
                           
                                    <a href="<?php echo base_url(); ?>Eventos/Eliminar/<?php echo $evento['idEventos'] ?>" 
                                    onclick="return confirm('Seguro que desea realizar esta acción?');" class="icon-sizePublici btn btn-sm text-danger" 
                                    data-toggle="tooltip" data-placement="bottom" title="Eliminar Evento"><i class="fas fa-trash-alt"></i>
                                    </a>
                            </div>
                        
                    </div>
                </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="anunciosDeUsuario">
            <h5>No existen eventos por el momento.</h5>
            <p><a href="<?php echo base_url('Eventos/Accion') ?>">Desea agregar?</a></p>
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
            <a class="text-success"href="<?php echo base_url()?>Eventos/Accion">
            <i class="fas fa-plus-circle"></i> Crear Eventos</a>
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