<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>







    <h2 class="mb-4">Editar producto</h2>

    <br>
    




    <form action="<?php echo base_url('productos/'.$producto['id']); ?>" method="post" autocomplete="off">

        <input type="hidden" name="_method" value="PUT">

        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label" style="text-align: right">ID</label>
            <div class="col-md-6">
                <input readonly type="text" class="form-control" name="id" id="id" value="<?php echo $producto['id']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="codigo" class="col-sm-2 col-form-label" style="text-align: right">Código</label>
            <div class="col-md-6">
                <input readonly type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $producto['codigo']; ?>">
             </div>
        </div>
        
        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label" style="text-align: right">Nombre</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" autofocus>
                <p class="small" style="color:red">
                    <?php echo validation_show_error('nombre'); ?>
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="precio" class="col-sm-2 col-form-label" style="text-align: right">Precio</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" autofocus>
                <p class="small" style="color:red">
                    <?php echo validation_show_error('precio'); ?>
                </p>
            </div>
        </div>
        

        <br>

        <div style="text-align: center">
            <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
            <a href="./../<?php echo $producto['id']?>"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
        </div>

    </form>



<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>
    <script type="text/javascript"><!-- alert("Hola JS") --></script>
<?php echo $this->endSection(); ?>
