
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
                    <a href="#" title="Prueba" class="preview" data-rel="#">
                    <?php $fotos  = explode(',', $anuncio['foto']);
                      
                    foreach($fotos  as $foto){ ?>
            <img  width="120" height="120"  src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>" class="attachment-ad-medium size-ad-medium" alt="<?php echo $foto[0]; ?>" srcset="" sizes="(max-width: 120px) 100vw, 120px" >

                     <?php } ?>  
                        
                    </a>
                    </div> <!-- fin row img -->

                    <div class="col-lg-9 align-self-lg-end">
                        <h5 class="text-wrap "><a href="#"><?php echo $anuncio['titulo']; ?></a></h5>
                        <p class="post-meta">
                            <span class="dashicons-before folder"><i class="fa fa-list"></i><a href="#" rel="tag"><font size="-1"> <?php echo $anuncio['categoria'] ?> (subcategoria) </font></a></span> <span class="dashicons-before owner"><i class="fas fa-user-tie"></i><font size="-1"> <?php echo $anuncio['nombre'] ?>(usuario) </font></a></span> <span class="dashicons-before clock"><span><i class="fas fa-clock"></i><font size="-1">22 horas atrás (fecha creacion)</font></span></span>
                        </p>
                        <p class="lead text-truncate float-left demo-2"><font size="-1"> <?php echo $anuncio['descripcion'];?> </font> </p>
                        <p class="text-black-50"><font size="-1"></font></p>

                        <span class="tag-head text-md-left text-center h5 float-right">
                            <p class="post-price badge badge-secondary"><?php echo $anuncio['precio']; ?></p>
                        </span>
                     
                    </div>

                    <div class="clr"></div>
                </div> <!-- fin row texto -->
            </div>
        </div>
    </div>


<?php } ?>