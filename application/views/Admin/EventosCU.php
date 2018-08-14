<?php if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }    ?>

    
       
    <div  class=" crear-div2 mx-auto text-center" >
            <h4>Crear Evento</h4>
                <?php echo form_open_multipart(base_url('Eventos/CrearOEditar'),array('class' => 'mt-4 mb-5 ')); ?>
                    <div name="mainForm" id="mainForm" >
                        <div class="form-group" style="display:none;" name="idEventos"  id="idEventos">
                            <?php  form_label('','idEventos'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'idEventos','value' => $this->session->flashdata('idEventos') ); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                       <div class="form-group row">
                            <div class=" col-sm" name="fechaEvento" id="fechaEvento">
                                <?php echo form_label('Fecha de Evento','fechaEvento'); ?>
                                <?php $datos= array( 'type' => 'date','class' => 'form-control form-control-sm','name' => 'fechaEvento','id' => 'fechaEvento','value' => $this->session->flashdata('fechaEvento'),
                                'value'=> date("Y-m-d") , 'min'=>date("Y-m-d")); ?>
                                <?php echo form_input($datos); ?>
                                <span class="text-danger"><?php echo form_error('fechaEvento'); ?></span>
                            </div>
                            <div class=" col-sm" name="hora" id="hora">
                                <?php echo form_label('Hora de Evento','hora'); 
                                if($this->session->flashdata('hora') == null){
                                    $value = date("Y-m-d");
                                }else{
                                    $value = $this->session->flashdata('hora');
                                    }?>
                                <?php $datos= array( 'type' => 'time','class' => 'form-control form-control-sm','name' => 'hora',
                                'id' => 'hora', 'value'=> $value, 'min'=>date("Y-m-d")); ?>
                                <?php echo form_input($datos); ?>
                                <span class="text-danger"><?php echo form_error('hora'); ?></span>
                            </div>    
                        </div>
                        <div class="form-group" name="nombreEven" id="nombreEven">
                            <?php echo form_label('Nombre de Evento','nombreEven'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'nombreEven','id' => 'nombreEven','value' => $this->session->flashdata('nombreEven'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('nombreEven'); ?></span>
                        </div>
                        <div class="form-group" name="lugar" id="lugar">
                            <?php echo form_label('Lugar de Evento','lugar'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'lugar','id' => 'lugar','value' => $this->session->flashdata('lugar'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('lugar'); ?></span>
                        </div>
                        <div class="form-group" name="lat" id="lat">
                            <?php echo form_label('Latitud de Ubicación','lat'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'lat','id' => 'lat','value' => $this->session->flashdata('lat'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('lat'); ?></span>
                        </div>
                        <div class="form-group" name="lng" id="lng">
                            <?php echo form_label('Longitud de Ubicación','lng'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'lng','id' => 'lng','value' => $this->session->flashdata('lng'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('lng'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Tipo','tipo'); ?>
                            <select class="custom-select btn-mini  small" id="tipo" name="tipo" value="<?php echo $this->session->flashdata('tipo') ?>" >
                                <?php if( $this->session->flashdata('tipo') == null) {  ?>
                                <option  value="" elected="">Elegir Tipo</option>
                                <?php } else {  ?>
                                <option selected="" value=" <?php echo $this->session->flashdata('tipo') ?>  ">  <?php echo $this->session->flashdata('tipo') ?></option>
                                <?php } ?>
                                <option value="Ruta">Ruta</option>
                                <option value="MTB">Mountain Bike</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('tipo'); ?></span>
                        </div>
                        <div class="form-group"  name="href"  id="href">
                            <?php echo form_label('Enlace de Informacion','href'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'href','value' => $this->session->flashdata('href'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('href'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Descripción','descripcion'); ?>
                            <?php $datos= array( 'class' => 'form-control ','name' => 'descripcion','id' => 'descripcion','value' => $this->session->flashdata('descripcion'), 'rows' => '3','cols'=> '40' ); ?>
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
                                    <?php if($this->session->flashdata('imagen') != null){ ?>
                                        <img src="/cycleme_sistema_anuncios/temp_img/<?php echo $this->session->flashdata('imagen'); ?>" style="height:100px;padding:5px;" >
                                    <?php } ?>
                                </div>
                        </div>
                        <div class="form-group" >
                            <?php echo form_submit( array( 'name' => 'crear', 'value' => 'Crear', 'class' => 'btn btn-primary' ) ); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
           

<script>

    document.querySelector('#file-input').addEventListener("change", previewImages, false);

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

</script>