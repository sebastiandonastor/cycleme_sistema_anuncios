<?php

setlocale(LC_ALL, 'es_ES');

?>
<div class="row " >
    <div class="col-sm col-lg-8" >
        <div class="col-sm bg-light plantilla-Anuncio" > 
            <div class="row tituloAnuncio titulo-plantilla justify-content-between">
                <div  class="titulo-encodigo" >
                    <h5  ><?php echo $infoAnuncio[0]['titulo']; ?></h5>
                </div>
                <div >
                    <i class="fas fa-tag"></i><?php echo $infoAnuncio[0]['precio']; ?>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-sm"  >
                    <div class="col-sm text-center"  >
                    <img onclick="imgGrande('/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>');" src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto[0];?>" width="180" height="200">
                        <div class="row imgDivStyle">
                        <?php $fotosTotal = sizeof($foto);
                                if($fotosTotal > 1){  
                                $fotoActual = 1;
                                foreach($foto as $fotico ){
                                    if($fotoActual <= $fotosTotal - 1){ ?>
                                    <div class="col-sm previeImg"  >
                                        <img onclick="imgGrande('/cycleme_sistema_anuncios/temp_img/<?php echo $foto[$fotoActual];?>');"  src="/cycleme_sistema_anuncios/temp_img/<?php echo $foto[$fotoActual];?>" width="55" height="55">   
                                    </div>
                                <?php }
                                $fotoActual++; 
                                } }?>
                        </div>
                    </div>
                </div>
                <div class="col-sm ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item2 rounded border-bottom"><span class="color">Provincia:</span> <?php echo $infoAnuncio[0]['provincia'];?></li>
                        <li class="list-group-item2 rounded border-bottom"><span class="color">Tel/Cel:</span> <?php echo $infoAnuncio[0]['telefono'];?></li>
                        <li class="list-group-item2 rounded border-bottom"><span class="color">Accion:</span> <?php echo $infoAnuncio[0]['accion'];?></li>
               

                        <div class="form-group" name="categoria" hidden >
                        <?php  form_label('Categoria:' ,'categoria');  ?>
                        <?php $datos= array( 'type' => 'text','class' => 'form-control form-control-sm','name' => 'categoria','id' => 'categoria','value' =>  $categoria , 'hidden'=>''); ?>
                        <?php echo form_input($datos); ?>
                        </div>
                        
                            <li style="display:none" id="accesorio" class="list-group-item2 rounded border-bottom"><span class="color">Accesorio:</span> <?php echo $infoAnuncio[0]['accesorio'];?></li>
                            <li style="display:none" id="modelo"  class="list-group-item2 rounded border-bottom"><span class="color">Modelo:</span> <?php echo $infoAnuncio[0]['modelo'];?></li>
                            <li style="display:none" id="marca" class="list-group-item2 rounded border-bottom"><span class="color">Marca:</span> <?php echo $infoAnuncio[0]['marca'];?></li>
                            <li style="display:none" id="tipo" class="list-group-item2 rounded border-bottom"><span class="color">Tipo:</span> <?php echo $infoAnuncio[0]['tipo'];?></li>
                            <li style="display:none" id="tamanoCuadro" class="list-group-item2 rounded border-bottom"><span class="color">Tamaño de Cuadro:</span> <?php echo $infoAnuncio[0]['tamanoCuadro'];?></li>
                            <li style="display:none" id="tamanoAro" class="list-group-item2 rounded border-bottom"><span class="color">Tamaño de Aro:</span> <?php echo $infoAnuncio[0]['tamanoAro'];?></li>
                     
                        <li class="list-group-item2 rounded border-bottom"><span class="color">Tiempo restante:</span> 

                        <?php 
                        $now = time(); // or your date as well
                        $your_date = strtotime($infoAnuncio[0]['fechaCaducidad']);
                        $datediff = $your_date - $now;

                        $end    = date_create($infoAnuncio[0]['fechaCaducidad']);
                        $start 	= date_create(); // Current time and date
                        $diff  	= date_diff( $start ,  $end );
                        
                        if($diff->days > 1){
                            echo  $diff->days. ' dias, ';
                        }else if ($diff->days == 1){
                            echo  $diff->days. ' dia, ';
                        }                       
                        if($diff->h > 1){
                            echo  $diff->h. ' horas y ';
                        }else if ($diff->h == 1){
                            echo  $diff->h. ' hora y ';
                        }   
                        if($diff->i > 1){
                            echo  $diff->i. ' minutos.';
                        }else if ($diff->i == 1){
                            echo  $diff->i. 'minuto.';
                        }   
           
                        ?> </li>
                    </ul>
                </div>
            </div>
            <div class="contenidoAnuncioPlantilla">
                <div class="row " >
                    <h5>Descripcion de Anuncio.</h5>
                </div>
                <div  class="row " >
                    <?php echo $infoAnuncio[0]['descripcion'];?>
                </div>
                <div class="row" >
                    <p>
                        <i class="far fa-chart-bar"></i> Cantidad Total de Visitas: <?php echo $infoAnuncio[0]['numeroVisitas'];?>
                    </p>
                 
                </div>
            </div>
        </div>
