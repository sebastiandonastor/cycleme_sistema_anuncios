
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
    <button class="col-sm-12 col-md-3 btn btn-dark" onclick="location.href =
        '<?php $redireccion = ($this->session->userdata('idUsuario') == null) ? 'Cuentas' : 'Anuncios' ; echo base_url($redireccion); ?>';">Anuciate</button>
</div>

<?php foreach($Anuncios as $anuncio){ ?>
    <div class="row">

        <div class="col-lg-9">
            <div class="container estilo-border-sub">
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <br>
                        <a href="#" title="Prueba" class="preview" data-rel="#"><img  width="200" height="220" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="attachment-ad-medium size-ad-medium" alt="promo 2 croco" srcset="" sizes="(max-width: 250px) 100vw, 250px" /></a>
                    </div> <!-- fin row img -->

                    <div class="col-lg-9 align-self-lg-end">
                        <h5 class="text-wrap"><a href="#"><?php echo $anuncio['titulo']; ?></a></h5>
                        <div class="clr"></div>
                        <p class="post-meta">
                            <span class="dashicons-before folder"><i class="fa fa-list"></i><a href="#" rel="tag"><font size="-1"> <?php echo $anuncio['categoria'] ?> (subcategoria) </font></a></span> <span class="dashicons-before owner"><i class="fas fa-user-tie"></i><font size="-1"> <?php echo $anuncio['nombre'] ?>(usuario) </font></a></span> <span class="dashicons-before clock"><span><i class="fas fa-clock"></i><font size="-1">22 horas atrás (fecha creacion)</font></span></span>
                        </p>
                        <div class="clr"></div>
                        <p class="lead text-truncate"><font size="-1"> <?php echo $anuncio['descripcion'];?> </font> </p>
                        <p class="text-black-50"><font size="-1"></font></p>
                        <div class="clr"></div>
                        <div class="tags price-wrap text-right">
                            <span class="tag-head text-md-left text-center h5"><p class="post-price badge badge-secondary"><?php echo $anuncio['precio']; ?></p></span>
                        </div>
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