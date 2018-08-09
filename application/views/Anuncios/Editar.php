

<?php if($this->session->userdata('idUsuario') == null || $this->session->userdata('idUsuario') != $this->session->tempdata('idUsuario_fk') ){
            redirect('Home');
        }  ?>

<div class="crear-div">
<h4>Editar Anuncio</h4>
                                        
    <div   class=" crear-div2 mx-auto" >


        <div  id="myTabContent" class="tab-content ">
            <div class="tab-pane fade active show">
                <?php echo form_open_multipart(base_url('Anuncios/Save/'.$this->session->tempdata('idAnuncio')),array('class' => 'mt-4 mb-5 ')); ?>

                    <div class="form-group" name="idUsuario_fk" hidden >
                        <?php form_label('...:' ,'idUsuario_fk'); $poder =   $this->session->tempdata('idUsuario_fk'); ?>
                        <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'idUsuario_fk','id' => 'idUsuario_fk','value' =>  $poder , 'hidden'=>''); ?>
                    </div>

                    <div class="form-group" name="idCategorias_fk" hidden >
                        <?php echo form_label('..:' ,'idCategorias_fk'); $poder =   $this->session->tempdata('idCategorias_fk'); ?>
                        <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'idCategorias_fk','id' => 'idCategorias_fk','value' =>  $poder , 'hidden'=>''); ?>
                        <?php echo form_input($datos); ?>
                    </div>

                    <div class="form-group" name="categoria" hidden >
                        <?php echo form_label('Categoria:' ,'categoria'); $poder =   $this->session->tempdata('categoria'); ?>
                        <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'categoria','id' => 'categoria','value' =>  $poder , 'hidden'=>''); ?>
                        <?php echo form_input($datos); ?>
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
                                <<?php if( $this->session->tempdata('marca') == null) {  ?>
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
                            <?php echo form_label('Modelo','modelo'); $poder = $this->session->tempdata('modelo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'modelo','value' => $poder ); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('modelo'); ?></span>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle" id="tipo">
                            <?php echo form_label('Tipo','tipo'); $poder = $this->session->tempdata('tipo'); ?>
                            <select class="custom-select btn-mini small" name="tipo" value="<?php echo $poder  ?>" >
                                <?php if( $this->session->tempdata('tipo')  == null) {  ?>
                                <option value="" selected="">Elegir Tipo</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder ?>  ">  <?php echo $poder   ?></option>
                                <?php } $tipos = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($tipos as $info) { if($info->tipo != null)  {?>
                                <option value=" <?php echo $info->tipo; ?> "> <?php echo $info->tipo; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tipo'); ?></span>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle" id="tamanoAro">
                            <?php echo form_label('Tamaño de Aro','tamanoAro'); $poder = $this->session->tempdata('tamanoAro'); ?>
                            <select class="custom-select btn-mini small"  name="tamanoAro" value="<?php echo $poder ?>" >
                                <?php if( $poder == null) {  ?>
                                <option value="" selected="">Elegir Tamaño de Aro</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder ?>  ">  <?php echo $poder ?></option>
                                <?php } $tipos = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($tipos as $info) { if($info->tamanoAro != null)  {?>
                                <option value=" <?php echo $info->tamanoAro; ?> "> <?php echo $info->tamanoAro; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tamanoAro'); ?></span>
                        </div>
                        <div class="form-group" style="display:none;"  name="detalle" id="tamanoCuadro"> 
                            <?php echo form_label('Tamaño de Cuadro','tamanoCuadro'); $poder = $this->session->tempdata('tamanoCuadro'); ?>
                            <select class="custom-select btn-mini small"  name="tamanoCuadro" value="<?php echo $poder ?>" >
                                <?php if( $poder == null) {  ?>
                                <option value="" selected="">Elegir Tamaño de Cuadro</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder ?>  ">  <?php echo $poder ?></option>
                                <?php } $tipos = $this->Anuncio_model->GetDetalles(); ?>
                                <?php foreach($tipos as $info) { if($info->tamanoCuadro != null)  {?>
                                <option value=" <?php echo $info->tamanoCuadro; ?> "> <?php echo $info->tamanoCuadro; ?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('tamanoCuadro'); ?></span>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('Provincia','provincia'); $poder = $this->session->tempdata('provincia'); ?>
                            <select class="custom-select btn-mini small" id="provincia" name="provincia" >
                                <?php if( $poder == null) {  ?>
                                <option value="" selected="">Elegir Provincia</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder ?>  ">  <?php echo $poder ?></option>
                                <?php } $provincias = $this->Anuncio_model->GetProvincias(); ?>
                                <?php foreach($provincias as $info) { ?>
                                <option value=" <?php echo $info->provincia; ?> "> <?php echo $info->provincia; ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('provincia'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Celular/Telefono','telefono'); $poder = $this->session->tempdata('telefono');?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'telefono','id' => 'telefono','value' => $poder); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('telefono'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Accíon','accion'); $poder = $this->session->tempdata('accion'); ?>
                            <select class="custom-select btn-mini small" id="accion" name="accion" value="<?php echo $poder ?>" >
                                <?php if( $poder == null) {  ?>
                                <option value="" selected="">Elegir Accíon </option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder ?>  ">  <?php echo $poder ?></option>
                                <?php } ?>
                                <option value="Vender">Vender</option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alquilar">Alquilar</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('accion'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Moneda','moneda'); $poder = $this->session->tempdata('moneda'); ?>
                            <select class="custom-select btn-mini  small" id="moneda" name="moneda" value="<?php echo $poder ?>" >
                                <?php if( $poder == null) {  ?>
                                <option  value="" elected="">Elegir Moneda </option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $poder  ?>  ">  <?php echo $poder  ?></option>
                                <?php } ?>
                                <option value="RD$">RD$</option>
                                <option value="US$">US$</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('moneda'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Precio','precio'); $poder = $this->session->tempdata('precio'); ?>
                            <?php $datos= array( 'type' => 'number','class' => 'form-control form-control-sm','name' => 'precio','id' => 'precio','value' => $poder); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('precio'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <?php echo form_label('Título','titulo');  $poder = $this->session->tempdata('titulo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'titulo','id' => 'titulo','value' => $poder); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('titulo'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Descripción','descripcion');  $poder = $this->session->tempdata('descripcion'); ?>
                            <?php $datos= array( 'class' => 'form-control ','name' => 'descripcion','id' => 'descripcion','value' => $poder, 'rows' => '3','cols'=> '40' ); ?>
                            <?php echo form_textarea($datos); ?>
                            <?php if (form_error('descripcion')){  ?>
                            <span class="text-danger"><?php echo form_error('descripcion'); ?></span>
                            <?php  }  ?>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">

                                <?php echo form_upload(array(
                                       'class' => 'form-control-file custom-file-input',
                                       'multiple' => 'true',
                                       'name' => 'upload[]',
                                       'lang' => 'es',
                                       'id'=>'file-input',
                                       'type'=>'file'
                                    )
                                ); ?>

                                <?php echo form_label('Subir Archivo','img_subir',array('class' => 'custom-file-label')) ?>
                            </div>
                            <?php if (form_error('upload[]')){  ?>
                                <span class="text-danger"><?php echo form_error('upload[]'); ?></span>
                            <?php  }  ?>
                            <div id="preview">
                                <?php foreach($this->session->tempdata('foto') as $foto){ ?>
                                    <img src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto?>" style="height:100px;padding:5px;" >
                                <?php } ?>
                            </div>
                        </div>
                        <br>
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
    function previewImages() {

var preview = document.querySelector('#preview');
preview.innerHTML = "";
if (this.files) {
  [].forEach.call(this.files, readAndPreview);
}

function readAndPreview(file) {
        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " No es un tipo de img soportado.");
        } // else...
        
        var reader = new FileReader();
        
        reader.addEventListener("load", function() {
            var image = new Image();
            image.height = 100;
            image.title  = file.name;
            image.src    = this.result;
            image.style = 'padding:5px';
          
            preview.appendChild(image);
        }, false);
        
        reader.readAsDataURL(file);
    }
}

document.querySelector('#file-input').addEventListener("change", previewImages, false);



</script>

