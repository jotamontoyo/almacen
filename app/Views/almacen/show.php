<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>




    <br>


    <form>
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label" style="text-align: right">ID</label>
            <div class="col-md-6">
                 <input disabled type="text" class="form-control" name="id" id="id" value="<?php echo $almacen['id']; ?>" autofocus>
             </div>
        </div>
        
        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label" style="text-align: right">Nombre</label>
            <div class="col-md-6">
                 <input disabled type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $almacen['nombre']; ?>" autofocus>
            </div>
        </div>

        <div class="row mb-3">
            <label for="descripcion" class="col-sm-2 col-form-label" style="text-align: right">Descripción</label>
            <div class="col-md-6">
                <input disabled type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $almacen['descripcion']; ?>">
            </div>
        </div>

        <br>

        <div class="col-sm-2 centrar_div">
            <table class="table">

                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </thead>

                <tbody>
                    <?php foreach ($stocks as $stock) : ?>
                        <tr>
                            <td><?php echo $stock['codigo_producto']; ?>  - <?php echo $stock['producto']; ?></td>
                            <td class="centrado"><?php echo $stock['cantidad']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <br>

        <div style="text-align: center">
            <a href="<?php echo $almacen['id']; ?>/edit"><button type="button" class="btn btn-sm btn-primary">Editar</button></a></td>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" >Eliminar</button>
        </div>

    </form>

    <div class="modal fade" id="modalElimina" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Almacén: <?php echo $almacen['id']; ?></h5>
                    <a href="../almacen/<?php echo $almacen['id']?>"><button type="button" class="btn-close"></button></a>
                </div>
        
                <div class="modal-body">
                    <p>Se va a eliminar el almacén: <?php echo $almacen['nombre']; ?></p>
                    <small class="text-muted"><?php echo $almacen['nombre']; ?></small>
                </div>
        
                <div class="modal-footer center">
                    <form action="<?php echo base_url('almacen/' . $almacen['id']) ?>" method="post" autocomplete="off">
                        <input type="hidden" name="_method" id="" value="delete">
                        <a href="../almacen/<?php echo $almacen['id']?>"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="Eliminar">
                    </form>
                </div>

            </div>
        </div>
    </div>                  

        



<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>





<?php echo $this->endSection(); ?>