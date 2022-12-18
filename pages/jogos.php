<?php

require '../config/verifica.php';
if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {

?>

<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" href="../css/erro.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/arquivo.js"></script>
    <title>Games</title>
  </head>
  <body>
    <label> <?php echo $nomeUser ?> </label> <br>
    <a href="../config/logoff.php">Sair</a>
  </body>
</html>

<?php
} else {
  header("Location: ../pages/mensagemErro.html");
}
?>