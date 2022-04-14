<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/usuarioDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conexao = new connection();
    $conexao->connect();

    $usuario = new usuarioDAO();

    // $res = $usuario->alterar($email, $senha, $conexao->getConn());
    $res = $usuario->alterar($email, $senha, $emailLogin, $conexao->getConn());

    if($res === TRUE){
        echo $senha;
    }else{
        echo "Não foi :(";
    }