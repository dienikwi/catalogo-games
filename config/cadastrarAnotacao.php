<?php
    require '../config/verifica.php';
    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
        $id_jogo = $_POST["select-jogo"];
        $nu_estrelas = $_POST["select-estrelas"];
        $ds_anotacao = $_POST["descricao"];

        // função de insert - ajustar para tabela destino
        function db_inserir($id_user, $id_jogo, $nu_estrelas, $ds_anotacao) {
            global $conn;
            $sql = "INSERT INTO games.tb_anotacao VALUES ($id_user, $id_jogo, $nu_estrelas, '$ds_anotacao')";
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
        db_inserir($_SESSION['idUser'], $id_jogo, $nu_estrelas, $ds_anotacao);
    } else {
        header("Location: ../pages/mensagemErro.html");
    }
?>
