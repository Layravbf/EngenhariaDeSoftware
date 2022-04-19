<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/disciplinaDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];
    $periodo = $_SESSION['nomePeriodo'];

    $nomeDisciplina = $_SESSION['nomeDisciplina'];    
    $disciplina = $_POST["disciplina"];
    $professor = $_POST["professor"];
    $notaFinal = $_POST['notaFinal'];

    $conexao = new connection();
    $conexao->connect();

    $disciplinadao = new disciplinaDAO();

    $res = $disciplinadao->editar($disciplina, $professor, $notaFinal, $emailLogin, $periodo, $nomeDisciplina, $conexao->getConn());
    $res1 = $disciplinadao->consultar($disciplina, $emailLogin, $periodo, $conexao->getConn());

    if($res === TRUE){
        $dados = mysqli_fetch_assoc($res1);
        $_SESSION['disciplinaAlterada'] = true;
        $_SESSION['nomeDisciplina'] = $dados['disciplina'];
        header("Location: http://localhost/Projeto/view/disciplinaPorPeriodo.php?nomePeriodo=$periodo");
    }
?>