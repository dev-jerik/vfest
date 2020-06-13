# Database patches
# Please put all your patches here so that other developers can execute the patches on his/her database.

# Format: YearMonthDate

#### Jerik 20200613 ####
ALTER TABLE `tbl_gradesubjects`
  ADD COLUMN `firstGrading` VARCHAR(4) NULL DEFAULT NULL AFTER `subID`,
  ADD COLUMN `secondGrading` VARCHAR(4) NULL DEFAULT NULL AFTER `firstGrading`,
  ADD COLUMN `thirdGrading` VARCHAR(4) NULL DEFAULT NULL AFTER `secondGrading`,
  ADD COLUMN `fourthGrading` VARCHAR(4) NULL DEFAULT NULL AFTER `thirdGrading`,
  ADD COLUMN `remarks` VARCHAR(20) NULL DEFAULT NULL AFTER `fourthGrading`;

ALTER TABLE `tbl_sysectionadvi`
  DROP PRIMARY KEY;

ALTER TABLE `tbl_sysectionadvi`
  ADD CONSTRAINT `FK_tbl_sysectionadvi_tbl_personproof` FOREIGN KEY (`secAdviserID`) REFERENCES `tbl_personproof` (`perID`);

ALTER TABLE `tbl_class`
  DROP INDEX `studID`,
  DROP INDEX `gradelevel`,
  DROP FOREIGN KEY `tbl_class_ibfk_2`,
  DROP FOREIGN KEY `tbl_class_ibfk_1`;

ALTER TABLE tbl_class ADD PRIMARY KEY(gradelevel,studID);

ALTER TABLE `tbl_class`
  ADD CONSTRAINT `FK_tbl_class_tbl_curriculum` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  ADD CONSTRAINT `FK_tbl_class_tbl_students` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`);

ALTER TABLE `tbl_students`
  DROP COLUMN `age`;

ALTER TABLE `tbl_sysectionadvi`
  DROP INDEX `SY`;
