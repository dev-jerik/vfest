#### Jerik 20200619 ####
ALTER TABLE `tbl_students`
	CHANGE COLUMN `curr_grdlevel` `curr_grdlevel` INT NOT NULL DEFAULT 0 AFTER `school_add`,
	ADD CONSTRAINT `FK_tbl_students_tbl_curriculum` FOREIGN KEY (`curr_grdlevel`) REFERENCES `tbl_curriculum` (`gradelevel`);
