<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>



<div class="container">

    <h2 class="mb-4">Nuevo producto</h2>

    <form action="<?php echo base_url('/productos') ?>" method="post" autocomplete="off">

        <input type="hidden" name="_method" value="POST">

            <div class="row mb-3">
                <label for="codigo" class="col-sm-2 col-form-label" style="text-align: right">Código</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo set_value('codigo'); ?>" autofocus>
                    
                    <p class="small" style="color:red">
                        <?php echo validation_show_error('codigo'); ?>
                    </p>
                    
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="nombre" class="col-sm-2 col-form-label" style="text-align: right">Nombre</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>" autofocus>
                    <p class="small" style="color:red">
                        <?php echo validation_show_error('nombre'); ?>
                    </p>
                </div>
            </div>

            <div class="row mb-3">
                <label for="precio" class="col-sm-2 col-form-label" style="text-align: right">Precio</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="precio" id="precio" value="<?php echo set_value('precio', '0.00'); ?>" autofocus>
                    <p class="small" style="color:red">
                        <?php echo validation_show_error('precio'); ?>
                    </p>
                </div>
            </div>
            

            <br>

            <div style="text-align: center">
                <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
                <a href="./../productos"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
            </div>

        
    </form>




</div>

<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>
    <script type="text/javascript"><!-- alert("Hola JS") --></script>
<?php echo $this->endSection(); ?>
