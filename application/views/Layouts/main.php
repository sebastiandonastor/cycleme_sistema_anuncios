
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CycleMe</title>
    <script src="<?php echo base_url();?>/Assets/ckeditor/ckeditor.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lora|Montserrat" rel="stylesheet">
    

    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/lity.min.css">
    

</head>
<body>

    <header>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fas fa-bicycle big-icon d-inline-block align-top"> CycleMe</i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          

          <ul class="nav navbar-nav ml-auto nav-text">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url() ?>" >Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown drpespecial">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('Home/categorias_principales/Accesorios') ?>">Accesorios (<?php echo $AccesoriosNum ?>) </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/categorias_principales/Bicicletas') ?>">Bicicletas (<?php echo $BicicletasNum ?>) </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/categorias_principales/Componentes') ?>">Componentes (<?php echo $ComponentesNum ?>) </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/categorias_principales/Servicios') ?>">Servicios (<?php echo $ServiciosNum ?>) </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/pag_categorias') ?>">Todos...</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/eventos'); ?>">Eventos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/Noticias'); ?>">Noticias</a> </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/nosotros'); ?>">Nosotros</a> </li>
                <?php if($this->session->userdata('idUsuario') == null) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Registro'); ?>">Registrate</a> </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Cuentas') ?>"  >Iniciar Sesion</a> </li>
                <?php elseif($this->session->userdata('idUsuario') != null): ?>
                    <li class="nav-item dropdown dropdown-width">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i><?php echo $this->session->userdata('nombre')?></a>
                        <div class="dropdown-menu logOutAria" x-placement="bottom-start ">
                        <a class="dropdown-item" href="<?php echo base_url('Anuncios/opcion/Crear') ?>" >Publicar Anuncio</a>
                        <a class="dropdown-item" href="<?php echo base_url('Anuncios') ?>" >Manejar Anuncio</a>
                            <?php if($this->session->userdata('tipoUsuario') == 'admin'): ?>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-info" href="<?php echo base_url('Admin/crearAdm') ?>" >Crear Admin</a>
                                <a class="dropdown-item text-info" href="<?php echo base_url('Admin/noticias') ?>" >Crear Noticias</a>
                                <a class="dropdown-item text-info" href="<?php echo base_url('Publicidad/index') ?>" >Manejar Publicidad</a>
                                <a class="dropdown-item text-info" href="<?php echo base_url('Eventos') ?>" >Manejar Eventos</a>

                            <?php endif; ?>

                        <div class="dropdown-divider"  ></div>
                        <a class="dropdown-item log-out" href="<?php echo base_url('Cuentas/cerrar') ?>"> Cerrar Sesion </a>
                        </div>

                    </li>
                <?php endif; ?> 



          </ul>

        </div>
      </div>
    </div>

      
    </header>

    <main class="container" >
        <?php $this->load->view($main_view); ?>
    </main> 

    <footer >
        <div style="padding: 15px 10px 0 10px ; " class="footer-design">
            <label class="float-left" >
                © 2018 Derechos Reservados
            </label>
            <label class="float-right" >
                <ul  class="list-inline ">
                    <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/Cyclememe-2097532823907045"><i class="fab fa-facebook big-icon"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="https://twitter.com/cycleme_me"><i class="fab fa-twitter-square big-icon"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="https://www.instagram.com/cycleme.me/"><i class="fab fa-instagram big-icon"></i></a></li>
                </ul>
            </label>
        </div>
    </footer>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/Assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/Assets/js/javascript.js"></script>
    <script src="<?php echo base_url(); ?>/Assets/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>/Assets/js/core.js"></script>
    <script src="<?php echo base_url(); ?>/Assets/js/lity.min.js"></script>

    <!-- errores <script src="<?php echo base_url(); ?>/Assets/js/lightbox-plus-jquery.min.js"></script> -->
    

</body>
</html>

