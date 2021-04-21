<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href=".././styles/agendas.css">
  <title>Agenda COVID</title>
</head>

<body>
  <nav class=" navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">AGENDA COVID </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link" href="agendas.php" id="a">
              <strong>AGENDARME</strong>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link" id="a">
              <strong>CONSULTAR AGENDA</strong>
            </a>
          </li>
          <li class="nav-item">
            <a href="usuarios.php" class="nav-link" id="a">
              <strong>CANTIDAD DE USUARIOS</strong>
            </a>
          </li>
          <li class="nav-item">
            <a href="borrar.php" class="nav-link" id="a">
              <strong>ELIMINAR AGENDA</strong>
            </a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <div class="container my-5">
    <div class="input-group mb-3">
      <form id="formularioCi">
        <span class="input-group-text" id="basic-addon3">Ingrese Ci:</span>
        <input type="number" name="id" class="form-control" placeholder="ej: 47332112" aria-describedby="basic-addon3" id="idInput">
      </form>
      <button class="btn btn-primary" onclick="consultar()" id="submitConsult">CONSULTAR</button>
    </div>
  </div>

  <div class="mt-3" id="respuesta">

  </div>

  <script src="../script/consultas.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</body>

</html>