<?php

class Usuario {
    public function login($email, $senha) {
        global $conn;

        $sql = "SELECT * FROM games.tb_usuario WHERE ds_email = :email AND ds_senha = :senha";
        $sql = $conn->prepare($sql);
        $sql->bindValue("email", $email);
        $sql ->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUser'] = $dado['id_usuario'];
            return true;
        } else {
            return false;
        }
    }

    public function logado($id) {
        global $conn;
        $array = array();
        $sql = "SELECT nm_usuario FROM games.tb_usuario WHERE id_usuario = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }
}

?>