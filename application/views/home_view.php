<br><br><br>

<style>
    .btn-dark {border-color: #1d2124};


    .btn-dark:focus, .btn-dark.focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.1) !important;
    }


    .link-unstyled {
    &,
    &:visited,
    &:hover,
    &:active,
    &:focus,
    &:active:hover {
         font-style: inherit;
         color: inherit;
         background-color: transparent;
         font-size: inherit;
         text-decoration: none;
         font-variant: inherit;
         font-weight: inherit;
         line-height: inherit;
         font-family: inherit;
         border-radius: inherit;
         border: inherit;
         outline: inherit;
         box-shadow: inherit;
         padding: inherit;
         vertical-align: inherit;
     }
    }




</style>


<div class="mt-4 border border-info">
<h1>
    aqui va el carrousel. con anuncios destacados.
</h1>
</div>

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
