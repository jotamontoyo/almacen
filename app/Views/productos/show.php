
    <?php echo $this->extend('plantillas/layout'); ?>

    <?php echo $this->section('contenido'); ?>


<!--    <h2>Detalles del producto <?php echo $producto['nombre']; ?> -->

<h2 class="mb-4">Detalles del producto</h2>

<br>


    <form>

        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label" style="text-align: right">ID</label>
            <div class="col-md-6">
                <input readonly type="text" class="form-control" name="id" id="id" value="<?php echo $producto['id']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label" style="text-align: right">Código</label>
            <div class="col-md-6">
                 <input readonly type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $producto['codigo']; ?>">
             </div>
        </div>

        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label" style="text-align: right">Nombre</label>
            <div class="col-md-6">
                 <input readonly type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="precio" class="col-sm-2 col-form-label" style="text-align: right">Precio</label>
            <div class="col-md-6">
                 <input readonly type="text" class="form-control" name="precio" id="precio" value="<?php echo $producto['precio']; ?>">
            </div>
        </div>

        <div class="col-sm-2 centrar_div">
            <table class="table">

                <thead>
                    <th>Almacen</th>
                    <th>Cantidad</th>
                </thead>

                <tbody>

                    <?php foreach ($stocks as $stock) : ?>
                        <tr>
                            <td><?php echo $stock['codigo_almacen']; ?> - <?php echo $stock['almacen']; ?></td>
                            <td class="centrado"><?php echo $stock['cantidad']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        

        <br>
        <div style="text-align: center">
            <a href="<?php echo $producto['id']; ?>/edit"><button type="button" class="btn btn-sm btn-primary">Editar</button></a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" >Eliminar</button>
        </div>

    </form>


    <div class="modal fade" id="modalElimina" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Eliminar Producto: <?php echo $producto['id']; ?></h5>
          <a href="../productos/<?php echo $producto['id']?>"><button type="button" class="btn-close"></button></a>
        </div>
  
        <div class="modal-body">
          <p>Se va a eliminar el producto: <?php echo $producto['codigo']; ?></p>
          <small class="text-muted"><?php echo $producto['nombre']; ?></small>
        </div>
  
        <div class="modal-footer center">
          <form action="<?php echo base_url('productos/' . $producto['id']) ?>" method="post" autocomplete="off">
            <input type="hidden" name="_method" id="" value="delete">
            <a href="../productos/<?php echo $producto['id']?>"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
            <input type="submit" class="btn btn-sm btn-outline-primary" value="Eliminar">
          </form>
        </div>

      </div>
    </div>
  </div>


    <?php echo $this->endSection(); ?>

    <?php $this->section('scripts') ?>





<?php echo $this->endSection(); ?>
