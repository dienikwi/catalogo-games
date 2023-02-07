<?php
    require '../config/verifica.php';
    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
        $id_jogo = $_GET["idjogo"];

        // função de insert - ajustar para tabela destino
        function db_deletar($id_user, $id_jogo) {
            global $conn;
            $sql = "DELETE FROM games.tb_anotacao WHERE id_usuario = $id_user AND id_jogo = $id_jogo";
            try {
                $conn->query($sql);
                header("Location: ../pages/anotacao.php");
            } catch (Exception $e) {
                header("Location: ../pages/mensagemErro.html");
            }
            return null;
        }

        require_once("./banco.php");

        // chamada da função
        db_deletar($_SESSION['idUser'], $id_jogo);
    } else {
        header("Location: ../pages/mensagemErro.html");
    }
?>
