<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/periodoDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];

    $nomePeriodo = $_SESSION['nomePeriodo'];
    $periodo = $_POST["periodo"];
    $aprovacao = $_POST['aprovacao'];

    $conexao = new connection();
    $conexao->connect();

    $periododao = new periodoDAO();

    $res1 = $periododao->consultar($periodo, $emailLogin, $conexao->getConn());
    if($res1){
        $_SESSION['pJaAdicionado']=true;
        header('Location: http://localhost/Projeto/view/periodos.php');
    }else{
        $res = $periododao->editar($periodo, $aprovacao, $nomePeriodo, $emailLogin, $conexao->getConn());
        if($res === TRUE){
            $dados = mysqli_fetch_assoc($res1);
            $_SESSION['periodoAlterado'] = true;
            $_SESSION['nomePeriodo'] = $periodo;
            header('Location: http://localhost/Projeto/view/periodos.php');
        }
    }
?>