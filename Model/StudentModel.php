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

        public function searchStudent($search=""){
            $sql = "SELECT * FROM tbl_students 
                    WHERE last_name LIKE '%".$search."%'
 	                OR first_name LIKE '%".$search."%' ORDER BY studID DESC";                    
            return $this->executeQuery($sql, null, "fetchAll");
        }
    }