<?php
    class disciplinaDAO {
        
        function __construct(){}

        function adicionar($disciplina, $conn){
            $sql = "INSERT INTO `disciplinas`(`disciplina`, `professor`, `nota_final`, `email_fk`, `periodo_fk`) 
            VALUES ('".
			($disciplina->getNome())."','".
            ($disciplina->getProfessor())."','".
            ($disciplina->getNotaFinal())."','".
			($disciplina->getEmailLogin())."','".
            ($disciplina->getPeriodo())."')";
            return $conn->query($sql);
        }

        function editar($disciplina, $professor,  $nota_final, $email_fk, $periodo_fk, $nomeDisciplina, $conn){
		    $sql = "UPDATE `disciplinas` SET `disciplina` = '" .$disciplina. "', `professor` = '". $professor ."', `nota_final` = '". $nota_final ."' WHERE `disciplinas`.`disciplina` = '". $nomeDisciplina ."' AND `disciplinas`.`email_fk` = '". $email_fk ."' AND `disciplinas`.`periodo_fk` = '". $periodo_fk ."'";
            return $conn->query($sql);
        }

        function consultar($nomeDisciplina, $emailLogin, $periodo, $conn){
            $sql = "SELECT `disciplina`, `professor`, `nota_final` FROM `disciplinas` WHERE `disciplinas`.`disciplina` = '". $nomeDisciplina ."' AND `disciplinas`.`email_fk` = '". $emailLogin ."' AND `disciplinas`.`periodo_fk` = '". $periodo ."'";
            return $conn->query($sql);
        }

        function excluir($nomeDisciplina, $emailLogin, $periodo, $conn){
            $sql = "DELETE FROM `disciplinas` WHERE `disciplinas`.`disciplina` = '". $nomeDisciplina ."' AND `disciplinas`.`email_fk` = '". $emailLogin ."' AND `disciplinas`.`periodo_fk` = '". $periodo ."'";
            return $conn->query($sql);
        }
    }
?>