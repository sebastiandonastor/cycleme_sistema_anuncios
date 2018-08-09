
<?php echo form_open('Home/Buscar'); ?>
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
            <select id="" class="custom-select text-white bg-dark btn btn-dark btn-block">
                <option selected >Categoria</option>
                <option>Accesorios</option>
                <option>Bicicletas</option>
                <option>Servicios</option>
            </select>
            </div>



    </div>

</div>


<?php echo form_close(); ?>

<br>
<div class="row">
    <div class="col-lg-8">
        <div class=" estilo-border-encabezado">
            <h3>Busqueda de '<?php //echo aqui la variable de la busqueda ?>' ha devuelto (<?php //echo funcion de la busqueda num_rows ?>)</h3>
        </div>
        <?php //foreach($Anuncios as $anuncio){ ?>
            <div class="container estilo-border-sub">
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <a href="#" title="Prueba" class="preview" data-rel="#">
                            <img  width="150" height="150" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" srgc="/cycleme_sistema_anuncios/temp_img/<?php //echo $anuncio['foto'];?>" class="attachment-ad-medium size-ad-medium" alt="promo 2 croco" srcset="" sizes="(max-width: 120px) 100vw, 120px" >
                        </a>
                    </div> <!-- fin row img -->

                    <div class="col-lg-9">
                        
                        <h5 class="text-wrap"><a href="#"><?php //echo $anuncio['titulo']; ?>Titulo</a></h5>
                        <p class="post-meta espaciadoDeAnuncio">
                            <span class="dashicons-before folder"><i class="fa fa-list"></i><a href="#" rel="tag"><font size="-1"> <?php //echo $anuncio['categoria'] ?> (subcategoria) </font></a></span> <span class="dashicons-before owner"><i class="fas fa-user-tie"></i><font size="-1"> <?php //echo $anuncio['nombre'] ?>(usuario) </font></a></span> <span class="dashicons-before clock"><span><i class="fas fa-clock"></i><font size="-1">22 horas atrás</font></span></span>
                        </p>
                        <p class="lead block-with-text espaciadoDeAnuncio"><font size="-1"> <?php //echo $anuncio['descripcion'];?>Descripcion</font> </p>
                        <p class="text-black-50"><font size="-1"></font></p>

                        <span class="tag-head text-md-left text-center h5 float-left espaciadoDeAnuncio">
                        <p class="text-black-50"><font size="-1"><?php //echo $numeroVisitas; ?> total vistas</font></p>
                        </span>
                        <span class="tag-head text-md-left text-center h5 float-right espaciadoDeAnuncio">
                            <p class="post-price badge badge-secondary"><?php //echo $anuncio['precio']; ?>Precio</p>
                        </span>

                    </div>

                    <div class="clr"></div>
                </div> <!-- fin row texto -->
            </div>
        <?php //} ?>
    </div> <!-- fin buscar-->

    <div class="col-lg-4">
        <div>
            <div class="estilo-border-sub espacioEntrePublicidad">
                <!-- para poner la publicidad se debe quitar el padding de styles de espacioEntrePublicidad -->
            </div>

            <div class="estilo-border-sub espacioEntrePublicidad">
                <!-- para poner la publicidad se debe quitar el padding de styles  de espacioEntrePublicidad-->
            </div>
        </div> <!-- espacio de la publicidad -->
    </div>

</div>



