<?php
    include_once("../persistence/connection.php");
    include_once("../model/Usuario.php");
    include_once("../persistence/usuarioDAO.php");

    $conexao = new connection();
    $conexao->connect();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario($email, $senha);

    $usuariodao = new usuarioDAO();
    $usuariodao->cadastrar($usuario, $conexao->getConn());
?>