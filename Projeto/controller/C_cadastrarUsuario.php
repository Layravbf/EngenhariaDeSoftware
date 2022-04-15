<!-- Cadastro dos usuários no banco de dados  -->
<?php
    include_once("../persistence/connection.php");
    include_once("../model/Usuario.php");
    include_once("../persistence/usuarioDAO.php");

    session_start();

    // Estabelece conexão com o banco de dados
    $conexao = new connection();
    $conexao->connect();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario($email, $senha);

    $usuariodao = new usuarioDAO();
    $res1 = $usuariodao->consultar($email, $conexao->getConn());
    if(mysqli_num_rows($res1) == 0){
        $res2 = $usuariodao->cadastrar($usuario, $conexao->getConn());
        $_SESSION['cadastrado'] = true;
        header('Location: http://localhost/Projeto/view/index.php');
    }else{
        $_SESSION['cadastrado'] = false;
        header('Location: http://localhost/Projeto/view/cadastro.php');
    }
?>