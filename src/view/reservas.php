<?php
require '../../config.php';
require '../model/DAO/ClienteDao.php';

$sessao = isset($_SESSION['cliente_logado']) ? $_SESSION['cliente_logado'] : null;

$cliente = new ClienteDao($pdo);
$setarCliente = $cliente->setarID($sessao);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas</title>
  <link rel="shortcut icon" href="../../iconelogo.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/CSS/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #096f81;">
  <p></p>
  <a class="navbar-brand" href="#">
    <img src="../../assets/images/banners/logoprincipal-removebg-preview.png" width="300" height="100" class="d-inline-block align-top" alt="Logo">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- espaço para centralizar -->
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item button-link">
          <a class="nav-link" href="../../index.php">Home</a>
        </li>
        <li class="nav-item button-link">
          <a class="nav-link " href="./Acomoda.php">Acomodações</a>
        </li>
        <li class="nav-item button-link">
          <a class="nav-link" href="./serviços.php">Serviços</a>
        </li>
 
        <li class="nav-item button-link">
          <a class="nav-link" href="./reservas.php">Reservas</a>
        </li>
        <li class="nav-item button-link">
          <a class="nav-link" href="./contato.php">Contato</a>
        </li>
        <?php if ($sessao && $setarCliente instanceof Cliente) : ?>
            <li class="nav-item dropdown button-link">
              <a class="nav-link dropdown-toggle fonte-cinza d-flex align-items-center px-lg-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <?php echo $setarCliente->getNome(); ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./src/view/perfil.php">Meu Perfil</a></li>
                <li><a class="dropdown-item" href="./src/view/servicos-solicitados.php">Serviços Solicitados</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../controller/cliente/deslogar.php">Deslogar</a></li>
              </ul>
            </li>
          <?php else : ?>
            <li class="nav-item button-link">
              <a class="nav-link button-link" href="../controller/cliente/logar.php">Login</a>
            </li>
          <?php endif; ?>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </li>
      </ul>

    </div>
</nav>


<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center mb-4">Faça sua reserva</h1>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Seu nome">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Seu e-mail">
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date">
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Horário</label>
            <input type="time" class="form-control" id="time">
          </div>
          <div class="mb-3">
            <label for="guests" class="form-label">Número de hóspedes</label>
            <input type="number" class="form-control" id="guests" min="1" value="1">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>