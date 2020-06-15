<?php
    require "ConnectionDAO.php";

    class TeacherDao extends ConnectionDAO {

        public function getClass($perID) {
            try{
                $this->openConnection();

                $query = "SELECT stud.studID, CONCAT(stud.last_name, ', ', stud.first_name, stud.middle_name) as name, class.gradelevel FROM tbl_class as class 
                    INNER JOIN tbl_students stud on stud.studID=class.studID
                    INNER JOIN tbl_sysectionadvi secAdvisor ON secAdvisor.secAdviserID = $perID
                    WHERE class.sy=".date("Y");

                $stmt = $this->dbh->prepare($query);
                $stmt->execute();
                
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e){
                echo $e->getMessage();
            }
        }

    }

?>