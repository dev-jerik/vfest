<?php 
	include_once 'Helper.php';
	class ProfileModel extends Helper{
		public function __construct($DB_CON){
            parent::__construct($DB_CON);
        }

        public function getUserInfo($userId) {
            $sql = "SELECT * FROM tbl_users, tbl_personproof 
                    WHERE tbl_users.perID = tbl_personproof.perID AND tbl_users.perID = {$userId};";
            return $this->executeQuery($sql);
        }

        public function updateUserInfo($perID, $uname, $pword) {
            $sql ="UPDATE tbl_users SET username=:uname, password=:pword  WHERE perID=:perID";
                
            $arrayParam = array("uname"=>$uname, "pword"=>$pword, "perID"=>$perID);
            $this->executeQuery($sql, $arrayParam, null);  
        }


    }