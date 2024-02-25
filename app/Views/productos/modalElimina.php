
<?php echo $this->extend('plantillas/layout'); ?>

<?php echo $this->section('contenido'); ?>






  <div class="modal" style="display:block;" id="modalElimina" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Eliminar Producto: <?php echo $producto['id']; ?></h5>
          <a href="./../<?php echo $producto['id']?>"><button type="button" class="btn-close"></button></a>
        </div>
  
        <div class="modal-body">
          <p>Se va a eliminar el producto: <?php echo $producto['codigo']; ?></p>
          <small class="text-muted"><?php echo $producto['nombre']; ?></small>
        </div>
  
        <div class="modal-footer center">
          <form action="<?php echo base_url('productos/' . $producto['id']) ?>" method="post" autocomplete="off">
            <input type="hidden" name="_method" id="" value="delete">
            <a href="./../<?php echo $producto['id']?>"><button type="button" class="btn btn-sm btn-outline-danger">Cancelar</button></a>
            <input type="submit" class="btn btn-sm btn-outline-primary" value="Eliminar">
          </form>
        </div>

      </div>
    </div>
  </div>




    

<?php echo $this->endSection(); ?>

<?php $this->section('scripts') ?>


<script type="text/javascript">
    <!--        alert("Hola JS") -->

</script>


<?php echo $this->endSection(); ?>
