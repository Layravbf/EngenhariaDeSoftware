<?php
    class Disciplina{
        private $nomeDisciplina;
        private $professor;
        private $notaFinal;
        private $emailLogin;
        private $periodo;

        function __construct($unome="", $uprofessor="", $unota="", $uemail="", $uperiodo=""){
            $this->nomePeriodo = $unome;
            $this->professor = $uprofessor;
            $this->notaFinal = $unota;
            $this->emailLogin = $uemail;
            $this->periodo = $uperiodo;
        }

        function getNome(){
            return $this->nomePeriodo;
        }

        function getProfessor(){
            return $this->professor;
        }

        function getNotaFinal(){
            return $this->notaFinal;
        }

        function getEmailLogin(){
            return $this->emailLogin;
        }

        function getPeriodo(){
            return $this->periodo;
        }
    }
?>