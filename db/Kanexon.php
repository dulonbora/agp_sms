<?php
    class Kanexon{
        private $conn = null;
        
        private $hostname="localhost";
        private $username="root";
        private $password="";
        public function getDb(){
                $this->conn = new PDO("mysql:host=$this->hostname;dbname=gconnect;charset=utf8",  $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                return $this->conn;
        }


}?>



<?php
/*
    class Kanexon{
        private $conn = null;
        
        private $hostname="localhost";
        private $username="agp";
        private $password="asomganaparishad";
        public function getDb(){
                $this->conn = new PDO("mysql:host=$this->hostname;dbname=agp;charset=utf8",  $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                return $this->conn;
        }


}
 * 
 */ ?>