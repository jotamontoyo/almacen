<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>





<div class="container">

    <h1 class="mb-4">Nuevo almacen</h1>

    

    <form action="<?php echo base_url('/almacen') ?>" method="post" autocomplete="off">

        <input type="hidden" name="_method" value="POST">

        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label" style="text-align: right">Nombre</label>
            <div class="col-md-6">
                 <input type="text" class="form-control" name="nombre" id="nombre" value="<?php  ?>" autofocus>
            </div>
        </div>

        <div class="row mb-3">
            <label for="descripcion" class="col-sm-2 col-form-label" style="text-align: right">Descripción</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php  ?>">
            </div>
        </div>
        
        
        <br>

        <div class="col-12" style="text-align: center">
            <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
            <a href="./../almacen"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
        </div>

    </form>

</div>

<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>
    <script type="text/javascript"><!-- alert("Hola JS") --></script>
<?php echo $this->endSection(); ?>
