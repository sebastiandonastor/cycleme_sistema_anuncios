<?php

setlocale(LC_ALL, 'es_ES');

?>
<div class="row " >
    <div class="col-sm col-lg-8" >
        <div class="col-sm bg-light divPerfecto" >
            <h5>Acerca de <?php echo $usuario->nombre ?>  </h5>
            <div class="row">
                <div class="col-sm col-lg-6">
                    <ul class="list-group list-group-flush" style="font-size:15px; "  >
                        <li class="list-group-item rounded border-bottom">
                            <b>Fecha de Registro:</b>
                            <?php
                            $fechaCreacion = date_create_from_format('Y-m-d H:i:s', $usuario->fechaCreacionUsr);
                            echo strftime("%d de %B, %Y",$fechaCreacion->getTimestamp());
                            ?>
                        </li>
                        <li class="list-group-item rounded border-bottom">
                            <b>Cantidad de Anuncios Activos: </b><?php echo count($AnunciosUserUni);?>
                        </li>
                    </ul>
                </div>
                <div class="col-sm col-lg-3"  >
                    <img src="<?php echo base_url('Assets/img/userIcon.png'); ?>" width="120" height="100">
                </div>
            </div>
        </div>

        <h5>Anuncios vigentes de <?php echo $usuario->nombre ?>:</h5>
        <?php foreach($AnunciosUserUni as $anuncio){
            $foto  = explode(',', $anuncio['foto']);
            ?>
                <div class="col-sm divPerfectoAnuncios" >
                    <div class="row">
                        <div class="col-sm col-lg-3 text-center" class="rounded"  onclick="showImage('/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>');" >
                            <a href="<?php $urlAnuncio = 'Anuncios/ver/'.$anuncio['idAnuncio']; echo base_url($urlAnuncio); ?>"  >
                                <img width="120" height="120" class="rounded" src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>" >
                            </a>
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
                                            <?php echo $anuncio['nombre']; ?>
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
        <div>
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

                        <?php for($i = 0; $i < $cantidadAnunciosUserUni; $i++) { ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php $url = 'Home/index/'.($i+1);
                                echo base_url($url); ?>"><?php echo $i + 1; ?></a></li>

                        <?php } ?>

                        <?php if($pagina >= $cantidadAnunciosUserUni) : ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>

                    <?php elseif($pagina < $cantidadAnunciosUserUni): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php $url = 'Home/index/'.($pagina+1);
                            echo base_url($url);?>">Siguiente</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="col-sm col-lg-4 bg-light divPerfecto" >

    </div>

</div>

<!-- Modal -->
<div  >
    <div  class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div  class="modal-dialog rounded" role="document">
            <div class="modal-content text-center ">
                <div class="modal-body">
                    <img  style="width:100%;max-width:300px"  src=""  id="imgModal" >
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
