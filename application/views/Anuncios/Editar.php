<?php if($this->session->userdata('idUsuario') == null ){
            redirect('Home');
        }  ?>

<div class="crear-div">
<h4>Editar Anuncio</h4>
                                        
    <div   class=" crear-div2 mx-auto" >
   

        <div  id="myTabContent" class="tab-content ">
            <div class="tab-pane fade active show">
                <?php echo form_open_multipart(base_url('Anuncios/Detalles'),array('class' => 'mt-4 mb-5 ')); ?>
               
                    <div class="form-group" name="categoria" hidden >
                        <?php echo form_label('Categoria:' ,'categoria'); $poder =   $this->session->tempdata('categoria'); ?>
                        <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'categoria','id' => 'categoria','value' =>  $poder , 'hidden'=>'true'); ?>
                        <?php echo form_input($datos); ?>
                        
                        <a class="btn btn-primary text-white btn-sm"  onclick="  window.location  = './'">Cambiar Categoría</a>
                    </div>

                    <div name="mainForm" id="mainForm" >
                      
                        <div class="form-group" style="display:none;" name="accesorio" id="accesorio">
                            <?php echo form_label('Accesorio','accesorio'); $poder =   $this->session->tempdata('accesorio'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'accesorio','id' => 'accesorio','value' => $poder ); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('accesorio'); ?></span>
                        </div>

                        <div class="form-group" style="display:none;" name="marca" id="marca">
                            <?php echo form_label('Marca','marca'); $poder =   $this->session->tempdata('marca'); ?>
                            <select class="custom-select btn-mini small"  name="marca" value="<?php echo $poder ?>"  >
                                <<?php if( $this->session->flashdata('marca') == null) {  ?>
                                <option value="" selected="">Elegir Marca</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder?>  ">  <?php echo $poder?></option>
                                <?php } $marcas = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($marcas as $info) { if($info->marca != null)  {?>
                                <option value=" <?php echo $info->marca; ?> "> <?php echo $info->marca; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('marca'); ?></span>
                        </div>
                        
                        <div class="form-group" style="display:none;" name="modelo"  id="modelo">
                            <?php echo form_label('Modelo','modelo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'modelo','value' => set_value('modelo')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('modelo'); ?></span>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle" id="tipo">
                            <?php echo form_label('Tipo','tipo'); ?>
                            <select class="custom-select btn-mini small" name="tipo" value="<?php set_value('tipo') ?>" >
                                <?php if( $this->session->flashdata('tipo') == null) {  ?>
                                <option value="" selected="">Elegir Tipo</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('tipo') ?>  ">  <?php echo $this->session->flashdata('tipo') ?></option>
                                <?php } $tipos = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($tipos as $info) { if($info->tipo != null)  {?>
                                <option value=" <?php echo $info->tipo; ?> "> <?php echo $info->tipo; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tipo'); ?></span>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle" id="tamanoAro">
                            <?php echo form_label('Tamaño de Aro','tamanoAro'); ?>
                            <select class="custom-select btn-mini small"  name="tamanoAro" value="<?php set_value('tamanoAro') ?>" >
                                <?php if( $this->session->flashdata('tamanoAro') == null) {  ?>
                                <option value="" selected="">Elegir Tamaño de Aro</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('tamanoAro') ?>  ">  <?php echo $this->session->flashdata('tamanoAro') ?></option>
                                <?php } $tipos = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($tipos as $info) { if($info->tamanoAro != null)  {?>
                                <option value=" <?php echo $info->tamanoAro; ?> "> <?php echo $info->tamanoAro; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tamanoAro'); ?></span>
                        </div>
                        <div class="form-group" style="display:none;"  name="detalle" id="tamanoCuadro"> 
                            <?php echo form_label('Tamaño de Cuadro','tamanoCuadro'); ?>
                            <select class="custom-select btn-mini small"  name="tamanoCuadro" value="<?php set_value('tamanoCuadro') ?>" >
                                <?php if( $this->session->flashdata('tamanoCuadro') == null) {  ?>
                                <option value="" selected="">Elegir Tamaño de Cuadro</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('tamanoCuadro') ?>  ">  <?php echo $this->session->flashdata('tamanoCuadro') ?></option>
                                <?php } $tipos = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($tipos as $info) { if($info->tamanoCuadro != null)  {?>
                                <option value=" <?php echo $info->tamanoCuadro; ?> "> <?php echo $info->tamanoCuadro; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tamanoCuadro'); ?></span>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('Provincia','provincia'); ?>
                            <select class="custom-select btn-mini small" id="provincia" name="provincia" >
                                <?php if( $this->session->flashdata('provincia') == null) {  ?>
                                <option value="" selected="">Elegir Provincia</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('provincia') ?>  ">  <?php echo $this->session->flashdata('provincia') ?></option>
                                <?php } $provincias = $this->Anuncio_model->GetProvincias(); ?>
                                <?php foreach($provincias as $info) { ?>
                                <option value=" <?php echo $info->provincia; ?> "> <?php echo $info->provincia; ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('provincia'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Celular/Telefono','telefono'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'telefono','id' => 'telefono','value' => set_value('telefono')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('telefono'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Accíon','accion'); ?>
                            <select class="custom-select btn-mini small" id="accion" name="accion" value="<?php set_value('accion') ?>" >
                                <?php if( $this->session->flashdata('accion') == null) {  ?>
                                <option value="" selected="">Elegir Accíon </option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('accion') ?>  ">  <?php echo $this->session->flashdata('accion') ?></option>
                                <?php } ?>
                                <option value="Vender">Vender</option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alquilar">Alquilar</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('accion'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Moneda','moneda'); ?>
                            <select class="custom-select btn-mini  small" id="moneda" name="moneda" value="<?php set_value('moneda') ?>" >
                                <?php if( $this->session->flashdata('moneda') == null) {  ?>
                                <option  value="" elected="">Elegir Moneda </option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('moneda') ?>  ">  <?php echo $this->session->flashdata('moneda') ?></option>
                                <?php } ?>
                                <option value="RD$">RD$</option>
                                <option value="US$">US$</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('moneda'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Precio','precio'); ?>
                            <?php $datos= array( 'type' => 'number','class' => 'form-control form-control-sm','name' => 'precio','id' => 'precio','value' => set_value('precio')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('precio'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Título','titulo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'titulo','id' => 'titulo','value' => set_value('titulo')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('titulo'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Descripción','descripcion'); ?>
                            <?php $datos= array( 'class' => 'form-control ','name' => 'descripcion','id' => 'descripcion','value' => set_value('descripcion'), 'rows' => '3','cols'=> '40' ); ?>
                            <?php echo form_textarea($datos); ?>
                            <?php if (form_error('descripcion')){  ?>
                            <span class="text-danger"><?php echo form_error('descripcion'); ?></span>
                            <?php  }  ?>
                        </div>


                        <div class="form-group" >
                            <?php echo form_submit( array( 'name' => 'crear', 'value' => 'Continuar', 'class' => 'btn btn-primary' ) ); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
           
        </div>
</div>

<script>
    
    window.addEventListener("load", suBcategoria);

/////////////////// escondiendo los datos/////////
    function suBcategoria() {
    
        var CategoriaPrincipal = document.getElementById("categoria");
        var categoria = CategoriaPrincipal.value;

        if(categoria == ''){
            window.location  =  "./";
        }else{
                document.getElementById("accesorio").style.display = 'none';
                document.getElementById("marca").style.display = 'none';
                document.getElementById("modelo").style.display = 'none';
                document.getElementById("tipo").style.display = 'none';
                document.getElementById("tamanoCuadro").style.display = 'none';
                document.getElementById("tamanoAro").style.display = 'none';

                  document.getElementById("accesorio").value = '';
                document.getElementById("marca").value = '';
                document.getElementById("modelo").value = '';
                document.getElementById("tipo").value = '';
                document.getElementById("tamanoCuadro").value = '';
                document.getElementById("tamanoAro").value = '';


            if(categoria == 'Accesorios')
            {
                document.getElementById("accesorio").style.display = 'block';
                document.getElementById("marca").style.display = 'block';
                document.getElementById("modelo").style.display = 'block';
            }
            else if(categoria == 'Bicicletas')
            {
                document.getElementById("tipo").style.display = 'block';
                document.getElementById("marca").style.display = 'block';
                document.getElementById("modelo").style.display = 'block';
                document.getElementById("tamanoCuadro").style.display = 'block';
                document.getElementById("tamanoAro").style.display = 'block';
            }
            else if(categoria == 'Componentes')
            {
                document.getElementById("tipo").style.display = 'block';
                document.getElementById("marca").style.display = 'block';
                document.getElementById("modelo").style.display = 'block';
            }
            else if(categoria == 'Bicicletas')
            {
               
            }
        }
    }



</script>

