<?php
    class usuarioDAO {
        
        function __construct(){}

        function cadastrar($usuario, $conn){
            $sql = "INSERT INTO `usuarios`(`email`, `senha`) 
            VALUES ('".
			($usuario->getEmail())."','".
			($usuario->getSenha())."')";

            if($conn->query($sql)){
                echo "usuario cadastrado";
            }else
                echo "usuario não cadastrado";
        }

        function alterar($email, $senha,  $emailLogin, $conn){
		    $sql = "UPDATE `usuarios` SET `email` = '" .$email. "', `senha` = '". $senha ."' WHERE `usuarios`.`email` = '". $emailLogin ."'";
            if($conn->query($sql)){
                echo $emailLogin;
            }else{
                echo ":((";
            }
            
            return $conn->query($sql);
        }
    }
?>