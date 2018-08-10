<br><br>
<div class="row">
    <!-- row izquierdo de anuncio y respuesta -->
    <div class="col-lg-8">
        <div class="container estilo-border-sub anuncio-ver">
            <div class="row">
                <div class="col-lg-9">
                    <h5><a href="#"><?php echo $infoAnuncio[0]['titulo']; ?></a></h5>
                </div>
                <div class="col-lg-3">
                    <div class="tags price-wrap">
                        <span class="badge badge-info"><p class=""><?php echo $infoAnuncio[0]['precio']; ?></p></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <br>

                    <a href="#" title="Prueba" class="preview" data-rel="#"><img width="200" height="200" src="/cycleme_sistema_anuncios/temp_img/<?php echo $infoAnuncio[0]['foto'];?>" class="attachment-ad-medium size-ad-medium" alt="promo 2 croco" srcset="" sizes="(max-width: 250px) 100vw, 250px" /></a>
                </div> <!-- fin row img -->

                <div class="col-lg-6">

                    <br>
                    <ul>
                        <li><span class="color">Provincia:</span> <?php echo $infoAnuncio[0]['provincia'];?></li>
                        <li><span class="color">Tel / Cel:</span> <?php echo $infoAnuncio[0]['telefono'];?></li>
                        <li><span class="color">Accesorio:</span> <?php echo $infoAnuncio[0]['accesorio'];?></li>
                        <li><span class="color">Marca:</span> <?php echo $infoAnuncio[0]['marca'];?></li>
                        <li><span class="color">Modelo:</span> <?php echo $infoAnuncio[0]['modelo'];?></li>
                        <li><span class="color">Accion:</span> <?php echo $infoAnuncio[0]['accion'];?></li>
                        <li><span class="color">Caduca:</span> <?php echo $infoAnuncio[0]['fechaCaducidad'];?></li>
                    </ul>

                </div>

                <div>
                    <br>
                    <p><strong>Descripcion</strong></p>
                    <p><?php echo $infoAnuncio[0]['descripcion']; ?></p>
                </div>

                <br>
                <p><i class="fas fa-chart-bar"> <?php echo $infoAnuncio[0]['numeroVisitas']; ?> total vistas</i></p>

                <div class="clr"></div>
            </div> <!-- fin row texto -->
        </div> <!-- fin row de anuncios individuales -->

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


    </div> <!-- fin del row de anuncios -->


    <!-- row derecho de vendedor y publicidades -->
    <div class="col-lg-4">
        <!-- aqui publicidad -->
        <br>
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

            <div class="tab-content border perfilPequeno" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-lg-4">
                            <br>
                            <div id="userphoto">
                                <p class='image-thumb'><img alt='' src='https://secure.gravatar.com/avatar/bedc9843e5f998be04d94eae87ec0fae?s=140&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/bedc9843e5f998be04d94eae87ec0fae?s=280&amp;d=mm&amp;r=g 2x' class='avatar avatar-140 photo' height='100' width='100' /></p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <br>
                            <span> <strong> Listado por:</strong></span>
                            <br><a href="https://repecho.com/author/gomezjl/"><?php echo $infoAnuncio[0]['nombre'];?></a>
                            <br>
                            <span> <strong> Miembro Desde:</strong></span><br>
                                <?php
                                $string=date_create($infoAnuncio[0]['fechaCreacionUsr']);
                                echo date_format($string,'Y-m-d');
                                ?>
                        </div>
                    </div><br>
                    <div class="container">
                        <h5>Otros artículos enumerados por <?php echo $infoAnuncio[0]['nombre'];?></h5>
                        <ul>
                            <li>No se encontraron otros anuncios para este anunciante.</li>
                        </ul>
                        <p>Últimos artículos enumerados por <?php echo $infoAnuncio[0]['nombre'];?> &raquo;</p>
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

        <!-------------------------------publicidad------------------------------------>
        <div>
            <div class="estilo-border-sub espacioEntrePublicidad">
                <!-- para poner la publicidad se debe quitar el padding de styles de espacioEntrePublicidad -->
            </div>

            <div class="estilo-border-sub espacioEntrePublicidad">
                <!-- para poner la publicidad se debe quitar el padding de styles  de espacioEntrePublicidad-->
            </div>
        </div> <!-- espacio de la publicidad -->

    </div> <!--terminio del lado derecho-->

</div>