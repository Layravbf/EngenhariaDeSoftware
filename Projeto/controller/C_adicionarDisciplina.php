<?php
    // Código feito para adicionar uma disciplina
    include_once("../persistence/connection.php");
    include_once("../model/Disciplina.php");
    include_once("../persistence/disciplinaDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];
    $periodo = $_SESSION['periodoDisciplina'];

    $conexao = new connection();
    $conexao->connect();

    $nomeDisciplina = $_POST['nomeDisciplina'];
    $professor = $_POST['professor'];
    $notaFinal = $_POST['notaFinal'];

    
    
    if(strlen($nomeDisciplina) > 50 && strlen($professor) < 50){
        $_SESSION['erroDisciplina'] = true;
        header("Location: http://localhost/Projeto/view/adicionarDisciplina.php");
    }else if(strlen($professor) > 50 && strlen($nomeDisciplina) < 50){
        $_SESSION['erroProfessor'] = true;
        header("Location: http://localhost/Projeto/view/adicionarDisciplina.php");
    }else if(strlen($nomeDisciplina) > 50 && strlen($professor) > 50){
        $_SESSION['erroDiscEProf'] = true;
        header("Location: http://localhost/Projeto/view/adicionarDisciplina.php");
    }else{

        $disciplina = new Disciplina($nomeDisciplina, $professor, $notaFinal, $emailLogin, $periodo);

        $disciplinadao = new disciplinaDAO();
        $res1 = $disciplinadao->consultar($nomeDisciplina, $emailLogin, $periodo, $conexao->getConn());
        if(mysqli_num_rows($res1) == 0){
            $res2 = $disciplinadao->adicionar($disciplina, $conexao->getConn());
            $_SESSION['disciplinaAdicionada'] = true;
            header("Location: http://localhost/Projeto/view/disciplinaPorPeriodo.php?nomePeriodo=$periodo");
        }
    }
?>