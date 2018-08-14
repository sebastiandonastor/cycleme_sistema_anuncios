<style>
    .pequeno{
       word-wrap: break-word !important;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
</style>
<!-- Page Heading -->
<div class="text-center mt-1 border border-dark bg-dark text-white">
<h1 class="my-4">Noticias</h1>
</div>

<?php foreach($noticias as $noticia): ?>
<div class="row mt-2">
    <div class="col-md-7">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo base_url(); ?>/noticias_img/<?php echo $noticia['imagen']?>" style="height: 450px; width: 700px" alt="">
        </a>
    </div>
    <div class="col-md-5">
        <div class="pequeno"><?php echo $noticia['contenido']; ?></div>
        <a class="btn btn-primary" href="#">Ver mas</a>
    </div>
</div>
    <hr>
<?php endforeach; ?>