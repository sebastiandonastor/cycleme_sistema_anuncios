<?php if($this->session->userdata('idUsuario') == null  ){
            redirect('Home');
        }  ?>

<div  class="crear-div ">
<h4>Crear Anuncio</h4>
    <div class="text-black disabled">
        <ul class="nav nav-tabs justify-content-center" >
            <li class="nav-item" >
                <a id="1" class="nav-link"  data-toggle="tab" href="#categoria">Selecione Categoria</a>
                <div class="iconoSi" id="1"  ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="2" class="nav-link " data-toggle="tab" href="#detallesDeAnuncio" >Detalles de Anuncio</a>
                <div  class="iconoSi" id="2"  ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="3" class="nav-link active show" data-toggle="tab" href="#profile">Vista Previa</a>
                <div  class="iconoSi" id="3"  ><i class="far fa-check-circle"></i></div>
            </li>
            <!-- <li class="nav-item">
                <a id="4" class="nav-link"  data-toggle="tab" href="#">Opciones/Mejora</a>
                <div   class="icono" id="4" ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="4"style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li> -->
            <li class="nav-item">
                <a id="5" class="nav-link" data-toggle="tab" href="#">Listo!</a>
                <div   class="icono" id="5"  ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="5" style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li>
        </ul>
    </div>
                                        
    <div   class=" crear-div2 mx-auto" >
       <h6>Los Anuncios solo duraran 45 días.</h6>

        <div  id="myTabContent" class="tab-content ">
            <div class="tab-pane fade active show">
                <?php echo form_open_multipart(base_url('Anuncios/Prevista'),array('class' => 'mt-4 mb-5 ')); ?>
               
                    <div class="form-group" name="categoria" >
                        <?php echo form_label('Categoria: '. $this->session->tempdata('categoria')); $poder = $this->session->tempdata('categoria'); ?>
                        <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'categoria','id' => 'categoria','value' =>  $poder , 'hidden'=>'true'); ?>
                        <?php echo form_input($datos); ?>
                    </div>
                    <div name="mainForm" id="mainForm" >
                        <div class="form-group" style="display:none;" name="detalle" id="accesorio">
                            <?php echo form_label('Accesorio: '. $this->session->tempdata('accesorio')); $poder = $this->session->tempdata('accesorio'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'accesorio','id' => 'accesorio','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                       <div class="form-group" style="display:none;" name="detalle" id="marca">
                            <?php echo form_label('Marca: '. $this->session->tempdata('marca')); $poder = $this->session->tempdata('marca'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'marca','id' => 'marca','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle"  id="modelo">
                            <?php echo form_label('Modelo: '. $this->session->tempdata('modelo')); $poder = $this->session->tempdata('modelo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'modelo','id' => 'modelo','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle" id="tipo">
                            <?php echo form_label('Tipo: '. $this->session->tempdata('tipo')); $poder = $this->session->tempdata('tipo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'tipo','id' => 'tipo','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group" style="display:none;" name="detalle" id="tamanoAro">
                            <?php echo form_label('Tamaño de Aro: '. $this->session->tempdata('tamanoAro')); $poder = $this->session->tempdata('tamanoAro'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'tamanoAro','id' => 'tamanoAro','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group" style="display:none;"  name="detalle" id="tamanoCuadro"> 
                            <?php echo form_label('Tamaño de Cuadro: '. $this->session->tempdata('tamanoCuadro')); $poder = $this->session->tempdata('tamanoCuadro'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'tamanoCuadro','id' => 'tamanoCuadro','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Provincia: '. $this->session->tempdata('provincia')); $poder = $this->session->tempdata('provincia'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'provincia','id' => 'provincia','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Celular/Telefono: '. $this->session->tempdata('telefono')); $poder = $this->session->tempdata('telefono'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'telefono','id' => 'telefono','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Accíon: '. $this->session->tempdata('accion')); $poder = $this->session->tempdata('accion'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'accion','id' => 'accion','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Moneda: '. $this->session->tempdata('moneda')); $poder = $this->session->tempdata('moneda'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'moneda','id' => 'moneda','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Precio: '. $this->session->tempdata('precio')); $poder = $this->session->tempdata('precio'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'precio','id' => 'precio','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Título: '. $this->session->tempdata('titulo')); $poder = $this->session->tempdata('titulo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'titulo','id' => 'titulo','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Descripción: '. $this->session->tempdata('descripcion')); $poder = $this->session->tempdata('descripcion'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'descripcion','id' => 'descripcion','value' =>  $poder , 'hidden'=>'true'); ?>
                            <?php echo form_input($datos); ?>
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
                            <div id="preview"></div>
                        </div>

                        <div class="form-group" >
                            <a href="./" class="btn btn-danger">Reiniciar</a>
                            <?php echo form_submit( array( 'name' => 'crear', 'value' => 'Continuar', 'class' => 'btn btn-primary' ) ); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
</div>

<script>

  
  window.addEventListener("load", suBcategoria);

  
function checkMark(){
    var seleccionado = document.getElementsByClassName("nav-link active show");
    id = seleccionado[0].id;
  
    var iconoNo = document.querySelectorAll('.icono');
    var iconoSi = document.querySelectorAll('.iconoSi');

    for (var i=0; i<iconoNo.length; i++) 
    {
        if(iconoNo[i].id <= id )
        {
            iconoNo[i].style.display = 'none';
        }
    }
    for (var i=0; i<iconoSi.length; i++) 
    {
        if(iconoSi[i].id <= id )
        {
            iconoSi[i].style.display = 'block';
        }
    }
}
/////////////////// escondiendo los datos/////////
function suBcategoria() {

    var subCategoria = document.getElementById("subCategoria");
    var CategoriaPrincipal = document.getElementById("categoria");
    categoria = CategoriaPrincipal.value;

    if(categoria == ''){
        window.location  = "./";
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