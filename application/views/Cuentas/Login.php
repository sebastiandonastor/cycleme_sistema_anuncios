<section class="container-fluid">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">

            <?php echo form_open(base_url('Cuentas/Validar'),array('class' => 'cuentas-container mt-4 mb-5')); ?>
            <h2 class="text-center">Inicio de Sesion</h2>
             <div class="form-group">
                 <?php echo form_label('Email','email'); ?>

                 <?php $datos= array(
                     'type' => 'email',
                     'class' => 'form-control',
                     'name' => 'email',
                     'id' => 'email',
                     'value' => set_value('email')
                 ); ?>

                 <?php echo form_input($datos); ?>
                 <span class="text-danger"><?php echo form_error('email'); ?></span>
             </div>


            <div class="form-group">
                <?php echo form_label('Contraseña','contraseña'); ?>

                <?php $datos= array(
                    'class' => 'form-control',
                    'name' => 'pass',
                    'id' => 'contraseña'
                ); ?>

                <?php echo form_password($datos); ?>
                <span class="text-danger"><?php echo form_error('pass'); ?></span>
                <span class="text-danger"><?php
                    $errorpASS = ($this->session->flashdata('contraseña') != null) ? $this->session->flashdata('contraseña') :'';
                    echo $errorpASS; ?></span>
            </div>

            <?php echo form_submit(array(
                'name' => 'Iniciar',
                'value' => 'Entrar',
                'class' => 'btn btn-info btn-block'
            )); ?>
            <div class="text-center">
            <span class="lead">¿No tienes cuenta?<br><a href="<?php echo base_url('Registro') ?>">Registrate Aqui</a></span>
            </div>
            <?php echo form_close(); ?>

        </section>
    </section>
</section>