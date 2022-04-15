<!-- Instância Usuário para realizar cadastro, consulta, exclusão e alteração  -->
<?php
    class usuarioDAO {
        
        function __construct(){}

        function cadastrar($usuario, $conn){
            $sql = "INSERT INTO `usuarios`(`email`, `senha`) 
            VALUES ('".
			($usuario->getEmail())."','".
			($usuario->getSenha())."')";
            return $conn->query($sql);
        }

        function alterar($email, $senha,  $emailLogin, $conn){
		    $sql = "UPDATE `usuarios` SET `email` = '" .$email. "', `senha` = '". $senha ."' WHERE `usuarios`.`email` = '". $emailLogin ."'";
            return $conn->query($sql);
        }

        function consultar($email, $conn){
            $sql = "SELECT `email`, `senha` FROM `usuarios` WHERE `usuarios`.`email`='". $email ."'";
            return $conn->query($sql);
        }

        function excluir($email, $conn){
            $sql = "DELETE FROM `usuarios` WHERE `usuarios`.`email`='". $email ."'";
            return $conn->query($sql);
        }
    }
?>