
    <?php echo $this->extend('plantillas/layout'); ?>

    <?php echo $this->section('contenido'); ?>


    <?php echo csrf_field(); ?> <!-- escrito asi toma el nombre de $tokenName del Security.php -->
    

    <h2 class="mb-4">Productos</h2>

    <br>

    <a href="productos/new"><button type="button" class="btn btn-sm btn-primary">Nuevo</button></a>

    <br><br>


<style>

    .row {
        background-color: #F2F2F2;
        color: black;
    }


    .border {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    


</style>



<table class="">

    <thead>
        <div class="row">
            <div class="col-2 border">ID</div>
            <div class="col border">Código</div>
            <div class="col border">Nombre</div>
        </div>
      
    </thead>
    
    <tbody>
        
        <?php foreach ($productos as $producto) : ?>
            <a class="" href="productos/<?php echo $producto['id']; ?>">
                <div class="row border">
                    <div class="col-2"><?php echo $producto['id']; ?></div>
                    <div class="col"><?php echo $producto['codigo']; ?></div>
                    <div class="col"><?php echo $producto['nombre']; ?></div>
                </div>
            </a>
        <?php endforeach; ?>    
      
    </tbody>
    
</table>





    <?php echo $this->endSection(); ?>

    <?php $this->section('scripts') ?>


    <script type="text/javascript">
<!--        alert("Hola JS") -->
    </script>

    <?php echo $this->endSection(); ?>
