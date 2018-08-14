<div class="container mt-3">
<?php echo form_open('Admin/validarNoticia');?>
<textarea cols="80" id="editor1" name="editor1" rows="10" >

<h1 style="text-align:center"><span style="font-family:Tahoma,Geneva,sans-serif"><span style="color:#3498db"><span style="font-size:72px">Titulo</span></span></span></h1>

<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:22px">Noticia super mega duper hiper a la maxima potencia</span></span></p>

<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:22px">importante para el bien de la humanidad como lo fue</span></span></p>

<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:22px">la gran conocida y aclamada pelea de naruto vs sasuke</span></span></p>

<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:22px">en la cual naruto le dio una paliza a sasuke muy bien merecida</span></span></p>

<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:22px">ya que el es un emo vengador uhija naduto chippuden chin chun</span></span></p>

<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:22px">chinitos pim pum jaopneses hihihi amadis paseme con&nbsp;A</span></span></p>

<p style="text-align:center">&nbsp;</p>


</textarea>
    <div class="text-center mt-2">
    <?php echo form_submit(array(
            'name' => 'continuar',
            'value' => 'continuar',
            'class' => 'btn btn-info btn-lg'
    ));?>
    </div>
<?php echo form_close(); ?>

</div>
<?php if(validation_errors() != ''): ?>
<span class="alert alert-danger"><?php echo validation_errors(); ?></span>
<?php endif;?>
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


</script>
