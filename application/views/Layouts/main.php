
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

</head>
<body>

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
   
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fas fa-bicycle big-icon d-inline-block align-top"> CycleMe</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
  
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item"><a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a></li>
                <li class="nav-line " id="nav-line">|</li>
                <li class="nav-item"><a class="nav-link" href="#">Categoría </a></li>
                <li class="nav-line" id="nav-line">|</li>
                <li class="nav-item"><a class="nav-link" href="#">Eventos</a></li>
                <li class="nav-line" id="nav-line">|</li>
                <li class="nav-item"><a class="nav-link" href="#">Noticias</a> </li>
                <li class="nav-line" id="nav-line">|</li>
                <li class="nav-item"><a class="nav-link" href="#">Nosotros</a> </li>
                <?php if($this->session->userdata('idUsuario')!= null) : ?>
                <li class="nav-item"><a class="nav-link btn btn-danger" href="<?php echo base_url('Cuentas/cerrar') ?>">Cerrar session</a> </li>
                <?php endif; ?>
            </ul>


        </div>
        </nav>
    </header>

    <main class="container fixed" >
        <?php $this->load->view($main_view); ?>
    </main> 

    <footer class="sticky" >
        <div class="fixed-bottom footer-design">
            <label class="float-left" >
                © 2018 Derechos Reservados
            </label>
            <label class="float-right" >
                <ul  class="list-inline ">
                    <li class="list-inline-item" ><i class="fab fa-facebook big-icon"></i></li>
                    <li class="list-inline-item" ><i class="fab fa-twitter-square big-icon"></i></li>
                </ul>
            </label>
        </div>
    </footer>  
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/Assets/js/bootstrap.js"></script>
</body>
</html>