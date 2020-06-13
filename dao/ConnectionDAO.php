<?php

    class ConnectionDAO {
        protected $username = "root";
        protected $password = "";
        protected $host = "localhost";
        protected $db_name = "vfes_info";
        public $dbh;

        public function openConnection(){
            try {
                $this->dbh = new PDO("mysql:host=". $this->host . ";dbname=". $this->db_name, $this->username, $this->password);
            } catch (Exception $e) {
                $e->getMessage();
            }
            return $this->dbh;
        }

        public function closeConnection(){
            try {
                $this->dbh = null;
            } catch (Exception $e) {
                $e->getMessage();
            }
            return true;
        }
    }
?>