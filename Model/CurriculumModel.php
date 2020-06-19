<?php 
	include_once 'Helper.php';
	class CurriculumModel extends Helper{
		public function __construct($DB_CON){
            parent::__construct($DB_CON);
        }

        public function getCurriculum() {
            $sql = "SELECT * FROM tbl_curriculum";
            return $this->executeQuery($sql, null, "fetchAll");
        }
    }