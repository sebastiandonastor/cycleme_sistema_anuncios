<br>
<div class="row">

    <div class="col-lg-9">
        <div class=" estilo-border-encabezado">
        <h3>Articulos de <?php echo $categoria_deseada; ?> (<?php echo $this->Categoria_model->subCategoriasNum($categoria_deseada); ?>)</h3>
        </div>
        <?php 
             $anuncios = $this->Categoria_model->subCategorias($categoria_deseada);
        
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
                                                <a href="<?php echo base_url()?>Home/categorias_secundarias/<?php echo $anuncio['categoria'] ?>" rel="tag"> 
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

    <div class="col-lg-3">
    <!-- aqui publicidad -->
    </div> <!-- fin del espacio para la publicidad -->

</div>
        