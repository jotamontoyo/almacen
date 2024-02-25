<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>



    <br>

    

    <form action="<?php echo base_url('almacen/'.$id) ?>" method="POST" autocomplete="off">

        <input type="hidden" name="_method" value="PUT">

        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label" style="text-align: right">ID</label>
            <div class="col-md-6">
                <input disabled type="text" class="form-control" name="id" id="id" value="<?php echo $almacen['id']; ?>" autofocus>
                <?php echo validation_show_error('id'); ?>
            </div>
        </div>


        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label" style="text-align: right">Nombre</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $almacen['nombre']; ?>" autofocus>
                <?php echo validation_show_error('codigo'); ?>
            </div>
        </div>

        
        <div class="row mb-3">
            <label for="descripcion" class="col-sm-2 col-form-label" style="text-align: right">Descripción</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $almacen['descripcion']; ?>">
                <?php echo validation_show_error('descripcion'); ?>
            </div>
        </div>
        
        
        <br>

        <div style="text-align: center">
            <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
            <a href="./../<?php echo $almacen['id']?>"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
        </div>

    </form>



<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>
    <script type="text/javascript"><!-- alert("Hola JS") --></script>
<?php echo $this->endSection(); ?>
