<?php
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// função de insert - ajustar para tabela destino
function db_inserir($nome, $email, $senha)
{
    global $conn;
    $sql = "INSERT INTO games.tb_usuario(nm_usuario, ds_email, ds_senha) VALUES ('$nome', '$email', MD5('$senha'))";
    try {
        $conn->query($sql);
        header("Location: ../index.html");
    } catch (Exception $e) {
        header("Location: ../pages/cadastroUsuario.html");
    }
    return null;
}

require_once("./banco.php");

// chamada da função
db_inserir($nome, $email, $senha);
