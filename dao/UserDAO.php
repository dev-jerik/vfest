<?php
    require "ConnectionDAO.php";

    class UserDAO extends ConnectionDAO {

        public function login($uname, $pword) {
            try {
                $this->openConnection();
                $stmt = $this->dbh->prepare("SELECT * FROM tbl_users WHERE username=? and password=?");
                $stmt->bindParam(1, $uname);
                $stmt->bindParam(2, $pword);
                $stmt->execute();

                if($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['id'] = $res["user_ID"];
                    $_SESSION['name'] = $res["username"];
                    $_SESSION['userCode'] = $res["usercode"];
                    $_SESSION['perID'] = $res["perID"];
                    if($_SESSION['userCode'] == "admin")
                        header("Location: admin/home.php");
                    else if ($_SESSION['userCode'] == "teacher")
                        header("Location: teacher/home.php");
                    else if ($_SESSION['userCode'] == "accounting")
                        header("Location: accounting/home.php");
                    else if ($_SESSION['userCode'] == "principal")
                        header("Location: principal/home.php");
                }else{
                    return false;
                }
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        public function log_test(){
            if(isset($_SESSION['id'])){
                return true;
            }
            return false;
        }

        function password($str){
            return '*'.strtoupper(sha1(pack('H*',sha1($str))));
        }

        function get_pword($str){
            $new_str = '*'.strtoupper(sha1(pack('H*',sha1($str))));
            return substr($new_str, 0, 20);
        }

        public function signup($fname, $lname, $uname, $pword) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("INSERT INTO registrar(surname, firstname, username, password) 
                                                VALUES(?, ?, ?, ?)");
                                                      
                $stmt->bindParam(1, $lname);
                $stmt->bindParam(2, $fname);   
                $stmt->bindParam(3, $uname);   
                $stmt->bindParam(4, $this->password($pword));                                        
                
                $stmt->execute(); 

                return true;
            } catch (Exception $e){
                echo $e->getMessage();
            }
            return false;
        }
        public function getStudInfo($uid) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT * FROM tbl_students WHERE studID = '".$uid."' ");
                $stmt->execute();

                $info = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $info[0] = $res['last_name'];
                    $info[1] = $res['first_name'];
                    $info[2] = $res['middle_name'];
                    $info[4] = $res['gender'];
                    $info[5] = $res['dob'];
                    $info[6] = $res['pob'];
                    $info[7] = $res['religion'];
                    $info[8] = $res['last_school'];
                    $info[9] = $res['school_add'];
                    $info[10] = $res['curr_grdlevel'];
                    $info[11] = $res['fam_add'];
                    $info[12] = $res['phone'];
                    $info[13] = $res['studID'];

                }            
                return $info; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }

        public function editStudName($first_name, $middle_name, $last_name, $gender, $dob, $pob, $religion, $last_school, $school_add, $fam_add, $phone ,$studID) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("UPDATE tbl_students SET studID=? first_name=?, middle_name=?, last_name=?, gender=?, dob=?, pob=?, religion=?, last_school=?, school_add=?, fam_add=?, phone=?  WHERE studID=?");
                                                      
                $stmt->bindParam(1, $last_name);   
                $stmt->bindParam(2, $first_name);   
                $stmt->bindParam(3, $middle_name);   
                $stmt->bindParam(4, $gender);   
                $stmt->bindParam(5, $dob);  
                $stmt->bindParam(6, $pob);  
                $stmt->bindParam(7, $dob);
                $stmt->bindParam(8, $religion);
                $stmt->bindParam(9, $last_school);
                $stmt->bindParam(10, $school_add);
                $stmt->bindParam(11, $fam_add);
                $stmt->bindParam(12, $phone); 
                $stmt->bindParam(13, $studID);                                                   
                
                $stmt->execute(); 

            }
            catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function getparentInfo($uid) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT * FROM tbl_parents WHERE PID = '".$uid."' ");
                $stmt->execute();

                $data = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[0] = $res['plast_name'];
                    $data[1] = $res['pfirst_name'];
                    $data[2] = $res['pmiddle_name'];
                    $data[3] = $res['psex'];
                    $data[4] = $res['occupation'];
                    $data[5] = $res['VSUconnected'];
                    $data[6] = $res['deptoffice'];
                    $data[7] = $res['officehead'];
                    $data[8] = $res['officeAdd'];

                }            
                return $data; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }

        public function editParentsName($pfirst_name, $pmiddle_name, $plast_name, $psex, $occupation, $VSUconnected, $deptoffice, $officehead, $officeAdd) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("UPDATE tbl_parents SET pfirst_name=?, pmiddle_name=?, plast_name=?, psex=?, occupation=?, VSUconnected=? ,deptoffice=?, officehead=?, officeAdd=?  WHERE PID=?");
                                                      
                $stmt->bindParam(1, $plast_name);   
                $stmt->bindParam(2, $pfirst_name);   
                $stmt->bindParam(3, $plast_name);   
                $stmt->bindParam(4, $psex);   
                $stmt->bindParam(5, $occupation);   
                $stmt->bindParam(6, $VSUconnected);  
                $stmt->bindParam(7, $deptoffice);                                        
                $stmt->bindParam(8, $officehead);
                $stmt->bindParam(9, $officeAdd);  
                $stmt->execute(); 

            } 
             catch (Exception $e){
                echo $e->getMessage();
            }
            return false;
        }
        public function getsiblingsInfo($uid) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT * FROM tbl_siblings WHERE sib_ID = '".$uid."' ");
                $stmt->execute();

                $for = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $for[0] = $res['givenName'];
                    $for[1] = $res['dob'];
                    
                }            
                return $for; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function editSiblingsName($givenName, $sdob) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("UPDATE tbl_siblings SET givenName=?, sdob=? WHERE sib_ID=?");
                                                      
                $stmt->bindParam(1, $givenName);   
                $stmt->bindParam(2, $sdob);   
                $stmt->execute(); 

            } 
             catch (Exception $e){
                echo $e->getMessage();
            }
            return false;
        }
        public function getstaffsInfo($uid) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT * FROM tbl_personproof WHERE perID = '".$uid."' ");
                $stmt->execute();

                $info = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $info[0] = $res['l_name'];
                    $info[1] = $res['f_name'];
                    $info[2] = $res['m_name'];
                    $info[3] = $res['sdob'];
                    $info[4] = $res['ssex'];
                    $info[5] = $res['scivilstatus'];
                    $info[6] = $res['shome_add'];
                    $info[7] = $res['eligibility'];
                    $info[8] = $res['sphone'];
                    
                }            
                return $info; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function editStaffsName($l_name,$f_name, $m_name, $sdob,$ssex, $scivilstatus, $home_add, $eligibility, $sphone) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("UPDATE tbl_personproof SET l_name=?, f_name=?, m_name=?, sdob=?, ssex=?, scivilstatus=?, home_add=?, eligibility=? sphone=? WHERE perID=?");
                                                      
                $stmt->bindParam(1, $l_name);   
                $stmt->bindParam(2, $f_name);
                $stmt->bindParam(3, $m_name);
                $stmt->bindParam(4, $sdob);
                $stmt->bindParam(5, $ssex);
                $stmt->bindParam(6, $scivilstatus);
                $stmt->bindParam(7, $home_add);
                $stmt->bindParam(8, $eligibility);
                $stmt->bindParam(9, $phone);
                $stmt->execute(); 

            } 
             catch (Exception $e){
                echo $e->getMessage();
            }
            return false;
        }
        public function geteducbgInfo($uid) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT * FROM tbl_educbg WHERE level = '".$uid."' ");
                $stmt->execute();

                $data = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[0] = $res['degree'];
                    $data[1] = $res['school'];
                    $data[2] = $res['yrstart'];
                    $data[3] = $res['yrend'];
                    
                }            
                return $data; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function editeducbg($degree,$school, $yrstart, $yrend) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("UPDATE tbl_educbg SET degree=?, school=?, yrstart=?, yrend=? WHERE level=?");
                                                      
                $stmt->bindParam(1, $degree);   
                $stmt->bindParam(2, $school);
                $stmt->bindParam(3, $yrstart);
                $stmt->bindParam(4, $yrend);
                $stmt->execute(); 

            } 
             catch (Exception $e){
                echo $e->getMessage();
            }
            return false;
        }
        public function getSRInfo($uid) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT * FROM tbl_servicerec WHERE srID = '".$uid."' ");
                $stmt->execute();

                $for = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $for[0] = $res['date_started'];
                    $for[1] = $res['position'];
                    $for[2] = $res['monthly_salary'];
                    
                }            
                return $for; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function editSR($date_started,$position, $monthly_salary) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("UPDATE tbl_servicerec SET date_started=?, position=?, monthly_salary=?WHERE srID=?");
                                                      
                $stmt->bindParam(1, $date_started);   
                $stmt->bindParam(2, $position);
                $stmt->bindParam(3, $monthly_salary);
                $stmt->execute(); 

            } 
             catch (Exception $e){
                echo $e->getMessage();
            }
            return false;
        }

        public function getUserInfo($uid) {
            try{
                $this->openConnection();

                
                $stmt = $this->dbh->prepare("SELECT * 
                                            FROM tbl_users, tbl_personproof 
                                            WHERE tbl_users.perID = tbl_personproof.perID AND tbl_users.perID = '".$uid."'"
                                            );
                $stmt->execute();

                $info = array();
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $info[0] = $res['username'];
                    $info[1] = $res['l_name'];
                    $info[2] = $res['f_name'];
                    $info[3] = $res['m_name'];
                    $info[4] = $res['sdob'];
                    $info[5] = $res['ssex'];
                    $info[6] = $res['sphone'];
                    $info[7] = $res['scivilstatus'];
                    $info[8] = $res['shome_add'];
                    $info[9] = $res['eligibility'];
                    $info[10] = $res['password'];
                    $info[11] = $res['usercode'];
                }            
                return $info; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function getClassStudents($year, $levelId) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT stud.* FROM tbl_class as class
                                            INNER JOIN tbl_students stud on stud.studID=class.studID
                                            WHERE class.sy='".$year."' AND class.gradelevel='".$levelId."'");
                $stmt->execute();

                $i=0;
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $array[$i][0] = $res['last_name'];
                    $array[$i][1] = $res['first_name'];
                    $array[$i][2] = $res['middle_name'];
                    $array[$i][4] = $res['gender'];
                    $array[$i][5] = $res['dob'];
                    $array[$i][6] = $res['pob'];
                    $array[$i][7] = $res['religion'];
                    $array[$i][8] = $res['last_school'];
                    $array[$i][9] = $res['school_add'];
                    $array[$i][10] = $res['curr_grdlevel'];
                    $array[$i][11] = $res['fam_add'];
                    $array[$i][12] = $res['phone'];
                    $array[$i][13] = $res['studID'];
                    $i++;
                }       
                return $array; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function getClassSubjects($year, $levelId) {
            try{
                $this->openConnection();

                $stmt = $this->dbh->prepare("SELECT tbl_subjects.description As subject
                                            FROM `tbl_gradesubjects`, tbl_subjects
                                            WHERE gradelevel = '".$levelId."' AND tbl_gradesubjects.subID = tbl_subjects.subID");
                $stmt->execute();
                $array[]=0;
                $i=0;
                while($res=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $array[$i] = $res['subject'];
                    $i++;
                }       
                return $array; 

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }


    }

?>