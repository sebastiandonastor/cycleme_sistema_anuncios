<div  class="crear-div "  >
<h4>Crear Anuncio</h4>
    <div class="text-black">
        <ul class="nav nav-tabs justify-content-center" >
            <li class="nav-item" >
                <a id="1" class="nav-link active show"  data-toggle="tab" href="#categoria">Selecione Categoria</a>
                <div class="iconoSi" id="1"  ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="2" class="nav-link" data-toggle="tab" href="#home" >Detalles de Anuncio</a>
                <div   class="icono" id="2"  ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="2" style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="3" class="nav-link" data-toggle="tab" href="#profile">Vista Previa</a>
                <div   class="icono" id="3"  ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="3" style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="4" class="nav-link"  data-toggle="tab" href="#">Opciones/Mejora</a>
                <div   class="icono" id="4" ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="4"style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="5" class="nav-link" data-toggle="tab" href="#">Listo!</a>
                <div   class="icono" id="5"  ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="5" style="display:none;" ><i class="far fa-check-circle"></i></div>
            </li>
        </ul>
    </div>
                                        
    <div   class=" crear-div2 mx-auto" >
       <h6>Los Anuncios solo duraran 45 días.</h6>
       <h6>Costo Por Listado:</h6><p>Ninguno, de querer descatar anuncion sera diferente.</p>

        <div  id="myTabContent" class="tab-content ">
            <div class="tab-pane fade active show" id="categoria">
                <?php echo form_open(base_url('Anuncios/Crear'),array('class' => 'mt-4 mb-5 ')); ?>
                    <div class="form-group">
                        <select class="custom-select btn-mini small" id="categoriaPrincipal"  name="categoriaPrincipal" required >
                        <option selected="">Elegir Categoría</option>
                        <option value="Accesorios">Accesorios</option>
                        <option value="Bicicletas">Bicicletas</option>
                        <option value="Componentes">Componentes</option>
                        <option value="Servicios">Servicios</option>
                        </select>
                    </div>
                    <div class="form-group"  name="Subcategorias"  >

                        <select class="custom-select btn-mini small" id="Accesorios" name="subCategoria" style="display:none;"  >
                            <option selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Accesorios'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                        <select class="custom-select btn-mini small" id="Bicicletas" name="subCategoria" style="display:none;"   >
                            <option selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Bicicletas'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                        <select class="custom-select btn-mini small" id="Componentes" name="subCategoria"  style="display:none;"  >
                            <option selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Componentes'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                        <select class="custom-select btn-mini small" id="Servicios" name="subCategoria"  style="display:none;"  >
                            <option selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Servicios'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div name="mainForm" id="mainForm">

                        <div class="form-group">
                            <?php echo form_label('Accesorio','accesorio'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'accesorio','id' => 'precio','accesorio' => set_value('accesorio')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('accesorio'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Marca','marca'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'marca','id' => 'precio','marca' => set_value('marca')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('marca'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Modelo','modelo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'modelo','id' => 'precio','modelo' => set_value('modelo')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('modelo'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Tipo','tipo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'tipo','id' => 'precio','tipo' => set_value('tipo')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('tipo'); ?></span>
                        </div>



                        <div class="form-group">
                            <?php echo form_label('Provincia','provincia'); ?>
                            <select class="custom-select btn-mini small" id="provincia" name="provincia" value="<?php set_value('provincia') ?>" >
                                <option selected="">Elegir Provincia</option>
                                <?php $provincias = $this->Anuncio_model->GetProvincias(); ?>
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
                                <option selected="">Elegir Accíon </option>
                                <option value="Vender">Vender</option>
                                <option value="Comprar">Comprar</option>
                                <option value="Alquilar">Alquilar</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('accion'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Moneda','moneda'); ?>
                            <select class="custom-select btn-mini  small" id="accion" name="accion" value="<?php set_value('accion') ?>" >
                                <option selected="">Elegir Moneda </option>
                                <option value="RD$">RD$</option>
                                <option value="US$">US$</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('accion'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Precio','precio'); ?>
                            <?php $datos= array( 'type' => 'number','class' => 'form-control form-control-sm','name' => 'precio','id' => 'precio','value' => set_value('precio')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('precio'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Título','titulo'); ?>
                            <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'titulo','id' => 'precio','titulo' => set_value('titulo')); ?>
                            <?php echo form_input($datos); ?>
                            <span class="text-danger"><?php echo form_error('titulo'); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Descripción','descripcion'); ?>
                            <?php $datos= array( 'class' => 'form-control ','name' => 'descripcion','id' => 'precio','descripcion' => set_value('descripcion'), 'rows' => '3','cols'=> '40' ); ?>
                            <?php echo form_textarea($datos); ?>
                            <span class="text-danger"><?php echo form_error('descripcion'); ?></span>
                        </div>


                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="tab-pane fade" id="profile">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
            </div>
            <div class="tab-pane fade" id="dropdown1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
            </div>
            <div class="tab-pane fade" id="dropdown2">
                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
            </div>
            </div>
        </div>
</div>

<script>
   // object.addEventListener("change",checkMark);

    document.getElementById("categoriaPrincipal").addEventListener("change", categoria);

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

    function categoria() {
        var categoriaPrincipal = document.getElementById("categoriaPrincipal");
        var categoria = categoriaPrincipal.value;
        
        var select = document.getElementById(categoriaPrincipal.value);
        var todosSelect = document.querySelectorAll('select');

        for (var i=0; i<todosSelect.length; i++) 
        {
            if(todosSelect[i].id != 'categoriaPrincipal' && todosSelect[i].name == 'subCategoria' ){
                todosSelect[i].style.display = 'none';
            }
        }
        select.style.display = 'block';
    }

</script>