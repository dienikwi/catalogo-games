<?php

require '../config/verifica.php';
if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {

?>

  <!DOCTYPE html>
  <html lang="PT-BR">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" href="../css/jogos.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/arquivo.js"></script>
    <title>Games</title>
  </head>

  <body>
    <div class="container">
      <div class="menu">
        <div class="user">
          <a href="./jogos.php" class="nome-user">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
            <label> <?php echo $nomeUser ?> </label>
          </a>
        </div>
        <div class="itens">
          <ul>
            <li> <a href="#"> Minhas anotações </a> </li>
            <li> <a href="#"> Catálogo </a> </li>
            <li> <a href="#"> Sobre nós </a> </li>
          </ul>
        </div>
        <div class="logoff">
          <a href="../config/logoff.php">Sair</a>
        </div>
      </div>
      <div class="titulo-catalogo">Catalogo de games</div>
      <div class="jogos">Todos os jogos</div>
    </div>
  </body>

  </html>

<?php
} else {
  header("Location: ../pages/mensagemErro.html");
}
?>