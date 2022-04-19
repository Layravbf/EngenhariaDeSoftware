<?php
// Código feito para adicionar uma atividade
include_once("../persistence/connection.php");
include_once("../model/Atividade.php");
include_once("../persistence/atividadeDAO.php");

session_start();
$emailLogin = $_SESSION['emailLogin'];
$periodo = $_SESSION['periodoDisciplina'];
$disciplina = $_SESSION['disciplinaAtividade'];

$conexao = new connection();
$conexao->connect();

$nomeAtividade = $_POST['nomeAtividade'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$nota = $_POST['nota'];
/* Verifica se o nome e/ou o tipo da atividade são menores que 50, se forem, um pop-up é exibido com erro, senão a
    atividade é inserida */
if (strlen($nomeAtividade) > 50 && strlen($tipo) < 50) {
    $_SESSION['erroAtividade'] = true;
    header("Location: http://localhost/Projeto/view/adicionarAtividade.php");
} else if (strlen($tipo) > 50 && strlen($nomeAtividade) < 50) {
    $_SESSION['erroTipo'] = true;
    header("Location: http://localhost/Projeto/view/adicionarAtividade.php");
} else if (strlen($nomeAtividade) > 50 && strlen($tipo) > 50) {
    $_SESSION['erroAtvETipo'] = true;
    header("Location: http://localhost/Projeto/view/adicionarAtividade.php");
} else {

    $atividade = new Atividade($nomeAtividade, $tipo, $valor, $nota, $emailLogin, $periodo, $disciplina);

    $atividadedao = new atividadeDAO();
    $res1 = $atividadedao->consultar($nomeAtividade, $emailLogin, $periodo, $disciplina, $conexao->getConn());
    if (mysqli_num_rows($res1) == 0) {
        $res2 = $atividadedao->adicionar($atividade, $conexao->getConn());
        $_SESSION['atividadeAdicionada'] = true;
        header("Location: http://localhost/Projeto/view/atividadePorDisciplina.php?nomeDisciplina=$disciplina");
    }
}
