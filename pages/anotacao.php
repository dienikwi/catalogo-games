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
        <link type="text/css" href="../css/anotacoes.css" rel="stylesheet" />
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
            <nav class="menu">
                <ul class="user">
                    <li>
                        <a href="./jogos.php">
                            <i class="fa fa-user fa-2x"></i>
                            <span class="texto-item">
                                <?php echo $nomeUser ?>
                            </span>
                        </a>
                    </li>
                </ul>

                <ul>
                    <li class="itens">
                        <a href="./anotacao.php">
                            <i class="fa fa-list fa-2x"></i>
                            <span class="texto-item">
                                Minhas anotações
                            </span>
                        </a>
                    </li>
                    <li class="itens">
                        <a href="./jogos.php">
                            <i class="fa fa-folder-open fa-2x"></i>
                            <span class="texto-item">
                                Catálogo
                            </span>
                        </a>
                    </li>
                    <li>
                    <li class="itens">
                        <a href="./info.php">
                            <i class="fa fa-info fa-2x"></i>
                            <span class="texto-item">
                                Sobre nós
                            </span>
                        </a>
                    </li>
                </ul>

                <ul class="logout">
                    <li>
                        <a href="../config/logoff.php">
                            <i class="fa fa-power-off fa-2x"></i>
                            <span class="texto-item">
                                Logout
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="jogos">

                <div id="titulo-catalogo">
                    <hr id="hr1">
                    <h1>Minhas anotações</h1>
                    <hr id="hr2">
                </div>
                <a href="./cadastroAnotacao.php" class="bt-anotacao">
                    <i class="fa fa-pencil fa"></i>
                    <span>Cadastrar nova anotação</span>
                </a>
                <div id="div-pesquisar">
                    <i class="fa fa-search fa"></i>
                    <input type="text" name="pesquisa" placeholder="Pesquisar anotação..." id="pesquisar" />
                </div>

                <div id="cards-anotacoes">

                    <?php
                    foreach ($anotacao as $indice => $valor) {
                        echo "
                        <div class='card-anotacao'>
                            <div class='titulo_card'>";
                            echo $anotacao[$indice]['nm_jogo'];
                        echo "
                            </div>
                            <div>
                                <label class='avaliacao'>Avaliação (1 - 5):</label> <br>";
                                echo " 
                                <figure class='figura-estrela'>"; 
                                for ($i=0; $i<$anotacao[$indice]['nu_estrelas']; $i++) {
                                    echo " <img src='../assets/images/estrela.png'> ";
                                }
                                echo "
                                </figure>
                            </div>
                            <div> <span class='aspas'> ❝ </span>";
                            echo $anotacao[$indice]['ds_anotacao'];
                            echo " <span class='aspas'> ❞ </span>
                            </div>
                            <div class='bt-manipula-dados'>
                            <a href='../config/deletar.php?idjogo={$anotacao[$indice]['id_jogo']}' 
                                class='deletar'><i class='fa fa-trash fa-2x'></i>
                            </a>
                            <a href='./editarAnotacao.php?idjogo={$anotacao[$indice]['id_jogo']}&nm_jogo={$anotacao[$indice]['nm_jogo']}' 
                                class='editar'><i class='fa fa-edit fa-2x'></i>
                            </a>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
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