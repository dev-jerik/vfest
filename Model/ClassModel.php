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

        public function getClassStudents($year, $levelId) {
            $sql = "SELECT stud.* FROM tbl_class as class
                    INNER JOIN tbl_students stud on stud.studID = class.studID
                    WHERE class.sy = {$year} AND class.gradelevel = {$levelId}";

            return $this->executeQuery($sql, null, "fetchAll");
        }

        public function getClassSubjects($year, $levelId) {
            $sql = "SELECT tbl_subjects.* 
                    FROM tbl_subjects
                    LEFT JOIN tbl_gradesubjects ON tbl_subjects.subID=tbl_gradesubjects.subID
                    WHERE tbl_gradesubjects.gradelevel = {$levelId}";

            return $this->executeQuery($sql, null, "fetchAll");
        }

        public function getClassTeacher($year, $levelId) {
            $sql = "SELECT perID, concat(l_name,', ', f_name,' ',m_name) AS teacher
                    FROM tbl_personproof  WHERE `perID` = (
                    SELECT secAdviserID FROM tbl_sysectionadvi WHERE gradelevel = {$levelId} AND SY = {$year} );";
            return $this->executeQuery($sql);
        }

    }