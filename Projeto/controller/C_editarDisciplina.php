<?php
// Código para alterar disciplina
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

    $res1 = $disciplinadao->consultar($disciplina, $emailLogin, $periodo, $conexao->getConn());
    if(mysqli_num_rows($res1) > 0){ // verifica se a disciplina já foi adicionada, senão, chama a função de editar
        $_SESSION['dJaAdicionada'] = true;
        header("Location: http://localhost/Projeto/view/disciplinaPorPeriodo.php?nomePeriodo=$periodo");
    }else{
        $res = $disciplinadao->editar($disciplina, $professor, $notaFinal, $emailLogin, $periodo, $nomeDisciplina, $conexao->getConn());
        if($res === TRUE){
            $_SESSION['disciplinaAlterada'] = true;
            $_SESSION['nomeDisciplina'] = $disciplina;
            header("Location: http://localhost/Projeto/view/disciplinaPorPeriodo.php?nomePeriodo=$periodo");
        }
    }
?>