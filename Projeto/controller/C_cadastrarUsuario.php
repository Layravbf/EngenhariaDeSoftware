<?php
//Código feito para cadastrar um usuário
    include_once("../persistence/connection.php");
    include_once("../model/Usuario.php");
    include_once("../persistence/usuarioDAO.php");

    session_start();

    $conexao = new connection();
    $conexao->connect();

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Verifica se o tamanho da senha é menor que 8, se for, é feita a tentativa de cadastro
    if(strlen($senha) < 8){
        $_SESSION['erroSenha'] = true;
        header('Location: http://localhost/Projeto/view/cadastro.php');
    }else{

        $usuario = new Usuario($email, $senha);

        $usuariodao = new usuarioDAO();
        $res1 = $usuariodao->consultar($email, $conexao->getConn());
        // Verifica se o usuário já existe
        if(mysqli_num_rows($res1) == 0){
            $res2 = $usuariodao->cadastrar($usuario, $conexao->getConn());
            $_SESSION['cadastrado'] = true;
            header('Location: http://localhost/Projeto/view/index.php');
        }else{
            $_SESSION['cadastrado'] = false;
            header('Location: http://localhost/Projeto/view/cadastro.php');
        }
    }