<!--         
        <div class="col-sm divPerfectoAnuncios" > 
            <div class="container estilo-border-sub anuncio-ver2">
                <h2 class="dotted">Dejar una Respuesta</h2>
                <p>Conectado como <a href="#"><?php echo $infoAnuncio[0]['nombre'];?></a>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <td><textarea name="comment" rows="4" cols="80" id="comment" class="required form-control" tabindex="4"></textarea></td>
                    </div>
                    <input type="submit" name="submit" value="Enviar" class="btn btn-info sub">
                </form>
            </div>
        </div>-->
    </div> 

    <div class="col-sm col-lg-4  divPerfecto" >

        <!-- aqui publicidad -->
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Anunciante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contacto</a>
                </li>
            </ul> <!--final de tabs-->

            <!-------------------------------perfil------------------------------------>

            <div class="tab-content border perfilPequeno bg-light" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-sm">
                            <div id="userphoto">
                                <p class='image-thumb'> <img src="<?php echo base_url('Assets/img/userIcon.png'); ?>" width="120" height="100"></p>
                            </div>
                        </div>
                        <div class="col-sm">
                              <h6>Anunciante:</h6>
                              <a href="<?php echo base_url()?>Anuncios/AnunciosUsuario/<?php echo $infoAnuncio[0]['idUsuario']; ?> " >
                                        <?php echo $infoAnuncio[0]['nombre'] ?>
                                    </a> 
                              <h6>Miembro Desde:</h6>                
                                <?php
                                     $date = date_create($infoAnuncio[0]['fechaCreacionUsr']);
                                     $fechaCreacion = date_create_from_format('Y-m-d H:i:s', $infoAnuncio[0]['fechaCreacionUsr']);
                                     echo strftime("%d de %B, %Y",$fechaCreacion->getTimestamp());
                                ?>
                        </div>
                    </div>
                    <div class="container">
                        <h6>Últimos artículos enumerados por <?php echo $infoAnuncio[0]['nombre'];?></h6>
                       <h4>
                       <a href="<?php echo base_url()?>Anuncios/AnunciosUsuario/<?php echo $infoAnuncio[0]['idUsuario']; ?> " >
                            <i class="fas fa-arrow-circle-right"></i>
                        </a> 
                       </h4>
                    </div>
                </div>


                <!-------------------------------contacta al creador------------------------------------>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <i class="fas fa-envelope" size="2x"> Para solicitar información sobre este anuncio, complete el siguiente formulario para enviar un mensaje al anunciante.</i>
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <br>
                        <div class="form-group">
                            <p class="contactar">Nombre:</p>
                            <input name="from_name" id="from_name" type="text" minlength="2" value="" class="text required espaciado form-control" />

                            <p class="contactar">Correo Electronico:</p>
                            <input name="form_email" id="form_email" type="text" value="" class="text required espaciado email form-control" />

                            <p class="contactar">Encabezado del mensaje:</p>
                            <input name="from_subject" id="from_subject" type="text" minlength="5" value="" class="text required espaciado form-control" />

                            <p class="contactar">mensaje:</p>
                            <td><textarea name="comment" rows="4" cols="80" id="comment" class="required form-control" tabindex="4"></textarea></td>
                        </div>
                        <input type="submit" name="submit" value="Enviar" class="btn btn-info sub">
                    </form>
                </div>


            </div> <!--final de zona perfil y contacto-->
        </div> <!--div final de perfil-->
        <div class="col-sm  " style="   text-align:center; ">
            <?php  foreach($publicidades as $publicidad){ ?>
                <div class="cols-sm col-lg bg-light text-center" id="publicidad">
                    <a href="<?php echo $publicidad['href']; ?> ">
                        <img style="max-width: 100%; max-height: 100%;" class="rounded"  src="/cycleme_sistema_anuncios/publicidad/<?php echo $publicidad['img']; ?> ">
                    </a>
                </div>
            <?php } ?>
        <div>
</div>
    <!-- row ooooooooooooooooooooooollllllllllllllllllddddddddddddddddddddddddddddddddddddy respuesta -->
<div class="modal fade" id="myModalImgDisplay"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
            <img  id="imgDentroDeModal" style="width:100%;max-width:300px" src="" alt="">  
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
          window.addEventListener("load", suBcategoria);
///////////////////modal de imagenes en grande////////////
    function imgGrande(img){
        var imgEnModal = document.getElementById('imgDentroDeModal');
        //imgEnModal.style ="width: 75% !important ; max-height: 85% !important ; overflow-y: hidden !important ;";
    
        imgEnModal.src = img;

        $('#myModalImgDisplay').modal('show');
    }

/////////////////// escondiendo los datos/////////
    function suBcategoria() {
    
        var categoria = document.getElementById("categoria");
     
            var categoriaActual = categoria.value;
          
          
            if(categoriaActual == 'Accesorios')
            {
                document.getElementById("accesorio").style.display = 'block';
                document.getElementById("marca").style.display = 'block';
                document.getElementById("modelo").style.display = 'block';
            }
            else if(categoriaActual == 'Bicicletas')
            {
                document.getElementById("tipo").style.display = 'block';
                document.getElementById("marca").style.display = 'block';
                document.getElementById("modelo").style.display = 'block';
                document.getElementById("tamanoCuadro").style.display = 'block';
                document.getElementById("tamanoAro").style.display = 'block';
            }
            else if(categoriaActual == 'Componentes')
            {
                document.getElementById("tipo").style.display = 'block';
                document.getElementById("marca").style.display = 'block';
                document.getElementById("modelo").style.display = 'block';
            }
            else if(categoriaActual == 'Servicios')
            {
               
            }
    
    }

</script>