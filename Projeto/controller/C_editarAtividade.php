<?php
// Código feito para editar uma atividade
    include_once("../persistence/connection.php");
    include_once("../persistence/atividadeDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];
    $periodo = $_SESSION['nomePeriodo'];
    $disciplina = $_SESSION['disciplinaAtividade'];

    $nomeAtividade = $_SESSION['nomeAtividade'];
    $atividade = $_POST["atividade"];
    $tipo = $_POST["tipo"];
    $valor = $_POST['valor'];
    $nota = $_POST['nota'];
    

    $conexao = new connection();
    $conexao->connect();

    $atividadedao = new atividadeDAO();
    $res1 = $atividadedao->consultar($atividade, $emailLogin, $periodo, $disciplina, $conexao->getConn());
    if(mysqli_num_rows($res1) > 0){ //Verifica se a atividade já foi inserida, senão chama a função de editar
        $_SESSION['aJaAdicionada'] = true; 
        header("Location: http://localhost/Projeto/view/atividadePorDisciplina.php?nomeDisciplina=$disciplina");
    }else{
        $res = $atividadedao->editar($atividade, $tipo, $valor, $nota, $emailLogin, $periodo, $disciplina, $nomeAtividade, $conexao->getConn());
        if($res === TRUE){
            $_SESSION['atividadeAlterada'] = true;
            header("Location: http://localhost/Projeto/view/atividadePorDisciplina.php?nomeDisciplina=$disciplina");
        }
    }
