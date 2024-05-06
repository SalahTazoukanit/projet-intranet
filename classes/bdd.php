<?php

    class BDD{

        protected $localhost ;
        protected $dbname ;
        protected $username ;
        protected $password;

        public function __construct() {

            $this->localhost = "localhost";
            $this->dbname = "jcpvoyage";
            $this->username = "root";
            $this->password = "root";

        }

        public $connection;
                
        public function connectionBdd(){
            $this->connection = new PDO('mysql:host='.$this->localhost.';dbname='.$this->dbname,$this->username,$this->password);
        }
        public function deconnectionBdd(){
            $this->connection = null;
        }

    }

?>  