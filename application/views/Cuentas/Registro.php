<section class="container-fluid">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">

            <?php echo form_open(base_url('Registro/Validar'),array('class' => 'cuentas-container mt-4 mb-5')); ?>
            <h2 class="text-center">Registro</h2>
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
                <?php echo form_label('Apodo','nombre'); ?>

                <?php $datos= array(
                    'class' => 'form-control',
                    'name' => 'nombre',
                    'id' => 'nombre',
                    'value' => set_value('nombre')
                ); ?>

                <?php echo form_input($datos); ?>
                <span class="text-danger"><?php echo form_error('nombre'); ?></span>
            </div>

            <div class="form-group">
                <?php echo form_label('Telefono','telefono'); ?>

                <?php $datos= array(
                    'class' => 'form-control',
                    'name' => 'telefono',
                    'id' => 'telefono',
                    'value' => set_value('telefono')
                ); ?>

                <?php echo form_input($datos); ?>
                <span class="text-danger"><?php echo form_error('telefono'); ?></span>
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
            </div>


            <div class="form-group">
                <?php echo form_label('Confirmar Contraseña','contraseña-re'); ?>

                <?php $datos= array(
                    'class' => 'form-control',
                    'name' => 'pass-re',
                    'id' => 'contraseña-re'
                ); ?>

                <?php echo form_password($datos); ?>
                <span class="text-danger"><?php echo form_error('pass-re'); ?></span>
            </div>




            <?php echo form_submit(array(
                'name' => 'Registrar',
                'value' => 'Registrate',
                'class' => 'btn btn-info btn-block mt-3'
            )); ?>

            <?php echo form_close(); ?>

        </section>
    </section>
</section>