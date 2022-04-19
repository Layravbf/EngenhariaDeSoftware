<?php
    class Atividade{
        private $nomeAtividade;
        private $tipo;
        private $valor;
        private $nota;
        private $emailLogin;
        private $periodo;
        private $disciplina;

        function __construct($unome="", $utipo="", $uvalor="", $unota="", $uemail="", $uperiodo="", $udisciplina=""){
            $this->nomeAtividade = $unome;
            $this->tipo = $utipo;
            $this->valor = $uvalor;
            $this->nota = $unota;
            $this->emailLogin = $uemail;
            $this->periodo = $uperiodo;
            $this->disciplina = $udisciplina;
        }

        function getNome(){
            return $this->nomeAtividade;
        }

        function getTipo(){
            return $this->tipo;
        }

        function getValor(){
            return $this->valor;
        }

        function getNota(){
            return $this->nota;
        }

        function getEmailLogin(){
            return $this->emailLogin;
        }

        function getPeriodo(){
            return $this->periodo;
        }

        function getDisciplina(){
            return $this->disciplina;
        }
    }
?>