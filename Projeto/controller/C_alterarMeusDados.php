<?php
    //Código feito para alterar os dados do usuário
    include_once("../persistence/connection.php");
    include_once("../persistence/usuarioDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Verifica se o tamanho da senha é menor que 8, se for, é feita a alteração dos dados
    if(strlen($senha) < 8){
        $_SESSION['erroSenha'] = true;
        header('Location: http://localhost/Projeto/view/meusDados.php');
    }else{

        $conexao = new connection();
        $conexao->connect();

        $usuario = new usuarioDAO();

        $res = $usuario->alterar($email, $senha, $emailLogin, $conexao->getConn());

        if($res === TRUE){
            $_SESSION['alterado']=true;
            header('Location: http://localhost/Projeto/view/index.php');
        }else{
            $_SESSION['alterado']=false;
        }
    }