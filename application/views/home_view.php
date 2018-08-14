<?php setlocale(LC_ALL, 'es_ES'); ?>
<?php echo form_open('Buscar/index',array('method' => 'GET')); ?>
<div class="mt-4 border border-dark rounded bg-secondary">
    <div class="input-group ">

        <?php echo form_input(array(
            'class' => 'form-control',
            'name' => 'Buscar',
            'placeholder' => 'Buscar'
        )); ?>

        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" name="buscarEnvio">
                <i class="fas fa-search fa-lg"></i> Buscar
            </button>
        </div>

        <div class="input-group-append">
            <select id="s" name="categoria" class="custom-select text-white bg-dark btn btn-dark btn-block" style="max-width: 109px">
                <option value="todos">Todos</option>
                <option value="Accesorios">Accesorios</option>
                <?php foreach($Accesorios as $accesorio) : ?>
                    <option value="<?php echo $accesorio['categoria']?>">&nbsp;&nbsp;&nbsp;<?php echo $accesorio['categoria']?></option>
                <?php endforeach; ?>
                <option value="Bicicletas">Bicicletas</option>
                <?php foreach($Bicicletas as $bicicleta) : ?>
                    <option value="<?php echo $bicicleta['categoria']?>">&nbsp;&nbsp;&nbsp;<?php echo $bicicleta['categoria']?></option>
                <?php endforeach; ?>
                <option value="Componentes">Componentes</option>
                <?php foreach($Componentes as $componente) : ?>
                    <option value="<?php echo $componente['categoria']?>">&nbsp;&nbsp;&nbsp;<?php echo $componente['categoria']?></option>
                <?php endforeach; ?>
                <option value="Servicios">Servicios</option>
                <?php foreach($Servicios as $servicio) : ?>
                    <option value="<?php echo $servicio['categoria']; ?>">&nbsp;&nbsp;&nbsp;<?php echo $servicio['categoria']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

</div>

</div>

<?php echo form_close(); ?>

<div class="mt-3 row">
    <h2 class="col-sm-12 col-md-9">Anuncios Recientes</h2>
    <button class="col-sm btn btn-dark" onclick="location.href ='<?php $redireccion = ($this->session->userdata('idUsuario') == null) ? 'Cuentas' : 'Anuncios/opcion/Crear' ; echo base_url($redireccion); ?>';">Anunciate</button>
</div>
<div class="row " >
    <div class="col-sm col-lg-8" >
<?php  foreach($Anuncios as $anuncio){
         $foto  = explode(',',  $anuncio['foto']);
    ?>
    <div class="col-sm divPerfectoAnuncios" > 
                <div class="row">
                    <div class="col-sm col-lg-3 text-center"  class=" rounded"  onclick="showImage('/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>');" >
                            <img width="120" height="120" class="rounded" src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>" >
                    </div>
           
                    <div class="col-sm  col-lg-9 anunciosDetalles tituloAnuncio"  >
                        <div class="row">
                            <a href="<?php echo base_url()?>Anuncios/ver/<?php echo $anuncio['idAnuncio']?>">
                                <h6 class="limitartitulo"> <?php echo $anuncio['titulo']; ?> </h6>
                            </a>
                        </div>
                        <div class="row contenidoAnuncio">
                            <span>
                                <i class="fa fa-list"></i>
                                <font size="-1">
                                    <a href="#" rel="tag"> 
                                        <?php echo $anuncio['categoria'] ?> (subcategoria)     
                                    </a>
                                </font>
                            </span>
                            <span> 
                                <i class="fas fa-user-tie"></i>
                                <font size="-1"> 
                                <a href="<?php echo base_url()?>Anuncios/AnunciosUsuario/<?php echo $anuncio['idUsuario_fk']; ?> " >
                                            <?php echo $anuncio['nombre'] ?>
                                    </a>
                                </font>
                            </span>
                            <span> 
                                <i class="fas fa-clock"></i>
                                <font size="-1"> 
                                    <?php 
                                    $fechaCreacion = date_create_from_format('Y-m-d H:i:s', $anuncio['fechaCreacion']);
                                    echo strftime("%d de %B, %Y",$fechaCreacion->getTimestamp());
                                    ?>
                                </font>
                            </span>
                        </div>
                        <div class="row contenidoAnuncio">
                            <font size="-1">
                                <p class="limitarDescrip">
                                    <?php echo $anuncio['descripcion'];?>
                                </p>
                            </font>
                        </div>

                        <div class="row">
                            <div class="col-sm contenidoAnuncio">
                                <b>Total de Visitas:</b> <?php echo $anuncio['numeroVisitas']; ?> 
                            </div>
                            <div class="col-sm ">
                                <i class="fas fa-tag"></i><?php echo $anuncio['precio']; ?>
                            </div>
                        </div>

                     </div>
                </div>
            </div>
    <?php } ?>

    <div >
    <nav aria-label="...">
        <ul class="pagination">
            <?php if($pagina == 1) : ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Anterior</a>
            </li>

                <?php elseif($pagina > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?php $url = 'Home/index/'.($pagina-1);
                    echo base_url($url);?>">Anterior</a>
                </li>
                <?php endif; ?>

                <?php for($i = 0; $i < $cantidadAnuncios; $i++) { ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php $url = 'Home/index/'.($i+1);
                        echo base_url($url); ?>"><?php echo $i + 1; ?></a>
                    </li>

                <?php } ?>

                <?php if($pagina >= $cantidadAnuncios) : ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>

            <?php elseif($pagina < $cantidadAnuncios): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php $url = 'Home/index/'.($pagina+1);
                    echo base_url($url);?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    </div>
</div>
<div class="col-sm  " style="   text-align:center; ">
    <?php  foreach($publicidades as $publicidad){ ?>
        <div class="cols-sm col-lg bg-light text-center" id="publicidad">
            <a href="<?php echo $publicidad['href']; ?> ">
                <img style="max-width: 100%; max-height: 100%;" class="rounded"  src="/cycleme_sistema_anuncios/publicidad/<?php echo $publicidad['img']; ?> ">
            </a>
        </div>
    <?php } ?>
<div  >
<!-- Modal -->

    <div  class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div  class="modal-dialog rounded" role="document">
            <div class="modal-content text-center ">
                <div class="modal-body">
                    <img style="width:100%;max-width:300px"   src=""  id="imgModal" >
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
