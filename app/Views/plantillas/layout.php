<!doctype html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    
  </head>

  <style>
		
		.centrado {
      text-align:center;
      padding:8px;
    }

    .centrar_div{
	    width: 420px;
	    margin-left: auto;
	    margin-right: auto;

      
    }


		
	</style>


  </head>

  <body>

    <div class="container">

      
      <?php echo $this->include('plantillas/menu'); ?>

      <?php echo $this->renderSection('contenido'); ?>

      <br>

      <footer>
      
        <p class="centrado"><?php echo date('Y'); ?></p>
      

      </footer>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    



      

    <?php echo $this->renderSection('scripts'); ?>

  </body>

  </html>
