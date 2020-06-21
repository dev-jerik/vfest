<?php 
	include_once 'Helper.php';
	class StudentModel extends Helper{
		public function __construct($DB_CON){
            parent::__construct($DB_CON);
        }

        public function findStudent($studId) {
            $sql = "SELECT * FROM tbl_students
                    WHERE tbl_students.studID = {$studId};";
            return $this->executeQuery($sql);
        }

        public function getStudentInfo($studId) {
            $sql = "SELECT stud.*, concat(prof.l_name,', ', prof.f_name) AS teacher FROM tbl_students stud
                    LEFT JOIN tbl_class class ON (class.studID=stud.studID)
                    LEFT JOIN tbl_sysectionadvi adviser ON (adviser.gradelevel=class.gradelevel AND adviser.SY=class.SY)
                    LEFT JOIN tbl_personproof prof ON prof.perID=adviser.secAdviserID
                    WHERE stud.studID = {$studId}";
            return $this->executeQuery($sql);
        }

        public function searchStudent($search=""){
            $sql = "SELECT * FROM tbl_students 
                    WHERE last_name LIKE '%".$search."%'
 	                OR first_name LIKE '%".$search."%' ORDER BY studID DESC";                    
            return $this->executeQuery($sql, null, "fetchAll");
        }

        public function updateStudent($studId, $lastName, $firstName, $middleName, $gender, $dob, $pob, $religion,
            $currGradeLevel, $famAddress, $phone) {
                $sql ="UPDATE tbl_students SET last_name=:lastName, first_name=:firstName, middle_name=:middleName,
                gender=:gender, dob=:dob, pob=:pob, religion=:religion, curr_grdlevel=:currGradeLevel, fam_add=:famAddress,
                phone=:phone WHERE studID=:studId";
                
                $arrayParam = array("lastName"=>$lastName, "firstName"=>$firstName,
                "middleName"=>$middleName, "gender"=>$gender, "dob"=>$dob, "pob"=>$pob, "religion"=>$religion,
                "currGradeLevel"=>$currGradeLevel, "famAddress"=>$famAddress, "phone"=>$phone, "studId"=>$studId);
               
                $this->executeQuery($sql, $arrayParam, null);    
        }

        public function saveStudent($studId, $lastName, $firstName, $middleName, $gender, $dob, $pob, $religion,
            $currGradeLevel, $famAddress, $phone) {
            $sql ="INSERT INTO tbl_students VALUES(:studId, :lastName, :firstName, :middleName,
            :gender, :dob, :pob, :religion, 'lastSchool', 'school add', :currGradeLevel, :famAddress,
            :phone)";
            
            $arrayParam = array("studId"=>$studId, "lastName"=>$lastName, "firstName"=>$firstName,
            "middleName"=>$middleName, "gender"=>$gender, "dob"=>$dob, "pob"=>$pob, "religion"=>$religion,
            "currGradeLevel"=>$currGradeLevel, "famAddress"=>$famAddress, "phone"=>$phone);
           
            $this->executeQuery($sql, $arrayParam, null);    
        }

        public function deleteStudent($studId) {
            $sql ="DELETE FROM tbl_students WHERE tbl_students.studID = {$studId}";
            $this->executeQuery($sql);  
        }

    }