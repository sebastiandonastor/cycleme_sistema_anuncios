<br>
<div class="row">

    <div class="col-sm  col-lg-8">
        <div class="text-center divPerfectoAnuncios">
            <h4>Articulos de <?php echo $categoria_deseada; ?> 
             (<?php echo $this->Categoria_model->anunciosCategoriaPrincipalNum($categoria_deseada); ?>)
            </h4>
        </div>
        <?php 
                foreach($anuncios as $anuncio){ 
                    $foto  = explode(',',  $anuncio['foto']);
                    ?>
                    <div class="col-sm divPerfectoAnuncios" > 
                                <div class="row">
                                    <div class="col-sm col-lg-3 text-center"  class=" rounded"  onclick="showImage('/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>');" >
                                        <a href="<?php $urlAnuncio = 'Anuncios/ver/'.$anuncio['idAnuncio']; echo base_url($urlAnuncio); ?>"  >
                                            <img width="120" height="120" class="rounded" src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>" > </a>
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

        <div class="clr"></div>
        
    </div> <!-- fin del row de anuncios -->

   <div class="col-sm  " style="   text-align:center; ">
    <?php  foreach($publicidades as $publicidad){ ?>
        <div class="cols-sm col-lg bg-light text-center" id="publicidad">
            <a href="<?php echo $publicidad['href']; ?> ">
                <img style="max-width: 100%; max-height: 100%;" class="rounded"  src="/cycleme_sistema_anuncios/publicidad/<?php echo $publicidad['img']; ?> ">
            </a>
        </div>
    <?php } ?>
<div  >

</div>
        

