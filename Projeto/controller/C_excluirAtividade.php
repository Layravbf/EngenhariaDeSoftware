<?php
    // código para excluir atividade
    include_once("../persistence/connection.php");
    include_once("../persistence/atividadeDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];
    $periodo = $_SESSION['nomePeriodo'];
    $disciplina = $_SESSION['disciplinaAtividade'];

    $conexao = new connection();
    $conexao->connect();

    $nomeAtividade = $_GET['nomeAtividade'];
    
    $atividade = new atividadeDAO();
    $res = $atividade->consultar($nomeAtividade, $emailLogin, $periodo, $disciplina, $conexao->getConn());
    //Verifica se a atividade existe, se existir, exclui
    if($res){
        $res1 = $atividade->excluir($nomeAtividade, $emailLogin, $periodo, $disciplina, $conexao->getConn());

        if($res1){
            $_SESSION['atividadeExcluida'] = true;
            header("Location: http://localhost/Projeto/view/atividadePorDisciplina.php?nomeDisciplina=$disciplina");
        }
    }
