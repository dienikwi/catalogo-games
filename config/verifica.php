<?php
require '../config/banco.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
    require_once 'Usuario.class.php';
    $user = new Usuario();
    $usuarioLogado = $user->logado($_SESSION['idUser']);
    $nomeUser = $usuarioLogado['nm_usuario'];

    $jogo = $user->info_jogos();
    $anotacao = $user->info_anotacao($_SESSION['idUser']);
} else {
    header("Location: ../pages/mensagemErro.html");
}

?>