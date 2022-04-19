<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/periodoDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];

    $conexao = new connection();
    $conexao->connect();

    $nomePeriodo = $_GET['nomePeriodo'];

    $periodo = new periodoDAO();
    $res = $periodo->consultar($nomePeriodo, $emailLogin, $conexao->getConn());

    if($res){
        $res1 = $periodo->excluir($nomePeriodo, $emailLogin, $conexao->getConn());

        if($res1){
            $_SESSION['periodoExcluido'] = true;
            header('Location: http://localhost/Projeto/view/periodos.php');
        }
    }
?>