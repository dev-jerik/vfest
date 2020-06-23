<?php 
	include_once 'Helper.php';
	class ClassModel extends Helper{
		public function __construct($DB_CON){
            parent::__construct($DB_CON);
        }

        public function findStudent($studId) {
            $sql = "SELECT * FROM tbl_students
                    WHERE tbl_students.studID = {$studId};";
            return $this->executeQuery($sql);
        }

        public function getClassLevelList() {
            $sql = "SELECT * FROM tbl_curriculum";
            return $this->executeQuery($sql, null, "fetchAll");
        }

        public function getTotalStudent($year, $grade) {
            $sql = "SELECT COUNT(tbl_class.studID) As total FROM `tbl_class` WHERE tbl_class.SY = {$year} AND tbl_class.gradelevel={$grade}";
            return $this->executeQuery($sql);
        }

        public function getSchoolYears() {
            $sql = "SELECT DISTINCT `SY` As year FROM `tbl_class` ORDER BY SY DESC;";
            return $this->executeQuery($sql, null, "fetchAll");
        }

    }