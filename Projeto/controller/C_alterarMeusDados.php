<!-- Alteração dos dados dos usuários no banco de dados  -->
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

    $res = $usuario->alterar($email, $senha, $emailLogin, $conexao->getConn());

    if($res === TRUE){
        $_SESSION['alterado']=true;
        header('Location: http://localhost/Projeto/view/index.php');
    }else{
        $_SESSION['alterado']=false;
    }