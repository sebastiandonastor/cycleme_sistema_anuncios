<?php if($this->session->userdata('idUsuario') == null){
            redirect('Home');
        } 
?>

<div  class="crear-div "  >
<h4>Crear Anuncio</h4>
    <div class="text-black disabled"  >
        <ul class="nav nav-tabs justify-content-center"  >
            <li class="nav-item" >
                <a id="1" class="nav-link active show"  data-toggle="tab" href="#categoria">Selecione Categoria</a>
                <div class="iconoSi" id="1"  ><i class="far fa-check-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="2" class="nav-link" data-toggle="tab" href="#detallesDeAnuncio" >Detalles de Anuncio</a>
                <div   class="icono" id="3"  ><i class="far fa-circle"></i></div>
            </li>
            <li class="nav-item">
                <a id="3" class="nav-link" data-toggle="tab" href="#profile">Vista Previa</a>
                <div   class="icono" id="3"  ><i class="far fa-circle"></i></div>
                <div  class="iconoSi" id="3" style="display:none;" ><i class="far fa-check-circle"></i></div>
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
        <h6>Publicación gratuita.</h6>
        <div  id="myTabContent" class="tab-content ">
            <div class="tab-pane fade active show" id="categoria">
                <?php echo form_open(base_url('Anuncios/Crear'),array('class' => 'mt-4 mb-5 ')); ?>
                    <div class="form-group">
                        <select class="custom-select btn-mini small" id="categoriaPrincipal"  name="categoria"   >
                            <option  selected="">Elegir Categoría</option>
                            <option value="Accesorios">Accesorios</option>
                            <option value="Bicicletas">Bicicletas</option>
                            <option value="Componentes">Componentes</option>
                            <option value="Servicios">Servicios</option>
                        </select>
                    </div>

                    <div class="form-group"  name="Subcategorias"  >
                        <select class="custom-select btn-mini small" id="Accesorios"   name = "subCategoriaVista"  onchange="suBcategoria('Accesorios')" style="display:none;"  >
                            <option  value="vacio" selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Accesorios'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                        <select class="custom-select btn-mini small" id="Bicicletas" name = "subCategoriaVista"  onchange="suBcategoria('Bicicletas')" style="display:none;"   >
                            <option value="vacio"  selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Bicicletas'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                        <select class="custom-select btn-mini small" id="Componentes"  name = "subCategoriaVista"  onchange="suBcategoria('Componentes')" style="display:none;"  >
                            <option value="vacio"  selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Componentes'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                        <select class="custom-select btn-mini small" id="Servicios" name = "subCategoriaVista"   onchange="suBcategoria('Servicios')" style="display:none;"  >
                            <option value="vacio" selected="">Elegir Sub-Categoría</option>
                            <?php $categorias = $this->Anuncio_model->GetCategorias('Servicios'); ?>
                            <?php foreach($categorias as $info) { ?>
                            <option value=" <?php echo $info->categoria; ?> "> <?php echo $info->categoria; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                        <div class="form-group" hidden>
                            <input class="form-control form-control-sm"  name="subCategoria"  type="text"  id="subCategoria">
                        </div>
                    <div name="mainForm" id="mainForm" style="display:none;"  >
                        <div class="form-group" >
                            <?php echo form_submit( array( 'name' => 'crear', 'value' => 'Continuar', 'class' => 'btn btn-primary' ) ); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
            </div>
        </div>
</div>

<script>
   // object.addEventListener("change",checkMark);
    
    document.getElementById("categoriaPrincipal").addEventListener('change',categoria);
    window.addEventListener('load',categoria);
    window.addEventListener('load',elejir);


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
////////////////////////
    function categoria(evt) {
        var categoriaPrincipal = document.getElementById("categoriaPrincipal");
        var categoria = categoriaPrincipal.value;
        
        var select = document.getElementById(categoriaPrincipal.value);
        var todosSelect = document.querySelectorAll('select');

          var mainForm = document.getElementById("mainForm");
        
        for (var i=0; i<todosSelect.length; i++) 
        {
            if(todosSelect[i].id != 'categoriaPrincipal' && todosSelect[i].name == 'subCategoriaVista' ){
                todosSelect[i].style.display = 'none';
                todosSelect[i].value = 'vacio';
                mainForm.style.display = 'none';
            }
        }
        select.style.display = 'block';
    }
/////////////////// escondiendo select y botton /////////
    function suBcategoria(categoria) {
        var mainForm = document.getElementById("mainForm");

        var realCategoria = document.getElementById("subCategoria");

        var subCategoria = document.getElementById(categoria);
        mainForm.style.display = 'none';


        if(subCategoria.value != 'vacio'){
            mainForm.style.display = 'block';
            realCategoria.value = subCategoria.value;
        }else{
            mainForm.style.display = 'none';
            realCategoria.value = 'vacio';
        }
    }
    /////////////// mostrando boton cuando el usuario quiere cambiarlas caracteristicas
    function elejir(evt) {

        var categoriaPrincipal = document.getElementById("categoriaPrincipal");
        var categoria = categoriaPrincipal.value;

        var mainForm = document.getElementById("mainForm");
        
        var subCategoria = document.getElementById(categoria);
        mainForm.style.display = 'none';

        if(subCategoria.value != 'vacio'){
            mainForm.style.display = 'block';
        }else{
            mainForm.style.display = 'none';
        }
    }


</script>