<?php
    class Periodo{
        private $nomePeriodo;
        private $aprovacao;
        private $emailLogin;

        function __construct($unome="", $uaprovacao="", $uemail=""){
            $this->nomePeriodo = $unome;
            $this->aprovacao = $uaprovacao;
            $this->emailLogin = $uemail;
        }

        function getNome(){
            return $this->nomePeriodo;
        }

        function getAprovacao(){
            return $this->aprovacao;
        }

        function getEmailLogin(){
            return $this->emailLogin;
        }
    }
?>