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
            $sql = " SELECT stud.*, concat(prof.l_name,', ', prof.f_name) AS teacher FROM tbl_sysectionadvi adviser
            INNER JOIN tbl_personproof prof ON prof.perID=adviser.secAdviserID
            INNER JOIN tbl_class class ON (class.gradelevel=adviser.gradelevel AND class.SY=adviser.SY)
            INNER JOIN tbl_students stud ON stud.studID=class.studID
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
    }