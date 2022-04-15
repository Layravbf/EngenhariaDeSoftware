<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/usuarioDAO.php");

    session_start();

    $email = $_SESSION['emailLogin'];

    $conexao = new connection();
    $conexao->connect();

    $usuario = new usuarioDAO();
    $res = $usuario->consultar($email, $conexao->getConn());

    if($res){
        $res1 = $usuario->excluir($email, $conexao->getConn());

        if($res1){
            $_SESSION['excluido'] = true;
            header('Location: http://localhost/Projeto/view/index.php');
        }else{
            $_SESSION['excluido'] = false;
        }
    }

?>