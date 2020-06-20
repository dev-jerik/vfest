<?php 
	include_once 'Helper.php';
	class TeacherModel extends Helper{
		public function __construct($DB_CON){
            parent::__construct($DB_CON);
        }


        public function findTeacher($gradeLevel) {
            $sql = "SELECT * FROM tbl_sysectionadvi adviser
                    INNER JOIN tbl_personproof prof ON prof.perID=adviser.secAdviserID
                    WHERE adviser.gradelevel={$gradeLevel} AND adviser.sy=".date("Y");
            return $this->executeQuery($sql);
        }
    }