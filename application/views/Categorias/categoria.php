<br><br>
<div class="row">

    <div class="col-lg-9">
        <div class=" estilo-border-encabezado">
            <h3>Articulos de <?php echo $categoria_deseada; ?> (<?php echo $this->Categoria_model->anunciosCategoriaPrincipalNum($categoria_deseada); ?>)</h3>
        </div>
        <div class="container estilo-border-sub">
            <div class="row">
                <div class="col-lg-3">
                    <br>
                    <?php 
                        $results = $this->Categoria_model->anunciosCategoriaPrincipal($categoria_deseada);
                        foreach ($results as $resultA) {
                            $precio = $resultA['precio'];
                            $titulo = $resultA['titulo'];
                            $fechaCreacion = $resultA['fechaCreacion'];
                            $descripcion = $resultA['descripcion'];
                            $numeroVisitas = $resultA['numeroVisitas'];
                            $subCategoria = $resultA['categoria'];
                    ?>
                    <a href="#" title="Prueba" class="preview" data-rel="#"><img width="200" height="200" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="attachment-ad-medium size-ad-medium" alt="promo 2 croco" srcset="" sizes="(max-width: 250px) 100vw, 250px" /></a>
                </div> <!-- fin row img -->
                    
                    <div class="col-lg-9">
                        <br>
                        <h5 class="text-wrap "><a href="#"><?php echo $titulo ?></a></h5>
                        <p class="post-meta">
                            <span class="dashicons-before folder"><i class="fa fa-list"></i><a href="#" rel="tag"><font size="-1"> <?php echo $anuncio['categoria'] ?> (subcategoria) </font></a></span> <span class="dashicons-before owner"><i class="fas fa-user-tie"></i><font size="-1"> <?php echo $anuncio['nombre'] ?>(usuario) </font></a></span> <span class="dashicons-before clock"><span><i class="fas fa-clock"></i><font size="-1">22 horas atrás (fecha creacion)</font></span></span>
                        </p>
                        <p class="lead block-with-text"><font size="-1"> <?php echo $anuncio['descripcion'];?> </font> </p>
                        <p class="text-black-50"><font size="-1"></font></p>

                        <span class="tag-head text-md-left text-center h5 float-left">
                        <p class="text-black-50"><font size="-1"><?php //echo $numeroVisitas; ?> total vistas</font></p>
                        </span>
                        <span class="tag-head text-md-left text-center h5 float-right">
                            <p class="post-price badge badge-secondary"><?php echo $anuncio['precio']; ?></p>
                        </span>
                </div>

                <?php } ?>

                <div class="clr"></div>
            </div> <!-- fin row texto -->
        </div> <!-- fin row de anuncios individuales -->


    </div> <!-- fin del row de anuncios -->

    <div class="col-lg-3">
        <!-- aqui publicidad -->
    </div> <!-- fin del espacio para la publicidad -->
    
</div>


<br><br><br>
