<?php
    class atividadeDAO {
        
        function __construct(){}

        function adicionar($atividade, $conn){
            $sql = "INSERT INTO `atividades`(`atividade`, `tipo`, `valor`, `nota`, `email_fk`, `periodo_fk`, `disciplina_fk`) 
            VALUES ('".
			($atividade->getNome())."','".
            ($atividade->getTipo())."','".
            ($atividade->getValor())."','".
            ($atividade->getNota())."','".
			($atividade->getEmailLogin())."','".
            ($atividade->getPeriodo())."','".
            ($atividade->getDisciplina())."')";
            return $conn->query($sql);
        }

        function editar($atividade, $tipo, $valor,  $nota, $email_fk, $periodo_fk, $disciplina_fk, $nomeAtividade, $conn){
		    $sql = "UPDATE `atividades` SET `atividade` = '" .$atividade. "', `tipo` = '". $tipo ."', `valor` = '". $valor ."', `nota` = '". $nota ."' WHERE `atividades`.`atividade` = '". $nomeAtividade ."' AND `atividades`.`email_fk` = '". $email_fk ."' AND `atividades`.`periodo_fk` = '". $periodo_fk ."' AND `atividades`.`disciplina_fk` = '". $disciplina_fk ."'";
            return $conn->query($sql);
        }

        function consultar($nomeAtividade, $emailLogin, $periodo, $disciplina, $conn){
            $sql = "SELECT `atividade`, `tipo`, `valor`, `nota` FROM `atividades` WHERE `atividades`.`atividade` = '". $nomeAtividade ."' AND `atividades`.`email_fk` = '". $emailLogin ."' AND `atividades`.`periodo_fk` = '". $periodo ."' AND `atividades`.`disciplina_fk` = '". $disciplina ."'";
            return $conn->query($sql);
        }

        function excluir($nomeAtividade, $emailLogin, $periodo, $disciplina, $conn){
            $sql = "DELETE FROM `atividades` WHERE `atividades`.`atividade` = '". $nomeAtividade ."' AND `atividades`.`email_fk` = '". $emailLogin ."' AND `atividades`.`periodo_fk` = '". $periodo ."' AND `atividades`.`disciplina_fk` = '". $disciplina ."'";
            return $conn->query($sql);
        }
    }
?>