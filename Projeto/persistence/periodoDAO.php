<?php
    class periodoDAO {
        
        function __construct(){}

        function adicionar($periodo, $conn){
            $sql = "INSERT INTO `periodos`(`periodo`, `aprovacao`, `email_fk`) 
            VALUES ('".
			($periodo->getNome())."','".
            ($periodo->getAprovacao())."','".
			($periodo->getEmailLogin())."')";
            return $conn->query($sql);
        }

        function editar($periodo, $aprovacao,  $nomePeriodo, $emailLogin, $conn){
		    $sql = "UPDATE `periodos` SET `periodo` = '" .$periodo. "', `aprovacao` = '". $aprovacao ."' WHERE `periodos`.`periodo` = '". $nomePeriodo ."' AND `periodos`.`email_fk` = '". $emailLogin ."'";
            return $conn->query($sql);
        }

        function consultar($nomePeriodo, $emailLogin, $conn){
            $sql = "SELECT `periodo`, `aprovacao` FROM `periodos` WHERE `periodos`.`periodo`='". $nomePeriodo ."' AND `periodos`.`email_fk` = '". $emailLogin ."'";
            return $conn->query($sql);
        }

        function excluir($nomePeriodo, $emailLogin, $conn){
            $sql = "DELETE FROM `periodos` WHERE `periodos`.`periodo`='". $nomePeriodo ."' AND `periodos`.`email_fk` = '". $emailLogin ."'";
            return $conn->query($sql);
        }
    }
?>