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
    <link type="text/css" href="../css/cadastro.css" rel="stylesheet" />
    <link type="text/css" href="../css/anotacoes.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/arquivo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Games</title>
  </head>

  <body>
    <div class="toast">
      <div class="toast-content">
        <div class="message">
          <span class="text text-1">Dados inválidos</span>
          <span class="text text-2">Preencha todos os campos...</span>
        </div>
      </div>
      <i class="fa-solid fa-xmark close"></i>
      <div class="progress"></div>
    </div>
    <div class="custom-shape-divider-top-1670623821">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
      </svg>
    </div>
    <div class="cadastro">
      <h2>Registrar anotação</h2>
      <form action="../config/cadastrarAnotacao.php" method="POST">
        <div class="label-select">
          <label>Selecione um jogo</label>
          <label>Número de estrelas</label>
        </div>
        <div class="campo-user">
          <select name="select-jogo">
            <?php
            foreach ($jogo as $indice => $valor) {
            ?>
              <option value="<?php echo $jogo[$indice]['id_jogo']; ?>">
                <?php echo $jogo[$indice]['nm_jogo']; ?>
              </option>
            <?php } ?>
          </select>
          <select name="select-estrelas">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="campo-user">
          <input type="text" name="descricao" required="required" />
          <label>Anotação</label>
        </div>
        <div class="bt-form">
          <button type="submit" id="submit">Cadastrar</button>
          <a href="./anotacao.php" id="voltar">Voltar</a>
        </div>
      </form>
    </div>
    <div class="custom-shape-divider-bottom-1670623707">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
      </svg>
    </div>
    <style>
      body {
        overflow-x: hidden;
      }

      .toast {
        z-index: 999;
        position: absolute;
        top: 25px;
        right: 30px;
        border-radius: 12px;
        background: #fff;
        padding: 10px 0px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        border-left: 6px solid #f44058;
        overflow: hidden;
        transform: translateX(calc(100% + 30px));
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
      }

      .toast.active {
        display: block;
        transform: translateX(0%);
      }

      .toast .toast-content {
        display: flex;
        align-items: center;
      }

      .toast-content .message {
        display: flex;
        flex-direction: column;
        margin: 0 20px;
      }

      .message .text {
        font-weight: 400;
        color: #666666;
      }

      .message .text.text-1 {
        font-weight: 600;
        color: #333;
      }

      .toast .close {
        position: absolute;
        top: 10px;
        right: 15px;
        padding: 5px;
        cursor: pointer;
        opacity: 0.7;
      }

      .toast .close:hover {
        opacity: 1;
      }

      .toast .progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background: #ddd;
      }

      .toast .progress:before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width: 100%;
        background-color: #f44058;
      }

      .progress.active:before {
        animation: progress 5s linear forwards;
      }

      @keyframes progress {
        100% {
          right: 100%;
        }
      }

      .toast.active~button {
        pointer-events: none;
      }

      @media (max-width: 600px) {
        .toast {
          display: none;
        }
      }
    </style>
    <script>
      const button = document.querySelector("button"),
        toast = document.querySelector(".toast");
      (closeIcon = document.querySelector(".close")),
      (progress = document.querySelector(".progress"));

      let timer1, timer2;

      button.addEventListener("click", () => {
        toast.classList.add("active");
        progress.classList.add("active");

        timer1 = setTimeout(() => {
          toast.classList.remove("active");
        }, 5000); //1s = 1000 milliseconds

        timer2 = setTimeout(() => {
          progress.classList.remove("active");
        }, 5300);
      });

      closeIcon.addEventListener("click", () => {
        toast.classList.remove("active");

        setTimeout(() => {
          progress.classList.remove("active");
        }, 300);

        clearTimeout(timer1);
        clearTimeout(timer2);
      });
    </script>
  </body>

  </html>

<?php
} else {
  header("Location: ../pages/mensagemErro.html");
}
?>