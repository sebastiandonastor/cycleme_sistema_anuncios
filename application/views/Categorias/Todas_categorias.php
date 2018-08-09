<br><br>

<div class="row">
    <div class="col-lg-9">
        
        <div class="container estilo-border rounded">
            <div class="container">
                <h1 class="single dotted">Categorias de Anuncios</h1>
                <div class="row">

                    <div class="col-lg-6">
                        <h5><a href="<?php echo base_url('Home/categorias_principales/Accesorios') ?>">Accesorios</a> (<?php echo $AccesoriosNum ?>)</h5>
                        <?php
                            $results = $this->Categoria_model->listar_categorias("Accesorios");

                            foreach ($results as $result) {
                                $nombre=$result['categoria'];
                                $number = $this->Categoria_model->subCategoriasNum($nombre);
                                echo <<<TR
                                <ul>
                                    <li class="black_circle" ><a href="categorias_secundarias/{$nombre}">{$nombre}</a> ($number)</li>
                                </ul>
                                
TR;
                            }
                        
                        ?>
                        <br>
                        <h5><a href="<?php echo base_url('Home/categorias_principales/Bicicletas') ?>">Bicicletas</a> (<?php echo $BicicletasNum ?>)</h5>
                        <?php
                            $results = $this->Categoria_model->listar_categorias("Bicicletas");

                            foreach ($results as $result) {
                                $nombre=$result['categoria'];
                                $number = $this->Categoria_model->subCategoriasNum($nombre);
                                echo <<<TR
                                <ul>
                                    <li class="black_circle" ><a href="#">{$nombre}</a> ($number)</li>
                                </ul>
                            
TR;
                            }
                        
                        ?>


                        <div class="clr"></div>
                    </div> <!-- Fin de la primera columna -->


                    <div class="col-lg-6">
                        <h5><a href="<?php echo base_url('Home/categorias_principales/Componentes') ?>">Componentes</a> (<?php echo $ComponentesNum ?>)</h5>
                        <?php
                            $results = $this->Categoria_model->listar_categorias("Componentes");

                            foreach ($results as $result) {
                                $nombre=$result['categoria'];
                                $number = $this->Categoria_model->subCategoriasNum($nombre);
                                echo <<<TR
                                <ul>
                                    <li class="black_circle" ><a href="#">{$nombre}</a> ($number)</li>
                                </ul>    
TR;
                            }
                        ?>
                        <br>
                        <h5><a href="<?php echo base_url('Home/categorias_principales/Servicios') ?>">Servicios</a> (<?php echo $ServiciosNum ?>)</h5>
                        <?php
                            $results = $this->Categoria_model->listar_categorias("Servicios");
                            
                            foreach ($results as $result) {
                                $nombre=$result['categoria'];
                                $number = $this->Categoria_model->subCategoriasNum($nombre);
                                echo <<<TR
                                <ul>
                                    <li class="black_circle" ><a href="#">{$nombre}</a> ($number)</li>
                                </ul>   
TR;
                            }
                        ?>
                        <div class="clr"></div>
                    </div> <!-- Fin de la segunda columna -->
                    
                </div> <!-- Fin del row general de categoria -->
            </div> <!-- Fin del segundo container -->
        </div> <!-- Fin del primer container -->

    </div> <!-- fin del espacio para las categorias -->

    <div class="col-lg-3">
        <!-- aqui la publicidad -->
    </div> <!-- fin del espacio de la publicidad -->
</div>


<br>
<br>
<br>
<!-- <h1>{$nombre}</h1> -->