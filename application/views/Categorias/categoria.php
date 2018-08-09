<br>
<div class="row">

    <div class="col-lg-9">
        <div class=" estilo-border-encabezado">
            <h3>Articulos de <?php echo $categoria_deseada; ?> (<?php echo $this->Categoria_model->anunciosCategoriaPrincipalNum($categoria_deseada); ?>)</h3>
        </div>
        <?php 
            $results = $this->Categoria_model->anunciosCategoriaPrincipal($categoria_deseada);
        
                foreach($results as $resultA){ 
                    $precio = $resultA['precio'];
                    $titulo = $resultA['titulo'];
                    $fechaCreacion = $resultA['fechaCreacion'];
                    $descripcion = $resultA['descripcion'];
                    $numeroVisitas = $resultA['numeroVisitas'];
                    $subCategoria = $resultA['categoria'];
                    $foto = $resultA['foto']
                    ?>
                
                <div class="row">
            
                    <div class="col-lg-9">
                        <div class="container estilo-border-sub">
                            <div class="row">
                                <div class="col-lg-3 text-center">
                                    <a href="#" title="Prueba" class="preview" data-rel="#">
                                        <img  width="150" height="150"  src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto;?>" class="attachment-ad-medium size-ad-medium" alt="promo 2 croco" srcset="" sizes="(max-width: 120px) 100vw, 120px" >
                                    </a>
                                </div> <!-- fin row img -->
            
                                <div class="col-lg-9">
                                    
                                    <h5 class="text-wrap"><a href="#"><?php echo $titulo ?></a></h5>
                                    <p class="post-meta espaciadoDeAnuncio">
                                        <span class="dashicons-before folder"><i class="fa fa-list"></i><a href="#" rel="tag"><font size="-1"> <?php echo $subCategoria ?> (subcategoria) </font></a></span> <span class="dashicons-before owner"><i class="fas fa-user-tie"></i><font size="-1"> <?php //echo $nombre ?>(usuario) </font></a></span> <span class="dashicons-before clock"><span><i class="fas fa-clock"></i><font size="-1">22 horas atrás</font></span></span>
                                    </p>
                                    <p class="lead block-with-text espaciadoDeAnuncio"><font size="-1"> <?php echo $descripcion?> </font> </p>
                                    <p class="text-black-50"><font size="-1"></font></p>
            
                                    <span class="tag-head text-md-left text-center h5 float-left espaciadoDeAnuncio">
                                        <p class="text-black-50"><font size="-1"><?php echo $numeroVisitas; ?> total vistas</font></p>
                                    </span>
                                    <span class="tag-head text-md-left text-center h5 float-right espaciadoDeAnuncio">
                                        <p class="post-price badge badge-secondary"><?php echo $precio ?></p>
                                    </span>
            
                                </div>
            
                                <div class="clr"></div>
                            </div> <!-- fin row texto -->
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
        

