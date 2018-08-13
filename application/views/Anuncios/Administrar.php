<?php if($this->session->userdata('idUsuario') == null ){
            redirect('Home');
        }  ?>
<?php if($this->session->flashdata('error') ){ ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Revisar Operacion!</strong> <?php echo $this->session->flashdata('error'); ?>.
        </div>
<?php  } else if($this->session->flashdata('exito')){  ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Listo!</strong> <?php echo $this->session->flashdata('exito'); ?>.
    </div>
<?php  }  ?>
<div class="row d-flex justify-content-center" >
<div class="col-sm col-lg-8 bg-light" id="misAnuncios" >
    <h4>Anuncios de Usuario</h4>
    <p>En esta pantalla podra administrar sus anuncios, solo siga las intrucciones de la accion que desea realizar.</p>

    <?php   setlocale(LC_ALL, 'es_ES'); $losAnuncios = $this->Anuncio_model->get_anuncioLogueado(); ?>
    <?php if($losAnuncios){ ?>

        <div class=" table table-sm">
        <table class="table one">
            <thead>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Vistas</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody  >
                <?php
                $numero = 0;
                foreach( $AnunciosUser as $anuncio ) { 
                    $numero = $numero + 1;
                    ?>
                    <tr class="anunciosDeUsuario" >
                        <td style="width:300px">
                        <h6 class="limitartitulo" >
                            <?php  echo $numero.'.<b >'.$anuncio['titulo'].'</b>' ?>
                        </h6>
                        <p>
                            <?php    
                            $fechaCreacion = date_create_from_format('Y-m-d H:i:s', $anuncio['fechaCreacion']);
                            echo strftime("%d de %B, %Y",$fechaCreacion->getTimestamp()); 
                            ?>
                        </p>
                        
                        </td>
                        <td  >
                            <?php echo $anuncio['numeroVisitas']; ?>
                        </td>
                            <?php 
                
                            $fechaCaducidad = date_create_from_format('Y-m-d H:i:s', $anuncio['fechaCaducidad']);
                            if($anuncio['estado'] > 0 ){ ?>
                                <td > <b class="text-success" >Activo</b>  <br><i class="small">( <?php echo strftime("%d de %B, %Y",$fechaCaducidad->getTimestamp()); ?> )</i></td>
                                <td >
                                    <a href="<?php echo base_url('Anuncios/Editar/'.$anuncio['idAnuncio']); ?>" 
                                    class="btn btn-sm text-warning" data-toggle="tooltip" data-placement="bottom" 
                                    title="Editar Anuncio"><i class="fas fa-pencil-alt"></i></a>
                                
                                    <a href="<?php echo base_url(); ?>Anuncios/Eliminar/<?php echo $anuncio['idAnuncio'] ?>" 
                                    onclick="return confirm('Seguro que desea realizar esta acción?');" class="btn btn-sm text-danger" 
                                    data-toggle="tooltip" data-placement="bottom" title="Eliminar Anuncio"><i class="fas fa-trash-alt"></i></a>

                                    <a href="<?php echo base_url(); ?>Anuncios/Estado/<?php echo $anuncio['idAnuncio'] ?>" 
                                    class="btn btn-sm text-muted" data-toggle="tooltip" data-placement="bottom" 
                                    title="Desactivar Anuncio"><i class="far fa-eye-slash"></i></a>

                                </td>
                            <?php }else{  ?>
                            <td >Inactivo</td>
                            <td >
                                <a href="<?php echo base_url('Anuncios/Editar/'.$anuncio['idAnuncio']); ?>" 
                                class="btn btn-sm text-warning" data-toggle="tooltip" data-placement="bottom" 
                                title="Editar Anuncio"><i class="fas fa-pencil-alt"></i></a>

                                <a href="<?php echo base_url(); ?>Anuncios/Eliminar/<?php echo $anuncio['idAnuncio'] ?>" 
                                onclick="return confirm('Seguro que desea realizar esta acción?');" class="btn btn-sm text-danger" 
                                data-toggle="tooltip" data-placement="bottom" title="Eliminar Anuncio"><i class="fas fa-trash-alt"></i></a>

                                <a href="<?php echo base_url(); ?>Anuncios/Estado/<?php echo $anuncio['idAnuncio'] ?>" 
                                class="btn btn-sm text-success" data-toggle="tooltip" data-placement="bottom" 
                                title="Activar Anuncio"><i class="far fa-eye"></i></a>

                            </td>
                        <?php } ?>
                        </tr>
                <?php } ?>
            </tbody>
        </table>

        <table class="table two">
            <thead>
                <tr>
                <th scope="col">Titulo</th>
                </tr>
            </thead>
            <tbody  >
                <?php
                $numero = 0;
                foreach( $AnunciosUser as $anuncio ) { 
                    $numero = $numero + 1;
                    ?>
                    <tr >
                        <td >  
                        <a style="font-size:30px; float:right;" id="botonmas<?php echo $anuncio['idAnuncio']; ?>" onclick="detalles('<?php echo $anuncio['idAnuncio']; ?>');"  class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" 
                        title="Mas Detalles"><i class="fas fa-plus"></i></a>
                        <a style="font-size:30px; display:none; float:right;" id="botonmenos<?php echo $anuncio['idAnuncio']; ?>" onclick="detalles('<?php echo $anuncio['idAnuncio']; ?>');"  class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" 
                        title="Menos Detalles"><i class="fas fa-minus"></i></a>
                        <?php   
                            setlocale(LC_ALL, 'es_ES');
                            $fechaCreacion = date_create_from_format('Y-m-d H:i:s', $anuncio['fechaCreacion']);
                            echo $numero.'.<b>'.$anuncio['titulo'].'</b><br>'.strftime("%d de %B, %Y",$fechaCreacion->getTimestamp());
                        ?>
                    
                        </td>
                        </tr>
                
                            <tr class="table-hidden" id="<?php echo $anuncio['idAnuncio']; ?>" >
                            <td  >
                            <b>Vistas:</b> <?php echo $anuncio['numeroVisitas']; ?>
                        <br>
                        <?php 
                            $fechaCaducidad = date_create_from_format('Y-m-d H:i:s', $anuncio['fechaCaducidad']);
                            if($anuncio['estado'] > 0 ){ ?>
                                <td > <b class="text-success" >Activo</b>  <br><i class="small">( <?php echo strftime("%d de %B, %Y",$fechaCaducidad->getTimestamp()); ?> )</i></td>
                                <td >
                                <b>Opciones:</b> 
                                <a href="<?php echo base_url(); ?>Anuncios/Editar/<?php echo $anuncio['idAnuncio'] ?>" 
                                    class="btn btn-sm text-warning" data-toggle="tooltip" data-placement="bottom" 
                                    title="Editar Anuncio"><i class="fas fa-pencil-alt"></i></a>
                                
                                    <a href="<?php echo base_url(); ?>Anuncios/Eliminar/<?php echo $anuncio['idAnuncio'] ?>" 
                                    onclick="return confirm('Seguro que desea realizar esta acción?');" class="btn btn-sm text-danger" 
                                    data-toggle="tooltip" data-placement="bottom" title="Eliminar Anuncio"><i class="fas fa-trash-alt"></i></a>

                                    <a href="<?php echo base_url(); ?>Anuncios/Estado/<?php echo $anuncio['idAnuncio'] ?>" 
                                    class="btn btn-sm text-muted" data-toggle="tooltip" data-placement="bottom" 
                                    title="Desactivar Anuncio"><i class="far fa-eye-slash"></i></a>
                                <?php }else{  ?>
                                    <b>Estado:</b> <b class="text-secondary" >Inactivo</b>  <br><i class="small"></i>
                                
                                    <b>Opciones:</b> 
                                    <a href="<?php echo base_url(); ?>Anuncios/Editar/<?php echo $anuncio['idAnuncio'] ?>" 
                                    class="btn btn-sm text-warning" data-toggle="tooltip" data-placement="bottom" 
                                    title="Editar Anuncio"><i class="fas fa-pencil-alt"></i></a>
                                
                                    <a href="<?php echo base_url(); ?>Anuncios/Eliminar/<?php echo $anuncio['idAnuncio'] ?>" 
                                    onclick="return confirm('Seguro que desea realizar esta acción?');" class="btn btn-sm text-danger" 
                                    data-toggle="tooltip" data-placement="bottom" title="Eliminar Anuncio"><i class="fas fa-trash-alt"></i></a>

                                    <a href="<?php echo base_url(); ?>Anuncios/Estado/<?php echo $anuncio['idAnuncio'] ?>" 
                                    class="btn btn-sm text-success" data-toggle="tooltip" data-placement="bottom" 
                                    title="Activar Anuncio"><i class="far fa-eye"></i></a>
                                <?php } ?> 
                            </td>
                            </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

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

                <?php for($i = 0; $i < $cantidadAnunciosUser; $i++) { ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php $url = 'Anuncios/index/'.($i+1);
                        echo base_url($url); ?>"><?php echo $i + 1; ?></a></li>

                <?php } ?>

                <?php if($pagina >= $cantidadAnunciosUser) : ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>

            <?php elseif($pagina < $cantidadAnunciosUser): ?>
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
            <h5>No tiene anuncios por el momento.</h5>
            <p><a href="<?php echo base_url('Anuncios/opcion/Crear') ?>">Desea agregar?</a></p>
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
            <a class="text-success"href="<?php echo base_url()?>Anuncios/opcion/Crear">
            <i class="fas fa-plus-circle"></i> Publicar Anuncio</a>
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