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

<div class="mt-4 row">
    <h2 class="col-sm-12 col-md-9">Anuncios Recientes</h2>
    <button class="col-sm-12 col-md-3 btn btn-dark" onclick="location.href ='<?php $redireccion = ($this->session->userdata('idUsuario') == null) ? 'Cuentas' : 'Anuncios' ; echo base_url($redireccion); ?>';">Anunciate</button>
</div>

<?php foreach($Anuncios as $anuncio){ ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="container estilo-border-sub">
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <a href="#" title="Prueba" class="preview" data-rel="#">
                            <img  width="150" height="150"  src="/cycleme_sistema_anuncios/temp_img/<?php echo $anuncio['foto'];?>" class="attachment-ad-medium size-ad-medium" alt="promo 2 croco" srcset="" sizes="(max-width: 120px) 100vw, 120px" >
                        </a>
                    </div> <!-- fin row img -->

                    <div class="col-lg-9">

                        <h5 class="text-wrap"><a href="<?php $urlAnuncio = 'Anuncios/ver/'.$anuncio['idAnuncio']; echo base_url($urlAnuncio); ?>"><?php echo $anuncio['titulo']; ?></a> </h5>
                        <p class="post-meta espaciadoDeAnuncio">
                            <span class="dashicons-before folder"><i class="fa fa-list"></i><a href="#" rel="tag"><font size="-1"> <?php echo $anuncio['categoria'] ?> (subcategoria) </font></a></span> <span class="dashicons-before owner"><i class="fas fa-user-tie"></i><font size="-1"> <?php echo $anuncio['nombre'] ?>(usuario) </font></a></span> <span class="dashicons-before clock"><span><i class="fas fa-clock"></i><font size="-1">22 horas atrás</font></span></span>
                        </p>
                        <p class="lead block-with-text espaciadoDeAnuncio"><font size="-1"> <?php echo $anuncio['descripcion'];?> </font> </p>
                        <p class="text-black-50"><font size="-1"></font></p>

                        <span class="tag-head text-md-left text-center h5 float-left espaciadoDeAnuncio">
                        <p class="text-black-50"><font size="-1"><?php //echo $numeroVisitas; ?> total vistas</font></p>
                        </span>
                        <span class="tag-head text-md-left text-center h5 float-right espaciadoDeAnuncio">
                            <p class="post-price badge badge-secondary"><?php echo $anuncio['precio']; ?></p>
                        </span>

                    </div>

                    <div class="clr"></div>
                </div> <!-- fin row texto -->
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
                <a class="page-link" href="<?php $url = 'Home/index/'.($pagina-1);
                echo base_url($url);?>">Anterior</a>

            <?php endif; ?>

            <?php for($i = 0; $i < $cantidadAnuncios; $i++) { ?>
                <li class="page-item">
                    <a class="page-link" href="<?php $url = 'Home/index/'.($i+1);
                    echo base_url($url); ?>"><?php echo $i + 1; ?></a></li>

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