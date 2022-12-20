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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Games</title>
  </head>

  <body>
    <div class="toast">
      <div class="toast-content">
        <div class="message">
          <span class="text text-1">Bem-vindo</span>
          <span class="text text-2">Esse é seu sistema de games</span>
        </div>
      </div>
      <i class="fa-solid fa-xmark close"></i>
      <div class="progress"></div>
    </div>
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
      <div class="titulo-catalogo">
        <div class='titulo-hr'>
          <hr>
          <h1>Catálogo de games</h1>
          <hr>
        </div>
      </div>
      <div class="jogos">
        <div id="cards-jogos">
          <div class="card">card1</div>
          <div class="card">card2</div>
          <div class="card">card3</div>
          <div class="card">card4</div>
          <div class="card">card5</div>
          <div class="card">card6</div>
          <div class="card">card7</div>
        </div>
      </div>
    </div>
    <style>
      body {
        overflow: hidden;
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
        border-left: 6px solid #6a5be2;
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
        background-color: #6a5be2;
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
      const toast = document.querySelector(".toast");
      (closeIcon = document.querySelector(".close")),
      (progress = document.querySelector(".progress"));

      let timer1, timer2;


      toast.classList.add("active");
      progress.classList.add("active");

      timer1 = setTimeout(() => {
        toast.classList.remove("active");
      }, 5000); //1s = 1000 milliseconds

      timer2 = setTimeout(() => {
        progress.classList.remove("active");
      }, 5300);


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