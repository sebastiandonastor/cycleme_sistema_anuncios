<?php if($this->session->userdata('idUsuario') == null || $this->session->userdata('tipoUsuario') != 'admin'){
            redirect('Home');
        }    ?>

    
       
    <div  class=" crear-div2 mx-auto text-center" >
            <h4>Crear Publicidad</h4>
                <?php echo form_open_multipart(base_url('Publicidad/CrearOEditar'),array('class' => 'mt-4 mb-5 ')); ?>
                    <div name="mainForm" id="mainForm" >
                        <div class="form-group" style="display:none;" name="idPublicidad"  id="idPublicidad">
                            <?php  form_label('Modelo','idPublicidad'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'idPublicidad','value' => $this->session->flashdata('idPublicidad') ); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group"name="titulo" id="titulo">
                            <?php echo form_label('Título','titulo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'titulo','id' => 'titulo','value' => $this->session->flashdata('titulo'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('titulo'); ?></span>
                        </div>
                        <div class="form-group"  name="href"  id="href">
                            <?php echo form_label('Enlace de Publicidad','href'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'href','value' => $this->session->flashdata('href'),'autocomplete'=>'off'); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('href'); ?></span>
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
                                    <?php if($this->session->flashdata('img') != null){ ?>
                                        <img src="/cycleme_sistema_anuncios/publicidad/<?php echo $this->session->flashdata('img'); ?>" style="height:100px;padding:5px;" >
                                    <?php } ?>
                                </div>
                        </div>
                        <div class="form-group" >
                            <?php echo form_submit( array( 'name' => 'crear', 'value' => 'Enviar', 'class' => 'btn btn-primary' ) ); ?>
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