<?php
require '../config/banco.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
    require_once 'Usuario.class.php';
    $user = new Usuario();
    $usuarioLogado = $user->logado($_SESSION['idUser']);
    $nomeUser = $usuarioLogado['nm_usuario'];

    $jogo = $user->info_jogos();
    
    $img_principal = $jogo['img_principal'];

} else {
    header("Location: ../pages/mensagemErro.html");
}

?>