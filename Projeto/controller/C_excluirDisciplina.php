<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/disciplinaDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];
    $periodo = $_SESSION['nomePeriodo'];

    $conexao = new connection();
    $conexao->connect();

    $nomeDisciplina = $_GET['nomeDisciplina'];

    $disciplina = new disciplinaDAO();
    $res = $disciplina->consultar($nomeDisciplina, $emailLogin, $periodo, $conexao->getConn());

    if($res){
        $res1 = $disciplina->excluir($nomeDisciplina, $emailLogin, $periodo, $conexao->getConn());

        if($res1){
            $_SESSION['disciplinaExcluida'] = true;
            header("Location: http://localhost/Projeto/view/disciplinaPorPeriodo.php?nomePeriodo=$periodo");
        }
    }
?>