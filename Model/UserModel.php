<?php
    class UserModel{
        function __construct($DB_con){
            $this->db = $DB_con;
            $this->DEAN_ID = 9;
            $this->REG_ID = 35;
        }

        // --- New PASSWORD of mySQL equivalent
        function password($str) { 
            return '*'.strtoupper(sha1(pack('H*',sha1($str)))); 
        }

        //Update User Account
        function updateUserAccount($username, $newPassword, $oldPassword) { 
            $newPassword = $this->password($newPassword);
            $newPassword = substr($newPassword,0,16);

            $oldPassword = $this->password($oldPassword);
            $oldPassword = substr($oldPassword,0,16);
          // $oldPassword = "test";//md5($oldPassword,TRUE);
            try{
                $sql = "Update instructor SET username=?, password=? where password=? and instID=?";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(1, $username);
                $stmt->bindParam(2, $newPassword);
                $stmt->bindParam(3, $oldPassword);
                $stmt->bindParam(4, $_SESSION['user_id']);
                $stmt->execute();

                return true;
            }catch(PDOException $ex){
                return false;
            }
        
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }
            return false;
        }

        public function checkUrl() {
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            
            $isAdmin = strtoupper($_SESSION['user_code']) =="ADMIN" && strpos($url,'admin') !== false;
            $isTeacher = strtoupper($_SESSION['user_code']) =="TEACHER" && strpos($url,'teacher') !== false;
            
            if ($isAdmin) {
               return;
            }

            if ($isTeacher) {
                return;
            }

            if(strtoupper($_SESSION['user_code']) == "ADMIN") {
                header('Location: ../../index.php');
            } else if (strtoupper($_SESSION['user_code']) == "TEACHER") {
                header('Location: ../../index.php');
            }
        }

        public function isDeptHead($instID){
            $sql = "SELECT * from department WHERE UnitHead=?";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(1, $instID);
            $stmt->execute();
            if($res=$stmt->fetch(PDO::FETCH_ASSOC)){
                $_SESSION['deptID'] = $res['deptID'];
                return true;
            }else{
                return false;
            }
        }
        public function isDean($instID){
            if($this->DEAN_ID == $instID){
                return true;
            }
            return false;
        }
        public function isReg($instID){
            if($this->REG_ID == $instID){
                return true;
            }
            return false;
        }

        public function getUserName($userID){
            try{
                $param = array(':userID'=>$userID);
                $sql = "SELECT * FROM instructor WHERE instID=:userID";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(array(':userID'=>$userID));
                if($res=$stmt->fetch(PDO::FETCH_ASSOC)){
                    return $res['username'];
                }
                return "";
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        // --- New PASSWORD of mySQL equivalent
        private  function hashPassword($password){
            return '*'.strtoupper(sha1(pack('H*',sha1($password))));
        }
        public function doLogin($name, $pass){
            try{
                $param = array(':uname'=>$name, ':upass'=>$pass);
                $sql = "SELECT * FROM tbl_users WHERE username=:uname && password=:upass";
                $stmt = $this->db->prepare($sql);
                // $stmt->execute(array(':uname'=>$name, ':upass'=>substr($this->hashPassword($pass),0,20)));
                $stmt->execute(array(':uname'=>$name, ':upass'=>$pass));
                $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() == 1){
                    $_SESSION['user_id'] = $userRow['user_ID'];
                    $_SESSION['user_name'] = $userRow['username'];
                    $_SESSION['user_code'] = $userRow['usercode'];
                    return true;
                }else {
                    return false;
                }
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }
        public function doLogout(){
            session_destroy();
            session_unset();
            //unset($_SESSION['user_id']);
            return true;
        }
    }
?>