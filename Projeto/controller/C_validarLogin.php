<?php
    session_start();
    include_once("../persistence/loginDAO.php");
    include_once("../persistence/connection.php");

    $conexao = new connection();
    $conexao->connect();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $logindao = new loginDAO();
    $resultado = $logindao->validar($email, $senha, $conexao->getConn());

    if($resultado->num_rows==1){
        $_SESSION['emailLogin'] = $email;
        $_SESSION['senhaLogin'] = $senha;
        header('Location: http://localhost/Projeto/view/home.html');
    }else{
        $_SESSION['nao_autenticado']=true;
        header('Location: http://localhost/Projeto/view/index.php');
    }
?>