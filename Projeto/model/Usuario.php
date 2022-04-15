<!-- Instância Usuário para pegar seus parâmetros de email e senha  -->
<?php
    class Usuario{
        private $email;
        private $senha;

        function __construct($uemail="", $usenha=""){
            $this->email = $uemail;
            $this->senha = $usenha;
        }

        function getEmail(){
            return $this->email;
        }

        function getSenha(){
            return $this->senha;
        }
    }
?>