<?php
  global $phpSelf;
  use app\Modules\Filter;
  $filter = new Filter();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <?php if($estado !== null): ?>
        <div class="col-12 text-center mb-4">
          <div class="col-6 mx-auto">
            <?php
              if(((bool) $filter->filterXSS($estado)) === true) {
                echo '<div class="alert alert-primary" role="alert">
                  El usuario ha sido agregado
                </div>';
              } else {
                echo '<div class="alert alert-danger" role="alert">
                  Ocurrio un error al registrar un nuevo usuario
                </div>';
              }
            ?>
          </div>
        </div>
      <?php endif;?>
      <div class="col-md-6">
        <form class="row g-3" action="<?= $filter->filterXSS(ROUTE_CURRENT ?? '#'); ?>" method="POST">
          <div class="col-12">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="Aa" name="nombre">
          </div>
          <div class="col-12">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" placeholder="Aa" name="apellidos">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>