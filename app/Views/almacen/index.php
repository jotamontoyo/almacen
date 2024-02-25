<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>

<h2 class="mb-4">Almacenes</h2>

<br>

<a href="almacen/new"><button type="button" class="btn btn-sm btn-primary">Nuevo</button></a>

<br>
<br>

<!-- <table class="table table-dark table-hover table-striped">

    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th></th>
        <th></th>
    </thead>

    <tbody>

        <?php foreach ($almacenes as $almacen) : ?>

     
            
            <tr type='row-link' href='almacen/<?php echo $almacen['id']; ?>'>
                
                <td> <?php echo $almacen['id']; ?> </td>
                <td> <?php echo $almacen['nombre']; ?> </td>
                <td> <?php echo $almacen['descripcion']; ?> </td>
                <td> 
                    <a href="almacen/<?php echo $almacen['id']; ?>"><button type="button" class="btn btn-sm btn-primary">Mostrar</button></a>
                </td>
                
                
            </tr>
            
       

        <?php endforeach; ?>

    </tbody>

</table> -->

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
            <div class="col border">Nombre</div>
            <div class="col border">Descripcion</div>
        </div>
      
    </thead>
    
    <tbody>
        
        <?php foreach ($almacenes as $almacen) : ?>
            <a class="" href="almacen/<?php echo $almacen['id']; ?>">
                <div class="row">
                    <div class="col-2 border"><?php echo $almacen['id']; ?></div>
                    <div class="col border"><?php echo $almacen['nombre']; ?></div>
                    <div class="col border"><?php echo $almacen['descripcion']; ?></div>
                </div>
            </a>
        <?php endforeach; ?>    
      
    </tbody>
    
</table>






<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>





<?php echo $this->endSection(); ?>
