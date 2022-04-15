<!-- Instância Login para validar os logins  -->
<?php
    class loginDAO{
        function __construct(){}

        function validar($email, $senha, $conn){
            $result = $conn->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
            return $result;
        }
    }
?>