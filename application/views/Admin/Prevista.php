<div class="container mt-3">
    <?php if(validation_errors() != ''): ?>
        <div class="alert alert-danger alert-dismissible fade show"><?php echo validation_errors(); ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>
    <?php endif;?>
    <?php echo form_open_multipart('Admin/Exito');?>
    <textarea cols="80" id="editor1" name="editor1" rows="10" >
    <?php echo $this->session->tempdata('datos')['editor1']; ?>

</textarea>
    <div class="text-center">
    <img id="output" style="max-width: 200px; max-height: 200px;">
        <div class="custom-file">
            <?php echo form_upload(array(
                    'class' => 'form-control-file custom-file-input',
                    'multiple' => 'true',
                    'name' => 'upload[]',
                    'lang' => 'es',
                    'id'=>'file-input',
                    'type'=>'file',
                    'onChange' => 'loadFile(event)'
                )
            ); ?>
            <?php echo form_label('Subir Archivo','img_subir',array('class' => 'custom-file-label')) ?>
        </div>

    <div class="text-center mt-2">
        <?php echo form_submit(array(
            'name' => 'createNoticia',
            'value' => 'Crear Noticia',
            'class' => 'btn btn-success btn-lg'
        ));?>
    </div>


    <?php echo form_close(); ?>

</div>
<script>
    CKEDITOR.dtd.$removeEmpty['h1'] = true;

    CKEDITOR.config.youtube_height = '500';
    CKEDITOR.config.youtube_width = '550';
    CKEDITOR.config.youtube_responsive = true;
    CKEDITOR.config.youtube_autoplay = false;

    CKEDITOR.config.autoGrow_onStartup = true;
    CKEDITOR.config.autoGrow_minHeight = 500;
    CKEDITOR.replace( 'editor1', {
        extraPlugins: 'justify,button,dialog,panel,panelbutton,floatpanel,colorbutton,listblock,font,autogrow,youtube',
        removePlugins: 'image,easyimage'

    } );


    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };


</script>