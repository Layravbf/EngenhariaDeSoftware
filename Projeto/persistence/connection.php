<!-- Instância Conexão para estabelecer conexão com o banco de dados  -->
<?php
    class connection{
        private $server = "localhost";
        private $user = "root";
        private $pass = "";
        private $bd = "sistema";
        private $conn = null;

        function __construct() {}

        function connect(){

            if($this->conn == null){
                $this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->bd);
            }else
                die("Conexão falhou. $conn->connect_error");
        }

        function getConn(){
            return $this->conn;
        }
    }
?>