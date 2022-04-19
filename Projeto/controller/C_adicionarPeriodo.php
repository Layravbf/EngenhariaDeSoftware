<?php
    // Código feito para adicionar um período
    include_once("../persistence/connection.php");
    include_once("../model/Periodo.php");
    include_once("../persistence/periodoDAO.php");

    session_start();
    $emailLogin = $_SESSION['emailLogin'];

    $conexao = new connection();
    $conexao->connect();

    $nomePeriodo = $_POST['nomePeriodo'];
    $aprovacao = $_POST['aprovacao'];

    $_SESSION['nomePeriodo'] = $nomePeriodo;
    /* Verifica se o nome do período é menor que 50, se for, um pop-up é exibido com erro, senão o período é inserido */
    if(strlen($nomePeriodo) > 50){
        $_SESSION['erroPeriodo'] = true;
        header('Location: http://localhost/Projeto/view/adicionarPeriodo.php');
    }else{

        $periodo = new Periodo($nomePeriodo, $aprovacao, $emailLogin);

        $periododao = new periodoDAO();
        $res1 = $periododao->consultar($nomePeriodo, $emailLogin, $conexao->getConn());

        if(mysqli_num_rows($res1) == 0){
            $_SESSION['periodoAdicionado'] = true;
            $res2 = $periododao->adicionar($periodo, $conexao->getConn());
            header('Location: http://localhost/Projeto/view/periodos.php');
        }else{
            $_SESSION['pJaAdicionado'] = true;
            header('Location: http://localhost/Projeto/view/periodos.php');
        }
    }
