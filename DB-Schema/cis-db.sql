CREATE DATABASE  IF NOT EXISTS `cis_cmanagerDboAdvancedVer_02` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cis_cmanagerDboAdvancedVer_02`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: cis_cmanagerDboAdvancedVer_02
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `academic_departments_list`
--

DROP TABLE IF EXISTS `academic_departments_list`;
/*!50001 DROP VIEW IF EXISTS `academic_departments_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `academic_departments_list` (
  `dp_id` tinyint NOT NULL,
  `dp_type` tinyint NOT NULL,
  `removed` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `code_no` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `head` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `facult_id` tinyint NOT NULL,
  `faculty` tinyint NOT NULL,
  `facult_head` tinyint NOT NULL,
  `campus_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `callender_event_category`
--

DROP TABLE IF EXISTS `callender_event_category`;
/*!50001 DROP VIEW IF EXISTS `callender_event_category`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `callender_event_category` (
  `id` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `parent_event_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `campus_list`
--

DROP TABLE IF EXISTS `campus_list`;
/*!50001 DROP VIEW IF EXISTS `campus_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `campus_list` (
  `id` tinyint NOT NULL,
  `code_name` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `details` tinyint NOT NULL,
  `head` tinyint NOT NULL,
  `campus_type` tinyint NOT NULL,
  `year_created` tinyint NOT NULL,
  `doc_links` tinyint NOT NULL,
  `removed` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `chatban`
--

DROP TABLE IF EXISTS `chatban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatban` (
  `banid` int(11) NOT NULL AUTO_INCREMENT,
  `dtmcreated` datetime DEFAULT NULL,
  `dtmtill` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `blockedCount` int(11) DEFAULT '0',
  PRIMARY KEY (`banid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatban`
--

LOCK TABLES `chatban` WRITE;
/*!40000 ALTER TABLE `chatban` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatconfig`
--

DROP TABLE IF EXISTS `chatconfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vckey` varchar(255) DEFAULT NULL,
  `vcvalue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatconfig`
--

LOCK TABLES `chatconfig` WRITE;
/*!40000 ALTER TABLE `chatconfig` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatconfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatgroup`
--

DROP TABLE IF EXISTS `chatgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatgroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `vcemail` varchar(64) DEFAULT NULL,
  `vclocalname` varchar(64) NOT NULL,
  `vccommonname` varchar(64) NOT NULL,
  `vclocaldescription` varchar(1024) NOT NULL,
  `vccommondescription` varchar(1024) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatgroup`
--

LOCK TABLES `chatgroup` WRITE;
/*!40000 ALTER TABLE `chatgroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatgroupoperator`
--

DROP TABLE IF EXISTS `chatgroupoperator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatgroupoperator` (
  `groupid` int(11) NOT NULL,
  `operatorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatgroupoperator`
--

LOCK TABLES `chatgroupoperator` WRITE;
/*!40000 ALTER TABLE `chatgroupoperator` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatgroupoperator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatmessage`
--

DROP TABLE IF EXISTS `chatmessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatmessage` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `threadid` int(11) NOT NULL,
  `ikind` int(11) NOT NULL,
  `agentId` int(11) NOT NULL DEFAULT '0',
  `tmessage` text NOT NULL,
  `dtmcreated` datetime DEFAULT NULL,
  `tname` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`messageid`),
  KEY `idx_agentid` (`agentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatmessage`
--

LOCK TABLES `chatmessage` WRITE;
/*!40000 ALTER TABLE `chatmessage` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatmessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatnotification`
--

DROP TABLE IF EXISTS `chatnotification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatnotification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) DEFAULT NULL,
  `vckind` varchar(16) DEFAULT NULL,
  `vcto` varchar(256) DEFAULT NULL,
  `dtmcreated` datetime DEFAULT NULL,
  `vcsubject` varchar(256) DEFAULT NULL,
  `tmessage` text NOT NULL,
  `refoperator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatnotification`
--

LOCK TABLES `chatnotification` WRITE;
/*!40000 ALTER TABLE `chatnotification` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatnotification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatoperator`
--

DROP TABLE IF EXISTS `chatoperator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatoperator` (
  `operatorid` int(11) NOT NULL AUTO_INCREMENT,
  `vclogin` varchar(64) NOT NULL,
  `vcpassword` varchar(64) NOT NULL,
  `vclocalename` varchar(64) NOT NULL,
  `vccommonname` varchar(64) NOT NULL,
  `vcemail` varchar(64) DEFAULT NULL,
  `dtmlastvisited` datetime DEFAULT NULL,
  `istatus` int(11) DEFAULT '0',
  `vcavatar` varchar(255) DEFAULT NULL,
  `vcjabbername` varchar(255) DEFAULT NULL,
  `iperm` int(11) DEFAULT '65535',
  `inotify` int(11) DEFAULT '0',
  `dtmrestore` datetime DEFAULT NULL,
  `vcrestoretoken` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`operatorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatoperator`
--

LOCK TABLES `chatoperator` WRITE;
/*!40000 ALTER TABLE `chatoperator` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatoperator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatresponses`
--

DROP TABLE IF EXISTS `chatresponses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatresponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `vcvalue` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatresponses`
--

LOCK TABLES `chatresponses` WRITE;
/*!40000 ALTER TABLE `chatresponses` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatresponses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatrevision`
--

DROP TABLE IF EXISTS `chatrevision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatrevision` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatrevision`
--

LOCK TABLES `chatrevision` WRITE;
/*!40000 ALTER TABLE `chatrevision` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatrevision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatthread`
--

DROP TABLE IF EXISTS `chatthread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatthread` (
  `threadid` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(64) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `agentName` varchar(64) DEFAULT NULL,
  `agentId` int(11) NOT NULL DEFAULT '0',
  `dtmcreated` datetime DEFAULT NULL,
  `dtmmodified` datetime DEFAULT NULL,
  `lrevision` int(11) NOT NULL DEFAULT '0',
  `istate` int(11) NOT NULL DEFAULT '0',
  `ltoken` int(11) NOT NULL,
  `remote` varchar(255) DEFAULT NULL,
  `referer` text,
  `nextagent` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(8) DEFAULT NULL,
  `lastpinguser` datetime DEFAULT NULL,
  `lastpingagent` datetime DEFAULT NULL,
  `userTyping` int(11) DEFAULT '0',
  `agentTyping` int(11) DEFAULT '0',
  `shownmessageid` int(11) NOT NULL DEFAULT '0',
  `userAgent` varchar(255) DEFAULT NULL,
  `messageCount` varchar(16) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  PRIMARY KEY (`threadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatthread`
--

LOCK TABLES `chatthread` WRITE;
/*!40000 ALTER TABLE `chatthread` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatthread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_class_course_module`
--

DROP TABLE IF EXISTS `cis_acad_class_course_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_class_course_module` (
  `module_id` int(11) NOT NULL DEFAULT '0',
  `module_pg_course_id` int(11) DEFAULT NULL,
  `module_course_id` int(11) NOT NULL DEFAULT '0',
  `module_department_id` int(11) DEFAULT NULL,
  `module_campus_id` int(11) DEFAULT NULL,
  `module_faculty_id` int(11) DEFAULT NULL,
  `module_semester_structure_id` int(11) DEFAULT NULL,
  `module_programs_id` int(11) NOT NULL DEFAULT '0',
  `module_pg_sem_structure_id` int(11) DEFAULT NULL,
  `class_stream_id` int(11) NOT NULL DEFAULT '0',
  `class_stream_semester_id` int(11) NOT NULL DEFAULT '0',
  `class_stream_stream_id` int(11) DEFAULT NULL,
  `class_stream_academic_year_id` int(11) NOT NULL DEFAULT '0',
  `class_stream_ref_course_id` int(11) DEFAULT NULL,
  `class_stream_dp_course_id` int(11) NOT NULL DEFAULT '0',
  `class_stream_department_id` int(11) DEFAULT NULL,
  `class_stream_campus_id` int(11) DEFAULT NULL,
  `class_stream_faculty_id` int(11) DEFAULT NULL,
  `class_stream_semester_structure_id` int(11) DEFAULT NULL,
  `class_stream_programs_id` int(11) NOT NULL DEFAULT '0',
  `class_stream_ref_pg_sem_structure_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_point` float NOT NULL,
  `penalty_id` int(11) DEFAULT '0',
  `cis_acad_class_course_modulecol` varchar(45) DEFAULT NULL,
  `grading_scheme_id` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`module_id`,`module_course_id`,`module_programs_id`,`class_stream_programs_id`,`class_stream_academic_year_id`,`class_stream_semester_id`,`class_stream_id`,`class_stream_dp_course_id`),
  KEY `fk_cis_acad_course_module_has_cis_student_class_stream_cis__idx` (`class_stream_id`,`class_stream_semester_id`,`class_stream_stream_id`,`class_stream_academic_year_id`,`class_stream_ref_course_id`,`class_stream_dp_course_id`,`class_stream_department_id`,`class_stream_campus_id`,`class_stream_faculty_id`,`class_stream_semester_structure_id`,`class_stream_programs_id`,`class_stream_ref_pg_sem_structure_id`),
  KEY `fk_cis_acad_course_module_has_cis_student_class_stream_cis__idx1` (`module_id`,`module_pg_course_id`,`module_course_id`,`module_department_id`,`module_campus_id`,`module_faculty_id`,`module_semester_structure_id`,`module_programs_id`,`module_pg_sem_structure_id`),
  KEY `fk_cis_acad_class_course_module_cis_acad_grading_scheme1_idx` (`grading_scheme_id`),
  KEY `fk_penalty_id_ref` (`penalty_id`),
  KEY `pk_class_module_id` (`id`),
  KEY `index_class_module_id` (`id`),
  KEY `index_class_module_ref` (`module_id`,`id`),
  CONSTRAINT `fk_cis_acad_class_course_module_cis_acad_grading_scheme1` FOREIGN KEY (`grading_scheme_id`) REFERENCES `cis_acad_grading_scheme` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_acad_course_module_has_cis_student_class_stream_cis_ac1` FOREIGN KEY (`module_id`, `module_pg_course_id`, `module_course_id`, `module_department_id`, `module_campus_id`, `module_faculty_id`, `module_semester_structure_id`, `module_programs_id`, `module_pg_sem_structure_id`) REFERENCES `cis_acad_course_module` (`id`, `pg_course_id`, `course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `pg_sem_structure_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_acad_course_module_has_cis_student_class_stream_cis_st1` FOREIGN KEY (`class_stream_id`, `class_stream_semester_id`, `class_stream_stream_id`, `class_stream_academic_year_id`, `class_stream_ref_course_id`, `class_stream_dp_course_id`, `class_stream_department_id`, `class_stream_campus_id`, `class_stream_faculty_id`, `class_stream_semester_structure_id`, `class_stream_programs_id`, `class_stream_ref_pg_sem_structure_id`) REFERENCES `cis_student_class_stream` (`id`, `semester_id`, `stream_id`, `academic_year_id`, `ref_course_id`, `dp_course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `ref_pg_sem_structure_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_module_penalty_id` FOREIGN KEY (`penalty_id`) REFERENCES `cis_acad_course_module_penalty` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_class_course_module`
--

LOCK TABLES `cis_acad_class_course_module` WRITE;
/*!40000 ALTER TABLE `cis_acad_class_course_module` DISABLE KEYS */;
INSERT INTO `cis_acad_class_course_module` VALUES (1,373,1,1,1,1,9,5,8,1,1,1,3,373,1,1,1,1,9,5,8,1,12,1,NULL,1,'2014-12-17 00:00:00',1),(2,373,1,1,1,1,9,5,8,1,1,1,3,373,1,1,1,1,9,5,8,2,12,1,NULL,1,'2014-12-17 00:00:00',1);
/*!40000 ALTER TABLE `cis_acad_class_course_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_class_course_module_exam`
--

DROP TABLE IF EXISTS `cis_acad_class_course_module_exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_class_course_module_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `event_category_id` int(11) DEFAULT NULL,
  `exam_category_id` int(11) NOT NULL DEFAULT '0',
  `venue` varchar(45) DEFAULT NULL,
  `attended_check` int(11) DEFAULT NULL,
  `invigilator` varchar(70) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `class_semester_id` int(11) DEFAULT NULL,
  `class_stream_id` int(11) DEFAULT NULL,
  `class_academic_year_id` int(11) DEFAULT NULL,
  `class_ref_course_id` int(11) DEFAULT NULL,
  `class_dp_course_id` int(11) DEFAULT NULL,
  `class_department_id` int(11) DEFAULT NULL,
  `class_campus_id` int(11) DEFAULT NULL,
  `class_faculty_id` int(11) DEFAULT NULL,
  `class_structure_id` int(11) DEFAULT NULL,
  `class_programs_id` int(11) DEFAULT NULL,
  `class_ref_pg_sem_structure_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0',
  `module_assign_id` int(11) NOT NULL DEFAULT '0',
  `grading_scheme_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`exam_category_id`,`module_assign_id`,`module_id`),
  KEY `fk_cis_acad_class_course_module_exam_cis_college_callender__idx` (`event_id`,`event_category_id`),
  KEY `fk_cis_acad_class_course_module_exam_cis_acad_class_exam_ca_idx` (`exam_category_id`),
  KEY `fk_cis_acad_class_course_module_exam_cis_student_class_stre_idx` (`class_id`,`class_semester_id`,`class_stream_id`,`class_academic_year_id`,`class_ref_course_id`,`class_dp_course_id`,`class_department_id`,`class_campus_id`,`class_faculty_id`,`class_structure_id`,`class_programs_id`,`class_ref_pg_sem_structure_id`),
  KEY `fk_module_index_ref` (`module_id`,`module_assign_id`,`grading_scheme_id`),
  CONSTRAINT `fk_cis_acad_class_course_module_exam_cis_acad_class_exam_cate1` FOREIGN KEY (`exam_category_id`) REFERENCES `cis_acad_class_exam_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_acad_class_course_module_exam_cis_college_callender_ev1` FOREIGN KEY (`event_id`, `event_category_id`) REFERENCES `cis_college_callender_event` (`id`, `event_category_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_acad_class_course_module_exam_cis_student_class_stream1` FOREIGN KEY (`class_id`, `class_semester_id`, `class_stream_id`, `class_academic_year_id`, `class_ref_course_id`, `class_dp_course_id`, `class_department_id`, `class_campus_id`, `class_faculty_id`, `class_structure_id`, `class_programs_id`, `class_ref_pg_sem_structure_id`) REFERENCES `cis_student_class_stream` (`id`, `semester_id`, `stream_id`, `academic_year_id`, `ref_course_id`, `dp_course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `ref_pg_sem_structure_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_module_index_ref_id` FOREIGN KEY (`module_id`, `module_assign_id`) REFERENCES `cis_acad_class_course_module` (`module_id`, `id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_class_course_module_exam`
--

LOCK TABLES `cis_acad_class_course_module_exam` WRITE;
/*!40000 ALTER TABLE `cis_acad_class_course_module_exam` DISABLE KEYS */;
INSERT INTO `cis_acad_class_course_module_exam` VALUES (5,16,7,1,'DH',0,'Angelina',1,1,1,3,373,1,1,1,1,9,5,8,1,1,1,1),(6,16,7,2,'T4',0,'My self',1,1,1,3,373,1,1,1,1,9,5,8,1,2,2,1);
/*!40000 ALTER TABLE `cis_acad_class_course_module_exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_class_course_module_exam_result`
--

DROP TABLE IF EXISTS `cis_acad_class_course_module_exam_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_class_course_module_exam_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raw_mark` float NOT NULL,
  `student_enroll_id` int(11) DEFAULT NULL,
  `student_registration_id` varchar(45) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `changes_history` text,
  `file_ref_id` int(11) DEFAULT NULL,
  `exam_id` int(11) NOT NULL DEFAULT '0',
  `exam_category_id` int(11) NOT NULL DEFAULT '0',
  `module_assign_id` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0',
  `grading_scheme_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`exam_id`,`exam_category_id`,`module_assign_id`,`module_id`),
  KEY `fk_student_class_enrroll_id` (`student_enroll_id`,`student_registration_id`,`student_id`),
  KEY `fk_cis_acad_class_stream_course_module_exam_result_cis_acad_idx` (`exam_id`,`exam_category_id`,`module_assign_id`,`module_id`,`grading_scheme_id`),
  CONSTRAINT `fk_cis_acad_class_stream_course_module_exam_result_cis_acad_c1` FOREIGN KEY (`exam_id`, `exam_category_id`, `module_assign_id`, `module_id`) REFERENCES `cis_acad_class_course_module_exam` (`id`, `exam_category_id`, `module_assign_id`, `module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_student_class_enroll_id` FOREIGN KEY (`student_enroll_id`, `student_registration_id`, `student_id`) REFERENCES `cis_student_class_enrollment` (`id`, `registration_id`, `student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_class_course_module_exam_result`
--

LOCK TABLES `cis_acad_class_course_module_exam_result` WRITE;
/*!40000 ALTER TABLE `cis_acad_class_course_module_exam_result` DISABLE KEYS */;
INSERT INTO `cis_acad_class_course_module_exam_result` VALUES (1,78,519,'1401301120225 ',261,'2014-12-17 00:00:00',1,'2014-12-16 21:00:00',1,'{none}',1,5,1,1,1,1),(2,87,519,'1401301120225',261,'2014-12-17 00:00:00',1,'2014-12-16 21:00:00',1,'{none}',1,6,2,2,2,1);
/*!40000 ALTER TABLE `cis_acad_class_course_module_exam_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_class_exam_category`
--

DROP TABLE IF EXISTS `cis_acad_class_exam_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_class_exam_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_class_exam_category`
--

LOCK TABLES `cis_acad_class_exam_category` WRITE;
/*!40000 ALTER TABLE `cis_acad_class_exam_category` DISABLE KEYS */;
INSERT INTO `cis_acad_class_exam_category` VALUES (1,'Major Examination','Major Examination Title'),(2,'Major Semester Tests','Major semesters tests done during the semester period.'),(3,'Assignments Tests','Class Assignments and simple quizzes done inside a class'),(4,'Practical Test exams','Practical test and assignments examination type');
/*!40000 ALTER TABLE `cis_acad_class_exam_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_course_module`
--

DROP TABLE IF EXISTS `cis_acad_course_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_course_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pg_course_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `semester_structure_id` int(11) NOT NULL DEFAULT '0',
  `programs_id` int(11) NOT NULL DEFAULT '0',
  `pg_sem_structure_id` int(11) NOT NULL DEFAULT '0',
  `title` text,
  `code` varchar(45) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`pg_course_id`,`course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`pg_sem_structure_id`),
  KEY `fk_cis_acad_course_module_cis_department_program_course1_idx` (`pg_course_id`,`course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`pg_sem_structure_id`),
  CONSTRAINT `fk_cis_acad_course_module_cis_department_program_course1` FOREIGN KEY (`pg_course_id`, `course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `pg_sem_structure_id`) REFERENCES `cis_department_program_course` (`id`, `course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `pg_sem_structure_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_course_module`
--

LOCK TABLES `cis_acad_course_module` WRITE;
/*!40000 ALTER TABLE `cis_acad_course_module` DISABLE KEYS */;
INSERT INTO `cis_acad_course_module` VALUES (1,373,1,1,1,1,9,5,8,'Computer System Maintenance and Repair','CSET 04102','2014-12-17 00:00:00','2014-12-18 00:00:00',1,1),(2,373,1,1,1,1,9,5,8,'Computer basic worD processing and spreadsheet','CSET 04103','2014-12-17 00:00:00','2014-12-17 00:00:00',1,1);
/*!40000 ALTER TABLE `cis_acad_course_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_course_module_penalty`
--

DROP TABLE IF EXISTS `cis_acad_course_module_penalty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_course_module_penalty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_course_module_penalty`
--

LOCK TABLES `cis_acad_course_module_penalty` WRITE;
/*!40000 ALTER TABLE `cis_acad_course_module_penalty` DISABLE KEYS */;
INSERT INTO `cis_acad_course_module_penalty` VALUES (1,'Retake based on failure on single module','retake',1,'Retake based on failure to modules'),(2,'Carry Based on failure on single subject','Carry',1,'Carry based on failure of single subject');
/*!40000 ALTER TABLE `cis_acad_course_module_penalty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_grade`
--

DROP TABLE IF EXISTS `cis_acad_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2) DEFAULT NULL,
  `code_value` int(11) DEFAULT NULL,
  `remarks` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_grade`
--

LOCK TABLES `cis_acad_grade` WRITE;
/*!40000 ALTER TABLE `cis_acad_grade` DISABLE KEYS */;
INSERT INTO `cis_acad_grade` VALUES (1,'A',1,'Excellent'),(2,'B+',2,'Very Good!!'),(3,'B',3,'Good'),(4,'C',4,'Normal'),(5,'D',5,'Poor'),(6,'E',6,'Very Poor'),(7,'F',7,'Failed'),(8,'A+',8,'Super excellent');
/*!40000 ALTER TABLE `cis_acad_grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_grading_scheme`
--

DROP TABLE IF EXISTS `cis_acad_grading_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_grading_scheme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_grading_scheme`
--

LOCK TABLES `cis_acad_grading_scheme` WRITE;
/*!40000 ALTER TABLE `cis_acad_grading_scheme` DISABLE KEYS */;
INSERT INTO `cis_acad_grading_scheme` VALUES (1,'OD-NTA Level 4 and 5','NTA-Leevl 4-5','2014-12-17 00:00:00','2014-12-18 00:00:00',1,'2014-12-18 00:00:00'),(2,'OD-level 6 Grading Scheme','NTA-Level 6 Grades','2014-12-17 00:00:00','2014-12-16 00:00:00',1,'2014-12-18 00:00:00');
/*!40000 ALTER TABLE `cis_acad_grading_scheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_acad_grading_scheme_item`
--

DROP TABLE IF EXISTS `cis_acad_grading_scheme_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_acad_grading_scheme_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL DEFAULT '0',
  `scheme_id` int(11) NOT NULL DEFAULT '0',
  `min_v` double DEFAULT NULL,
  `max_v` double DEFAULT NULL,
  PRIMARY KEY (`id`,`grade_id`,`scheme_id`),
  KEY `fk_cis_acad_grade_has_cis_acad_grading_scheme_cis_acad_grad_idx` (`scheme_id`),
  KEY `fk_cis_acad_grade_has_cis_acad_grading_scheme_cis_acad_grad_idx1` (`grade_id`),
  KEY `index_grading_scheme_id` (`id`),
  CONSTRAINT `fk_cis_acad_grade_has_cis_acad_grading_scheme_cis_acad_grade1` FOREIGN KEY (`grade_id`) REFERENCES `cis_acad_grade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cis_acad_grade_has_cis_acad_grading_scheme_cis_acad_gradin1` FOREIGN KEY (`scheme_id`) REFERENCES `cis_acad_grading_scheme` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_acad_grading_scheme_item`
--

LOCK TABLES `cis_acad_grading_scheme_item` WRITE;
/*!40000 ALTER TABLE `cis_acad_grading_scheme_item` DISABLE KEYS */;
INSERT INTO `cis_acad_grading_scheme_item` VALUES (1,1,1,80,89.9999008178711),(2,3,1,65,79.9999008178711),(3,4,1,50,64.9999008178711),(4,5,1,40,49.999900817871094),(5,7,1,0,39.999900817871094),(6,8,1,90,100);
/*!40000 ALTER TABLE `cis_acad_grading_scheme_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_afi_logs`
--

DROP TABLE IF EXISTS `cis_afi_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_afi_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_run` datetime DEFAULT NULL,
  `inserted_contents` int(11) DEFAULT NULL,
  `logs` longtext,
  `log_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_afi_logs`
--

LOCK TABLES `cis_afi_logs` WRITE;
/*!40000 ALTER TABLE `cis_afi_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_afi_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_campus_faculty`
--

DROP TABLE IF EXISTS `cis_campus_faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_campus_faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `facult_name` varchar(45) DEFAULT NULL,
  `head` varchar(45) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`id`,`campus_id`),
  KEY `fk_cis_campus_faculty_cis_campus_list1_idx` (`campus_id`),
  CONSTRAINT `fk_cis_campus_faculty_cis_campus_list1` FOREIGN KEY (`campus_id`) REFERENCES `cis_campus_list` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_campus_faculty`
--

LOCK TABLES `cis_campus_faculty` WRITE;
/*!40000 ALTER TABLE `cis_campus_faculty` DISABLE KEYS */;
INSERT INTO `cis_campus_faculty` VALUES (1,1,'none','---','2005-02-02');
/*!40000 ALTER TABLE `cis_campus_faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_campus_list`
--

DROP TABLE IF EXISTS `cis_campus_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_campus_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_name` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `details` text,
  `head` varchar(45) DEFAULT NULL,
  `campus_type` varchar(100) DEFAULT NULL,
  `year_created` date DEFAULT NULL,
  `doc_links` varchar(45) DEFAULT NULL,
  `removed` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_campus_list`
--

LOCK TABLES `cis_campus_list` WRITE;
/*!40000 ALTER TABLE `cis_campus_list` DISABLE KEYS */;
INSERT INTO `cis_campus_list` VALUES (1,'Main','Main Campus','Dar es Salaam','','Prof. J. Kondoro','main','2004-03-09','',0),(2,'Mwanza','Mwanza Campus','Mwanza','','Prof. J. Another','sub','2004-03-09','',0),(3,'Mby','My Campus','Mbeya','','Henry','sub','2008-09-16','',0);
/*!40000 ALTER TABLE `cis_campus_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_academic_years`
--

DROP TABLE IF EXISTS `cis_college_academic_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_academic_years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `notation` varchar(45) DEFAULT NULL,
  `y_separator` varchar(3) DEFAULT NULL,
  `comments` blob,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_academic_years`
--

LOCK TABLES `cis_college_academic_years` WRITE;
/*!40000 ALTER TABLE `cis_college_academic_years` DISABLE KEYS */;
INSERT INTO `cis_college_academic_years` VALUES (1,'2004-09-15 00:00:00','2005-09-15 00:00:00',0,'2004/2005','`/`',NULL,2004,2005,0),(2,'2005-09-14 00:00:00','2006-09-15 00:00:00',0,'2005/2006','`/`',NULL,2005,2006,0),(3,'2014-09-12 00:00:00','2015-09-12 00:00:00',1,'2014/2015','`/`',NULL,2014,2015,0),(4,'2013-09-11 00:00:00','2014-09-18 00:00:00',1,'2013/2014','`/`',NULL,2013,2014,0),(5,'2007-09-19 00:00:00','2008-09-18 00:00:00',0,'2007/2008','`/`',NULL,2007,2008,0),(6,'2006-10-18 00:00:00','2007-10-17 00:00:00',0,'2006/2007','`/`',NULL,2006,2007,0),(7,'2009-10-14 00:00:00','2010-10-20 00:00:00',0,'2009/2010','`/`',NULL,2009,2010,0),(8,'2010-10-20 00:00:00','2011-10-12 00:00:00',0,'2010/2011','`/`',NULL,2010,2011,0),(9,'2011-10-12 00:00:00','2012-10-17 00:00:00',0,'2011/2012','`/`',NULL,2011,2012,0),(10,'2012-10-10 00:00:00','2013-10-16 00:00:00',0,'2012/2013','`/`',NULL,2012,2013,0);
/*!40000 ALTER TABLE `cis_college_academic_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_callender_event`
--

DROP TABLE IF EXISTS `cis_college_callender_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_callender_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `event_category_id` int(11) NOT NULL DEFAULT '0',
  `academic_year_id` int(11) NOT NULL,
  `event_type` int(11) DEFAULT '1',
  `comments` text NOT NULL,
  PRIMARY KEY (`id`,`event_category_id`),
  UNIQUE KEY `start_date_end_date_event_category_id_index` (`start_date`,`end_date`,`event_category_id`),
  KEY `fk_cis_college_callender_event_cis_college_calender_event_t_idx` (`event_category_id`),
  CONSTRAINT `fk_cis_college_callender_event_cis_college_calender_event_typ1` FOREIGN KEY (`event_category_id`) REFERENCES `cis_college_callender_event_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_callender_event`
--

LOCK TABLES `cis_college_callender_event` WRITE;
/*!40000 ALTER TABLE `cis_college_callender_event` DISABLE KEYS */;
INSERT INTO `cis_college_callender_event` VALUES (14,'2014-09-12 12:00:00','2014-02-23 12:00:39',5,3,1,'Semester 1 for OD, BENG, BTECH and Semester 3 for Higher Diploma Students'),(15,'2014-09-23 12:00:00','2015-09-16 12:00:00',5,3,1,'Semester 2 for OD, BENG, BTECH and Semester 4 for Higher Diploma'),(16,'2014-12-10 14:00:00','2014-12-10 15:00:00',7,3,4,'');
/*!40000 ALTER TABLE `cis_college_callender_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_callender_event_category`
--

DROP TABLE IF EXISTS `cis_college_callender_event_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_callender_event_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(145) DEFAULT NULL,
  `description` text,
  `parent_event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cis_college_calender_event_types_cis_college_calender_ev_idx` (`parent_event_id`),
  CONSTRAINT `fk_cis_college_calender_event_types_cis_college_calender_even1` FOREIGN KEY (`parent_event_id`) REFERENCES `cis_college_callender_event_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_callender_event_category`
--

LOCK TABLES `cis_college_callender_event_category` WRITE;
/*!40000 ALTER TABLE `cis_college_callender_event_category` DISABLE KEYS */;
INSERT INTO `cis_college_callender_event_category` VALUES (1,'Start of Academic Year','Starting of Academic Year',NULL),(2,'Start of Semester ','Starting of Academic Semester',1),(3,'End of Semester','Ending of semester',2),(4,'End of Academic Year','Ending of Academic Year',3),(5,'Academic Semester for OD,BENG & BTECH Students','Academic Semester for Programs',1),(6,'Final Semester Examination Event (FE)','Major tests FE',NULL),(7,'Semester Major Test Exam','Semetser major tests',NULL),(8,'Semester Assignments test','Semester Assignments test done during the semester event',NULL),(9,'Practical Tests (Major Only)','Major practical tests examination',NULL);
/*!40000 ALTER TABLE `cis_college_callender_event_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_callender_semester`
--

DROP TABLE IF EXISTS `cis_college_callender_semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_callender_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) DEFAULT NULL,
  `event_id` int(11) NOT NULL DEFAULT '0',
  `event_category_id` int(11) NOT NULL DEFAULT '0',
  `semester_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) NOT NULL,
  `sem_structure_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`event_id`,`event_category_id`),
  UNIQUE KEY `ev_cat_id_sem_id_acyear_id_sem_str_id_index` (`event_category_id`,`semester_id`,`academic_year_id`,`sem_structure_id`),
  KEY `fk_cis_college_callender_semester_cis_college_callender_eve_idx` (`event_id`,`event_category_id`),
  KEY `fk_cis_college_callender_semester_cis_semester_list1_idx` (`semester_id`),
  KEY `sem_structure_id` (`sem_structure_id`),
  CONSTRAINT `cis_college_callender_semester_ibfk_1` FOREIGN KEY (`sem_structure_id`) REFERENCES `cis_semester_structure` (`id`),
  CONSTRAINT `fk_cis_college_callender_semester_cis_college_callender_event1` FOREIGN KEY (`event_id`, `event_category_id`) REFERENCES `cis_college_callender_event` (`id`, `event_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_college_callender_semester_cis_semester_list1` FOREIGN KEY (`semester_id`) REFERENCES `cis_semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_callender_semester`
--

LOCK TABLES `cis_college_callender_semester` WRITE;
/*!40000 ALTER TABLE `cis_college_callender_semester` DISABLE KEYS */;
INSERT INTO `cis_college_callender_semester` VALUES (32,1,14,5,1,3,8),(33,1,14,5,1,3,10),(34,1,14,5,3,3,9),(35,1,15,5,2,3,8),(36,1,15,5,2,3,10),(37,1,15,5,4,3,9);
/*!40000 ALTER TABLE `cis_college_callender_semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_fee_category`
--

DROP TABLE IF EXISTS `cis_college_fee_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_fee_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `parent_category_id` int(11) DEFAULT NULL,
  `student_category_type` int(11) NOT NULL,
  `major_fee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_cis_college_fee_category_cis_college_fee_category1_idx` (`parent_category_id`),
  CONSTRAINT `fk_cis_college_fee_category_cis_college_fee_category1` FOREIGN KEY (`parent_category_id`) REFERENCES `cis_college_fee_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_fee_category`
--

LOCK TABLES `cis_college_fee_category` WRITE;
/*!40000 ALTER TABLE `cis_college_fee_category` DISABLE KEYS */;
INSERT INTO `cis_college_fee_category` VALUES (1,'Registration Fee','College/Institute Registration Fee',NULL,0,0),(2,'DIT Examination Fee','Payments for Exams',NULL,0,0),(3,'Student Identiry Card','Payment for Identity Card',NULL,0,0),(4,'Library Membership Fee','Payment for library membership',NULL,0,0),(5,'National Health Insurance Fund(NHIF)','Payment for Health Insurance',NULL,9,0),(6,'Dit Student Union Organization Fee','Payment for DITSO membership',NULL,0,0),(7,'Caution Money','Student Caution Payment',NULL,0,0),(8,'Industrial Practical Training (IPT) Expenses','Field Training Expenses',NULL,0,0),(9,'Transport Allowance To Attend IPT','Transport Fare payment to field station',NULL,0,0),(10,'Book/Stationery Costs','Cost for all stationeries and books during field',NULL,0,0),(11,'Accomodation and Meal Cost','Cost for meals and accomodation during IPT',NULL,0,0),(12,'Book  Costs','Cost of Books for Masters Students',NULL,0,0),(13,'Stationery Costs','Cost of stationery for Masters student',NULL,0,0),(14,'Dissertation Production Costs','Cost of Dissertation Production for Masters students',NULL,0,0),(15,'Research Cost','Cost of Research for Masters students second year.',NULL,0,0),(16,'Block I Fee','Addition Cost for Hostel(Block I)',NULL,0,0),(17,'Block II Fee','Addition Cost for Hostel(Block II)',NULL,0,0),(18,'Block III Fee','Addition Cost for Hostel(Block III)',NULL,0,0),(19,'Block IV Fee','Addition Cost for Hostel(Block IV)',NULL,0,0),(20,'Block V Fee','Addition Cost for Hostel(Block V)',NULL,0,0),(21,'Chang\'ombe Hostel Fee','Addition Cost for Hostel(Chang\'ombe)',NULL,0,0),(22,'Meals Costs for OD Living in Hostels','Other addition cost for OD student meals',NULL,0,0),(23,'Appeal Fees for Module for OD','Other Addition Cost of Appeal FE OD modules',NULL,0,0),(24,'Appeals Fee per module for B.Eng/M.Eng','Other Addition Fee for B.Eng/M.Eng FE Appeal',NULL,0,0),(25,'Application Fee for OD/B.Eng','Other addition Cost for OD/B.Eng Application',NULL,0,0),(26,'Application Fee for M.Eng','Other Addition Cost for M.Eng Application',NULL,0,0),(27,'Replacement of Lost ID Card','Other Addition Cost for replacing the lost ID',NULL,0,0),(28,'Transcipt Fee for OD/B.Eng/M.Eng','Other additon cost of Transcript for OD/B.Eng/M.Eng',NULL,0,0),(29,'Transcript Fee for FTC/ADE','Other addition Cost for FTC/ADE Transcript',NULL,0,0),(30,'Living and Facilitation Costs Allowance','Masters students Living and Facilitation Cost Allowance',NULL,0,0),(31,'Tuition Fee','Cost of Tuition Fee in respective academic Year',NULL,0,1);
/*!40000 ALTER TABLE `cis_college_fee_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_fee_imports_status`
--

DROP TABLE IF EXISTS `cis_college_fee_imports_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_fee_imports_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_received` datetime DEFAULT NULL,
  `last_access` datetime NOT NULL,
  `file_name` varchar(120) DEFAULT NULL,
  `date_sent` datetime NOT NULL,
  `mail_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_fee_imports_status`
--

LOCK TABLES `cis_college_fee_imports_status` WRITE;
/*!40000 ALTER TABLE `cis_college_fee_imports_status` DISABLE KEYS */;
INSERT INTO `cis_college_fee_imports_status` VALUES (1,'2014-11-09 09:34:49','2014-11-09 09:34:49','/mnt/hgfs/www/cis/application/files/administration/mails/new ts.xls','2014-11-09 09:34:49',2);
/*!40000 ALTER TABLE `cis_college_fee_imports_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_fee_sources`
--

DROP TABLE IF EXISTS `cis_college_fee_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_fee_sources` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `fee_sources` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_fee_sources`
--

LOCK TABLES `cis_college_fee_sources` WRITE;
/*!40000 ALTER TABLE `cis_college_fee_sources` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_college_fee_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_fee_structure`
--

DROP TABLE IF EXISTS `cis_college_fee_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_fee_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `year_started` date DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `is_enabled` int(1) DEFAULT '0',
  `minimum_amount` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `locked_structure` int(11) DEFAULT '0',
  `lock_password` varchar(60) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `student_nationality` int(11) NOT NULL DEFAULT '1',
  `minimum_foreign` double NOT NULL,
  `amount_foreign` double NOT NULL,
  `student_fee_category` int(11) NOT NULL,
  `minimum_percentage` double DEFAULT NULL,
  `service_type_id` int(11) NOT NULL,
  `reg_category_id` int(11) DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_academic_year_id_student_fee_category_index` (`name`,`academic_year_id`,`student_fee_category`),
  KEY `fk_cis_college_fee_structure_cis_college_academic_years1_idx` (`academic_year_id`),
  CONSTRAINT `fk_cis_college_fee_structure_cis_college_academic_years1` FOREIGN KEY (`academic_year_id`) REFERENCES `cis_college_academic_years` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_fee_structure`
--

LOCK TABLES `cis_college_fee_structure` WRITE;
/*!40000 ALTER TABLE `cis_college_fee_structure` DISABLE KEYS */;
INSERT INTO `cis_college_fee_structure` VALUES (1,'Ordinary Dipploma 1st Year(NTA 4) Government sponsored 2014/2015','1.1 Ordinary Diploma (OD) Course - Government Sponsored Students (NTA level 4-6)','2014-10-01',1,1,225400,290400,0,'d7b21d2eb8e5ee564c13a7dadbbbd9c8',3,1,0,0,2,77.617079889807,1,1),(23,'Ordinary Diploma (OD) Programme - Private Sponsored Students(NTA - 4)-2014/2015','Fees/costs payable direct to the Institute by Private sponsored students (Tshs) taking Ordinary Diploma for the first time/First Year.','2014-10-12',1,1,585400,1010400,0,'d7b21d2eb8e5ee564c13a7dadbbbd9c8',3,1,805,1305,1,57.937450514648,1,1),(26,'Ordinary Diploma (OD) Programme - Private Sponsored Students(NTA - 5-6)','Fees/costs payable direct to the Institute by Private sponsored students (Tshs) taking Ordinary Diploma  and continuing with 3rd year and 2 nd year or their programme','2014-10-12',1,1,570400,995400,0,'d7b21d2eb8e5ee564c13a7dadbbbd9c8',3,1,755,1255,1,57.303596544103,1,2),(27,'Fee payments for Bachelor of Engineering (B.Eng) Programme (NTA-7-First Year & GC)))','2.1 Fees/Costs Payable to the Institute by B.Eng (NTA level 7-8) Students/Sponsor  taking GC or Bachelor Degree first Year.','2014-10-12',1,1,725400,1350400,0,'d7b21d2eb8e5ee564c13a7dadbbbd9c8',3,1,1325,2325,1,53.717417061611,1,1),(28,'Bachelor of Engineering (B.Eng) Programme (NTA Level 7-8) Second Year and Third Year','2.1 Fees/Costs Payable to the Institute by B.Eng (NTA level 7-8) Students/Sponsor','2014-10-12',1,1,710400,1335400,0,'d7b21d2eb8e5ee564c13a7dadbbbd9c8',3,1,1295,2295,1,53.197543807099,1,2),(29,'Ordinary Diploma (OD) course Goverment Sponsored (NTA Level 5-6) Fee Structure (2014/2015)','Fees/costs payable direct to the Institute by Government sponsored students (Tshs) continuing with level 5 and 6','2014-10-16',1,1,210400,275400,0,'d7b21d2eb8e5ee564c13a7dadbbbd9c8',3,1,0,0,2,76.397966594045,1,2);
/*!40000 ALTER TABLE `cis_college_fee_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_fee_structure_items`
--

DROP TABLE IF EXISTS `cis_college_fee_structure_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_fee_structure_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structure_id` int(11) NOT NULL DEFAULT '0',
  `fee_category_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `amount_foreign` double DEFAULT NULL,
  `minimum_amount` double DEFAULT NULL,
  `locked_item` int(1) DEFAULT NULL,
  `use_structure` int(1) DEFAULT '1',
  `enabled` int(1) DEFAULT '1',
  `date_added` datetime DEFAULT NULL,
  `last_modify_by` varchar(45) DEFAULT NULL,
  `unlock_pass` varchar(10) DEFAULT NULL,
  `changes_history` text,
  `is_required` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`structure_id`,`fee_category_id`),
  UNIQUE KEY `structure_id_fee_category_id_index` (`structure_id`,`fee_category_id`),
  KEY `fk_cis_college_fee_structure_has_cis_college_fee_figures_ci_idx1` (`structure_id`),
  KEY `fk_cis_college_fee_structure_items_cis_college_fee_category_idx` (`fee_category_id`),
  CONSTRAINT `fk_cis_college_fee_structure_has_cis_college_fee_figures_cis_1` FOREIGN KEY (`structure_id`) REFERENCES `cis_college_fee_structure` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_college_fee_structure_items_cis_college_fee_category1` FOREIGN KEY (`fee_category_id`) REFERENCES `cis_college_fee_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_fee_structure_items`
--

LOCK TABLES `cis_college_fee_structure_items` WRITE;
/*!40000 ALTER TABLE `cis_college_fee_structure_items` DISABLE KEYS */;
INSERT INTO `cis_college_fee_structure_items` VALUES (1,1,2,60000,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(2,1,1,10000,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(3,1,31,130000,0,50,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(4,1,3,10000,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(5,1,4,10000,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(6,1,5,50400,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(7,1,6,10000,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(8,1,7,10000,0,100,NULL,1,1,'2014-10-10 04:54:57',NULL,NULL,NULL,1),(10,23,1,10000,40,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(11,23,31,850000,1000,50,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(12,23,2,60000,75,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(13,23,3,10000,10,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(14,23,4,10000,50,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(15,23,5,50400,60,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(16,23,6,10000,20,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(17,23,7,10000,50,100,NULL,1,1,'2014-10-12 17:10:09',NULL,NULL,NULL,1),(18,26,31,850000,1000,50,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(19,26,1,10000,40,100,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(20,26,2,60000,75,100,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(21,26,3,10000,10,100,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(22,26,4,10000,50,100,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(23,26,5,50400,60,100,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(24,26,6,5000,20,100,NULL,1,1,'2014-10-12 17:15:46',NULL,NULL,NULL,1),(25,27,31,1250000,2000,50,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(26,27,1,10000,40,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(27,27,3,10000,10,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(28,27,4,10000,50,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(29,27,5,50400,75,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(30,27,6,10000,20,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(31,27,7,10000,30,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(32,27,2,0,100,100,NULL,1,1,'2014-10-12 17:29:05',NULL,NULL,NULL,1),(33,29,31,130000,0,50,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(34,29,2,60000,0,100,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(35,29,3,10000,0,100,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(36,29,1,10000,0,100,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(37,29,4,10000,0,100,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(38,29,5,50400,0,100,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(39,29,6,5000,0,100,NULL,1,1,'2014-10-16 04:58:04',NULL,NULL,NULL,1),(40,28,1,10000,40,100,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1),(41,28,2,0,100,100,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1),(42,28,3,10000,10,100,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1),(43,28,31,1250000,2000,50,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1),(44,28,4,10000,50,100,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1),(45,28,5,50400,75,100,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1),(46,28,6,5000,20,100,NULL,1,1,'2014-10-19 08:23:16',NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `cis_college_fee_structure_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_college_system_service_type`
--

DROP TABLE IF EXISTS `cis_college_system_service_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_college_system_service_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `applies_to` varchar(45) DEFAULT NULL,
  `code_id` varchar(40) NOT NULL,
  `is_required` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_college_system_service_type`
--

LOCK TABLES `cis_college_system_service_type` WRITE;
/*!40000 ALTER TABLE `cis_college_system_service_type` DISABLE KEYS */;
INSERT INTO `cis_college_system_service_type` VALUES (1,'Student Registrations and Class Enrollment','Making charges to students registration process','all','class-enroll',1),(2,'Course Tranfer Fee Charges','Making Changes to registered Course','all','class-tranfer',0),(3,'Accomodation and Hostels Charges','Applying for Hostel and accomodation at the institure','all','accomodate',1);
/*!40000 ALTER TABLE `cis_college_system_service_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_common_placename`
--

DROP TABLE IF EXISTS `cis_common_placename`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_common_placename` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `long` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `parent_place` int(11) DEFAULT NULL,
  `place_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_common_placename`
--

LOCK TABLES `cis_common_placename` WRITE;
/*!40000 ALTER TABLE `cis_common_placename` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_common_placename` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_course`
--

DROP TABLE IF EXISTS `cis_department_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) DEFAULT NULL,
  `code_name` varchar(8) DEFAULT NULL,
  `date_started` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `deleted` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `last_modify` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`department_id`,`campus_id`,`faculty_id`),
  KEY `fk_cis_department_programs_cis_department_list1_idx` (`department_id`,`campus_id`,`faculty_id`),
  CONSTRAINT `fk_cis_department_programs_cis_department_list1` FOREIGN KEY (`department_id`, `campus_id`, `faculty_id`) REFERENCES `cis_department_list` (`id`, `campus_id`, `facult_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 PACK_KEYS=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_course`
--

LOCK TABLES `cis_department_course` WRITE;
/*!40000 ALTER TABLE `cis_department_course` DISABLE KEYS */;
INSERT INTO `cis_department_course` VALUES (1,1,1,1,'Computer Engineering','COE','2014-09-10','1','0','Computer Engineering program','0000-00-00 00:00:00',1),(2,1,1,1,'Information Technology','IT','2014-09-10','1','0','Computer Engineering programmes','0000-00-00 00:00:00',3),(3,1,1,1,'Multimedia and Film Technology','MFT','2014-09-10','1','0','Computer Engineering programmes','0000-00-00 00:00:00',3),(4,2,1,1,'Mechanical Engineering','ME','2006-09-20','1','0','Mechanical Engineering Programmes','0000-00-00 00:00:00',1),(5,4,1,1,'Electronics and Telecommunications Engineerin','ETE','2014-09-10','1','0','','0000-00-00 00:00:00',1),(6,4,1,1,'Communication Systems Technology','CST','2013-09-11','1','0','','0000-00-00 00:00:00',3),(7,5,1,1,'Mining Engineering','MNE','2008-09-16','1','0','','0000-00-00 00:00:00',1),(8,6,1,1,'Science and Laboratory Technology','LT','2010-09-15','1','0','','0000-00-00 00:00:00',3),(9,3,1,1,'Electrical Engineering','EE','2014-09-15','1','0','','0000-00-00 00:00:00',1),(10,5,1,1,'Civil Engineering','CE','2007-10-17','1','0','','0000-00-00 00:00:00',1),(11,3,1,1,'Biomedical and Equipment Engineering','BEE','2011-10-12','1','0','','0000-00-00 00:00:00',1),(12,3,1,1,'Renewable Energy and Technology','RET','2014-06-18','1','0','','0000-00-00 00:00:00',3),(13,6,1,1,'Food Science and Technology','FST','2013-10-23','1','0','','0000-00-00 00:00:00',3),(14,5,1,1,'Materials Management','MAT','2014-11-03','1','0','','2014-11-03 09:08:36',8);
/*!40000 ALTER TABLE `cis_department_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_course_category`
--

DROP TABLE IF EXISTS `cis_department_course_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_course_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `join_name` varchar(45) DEFAULT NULL,
  `comments` longtext,
  `base_code_1` varchar(20) NOT NULL,
  `base_code_2` varchar(20) NOT NULL,
  `base_code_3` varchar(20) NOT NULL,
  `base_code_4` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_course_category`
--

LOCK TABLES `cis_department_course_category` WRITE;
/*!40000 ALTER TABLE `cis_department_course_category` DISABLE KEYS */;
INSERT INTO `cis_department_course_category` VALUES (1,'Engineering','in','All courses relating to programme in engineering','BENG','OD','MENG','GC'),(2,'Engineering','with','all courses relating to programe with engineering','BENG','OD','MeNG','GC'),(3,'Technology','in','all courses relating to programme in technology','BTECH','OD','MTECH','GC'),(4,'Technology','with','all courses relating to programme with technology','BTECH','OD','MTECH','GC'),(6,'Science','with','all courses relating to programme with science','BSC','OD','MS','GC'),(8,'Science','in','all courses relating to programme in science','BSC','OD','MS','GC'),(9,'Arts','in','All courses relating to arts programmes','BA','OD','MA','GC');
/*!40000 ALTER TABLE `cis_department_course_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_list`
--

DROP TABLE IF EXISTS `cis_department_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `code_no` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `head` varchar(45) DEFAULT NULL,
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `facult_id` int(11) NOT NULL DEFAULT '0',
  `type` int(1) DEFAULT '1',
  `has_courses` int(1) DEFAULT NULL,
  `removed` int(1) DEFAULT '0',
  PRIMARY KEY (`id`,`campus_id`,`facult_id`),
  KEY `fk_cis_department_list_cis_campus_faculty1_idx` (`facult_id`,`campus_id`),
  CONSTRAINT `fk_cis_department_list_cis_campus_faculty1` FOREIGN KEY (`facult_id`, `campus_id`) REFERENCES `cis_campus_faculty` (`id`, `campus_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_list`
--

LOCK TABLES `cis_department_list` WRITE;
/*!40000 ALTER TABLE `cis_department_list` DISABLE KEYS */;
INSERT INTO `cis_department_list` VALUES (1,'CS',2,'Computer Studies','Computer Engineering, Information technology and others IT stufsf','Hosea Shimwela',1,1,1,NULL,0),(2,'ME',4,'Mechanical Engineering','Students accommodation and Affairs ','Misago H. Yosiah',1,1,1,NULL,0),(3,'EE',1,'Electrical Engineering','','Dr. S. Karugaba S.F.M',1,1,1,NULL,0),(4,'ETE',3,'Electronics and Telecommunications Engineerin','','Dr. G. Rugumira',1,1,1,NULL,0),(5,'CE',6,'Civil & Buildings Engineering','','Prosper Mgaya',1,1,1,NULL,0),(6,'LABTECH',7,'Science and Laboratory Technology','','Ezekiel Amri',1,1,1,NULL,0);
/*!40000 ALTER TABLE `cis_department_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_other_list`
--

DROP TABLE IF EXISTS `cis_department_other_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_other_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `head` varchar(45) DEFAULT NULL,
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `removed` int(1) DEFAULT '0',
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`campus_id`),
  KEY `fk_cis_department_other_list_cis_campus_list1_idx` (`campus_id`),
  CONSTRAINT `fk_cis_department_other_list_cis_campus_list1` FOREIGN KEY (`campus_id`) REFERENCES `cis_campus_list` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_other_list`
--

LOCK TABLES `cis_department_other_list` WRITE;
/*!40000 ALTER TABLE `cis_department_other_list` DISABLE KEYS */;
INSERT INTO `cis_department_other_list` VALUES (1,'Finance and Accounting','Fee collections and Management','Venance Ngunga',1,0,NULL),(2,'Students Accomodations (Dean of Students)','Students accommodation and Affairs ','Misago H. Yosiah',1,0,NULL);
/*!40000 ALTER TABLE `cis_department_other_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_pg_course_count`
--

DROP TABLE IF EXISTS `cis_department_pg_course_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_pg_course_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_years_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `programs_id` int(11) DEFAULT NULL,
  `st_count` int(11) DEFAULT NULL,
  `lect_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`academic_years_id`),
  KEY `fk_cis_department_pg_course_count_cis_college_academic_year_idx` (`academic_years_id`),
  KEY `index_program_st_count` (`department_id`,`course_id`,`campus_id`,`faculty_id`,`programs_id`),
  KEY `st_count_course` (`course_id`),
  KEY `st_course` (`programs_id`),
  KEY `st_faculty_count` (`faculty_id`),
  CONSTRAINT `cis_department_pg_course_count_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `cis_department_program_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cis_department_pg_course_count_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `cis_department_course` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cis_department_pg_course_count_ibfk_3` FOREIGN KEY (`programs_id`) REFERENCES `cis_department_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_program_course_acyear_count` FOREIGN KEY (`academic_years_id`) REFERENCES `cis_college_academic_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_pg_course_count`
--

LOCK TABLES `cis_department_pg_course_count` WRITE;
/*!40000 ALTER TABLE `cis_department_pg_course_count` DISABLE KEYS */;
INSERT INTO `cis_department_pg_course_count` VALUES (1,3,1,1,1,1,3,25,0),(3,3,1,1,1,1,6,110,0),(4,3,1,1,1,1,8,58,0),(5,3,8,6,1,1,3,0,0),(6,3,8,6,1,1,6,0,0),(7,3,1,1,1,1,4,0,0),(8,3,1,1,1,1,5,0,0),(9,3,1,1,1,1,7,0,0),(10,3,1,1,1,1,9,0,0),(11,3,9,3,1,1,4,0,0),(12,3,10,5,1,1,3,0,0),(13,3,10,5,1,1,4,0,0),(14,3,10,5,1,1,5,0,0),(15,3,10,5,1,1,6,0,0),(16,3,10,5,1,1,7,0,0),(17,3,10,5,1,1,8,0,0),(18,3,10,5,1,1,9,0,0),(19,10,1,1,1,1,3,0,0),(20,10,1,1,1,1,6,0,0),(21,10,1,1,1,1,8,0,0),(22,10,8,6,1,1,3,0,0),(23,10,8,6,1,1,6,0,0),(24,10,1,1,1,1,4,0,0),(25,10,1,1,1,1,5,0,0),(26,10,1,1,1,1,7,0,0),(27,10,1,1,1,1,9,0,0),(28,10,9,3,1,1,4,0,0),(29,10,10,5,1,1,3,381,0),(30,10,10,5,1,1,4,0,0),(31,10,10,5,1,1,5,0,0),(32,10,10,5,1,1,6,0,0),(33,10,10,5,1,1,7,0,0),(34,10,10,5,1,1,8,0,0),(35,10,10,5,1,1,9,0,0);
/*!40000 ALTER TABLE `cis_department_pg_course_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_program_base_code`
--

DROP TABLE IF EXISTS `cis_department_program_base_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_program_base_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_name` varchar(45) DEFAULT NULL,
  `display_name` text,
  `program_id` int(11) DEFAULT NULL,
  `course_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`course_category_id`),
  UNIQUE KEY `program_id_course_category_id_index` (`program_id`,`course_category_id`),
  KEY `fk_cis_department_program_base_code_cis_department_programs_idx` (`program_id`),
  KEY `fk_cis_department_program_base_code_cis_department_course_c_idx` (`course_category_id`),
  CONSTRAINT `fk_cis_department_program_base_code_cis_department_course_cat1` FOREIGN KEY (`course_category_id`) REFERENCES `cis_department_course_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cis_department_program_base_code_cis_department_programs1` FOREIGN KEY (`program_id`) REFERENCES `cis_department_programs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_program_base_code`
--

LOCK TABLES `cis_department_program_base_code` WRITE;
/*!40000 ALTER TABLE `cis_department_program_base_code` DISABLE KEYS */;
INSERT INTO `cis_department_program_base_code` VALUES (1,'BENG','Bachelor Degree in Engineering',6,1),(2,'BTECH','Bachelor Degree in Technology',6,3),(3,'OD','Ordinary Diploma in Engineering',3,1),(4,'OD','Ordinary Diploma in Technology',3,3),(5,'GC','General Course in Engineering and Technology',8,1),(10,'MENG','Master in Engineering',10,1),(11,'MSC','Masters in Science',10,8),(12,'BTC','Basic Technician Certificate in Engineering and in Technology Code Name',5,1),(13,'BTC','Basic Technician Certificate in Engineering and in Technology Code Name',5,3),(14,'TC','Technician Certificate in Engineering and in Technology Code Name',4,1),(15,'TC','Technician Certificate in Engineering and in Technology Code Name',4,3),(16,'HD01','Higher Diploma  in Engineering and in Technology Code Name',7,1),(17,'HD01','Higher Diploma  in Engineering and in Technology Code Name',7,3),(18,'HD02','Higher Diploma  in Engineering and in Technology Code Name',9,1),(19,'HD02','Higher Diploma  in Engineering and in Technology Code Name',9,3);
/*!40000 ALTER TABLE `cis_department_program_base_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_program_class_stream`
--

DROP TABLE IF EXISTS `cis_department_program_class_stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_program_class_stream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `display_name` varchar(120) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `students_limit` int(11) DEFAULT NULL,
  `parent_stream_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_program_class_stream`
--

LOCK TABLES `cis_department_program_class_stream` WRITE;
/*!40000 ALTER TABLE `cis_department_program_class_stream` DISABLE KEYS */;
INSERT INTO `cis_department_program_class_stream` VALUES (1,'STR-1','Stream-I','Session I','First Stream of the Class (Morning Session)',100,0),(2,'STR-2','Stream-II','Session II','Second Stream of the Class (Evening Session)',100,0),(3,'STR-3','Stream-III','Session III','Third Class Division/Stream',100,0),(4,'STR-4','Sream-IV','Session IV','Fourth Class Division / Stream',100,0);
/*!40000 ALTER TABLE `cis_department_program_class_stream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_program_course`
--

DROP TABLE IF EXISTS `cis_department_program_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_program_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `semester_structure_id` int(11) NOT NULL DEFAULT '0',
  `programs_id` int(11) NOT NULL DEFAULT '0',
  `pg_sem_structure_id` int(11) NOT NULL DEFAULT '0',
  `code_name` varchar(45) DEFAULT NULL,
  `display_name` varchar(70) DEFAULT NULL,
  `year_started` varchar(45) DEFAULT NULL,
  `date_created` varchar(45) DEFAULT NULL,
  `capacity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`pg_sem_structure_id`),
  UNIQUE KEY `course_id_programs_id_index` (`course_id`,`programs_id`),
  KEY `fk_cis_department_program_course_cis_department_course1_idx` (`course_id`,`department_id`,`campus_id`,`faculty_id`),
  KEY `fk_cis_department_program_course_cis_program_semester_struc_idx` (`semester_structure_id`,`programs_id`,`pg_sem_structure_id`),
  CONSTRAINT `fk_cis_department_program_course_cis_department_course1` FOREIGN KEY (`course_id`, `department_id`, `campus_id`, `faculty_id`) REFERENCES `cis_department_course` (`id`, `department_id`, `campus_id`, `faculty_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_department_program_course_cis_program_semester_structu1` FOREIGN KEY (`semester_structure_id`, `programs_id`, `pg_sem_structure_id`) REFERENCES `cis_program_semester_structure` (`id`, `programs_id`, `structure_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=384 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_program_course`
--

LOCK TABLES `cis_department_program_course` WRITE;
/*!40000 ALTER TABLE `cis_department_program_course` DISABLE KEYS */;
INSERT INTO `cis_department_program_course` VALUES (367,1,1,1,1,12,3,8,'OD-COE','Ordinary Diploma in Computer Engineering','2014-09-10','2014-11-07 16:34:38',NULL),(368,1,1,1,1,2,6,8,'BENG-COE','Bachelor Degree in Computer Engineering','2014-09-10','2014-11-07 16:34:39',NULL),(369,1,1,1,1,11,8,8,'GC-COE','General Course in Computer Engineering','2014-09-10','2014-11-07 16:34:39',NULL),(370,8,6,1,1,12,3,8,'OD-LT','Ordinary Diploma in Science and Laboratory Technology','2010-09-15','2014-11-07 16:37:01',NULL),(371,8,6,1,1,2,6,8,'BTECH-LT','Bachelor Degree in Science and Laboratory Technology','2010-09-15','2014-11-07 16:37:01',NULL),(372,1,1,1,1,10,4,8,'TC-COE','Technician Certificate in Computer Engineering','2014-09-10','2014-11-07 16:45:10',NULL),(373,1,1,1,1,9,5,8,'BTC-COE','Basic Technician Certificate in Computer Engineering','2014-09-10','2014-11-07 16:45:10',NULL),(374,1,1,1,1,15,7,10,'HD01-COE','Higher Diploma - 01 in Computer Engineering','2014-09-10','2014-11-07 16:45:10',NULL),(375,1,1,1,1,14,9,9,'HD02-COE','Higher Diploma - 02 in Computer Engineering','2014-09-10','2014-11-07 16:45:10',NULL),(376,9,3,1,1,10,4,8,'TC-EE','Technician Certificate in Electrical Engineering','2014-09-15','2014-11-22 14:04:34',NULL),(377,10,5,1,1,12,3,8,'OD-CE','Ordinary Diploma in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL),(378,10,5,1,1,10,4,8,'TC-CE','Technician Certificate in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL),(379,10,5,1,1,9,5,8,'BTC-CE','Basic Technician Certificate in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL),(380,10,5,1,1,2,6,8,'BENG-CE','Bachelor Degree in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL),(381,10,5,1,1,15,7,10,'HD01-CE','Higher Diploma - 01 in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL),(382,10,5,1,1,11,8,8,'GC-CE','General Course in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL),(383,10,5,1,1,14,9,9,'HD02-CE','Higher Diploma - 02 in Civil Engineering','2007-10-17','2014-12-18 11:42:05',NULL);
/*!40000 ALTER TABLE `cis_department_program_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_program_pre_level`
--

DROP TABLE IF EXISTS `cis_department_program_pre_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_program_pre_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `award_name` varchar(120) DEFAULT NULL,
  `level_count` varchar(45) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_program_pre_level`
--

LOCK TABLES `cis_department_program_pre_level` WRITE;
/*!40000 ALTER TABLE `cis_department_program_pre_level` DISABLE KEYS */;
INSERT INTO `cis_department_program_pre_level` VALUES (1,'Primary Education ','Certificate of Primary Education','1',1),(2,'Ordinary Level Secondary  Education/Equivalent Education','Certificate of Secondary Education Examination /Equivalent Certificate','2',2),(3,'Advanced Level Education / Equivalent','Advanced Certificate of Secondary Education Examination (ACSEE) or Equivalent','3',3),(4,'Diploma (Ordinary Diploma,Advanced Diploma,Higher Diploma)','Diploma','4',4),(5,'Full Technician Certificate (FTC)','Full Technician Certificate (FTC)','3',4),(6,'Bachelor Degree','Bachelor Degree','5',5);
/*!40000 ALTER TABLE `cis_department_program_pre_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_program_pre_level_programs`
--

DROP TABLE IF EXISTS `cis_department_program_pre_level_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_program_pre_level_programs` (
  `pre_level_id` int(11) NOT NULL DEFAULT '0',
  `programs_id` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`pre_level_id`,`programs_id`),
  UNIQUE KEY `pre_level_id_programs_id_index` (`pre_level_id`,`programs_id`),
  KEY `fk_cis_department_program_pre_level_has_cis_department_prog_idx` (`programs_id`),
  KEY `fk_cis_department_program_pre_level_has_cis_department_prog_idx1` (`pre_level_id`),
  CONSTRAINT `fk_cis_department_program_pre_level_has_cis_department_progra1` FOREIGN KEY (`pre_level_id`) REFERENCES `cis_department_program_pre_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cis_department_program_pre_level_has_cis_department_progra2` FOREIGN KEY (`programs_id`) REFERENCES `cis_department_programs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_program_pre_level_programs`
--

LOCK TABLES `cis_department_program_pre_level_programs` WRITE;
/*!40000 ALTER TABLE `cis_department_program_pre_level_programs` DISABLE KEYS */;
INSERT INTO `cis_department_program_pre_level_programs` VALUES (1,3,1),(2,3,2),(3,3,3),(2,6,16),(3,6,17),(5,6,18),(4,6,19),(2,8,21),(3,8,22),(5,8,25),(4,8,26),(6,10,20);
/*!40000 ALTER TABLE `cis_department_program_pre_level_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_department_programs`
--

DROP TABLE IF EXISTS `cis_department_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_department_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_program_id` int(11) DEFAULT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` text,
  `dt_added` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `year_started` date DEFAULT NULL,
  `nta_level` char(2) DEFAULT NULL,
  `code_no` int(11) DEFAULT NULL,
  `is_stop_level` int(1) DEFAULT '0',
  `level_year` int(11) DEFAULT NULL,
  `base_program_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cis_department_programs_cis_department_programs1_idx` (`parent_program_id`),
  CONSTRAINT `fk_cis_department_programs_cis_department_programs1` FOREIGN KEY (`parent_program_id`) REFERENCES `cis_department_programs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_department_programs`
--

LOCK TABLES `cis_department_programs` WRITE;
/*!40000 ALTER TABLE `cis_department_programs` DISABLE KEYS */;
INSERT INTO `cis_department_programs` VALUES (3,NULL,1,'Ordinary Diploma','Ordinary Diploma in Engineering','OD',NULL,'2014-09-13',NULL,0,'2006-05-10','6',3,1,3,0),(4,3,1,'Technician Certificate','Technician Certificate','TC',NULL,'2014-09-13',NULL,0,'2005-09-14','5',2,1,2,3),(5,4,1,'Basic Technician Certificate','Basic Technician Certificate','BTC',NULL,'2014-09-13',NULL,0,'2006-09-14','4',1,2,1,3),(6,NULL,1,'Bachelor Degree','Bachelor Degree','DEGREE',NULL,'2014-09-13',NULL,0,'2005-09-15','8',4,1,3,0),(7,9,1,'Higher Diploma - 01','Higher national Diploma First Year','HD01',NULL,'2014-09-13',NULL,0,'2005-09-14','7',2,2,1,6),(8,NULL,1,'General Course','General Course ','GC',NULL,'2014-09-13',NULL,0,'2005-09-14','6',1,2,1,6),(9,6,1,'Higher Diploma - 02','Higher National Diploma Second Year','HD02',NULL,'2014-10-03',NULL,0,'2007-10-17','7',3,1,2,6),(10,NULL,1,'Masters','Masters With/In Engineering','Masters',NULL,'2014-10-09',NULL,0,'2012-10-17','9',1,2,1,0);
/*!40000 ALTER TABLE `cis_department_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_lecture_list`
--

DROP TABLE IF EXISTS `cis_lecture_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_lecture_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `cur_position` varchar(45) DEFAULT NULL,
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `facult_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`department_id`,`campus_id`,`facult_id`),
  KEY `fk_cis_lecture_list_cis_department_list1_idx` (`department_id`,`campus_id`,`facult_id`),
  CONSTRAINT `fk_cis_lecture_list_cis_department_list1` FOREIGN KEY (`department_id`, `campus_id`, `facult_id`) REFERENCES `cis_department_list` (`id`, `campus_id`, `facult_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_lecture_list`
--

LOCK TABLES `cis_lecture_list` WRITE;
/*!40000 ALTER TABLE `cis_lecture_list` DISABLE KEYS */;
INSERT INTO `cis_lecture_list` VALUES (1,'DIT0422123','Angelina','Henry','Baraka','Tutorial Assistant',1,1,1);
/*!40000 ALTER TABLE `cis_lecture_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_lecture_module_assignment`
--

DROP TABLE IF EXISTS `cis_lecture_module_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_lecture_module_assignment` (
  `lecture_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `facult_id` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `date_added` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`lecture_id`,`department_id`,`campus_id`,`facult_id`),
  KEY `index_module_id` (`module_id`),
  KEY `fk_cis_lecture_module_assignment_cis_lecture_list1` (`lecture_id`,`department_id`,`campus_id`,`facult_id`),
  CONSTRAINT `fk_cis_lecture_module_assignment_cis_lecture_list1` FOREIGN KEY (`lecture_id`, `department_id`, `campus_id`, `facult_id`) REFERENCES `cis_lecture_list` (`id`, `department_id`, `campus_id`, `facult_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_module_id` FOREIGN KEY (`module_id`) REFERENCES `cis_acad_class_course_module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_lecture_module_assignment`
--

LOCK TABLES `cis_lecture_module_assignment` WRITE;
/*!40000 ALTER TABLE `cis_lecture_module_assignment` DISABLE KEYS */;
INSERT INTO `cis_lecture_module_assignment` VALUES (1,1,1,1,1,1,'2014-12-18 00:21:21',1),(1,1,1,1,2,2,'2014-12-17 00:00:00',1);
/*!40000 ALTER TABLE `cis_lecture_module_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_org_details`
--

DROP TABLE IF EXISTS `cis_org_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_org_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_logo` blob,
  `org_name` varchar(100) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `org_type` varchar(45) DEFAULT NULL,
  `org_abbr` varchar(20) DEFAULT NULL,
  `org_email` varchar(45) DEFAULT NULL,
  `org_box` varchar(45) DEFAULT NULL,
  `org_contact` varchar(45) DEFAULT NULL,
  `org_summary_doc` blob,
  `org_owner` varchar(120) DEFAULT NULL,
  `org_loc` varchar(45) DEFAULT NULL,
  `org_mapid` varchar(45) DEFAULT NULL,
  `org_website` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_org_details`
--

LOCK TABLES `cis_org_details` WRITE;
/*!40000 ALTER TABLE `cis_org_details` DISABLE KEYS */;
INSERT INTO `cis_org_details` VALUES (1,NULL,'Dar es Salaam Institute of Technology','Dar Inst Of Technology','institute','DIT','registrar@dit.ac.tz','P. O. Box 2958, Dar e\ns Salaam','Tel.(022) 2150174 / (022)2153511',NULL,'Gvt','Dar Es Salaam','','www.dit.ac.tz');
/*!40000 ALTER TABLE `cis_org_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_place_name`
--

DROP TABLE IF EXISTS `cis_place_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_place_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `long` float NOT NULL,
  `lat` float NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_place_name`
--

LOCK TABLES `cis_place_name` WRITE;
/*!40000 ALTER TABLE `cis_place_name` DISABLE KEYS */;
INSERT INTO `cis_place_name` VALUES (1,'Dar es Salaam',0,0,NULL,0),(2,'Iringa',0,0,NULL,0),(3,'Shekilango Road, Dar es Salaam, Tanzania',39.2203,-6.78781,NULL,0),(5,'Mara',0,0,NULL,0),(6,'Dare es Salaam / Ilala',0,0,NULL,0),(7,'',0,0,NULL,0),(8,'Shekilango Road, Dar es Salaam, Tanzania',39.2203,-6.78781,NULL,0),(9,'Shekilango Road, Dar es Salaam, Tanzania',39.2203,-6.78781,NULL,0);
/*!40000 ALTER TABLE `cis_place_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_program_semester_fee_structure`
--

DROP TABLE IF EXISTS `cis_program_semester_fee_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_program_semester_fee_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `academic_years_id` int(11) NOT NULL DEFAULT '0',
  `fee_structure_id` int(11) NOT NULL DEFAULT '0',
  `minimum_percentage` double DEFAULT NULL,
  `is_current_structure` int(11) DEFAULT '0',
  `student_category_id` int(11) DEFAULT NULL,
  `service_charge_id` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`program_id`,`course_id`,`department_id`,`academic_years_id`,`fee_structure_id`),
  UNIQUE KEY `unique_index_sem_course_fee` (`program_id`,`course_id`,`academic_years_id`,`fee_structure_id`,`student_category_id`,`service_charge_id`),
  KEY `fk_cis_program_semester_fee_structure_cis_department_course_idx` (`course_id`,`department_id`),
  KEY `fk_cis_program_semester_fee_structure_cis_college_fee_struc_idx` (`fee_structure_id`),
  KEY `fk_cis_program_semester_fee_structure_cis_college_academic__idx` (`academic_years_id`),
  CONSTRAINT `fk_cis_program_semester_fee_structure_cis_college_academic_ye1` FOREIGN KEY (`academic_years_id`) REFERENCES `cis_college_academic_years` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_program_semester_fee_structure_cis_college_fee_structu1` FOREIGN KEY (`fee_structure_id`) REFERENCES `cis_college_fee_structure` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_program_semester_fee_structure_cis_department_course1` FOREIGN KEY (`course_id`, `department_id`) REFERENCES `cis_department_course` (`id`, `department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_program_semester_fee_structure_cis_department_programs1` FOREIGN KEY (`program_id`) REFERENCES `cis_department_programs` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_program_semester_fee_structure`
--

LOCK TABLES `cis_program_semester_fee_structure` WRITE;
/*!40000 ALTER TABLE `cis_program_semester_fee_structure` DISABLE KEYS */;
INSERT INTO `cis_program_semester_fee_structure` VALUES (1,5,1,1,3,1,NULL,1,2,1,'2014-11-08 08:07:39','2014-11-08 05:07:39'),(2,5,1,1,3,23,NULL,1,1,1,'2014-11-08 08:08:08','2014-11-08 05:08:08'),(3,8,1,1,3,27,NULL,1,1,1,'2014-11-08 09:25:11','2014-11-08 06:25:11'),(4,7,1,1,3,27,NULL,1,1,1,'2014-11-08 09:25:11','2014-11-08 06:25:11'),(5,4,1,1,3,29,NULL,1,2,1,'2014-11-08 09:27:20','2014-11-08 06:27:20'),(6,3,1,1,3,29,NULL,1,2,1,'2014-11-08 09:27:20','2014-11-08 06:27:20'),(7,3,8,6,3,29,NULL,1,2,1,'2014-11-08 09:27:20','2014-11-08 06:27:20'),(8,9,1,1,3,28,NULL,1,1,1,'2014-11-08 09:30:55','2014-11-08 06:30:55'),(9,6,1,1,3,28,NULL,1,1,1,'2014-11-08 09:30:55','2014-11-08 06:30:55'),(10,6,8,6,3,28,NULL,1,1,1,'2014-11-08 09:30:55','2014-11-08 06:30:55'),(11,5,10,5,3,1,NULL,1,2,1,'2014-12-18 01:10:39','2014-12-18 10:10:39'),(12,5,10,5,3,23,NULL,1,1,1,'2014-12-18 01:11:08','2014-12-18 10:11:08'),(15,4,1,1,3,26,NULL,1,1,1,'2014-12-18 01:11:48','2014-12-18 10:11:48'),(16,4,9,3,3,26,NULL,1,1,1,'2014-12-18 01:11:48','2014-12-18 10:11:48'),(17,4,10,5,3,26,NULL,1,1,1,'2014-12-18 01:11:48','2014-12-18 10:11:48'),(18,3,1,1,3,26,NULL,1,1,1,'2014-12-18 01:12:29','2014-12-18 10:12:29'),(19,3,10,5,3,26,NULL,1,1,1,'2014-12-18 01:12:29','2014-12-18 10:12:29'),(20,4,9,3,3,29,NULL,1,2,1,'2014-12-18 01:15:48','2014-12-18 10:15:48'),(21,4,10,5,3,29,NULL,1,2,1,'2014-12-18 01:15:48','2014-12-18 10:15:48'),(22,3,10,5,3,29,NULL,1,2,1,'2014-12-18 01:15:48','2014-12-18 10:15:48');
/*!40000 ALTER TABLE `cis_program_semester_fee_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_program_semester_list`
--

DROP TABLE IF EXISTS `cis_program_semester_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_program_semester_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structure_id` int(11) NOT NULL DEFAULT '0',
  `semester_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT '0',
  `is_activated` int(1) DEFAULT '1',
  PRIMARY KEY (`id`,`structure_id`,`semester_id`),
  UNIQUE KEY `unique_structure_semester_list` (`semester_id`,`structure_id`),
  KEY `fk_cis_program_structure_list_has_cis_program_semester_stru_idx` (`semester_id`),
  KEY `fk_cis_program_structure_list_has_cis_program_semester_stru_idx1` (`structure_id`),
  CONSTRAINT `fk_cis_program_structure_list_has_cis_program_semester_struct1` FOREIGN KEY (`structure_id`) REFERENCES `cis_semester_structure` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_program_structure_list_has_cis_program_semester_struct2` FOREIGN KEY (`semester_id`) REFERENCES `cis_semester` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_program_semester_list`
--

LOCK TABLES `cis_program_semester_list` WRITE;
/*!40000 ALTER TABLE `cis_program_semester_list` DISABLE KEYS */;
INSERT INTO `cis_program_semester_list` VALUES (11,7,1,1,1),(12,7,2,1,1),(13,7,3,1,1),(14,7,4,1,1),(15,8,1,1,1),(16,8,2,1,1),(17,9,3,1,1),(18,9,4,1,1),(19,10,1,1,1),(20,10,2,1,1),(21,11,1,1,1),(22,11,2,1,1);
/*!40000 ALTER TABLE `cis_program_semester_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_program_semester_structure`
--

DROP TABLE IF EXISTS `cis_program_semester_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_program_semester_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programs_id` int(11) NOT NULL DEFAULT '0',
  `structure_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `is_current_structure` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`programs_id`,`structure_id`),
  UNIQUE KEY `programs_id` (`programs_id`,`structure_id`),
  KEY `fk_cis_program_semester_structure_cis_semester_structure1_idx` (`structure_id`),
  CONSTRAINT `fk_cis_program_semester_structure_cis_department_programs1` FOREIGN KEY (`programs_id`) REFERENCES `cis_department_programs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cis_program_semester_structure_cis_semester_structure1` FOREIGN KEY (`structure_id`) REFERENCES `cis_semester_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_program_semester_structure`
--

LOCK TABLES `cis_program_semester_structure` WRITE;
/*!40000 ALTER TABLE `cis_program_semester_structure` DISABLE KEYS */;
INSERT INTO `cis_program_semester_structure` VALUES (2,6,8,1,'2014-09-21 15:14:07',1),(5,7,8,0,'2014-09-21 17:01:39',0),(9,5,8,1,'2014-09-23 14:02:23',1),(10,4,8,1,'2014-09-23 14:02:30',1),(11,8,8,1,'2014-09-23 14:02:37',1),(12,3,8,1,'2014-09-23 14:02:44',1),(14,9,9,1,'2014-10-03 20:00:53',1),(15,7,10,1,'2014-10-03 20:01:40',1),(17,10,8,0,'2014-11-02 20:29:30',0),(18,10,11,1,'2014-11-02 20:34:49',1);
/*!40000 ALTER TABLE `cis_program_semester_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_semester`
--

DROP TABLE IF EXISTS `cis_semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `numeric_value` int(2) DEFAULT NULL,
  `display_value` varchar(45) DEFAULT NULL,
  `period_name` varchar(45) DEFAULT NULL,
  `year_count` varchar(45) DEFAULT NULL,
  `term_value` varchar(45) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_semester`
--

LOCK TABLES `cis_semester` WRITE;
/*!40000 ALTER TABLE `cis_semester` DISABLE KEYS */;
INSERT INTO `cis_semester` VALUES (1,'Semester 1','SEM I',1,'I',NULL,'1',NULL,''),(2,'Semester 2','SEM II',2,'II',NULL,'1',NULL,'Second semester of the second year'),(3,'Semester 3','SEM III',3,'III',NULL,'2',NULL,'Third Semester second year'),(4,'Semester 4','SEM IV',4,'IV',NULL,'2',NULL,''),(5,'Semester 5','SEM V',5,'V',NULL,'3',NULL,'A 5th semester of a 3 years program course'),(6,'Semester 6','SEM VI',6,'VI',NULL,'3',NULL,'6th semester of 3 years programme'),(7,'Semester 7','SEM VII',7,'VII',NULL,'4',NULL,'Fourth Year Semester One');
/*!40000 ALTER TABLE `cis_semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_semester_structure`
--

DROP TABLE IF EXISTS `cis_semester_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_semester_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `code_name` varchar(45) DEFAULT NULL,
  `count` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_semester_structure`
--

LOCK TABLES `cis_semester_structure` WRITE;
/*!40000 ALTER TABLE `cis_semester_structure` DISABLE KEYS */;
INSERT INTO `cis_semester_structure` VALUES (7,'2 Year Programme','2 year program','2YR-P','4'),(8,'1 Year Programme','1 year Programme','1YR-P','2'),(9,'2 Year Programme- Term 2','Term  - 2 of 2 Year Programme (2 Year)','2YR-Term 2','2'),(10,'2 Year Programme - Term 1','Term - 1 of 2 Year programme','2YR-Term 1','2'),(11,'1 Year Masters Programme','1YR-MS','1YR-MS','2');
/*!40000 ALTER TABLE `cis_semester_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_category`
--

DROP TABLE IF EXISTS `cis_student_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_category` (
  `category_id` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`category_id`,`student_id`),
  KEY `fk_cis_student_category_information_has_cis_student_registr_idx` (`student_id`),
  KEY `fk_cis_student_category_information_has_cis_student_registr_idx1` (`category_id`),
  CONSTRAINT `fk_cis_student_category_information_has_cis_student_registrat1` FOREIGN KEY (`category_id`) REFERENCES `cis_student_category_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_student_category_information_has_cis_student_registrat2` FOREIGN KEY (`student_id`) REFERENCES `cis_student_registration_id` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_category`
--

LOCK TABLES `cis_student_category` WRITE;
/*!40000 ALTER TABLE `cis_student_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_student_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_category_information`
--

DROP TABLE IF EXISTS `cis_student_category_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_category_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `remarks` text,
  `category_type` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_category_information`
--

LOCK TABLES `cis_student_category_information` WRITE;
/*!40000 ALTER TABLE `cis_student_category_information` DISABLE KEYS */;
INSERT INTO `cis_student_category_information` VALUES (1,NULL,'PVT','Private Sponsored Students','','sponsor'),(2,NULL,'HESLB','Higher Education Students Loans Board','HESLB Fully Sponsored Student','sponsor'),(3,NULL,'PVT-HESLB','Private and HESLB ','Private and HESLB Sponsored Student Category','sponsor'),(4,NULL,'HESLB-ACCOM','HESLB Accomodated Student','Accomodation Sponsored by HESLB Students Category','sponsor'),(5,NULL,'GVT','Governemt Sponsored OD Student','Student Undergoind OD Programe under Goverment Sponsorship','sponsor'),(6,NULL,'GVT-GMU','Governemt Mature Sponsored',NULL,'sponsor'),(7,NULL,'GVT-Mature','Government Mature Sponsored',NULL,'sponsor'),(8,NULL,'GMU-IT','GMU Student Sponsored','','sponsor'),(9,NULL,'NHIF','Students with Nhif','Students who pay for nhif to the institute','medical');
/*!40000 ALTER TABLE `cis_student_category_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_class_change_request`
--

DROP TABLE IF EXISTS `cis_student_class_change_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_class_change_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_class` int(11) DEFAULT NULL,
  `target_class` int(11) DEFAULT NULL,
  `process_status` int(11) DEFAULT '0',
  `request_seen` int(11) DEFAULT '0',
  `payment_status` int(11) DEFAULT NULL,
  `payment_ref` int(11) DEFAULT NULL,
  `must_pay` int(11) DEFAULT NULL,
  `student_id` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`student_id`),
  UNIQUE KEY `unique_class_sets_tranfer` (`source_class`,`target_class`),
  KEY `source_class_tranfer_idx` (`source_class`),
  KEY `source_class_target_idx` (`target_class`),
  KEY `reguest_student_id_idx` (`student_id`),
  CONSTRAINT `reguest_student_id` FOREIGN KEY (`student_id`) REFERENCES `cis_student_class_enrollment` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `source_class_target` FOREIGN KEY (`target_class`) REFERENCES `cis_student_class_stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `source_class_tranfer` FOREIGN KEY (`source_class`) REFERENCES `cis_student_class_stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_class_change_request`
--

LOCK TABLES `cis_student_class_change_request` WRITE;
/*!40000 ALTER TABLE `cis_student_class_change_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_student_class_change_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_class_enrollment`
--

DROP TABLE IF EXISTS `cis_student_class_enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_class_enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `registration_id` varchar(45) NOT NULL DEFAULT '',
  `stream_id` int(11) NOT NULL DEFAULT '0',
  `class_stream_id` int(11) NOT NULL DEFAULT '0',
  `semester_id` int(11) NOT NULL DEFAULT '0',
  `academic_year_id` int(11) NOT NULL DEFAULT '0',
  `ref_course_id` int(11) NOT NULL DEFAULT '0',
  `dp_course_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `semester_structure_id` int(11) NOT NULL DEFAULT '0',
  `programs_id` int(11) NOT NULL DEFAULT '0',
  `ref_pg_sem_structure_id` int(11) NOT NULL DEFAULT '0',
  `paid_fee` int(1) DEFAULT NULL,
  `date_enrolled` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `fee_payment_status` int(11) NOT NULL,
  `fee_amount_paid` double DEFAULT NULL,
  `fee_reference_id` int(11) NOT NULL,
  `fee_required_amount` double NOT NULL,
  `receipt_id` varchar(60) NOT NULL,
  `trace_key` varchar(40) NOT NULL,
  `previous_class_id` int(11) NOT NULL,
  `date_registered` datetime DEFAULT NULL,
  `reg_confirm_status` int(11) DEFAULT NULL,
  `reg_confirm_date` datetime NOT NULL,
  `comments` text NOT NULL,
  `current_class_code` varchar(20) DEFAULT NULL,
  `start_class_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`student_id`,`registration_id`,`stream_id`,`class_stream_id`,`semester_id`,`academic_year_id`,`ref_course_id`,`dp_course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`ref_pg_sem_structure_id`),
  UNIQUE KEY `trace_key_index` (`trace_key`),
  UNIQUE KEY `unique_student_class_sream` (`dp_course_id`,`programs_id`,`semester_id`,`academic_year_id`,`student_id`),
  UNIQUE KEY `registration_id_academic_year_id_semester_id_index` (`registration_id`,`academic_year_id`,`semester_id`),
  KEY `fk_cis_student_class_enrollment_cis_student_class_stream1_idx` (`stream_id`,`semester_id`,`class_stream_id`,`academic_year_id`,`ref_course_id`,`dp_course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`ref_pg_sem_structure_id`),
  KEY `registration_id` (`registration_id`),
  KEY `student_class_enroll_id` (`id`,`registration_id`,`student_id`),
  CONSTRAINT `fk_cis_student_class_enrollment_cis_student_class_stream1` FOREIGN KEY (`stream_id`, `semester_id`, `class_stream_id`, `academic_year_id`, `ref_course_id`, `dp_course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `ref_pg_sem_structure_id`) REFERENCES `cis_student_class_stream` (`id`, `semester_id`, `stream_id`, `academic_year_id`, `ref_course_id`, `dp_course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `ref_pg_sem_structure_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=773 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_class_enrollment`
--

LOCK TABLES `cis_student_class_enrollment` WRITE;
/*!40000 ALTER TABLE `cis_student_class_enrollment` DISABLE KEYS */;
INSERT INTO `cis_student_class_enrollment` VALUES (319,161,'1401601320590',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:05:02',2,2,0,0,675000,'','14-07010301-0161',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(320,161,'1401601320590',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:05:02',2,2,0,0,625000,'','14-07010302-0161',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(321,162,'1401601320608',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,675000,'','14-07010301-0162',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(322,162,'1401601320608',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,625000,'','14-07010302-0162',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(323,163,'1401601320632',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,675000,'','14-07010301-0163',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(324,163,'1401601320632',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,625000,'','14-07010302-0163',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(325,164,'1401601320640',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,675000,'','14-07010301-0164',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(326,164,'1401601320640',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,625000,'','14-07010302-0164',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(327,165,'1401601320657',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:37',2,2,0,0,675000,'','14-07010301-0165',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(328,165,'1401601320657',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0165',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(329,166,'1401601320665',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0166',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(330,166,'1401601320665',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0166',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(331,167,'1401601320673',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0167',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(332,167,'1401601320673',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0167',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(333,168,'1401601320681',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0168',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(334,168,'1401601320681',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0168',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(335,169,'1401601320699',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0169',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(336,169,'1401601320699',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0169',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(337,170,'1401601320707',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0170',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(338,170,'1401601320707',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0170',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(339,171,'1401601320715',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0171',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(340,171,'1401601320715',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0171',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(341,172,'1401601310724',5,1,1,3,374,1,1,1,1,15,7,10,1,'2014-11-27 22:09:38',1,2,675000,0,675000,'','14-07010301-0172',0,'2014-12-03 09:10:20',1,'2014-12-03 06:23:59','','BENG14-COE','BENG14-COE'),(342,172,'1401601310724',6,1,2,3,374,1,1,1,1,15,7,10,1,'2014-11-27 22:09:38',1,2,625000,0,625000,'','14-07010302-0172',0,'2014-12-03 09:10:21',1,'2014-12-03 06:24:29','','BENG14-COE','BENG14-COE'),(343,173,'1401601310732',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,400,0,675000,'','14-07010301-0173',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(344,173,'1401601310732',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0173',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(345,174,'1401601310740',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0174',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(346,174,'1401601310740',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0174',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(347,175,'1401601320756',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0175',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(348,175,'1401601320756',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0175',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(349,176,'1401601320764',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0176',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(350,176,'1401601320764',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0176',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(351,177,'1401601310773',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0177',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(352,177,'1401601310773',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0177',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(353,178,'1401601320780',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0178',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(354,178,'1401601320780',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0178',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(355,179,'1401601320798',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0179',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(356,179,'1401601320798',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0179',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(357,180,'1401601310807',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0180',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(358,180,'1401601310807',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0180',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(359,181,'1401601320814',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,675000,'','14-07010301-0181',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(360,181,'1401601320814',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:38',2,2,0,0,625000,'','14-07010302-0181',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(361,182,'1401601310823',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0182',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(362,182,'1401601310823',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0182',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(363,183,'1401601320830',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0183',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(364,183,'1401601320830',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0183',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(365,184,'1401601320848',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0184',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(366,184,'1401601320848',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0184',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(367,185,'1401601320855',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0185',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(368,185,'1401601320855',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0185',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(369,186,'1401601320863',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0186',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(370,186,'1401601320863',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0186',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(371,187,'1401601320871',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0187',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(372,187,'1401601320871',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0187',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(373,188,'1401601320889',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0188',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(374,188,'1401601320889',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0188',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(375,189,'1401601320897',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0189',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(376,189,'1401601320897',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0189',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(377,190,'1401601320905',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0190',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(378,190,'1401601320905',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0190',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(379,191,'1401601320913',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0191',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(380,191,'1401601320913',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0191',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(381,192,'1401601310922',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0192',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(382,192,'1401601310922',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0192',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(383,193,'1401601310930',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0193',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(384,193,'1401601310930',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0193',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(385,194,'1401601320947',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0194',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(386,194,'1401601320947',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0194',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(387,195,'1401601320954',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0195',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(388,195,'1401601320954',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0195',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(389,196,'1401601320962',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0196',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(390,196,'1401601320962',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0196',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(391,197,'1401601320970',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,675000,'','14-07010301-0197',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(392,197,'1401601320970',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:39',2,2,0,0,625000,'','14-07010302-0197',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(393,198,'1401601310989',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-07010301-0198',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(394,198,'1401601310989',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-07010302-0198',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(395,199,'1401601320996',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-07010301-0199',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(396,199,'1401601320996',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-07010302-0199',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(397,200,'1401601321002',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-07010301-0200',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(398,200,'1401601321002',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-07010302-0200',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(399,201,'1401601311011',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-07010301-0201',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(400,201,'1401601311011',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-07010302-0201',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(401,202,'1401601321028',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-07010301-0202',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(402,202,'1401601321028',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-07010302-0202',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(403,203,'1401601321036',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-07010301-0203',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(404,203,'1401601321036',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-07010302-0203',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(405,204,'1401801420307',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0204',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(406,204,'1401801420307',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0204',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(407,205,'1401801410316',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0205',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(408,205,'1401801410316',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0205',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(409,206,'1401801420323',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0206',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(410,206,'1401801420323',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0206',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(411,207,'1401801420331',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0207',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(412,207,'1401801420331',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0207',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(413,208,'1401801420349',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0208',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(414,208,'1401801420349',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0208',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(415,209,'1401801410357',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0209',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(416,209,'1401801410357',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0209',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(417,210,'1401801420364',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0210',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(418,210,'1401801420364',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0210',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(419,211,'1401801420372',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0211',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(420,211,'1401801420372',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0211',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(421,212,'1401801420380',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0212',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(422,212,'1401801420380',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0212',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(423,213,'1401801420398',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,675000,'','14-08010301-0213',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(424,213,'1401801420398',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:40',2,2,0,0,625000,'','14-08010302-0213',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(425,214,'1401801420406',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0214',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(426,214,'1401801420406',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0214',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(427,215,'1401801420414',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0215',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(428,215,'1401801420414',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0215',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(429,216,'1401801420422',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0216',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(430,216,'1401801420422',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0216',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(431,217,'1401801420430',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0217',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(432,217,'1401801420430',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0217',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(433,218,'1401801420448',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0218',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(434,218,'1401801420448',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0218',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(435,219,'1401801420455',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0219',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(436,219,'1401801420455',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0219',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(437,220,'1401801420463',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0220',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(438,220,'1401801420463',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0220',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(439,221,'1401801420471',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0221',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(440,221,'1401801420471',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0221',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(441,222,'1401801420489',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0222',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(442,222,'1401801420489',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0222',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(443,223,'1401801420497',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0223',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(444,223,'1401801420497',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0223',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(445,224,'1401801410506',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0224',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(446,224,'1401801410506',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0224',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(447,225,'1401801420513',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0225',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(448,225,'1401801420513',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0225',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(449,226,'1401801420521',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0226',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(450,226,'1401801420521',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0226',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(451,227,'1401801420539',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0227',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(452,227,'1401801420539',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0227',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(453,228,'1401801420547',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,675000,'','14-08010301-0228',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(454,228,'1401801420547',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:41',2,2,0,0,625000,'','14-08010302-0228',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(455,229,'1401801420554',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-08010301-0229',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(456,229,'1401801420554',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-08010302-0229',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(457,230,'1401801420562',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-08010301-0230',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(458,230,'1401801420562',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-08010302-0230',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(459,231,'1401801420570',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-08010301-0231',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(460,231,'1401801420570',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-08010302-0231',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(461,232,'1401801410589',3,1,1,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-08010301-0232',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(462,232,'1401801410589',4,1,2,3,369,1,1,1,1,11,8,8,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-08010302-0232',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','GC14-COE','GC14-COE'),(463,233,'1401601321044',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0233',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(464,233,'1401601321044',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0233',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(465,234,'1401601321051',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0234',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(466,234,'1401601321051',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0234',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(467,235,'1401601321069',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0235',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(468,235,'1401601321069',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0235',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(469,236,'1401601321077',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0236',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(470,236,'1401601321077',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0236',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(471,237,'1401601321085',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0237',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(472,237,'1401601321085',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0237',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(473,238,'1401601311094',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0238',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(474,238,'1401601311094',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0238',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(475,239,'1401601321101',5,1,1,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,675000,'','14-07010301-0239',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(476,239,'1401601321101',6,1,2,3,374,1,1,1,1,15,7,10,2,'2014-11-27 22:09:42',2,2,0,0,625000,'','14-07010302-0239',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','BENG14-COE','BENG14-COE'),(477,240,'1401301120019',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0240',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(478,240,'1401301120019',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0240',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(479,241,'1401301120027',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0241',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(480,241,'1401301120027',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0241',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(481,242,'1401301120035',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0242',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(482,242,'1401301120035',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0242',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(483,243,'1401301120043',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0243',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(484,243,'1401301120043',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0243',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(485,244,'1401301120050',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0244',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(486,244,'1401301120050',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0244',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(487,245,'1401301120068',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0245',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(488,245,'1401301120068',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0245',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(489,246,'1401301120076',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0246',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(490,246,'1401301120076',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0246',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(491,247,'1401301120084',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0247',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(492,247,'1401301120084',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0247',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(493,248,'1401301120092',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0248',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(494,248,'1401301120092',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0248',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(495,249,'1401301120100',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0249',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(496,249,'1401301120100',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0249',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(497,250,'1401301120118',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0250',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(498,250,'1401301120118',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0250',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(499,251,'1401301120126',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,535000,'','14-05010301-0251',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(500,251,'1401301120126',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:11',2,2,0,0,425000,'','14-05010302-0251',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(501,252,'1401301120134',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0252',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(502,252,'1401301120134',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0252',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(503,253,'1401301120142',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0253',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(504,253,'1401301120142',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0253',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(505,254,'1401301120159',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0254',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(506,254,'1401301120159',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0254',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(507,255,'1401301120167',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0255',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(508,255,'1401301120167',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0255',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(509,256,'1401301120175',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0256',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(510,256,'1401301120175',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0256',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(511,257,'1401301120183',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0257',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(512,257,'1401301120183',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0257',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(513,258,'1401301110192',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0258',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(514,258,'1401301110192',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0258',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(515,259,'1401301120209',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,535000,'','14-05010301-0259',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(516,259,'1401301120209',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:12',2,2,0,0,425000,'','14-05010302-0259',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(517,260,'1401301120217',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,535000,'','14-05010301-0260',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(518,260,'1401301120217',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,425000,'','14-05010302-0260',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(519,261,'1401301120225',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,535000,'','14-05010301-0261',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(520,261,'1401301120225',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,425000,'','14-05010302-0261',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(521,262,'1401301120233',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,535000,'','14-05010301-0262',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(522,262,'1401301120233',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,425000,'','14-05010302-0262',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(523,263,'1401301120241',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,535000,'','14-05010301-0263',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(524,263,'1401301120241',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,425000,'','14-05010302-0263',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(525,264,'1401301120258',1,1,1,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,535000,'','14-05010301-0264',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(526,264,'1401301120258',2,1,2,3,373,1,1,1,1,9,5,8,2,'2014-12-18 00:37:13',2,2,0,0,425000,'','14-05010302-0264',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD14-COE','OD14-COE'),(527,269,'120121448627',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:09',2,2,0,0,520000,'','14-03100301-0269',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(528,269,'120121448627',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:09',2,2,0,0,425000,'','14-03100302-0269',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(529,270,'120121411167',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:09',2,2,0,0,520000,'','14-03100301-0270',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(530,270,'120121411167',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:09',2,2,0,0,425000,'','14-03100302-0270',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(531,275,'120121421139',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:11',2,2,0,0,520000,'','14-03100301-0275',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(532,275,'120121421139',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:11',2,2,0,0,425000,'','14-03100302-0275',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(533,277,'120121461117',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:12',2,2,0,0,520000,'','14-03100301-0277',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(534,277,'120121461117',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:12',2,2,0,0,425000,'','14-03100302-0277',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(535,278,'120121438631',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:13',2,2,0,0,520000,'','14-03100301-0278',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(536,278,'120121438631',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:13',2,2,0,0,425000,'','14-03100302-0278',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(537,279,'501013152',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:13',2,2,0,0,520000,'','14-03100301-0279',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(538,279,'501013152',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:13',2,2,0,0,425000,'','14-03100302-0279',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(539,284,'120121461099',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:15',2,2,0,0,520000,'','14-03100301-0284',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(540,284,'120121461099',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:15',2,2,0,0,425000,'','14-03100302-0284',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(541,287,'120121478671',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:17',2,2,0,0,520000,'','14-03100301-0287',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(542,287,'120121478671',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:17',2,2,0,0,425000,'','14-03100302-0287',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(543,292,'110121438047',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:18',2,2,0,0,520000,'','14-03100301-0292',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(544,292,'110121438047',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:18',2,2,0,0,425000,'','14-03100302-0292',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(545,293,'120121421153',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:19',2,2,0,0,520000,'','14-03100301-0293',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(546,293,'120121421153',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:19',2,2,0,0,425000,'','14-03100302-0293',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(547,294,'120121472339',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:19',2,2,0,0,520000,'','14-03100301-0294',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(548,294,'120121472339',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:19',2,2,0,0,425000,'','14-03100302-0294',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(549,295,'120121451107',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:20',2,2,0,0,520000,'','14-03100301-0295',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(550,295,'120121451107',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:20',2,2,0,0,425000,'','14-03100302-0295',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(551,296,'120121401010',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:20',2,2,0,0,520000,'','14-03100301-0296',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(552,296,'120121401010',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:20',2,2,0,0,425000,'','14-03100302-0296',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(553,297,'120121441135',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:21',2,2,0,0,520000,'','14-03100301-0297',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(554,297,'120121441135',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:21',2,2,0,0,425000,'','14-03100302-0297',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(555,299,'120121448707',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:22',2,2,0,0,520000,'','14-03100301-0299',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(556,299,'120121448707',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:22',2,2,0,0,425000,'','14-03100302-0299',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(557,303,'120121491161',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:24',2,2,0,0,520000,'','14-03100301-0303',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(558,303,'120121491161',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:24',2,2,0,0,425000,'','14-03100302-0303',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(559,304,'120121411006',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:25',2,2,0,0,520000,'','14-03100301-0304',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(560,304,'120121411006',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:25',2,2,0,0,425000,'','14-03100302-0304',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(561,305,'120121431026',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:25',2,2,0,0,520000,'','14-03100301-0305',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(562,305,'120121431026',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:25',2,2,0,0,425000,'','14-03100302-0305',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(563,306,'901016033',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:26',2,2,0,0,520000,'','14-03100301-0306',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(564,306,'901016033',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:26',2,2,0,0,425000,'','14-03100302-0306',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(565,308,'120121448689',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:26',2,2,0,0,520000,'','14-03100301-0308',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(566,308,'120121448689',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:27',2,2,0,0,425000,'','14-03100302-0308',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(567,309,'120121451008',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:27',2,2,0,0,520000,'','14-03100301-0309',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(568,309,'120121451008',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:27',2,2,0,0,425000,'','14-03100302-0309',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(569,313,'601013605',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:29',2,2,0,0,520000,'','14-03100301-0313',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(570,313,'601013605',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:29',2,2,0,0,425000,'','14-03100302-0313',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(571,316,'110121461226',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:30',2,2,0,0,520000,'','14-03100301-0316',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(572,316,'110121461226',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:30',2,2,0,0,425000,'','14-03100302-0316',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(573,318,'120121401091',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:31',2,2,0,0,520000,'','14-03100301-0318',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(574,318,'120121401091',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:31',2,2,0,0,425000,'','14-03100302-0318',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(575,320,'120121401034',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:32',2,2,0,0,520000,'','14-03100301-0320',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(576,320,'120121401034',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:32',2,2,0,0,425000,'','14-03100302-0320',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(577,321,'120121451145',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:33',2,2,0,0,520000,'','14-03100301-0321',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(578,321,'120121451145',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:33',2,2,0,0,425000,'','14-03100302-0321',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(579,325,'110121458043',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:34',2,2,0,0,520000,'','14-03100301-0325',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(580,325,'110121458043',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:34',2,2,0,0,425000,'','14-03100302-0325',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(581,326,'110121438443',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:35',2,2,0,0,520000,'','14-03100301-0326',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(582,326,'110121438443',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:35',2,2,0,0,425000,'','14-03100302-0326',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(583,327,'120121421115',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:35',2,2,0,0,520000,'','14-03100301-0327',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(584,327,'120121421115',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:35',2,2,0,0,425000,'','14-03100302-0327',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(585,328,'120121481175',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:36',2,2,0,0,520000,'','14-03100301-0328',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(586,328,'120121481175',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:36',2,2,0,0,425000,'','14-03100302-0328',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(587,329,'120121491081',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:36',2,2,0,0,520000,'','14-03100301-0329',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(588,329,'120121491081',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:36',2,2,0,0,425000,'','14-03100302-0329',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(589,330,'120121471004',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:37',2,2,0,0,520000,'','14-03100301-0330',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(590,330,'120121471004',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:37',2,2,0,0,425000,'','14-03100302-0330',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(591,331,'120121441036',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:37',2,2,0,0,520000,'','14-03100301-0331',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(592,331,'120121441036',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:37',2,2,0,0,425000,'','14-03100302-0331',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(593,332,'120121411087',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:38',2,2,0,0,520000,'','14-03100301-0332',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(594,332,'120121411087',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:38',2,2,0,0,425000,'','14-03100302-0332',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(595,333,'100101P8000',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:38',2,2,0,0,520000,'','14-03100301-0333',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(596,333,'100101P8000',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:38',2,2,0,0,425000,'','14-03100302-0333',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(597,334,'120121491147',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:39',2,2,0,0,520000,'','14-03100301-0334',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(598,334,'120121491147',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:39',2,2,0,0,425000,'','14-03100302-0334',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(599,335,'120121431149',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:39',2,2,0,0,520000,'','14-03100301-0335',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(600,335,'120121431149',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:39',2,2,0,0,425000,'','14-03100302-0335',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(601,336,'120121421097',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:40',2,2,0,0,520000,'','14-03100301-0336',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(602,336,'120121421097',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:40',2,2,0,0,425000,'','14-03100302-0336',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(603,337,'110121428051',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:40',2,2,0,0,520000,'','14-03100301-0337',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(604,337,'110121428051',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:41',2,2,0,0,425000,'','14-03100302-0337',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(605,338,'120121431083',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:41',2,2,0,0,520000,'','14-03100301-0338',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(606,338,'120121431083',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:41',2,2,0,0,425000,'','14-03100302-0338',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(607,339,'120121431101',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:42',2,2,0,0,520000,'','14-03100301-0339',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(608,339,'120121431101',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:42',2,2,0,0,425000,'','14-03100302-0339',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(609,340,'120121401157',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:42',2,2,0,0,520000,'','14-03100301-0340',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(610,340,'120121401157',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:42',2,2,0,0,425000,'','14-03100302-0340',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(611,341,'120121471165',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:43',2,2,0,0,520000,'','14-03100301-0341',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(612,341,'120121471165',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:43',2,2,0,0,425000,'','14-03100302-0341',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(613,343,'120121478695',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:44',2,2,0,0,520000,'','14-03100301-0343',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(614,343,'120121478695',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:44',2,2,0,0,425000,'','14-03100302-0343',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(615,345,'120121401171',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:45',2,2,0,0,520000,'','14-03100301-0345',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(616,345,'120121401171',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:45',2,2,0,0,425000,'','14-03100302-0345',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(617,346,'120121411129',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:46',2,2,0,0,520000,'','14-03100301-0346',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(618,346,'120121411129',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:46',2,2,0,0,425000,'','14-03100302-0346',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(619,347,'120121411105',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:46',2,2,0,0,520000,'','14-03100301-0347',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(620,347,'120121411105',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:46',2,2,0,0,425000,'','14-03100302-0347',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(621,348,'120121478633',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:47',2,2,0,0,520000,'','14-03100301-0348',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(622,348,'120121478633',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:47',2,2,0,0,425000,'','14-03100302-0348',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(623,349,'120121408649',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:47',2,2,0,0,520000,'','14-03100301-0349',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(624,349,'120121408649',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:47',2,2,0,0,425000,'','14-03100302-0349',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(625,350,'120121432337',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:49',2,2,0,0,520000,'','14-03100301-0350',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(626,350,'120121432337',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:49',2,2,0,0,425000,'','14-03100302-0350',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(627,351,'120121468647',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:50',2,2,0,0,520000,'','14-03100301-0351',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(628,351,'120121468647',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:50',2,2,0,0,425000,'','14-03100302-0351',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(629,352,'120121468685',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:52',2,2,0,0,520000,'','14-03100301-0352',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(630,352,'120121468685',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:52',2,2,0,0,425000,'','14-03100302-0352',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(631,353,'120121448641',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:53',2,2,0,0,520000,'','14-03100301-0353',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(632,353,'120121448641',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:53',2,2,0,0,425000,'','14-03100302-0353',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(633,354,'120121438655',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:54',2,2,0,0,520000,'','14-03100301-0354',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(634,354,'120121438655',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:54',2,2,0,0,425000,'','14-03100302-0354',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(635,355,'120121438617',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:55',2,2,0,0,520000,'','14-03100301-0355',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(636,355,'120121438617',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:55',2,2,0,0,425000,'','14-03100302-0355',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(637,357,'120121458637',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:56',2,2,0,0,520000,'','14-03100301-0357',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(638,357,'120121458637',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:56',2,2,0,0,425000,'','14-03100302-0357',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(639,358,'120121468661',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:58',2,2,0,0,520000,'','14-03100301-0358',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(640,358,'120121468661',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:58',2,2,0,0,425000,'','14-03100302-0358',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(641,359,'110121488035',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:58',2,2,0,0,520000,'','14-03100301-0359',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(642,359,'110121488035',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:59',2,2,0,0,425000,'','14-03100302-0359',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(643,361,'120121408687',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:13:59',2,2,0,0,520000,'','14-03100301-0361',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(644,361,'120121408687',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:00',2,2,0,0,425000,'','14-03100302-0361',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(645,362,'120121418635',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:00',2,2,0,0,520000,'','14-03100301-0362',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(646,362,'120121418635',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:00',2,2,0,0,425000,'','14-03100302-0362',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(647,364,'120121441159',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:01',2,2,0,0,520000,'','14-03100301-0364',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(648,364,'120121441159',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:01',2,2,0,0,425000,'','14-03100302-0364',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(649,365,'110121471859',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:02',2,2,0,0,520000,'','14-03100301-0365',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(650,365,'110121471859',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:02',2,2,0,0,425000,'','14-03100302-0365',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(651,366,'120121478619',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:02',2,2,0,0,520000,'','14-03100301-0366',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(652,366,'120121478619',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:02',2,2,0,0,425000,'','14-03100302-0366',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(653,367,'120121488643',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:03',2,2,0,0,520000,'','14-03100301-0367',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(654,367,'120121488643',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:03',2,2,0,0,425000,'','14-03100302-0367',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(655,368,'120121468623',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:03',2,2,0,0,520000,'','14-03100301-0368',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(656,368,'120121468623',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:03',2,2,0,0,425000,'','14-03100302-0368',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(657,369,'120121498639',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:04',2,2,0,0,520000,'','14-03100301-0369',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(658,369,'120121498639',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:04',2,2,0,0,425000,'','14-03100302-0369',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(659,370,'120121498677',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:05',2,2,0,0,520000,'','14-03100301-0370',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(660,370,'120121498677',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:05',2,2,0,0,425000,'','14-03100302-0370',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(661,374,'120121418659',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:06',2,2,0,0,520000,'','14-03100301-0374',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(662,374,'120121418659',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:06',2,2,0,0,425000,'','14-03100302-0374',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(663,375,'100101P7307',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:07',2,2,0,0,520000,'','14-03100301-0375',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(664,375,'100101P7307',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:07',2,2,0,0,425000,'','14-03100302-0375',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(665,377,'120121428621',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:08',2,2,0,0,520000,'','14-03100301-0377',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(666,377,'120121428621',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:08',2,2,0,0,425000,'','14-03100302-0377',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(667,378,'120121488629',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:09',2,2,0,0,520000,'','14-03100301-0378',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(668,378,'120121488629',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:09',2,2,0,0,425000,'','14-03100302-0378',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(669,380,'120121498615',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:10',2,2,0,0,520000,'','14-03100301-0380',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(670,380,'120121498615',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:10',2,2,0,0,425000,'','14-03100302-0380',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(671,382,'120121408705',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:11',2,2,0,0,520000,'','14-03100301-0382',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(672,382,'120121408705',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:11',2,2,0,0,425000,'','14-03100302-0382',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(673,383,'120121488681',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:11',2,2,0,0,520000,'','14-03100301-0383',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(674,383,'120121488681',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:12',2,2,0,0,425000,'','14-03100302-0383',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(675,384,'120121478657',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:12',2,2,0,0,520000,'','14-03100301-0384',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(676,384,'120121478657',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:12',2,2,0,0,425000,'','14-03100302-0384',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(677,386,'120121458651',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:13',2,2,0,0,520000,'','14-03100301-0386',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(678,386,'120121458651',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:13',2,2,0,0,425000,'','14-03100302-0386',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(679,387,'110121438061',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:14',2,2,0,0,520000,'','14-03100301-0387',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(680,387,'110121438061',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:14',2,2,0,0,425000,'','14-03100302-0387',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(681,388,'120121488667',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:15',2,2,0,0,520000,'','14-03100301-0388',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(682,388,'120121488667',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:15',2,2,0,0,425000,'','14-03100302-0388',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(683,389,'120121482349',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:16',2,2,0,0,520000,'','14-03100301-0389',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(684,389,'120121482349',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:16',2,2,0,0,425000,'','14-03100302-0389',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(685,390,'120121438693',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:18',2,2,0,0,520000,'','14-03100301-0390',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(686,390,'120121438693',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:18',2,2,0,0,425000,'','14-03100302-0390',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(687,391,'120121438679',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:19',2,2,0,0,520000,'','14-03100301-0391',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(688,391,'120121438679',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:14:19',2,2,0,0,425000,'','14-03100302-0391',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(689,265,'120121181055',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:09',2,2,0,0,160000,'','14-03100301-0265',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(690,265,'120121181055',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:09',2,2,0,0,65000,'','14-03100302-0265',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(691,266,'120121131029',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:09',2,2,0,0,160000,'','14-03100301-0266',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(692,266,'120121131029',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:09',2,2,0,0,65000,'','14-03100302-0266',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(693,268,'120121422341',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:10',2,2,0,0,160000,'','14-03100301-0268',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(694,268,'120121422341',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:10',2,2,0,0,65000,'','14-03100302-0268',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(695,271,'120121191065',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:12',2,2,0,0,160000,'','14-03100301-0271',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(696,271,'120121191065',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:12',2,2,0,0,65000,'','14-03100302-0271',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(697,272,'120121111047',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:12',2,2,0,0,160000,'','14-03100301-0272',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(698,272,'120121111047',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:12',2,2,0,0,65000,'','14-03100302-0272',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(699,273,'120121171069',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:13',2,2,0,0,160000,'','14-03100301-0273',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(700,273,'120121171069',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:13',2,2,0,0,65000,'','14-03100302-0273',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(701,274,'120121131043',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:13',2,2,0,0,160000,'','14-03100301-0274',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(702,274,'120121131043',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:13',2,2,0,0,65000,'','14-03100302-0274',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(703,276,'120121101051',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:14',2,2,0,0,160000,'','14-03100301-0276',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(704,276,'120121101051',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:14',2,2,0,0,65000,'','14-03100302-0276',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(705,280,'120121151049',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:16',2,2,0,0,160000,'','14-03100301-0280',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(706,280,'120121151049',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:16',2,2,0,0,65000,'','14-03100302-0280',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(707,281,'120121161073',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:17',2,2,0,0,160000,'','14-03100301-0281',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(708,281,'120121161073',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:17',2,2,0,0,65000,'','14-03100302-0281',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(709,282,'120121101013',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:17',2,2,0,0,160000,'','14-03100301-0282',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(710,282,'120121101013',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:17',2,2,0,0,65000,'','14-03100302-0282',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(711,283,'120121171007',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:18',2,2,0,0,160000,'','14-03100301-0283',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(712,283,'120121171007',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:18',2,2,0,0,65000,'','14-03100302-0283',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(713,285,'120121111009',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:19',2,2,0,0,160000,'','14-03100301-0285',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(714,285,'120121111009',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:19',2,2,0,0,65000,'','14-03100302-0285',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(715,286,'120121141015',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:19',2,2,0,0,160000,'','14-03100301-0286',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(716,286,'120121141015',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:19',2,2,0,0,65000,'','14-03100302-0286',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(717,288,'120121121071',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:20',2,2,0,0,160000,'','14-03100301-0288',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(718,288,'120121121071',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:20',2,2,0,0,65000,'','14-03100302-0288',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(719,289,'120121121057',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:20',2,2,0,0,160000,'','14-03100301-0289',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(720,289,'120121121057',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:20',2,2,0,0,65000,'','14-03100302-0289',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(721,290,'120121171002',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:21',2,2,0,0,160000,'','14-03100301-0290',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(722,290,'120121171002',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:21',2,2,0,0,65000,'','14-03100302-0290',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(723,298,'120121191041',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:25',2,2,0,0,160000,'','14-03100301-0298',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(724,298,'120121191041',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:25',2,2,0,0,65000,'','14-03100302-0298',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(725,300,'120222181313',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:26',2,2,0,0,160000,'','14-03100301-0300',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(726,300,'120222181313',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:26',2,2,0,0,65000,'','14-03100302-0300',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(727,301,'120121191003',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:27',2,2,0,0,160000,'','14-03100301-0301',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(728,301,'120121191003',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:27',2,2,0,0,65000,'','14-03100302-0301',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(729,302,'120121121019',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:28',2,2,0,0,160000,'','14-03100301-0302',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(730,302,'120121121019',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:28',2,2,0,0,65000,'','14-03100302-0302',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(731,307,'120121492335',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:37',2,2,0,0,160000,'','14-03100301-0307',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(732,307,'120121492335',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:37',2,2,0,0,65000,'','14-03100302-0307',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(733,310,'120121191027',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:40',2,2,0,0,160000,'','14-03100301-0310',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(734,310,'120121191027',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:40',2,2,0,0,65000,'','14-03100302-0310',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(735,311,'120121161059',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:41',2,2,0,0,160000,'','14-03100301-0311',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(736,311,'120121161059',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:41',2,2,0,0,65000,'','14-03100302-0311',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(737,314,'120121151063',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:44',2,2,0,0,160000,'','14-03100301-0314',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(738,314,'120121151063',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:44',2,2,0,0,65000,'','14-03100302-0314',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(739,315,'120121101037',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:44',2,2,0,0,160000,'','14-03100301-0315',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(740,315,'120121101037',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:44',2,2,0,0,65000,'','14-03100302-0315',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(741,317,'120121121033',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:46',2,2,0,0,160000,'','14-03100301-0317',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(742,317,'120121121033',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:46',2,2,0,0,65000,'','14-03100302-0317',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(743,319,'120121131005',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:47',2,2,0,0,160000,'','14-03100301-0319',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(744,319,'120121131005',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:47',2,2,0,0,65000,'','14-03100302-0319',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(745,322,'120121168485',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:48',2,2,0,0,160000,'','14-03100301-0322',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(746,322,'120121168485',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:48',2,2,0,0,65000,'','14-03100302-0322',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(747,323,'120121111023',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:49',2,2,0,0,160000,'','14-03100301-0323',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(748,323,'120121111023',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:49',2,2,0,0,65000,'','14-03100302-0323',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(749,324,'120121141039',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:49',2,2,0,0,160000,'','14-03100301-0324',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(750,324,'120121141039',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:16:50',2,2,0,0,65000,'','14-03100302-0324',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(751,342,'120121181031',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:12',2,2,0,0,160000,'','14-03100301-0342',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(752,342,'120121181031',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:12',2,2,0,0,65000,'','14-03100302-0342',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(753,344,'120121108487',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:18',2,2,0,0,160000,'','14-03100301-0344',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(754,344,'120121108487',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:18',2,2,0,0,65000,'','14-03100302-0344',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(755,356,'120121161011',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:27',2,2,0,0,160000,'','14-03100301-0356',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(756,356,'120121161011',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:27',2,2,0,0,65000,'','14-03100302-0356',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(757,360,'120121102329',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:29',2,2,0,0,160000,'','14-03100301-0360',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(758,360,'120121102329',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:29',2,2,0,0,65000,'','14-03100302-0360',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(759,363,'120121152331',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:32',2,2,0,0,160000,'','14-03100301-0363',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(760,363,'120121152331',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:32',2,2,0,0,65000,'','14-03100302-0363',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(761,371,'120121402345',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:39',2,2,0,0,160000,'','14-03100301-0371',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(762,371,'120121402345',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:39',2,2,0,0,65000,'','14-03100302-0371',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(763,372,'120121452333',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:41',2,2,0,0,160000,'','14-03100301-0372',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(764,372,'120121452333',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:41',2,2,0,0,65000,'','14-03100302-0372',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(765,373,'120121442347',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:43',2,2,0,0,160000,'','14-03100301-0373',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(766,373,'120121442347',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:43',2,2,0,0,65000,'','14-03100302-0373',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(767,376,'120121171045',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:45',2,2,0,0,160000,'','14-03100301-0376',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(768,376,'120121171045',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:45',2,2,0,0,65000,'','14-03100302-0376',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(769,381,'120121462343',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:47',2,2,0,0,160000,'','14-03100301-0381',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(770,381,'120121462343',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:47',2,2,0,0,65000,'','14-03100302-0381',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(771,385,'110121191230',41,1,1,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:50',2,2,72800,0,160000,'','14-03100301-0385',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE'),(772,385,'110121191230',42,1,2,3,377,10,5,1,1,12,3,8,2,'2014-12-18 13:17:50',2,2,0,0,65000,'','14-03100302-0385',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','','OD12-CE','OD12-CE');
/*!40000 ALTER TABLE `cis_student_class_enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_class_stream`
--

DROP TABLE IF EXISTS `cis_student_class_stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_class_stream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_id` int(11) NOT NULL DEFAULT '0',
  `stream_id` int(11) NOT NULL DEFAULT '0',
  `academic_year_id` int(11) NOT NULL DEFAULT '0',
  `ref_course_id` int(11) NOT NULL DEFAULT '0',
  `dp_course_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `semester_structure_id` int(11) NOT NULL DEFAULT '0',
  `programs_id` int(11) NOT NULL DEFAULT '0',
  `ref_pg_sem_structure_id` int(11) NOT NULL DEFAULT '0',
  `class_name` text,
  `status` int(1) DEFAULT NULL,
  `is_enabled` int(1) DEFAULT NULL,
  `class_monitor_id` int(11) DEFAULT NULL,
  `class_master_id` int(11) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `class_alias` varchar(100) DEFAULT NULL,
  `code_name` varchar(30) NOT NULL,
  `class_year` int(11) NOT NULL,
  PRIMARY KEY (`id`,`semester_id`,`stream_id`,`academic_year_id`,`ref_course_id`,`dp_course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`ref_pg_sem_structure_id`),
  UNIQUE KEY `unique_class_stream` (`dp_course_id`,`programs_id`,`academic_year_id`,`semester_id`),
  KEY `fk_cis_department_program_course_has_cis_program_semester_l_idx` (`semester_id`),
  KEY `fk_cis_department_program_course_has_cis_program_semester_l_idx2` (`stream_id`),
  KEY `fk_cis_student_class_stream_cis_college_academic_years1_idx` (`academic_year_id`),
  KEY `fk_cis_student_class_stream_cis_department_program_course1_idx` (`ref_course_id`,`dp_course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`programs_id`,`ref_pg_sem_structure_id`),
  CONSTRAINT `fk_cis_department_program_course_has_cis_program_semester_lis2` FOREIGN KEY (`semester_id`) REFERENCES `cis_program_semester_list` (`semester_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_department_program_course_has_cis_program_semester_lis3` FOREIGN KEY (`stream_id`) REFERENCES `cis_department_program_class_stream` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_student_class_stream_cis_college_academic_years1` FOREIGN KEY (`academic_year_id`) REFERENCES `cis_college_academic_years` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_student_class_stream_cis_department_program_course1` FOREIGN KEY (`ref_course_id`, `dp_course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `ref_pg_sem_structure_id`) REFERENCES `cis_department_program_course` (`id`, `course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `pg_sem_structure_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_class_stream`
--

LOCK TABLES `cis_student_class_stream` WRITE;
/*!40000 ALTER TABLE `cis_student_class_stream` DISABLE KEYS */;
INSERT INTO `cis_student_class_stream` VALUES (1,1,1,3,373,1,1,1,1,9,5,8,'Basic Technician Certificate in Computer Engineering(BTC-COE)',1,1,NULL,NULL,100,NULL,'OD14-COE',1),(2,2,1,3,373,1,1,1,1,9,5,8,'Basic Technician Certificate in Computer Engineering(BTC-COE)',1,1,NULL,NULL,100,NULL,'OD14-COE',1),(3,1,1,3,369,1,1,1,1,11,8,8,'General Course in Computer Engineering(GC-COE)',1,1,NULL,NULL,100,NULL,'GC14-COE',1),(4,2,1,3,369,1,1,1,1,11,8,8,'General Course in Computer Engineering(GC-COE)',1,1,NULL,NULL,100,NULL,'GC14-COE',1),(5,1,1,3,374,1,1,1,1,15,7,10,'Higher Diploma - 01 in Computer Engineering(HD01-COE)',1,1,NULL,NULL,100,NULL,'BENG14-COE',1),(6,2,1,3,374,1,1,1,1,15,7,10,'Higher Diploma - 01 in Computer Engineering(HD01-COE)',1,1,NULL,NULL,100,NULL,'BENG14-COE',1),(7,1,1,10,373,1,1,1,1,9,5,8,'Basic Technician Certificate in Computer Engineering(BTC-COE)',1,1,NULL,NULL,100,NULL,'OD12-COE',1),(8,2,1,10,373,1,1,1,1,9,5,8,'Basic Technician Certificate in Computer Engineering(BTC-COE)',1,1,NULL,NULL,100,NULL,'OD12-COE',1),(9,1,1,4,372,1,1,1,1,10,4,8,'Technician Certificate in Computer Engineering(TC-COE)',1,1,NULL,NULL,100,NULL,'OD12-COE',2),(10,2,1,4,372,1,1,1,1,10,4,8,'Technician Certificate in Computer Engineering(TC-COE)',1,1,NULL,NULL,100,NULL,'OD12-COE',2),(11,1,1,3,367,1,1,1,1,12,3,8,'Ordinary Diploma in Computer Engineering(OD-COE)',1,1,NULL,NULL,100,NULL,'OD12-COE',3),(12,2,1,3,367,1,1,1,1,12,3,8,'Ordinary Diploma in Computer Engineering(OD-COE)',1,1,NULL,NULL,100,NULL,'OD12-COE',3),(13,1,1,10,369,1,1,1,1,11,8,8,'General Course in Computer Engineering(GC-COE)',1,1,NULL,NULL,100,NULL,'GC12-COE',1),(14,2,1,10,369,1,1,1,1,11,8,8,'General Course in Computer Engineering(GC-COE)',1,1,NULL,NULL,100,NULL,'GC12-COE',1),(15,1,1,10,374,1,1,1,1,15,7,10,'Higher Diploma - 01 in Computer Engineering(HD01-COE)',1,1,NULL,NULL,100,NULL,'BENG12-COE',1),(16,2,1,10,374,1,1,1,1,15,7,10,'Higher Diploma - 01 in Computer Engineering(HD01-COE)',1,1,NULL,NULL,100,NULL,'BENG12-COE',1),(17,3,1,4,375,1,1,1,1,14,9,9,'Higher Diploma - 02 in Computer Engineering(HD02-COE)',1,1,NULL,NULL,100,NULL,'BENG12-COE',2),(18,4,1,4,375,1,1,1,1,14,9,9,'Higher Diploma - 02 in Computer Engineering(HD02-COE)',1,1,NULL,NULL,100,NULL,'BENG12-COE',2),(19,1,1,3,368,1,1,1,1,2,6,8,'Bachelor Degree in Computer Engineering(BENG-COE)',1,1,NULL,NULL,100,NULL,'BENG12-COE',3),(20,2,1,3,368,1,1,1,1,2,6,8,'Bachelor Degree in Computer Engineering(BENG-COE)',1,1,NULL,NULL,100,NULL,'BENG12-COE',3),(21,1,1,4,373,1,1,1,1,9,5,8,'Basic Technician Certificate in Computer Engineering(BTC-COE)',1,1,NULL,NULL,100,NULL,'OD13-COE',1),(22,2,1,4,373,1,1,1,1,9,5,8,'Basic Technician Certificate in Computer Engineering(BTC-COE)',1,1,NULL,NULL,100,NULL,'OD13-COE',1),(23,1,1,3,372,1,1,1,1,10,4,8,'Technician Certificate in Computer Engineering(TC-COE)',1,1,NULL,NULL,100,NULL,'OD13-COE',2),(24,2,1,3,372,1,1,1,1,10,4,8,'Technician Certificate in Computer Engineering(TC-COE)',1,1,NULL,NULL,100,NULL,'OD13-COE',2),(25,1,1,4,369,1,1,1,1,11,8,8,'General Course in Computer Engineering(GC-COE)',1,1,NULL,NULL,100,NULL,'GC13-COE',1),(26,2,1,4,369,1,1,1,1,11,8,8,'General Course in Computer Engineering(GC-COE)',1,1,NULL,NULL,100,NULL,'GC13-COE',1),(27,1,1,4,374,1,1,1,1,15,7,10,'Higher Diploma - 01 in Computer Engineering(HD01-COE)',1,1,NULL,NULL,100,NULL,'BENG13-COE',1),(28,2,1,4,374,1,1,1,1,15,7,10,'Higher Diploma - 01 in Computer Engineering(HD01-COE)',1,1,NULL,NULL,100,NULL,'BENG13-COE',1),(29,3,1,3,375,1,1,1,1,14,9,9,'Higher Diploma - 02 in Computer Engineering(HD02-COE)',1,1,NULL,NULL,100,NULL,'BENG13-COE',2),(30,4,1,3,375,1,1,1,1,14,9,9,'Higher Diploma - 02 in Computer Engineering(HD02-COE)',1,1,NULL,NULL,100,NULL,'BENG13-COE',2),(31,1,1,3,379,10,5,1,1,9,5,8,'Basic Technician Certificate in Civil Engineering(BTC-CE)',1,1,NULL,NULL,100,NULL,'OD14-CE',1),(32,2,1,3,379,10,5,1,1,9,5,8,'Basic Technician Certificate in Civil Engineering(BTC-CE)',1,1,NULL,NULL,100,NULL,'OD14-CE',1),(33,1,1,3,382,10,5,1,1,11,8,8,'General Course in Civil Engineering(GC-CE)',1,1,NULL,NULL,100,NULL,'GC14-CE',1),(34,2,1,3,382,10,5,1,1,11,8,8,'General Course in Civil Engineering(GC-CE)',1,1,NULL,NULL,100,NULL,'GC14-CE',1),(35,1,1,3,381,10,5,1,1,15,7,10,'Higher Diploma - 01 in Civil Engineering(HD01-CE)',1,1,NULL,NULL,100,NULL,'BENG14-CE',1),(36,2,1,3,381,10,5,1,1,15,7,10,'Higher Diploma - 01 in Civil Engineering(HD01-CE)',1,1,NULL,NULL,100,NULL,'BENG14-CE',1),(37,1,1,10,379,10,5,1,1,9,5,8,'Basic Technician Certificate in Civil Engineering(BTC-CE)',1,1,NULL,NULL,100,NULL,'OD12-CE',1),(38,2,1,10,379,10,5,1,1,9,5,8,'Basic Technician Certificate in Civil Engineering(BTC-CE)',1,1,NULL,NULL,100,NULL,'OD12-CE',1),(39,1,1,4,378,10,5,1,1,10,4,8,'Technician Certificate in Civil Engineering(TC-CE)',1,1,NULL,NULL,100,NULL,'OD12-CE',2),(40,2,1,4,378,10,5,1,1,10,4,8,'Technician Certificate in Civil Engineering(TC-CE)',1,1,NULL,NULL,100,NULL,'OD12-CE',2),(41,1,1,3,377,10,5,1,1,12,3,8,'Ordinary Diploma in Civil Engineering(OD-CE)',1,1,NULL,NULL,100,NULL,'OD12-CE',3),(42,2,1,3,377,10,5,1,1,12,3,8,'Ordinary Diploma in Civil Engineering(OD-CE)',1,1,NULL,NULL,100,NULL,'OD12-CE',3),(43,1,1,10,382,10,5,1,1,11,8,8,'General Course in Civil Engineering(GC-CE)',1,1,NULL,NULL,100,NULL,'GC12-CE',1),(44,2,1,10,382,10,5,1,1,11,8,8,'General Course in Civil Engineering(GC-CE)',1,1,NULL,NULL,100,NULL,'GC12-CE',1),(45,1,1,10,381,10,5,1,1,15,7,10,'Higher Diploma - 01 in Civil Engineering(HD01-CE)',1,1,NULL,NULL,100,NULL,'BENG12-CE',1),(46,2,1,10,381,10,5,1,1,15,7,10,'Higher Diploma - 01 in Civil Engineering(HD01-CE)',1,1,NULL,NULL,100,NULL,'BENG12-CE',1),(47,3,1,4,383,10,5,1,1,14,9,9,'Higher Diploma - 02 in Civil Engineering(HD02-CE)',1,1,NULL,NULL,100,NULL,'BENG12-CE',2),(48,4,1,4,383,10,5,1,1,14,9,9,'Higher Diploma - 02 in Civil Engineering(HD02-CE)',1,1,NULL,NULL,100,NULL,'BENG12-CE',2),(49,1,1,3,380,10,5,1,1,2,6,8,'Bachelor Degree in Civil Engineering(BENG-CE)',1,1,NULL,NULL,100,NULL,'BENG12-CE',3),(50,2,1,3,380,10,5,1,1,2,6,8,'Bachelor Degree in Civil Engineering(BENG-CE)',1,1,NULL,NULL,100,NULL,'BENG12-CE',3);
/*!40000 ALTER TABLE `cis_student_class_stream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_edbackground`
--

DROP TABLE IF EXISTS `cis_student_edbackground`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_edbackground` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `index_id` varchar(45) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `year_completed` date DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subjects` text,
  `attachment` varchar(255) DEFAULT NULL,
  `certificate_award` varchar(100) DEFAULT NULL,
  `course` varchar(120) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `allow_edit` int(11) NOT NULL DEFAULT '0',
  `country` varchar(60) NOT NULL,
  PRIMARY KEY (`id`,`student_id`),
  UNIQUE KEY `student_inex` (`index_id`,`student_id`),
  KEY `fk_cis_student_edbackground_cis_student_registration_id1_idx` (`student_id`),
  CONSTRAINT `fk_cis_student_edbackground_cis_student_registration_id1` FOREIGN KEY (`student_id`) REFERENCES `cis_student_registration_id` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_edbackground`
--

LOCK TABLES `cis_student_edbackground` WRITE;
/*!40000 ALTER TABLE `cis_student_edbackground` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_student_edbackground` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_payments_account_ledger`
--

DROP TABLE IF EXISTS `cis_student_payments_account_ledger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_payments_account_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `registration_id` varchar(45) NOT NULL DEFAULT '',
  `student_details_id` int(11) NOT NULL DEFAULT '0',
  `academic_years_id` int(11) DEFAULT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `amount_type` int(1) DEFAULT NULL,
  `item` varchar(45) DEFAULT NULL,
  `transaction_date` varchar(45) DEFAULT NULL,
  `source_type_id` int(11) DEFAULT NULL,
  `comments` text,
  `file_id` blob,
  `reference_id` varchar(100) NOT NULL,
  `service_charge_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`student_id`,`registration_id`,`student_details_id`),
  UNIQUE KEY `reference_id_source_type_id_index` (`reference_id`,`source_type_id`),
  UNIQUE KEY `transaction_number_index` (`transaction_number`),
  KEY `fk_cis_student_payments_account_ledger_cis_student_registra_idx` (`student_id`,`registration_id`,`student_details_id`),
  KEY `fk_cis_student_payments_account_ledger_cis_college_academic_idx` (`academic_years_id`),
  CONSTRAINT `fk_cis_student_payments_account_ledger_cis_college_academic_y1` FOREIGN KEY (`academic_years_id`) REFERENCES `cis_college_academic_years` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_student_payments_account_ledger_cis_student_registrati1` FOREIGN KEY (`student_id`, `registration_id`, `student_details_id`) REFERENCES `cis_student_registration_id` (`id`, `registration_number`, `details_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=621 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_payments_account_ledger`
--

LOCK TABLES `cis_student_payments_account_ledger` WRITE;
/*!40000 ALTER TABLE `cis_student_payments_account_ledger` DISABLE KEYS */;
INSERT INTO `cis_student_payments_account_ledger` VALUES (161,161,'1401601320590',83,3,'14-07010301-0161',675000,2,'class-enroll','2014-11-27 22:05:02',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0161',1),(162,161,'1401601320590',83,3,'14-07010302-0161',625000,2,'class-enroll','2014-11-27 22:05:02',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0161',1),(163,162,'1401601320608',85,3,'14-07010301-0162',675000,2,'class-enroll','2014-11-27 22:09:37',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0162',1),(164,162,'1401601320608',85,3,'14-07010302-0162',625000,2,'class-enroll','2014-11-27 22:09:37',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0162',1),(165,163,'1401601320632',86,3,'14-07010301-0163',675000,2,'class-enroll','2014-11-27 22:09:37',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0163',1),(166,163,'1401601320632',86,3,'14-07010302-0163',625000,2,'class-enroll','2014-11-27 22:09:37',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0163',1),(167,164,'1401601320640',87,3,'14-07010301-0164',675000,2,'class-enroll','2014-11-27 22:09:37',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0164',1),(168,164,'1401601320640',87,3,'14-07010302-0164',625000,2,'class-enroll','2014-11-27 22:09:37',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0164',1),(169,165,'1401601320657',88,3,'14-07010301-0165',675000,2,'class-enroll','2014-11-27 22:09:37',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0165',1),(170,165,'1401601320657',88,3,'14-07010302-0165',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0165',1),(171,166,'1401601320665',89,3,'14-07010301-0166',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0166',1),(172,166,'1401601320665',89,3,'14-07010302-0166',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0166',1),(173,167,'1401601320673',90,3,'14-07010301-0167',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0167',1),(174,167,'1401601320673',90,3,'14-07010302-0167',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0167',1),(175,168,'1401601320681',91,3,'14-07010301-0168',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0168',1),(176,168,'1401601320681',91,3,'14-07010302-0168',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0168',1),(177,169,'1401601320699',92,3,'14-07010301-0169',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0169',1),(178,169,'1401601320699',92,3,'14-07010302-0169',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0169',1),(179,170,'1401601320707',93,3,'14-07010301-0170',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0170',1),(180,170,'1401601320707',93,3,'14-07010302-0170',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0170',1),(181,171,'1401601320715',94,3,'14-07010301-0171',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0171',1),(182,171,'1401601320715',94,3,'14-07010302-0171',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0171',1),(183,172,'1401601310724',95,3,'14-07010301-0172',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0172',1),(184,172,'1401601310724',95,3,'14-07010302-0172',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0172',1),(185,173,'1401601310732',96,3,'14-07010301-0173',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0173',1),(186,173,'1401601310732',96,3,'14-07010302-0173',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0173',1),(187,174,'1401601310740',97,3,'14-07010301-0174',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0174',1),(188,174,'1401601310740',97,3,'14-07010302-0174',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0174',1),(189,175,'1401601320756',98,3,'14-07010301-0175',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0175',1),(190,175,'1401601320756',98,3,'14-07010302-0175',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0175',1),(191,176,'1401601320764',99,3,'14-07010301-0176',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0176',1),(192,176,'1401601320764',99,3,'14-07010302-0176',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0176',1),(193,177,'1401601310773',100,3,'14-07010301-0177',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0177',1),(194,177,'1401601310773',100,3,'14-07010302-0177',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0177',1),(195,178,'1401601320780',101,3,'14-07010301-0178',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0178',1),(196,178,'1401601320780',101,3,'14-07010302-0178',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0178',1),(197,179,'1401601320798',102,3,'14-07010301-0179',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0179',1),(198,179,'1401601320798',102,3,'14-07010302-0179',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0179',1),(199,180,'1401601310807',103,3,'14-07010301-0180',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0180',1),(200,180,'1401601310807',103,3,'14-07010302-0180',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0180',1),(201,181,'1401601320814',104,3,'14-07010301-0181',675000,2,'class-enroll','2014-11-27 22:09:38',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0181',1),(202,181,'1401601320814',104,3,'14-07010302-0181',625000,2,'class-enroll','2014-11-27 22:09:38',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0181',1),(203,182,'1401601310823',105,3,'14-07010301-0182',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0182',1),(204,182,'1401601310823',105,3,'14-07010302-0182',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0182',1),(205,183,'1401601320830',106,3,'14-07010301-0183',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0183',1),(206,183,'1401601320830',106,3,'14-07010302-0183',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0183',1),(207,184,'1401601320848',107,3,'14-07010301-0184',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0184',1),(208,184,'1401601320848',107,3,'14-07010302-0184',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0184',1),(209,185,'1401601320855',108,3,'14-07010301-0185',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0185',1),(210,185,'1401601320855',108,3,'14-07010302-0185',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0185',1),(211,186,'1401601320863',109,3,'14-07010301-0186',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0186',1),(212,186,'1401601320863',109,3,'14-07010302-0186',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0186',1),(213,187,'1401601320871',110,3,'14-07010301-0187',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0187',1),(214,187,'1401601320871',110,3,'14-07010302-0187',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0187',1),(215,188,'1401601320889',111,3,'14-07010301-0188',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0188',1),(216,188,'1401601320889',111,3,'14-07010302-0188',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0188',1),(217,189,'1401601320897',112,3,'14-07010301-0189',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0189',1),(218,189,'1401601320897',112,3,'14-07010302-0189',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0189',1),(219,190,'1401601320905',113,3,'14-07010301-0190',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0190',1),(220,190,'1401601320905',113,3,'14-07010302-0190',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0190',1),(221,191,'1401601320913',114,3,'14-07010301-0191',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0191',1),(222,191,'1401601320913',114,3,'14-07010302-0191',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0191',1),(223,192,'1401601310922',115,3,'14-07010301-0192',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0192',1),(224,192,'1401601310922',115,3,'14-07010302-0192',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0192',1),(225,193,'1401601310930',116,3,'14-07010301-0193',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0193',1),(226,193,'1401601310930',116,3,'14-07010302-0193',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0193',1),(227,194,'1401601320947',117,3,'14-07010301-0194',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0194',1),(228,194,'1401601320947',117,3,'14-07010302-0194',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0194',1),(229,195,'1401601320954',118,3,'14-07010301-0195',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0195',1),(230,195,'1401601320954',118,3,'14-07010302-0195',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0195',1),(231,196,'1401601320962',119,3,'14-07010301-0196',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0196',1),(232,196,'1401601320962',119,3,'14-07010302-0196',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0196',1),(233,197,'1401601320970',120,3,'14-07010301-0197',675000,2,'class-enroll','2014-11-27 22:09:39',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0197',1),(234,197,'1401601320970',120,3,'14-07010302-0197',625000,2,'class-enroll','2014-11-27 22:09:39',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0197',1),(235,198,'1401601310989',121,3,'14-07010301-0198',675000,2,'class-enroll','2014-11-27 22:09:40',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0198',1),(236,198,'1401601310989',121,3,'14-07010302-0198',625000,2,'class-enroll','2014-11-27 22:09:40',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0198',1),(237,199,'1401601320996',122,3,'14-07010301-0199',675000,2,'class-enroll','2014-11-27 22:09:40',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0199',1),(238,199,'1401601320996',122,3,'14-07010302-0199',625000,2,'class-enroll','2014-11-27 22:09:40',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0199',1),(239,200,'1401601321002',123,3,'14-07010301-0200',675000,2,'class-enroll','2014-11-27 22:09:40',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0200',1),(240,200,'1401601321002',123,3,'14-07010302-0200',625000,2,'class-enroll','2014-11-27 22:09:40',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0200',1),(241,201,'1401601311011',124,3,'14-07010301-0201',675000,2,'class-enroll','2014-11-27 22:09:40',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0201',1),(242,201,'1401601311011',124,3,'14-07010302-0201',625000,2,'class-enroll','2014-11-27 22:09:40',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0201',1),(243,202,'1401601321028',125,3,'14-07010301-0202',675000,2,'class-enroll','2014-11-27 22:09:40',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0202',1),(244,202,'1401601321028',125,3,'14-07010302-0202',625000,2,'class-enroll','2014-11-27 22:09:40',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0202',1),(245,203,'1401601321036',126,3,'14-07010301-0203',675000,2,'class-enroll','2014-11-27 22:09:40',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0203',1),(246,203,'1401601321036',126,3,'14-07010302-0203',625000,2,'class-enroll','2014-11-27 22:09:40',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0203',1),(247,204,'1401801420307',127,3,'14-08010301-0204',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0204',1),(248,204,'1401801420307',127,3,'14-08010302-0204',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0204',1),(249,205,'1401801410316',128,3,'14-08010301-0205',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0205',1),(250,205,'1401801410316',128,3,'14-08010302-0205',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0205',1),(251,206,'1401801420323',129,3,'14-08010301-0206',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0206',1),(252,206,'1401801420323',129,3,'14-08010302-0206',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0206',1),(253,207,'1401801420331',130,3,'14-08010301-0207',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0207',1),(254,207,'1401801420331',130,3,'14-08010302-0207',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0207',1),(255,208,'1401801420349',131,3,'14-08010301-0208',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0208',1),(256,208,'1401801420349',131,3,'14-08010302-0208',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0208',1),(257,209,'1401801410357',132,3,'14-08010301-0209',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0209',1),(258,209,'1401801410357',132,3,'14-08010302-0209',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0209',1),(259,210,'1401801420364',133,3,'14-08010301-0210',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0210',1),(260,210,'1401801420364',133,3,'14-08010302-0210',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0210',1),(261,211,'1401801420372',134,3,'14-08010301-0211',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0211',1),(262,211,'1401801420372',134,3,'14-08010302-0211',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0211',1),(263,212,'1401801420380',135,3,'14-08010301-0212',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0212',1),(264,212,'1401801420380',135,3,'14-08010302-0212',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0212',1),(265,213,'1401801420398',136,3,'14-08010301-0213',675000,2,'class-enroll','2014-11-27 22:09:40',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0213',1),(266,213,'1401801420398',136,3,'14-08010302-0213',625000,2,'class-enroll','2014-11-27 22:09:40',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0213',1),(267,214,'1401801420406',137,3,'14-08010301-0214',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0214',1),(268,214,'1401801420406',137,3,'14-08010302-0214',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0214',1),(269,215,'1401801420414',138,3,'14-08010301-0215',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0215',1),(270,215,'1401801420414',138,3,'14-08010302-0215',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0215',1),(271,216,'1401801420422',139,3,'14-08010301-0216',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0216',1),(272,216,'1401801420422',139,3,'14-08010302-0216',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0216',1),(273,217,'1401801420430',140,3,'14-08010301-0217',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0217',1),(274,217,'1401801420430',140,3,'14-08010302-0217',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0217',1),(275,218,'1401801420448',141,3,'14-08010301-0218',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0218',1),(276,218,'1401801420448',141,3,'14-08010302-0218',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0218',1),(277,219,'1401801420455',142,3,'14-08010301-0219',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0219',1),(278,219,'1401801420455',142,3,'14-08010302-0219',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0219',1),(279,220,'1401801420463',143,3,'14-08010301-0220',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0220',1),(280,220,'1401801420463',143,3,'14-08010302-0220',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0220',1),(281,221,'1401801420471',144,3,'14-08010301-0221',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0221',1),(282,221,'1401801420471',144,3,'14-08010302-0221',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0221',1),(283,222,'1401801420489',145,3,'14-08010301-0222',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0222',1),(284,222,'1401801420489',145,3,'14-08010302-0222',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0222',1),(285,223,'1401801420497',146,3,'14-08010301-0223',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0223',1),(286,223,'1401801420497',146,3,'14-08010302-0223',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0223',1),(287,224,'1401801410506',147,3,'14-08010301-0224',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0224',1),(288,224,'1401801410506',147,3,'14-08010302-0224',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0224',1),(289,225,'1401801420513',148,3,'14-08010301-0225',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0225',1),(290,225,'1401801420513',148,3,'14-08010302-0225',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0225',1),(291,226,'1401801420521',149,3,'14-08010301-0226',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0226',1),(292,226,'1401801420521',149,3,'14-08010302-0226',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0226',1),(293,227,'1401801420539',150,3,'14-08010301-0227',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0227',1),(294,227,'1401801420539',150,3,'14-08010302-0227',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0227',1),(295,228,'1401801420547',151,3,'14-08010301-0228',675000,2,'class-enroll','2014-11-27 22:09:41',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0228',1),(296,228,'1401801420547',151,3,'14-08010302-0228',625000,2,'class-enroll','2014-11-27 22:09:41',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0228',1),(297,229,'1401801420554',152,3,'14-08010301-0229',675000,2,'class-enroll','2014-11-27 22:09:42',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0229',1),(298,229,'1401801420554',152,3,'14-08010302-0229',625000,2,'class-enroll','2014-11-27 22:09:42',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0229',1),(299,230,'1401801420562',153,3,'14-08010301-0230',675000,2,'class-enroll','2014-11-27 22:09:42',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0230',1),(300,230,'1401801420562',153,3,'14-08010302-0230',625000,2,'class-enroll','2014-11-27 22:09:42',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0230',1),(301,231,'1401801420570',154,3,'14-08010301-0231',675000,2,'class-enroll','2014-11-27 22:09:42',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0231',1),(302,231,'1401801420570',154,3,'14-08010302-0231',625000,2,'class-enroll','2014-11-27 22:09:42',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0231',1),(303,232,'1401801410589',155,3,'14-08010301-0232',675000,2,'class-enroll','2014-11-27 22:09:42',3,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 1','','14-08010301-0232',1),(304,232,'1401801410589',155,3,'14-08010302-0232',625000,2,'class-enroll','2014-11-27 22:09:42',4,'Fee Charge for: Student Registrations and Class Enrollment Class: GC14-COE Year :2014/2015 Semester : Semester 2','','14-08010302-0232',1),(305,233,'1401601321044',156,3,'14-07010301-0233',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0233',1),(306,233,'1401601321044',156,3,'14-07010302-0233',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0233',1),(307,234,'1401601321051',157,3,'14-07010301-0234',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0234',1),(308,234,'1401601321051',157,3,'14-07010302-0234',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0234',1),(309,235,'1401601321069',158,3,'14-07010301-0235',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0235',1),(310,235,'1401601321069',158,3,'14-07010302-0235',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0235',1),(311,236,'1401601321077',159,3,'14-07010301-0236',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0236',1),(312,236,'1401601321077',159,3,'14-07010302-0236',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0236',1),(313,237,'1401601321085',160,3,'14-07010301-0237',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0237',1),(314,237,'1401601321085',160,3,'14-07010302-0237',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0237',1),(315,238,'1401601311094',161,3,'14-07010301-0238',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0238',1),(316,238,'1401601311094',161,3,'14-07010302-0238',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0238',1),(317,239,'1401601321101',162,3,'14-07010301-0239',675000,2,'class-enroll','2014-11-27 22:09:42',5,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 1','','14-07010301-0239',1),(318,239,'1401601321101',162,3,'14-07010302-0239',625000,2,'class-enroll','2014-11-27 22:09:42',6,'Fee Charge for: Student Registrations and Class Enrollment Class: BENG14-COE Year :2014/2015 Semester : Semester 2','','14-07010302-0239',1),(319,172,'1401601310724',95,3,'B32M0123101',350000,1,'bank','2014-12-01 02:41:37',1,'Paid at: Azikiwe Bank For Fees on 28-Nov-2014: <br> Received on : 30-Nov-2014 Added Manually on 01-Dec-2014,02:41 pm','0','B32M0123101',NULL),(320,172,'1401601310724',95,3,'B15P0355002',585500,1,'bank','2014-12-01 02:43:12',2,'Paid at: Azikiwe Bank For Tuition fees on 28-Nov-2014: <br> Received on : 30-Nov-2014 Added Manually on 01-Dec-2014,02:43 pm','0','B15P0355002',NULL),(321,172,'1401601310724',95,3,'F13S3238301',570500,1,'bank','2014-12-03 08:50:21',4,'Paid at: Holland House Bank For T/fee on 28-Nov-2014: <br> Received on : 30-Nov-2014 Added Manually on 03-Dec-2014,08:50 am','0','F13S3238301',NULL),(322,172,'1401601310724',95,3,'F33M0232301',650000,1,'bank','2014-12-03 09:10:20',3,'Paid at: Holland House Bank For Fees on 28-Nov-2014: <br> Received on : 30-Nov-2014 Added Manually on 03-Dec-2014,09:10 am','0','F33M0232301',NULL),(323,173,'1401601310732',96,3,'J19K0853601',400,1,'bank','2014-12-03 09:19:19',5,'Paid at: Lumumba Bank For Tution fee on 28-Nov-2014: <br> Received on : 30-Nov-2014 Added Manually on 03-Dec-2014,09:19 am','0','J19K0853601',NULL),(324,240,'1401301120019',163,3,'14-05010301-0240',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0240',1),(325,240,'1401301120019',163,3,'14-05010302-0240',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0240',1),(326,241,'1401301120027',164,3,'14-05010301-0241',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0241',1),(327,241,'1401301120027',164,3,'14-05010302-0241',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0241',1),(328,242,'1401301120035',165,3,'14-05010301-0242',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0242',1),(329,242,'1401301120035',165,3,'14-05010302-0242',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0242',1),(330,243,'1401301120043',166,3,'14-05010301-0243',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0243',1),(331,243,'1401301120043',166,3,'14-05010302-0243',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0243',1),(332,244,'1401301120050',167,3,'14-05010301-0244',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0244',1),(333,244,'1401301120050',167,3,'14-05010302-0244',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0244',1),(334,245,'1401301120068',168,3,'14-05010301-0245',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0245',1),(335,245,'1401301120068',168,3,'14-05010302-0245',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0245',1),(336,246,'1401301120076',169,3,'14-05010301-0246',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0246',1),(337,246,'1401301120076',169,3,'14-05010302-0246',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0246',1),(338,247,'1401301120084',170,3,'14-05010301-0247',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0247',1),(339,247,'1401301120084',170,3,'14-05010302-0247',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0247',1),(340,248,'1401301120092',171,3,'14-05010301-0248',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0248',1),(341,248,'1401301120092',171,3,'14-05010302-0248',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0248',1),(342,249,'1401301120100',172,3,'14-05010301-0249',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0249',1),(343,249,'1401301120100',172,3,'14-05010302-0249',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0249',1),(344,250,'1401301120118',173,3,'14-05010301-0250',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0250',1),(345,250,'1401301120118',173,3,'14-05010302-0250',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0250',1),(346,251,'1401301120126',174,3,'14-05010301-0251',535000,2,'class-enroll','2014-12-18 00:37:11',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0251',1),(347,251,'1401301120126',174,3,'14-05010302-0251',425000,2,'class-enroll','2014-12-18 00:37:11',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0251',1),(348,252,'1401301120134',175,3,'14-05010301-0252',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0252',1),(349,252,'1401301120134',175,3,'14-05010302-0252',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0252',1),(350,253,'1401301120142',176,3,'14-05010301-0253',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0253',1),(351,253,'1401301120142',176,3,'14-05010302-0253',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0253',1),(352,254,'1401301120159',177,3,'14-05010301-0254',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0254',1),(353,254,'1401301120159',177,3,'14-05010302-0254',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0254',1),(354,255,'1401301120167',178,3,'14-05010301-0255',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0255',1),(355,255,'1401301120167',178,3,'14-05010302-0255',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0255',1),(356,256,'1401301120175',179,3,'14-05010301-0256',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0256',1),(357,256,'1401301120175',179,3,'14-05010302-0256',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0256',1),(358,257,'1401301120183',180,3,'14-05010301-0257',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0257',1),(359,257,'1401301120183',180,3,'14-05010302-0257',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0257',1),(360,258,'1401301110192',181,3,'14-05010301-0258',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0258',1),(361,258,'1401301110192',181,3,'14-05010302-0258',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0258',1),(362,259,'1401301120209',182,3,'14-05010301-0259',535000,2,'class-enroll','2014-12-18 00:37:12',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0259',1),(363,259,'1401301120209',182,3,'14-05010302-0259',425000,2,'class-enroll','2014-12-18 00:37:12',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0259',1),(364,260,'1401301120217',183,3,'14-05010301-0260',535000,2,'class-enroll','2014-12-18 00:37:13',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0260',1),(365,260,'1401301120217',183,3,'14-05010302-0260',425000,2,'class-enroll','2014-12-18 00:37:13',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0260',1),(366,261,'1401301120225',184,3,'14-05010301-0261',535000,2,'class-enroll','2014-12-18 00:37:13',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0261',1),(367,261,'1401301120225',184,3,'14-05010302-0261',425000,2,'class-enroll','2014-12-18 00:37:13',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0261',1),(368,262,'1401301120233',185,3,'14-05010301-0262',535000,2,'class-enroll','2014-12-18 00:37:13',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0262',1),(369,262,'1401301120233',185,3,'14-05010302-0262',425000,2,'class-enroll','2014-12-18 00:37:13',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0262',1),(370,263,'1401301120241',186,3,'14-05010301-0263',535000,2,'class-enroll','2014-12-18 00:37:13',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0263',1),(371,263,'1401301120241',186,3,'14-05010302-0263',425000,2,'class-enroll','2014-12-18 00:37:13',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0263',1),(372,264,'1401301120258',187,3,'14-05010301-0264',535000,2,'class-enroll','2014-12-18 00:37:13',1,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 1','','14-05010301-0264',1),(373,264,'1401301120258',187,3,'14-05010302-0264',425000,2,'class-enroll','2014-12-18 00:37:13',2,'Fee Charge for: Student Registrations and Class Enrollment Class: OD14-COE Year :2014/2015 Semester : Semester 2','','14-05010302-0264',1),(374,385,'110121191230',308,3,'X11P0070901',72800,1,'bank','2014-11-28 00:00:00',19,'Paid at: Vijana Bank For Fees on 28-Nov-2014: <br> Received on : 30-Nov-2014','','X11P0070901',NULL),(375,269,'120121448627',192,3,'14-03100301-0269',520000,2,'class-enroll','2014-12-18 13:13:09',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0269',1),(376,269,'120121448627',192,3,'14-03100302-0269',425000,2,'class-enroll','2014-12-18 13:13:09',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0269',1),(377,270,'120121411167',193,3,'14-03100301-0270',520000,2,'class-enroll','2014-12-18 13:13:09',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0270',1),(378,270,'120121411167',193,3,'14-03100302-0270',425000,2,'class-enroll','2014-12-18 13:13:09',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0270',1),(379,275,'120121421139',198,3,'14-03100301-0275',520000,2,'class-enroll','2014-12-18 13:13:11',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0275',1),(380,275,'120121421139',198,3,'14-03100302-0275',425000,2,'class-enroll','2014-12-18 13:13:11',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0275',1),(381,277,'120121461117',200,3,'14-03100301-0277',520000,2,'class-enroll','2014-12-18 13:13:12',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0277',1),(382,277,'120121461117',200,3,'14-03100302-0277',425000,2,'class-enroll','2014-12-18 13:13:12',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0277',1),(383,278,'120121438631',201,3,'14-03100301-0278',520000,2,'class-enroll','2014-12-18 13:13:13',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0278',1),(384,278,'120121438631',201,3,'14-03100302-0278',425000,2,'class-enroll','2014-12-18 13:13:13',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0278',1),(385,279,'501013152',202,3,'14-03100301-0279',520000,2,'class-enroll','2014-12-18 13:13:13',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0279',1),(386,279,'501013152',202,3,'14-03100302-0279',425000,2,'class-enroll','2014-12-18 13:13:13',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0279',1),(387,284,'120121461099',207,3,'14-03100301-0284',520000,2,'class-enroll','2014-12-18 13:13:15',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0284',1),(388,284,'120121461099',207,3,'14-03100302-0284',425000,2,'class-enroll','2014-12-18 13:13:15',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0284',1),(389,287,'120121478671',210,3,'14-03100301-0287',520000,2,'class-enroll','2014-12-18 13:13:17',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0287',1),(390,287,'120121478671',210,3,'14-03100302-0287',425000,2,'class-enroll','2014-12-18 13:13:17',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0287',1),(391,292,'110121438047',215,3,'14-03100301-0292',520000,2,'class-enroll','2014-12-18 13:13:18',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0292',1),(392,292,'110121438047',215,3,'14-03100302-0292',425000,2,'class-enroll','2014-12-18 13:13:18',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0292',1),(393,293,'120121421153',216,3,'14-03100301-0293',520000,2,'class-enroll','2014-12-18 13:13:19',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0293',1),(394,293,'120121421153',216,3,'14-03100302-0293',425000,2,'class-enroll','2014-12-18 13:13:19',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0293',1),(395,294,'120121472339',217,3,'14-03100301-0294',520000,2,'class-enroll','2014-12-18 13:13:19',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0294',1),(396,294,'120121472339',217,3,'14-03100302-0294',425000,2,'class-enroll','2014-12-18 13:13:19',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0294',1),(397,295,'120121451107',218,3,'14-03100301-0295',520000,2,'class-enroll','2014-12-18 13:13:20',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0295',1),(398,295,'120121451107',218,3,'14-03100302-0295',425000,2,'class-enroll','2014-12-18 13:13:20',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0295',1),(399,296,'120121401010',219,3,'14-03100301-0296',520000,2,'class-enroll','2014-12-18 13:13:20',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0296',1),(400,296,'120121401010',219,3,'14-03100302-0296',425000,2,'class-enroll','2014-12-18 13:13:20',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0296',1),(401,297,'120121441135',220,3,'14-03100301-0297',520000,2,'class-enroll','2014-12-18 13:13:21',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0297',1),(402,297,'120121441135',220,3,'14-03100302-0297',425000,2,'class-enroll','2014-12-18 13:13:21',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0297',1),(403,299,'120121448707',222,3,'14-03100301-0299',520000,2,'class-enroll','2014-12-18 13:13:22',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0299',1),(404,299,'120121448707',222,3,'14-03100302-0299',425000,2,'class-enroll','2014-12-18 13:13:22',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0299',1),(405,303,'120121491161',226,3,'14-03100301-0303',520000,2,'class-enroll','2014-12-18 13:13:24',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0303',1),(406,303,'120121491161',226,3,'14-03100302-0303',425000,2,'class-enroll','2014-12-18 13:13:24',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0303',1),(407,304,'120121411006',227,3,'14-03100301-0304',520000,2,'class-enroll','2014-12-18 13:13:25',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0304',1),(408,304,'120121411006',227,3,'14-03100302-0304',425000,2,'class-enroll','2014-12-18 13:13:25',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0304',1),(409,305,'120121431026',228,3,'14-03100301-0305',520000,2,'class-enroll','2014-12-18 13:13:25',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0305',1),(410,305,'120121431026',228,3,'14-03100302-0305',425000,2,'class-enroll','2014-12-18 13:13:25',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0305',1),(411,306,'901016033',229,3,'14-03100301-0306',520000,2,'class-enroll','2014-12-18 13:13:26',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0306',1),(412,306,'901016033',229,3,'14-03100302-0306',425000,2,'class-enroll','2014-12-18 13:13:26',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0306',1),(413,308,'120121448689',231,3,'14-03100301-0308',520000,2,'class-enroll','2014-12-18 13:13:26',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0308',1),(414,308,'120121448689',231,3,'14-03100302-0308',425000,2,'class-enroll','2014-12-18 13:13:27',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0308',1),(415,309,'120121451008',232,3,'14-03100301-0309',520000,2,'class-enroll','2014-12-18 13:13:27',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0309',1),(416,309,'120121451008',232,3,'14-03100302-0309',425000,2,'class-enroll','2014-12-18 13:13:27',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0309',1),(417,313,'601013605',236,3,'14-03100301-0313',520000,2,'class-enroll','2014-12-18 13:13:29',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0313',1),(418,313,'601013605',236,3,'14-03100302-0313',425000,2,'class-enroll','2014-12-18 13:13:29',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0313',1),(419,316,'110121461226',239,3,'14-03100301-0316',520000,2,'class-enroll','2014-12-18 13:13:30',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0316',1),(420,316,'110121461226',239,3,'14-03100302-0316',425000,2,'class-enroll','2014-12-18 13:13:30',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0316',1),(421,318,'120121401091',241,3,'14-03100301-0318',520000,2,'class-enroll','2014-12-18 13:13:31',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0318',1),(422,318,'120121401091',241,3,'14-03100302-0318',425000,2,'class-enroll','2014-12-18 13:13:31',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0318',1),(423,320,'120121401034',243,3,'14-03100301-0320',520000,2,'class-enroll','2014-12-18 13:13:32',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0320',1),(424,320,'120121401034',243,3,'14-03100302-0320',425000,2,'class-enroll','2014-12-18 13:13:32',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0320',1),(425,321,'120121451145',244,3,'14-03100301-0321',520000,2,'class-enroll','2014-12-18 13:13:33',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0321',1),(426,321,'120121451145',244,3,'14-03100302-0321',425000,2,'class-enroll','2014-12-18 13:13:33',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0321',1),(427,325,'110121458043',248,3,'14-03100301-0325',520000,2,'class-enroll','2014-12-18 13:13:34',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0325',1),(428,325,'110121458043',248,3,'14-03100302-0325',425000,2,'class-enroll','2014-12-18 13:13:34',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0325',1),(429,326,'110121438443',249,3,'14-03100301-0326',520000,2,'class-enroll','2014-12-18 13:13:35',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0326',1),(430,326,'110121438443',249,3,'14-03100302-0326',425000,2,'class-enroll','2014-12-18 13:13:35',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0326',1),(431,327,'120121421115',250,3,'14-03100301-0327',520000,2,'class-enroll','2014-12-18 13:13:35',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0327',1),(432,327,'120121421115',250,3,'14-03100302-0327',425000,2,'class-enroll','2014-12-18 13:13:35',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0327',1),(433,328,'120121481175',251,3,'14-03100301-0328',520000,2,'class-enroll','2014-12-18 13:13:36',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0328',1),(434,328,'120121481175',251,3,'14-03100302-0328',425000,2,'class-enroll','2014-12-18 13:13:36',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0328',1),(435,329,'120121491081',252,3,'14-03100301-0329',520000,2,'class-enroll','2014-12-18 13:13:36',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0329',1),(436,329,'120121491081',252,3,'14-03100302-0329',425000,2,'class-enroll','2014-12-18 13:13:36',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0329',1),(437,330,'120121471004',253,3,'14-03100301-0330',520000,2,'class-enroll','2014-12-18 13:13:37',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0330',1),(438,330,'120121471004',253,3,'14-03100302-0330',425000,2,'class-enroll','2014-12-18 13:13:37',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0330',1),(439,331,'120121441036',254,3,'14-03100301-0331',520000,2,'class-enroll','2014-12-18 13:13:37',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0331',1),(440,331,'120121441036',254,3,'14-03100302-0331',425000,2,'class-enroll','2014-12-18 13:13:37',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0331',1),(441,332,'120121411087',255,3,'14-03100301-0332',520000,2,'class-enroll','2014-12-18 13:13:38',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0332',1),(442,332,'120121411087',255,3,'14-03100302-0332',425000,2,'class-enroll','2014-12-18 13:13:38',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0332',1),(443,333,'100101P8000',256,3,'14-03100301-0333',520000,2,'class-enroll','2014-12-18 13:13:38',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0333',1),(444,333,'100101P8000',256,3,'14-03100302-0333',425000,2,'class-enroll','2014-12-18 13:13:38',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0333',1),(445,334,'120121491147',257,3,'14-03100301-0334',520000,2,'class-enroll','2014-12-18 13:13:39',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0334',1),(446,334,'120121491147',257,3,'14-03100302-0334',425000,2,'class-enroll','2014-12-18 13:13:39',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0334',1),(447,335,'120121431149',258,3,'14-03100301-0335',520000,2,'class-enroll','2014-12-18 13:13:39',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0335',1),(448,335,'120121431149',258,3,'14-03100302-0335',425000,2,'class-enroll','2014-12-18 13:13:39',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0335',1),(449,336,'120121421097',259,3,'14-03100301-0336',520000,2,'class-enroll','2014-12-18 13:13:40',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0336',1),(450,336,'120121421097',259,3,'14-03100302-0336',425000,2,'class-enroll','2014-12-18 13:13:40',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0336',1),(451,337,'110121428051',260,3,'14-03100301-0337',520000,2,'class-enroll','2014-12-18 13:13:40',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0337',1),(452,337,'110121428051',260,3,'14-03100302-0337',425000,2,'class-enroll','2014-12-18 13:13:41',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0337',1),(453,338,'120121431083',261,3,'14-03100301-0338',520000,2,'class-enroll','2014-12-18 13:13:41',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0338',1),(454,338,'120121431083',261,3,'14-03100302-0338',425000,2,'class-enroll','2014-12-18 13:13:41',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0338',1),(455,339,'120121431101',262,3,'14-03100301-0339',520000,2,'class-enroll','2014-12-18 13:13:42',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0339',1),(456,339,'120121431101',262,3,'14-03100302-0339',425000,2,'class-enroll','2014-12-18 13:13:42',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0339',1),(457,340,'120121401157',263,3,'14-03100301-0340',520000,2,'class-enroll','2014-12-18 13:13:42',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0340',1),(458,340,'120121401157',263,3,'14-03100302-0340',425000,2,'class-enroll','2014-12-18 13:13:42',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0340',1),(459,341,'120121471165',264,3,'14-03100301-0341',520000,2,'class-enroll','2014-12-18 13:13:43',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0341',1),(460,341,'120121471165',264,3,'14-03100302-0341',425000,2,'class-enroll','2014-12-18 13:13:43',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0341',1),(461,343,'120121478695',266,3,'14-03100301-0343',520000,2,'class-enroll','2014-12-18 13:13:44',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0343',1),(462,343,'120121478695',266,3,'14-03100302-0343',425000,2,'class-enroll','2014-12-18 13:13:44',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0343',1),(463,345,'120121401171',268,3,'14-03100301-0345',520000,2,'class-enroll','2014-12-18 13:13:45',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0345',1),(464,345,'120121401171',268,3,'14-03100302-0345',425000,2,'class-enroll','2014-12-18 13:13:45',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0345',1),(465,346,'120121411129',269,3,'14-03100301-0346',520000,2,'class-enroll','2014-12-18 13:13:46',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0346',1),(466,346,'120121411129',269,3,'14-03100302-0346',425000,2,'class-enroll','2014-12-18 13:13:46',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0346',1),(467,347,'120121411105',270,3,'14-03100301-0347',520000,2,'class-enroll','2014-12-18 13:13:46',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0347',1),(468,347,'120121411105',270,3,'14-03100302-0347',425000,2,'class-enroll','2014-12-18 13:13:46',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0347',1),(469,348,'120121478633',271,3,'14-03100301-0348',520000,2,'class-enroll','2014-12-18 13:13:47',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0348',1),(470,348,'120121478633',271,3,'14-03100302-0348',425000,2,'class-enroll','2014-12-18 13:13:47',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0348',1),(471,349,'120121408649',272,3,'14-03100301-0349',520000,2,'class-enroll','2014-12-18 13:13:47',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0349',1),(472,349,'120121408649',272,3,'14-03100302-0349',425000,2,'class-enroll','2014-12-18 13:13:47',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0349',1),(473,350,'120121432337',273,3,'14-03100301-0350',520000,2,'class-enroll','2014-12-18 13:13:49',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0350',1),(474,350,'120121432337',273,3,'14-03100302-0350',425000,2,'class-enroll','2014-12-18 13:13:49',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0350',1),(475,351,'120121468647',274,3,'14-03100301-0351',520000,2,'class-enroll','2014-12-18 13:13:50',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0351',1),(476,351,'120121468647',274,3,'14-03100302-0351',425000,2,'class-enroll','2014-12-18 13:13:50',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0351',1),(477,352,'120121468685',275,3,'14-03100301-0352',520000,2,'class-enroll','2014-12-18 13:13:52',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0352',1),(478,352,'120121468685',275,3,'14-03100302-0352',425000,2,'class-enroll','2014-12-18 13:13:52',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0352',1),(479,353,'120121448641',276,3,'14-03100301-0353',520000,2,'class-enroll','2014-12-18 13:13:53',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0353',1),(480,353,'120121448641',276,3,'14-03100302-0353',425000,2,'class-enroll','2014-12-18 13:13:53',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0353',1),(481,354,'120121438655',277,3,'14-03100301-0354',520000,2,'class-enroll','2014-12-18 13:13:54',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0354',1),(482,354,'120121438655',277,3,'14-03100302-0354',425000,2,'class-enroll','2014-12-18 13:13:54',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0354',1),(483,355,'120121438617',278,3,'14-03100301-0355',520000,2,'class-enroll','2014-12-18 13:13:55',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0355',1),(484,355,'120121438617',278,3,'14-03100302-0355',425000,2,'class-enroll','2014-12-18 13:13:55',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0355',1),(485,357,'120121458637',280,3,'14-03100301-0357',520000,2,'class-enroll','2014-12-18 13:13:56',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0357',1),(486,357,'120121458637',280,3,'14-03100302-0357',425000,2,'class-enroll','2014-12-18 13:13:56',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0357',1),(487,358,'120121468661',281,3,'14-03100301-0358',520000,2,'class-enroll','2014-12-18 13:13:58',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0358',1),(488,358,'120121468661',281,3,'14-03100302-0358',425000,2,'class-enroll','2014-12-18 13:13:58',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0358',1),(489,359,'110121488035',282,3,'14-03100301-0359',520000,2,'class-enroll','2014-12-18 13:13:58',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0359',1),(490,359,'110121488035',282,3,'14-03100302-0359',425000,2,'class-enroll','2014-12-18 13:13:59',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0359',1),(491,361,'120121408687',284,3,'14-03100301-0361',520000,2,'class-enroll','2014-12-18 13:13:59',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0361',1),(492,361,'120121408687',284,3,'14-03100302-0361',425000,2,'class-enroll','2014-12-18 13:14:00',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0361',1),(493,362,'120121418635',285,3,'14-03100301-0362',520000,2,'class-enroll','2014-12-18 13:14:00',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0362',1),(494,362,'120121418635',285,3,'14-03100302-0362',425000,2,'class-enroll','2014-12-18 13:14:00',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0362',1),(495,364,'120121441159',287,3,'14-03100301-0364',520000,2,'class-enroll','2014-12-18 13:14:01',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0364',1),(496,364,'120121441159',287,3,'14-03100302-0364',425000,2,'class-enroll','2014-12-18 13:14:01',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0364',1),(497,365,'110121471859',288,3,'14-03100301-0365',520000,2,'class-enroll','2014-12-18 13:14:02',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0365',1),(498,365,'110121471859',288,3,'14-03100302-0365',425000,2,'class-enroll','2014-12-18 13:14:02',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0365',1),(499,366,'120121478619',289,3,'14-03100301-0366',520000,2,'class-enroll','2014-12-18 13:14:02',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0366',1),(500,366,'120121478619',289,3,'14-03100302-0366',425000,2,'class-enroll','2014-12-18 13:14:02',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0366',1),(501,367,'120121488643',290,3,'14-03100301-0367',520000,2,'class-enroll','2014-12-18 13:14:03',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0367',1),(502,367,'120121488643',290,3,'14-03100302-0367',425000,2,'class-enroll','2014-12-18 13:14:03',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0367',1),(503,368,'120121468623',291,3,'14-03100301-0368',520000,2,'class-enroll','2014-12-18 13:14:03',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0368',1),(504,368,'120121468623',291,3,'14-03100302-0368',425000,2,'class-enroll','2014-12-18 13:14:03',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0368',1),(505,369,'120121498639',292,3,'14-03100301-0369',520000,2,'class-enroll','2014-12-18 13:14:04',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0369',1),(506,369,'120121498639',292,3,'14-03100302-0369',425000,2,'class-enroll','2014-12-18 13:14:04',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0369',1),(507,370,'120121498677',293,3,'14-03100301-0370',520000,2,'class-enroll','2014-12-18 13:14:05',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0370',1),(508,370,'120121498677',293,3,'14-03100302-0370',425000,2,'class-enroll','2014-12-18 13:14:05',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0370',1),(509,374,'120121418659',297,3,'14-03100301-0374',520000,2,'class-enroll','2014-12-18 13:14:06',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0374',1),(510,374,'120121418659',297,3,'14-03100302-0374',425000,2,'class-enroll','2014-12-18 13:14:06',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0374',1),(511,375,'100101P7307',298,3,'14-03100301-0375',520000,2,'class-enroll','2014-12-18 13:14:07',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0375',1),(512,375,'100101P7307',298,3,'14-03100302-0375',425000,2,'class-enroll','2014-12-18 13:14:07',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0375',1),(513,377,'120121428621',300,3,'14-03100301-0377',520000,2,'class-enroll','2014-12-18 13:14:08',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0377',1),(514,377,'120121428621',300,3,'14-03100302-0377',425000,2,'class-enroll','2014-12-18 13:14:08',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0377',1),(515,378,'120121488629',301,3,'14-03100301-0378',520000,2,'class-enroll','2014-12-18 13:14:09',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0378',1),(516,378,'120121488629',301,3,'14-03100302-0378',425000,2,'class-enroll','2014-12-18 13:14:09',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0378',1),(517,380,'120121498615',303,3,'14-03100301-0380',520000,2,'class-enroll','2014-12-18 13:14:10',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0380',1),(518,380,'120121498615',303,3,'14-03100302-0380',425000,2,'class-enroll','2014-12-18 13:14:10',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0380',1),(519,382,'120121408705',305,3,'14-03100301-0382',520000,2,'class-enroll','2014-12-18 13:14:11',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0382',1),(520,382,'120121408705',305,3,'14-03100302-0382',425000,2,'class-enroll','2014-12-18 13:14:11',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0382',1),(521,383,'120121488681',306,3,'14-03100301-0383',520000,2,'class-enroll','2014-12-18 13:14:11',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0383',1),(522,383,'120121488681',306,3,'14-03100302-0383',425000,2,'class-enroll','2014-12-18 13:14:12',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0383',1),(523,384,'120121478657',307,3,'14-03100301-0384',520000,2,'class-enroll','2014-12-18 13:14:12',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0384',1),(524,384,'120121478657',307,3,'14-03100302-0384',425000,2,'class-enroll','2014-12-18 13:14:12',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0384',1),(525,386,'120121458651',309,3,'14-03100301-0386',520000,2,'class-enroll','2014-12-18 13:14:13',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0386',1),(526,386,'120121458651',309,3,'14-03100302-0386',425000,2,'class-enroll','2014-12-18 13:14:13',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0386',1),(527,387,'110121438061',310,3,'14-03100301-0387',520000,2,'class-enroll','2014-12-18 13:14:14',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0387',1),(528,387,'110121438061',310,3,'14-03100302-0387',425000,2,'class-enroll','2014-12-18 13:14:14',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0387',1),(529,388,'120121488667',311,3,'14-03100301-0388',520000,2,'class-enroll','2014-12-18 13:14:15',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0388',1),(530,388,'120121488667',311,3,'14-03100302-0388',425000,2,'class-enroll','2014-12-18 13:14:15',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0388',1),(531,389,'120121482349',312,3,'14-03100301-0389',520000,2,'class-enroll','2014-12-18 13:14:16',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0389',1),(532,389,'120121482349',312,3,'14-03100302-0389',425000,2,'class-enroll','2014-12-18 13:14:16',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0389',1),(533,390,'120121438693',313,3,'14-03100301-0390',520000,2,'class-enroll','2014-12-18 13:14:18',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0390',1),(534,390,'120121438693',313,3,'14-03100302-0390',425000,2,'class-enroll','2014-12-18 13:14:18',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0390',1),(535,391,'120121438679',314,3,'14-03100301-0391',520000,2,'class-enroll','2014-12-18 13:14:19',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0391',1),(536,391,'120121438679',314,3,'14-03100302-0391',425000,2,'class-enroll','2014-12-18 13:14:19',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0391',1),(537,265,'120121181055',188,3,'14-03100301-0265',160000,2,'class-enroll','2014-12-18 13:16:09',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0265',1),(538,265,'120121181055',188,3,'14-03100302-0265',65000,2,'class-enroll','2014-12-18 13:16:09',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0265',1),(539,266,'120121131029',189,3,'14-03100301-0266',160000,2,'class-enroll','2014-12-18 13:16:09',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0266',1),(540,266,'120121131029',189,3,'14-03100302-0266',65000,2,'class-enroll','2014-12-18 13:16:09',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0266',1),(541,268,'120121422341',191,3,'14-03100301-0268',160000,2,'class-enroll','2014-12-18 13:16:10',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0268',1),(542,268,'120121422341',191,3,'14-03100302-0268',65000,2,'class-enroll','2014-12-18 13:16:10',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0268',1),(543,271,'120121191065',194,3,'14-03100301-0271',160000,2,'class-enroll','2014-12-18 13:16:12',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0271',1),(544,271,'120121191065',194,3,'14-03100302-0271',65000,2,'class-enroll','2014-12-18 13:16:12',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0271',1),(545,272,'120121111047',195,3,'14-03100301-0272',160000,2,'class-enroll','2014-12-18 13:16:12',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0272',1),(546,272,'120121111047',195,3,'14-03100302-0272',65000,2,'class-enroll','2014-12-18 13:16:12',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0272',1),(547,273,'120121171069',196,3,'14-03100301-0273',160000,2,'class-enroll','2014-12-18 13:16:13',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0273',1),(548,273,'120121171069',196,3,'14-03100302-0273',65000,2,'class-enroll','2014-12-18 13:16:13',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0273',1),(549,274,'120121131043',197,3,'14-03100301-0274',160000,2,'class-enroll','2014-12-18 13:16:13',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0274',1),(550,274,'120121131043',197,3,'14-03100302-0274',65000,2,'class-enroll','2014-12-18 13:16:13',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0274',1),(551,276,'120121101051',199,3,'14-03100301-0276',160000,2,'class-enroll','2014-12-18 13:16:14',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0276',1),(552,276,'120121101051',199,3,'14-03100302-0276',65000,2,'class-enroll','2014-12-18 13:16:14',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0276',1),(553,280,'120121151049',203,3,'14-03100301-0280',160000,2,'class-enroll','2014-12-18 13:16:16',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0280',1),(554,280,'120121151049',203,3,'14-03100302-0280',65000,2,'class-enroll','2014-12-18 13:16:16',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0280',1),(555,281,'120121161073',204,3,'14-03100301-0281',160000,2,'class-enroll','2014-12-18 13:16:17',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0281',1),(556,281,'120121161073',204,3,'14-03100302-0281',65000,2,'class-enroll','2014-12-18 13:16:17',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0281',1),(557,282,'120121101013',205,3,'14-03100301-0282',160000,2,'class-enroll','2014-12-18 13:16:17',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0282',1),(558,282,'120121101013',205,3,'14-03100302-0282',65000,2,'class-enroll','2014-12-18 13:16:17',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0282',1),(559,283,'120121171007',206,3,'14-03100301-0283',160000,2,'class-enroll','2014-12-18 13:16:18',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0283',1),(560,283,'120121171007',206,3,'14-03100302-0283',65000,2,'class-enroll','2014-12-18 13:16:18',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0283',1),(561,285,'120121111009',208,3,'14-03100301-0285',160000,2,'class-enroll','2014-12-18 13:16:19',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0285',1),(562,285,'120121111009',208,3,'14-03100302-0285',65000,2,'class-enroll','2014-12-18 13:16:19',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0285',1),(563,286,'120121141015',209,3,'14-03100301-0286',160000,2,'class-enroll','2014-12-18 13:16:19',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0286',1),(564,286,'120121141015',209,3,'14-03100302-0286',65000,2,'class-enroll','2014-12-18 13:16:19',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0286',1),(565,288,'120121121071',211,3,'14-03100301-0288',160000,2,'class-enroll','2014-12-18 13:16:20',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0288',1),(566,288,'120121121071',211,3,'14-03100302-0288',65000,2,'class-enroll','2014-12-18 13:16:20',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0288',1),(567,289,'120121121057',212,3,'14-03100301-0289',160000,2,'class-enroll','2014-12-18 13:16:20',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0289',1),(568,289,'120121121057',212,3,'14-03100302-0289',65000,2,'class-enroll','2014-12-18 13:16:20',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0289',1),(569,290,'120121171002',213,3,'14-03100301-0290',160000,2,'class-enroll','2014-12-18 13:16:21',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0290',1),(570,290,'120121171002',213,3,'14-03100302-0290',65000,2,'class-enroll','2014-12-18 13:16:21',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0290',1),(571,298,'120121191041',221,3,'14-03100301-0298',160000,2,'class-enroll','2014-12-18 13:16:25',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0298',1),(572,298,'120121191041',221,3,'14-03100302-0298',65000,2,'class-enroll','2014-12-18 13:16:25',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0298',1),(573,300,'120222181313',223,3,'14-03100301-0300',160000,2,'class-enroll','2014-12-18 13:16:26',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0300',1),(574,300,'120222181313',223,3,'14-03100302-0300',65000,2,'class-enroll','2014-12-18 13:16:26',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0300',1),(575,301,'120121191003',224,3,'14-03100301-0301',160000,2,'class-enroll','2014-12-18 13:16:27',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0301',1),(576,301,'120121191003',224,3,'14-03100302-0301',65000,2,'class-enroll','2014-12-18 13:16:27',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0301',1),(577,302,'120121121019',225,3,'14-03100301-0302',160000,2,'class-enroll','2014-12-18 13:16:28',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0302',1),(578,302,'120121121019',225,3,'14-03100302-0302',65000,2,'class-enroll','2014-12-18 13:16:28',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0302',1),(579,307,'120121492335',230,3,'14-03100301-0307',160000,2,'class-enroll','2014-12-18 13:16:37',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0307',1),(580,307,'120121492335',230,3,'14-03100302-0307',65000,2,'class-enroll','2014-12-18 13:16:37',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0307',1),(581,310,'120121191027',233,3,'14-03100301-0310',160000,2,'class-enroll','2014-12-18 13:16:40',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0310',1),(582,310,'120121191027',233,3,'14-03100302-0310',65000,2,'class-enroll','2014-12-18 13:16:40',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0310',1),(583,311,'120121161059',234,3,'14-03100301-0311',160000,2,'class-enroll','2014-12-18 13:16:41',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0311',1),(584,311,'120121161059',234,3,'14-03100302-0311',65000,2,'class-enroll','2014-12-18 13:16:41',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0311',1),(585,314,'120121151063',237,3,'14-03100301-0314',160000,2,'class-enroll','2014-12-18 13:16:44',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0314',1),(586,314,'120121151063',237,3,'14-03100302-0314',65000,2,'class-enroll','2014-12-18 13:16:44',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0314',1),(587,315,'120121101037',238,3,'14-03100301-0315',160000,2,'class-enroll','2014-12-18 13:16:44',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0315',1),(588,315,'120121101037',238,3,'14-03100302-0315',65000,2,'class-enroll','2014-12-18 13:16:44',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0315',1),(589,317,'120121121033',240,3,'14-03100301-0317',160000,2,'class-enroll','2014-12-18 13:16:46',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0317',1),(590,317,'120121121033',240,3,'14-03100302-0317',65000,2,'class-enroll','2014-12-18 13:16:46',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0317',1),(591,319,'120121131005',242,3,'14-03100301-0319',160000,2,'class-enroll','2014-12-18 13:16:47',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0319',1),(592,319,'120121131005',242,3,'14-03100302-0319',65000,2,'class-enroll','2014-12-18 13:16:47',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0319',1),(593,322,'120121168485',245,3,'14-03100301-0322',160000,2,'class-enroll','2014-12-18 13:16:48',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0322',1),(594,322,'120121168485',245,3,'14-03100302-0322',65000,2,'class-enroll','2014-12-18 13:16:48',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0322',1),(595,323,'120121111023',246,3,'14-03100301-0323',160000,2,'class-enroll','2014-12-18 13:16:49',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0323',1),(596,323,'120121111023',246,3,'14-03100302-0323',65000,2,'class-enroll','2014-12-18 13:16:49',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0323',1),(597,324,'120121141039',247,3,'14-03100301-0324',160000,2,'class-enroll','2014-12-18 13:16:49',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0324',1),(598,324,'120121141039',247,3,'14-03100302-0324',65000,2,'class-enroll','2014-12-18 13:16:50',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0324',1),(599,342,'120121181031',265,3,'14-03100301-0342',160000,2,'class-enroll','2014-12-18 13:17:12',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0342',1),(600,342,'120121181031',265,3,'14-03100302-0342',65000,2,'class-enroll','2014-12-18 13:17:12',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0342',1),(601,344,'120121108487',267,3,'14-03100301-0344',160000,2,'class-enroll','2014-12-18 13:17:18',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0344',1),(602,344,'120121108487',267,3,'14-03100302-0344',65000,2,'class-enroll','2014-12-18 13:17:18',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0344',1),(603,356,'120121161011',279,3,'14-03100301-0356',160000,2,'class-enroll','2014-12-18 13:17:27',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0356',1),(604,356,'120121161011',279,3,'14-03100302-0356',65000,2,'class-enroll','2014-12-18 13:17:27',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0356',1),(605,360,'120121102329',283,3,'14-03100301-0360',160000,2,'class-enroll','2014-12-18 13:17:29',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0360',1),(606,360,'120121102329',283,3,'14-03100302-0360',65000,2,'class-enroll','2014-12-18 13:17:29',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0360',1),(607,363,'120121152331',286,3,'14-03100301-0363',160000,2,'class-enroll','2014-12-18 13:17:32',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0363',1),(608,363,'120121152331',286,3,'14-03100302-0363',65000,2,'class-enroll','2014-12-18 13:17:32',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0363',1),(609,371,'120121402345',294,3,'14-03100301-0371',160000,2,'class-enroll','2014-12-18 13:17:39',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0371',1),(610,371,'120121402345',294,3,'14-03100302-0371',65000,2,'class-enroll','2014-12-18 13:17:39',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0371',1),(611,372,'120121452333',295,3,'14-03100301-0372',160000,2,'class-enroll','2014-12-18 13:17:41',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0372',1),(612,372,'120121452333',295,3,'14-03100302-0372',65000,2,'class-enroll','2014-12-18 13:17:41',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0372',1),(613,373,'120121442347',296,3,'14-03100301-0373',160000,2,'class-enroll','2014-12-18 13:17:43',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0373',1),(614,373,'120121442347',296,3,'14-03100302-0373',65000,2,'class-enroll','2014-12-18 13:17:43',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0373',1),(615,376,'120121171045',299,3,'14-03100301-0376',160000,2,'class-enroll','2014-12-18 13:17:45',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0376',1),(616,376,'120121171045',299,3,'14-03100302-0376',65000,2,'class-enroll','2014-12-18 13:17:45',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0376',1),(617,381,'120121462343',304,3,'14-03100301-0381',160000,2,'class-enroll','2014-12-18 13:17:47',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0381',1),(618,381,'120121462343',304,3,'14-03100302-0381',65000,2,'class-enroll','2014-12-18 13:17:47',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0381',1),(619,385,'110121191230',308,3,'14-03100301-0385',160000,2,'class-enroll','2014-12-18 13:17:50',41,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 1','','14-03100301-0385',1),(620,385,'110121191230',308,3,'14-03100302-0385',65000,2,'class-enroll','2014-12-18 13:17:50',42,'Fee Charge for: Student Registrations and Class Enrollment Class: OD12-CE Year :2014/2015 Semester : Semester 2','','14-03100302-0385',1);
/*!40000 ALTER TABLE `cis_student_payments_account_ledger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_registration_id`
--

DROP TABLE IF EXISTS `cis_student_registration_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_registration_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(45) NOT NULL DEFAULT '',
  `details_id` int(11) NOT NULL DEFAULT '0',
  `date_of_issue` datetime DEFAULT NULL,
  `issue_by` varchar(45) DEFAULT NULL,
  `has_printed_identity_card` int(1) DEFAULT NULL,
  `last_id_print_date` datetime DEFAULT NULL,
  `printed_by` text,
  `print_count` int(11) DEFAULT '0',
  `id_print_history` text,
  `index_number` varchar(20) DEFAULT NULL,
  `programme_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `admission_date` datetime DEFAULT NULL,
  `admission_mode` varchar(40) NOT NULL,
  `fee_sponsor_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `programme_choices` text NOT NULL,
  `admission_batch` int(11) NOT NULL,
  `admission_status` int(11) NOT NULL DEFAULT '0',
  `has_hostel` int(11) DEFAULT '0',
  `has_nhif` int(11) NOT NULL DEFAULT '0',
  `tmp_reg_id` int(11) NOT NULL,
  `cis_reg_id` varchar(40) NOT NULL,
  `class_code` varchar(12) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `has_cis_account` int(11) NOT NULL DEFAULT '0',
  `is_foreign_student` int(11) DEFAULT '0',
  `has_loan` int(11) NOT NULL,
  `academic_status` int(11) DEFAULT '1',
  `allow_enroll_next` int(11) NOT NULL DEFAULT '1',
  `reg_category_id` int(1) DEFAULT '1',
  `bank_account_no` varchar(30) DEFAULT NULL,
  `bank_branch` varchar(60) NOT NULL,
  `bank_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`,`registration_number`,`details_id`),
  UNIQUE KEY `registration_number_index` (`registration_number`),
  UNIQUE KEY `unique_cis_reg_id` (`cis_reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_registration_id`
--

LOCK TABLES `cis_student_registration_id` WRITE;
/*!40000 ALTER TABLE `cis_student_registration_id` DISABLE KEYS */;
INSERT INTO `cis_student_registration_id` VALUES (161,'1401601320590',83,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0833/0124/2009',6,1,3,'2014-11-27 22:05:02','NACTE CAS',1,'','',0,1,0,0,1,'1401601320590','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(162,'1401601320608',85,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1323/0140/2009',6,1,3,'2014-11-27 22:05:02','NACTE CAS',1,'','',0,1,0,0,1,'1401601320608','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(163,'1401601320632',86,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0863/0036/2006',6,1,3,'2014-11-27 22:09:37','NACTE CAS',1,'','',0,1,0,0,1,'1401601320632','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(164,'1401601320640',87,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0140/0085/2009',6,1,3,'2014-11-27 22:09:37','NACTE CAS',1,'','',0,1,0,0,1,'1401601320640','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(165,'1401601320657',88,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0514/0046/2009',6,1,3,'2014-11-27 22:09:37','NACTE CAS',1,'','',0,1,0,0,1,'1401601320657','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(166,'1401601320665',89,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0129/0069/2009',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320665','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(167,'1401601320673',90,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1515/0104/2007',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320673','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(168,'1401601320681',91,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0465/0200/2001',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320681','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(169,'1401601320699',92,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0150/0075/2008',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320699','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(170,'1401601320707',93,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0357/0101/2009',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320707','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(171,'1401601320715',94,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0140/0013/2009',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320715','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(172,'1401601310724',95,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0496/0173/1997',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601310724','BENG14-COE',1,1,2,0,1,1,1,NULL,'',NULL),(173,'1401601310732',96,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0384/0002/2010',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601310732','BENG14-COE',1,1,2,0,1,1,1,NULL,'',NULL),(174,'1401601310740',97,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0384/0004/2010',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601310740','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(175,'1401601320756',98,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0119/0095/2010',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320756','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(176,'1401601320764',99,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1383/0090/2009',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320764','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(177,'1401601310773',100,NULL,NULL,NULL,NULL,NULL,0,NULL,'P0990/0022/2006',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601310773','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(178,'1401601320780',101,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0108/0139/2007',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320780','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(179,'1401601320798',102,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0101/0277/2009',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320798','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(180,'1401601310807',103,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0204/0238/2007',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601310807','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(181,'1401601320814',104,NULL,NULL,NULL,NULL,NULL,0,NULL,'s0140/0051/2005',6,1,3,'2014-11-27 22:09:38','NACTE CAS',1,'','',0,1,0,0,1,'1401601320814','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(182,'1401601310823',105,NULL,NULL,NULL,NULL,NULL,0,NULL,'S2019/0010/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601310823','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(183,'1401601320830',106,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1528/0063/2007',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320830','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(184,'1401601320848',107,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0101/0125/2005',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320848','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(185,'1401601320855',108,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1029/0054/2007',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320855','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(186,'1401601320863',109,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0485/0188/2008',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320863','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(187,'1401601320871',110,NULL,NULL,NULL,NULL,NULL,0,NULL,'s0384/0033/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320871','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(188,'1401601320889',111,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1220/0145/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320889','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(189,'1401601320897',112,NULL,NULL,NULL,NULL,NULL,0,NULL,'s0144/0016/2006',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320897','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(190,'1401601320905',113,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0835/0022/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320905','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(191,'1401601320913',114,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0885/0216/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320913','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(192,'1401601310922',115,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0835/0003/2010',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601310922','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(193,'1401601310930',116,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0262/0002/2005',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601310930','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(194,'1401601320947',117,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0400/0114/2008',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320947','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(195,'1401601320954',118,NULL,NULL,NULL,NULL,NULL,0,NULL,'s0103/0008/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320954','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(196,'1401601320962',119,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0960/0521/2009',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320962','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(197,'1401601320970',120,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0534/0140/2007',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601320970','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(198,'1401601310989',121,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0107/0015/2005',6,1,3,'2014-11-27 22:09:39','NACTE CAS',1,'','',0,1,0,0,1,'1401601310989','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(199,'1401601320996',122,NULL,NULL,NULL,NULL,NULL,0,NULL,'s0391/0159/2009',6,1,3,'2014-11-27 22:09:40','NACTE CAS',1,'','',0,1,0,0,1,'1401601320996','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(200,'1401601321002',123,NULL,NULL,NULL,NULL,NULL,0,NULL,'S2381/0183/2009',6,1,3,'2014-11-27 22:09:40','NACTE CAS',1,'','',0,1,0,0,1,'1401601321002','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(201,'1401601311011',124,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1222/0074/2008',6,1,3,'2014-11-27 22:09:40','NACTE CAS',1,'','',0,1,0,0,1,'1401601311011','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(202,'1401601321028',125,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0147/0179/2003',6,1,3,'2014-11-27 22:09:40','NACTE CAS',1,'','',0,1,0,0,1,'1401601321028','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(203,'1401601321036',126,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0135/0020/2009',6,1,3,'2014-11-27 22:09:40','NACTE CAS',1,'','',0,1,0,0,1,'1401601321036','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(204,'1401801420307',127,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0107/0025/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420307','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(205,'1401801410316',128,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0256/0043/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801410316','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(206,'1401801420323',129,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1071/0335/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420323','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(207,'1401801420331',130,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0139/0092/2010',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420331','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(208,'1401801420349',131,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0821/0104/2010',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420349','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(209,'1401801410357',132,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0206/0043/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801410357','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(210,'1401801420364',133,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0154/0038/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420364','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(211,'1401801420372',134,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3500/0068/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420372','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(212,'1401801420380',135,NULL,NULL,NULL,NULL,NULL,0,NULL,'S2769/0058/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420380','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(213,'1401801420398',136,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0873/0030/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420398','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(214,'1401801420406',137,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0958/0129/2011',8,1,3,'2014-11-27 22:09:40','TCU CAS',1,'','',0,1,0,0,1,'1401801420406','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(215,'1401801420414',138,NULL,NULL,NULL,NULL,NULL,0,NULL,'S4202/0019/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420414','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(216,'1401801420422',139,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1334/0030/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420422','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(217,'1401801420430',140,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1071/0440/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420430','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(218,'1401801420448',141,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1445/0075/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420448','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(219,'1401801420455',142,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0691/0022/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420455','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(220,'1401801420463',143,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3586/0013/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420463','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(221,'1401801420471',144,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1224/0018/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420471','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(222,'1401801420489',145,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3033/0082/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420489','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(223,'1401801420497',146,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0473/0061/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420497','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(224,'1401801410506',147,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0233/0039/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801410506','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(225,'1401801420513',148,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3623/0122/2009',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420513','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(226,'1401801420521',149,NULL,NULL,NULL,NULL,NULL,0,NULL,'S4104/0070/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420521','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(227,'1401801420539',150,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0938/0115/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420539','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(228,'1401801420547',151,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1064/0025/2011',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420547','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(229,'1401801420554',152,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1633/0218/2009',8,1,3,'2014-11-27 22:09:41','TCU CAS',1,'','',0,1,0,0,1,'1401801420554','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(230,'1401801420562',153,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0473/0075/2011',8,1,3,'2014-11-27 22:09:42','TCU CAS',1,'','',0,1,0,0,1,'1401801420562','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(231,'1401801420570',154,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0867/0115/2011',8,1,3,'2014-11-27 22:09:42','TCU CAS',1,'','',0,1,0,0,1,'1401801420570','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(232,'1401801410589',155,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1394/0058/2011',8,1,3,'2014-11-27 22:09:42','TCU CAS',1,'','',0,1,0,0,1,'1401801410589','GC14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(233,'1401601321044',156,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0772/0169/2008',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601321044','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(234,'1401601321051',157,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1220/0186/2009',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601321051','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(235,'1401601321069',158,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0304/0170/2009',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601321069','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(236,'1401601321077',159,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3631/0036/2010',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601321077','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(237,'1401601321085',160,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1264/0058/2007',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601321085','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(238,'1401601311094',161,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1367/0046/2008',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601311094','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(239,'1401601321101',162,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0364/0069/2007',6,1,3,'2014-11-27 22:09:42','NACTE CAS',1,'Requesting Change of Study','',0,1,0,0,1,'1401601321101','BENG14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(240,'1401301120019',163,NULL,NULL,NULL,NULL,NULL,0,NULL,'S2354/0015/2013',3,1,3,'2014-12-18 00:37:10','DIT-SAS',1,'','',0,1,0,0,1,'1401301120019','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(241,'1401301120027',164,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0107/0039/2011',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120027','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(242,'1401301120035',165,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0800/0095/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120035','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(243,'1401301120043',166,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1529/0034/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120043','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(244,'1401301120050',167,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1200/0100/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120050','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(245,'1401301120068',168,NULL,NULL,NULL,NULL,NULL,0,NULL,'S4408/0043/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120068','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(246,'1401301120076',169,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0800/0101/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120076','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(247,'1401301120084',170,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1278/0183/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120084','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(248,'1401301120092',171,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3724/0032/2010',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120092','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(249,'1401301120100',172,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1197/0147/2012',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120100','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(250,'1401301120118',173,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0346/0049/2007',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120118','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(251,'1401301120126',174,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0629/0151/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120126','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(252,'1401301120134',175,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0384/0017/2013',3,1,3,'2014-12-18 00:37:11','DIT-SAS',1,'','',0,1,0,0,1,'1401301120134','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(253,'1401301120142',176,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0181/0072/2013',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301120142','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(254,'1401301120159',177,NULL,NULL,NULL,NULL,NULL,0,NULL,'S2530/0059/2008',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301120159','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(255,'1401301120167',178,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0119/0007/2010',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301120167','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(256,'1401301120175',179,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0155/0019/2005',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301120175','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(257,'1401301120183',180,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0111/0021/2009',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301120183','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(258,'1401301110192',181,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3861/0015/2011',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301110192','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(259,'1401301120209',182,NULL,NULL,NULL,NULL,NULL,0,NULL,'S1756/0067/2013',3,1,3,'2014-12-18 00:37:12','DIT-SAS',1,'','',0,1,0,0,1,'1401301120209','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(260,'1401301120217',183,NULL,NULL,NULL,NULL,NULL,0,NULL,'S3861/0028/2010',3,1,3,'2014-12-18 00:37:13','DIT-SAS',1,'','',0,1,0,0,1,'1401301120217','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(261,'1401301120225',184,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0101/0498/2010',3,1,3,'2014-12-18 00:37:13','DIT-SAS',1,'','',0,1,0,0,1,'1401301120225','OD14-COE',1,1,2,0,1,1,1,NULL,'',NULL),(262,'1401301120233',185,NULL,NULL,NULL,NULL,NULL,0,NULL,'S4026/0171/2013',3,1,3,'2014-12-18 00:37:13','DIT-SAS',1,'','',0,1,0,0,1,'1401301120233','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(263,'1401301120241',186,NULL,NULL,NULL,NULL,NULL,0,NULL,'S0431/0060/2013',3,1,3,'2014-12-18 00:37:13','DIT-SAS',1,'','',0,1,0,0,1,'1401301120241','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(264,'1401301120258',187,NULL,NULL,NULL,NULL,NULL,0,NULL,'S2381/0371/2010',3,1,3,'2014-12-18 00:37:13','DIT-SAS',1,'','',0,1,0,0,1,'1401301120258','OD14-COE',1,0,2,0,1,1,1,NULL,'',NULL),(265,'120121181055',188,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:31','',5,'','',0,2,0,0,2,'1205310120013','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(266,'120121131029',189,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:32','',5,'','',0,2,0,0,2,'1205310120021','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(267,'120121418673',190,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:32','',1,'DISCO','',0,2,0,0,2,'1205310120039','OD12-CE',0,0,2,0,1,1,2,NULL,'',NULL),(268,'120121422341',191,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:32','',10,'','',0,2,0,0,2,'1205310110048','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(269,'120121448627',192,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:33','',1,'','',0,2,0,0,2,'1205310120054','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(270,'120121411167',193,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:33','',1,'','',0,2,0,0,2,'1205310120062','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(271,'120121191065',194,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:33','',5,'','',0,2,0,0,2,'1205310120070','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(272,'120121111047',195,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:33','',5,'','',0,2,0,0,2,'1205310120088','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(273,'120121171069',196,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:34','',5,'','',0,2,0,0,2,'1205310120096','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(274,'120121131043',197,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:34','',5,'','',0,2,0,0,2,'1205310120104','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(275,'120121421139',198,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:34','',1,'','',0,2,0,0,2,'1205310120112','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(276,'120121101051',199,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:34','',5,'','',0,2,0,0,2,'1205310120120','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(277,'120121461117',200,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:34','',1,'','',0,2,0,0,2,'1205310120138','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(278,'120121438631',201,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:35','',1,'','',0,2,0,0,2,'1205310120146','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(279,'501013152',202,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:35','',1,'ABSC','',0,2,0,0,2,'1205310120153','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(280,'120121151049',203,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:35','',5,'','',0,2,0,0,2,'1205310120161','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(281,'120121161073',204,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:35','',5,'','',0,2,0,0,2,'1205310120179','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(282,'120121101013',205,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:36','',5,'','',0,2,0,0,2,'1205310120187','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(283,'120121171007',206,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:36','',5,'','',0,2,0,0,2,'1205310120195','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(284,'120121461099',207,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:36','',1,'','',0,2,0,0,2,'1205310120203','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(285,'120121111009',208,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:36','',5,'','',0,2,0,0,2,'1205310120211','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(286,'120121141015',209,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:36','',5,'','',0,2,0,0,2,'1205310120229','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(287,'120121478671',210,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:37','',1,'','',0,2,0,0,2,'1205310120237','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(288,'120121121071',211,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:37','',5,'','',0,2,0,0,2,'1205310120245','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(289,'120121121057',212,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:37','',5,'','',0,2,0,0,2,'1205310120252','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(290,'120121171002',213,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:37','',5,'ABSC','',0,2,0,0,2,'1205310110261','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(291,'120121131067',214,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:38','',5,'DISCO','',0,2,0,0,2,'1205310120278','OD12-CE',0,0,2,0,1,1,2,NULL,'',NULL),(292,'110121438047',215,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:38','',1,'ABSC','',0,2,0,0,2,'1205310120286','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(293,'120121421153',216,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:38','',1,'','',0,2,0,0,2,'1205310120294','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(294,'120121472339',217,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:38','',1,'','',0,2,0,0,2,'1205310110303','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(295,'120121451107',218,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:39','',1,'','',0,2,0,0,2,'1205310120310','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(296,'120121401010',219,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:39','',1,'','',0,2,0,0,2,'1205310110329','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(297,'120121441135',220,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:39','',1,'','',0,2,0,0,2,'1205310120336','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(298,'120121191041',221,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:40','',5,'','',0,2,0,0,2,'1205310120344','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(299,'120121448707',222,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:40','',1,'','',0,2,0,0,2,'1205310120351','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(300,'120222181313',223,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:40','',5,'','',0,2,0,0,2,'1205310120369','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(301,'120121191003',224,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:40','',5,'','',0,2,0,0,2,'1205310120377','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(302,'120121121019',225,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:41','',5,'','',0,2,0,0,2,'1205310120385','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(303,'120121491161',226,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:41','',1,'','',0,2,0,0,2,'1205310120393','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(304,'120121411006',227,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:41','',1,'','',0,2,0,0,2,'1205310110402','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(305,'120121431026',228,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:42','',1,'','',0,2,0,0,2,'1205310110410','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(306,'901016033',229,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:42','',1,'','',0,2,0,0,2,'1205310120427','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(307,'120121492335',230,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:42','',10,'','',0,2,0,0,2,'1205310110436','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(308,'120121448689',231,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:42','',1,'','',0,2,0,0,2,'1205310120443','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(309,'120121451008',232,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:43','',1,'','',0,2,0,0,2,'1205310110451','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(310,'120121191027',233,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:43','',5,'','',0,2,0,0,2,'1205310120468','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(311,'120121161059',234,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:44','',5,'','',0,2,0,0,2,'1205310120476','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(312,'100101P7995',235,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:44','',1,'DISCO','',0,2,0,0,2,'1205310120484','OD12-CE',0,0,2,0,1,1,2,NULL,'',NULL),(313,'601013605',236,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:44','',1,'','',0,2,0,0,2,'1205310120492','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(314,'120121151063',237,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:45','',5,'','',0,2,0,0,2,'1205310120500','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(315,'120121101037',238,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:45','',5,'','',0,2,0,0,2,'1205310120518','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(316,'110121461226',239,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:45','',1,'','',0,2,0,0,2,'1205310110527','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(317,'120121121033',240,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:45','',5,'','',0,2,0,0,2,'1205310120534','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(318,'120121401091',241,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:46','',1,'','',0,2,0,0,2,'1205310120542','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(319,'120121131005',242,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:46','',5,'','',0,2,0,0,2,'1205310120559','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(320,'120121401034',243,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:46','',1,'','',0,2,0,0,2,'1205310110568','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(321,'120121451145',244,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:47','',1,'','',0,2,0,0,2,'1205310120575','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(322,'120121168485',245,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:47','',5,'','',0,2,0,0,2,'1205310120583','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(323,'120121111023',246,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:47','',5,'','',0,2,0,0,2,'1205310120591','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(324,'120121141039',247,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:48','',5,'','',0,2,0,0,2,'1205310120609','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(325,'110121458043',248,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:48','',1,'','',0,2,0,0,2,'1205310120617','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(326,'110121438443',249,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:48','',1,'','',0,2,0,0,2,'1205310120625','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(327,'120121421115',250,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:49','',1,'','',0,2,0,0,2,'1205310120633','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(328,'120121481175',251,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:49','',1,'','',0,2,0,0,2,'1205310120641','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(329,'120121491081',252,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:49','',1,'','',0,2,0,0,2,'1205310120658','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(330,'120121471004',253,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:50','',1,'','',0,2,0,0,2,'1205310110667','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(331,'120121441036',254,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:50','',1,'','',0,2,0,0,2,'1205310110675','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(332,'120121411087',255,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:51','',1,'','',0,2,0,0,2,'1205310120682','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(333,'100101P8000',256,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:51','',1,'','',0,2,0,0,2,'1205310120690','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(334,'120121491147',257,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:51','',1,'','',0,2,0,0,2,'1205310120708','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(335,'120121431149',258,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:52','',1,'','',0,2,0,0,2,'1205310120716','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(336,'120121421097',259,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:52','',1,'','',0,2,0,0,2,'1205310120724','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(337,'110121428051',260,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:53','',1,'','',0,2,0,0,2,'1205310120732','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(338,'120121431083',261,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:53','',1,'','',0,2,0,0,2,'1205310120740','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(339,'120121431101',262,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:53','',1,'','',0,2,0,0,2,'1205310120757','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(340,'120121401157',263,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:54','',1,'','',0,2,0,0,2,'1205310120765','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(341,'120121471165',264,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:54','',1,'','',0,2,0,0,2,'1205310120773','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(342,'120121181031',265,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:55','',5,'','',0,2,0,0,2,'1205310120781','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(343,'120121478695',266,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:55','',1,'','',0,2,0,0,2,'1205310120799','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(344,'120121108487',267,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:55','',5,'','',0,2,0,0,2,'1205310120807','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(345,'120121401171',268,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:56','',1,'','',0,2,0,0,2,'1205310120815','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(346,'120121411129',269,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:56','',1,'','',0,2,0,0,2,'1205310120823','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(347,'120121411105',270,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:57','',1,'','',0,2,0,0,2,'1205310120831','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(348,'120121478633',271,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:57','',1,'','',0,2,0,0,2,'1205310120849','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(349,'120121408649',272,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:57','',1,'','',0,2,0,0,2,'1205310120856','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(350,'120121432337',273,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:58','',1,'','',0,2,0,0,2,'1205310110865','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(351,'120121468647',274,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:58','',1,'','',0,2,0,0,2,'1205310120872','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(352,'120121468685',275,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:58','',1,'ABSC','',0,2,0,0,2,'1205310120880','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(353,'120121448641',276,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:59','',1,'','',0,2,0,0,2,'1205310120898','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(354,'120121438655',277,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:02:59','',1,'','',0,2,0,0,2,'1205310120906','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(355,'120121438617',278,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:00','',1,'','',0,2,0,0,2,'1205310120914','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(356,'120121161011',279,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:00','',5,'','',0,2,0,0,2,'1205310120922','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(357,'120121458637',280,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:00','',1,'','',0,2,0,0,2,'1205310120930','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(358,'120121468661',281,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:01','',1,'','',0,2,0,0,2,'1205310120948','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(359,'110121488035',282,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:01','',1,'','',0,2,0,0,2,'1205310120955','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(360,'120121102329',283,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:02','',6,'','',0,2,0,0,2,'1205310110964','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(361,'120121408687',284,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:02','',1,'','',0,2,0,0,2,'1205310120971','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(362,'120121418635',285,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:03','',1,'ABSC','',0,2,0,0,2,'1205310120989','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(363,'120121152331',286,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:03','',6,'','',0,2,0,0,2,'1205310110998','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(364,'120121441159',287,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:03','',1,'','',0,2,0,0,2,'1205310121003','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(365,'110121471859',288,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:04','',1,'','',0,2,0,0,2,'1205310121011','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(366,'120121478619',289,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:04','',1,'ABSC','',0,2,0,0,2,'1205310121029','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(367,'120121488643',290,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:05','',1,'','',0,2,0,0,2,'1205310121037','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(368,'120121468623',291,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:05','',1,'','',0,2,0,0,2,'1205310121045','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(369,'120121498639',292,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:06','',1,'','',0,2,0,0,2,'1205310121052','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(370,'120121498677',293,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:06','',1,'','',0,2,0,0,2,'1205310121060','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(371,'120121402345',294,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:07','',10,'','',0,2,0,0,2,'1205310111079','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(372,'120121452333',295,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:07','',10,'','',0,2,0,0,2,'1205310111087','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(373,'120121442347',296,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:07','',10,'','',0,2,0,0,2,'1205310111095','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(374,'120121418659',297,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:08','',1,'','',0,2,0,0,2,'1205310121102','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(375,'100101P7307',298,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:08','',1,'','',0,2,0,0,2,'1205310121110','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(376,'120121171045',299,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:09','',5,'','',0,2,0,0,2,'1205310121128','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(377,'120121428621',300,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:09','',1,'','',0,2,0,0,2,'1205310121136','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(378,'120121488629',301,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:10','',1,'','',0,2,0,0,2,'1205310121144','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(379,'120121458675',302,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:10','',1,'DISCO','',0,2,0,0,2,'1205310121151','OD12-CE',0,0,2,0,1,1,2,NULL,'',NULL),(380,'120121498615',303,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:11','',1,'','',0,2,0,0,2,'1205310121169','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(381,'120121462343',304,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:11','',10,'','',0,2,0,0,2,'1205310111178','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(382,'120121408705',305,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:12','',1,'','',0,2,0,0,2,'1205310121185','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(383,'120121488681',306,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:12','',1,'','',0,2,0,0,2,'1205310121193','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(384,'120121478657',307,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:13','',1,'','',0,2,0,0,2,'1205310121201','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(385,'110121191230',308,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:13','',6,'','',0,2,0,0,2,'1205310111210','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(386,'120121458651',309,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:14','',1,'','',0,2,0,0,2,'1205310121227','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(387,'110121438061',310,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:14','',1,'ABSC','',0,2,0,0,2,'1205310121235','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(388,'120121488667',311,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:15','',1,'','',0,2,0,0,2,'1205310121243','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(389,'120121482349',312,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:16','',1,'','',0,2,0,0,2,'1205310111251','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(390,'120121438693',313,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:16','',1,'','',0,2,0,0,2,'1205310121268','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL),(391,'120121438679',314,NULL,NULL,NULL,NULL,NULL,0,NULL,'',3,10,10,'2014-12-18 13:03:17','',1,'','',0,2,0,0,2,'1205310121276','OD12-CE',1,0,2,0,1,1,2,NULL,'',NULL);
/*!40000 ALTER TABLE `cis_student_registration_id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_student_sponsor_type`
--

DROP TABLE IF EXISTS `cis_student_sponsor_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_student_sponsor_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code_name` varchar(20) DEFAULT NULL,
  `description` text,
  `sponsor_category` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sponsor_code_id` (`code_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_student_sponsor_type`
--

LOCK TABLES `cis_student_sponsor_type` WRITE;
/*!40000 ALTER TABLE `cis_student_sponsor_type` DISABLE KEYS */;
INSERT INTO `cis_student_sponsor_type` VALUES (1,'Private Sponsored ','PVT','Sponsored by Private/Organization',1,4),(2,'Higher Education Loans Board','HESLB','Fully Sponsored by loans board',1,2),(3,'Private and Loans Board','PVT-HESLB','Not Fully Sponsored by loans board',1,2),(4,'HESLB Accommodation','HESLB-ACCOM','Partially sponsored by loans board in accommodation only',1,2),(5,'Government Sponsored Students','GVT','Students Sponsored by Government (Ordinary Diploma)',2,1),(6,'Government Gender Management Unit','GVT-GMU','Government Sponsored via Gender Management Unit',2,1),(7,'Government Mature','GVT-MATURE','Government Mature Sponsored Students',2,1),(8,'Gender Management Unit IT','GMU-IT','GMU Sponsored via IT',2,1),(9,'Government Day','GVT-DAY','Government Sponsored Students But Day',2,1),(10,'Gender Management Unit TELMS','GMU-TELMS','Non private sponsor by TEMLS under GMU',2,1),(11,'Gender Management Unit','GMU','Gender Management Unit',2,1);
/*!40000 ALTER TABLE `cis_student_sponsor_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_students_details`
--

DROP TABLE IF EXISTS `cis_students_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_students_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(12) DEFAULT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `nationality` varchar(40) DEFAULT NULL,
  `birth_country` varchar(40) NOT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `place_of_birth` varchar(30) DEFAULT NULL,
  `sas_app_status` varchar(10) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `mobile_number` varchar(60) DEFAULT NULL,
  `email_address` varchar(30) DEFAULT NULL,
  `permanent_address` varchar(60) DEFAULT NULL,
  `contact_address` varchar(60) DEFAULT NULL,
  `preffered_session` varchar(60) NOT NULL,
  `disabilities` varchar(60) NOT NULL,
  `fee_payment` varchar(60) NOT NULL,
  `birth_certificate` varchar(60) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `std_id` varchar(30) NOT NULL,
  `dependants` int(11) DEFAULT NULL,
  `current_loc` int(11) NOT NULL,
  `permanent_loc` int(11) NOT NULL,
  `kin_name` varchar(120) NOT NULL,
  `kin_phone` varchar(20) DEFAULT NULL,
  `kin_email` varchar(60) NOT NULL,
  `kin_address` varchar(120) NOT NULL,
  `kin_location` int(11) NOT NULL,
  `par_name` varchar(120) NOT NULL,
  `par_email` varchar(60) NOT NULL,
  `par_phone` varchar(20) DEFAULT NULL,
  `par_address` varchar(120) NOT NULL,
  `par_location` int(11) NOT NULL,
  `details` blob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_std_id` (`std_id`),
  UNIQUE KEY `std_id_index` (`std_id`),
  UNIQUE KEY `sas_applicant_id` (`app_id`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_students_details`
--

LOCK TABLES `cis_students_details` WRITE;
/*!40000 ALTER TABLE `cis_students_details` DISABLE KEYS */;
INSERT INTO `cis_students_details` VALUES (83,NULL,'2014-11-27 19:09:37','MOHAMED','KHAMIS','ALI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320590',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(85,NULL,'2014-11-27 19:09:37','OSCAR','','SELEMANI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320608',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(86,NULL,'2014-11-27 19:09:37','ORGENES','MNUNA','JOSEPH','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320632',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(87,NULL,'2014-11-27 19:09:37','OMBENI','','AIDANI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320640',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(88,NULL,'2014-11-27 19:09:37','OBRIEN','GEOFREY','MLAY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320657',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(89,NULL,'2014-11-27 19:09:38','NELSON','K','LUASHA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320665',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(90,NULL,'2014-11-27 19:09:38','MICHAEL','','SELEMANI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320673',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(91,NULL,'2014-11-27 19:09:38','MUSSA','HASSAN','SAID','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320681',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(92,NULL,'2014-11-27 19:09:38','MOHAMED','','RASHID','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320699',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(93,NULL,'2014-11-27 19:09:38','PASCAL','THADEUS','MSOKA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320707',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(94,NULL,'2014-11-27 19:09:38','BARAKA','','MGALA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320715',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(95,NULL,'2014-11-27 19:09:38','MARIA','EZEKIEL','ISSAKA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310724',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(96,NULL,'2014-11-27 19:09:38','ASYA','SABRI','SAID','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310732',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(97,NULL,'2014-11-27 19:09:38','BARKE','KHAMIS','MOHAMED','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310740',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(98,NULL,'2014-11-27 19:09:38','SAILLA','MUGURUSI','MAKENE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320756',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(99,NULL,'2014-11-27 19:09:38','JUMA','R','MAYAO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320764',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(100,NULL,'2014-11-27 19:09:38','MARTHA','DANFORD','KILASI','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310773',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(101,NULL,'2014-11-27 19:09:38','JUMA','','WAHABU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320780',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(102,NULL,'2014-11-27 19:09:38','IDDY','','SALUM','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320798',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(103,NULL,'2014-11-27 19:09:38','SALMA','','ABASI','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310807',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(104,NULL,'2014-11-27 19:09:38','Hassan','','Ramadhani','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320814',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(105,NULL,'2014-11-27 19:09:39','GRACE','LANDELIN','MATHEW','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310823',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(106,NULL,'2014-11-27 19:09:39','GENUINE','','MBINDA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320830',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(107,NULL,'2014-11-27 19:09:39','FELIX','','FRANCIS','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320848',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(108,NULL,'2014-11-27 19:09:39','MASUMBUKO','','MASALU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320855',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(109,NULL,'2014-11-27 19:09:39','EVARIST','FRANCIS','KAVISHE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320863',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(110,NULL,'2014-11-27 19:09:39','HAMID','ABDULLA','WAILU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320871',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(111,NULL,'2014-11-27 19:09:39','HABIBU','','YANGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320889',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(112,NULL,'2014-11-27 19:09:39','CATHIBERT','HERMAN','MREMA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320897',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(113,NULL,'2014-11-27 19:09:39','SAID','HAMOUD','HEMED','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320905',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(114,NULL,'2014-11-27 19:09:39','SHEKA','','MBOJE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320913',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(115,NULL,'2014-11-27 19:09:39','MARIAM','ALI','HAMZA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310922',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(116,NULL,'2014-11-27 19:09:39','ANGELINA','JOSEPH','BARAKA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310930',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(117,NULL,'2014-11-27 19:09:39','MOH\'D','ALI','KHAMIS','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320947',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(118,NULL,'2014-11-27 19:09:39','AMANYISE','ROWDEN','NGOJE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320954',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(119,NULL,'2014-11-27 19:09:39','SALIM','','HEMED','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320962',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(120,NULL,'2014-11-27 19:09:39','JAMES','E.','MANGALE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320970',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(121,NULL,'2014-11-27 19:09:40','ROSE','FRANCIS','KIKO','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601310989',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(122,NULL,'2014-11-27 19:09:40','ABASS','S','MOH\'D','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601320996',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(123,NULL,'2014-11-27 19:09:40','ALPHONCE','','AMBRONCE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321002',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(124,NULL,'2014-11-27 19:09:40','ZUHURA','ABDULRAHMANI','RASHID','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601311011',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(125,NULL,'2014-11-27 19:09:40','RICHARD','FARAJI','MACHINDA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321028',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(126,NULL,'2014-11-27 19:09:40','DAVID','JACKSON','RINGO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321036',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(127,NULL,'2014-11-27 19:09:40','ALFRED','A','MACHAGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420307',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(128,NULL,'2014-11-27 19:09:40','RADHIANA','IDOWA','MYOMBO','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801410316',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(129,NULL,'2014-11-27 19:09:40','GEORGE','LAWRENCE','MANYAMA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420323',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(130,NULL,'2014-11-27 19:09:40','MUSA','M','NG´ONYE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420331',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(131,NULL,'2014-11-27 19:09:40','DENIS','K','OMARA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420349',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(132,NULL,'2014-11-27 19:09:40','IRENE','','MAIGWA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801410357',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(133,NULL,'2014-11-27 19:09:40','JOHN','S','KOMBA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420364',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(134,NULL,'2014-11-27 19:09:40','JONSON','','CHAULAYA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420372',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(135,NULL,'2014-11-27 19:09:40','ALEX','BUNDALA','CYPRIAN','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420380',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(136,NULL,'2014-11-27 19:09:40','ALBANUS','I','TEMU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420398',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(137,NULL,'2014-11-27 19:09:40','STEVEN','NTIBONEKA','ISAAC','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420406',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(138,NULL,'2014-11-27 19:09:41','MABALA','ONESMO','MIHAMBO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420414',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(139,NULL,'2014-11-27 19:09:41','FREDNAND','LWELWE','MAPESA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420422',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(140,NULL,'2014-11-27 19:09:41','PETER','ELLON','KERENGE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420430',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(141,NULL,'2014-11-27 19:09:41','BRYTON','VENANCE','KESSY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420448',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(142,NULL,'2014-11-27 19:09:41','YASSIN','H','NG\'UI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420455',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(143,NULL,'2014-11-27 19:09:41','HAMISI','SALUM','HAMISI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420463',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(144,NULL,'2014-11-27 19:09:41','FRANCIS','','KIVINGE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420471',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(145,NULL,'2014-11-27 19:09:41','FREDY','','FOCUS','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420489',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(146,NULL,'2014-11-27 19:09:41','JAPHACE','','JAPHET','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420497',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(147,NULL,'2014-11-27 19:09:41','JANE','A','NJAU','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801410506',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(148,NULL,'2014-11-27 19:09:41','JOSEPH','','LAURENT','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420513',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(149,NULL,'2014-11-27 19:09:41','EZAKIEL','','KIMARO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420521',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(150,NULL,'2014-11-27 19:09:41','EMMANUEL','','MAYUNGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420539',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(151,NULL,'2014-11-27 19:09:41','HANIF','MOHAMED','SALUM','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420547',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(152,NULL,'2014-11-27 19:09:41','SEIF','','ALLY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420554',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(153,NULL,'2014-11-27 19:09:42','NICKSON','','BAGUMA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420562',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(154,NULL,'2014-11-27 19:09:42','PETRO','Y','SIGALLAH','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801420570',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(155,NULL,'2014-11-27 19:09:42','MANSURA','','ISSA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401801410589',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(156,NULL,'2014-11-27 19:09:42','ISMAIL','','JUMA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321044',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(157,NULL,'2014-11-27 19:09:42','RICHARD','THOMAS','MLIMILA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321051',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(158,NULL,'2014-11-27 19:09:42','JAWADU','','YAZIDI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321069',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(159,NULL,'2014-11-27 19:09:42','INNOCENT','A','KIHWELE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321077',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(160,NULL,'2014-11-27 19:09:42','GEORGE','REGINALD','CHONJO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321085',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(161,NULL,'2014-11-27 19:09:42','TABU','','YUSUPH','F',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601311094',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(162,NULL,'2014-11-27 19:09:42','SELEMANI','MURO','SHOMARY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401601321101',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(163,NULL,'2014-12-17 21:37:10','Deogratius','Y.','Temba','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120019',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(164,NULL,'2014-12-17 21:37:11','Geofrey','Mtatiro boniphace','Chacha','M',NULL,'',NULL,'1994-09-09',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120027',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(165,NULL,'2014-12-17 21:37:11','Elvis','Ernest','Kusiluka','M',NULL,'',NULL,'1996-05-03',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120035',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(166,NULL,'2014-12-17 21:37:11','Peter','John','Crescent','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120043',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(167,NULL,'2014-12-17 21:37:11','Kenneth','Jonah','Mwakiluma','M',NULL,'',NULL,'1996-05-07',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120050',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(168,NULL,'2014-12-17 21:37:11','Adelick','','Rugaijamu','M',NULL,'',NULL,'1996-06-02',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120068',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(169,NULL,'2014-12-17 21:37:11','Filbert','','Akaro','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120076',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(170,NULL,'2014-12-17 21:37:11','Raymond','Boniphace','Masanja','M',NULL,'',NULL,'1996-07-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120084',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(171,NULL,'2014-12-17 21:37:11','Lusajo','Owden','Mwaikondela','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120092',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(172,NULL,'2014-12-17 21:37:11','Jamal','Abduljalil','Abdu','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120100',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(173,NULL,'2014-12-17 21:37:11','John','G.','Jonas','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120118',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(174,NULL,'2014-12-17 21:37:11','Godfrey','Michael','Shio','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120126',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(175,NULL,'2014-12-17 21:37:11','Abubakar','H','Mohamed','M',NULL,'',NULL,'1995-07-02',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120134',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(176,NULL,'2014-12-17 21:37:12','Fivend','Emmanuel','Bomboko','M',NULL,'',NULL,'1991-05-04',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120142',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(177,NULL,'2014-12-17 21:37:12','Mohamedi','','Maulid','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120159',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(178,NULL,'2014-12-17 21:37:12','Alfred','','Ndonde','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120167',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(179,NULL,'2014-12-17 21:37:12','Cleophas','Sabbi','Gulinja','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120175',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(180,NULL,'2014-12-17 21:37:12','Francis','M','Balankumye','M',NULL,'',NULL,'1989-09-09',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120183',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(181,NULL,'2014-12-17 21:37:12','Husna','','Seleman','F',NULL,'',NULL,'1994-04-06',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301110192',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(182,NULL,'2014-12-17 21:37:12','Derick','','Philibert','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120209',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(183,NULL,'2014-12-17 21:37:13','James','','Mwakitalu','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120217',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(184,NULL,'2014-12-17 21:37:13','Rodrick','Robert','Mbanga','M',NULL,'',NULL,'1970-01-01',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120225',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(185,NULL,'2014-12-17 21:37:13','Nurdin','','Omary','M',NULL,'',NULL,'1994-04-08',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120233',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(186,NULL,'2014-12-17 21:37:13','Ernest','Leckson','Ndendya','M',NULL,'',NULL,'1993-08-11',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120241',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(187,NULL,'2014-12-17 21:37:13','Florence','N','Mussa','M',NULL,'',NULL,'1990-12-06',NULL,'','',NULL,'1',NULL,'','','','',NULL,NULL,'1401301120258',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(188,NULL,'2014-12-18 10:02:31','Yasir','','ABDALLAH','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121181055',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(189,NULL,'2014-12-18 10:02:32','Rahim','','ABDUL','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121131029',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(190,NULL,'2014-12-18 10:02:32','Hassan','Salim','ALLY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121418673',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(191,NULL,'2014-12-18 10:02:32','Mwanaisha','','ALLY','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121422341',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(192,NULL,'2014-12-18 10:02:33','Azizi','','ABUBAKARI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121448627',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(193,NULL,'2014-12-18 10:02:33','Florence','','AMANI ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121411167',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(194,NULL,'2014-12-18 10:02:33','Andrew','T','BWIRE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121191065',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(195,NULL,'2014-12-18 10:02:33','Mgendi','M','CHACHA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121111047',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(196,NULL,'2014-12-18 10:02:34','Abdallah','','DARUS ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121171069',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(197,NULL,'2014-12-18 10:02:34','Moteswa','J','FWALU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121131043',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(198,NULL,'2014-12-18 10:02:34','Hassan','','ISMAIL','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121421139',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(199,NULL,'2014-12-18 10:02:34','Clemence','','JOSHUA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121101051',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(200,NULL,'2014-12-18 10:02:34','Geofrey','J','KAHOLWE ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121461117',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(201,NULL,'2014-12-18 10:02:35','Geofrey','','KEAH','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121438631',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(202,NULL,'2014-12-18 10:02:35','Onesmo','','KISINDA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'501013152',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(203,NULL,'2014-12-18 10:02:35','Nathan','','KOMBA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121151049',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(204,NULL,'2014-12-18 10:02:35','Ignas','Michael','KWAI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121161073',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(205,NULL,'2014-12-18 10:02:36','Lucas','','LUDOVICK ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121101013',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(206,NULL,'2014-12-18 10:02:36','Emmanuel','M','LUHOLELA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121171007',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(207,NULL,'2014-12-18 10:02:36','Johnson','M','MABESA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121461099',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(208,NULL,'2014-12-18 10:02:36','Paulo','J','MADUHU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121111009',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(209,NULL,'2014-12-18 10:02:37','Amos','D','MALEMI ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121141015',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(210,NULL,'2014-12-18 10:02:37','Daud','Elisha','MATARO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121478671',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(211,NULL,'2014-12-18 10:02:37','Kelvin','Liberatus','MATERU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121121071',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(212,NULL,'2014-12-18 10:02:37','Ally','A','MBAMBA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121121057',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(213,NULL,'2014-12-18 10:02:38','Tatu','','MOHAMED','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121171002',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(214,NULL,'2014-12-18 10:02:38','Cainy','','MSELEMO ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121131067',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(215,NULL,'2014-12-18 10:02:38','Vicent','','MWANKENJA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121438047',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(216,NULL,'2014-12-18 10:02:38','Richard','H','MTINDO ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121421153',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(217,NULL,'2014-12-18 10:02:38','Grace','Mbuke','NDUNGILE','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121472339',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(218,NULL,'2014-12-18 10:02:39','Fredrick','','NTIGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121451107',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(219,NULL,'2014-12-18 10:02:39','Helena','','NYENYE','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121401010',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(220,NULL,'2014-12-18 10:02:39','Linus','D','NYONI ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121441135',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(221,NULL,'2014-12-18 10:02:40','Nandule','','OMARY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121191041',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(222,NULL,'2014-12-18 10:02:40','Joseph','W','ROGHEKO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121448707',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(223,NULL,'2014-12-18 10:02:40','Shemtuhu','Hiza','SHEMBILU','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120222181313',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(224,NULL,'2014-12-18 10:02:40','Ismaili','A','SIMBA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121191003',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(225,NULL,'2014-12-18 10:02:41','Clinton','B','SIRIA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121121019',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(226,NULL,'2014-12-18 10:02:41','Mussa','','ABEL','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121491161',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(227,NULL,'2014-12-18 10:02:41','Salma','A','AHMED ','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121411006',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(228,NULL,'2014-12-18 10:02:42','Talaa','','AHMED','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121431026',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(229,NULL,'2014-12-18 10:02:42','Jamali','','ALLY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'901016033',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(230,NULL,'2014-12-18 10:02:42','Edina','S','BUGENYI','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121492335',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(231,NULL,'2014-12-18 10:02:42','Frank','','DANIEL','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121448689',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(232,NULL,'2014-12-18 10:02:43','Asia','Rajabu','DIWANI ','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121451008',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(233,NULL,'2014-12-18 10:02:43','Daud','','EDWIN','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121191027',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(234,NULL,'2014-12-18 10:02:44','Stephano','','FELIX','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121161059',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(235,NULL,'2014-12-18 10:02:44','Alexander','','GUNDULA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'100101P7995',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(236,NULL,'2014-12-18 10:02:44','Juma','','HAMIS','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'601013605',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(237,NULL,'2014-12-18 10:02:45','Kulwa','','JOSEPH','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121151063',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(238,NULL,'2014-12-18 10:02:45','Bahaye','S','KASALA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121101037',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(239,NULL,'2014-12-18 10:02:45','Leita','M','KAYANDA ','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121461226',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(240,NULL,'2014-12-18 10:02:45','Robert','','KINYAKA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121121033',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(241,NULL,'2014-12-18 10:02:46','Mussa','A','KIZIGINA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121401091',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(242,NULL,'2014-12-18 10:02:46','Mussa','','LUGATA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121131005',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(243,NULL,'2014-12-18 10:02:46','Warda','','MADODI','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121401034',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(244,NULL,'2014-12-18 10:02:47','Evarist','','MAGAYANE ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121451145',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(245,NULL,'2014-12-18 10:02:47','Atimana','','MANGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121168485',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(246,NULL,'2014-12-18 10:02:47','Stimius','S','MBUNDA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121111023',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(247,NULL,'2014-12-18 10:02:48','Walii','A','MFINANGA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121141039',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(248,NULL,'2014-12-18 10:02:48','Donald','','MICHAEL','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121458043',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(249,NULL,'2014-12-18 10:02:48','Cleophas','M','MKAMA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121438443',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(250,NULL,'2014-12-18 10:02:49','Boniface','','MLOWEZI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121421115',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(251,NULL,'2014-12-18 10:02:49','Abddilahi','','MOHAMEDI ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121481175',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(252,NULL,'2014-12-18 10:02:49','Yusufu','L','MOHAMEDI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121491081',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(253,NULL,'2014-12-18 10:02:50','Bahati','L','MOSHA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121471004',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(254,NULL,'2014-12-18 10:02:50','Salesia','','MSIGWA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121441036',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(255,NULL,'2014-12-18 10:02:51','Awadhi','','MWAPOLOLO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121411087',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(256,NULL,'2014-12-18 10:02:51','Ally','','MUKHANDI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'100101P8000',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(257,NULL,'2014-12-18 10:02:51','Benedicto','E','NDAHANI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121491147',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(258,NULL,'2014-12-18 10:02:52','Meshack','L','NDATILA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121431149',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(259,NULL,'2014-12-18 10:02:52','Damian','','NGOLOMA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121421097',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(260,NULL,'2014-12-18 10:02:53','Joseph','','NYALUSI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121428051',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(261,NULL,'2014-12-18 10:02:53','Elisha','','NYAOLI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121431083',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(262,NULL,'2014-12-18 10:02:53','Joseph','','PASTORY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121431101',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(263,NULL,'2014-12-18 10:02:54','Hamisi','','RAJABU ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121401157',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(264,NULL,'2014-12-18 10:02:54','Hamisi','','SEIFU ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121471165',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(265,NULL,'2014-12-18 10:02:55','Abdallah','M','SELEMANI ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121181031',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(266,NULL,'2014-12-18 10:02:55','Nadhiwan','','SELEMANI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121478695',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(267,NULL,'2014-12-18 10:02:56','Richard','Amos','SHANYANGI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121108487',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(268,NULL,'2014-12-18 10:02:56','Barnabas','','SHIGELA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121401171',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(269,NULL,'2014-12-18 10:02:56','Masanja','','TANIKA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121411129',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(270,NULL,'2014-12-18 10:02:57','Kegna','J','YALIMBA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121411105',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(271,NULL,'2014-12-18 10:02:57','Japhet','John','AKILEI ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121478633',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(272,NULL,'2014-12-18 10:02:57','Hussein','Jummy','AMBOGO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121408649',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(273,NULL,'2014-12-18 10:02:58','Catherine','','BONIFACE','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121432337',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(274,NULL,'2014-12-18 10:02:58','Juma','Abdallah','DAUDI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121468647',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(275,NULL,'2014-12-18 10:02:58','Richard','','DOTTO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121468685',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(276,NULL,'2014-12-18 10:02:59','Sheranya','','ERASTO ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121448641',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(277,NULL,'2014-12-18 10:02:59','Denis','','GABRIEL','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121438655',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(278,NULL,'2014-12-18 10:03:00','Hassan','A','HASSAN','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121438617',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(279,NULL,'2014-12-18 10:03:00','Mussa','','IBRAHIM','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121161011',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(280,NULL,'2014-12-18 10:03:01','Jevis','','ISSACK','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121458637',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(281,NULL,'2014-12-18 10:03:01','Samson','','JEREMIA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121468661',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(282,NULL,'2014-12-18 10:03:01','Kelvin','J','KAMENGE ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121488035',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(283,NULL,'2014-12-18 10:03:02','Prisca','G','KASSILE','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121102329',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(284,NULL,'2014-12-18 10:03:02','Furaha','K','KIMARO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121408687',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(285,NULL,'2014-12-18 10:03:03','Mussa','','KISABO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121418635',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(286,NULL,'2014-12-18 10:03:03','Shamila','','LUANDA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121152331',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(287,NULL,'2014-12-18 10:03:03','Rashid','A','LUGOME','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121441159',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(288,NULL,'2014-12-18 10:03:04','Ramadhani','H','MADUNGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121471859',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(289,NULL,'2014-12-18 10:03:04','Goodluck','','MALIK','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121478619',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(290,NULL,'2014-12-18 10:03:05','Emanuel','','MASINGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121488643',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(291,NULL,'2014-12-18 10:03:05','Marko','E','MBAZI','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121468623',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(292,NULL,'2014-12-18 10:03:06','Hussein','J','MEENA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121498639',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(293,NULL,'2014-12-18 10:03:06','Athuman','','MOHAMED','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121498677',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(294,NULL,'2014-12-18 10:03:07','Zainabu','','MOHAMED','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121402345',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(295,NULL,'2014-12-18 10:03:07','Janethe','R','MOUSSA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121452333',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(296,NULL,'2014-12-18 10:03:07','Evaline','C','MREMA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121442347',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(297,NULL,'2014-12-18 10:03:08','Edwin','','MWENDWA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121418659',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(298,NULL,'2014-12-18 10:03:08','Kelvin','R','MUYA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'100101P7307',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(299,NULL,'2014-12-18 10:03:09','Mtoro','M','NDOMBA ','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121171045',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(300,NULL,'2014-12-18 10:03:09','Masuga','','NGELELA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121428621',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(301,NULL,'2014-12-18 10:03:10','Masanja','','NILLA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121488629',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(302,NULL,'2014-12-18 10:03:10','Fred','Goodluck','NYANGE','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121458675',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(303,NULL,'2014-12-18 10:03:11','Erick','Sule','ODHIAMBO','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121498615',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(304,NULL,'2014-12-18 10:03:11','Rozalina','Augostino','PANGUMA','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121462343',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(305,NULL,'2014-12-18 10:03:12','Seleman','Massoud','RASHID','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121408705',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(306,NULL,'2014-12-18 10:03:12','Athumani','Masumbuko','SAID','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121488681',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(307,NULL,'2014-12-18 10:03:13','Suleiman','S','SELEMAN','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121478657',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(308,NULL,'2014-12-18 10:03:13','Aisha','A','TWAHA ','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121191230',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(309,NULL,'2014-12-18 10:03:14','Boniface','','SILANGA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121458651',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(310,NULL,'2014-12-18 10:03:14','Stanley','S','WILBADY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'110121438061',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(311,NULL,'2014-12-18 10:03:15','David','','URIOH','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121488667',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(312,NULL,'2014-12-18 10:03:16','Naomi','','YONAH','F',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121482349',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(313,NULL,'2014-12-18 10:03:16','Deus','','ZACHARIA','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121438693',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,''),(314,NULL,'2014-12-18 10:03:17','Mustafa','','ZAVERY','M',NULL,'',NULL,NULL,NULL,'','',NULL,'2',NULL,'','','','',NULL,NULL,'120121438679',NULL,0,0,'',NULL,'','',0,'','',NULL,'',0,'');
/*!40000 ALTER TABLE `cis_students_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_students_fee_imports_crdb`
--

DROP TABLE IF EXISTS `cis_students_fee_imports_crdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_students_fee_imports_crdb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) DEFAULT NULL,
  `student_name` varchar(120) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `date_of_deposit` datetime DEFAULT NULL,
  `payinslip_id` varchar(45) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL,
  `checked_by` varchar(45) DEFAULT NULL,
  `payinslip_file` varchar(45) DEFAULT NULL,
  `form_iv_index` varchar(45) DEFAULT NULL,
  `receipt_id` varchar(45) DEFAULT NULL,
  `issues` text,
  `comments` text,
  `is_valid_payment` varchar(45) DEFAULT NULL,
  `paid_for` text,
  `import_date` datetime DEFAULT NULL,
  `bank_branch` varchar(80) DEFAULT NULL,
  `transaction_key` varchar(40) NOT NULL,
  `file_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `check_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transaction_key` (`transaction_key`),
  UNIQUE KEY `payinslip_id_index` (`payinslip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_students_fee_imports_crdb`
--

LOCK TABLES `cis_students_fee_imports_crdb` WRITE;
/*!40000 ALTER TABLE `cis_students_fee_imports_crdb` DISABLE KEYS */;
INSERT INTO `cis_students_fee_imports_crdb` VALUES (1,'1401601310724','Romanus William Gideme',350000,'2014-11-28 00:00:00','B32M0123101',1,'0','','FISRT YEAR',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:21','Azikiwe','B32M0123101',0,3,'2014-12-01 14:41:39'),(2,'1401601310724','Alex E. Shango',585500,'2014-11-28 00:00:00','B15P0355002',1,'0','','DIT',NULL,NULL,'Tuition fees',NULL,'Tuition fees','2014-11-30 17:43:21','Azikiwe','B15P0355002',0,3,'2014-12-01 14:43:12'),(3,'1401601310724','Kaijahabi   Willihelmina',650000,'2014-11-28 00:00:00','F33M0232301',1,'0','','120333491224',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:21','Holland House','F33M0232301',0,3,'2014-12-03 09:10:20'),(4,'1401601310724','Raymopnd Edmund',570500,'2014-11-28 00:00:00','F13S3238301',1,'0','','REG//////',NULL,NULL,'T/fee',NULL,'T/fee','2014-11-30 17:43:21','Holland House','F13S3238301',0,3,'2014-12-03 08:50:21'),(5,'1401601310732','Asifiwe Mathias',400,'2014-11-28 00:00:00','J19K0853601',1,'0','','1 YEAR',NULL,NULL,'Tution fee',NULL,'Tution fee','2014-11-30 17:43:21','Lumumba','J19K0853601',0,3,'2014-12-03 09:19:19'),(6,'CASH DEPOSIT','David Nashon',725500,'2014-11-28 00:00:00','J25E0240001',0,'automatic','','CASH DEPOSIT',NULL,NULL,'',NULL,'','2014-11-30 17:43:21','Lumumba','J25E0240001',0,3,'0000-00-00 00:00:00'),(7,'-','Gisabu Mbiti',30400,'2014-11-28 00:00:00','X44S0241001',0,'automatic','','-',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:21','Vijana','X44S0241001',0,3,'0000-00-00 00:00:00'),(8,'OD 11 C','Jamila M Ramadhani',72700,'2014-11-28 00:00:00','X42S0113301',0,'automatic','','OD 11 C',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:21','Vijana','X42S0113301',0,3,'0000-00-00 00:00:00'),(9,'OD 12 CI','Zeyana Mwalim Ali',72400,'2014-11-28 00:00:00','X42S0113201',0,'automatic','','OD 12 CI',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0113201',0,3,'0000-00-00 00:00:00'),(10,'FEE','Joseph Rugano',600000,'2014-11-28 00:00:00','X03R2621501',0,'automatic','','FEE',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2621501',0,3,'0000-00-00 00:00:00'),(11,'MECHANICAL ENGINEERING','Walter.m.melchior',69000,'2014-11-28 00:00:00','X11P0071601',0,'automatic','','MECHANICAL ENGINEERING',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X11P0071601',0,3,'0000-00-00 00:00:00'),(12,'924426','Chq. No',-1097760,'2014-11-28 00:00:00','X31M0466501',0,'automatic','','924426',NULL,NULL,'Christina mkoma',NULL,'Christina mkoma','2014-11-30 17:43:22','Vijana','X31M0466501',0,3,'0000-00-00 00:00:00'),(13,'924424','Chq. No',-1030000,'2014-11-28 00:00:00','X31M0466401',0,'automatic','','924424',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X31M0466401',0,3,'0000-00-00 00:00:00'),(14,'9021562','Christopher R Samson',10000,'2014-11-28 00:00:00','X44S0238501',0,'automatic','','9021562',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X44S0238501',0,3,'0000-00-00 00:00:00'),(15,'110647251263, BENG 12T','Juma H. Ramadhani',2000,'2014-11-28 00:00:00','X14M0626701',0,'automatic','','110647251263, BENG 12T',NULL,NULL,'High dipl transcrip',NULL,'High dipl transcrip','2014-11-30 17:43:22','Vijana','X14M0626701',0,3,'0000-00-00 00:00:00'),(16,'-','Hatib H. Hatib',10000,'2014-11-28 00:00:00','X08F0232901',0,'automatic','','-',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X08F0232901',0,3,'0000-00-00 00:00:00'),(17,'-','Prosper E. Mndeme',2000,'2014-11-28 00:00:00','X42S0109801',0,'automatic','','-',NULL,NULL,'Statement of result',NULL,'Statement of result','2014-11-30 17:43:22','Vijana','X42S0109801',0,3,'0000-00-00 00:00:00'),(18,'/','Gaudioz Rwechungura',2000,'2014-11-28 00:00:00','X14M0626301',0,'automatic','','/',NULL,NULL,'Transcript fees',NULL,'Transcript fees','2014-11-30 17:43:22','Vijana','X14M0626301',0,3,'0000-00-00 00:00:00'),(19,'110121191230','Aisha.a.twaha',72800,'2014-11-28 00:00:00','X11P0070901',1,'Students Import By ','','110121191230',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X11P0070901',0,3,'0000-00-00 00:00:00'),(20,'110232211455','Juma Moshi',220000,'2014-11-28 00:00:00','X11P0070401',0,'automatic','','110232211455',NULL,NULL,'Tuition fee&other c',NULL,'Tuition fee&other c','2014-11-30 17:43:22','Vijana','X11P0070401',0,3,'0000-00-00 00:00:00'),(21,'BEE','Anitha E. Gwera',40400,'2014-11-28 00:00:00','X08F0231301',0,'automatic','','BEE',NULL,NULL,'Tuition fees',NULL,'Tuition fees','2014-11-30 17:43:22','Vijana','X08F0231301',0,3,'0000-00-00 00:00:00'),(22,'REG NO////','Joshua Mpelembwa',190000,'2014-11-26 00:00:00','B14M0724501',0,'automatic','','REG NO////',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Azikiwe','B14M0724501',0,3,'0000-00-00 00:00:00'),(23,'//','Rivaldo Henry',710000,'2014-11-26 00:00:00','B19D0555001',0,'automatic','','//',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Azikiwe','B19D0555001',0,3,'0000-00-00 00:00:00'),(24,'REG////','Gerson E Kanza',710000,'2014-11-26 00:00:00','F13S3209801',0,'automatic','','REG////',NULL,NULL,'T/fee',NULL,'T/fee','2014-11-30 17:43:22','Holland House','F13S3209801',0,3,'0000-00-00 00:00:00'),(25,'MECHANICAL','Casian R  Komu',500000,'2014-11-26 00:00:00','KV2S1613701',0,'automatic','','MECHANICAL',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Ilala Serv. Center','KV2S1613701',0,3,'0000-00-00 00:00:00'),(26,'MINING','Iddy Khalipher',2000,'2014-11-26 00:00:00','KV2S1613401',0,'automatic','','MINING',NULL,NULL,'Exams reslut',NULL,'Exams reslut','2014-11-30 17:43:22','Ilala Serv. Center','KV2S1613401',0,3,'0000-00-00 00:00:00'),(27,'924418','Chq. No',-686000,'2014-11-26 00:00:00','X42S0093901',0,'automatic','','924418',NULL,NULL,'James issack',NULL,'James issack','2014-11-30 17:43:22','Vijana','X42S0093901',0,3,'0000-00-00 00:00:00'),(28,'924413','Chq. No',-240000,'2014-11-26 00:00:00','X03R2598601',0,'automatic','','924413',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X03R2598601',0,3,'0000-00-00 00:00:00'),(29,'924421','Chq. No',-200000,'2014-11-26 00:00:00','X03R2598501',0,'automatic','','924421',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X03R2598501',0,3,'0000-00-00 00:00:00'),(30,'924420','Chq. No',-980000,'2014-11-26 00:00:00','X03R2598401',0,'automatic','','924420',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X03R2598401',0,3,'0000-00-00 00:00:00'),(31,'924414','Chq. No',-160000,'2014-11-26 00:00:00','X03R2598301',0,'automatic','','924414',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X03R2598301',0,3,'0000-00-00 00:00:00'),(32,'924422','Chq. No',-8100000,'2014-11-26 00:00:00','X03R2598201',0,'automatic','','924422',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X03R2598201',0,3,'0000-00-00 00:00:00'),(33,'-','Frank Rutaihwa',2000,'2014-11-26 00:00:00','X44S0222801',0,'automatic','','-',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X44S0222801',0,3,'0000-00-00 00:00:00'),(34,'-','Asha Mgeni',137700,'2014-11-26 00:00:00','X08F0212501',0,'automatic','','-',NULL,NULL,'Tuition fees',NULL,'Tuition fees','2014-11-30 17:43:22','Vijana','X08F0212501',0,3,'0000-00-00 00:00:00'),(35,'-','Sauti M. Magesa',520000,'2014-11-26 00:00:00','X08F0212301',0,'automatic','','-',NULL,NULL,'Tuition fees',NULL,'Tuition fees','2014-11-30 17:43:22','Vijana','X08F0212301',0,3,'0000-00-00 00:00:00'),(36,'OD 11 C1','Zeyana Mwalim Ali',498000,'2014-11-26 00:00:00','X42S0092601',0,'automatic','','OD 11 C1',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0092601',0,3,'0000-00-00 00:00:00'),(37,'-','Jamila M Ramadhani',137700,'2014-11-26 00:00:00','X44S0222301',0,'automatic','','-',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X44S0222301',0,3,'0000-00-00 00:00:00'),(38,'FEE','Walter M. Melchior',84500,'2014-11-26 00:00:00','X03R2598101',0,'automatic','','FEE',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2598101',0,3,'0000-00-00 00:00:00'),(39,'FEE','Mihango',2000,'2014-11-26 00:00:00','X03R2598001',0,'automatic','','FEE',NULL,NULL,'Statement of result',NULL,'Statement of result','2014-11-30 17:43:22','Vijana','X03R2598001',0,3,'0000-00-00 00:00:00'),(40,'OD13LTB','Chagu Mandalu',2000,'2014-11-26 00:00:00','X42S0092401',0,'automatic','','OD13LTB',NULL,NULL,'Statement of result',NULL,'Statement of result','2014-11-30 17:43:22','Vijana','X42S0092401',0,3,'0000-00-00 00:00:00'),(41,'-','Lameck Zacharia',1000,'2014-11-26 00:00:00','X08F0211501',0,'automatic','','-',NULL,NULL,'Tuition fees',NULL,'Tuition fees','2014-11-30 17:43:22','Vijana','X08F0211501',0,3,'0000-00-00 00:00:00'),(42,'-','Ramadhani James',2000,'2014-11-26 00:00:00','X44S0220801',0,'automatic','','-',NULL,NULL,'Fee',NULL,'Fee','2014-11-30 17:43:22','Vijana','X44S0220801',0,3,'0000-00-00 00:00:00'),(43,'FEE','Mbaraka Ndete',200000,'2014-11-26 00:00:00','X03R2597101',0,'automatic','','FEE',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2597101',0,3,'0000-00-00 00:00:00'),(44,'FEE','Ephraim Obed',570400,'2014-11-26 00:00:00','X03R2596501',0,'automatic','','FEE',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2596501',0,3,'0000-00-00 00:00:00'),(45,'/','Shukuru A. Kassimu',75000,'2014-11-26 00:00:00','X14M0609201',0,'automatic','','/',NULL,NULL,'Sch fees',NULL,'Sch fees','2014-11-30 17:43:22','Vijana','X14M0609201',0,3,'0000-00-00 00:00:00'),(46,'FEE','Chipalo L. Kabohola',5000,'2014-11-26 00:00:00','X03R2594601',0,'automatic','','FEE',NULL,NULL,'Student id',NULL,'Student id','2014-11-30 17:43:22','Vijana','X03R2594601',0,3,'0000-00-00 00:00:00'),(47,'I YEAR','Eliasy Yohana Mbingamno',675000,'2014-11-26 00:00:00','X42S0088901',0,'automatic','','I YEAR',NULL,NULL,'Tuition fee',NULL,'Tuition fee','2014-11-30 17:43:22','Vijana','X42S0088901',0,3,'0000-00-00 00:00:00'),(48,'130121461121, OD 13 C3','Ramadhani M. Singano',570400,'2014-11-26 00:00:00','X42S0088601',0,'automatic','','130121461121, OD 13 C3',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0088601',0,3,'0000-00-00 00:00:00'),(49,'OD 13 CO','John Kaaya',570400,'2014-11-26 00:00:00','X42S0087901',0,'automatic','','OD 13 CO',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0087901',0,3,'0000-00-00 00:00:00'),(50,'FEES','Abdallah Madukwa',129400,'2014-11-26 00:00:00','X31M0455301',0,'automatic','','FEES',NULL,NULL,'Sch fees',NULL,'Sch fees','2014-11-30 17:43:22','Vijana','X31M0455301',0,3,'0000-00-00 00:00:00'),(51,'2014/2015','Daniel Masanja',480000,'2014-11-26 00:00:00','X42S0086801',0,'automatic','','2014/2015',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0086801',0,3,'0000-00-00 00:00:00'),(52,'FEES','Lameck Zacharia',215000,'2014-11-26 00:00:00','X31M0454101',0,'automatic','','FEES',NULL,NULL,'Sch fees',NULL,'Sch fees','2014-11-30 17:43:22','Vijana','X31M0454101',0,3,'0000-00-00 00:00:00'),(53,'II YEAR','Jackline P Samson',510000,'2014-11-26 00:00:00','X42S0086201',0,'automatic','','II YEAR',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0086201',0,3,'0000-00-00 00:00:00'),(54,'110333211695','Thobias M. Maharage',2000,'2014-11-26 00:00:00','X03R2590701',0,'automatic','','110333211695',NULL,NULL,'Statement of result',NULL,'Statement of result','2014-11-30 17:43:22','Vijana','X03R2590701',0,3,'0000-00-00 00:00:00'),(55,'DIT','Valentine Samson',500000,'2014-11-18 00:00:00','B15P0255601',0,'automatic','','DIT',NULL,NULL,'Tuition fees',NULL,'Tuition fees','2014-11-30 17:43:22','Azikiwe','B15P0255601',0,3,'0000-00-00 00:00:00'),(56,'BACHELOR','Moses Kimaro',300000,'2014-11-18 00:00:00','AR0B0810101',0,'automatic','','BACHELOR',NULL,NULL,'Tuition fee',NULL,'Tuition fee','2014-11-30 17:43:22','Azikiwe Premier','AR0B0810101',0,3,'0000-00-00 00:00:00'),(57,'/////////////////////////','Goodluck Lufyagile',200000,'2014-11-18 00:00:00','F04M0509101',0,'automatic','','/////////////////////////',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Holland House','F04M0509101',0,3,'0000-00-00 00:00:00'),(58,'CASH DEPOSITGOODLUCK','Goodluck',-200000,'2014-11-18 00:00:00','F04M0509001',0,'automatic','','CASH DEPOSITGOODLUCK',NULL,NULL,'Cash depo',NULL,'Cash depo','2014-11-30 17:43:22','Holland House','F04M0509001',0,3,'0000-00-00 00:00:00'),(59,'IT','Ally I Mtoro',70400,'2014-11-18 00:00:00','KV2S1542301',0,'automatic','','IT',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Ilala Serv. Center','KV2S1542301',0,3,'0000-00-00 00:00:00'),(60,'LEVEL SIX 2013/2014','Salim .a. Kitolla',2000,'2014-11-18 00:00:00','J29S0076401',0,'automatic','','LEVEL SIX 2013/2014',NULL,NULL,'Results',NULL,'Results','2014-11-30 17:43:22','Lumumba','J29S0076401',0,3,'0000-00-00 00:00:00'),(61,'CASH DEPOSIT','J Manyama',4000,'2014-11-18 00:00:00','S75M0346801',0,'automatic','','CASH DEPOSIT',NULL,NULL,'',NULL,'','2014-11-30 17:43:22','Pugu Road','S75M0346801',0,3,'0000-00-00 00:00:00'),(62,'DIPLOMA','Abednego Mhagama',570400,'2014-11-18 00:00:00','DH6M0154001',0,'automatic','','DIPLOMA',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Ubungo','DH6M0154001',0,3,'0000-00-00 00:00:00'),(63,'924369','Chq. No',-1170000,'2014-11-18 00:00:00','X42S0029401',0,'automatic','','924369',NULL,NULL,'Hassan m chunga',NULL,'Hassan m chunga','2014-11-30 17:43:22','Vijana','X42S0029401',0,3,'0000-00-00 00:00:00'),(64,'/','Swalehe Said Y',2000,'2014-11-18 00:00:00','X14M0569101',0,'automatic','','/',NULL,NULL,'Statement of result',NULL,'Statement of result','2014-11-30 17:43:22','Vijana','X14M0569101',0,3,'0000-00-00 00:00:00'),(65,'924378','Chq. No',-1350000,'2014-11-18 00:00:00','X31M0358901',0,'automatic','','924378',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X31M0358901',0,3,'0000-00-00 00:00:00'),(66,'924377','Chq. No',-1800000,'2014-11-18 00:00:00','X31M0358801',0,'automatic','','924377',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X31M0358801',0,3,'0000-00-00 00:00:00'),(67,'924374','Chq. No',-720000,'2014-11-18 00:00:00','X31M0358701',0,'automatic','','924374',NULL,NULL,'Elton mhamilawa',NULL,'Elton mhamilawa','2014-11-30 17:43:22','Vijana','X31M0358701',0,3,'0000-00-00 00:00:00'),(68,'924355','Chq. No',-500000,'2014-11-18 00:00:00','X31M0358601',0,'automatic','','924355',NULL,NULL,'Tulinave s lupembe',NULL,'Tulinave s lupembe','2014-11-30 17:43:22','Vijana','X31M0358601',0,3,'0000-00-00 00:00:00'),(69,'924368','Chq. No',-842000,'2014-11-18 00:00:00','X31M0358101',0,'automatic','','924368',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X31M0358101',0,3,'0000-00-00 00:00:00'),(70,'924354','Chq. No',-720000,'2014-11-18 00:00:00','X31M0358001',0,'automatic','','924354',NULL,NULL,'Elton',NULL,'Elton','2014-11-30 17:43:22','Vijana','X31M0358001',0,3,'0000-00-00 00:00:00'),(71,'13022231959, I YEAR','Samwel Evarist',300000,'2014-11-18 00:00:00','X42S0027201',0,'automatic','','13022231959, I YEAR',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X42S0027201',0,3,'0000-00-00 00:00:00'),(72,'FEE','Elwin S. Msemo',2000,'2014-11-18 00:00:00','X03R2531401',0,'automatic','','FEE',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2531401',0,3,'0000-00-00 00:00:00'),(73,'110525498003','Ally H Swedi',2000,'2014-11-18 00:00:00','X31M0353301',0,'automatic','','110525498003',NULL,NULL,'Transcript fee',NULL,'Transcript fee','2014-11-30 17:43:22','Vijana','X31M0353301',0,3,'0000-00-00 00:00:00'),(74,'11042112285','Bunanze S. Bunanze',10000,'2014-11-18 00:00:00','X14M0567201',0,'automatic','','11042112285',NULL,NULL,'Transcript fee',NULL,'Transcript fee','2014-11-30 17:43:22','Vijana','X14M0567201',0,3,'0000-00-00 00:00:00'),(75,'130627482169','Frank Revelian',150000,'2014-11-18 00:00:00','X03R2528501',0,'automatic','','130627482169',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2528501',0,3,'0000-00-00 00:00:00'),(76,'/','Tumain Mabala',2000,'2014-11-18 00:00:00','X14M0567001',0,'automatic','','/',NULL,NULL,'Result slip',NULL,'Result slip','2014-11-30 17:43:22','Vijana','X14M0567001',0,3,'0000-00-00 00:00:00'),(77,'ELECTRICAL','Boniface E. Ndidi',400000,'2014-11-18 00:00:00','X03R2527801',0,'automatic','','ELECTRICAL',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X03R2527801',0,3,'0000-00-00 00:00:00'),(78,'130121421827','Hassan Salumu',110000,'2014-11-18 00:00:00','X11P0023201',0,'automatic','','130121421827',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X11P0023201',0,3,'0000-00-00 00:00:00'),(79,'MECHANICAL ENGINEERING','Hussein Khamis',10000,'2014-11-18 00:00:00','X11P0022101',0,'automatic','','MECHANICAL ENGINEERING',NULL,NULL,'Fees',NULL,'Fees','2014-11-30 17:43:22','Vijana','X11P0022101',0,3,'0000-00-00 00:00:00'),(80,'MECHANICAL ENGINEERING','Peter.n.thomas',-580000,'2014-11-18 00:00:00','X11P0021801',0,'automatic','','MECHANICAL ENGINEERING',NULL,NULL,'School feespeter.n.',NULL,'School feespeter.n.','2014-11-30 17:43:22','Vijana','X11P0021801',0,3,'0000-00-00 00:00:00'),(81,'MECHANICAL ENGINEERING','Peter.n.thomas',580000,'2014-11-18 00:00:00','X11P0021901',0,'automatic','','MECHANICAL ENGINEERING',NULL,NULL,'School fees',NULL,'School fees','2014-11-30 17:43:22','Vijana','X11P0021901',0,3,'0000-00-00 00:00:00'),(82,'FEE','Abdallah Gogomeko',2000,'2014-11-18 00:00:00','X03R2525001',0,'automatic','','FEE',NULL,NULL,'Results slip',NULL,'Results slip','2014-11-30 17:43:22','Vijana','X03R2525001',0,3,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cis_students_fee_imports_crdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_students_fee_imports_loans`
--

DROP TABLE IF EXISTS `cis_students_fee_imports_loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_students_fee_imports_loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) DEFAULT NULL,
  `semester_amount` double NOT NULL,
  `date_of_deposit` datetime DEFAULT NULL,
  `payinslip_id` varchar(45) DEFAULT NULL,
  `checked` int(11) DEFAULT '0',
  `checked_by` varchar(45) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `form_iv_index` varchar(45) DEFAULT NULL,
  `receipt_id` varchar(45) DEFAULT NULL,
  `issues` text,
  `comments` text,
  `is_valid_payment` varchar(45) DEFAULT NULL,
  `paid_for` text,
  `import_date` datetime DEFAULT NULL,
  `import_type` int(1) DEFAULT NULL,
  `import_by` varchar(45) DEFAULT NULL,
  `paid_amount` double NOT NULL,
  `current_yos` int(11) NOT NULL,
  `assigned_yos` int(11) NOT NULL,
  `academic_year` varchar(10) DEFAULT NULL,
  `ac_year_id` int(11) NOT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `reference_id` varchar(20) DEFAULT NULL,
  `approval_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference_id_index` (`reference_id`),
  UNIQUE KEY `academic_year_student_id_index` (`academic_year`,`student_id`),
  UNIQUE KEY `ac_year_id_student_id_index` (`ac_year_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_students_fee_imports_loans`
--

LOCK TABLES `cis_students_fee_imports_loans` WRITE;
/*!40000 ALTER TABLE `cis_students_fee_imports_loans` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_students_fee_imports_loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_students_fee_imports_other`
--

DROP TABLE IF EXISTS `cis_students_fee_imports_other`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_students_fee_imports_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `cheque_id` varchar(80) DEFAULT NULL,
  `comments` text,
  `date_added` datetime DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `sponsor_type` varchar(45) DEFAULT NULL,
  `sponsor_info` text,
  `year_of_service` date DEFAULT NULL,
  `file_id` varchar(45) DEFAULT NULL,
  `checked` int(11) NOT NULL DEFAULT '0',
  `checked_by` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_students_fee_imports_other`
--

LOCK TABLES `cis_students_fee_imports_other` WRITE;
/*!40000 ALTER TABLE `cis_students_fee_imports_other` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_students_fee_imports_other` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_sys_config`
--

DROP TABLE IF EXISTS `cis_sys_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_sys_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_details_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `code_name` varchar(45) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `version` varchar(45) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `company_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `dev_credit` varchar(45) DEFAULT NULL,
  `dev_contact` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` text,
  `fire_afi` int(11) NOT NULL DEFAULT '1',
  `support_email` varchar(60) NOT NULL,
  `registration_deadline` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sys_id_UNIQUE` (`id`),
  KEY `fk_cis_sys_config_cis_org_details1_idx` (`org_details_id`),
  CONSTRAINT `cis_sys_org_details` FOREIGN KEY (`org_details_id`) REFERENCES `cis_org_details` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_sys_config`
--

LOCK TABLES `cis_sys_config` WRITE;
/*!40000 ALTER TABLE `cis_sys_config` DISABLE KEYS */;
INSERT INTO `cis_sys_config` VALUES (1,1,1,'cores-cis','Students Information System','2014.1.0.1.9','3wave tech','oautech.net','Ombeni Aidani (oau)','','CORES','College/Institute Students Information System',1,'ombeniaidani@gmail.com','2014-10-23 04:57:00');
/*!40000 ALTER TABLE `cis_sys_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_sys_maigrab_config`
--

DROP TABLE IF EXISTS `cis_sys_maigrab_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_sys_maigrab_config` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sender` varchar(100) DEFAULT NULL,
  `receiver` varchar(100) DEFAULT NULL,
  `subject` text,
  `match_text` text,
  `server` varchar(45) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `run_interval` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_sys_maigrab_config`
--

LOCK TABLES `cis_sys_maigrab_config` WRITE;
/*!40000 ALTER TABLE `cis_sys_maigrab_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_sys_maigrab_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_sys_revisitions`
--

DROP TABLE IF EXISTS `cis_sys_revisitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_sys_revisitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_id` int(11) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `ver` varchar(45) DEFAULT NULL,
  `changes` tinyblob,
  `last_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_revision_id_idx` (`sys_id`),
  CONSTRAINT `sys_revision_id` FOREIGN KEY (`sys_id`) REFERENCES `cis_sys_config` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_sys_revisitions`
--

LOCK TABLES `cis_sys_revisitions` WRITE;
/*!40000 ALTER TABLE `cis_sys_revisitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_sys_revisitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_sys_user`
--

DROP TABLE IF EXISTS `cis_sys_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_number_id` varchar(45) DEFAULT NULL,
  `login_id` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `dt_registered` datetime DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `login_status` int(1) DEFAULT NULL,
  `is_student` int(1) DEFAULT NULL,
  `acc_activate_code` varchar(100) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `profile` varchar(45) DEFAULT NULL,
  `is_department_user` int(1) DEFAULT '0',
  `is_other_department` int(1) DEFAULT '0',
  `department_id` int(11) DEFAULT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `mname` varchar(60) NOT NULL,
  `profile_photo` tinytext NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `access_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_id_UNIQUE` (`login_id`),
  KEY `fk_cis_sys_user_cis_student_registration_id1_idx` (`registration_number_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_sys_user`
--

LOCK TABLES `cis_sys_user` WRITE;
/*!40000 ALTER TABLE `cis_sys_user` DISABLE KEYS */;
INSERT INTO `cis_sys_user` VALUES (1,NULL,'admin','d7b21d2eb8e5ee564c13a7dadbbbd9c8','m',0,'0000-00-00 00:00:00','1970-01-01 03:00:00','2014-12-20 11:12:24',1,0,'1','ombeniaidani@ghmail.com','admin',0,0,NULL,'System','Administration','','admin.jpeg',1,1),(4,'','admission','d7b21d2eb8e5ee564c13a7dadbbbd9c8','m',0,'2014-10-23 23:59:52','1970-01-01 03:00:00','2014-12-18 10:37:19',1,0,'0','admission@ditnet.ac.tz','admission',0,0,0,'Admission','Officer','  ','',1,1),(27,NULL,'hosea','4cbddcf8595a3d34ce9d6d163b3211b8','M',0,'2014-11-04 04:57:00','1970-01-01 03:00:00','2014-12-18 10:55:44',1,0,NULL,'hosead@gmail.com','department',1,0,1,'Hosea','Shimwela','','',1,1),(33,'1401601310724','1401601310724','25dcee8852b389275a6bf23722f32f7f','F',0,'2014-12-03 09:22:42','1970-01-01 03:00:00','2014-12-10 01:12:36',1,1,'Kaza_547eac3219b61bc3cae56dd57e85f4faa19e7a7fdee4a','ombeniaidani@yahoo.com','student',0,0,NULL,'MARIA','ISSAKA','EZEKIEL','1401601310724.jpg',1,1),(34,'1401601310732','1401601310732','d7b21d2eb8e5ee564c13a7dadbbbd9c8','F',0,'2014-12-05 19:58:25','1970-01-01 03:00:00','2014-12-20 02:39:00',1,1,'b6665ed1bd5d66d10b365b8c1f7839f187b94675','ombeniaidani@gmail.com','student',0,0,NULL,'ASYA','SAID','SABRI','',1,0),(35,'1401301120225','1401301120225','d7b21d2eb8e5ee564c13a7dadbbbd9c8','M',0,'2014-12-18 01:52:31',NULL,NULL,NULL,1,'d0beaaa142f249ef02854ed8c800288ed3e32178','robert@gmail.com','student',0,0,NULL,'Rodrick','Mbanga','Robert','',1,0),(36,NULL,'johnmichael','0acf4539a14b3aa27deeb4cbdf6e989f','M',0,'2014-12-18 11:45:13','1970-01-01 03:00:00','2014-12-18 11:47:30',1,0,NULL,'johnmichael@gmail.com','department',1,0,5,'John','Michael','','',1,1),(37,NULL,'finance','d7b21d2eb8e5ee564c13a7dadbbbd9c8','M',0,'2014-12-18 13:07:58','1970-01-01 03:00:00','2014-12-18 01:09:32',1,0,NULL,'ombeniaidani@yahoo.cu','finance',0,0,NULL,'Finance','Admin','','',1,1);
/*!40000 ALTER TABLE `cis_sys_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_sys_user_category`
--

DROP TABLE IF EXISTS `cis_sys_user_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_sys_user_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) DEFAULT NULL,
  `cat_profile` varchar(80) DEFAULT NULL,
  `description` tinytext,
  `permission_set` int(11) DEFAULT NULL,
  `max_members` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`parent_id`),
  KEY `fk_cis_sys_user_category_cis_sys_user_category1_idx` (`parent_id`),
  CONSTRAINT `fk_cis_sys_user_category_cis_sys_user_category1` FOREIGN KEY (`parent_id`) REFERENCES `cis_sys_user_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_sys_user_category`
--

LOCK TABLES `cis_sys_user_category` WRITE;
/*!40000 ALTER TABLE `cis_sys_user_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_sys_user_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_user_asigned_category`
--

DROP TABLE IF EXISTS `cis_user_asigned_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_user_asigned_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`user_id`,`category_id`),
  KEY `fk_cis_sys_user_has_cis_sys_user_category_cis_sys_user_cate_idx` (`category_id`),
  KEY `fk_cis_sys_user_has_cis_sys_user_category_cis_sys_user1_idx` (`user_id`),
  CONSTRAINT `fk_cis_sys_user_has_cis_sys_user_category_cis_sys_user1` FOREIGN KEY (`user_id`) REFERENCES `cis_sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cis_sys_user_has_cis_sys_user_category_cis_sys_user_catego1` FOREIGN KEY (`category_id`) REFERENCES `cis_sys_user_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_user_asigned_category`
--

LOCK TABLES `cis_user_asigned_category` WRITE;
/*!40000 ALTER TABLE `cis_user_asigned_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_user_asigned_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_user_files`
--

DROP TABLE IF EXISTS `cis_user_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_user_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(40) DEFAULT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `content_type` varchar(40) NOT NULL,
  `remarks` text NOT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `file_url` varchar(100) NOT NULL,
  `imported_to_db` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_user_files`
--

LOCK TABLES `cis_user_files` WRITE;
/*!40000 ALTER TABLE `cis_user_files` DISABLE KEYS */;
INSERT INTO `cis_user_files` VALUES (195,'students_template_list_1414504769.xls','admin','2014-11-03 14:28:16',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list_1414504769.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list_141450',0),(196,'students_template_list_1414504769_141501','admin','2014-11-03 14:33:14',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list_1414504769_141501','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list_141450',0),(197,'students_template_list_1414504769_141501','admin','2014-11-03 14:36:32',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list_1414504769_141501','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list_141450',0),(198,'students_template_list_1414504769_141501','admin','2014-11-03 14:37:19',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list_1414504769_141501','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list_141450',0),(199,'students_template_list.xls','admin','2014-11-03 14:55:02',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list.xls',0),(200,'students_template_list_1415015936.xls','admin','2014-11-03 14:58:56',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list_1415015936.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list_141501',0),(201,'loans_template.xls','admin','2014-11-03 21:42:35',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template.xls',0),(202,'loans_template_1415040366.xls','admin','2014-11-03 21:46:06',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415040366.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415040366.xls',0),(203,'loans_template_1415040543.xls','admin','2014-11-03 21:49:03',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415040543.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415040543.xls',0),(204,'loans_template_1415040888.xls','admin','2014-11-03 21:54:48',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415040888.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415040888.xls',0),(205,'loans_template_1415041086.xls','admin','2014-11-03 21:58:06',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041086.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041086.xls',0),(206,'loans_template_1415041181.xls','admin','2014-11-03 21:59:41',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041181.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041181.xls',0),(207,'loans_template_1415041218.xls','admin','2014-11-03 22:00:18',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041218.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041218.xls',0),(208,'students_template_list.xls','admin','2014-11-03 22:02:06',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/students_template_list.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=students_template_list.xls',0),(209,'loans_template_1415041345.xls','admin','2014-11-03 22:02:25',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041345.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041345.xls',0),(210,'loans_template_1415041594.xls','admin','2014-11-03 22:06:34',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041594.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041594.xls',0),(211,'loans_template_1415041696.xls','admin','2014-11-03 22:08:16',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041696.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041696.xls',0),(212,'loans_template_1415041799.xls','admin','2014-11-03 22:09:59',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415041799.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415041799.xls',0),(213,'loans_template_1415042111.xls','admin','2014-11-03 22:15:11',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415042111.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415042111.xls',0),(214,'loans_template_1415042325.xls','admin','2014-11-03 22:18:45',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415042325.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415042325.xls',0),(215,'commands.xls','admin','2014-11-03 22:25:55',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands.xls',0),(216,'loans_template_1415086408.xls','admin','2014-11-04 10:33:28',0,'loan','','/mnt/hgfs/www/cis/application/files/administration/loans/loans_template_1415086408.xls','http://cores.oau.com/upload_file/download_file?type=loan&file=loans_template_1415086408.xls',0),(217,'commands_1415086526.xls','admin','2014-11-04 10:35:26',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_1415086526.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_1415086526.xls',0),(218,'Class-OD12coe.xls','admin','2014-11-06 10:38:48',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe.xls',0),(219,'Class-OD12coe_1415259687.xls','admin','2014-11-06 10:41:27',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415259687.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415259687.xls',0),(220,'Class-OD12coe_1415259790.xls','admin','2014-11-06 10:43:10',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415259790.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415259790.xls',0),(221,'Class-OD12coe_1415260042.xls','admin','2014-11-06 10:47:22',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415260042.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415260042.xls',0),(222,'Class-OD12coe_1415260979.xls','admin','2014-11-06 11:02:59',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415260979.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415260979.xls',0),(223,'Class-OD12coe_1415261128.xls','admin','2014-11-06 11:05:28',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415261128.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415261128.xls',0),(224,'Class-OD12coe_1415261652.xls','admin','2014-11-06 11:14:12',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415261652.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415261652.xls',0),(225,'Class-OD12coe_1415261870.xls','admin','2014-11-06 11:17:50',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1415261870.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1415261870.xls',0),(226,'commands_template_list.xls','admin','2014-11-06 12:03:40',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list.xls',0),(227,'commands_template_list_1415264806.xls','admin','2014-11-06 12:06:46',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415264806.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141526',0),(228,'Class-beng12-3years - coe.xls','admin','2014-11-06 13:46:35',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe.xls',0),(229,'commands_template_list_1415271064.xls','admin','2014-11-06 13:51:04',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415271064.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141527',0),(230,'commands_template_list_1415271156.xls','admin','2014-11-06 13:52:36',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415271156.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141527',0),(231,'commands_template_list_1415277797.xls','admin','2014-11-06 15:43:17',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415277797.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141527',0),(232,'commands_template_list_1415277864.xls','admin','2014-11-06 15:44:24',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415277864.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141527',0),(233,'commands_template_list_1415287965.xls','admin','2014-11-06 18:32:45',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415287965.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141528',0),(234,'commands_template_list_1415287965_141529','admin','2014-11-06 19:57:54',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415287965_141529','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141528',0),(235,'commands_template_list_1415287965_141529','admin','2014-11-06 20:01:57',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415287965_141529','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141528',0),(236,'Class-beng12-3years - coe - Copy.xls','admin','2014-11-07 06:38:44',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(237,'commands_template_list.xls','admin','2014-11-07 07:05:33',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list.xls',0),(238,'commands_template_list_1415333332.xls','admin','2014-11-07 07:08:52',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415333332.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141533',0),(239,'Class-beng12-3years - coe - Copy_1415344','admin','2014-11-07 10:09:48',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415344','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(240,'commands_template_list_1415344205.xls','admin','2014-11-07 10:10:05',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415344205.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(241,'Class-beng12-3years - coe - Copy_1415345','admin','2014-11-07 10:30:25',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415345','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(242,'commands_template_list_1415345440.xls','admin','2014-11-07 10:30:40',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415345440.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(243,'commands_template_list_1415345569.xls','admin','2014-11-07 10:32:49',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415345569.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(244,'Class-beng12-3years - coe - Copy_1415346','admin','2014-11-07 10:46:50',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415346','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(245,'commands_template_list_1415346801.xls','admin','2014-11-07 10:53:21',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415346801.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(246,'Class-beng12-3years - coe - Copy_1415347','admin','2014-11-07 10:57:35',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415347','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(247,'commands_template_list_1415347174.xls','admin','2014-11-07 10:59:34',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415347174.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(248,'Class-beng12-3years - coe - Copy_1415347','admin','2014-11-07 11:03:42',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415347','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(249,'commands_template_list_1415347430.xls','admin','2014-11-07 11:03:50',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415347430.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(250,'Class-beng12-3years - coe - Copy_1415347','admin','2014-11-07 11:12:49',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415347','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(251,'commands_template_list_1415347976.xls','admin','2014-11-07 11:12:56',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415347976.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(252,'Class-beng12-3years - coe - Copy_1415348','admin','2014-11-07 11:18:05',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415348','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(253,'commands_template_list_1415348292.xls','admin','2014-11-07 11:18:12',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415348292.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(254,'Class-beng12-3years - coe - Copy_1415348','admin','2014-11-07 11:25:30',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415348','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(255,'commands_template_list_1415348738.xls','admin','2014-11-07 11:25:38',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415348738.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(256,'Class-beng12-3years - coe - Copy_1415349','admin','2014-11-07 11:32:01',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415349','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(257,'commands_template_list_1415349447.xls','admin','2014-11-07 11:37:27',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415349447.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(258,'Class-beng12-3years - coe - Copy_1415349','admin','2014-11-07 11:40:44',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415349','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(259,'commands_template_list_1415349685.xls','admin','2014-11-07 11:41:25',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415349685.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(260,'commands_template_list_1415349751.xls','admin','2014-11-07 11:42:31',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415349751.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(261,'Class-beng12-3years - coe - Copy_1415349','admin','2014-11-07 11:44:46',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415349','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(262,'commands_template_list_1415349896.xls','admin','2014-11-07 11:44:56',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415349896.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141534',0),(263,'Class-beng12-3years - coe - Copy_1415350','admin','2014-11-07 11:51:44',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415350','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(264,'commands_template_list_1415350432.xls','admin','2014-11-07 11:53:52',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415350432.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141535',0),(265,'Class-beng12-3years - coe - Copy_1415351','admin','2014-11-07 12:11:04',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415351','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(266,'commands_template_list_1415352122.xls','admin','2014-11-07 12:22:02',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/commands_template_list_1415352122.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=commands_template_list_141535',0),(267,'Class-beng12-3years - coe - Copy_1415352','admin','2014-11-07 12:26:58',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415352','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(268,'Class-beng12-3years - coe - Copy_1415356','admin','2014-11-07 13:27:13',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415356','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(269,'Class-beng12-3years - coe - Copy_1415387','admin','2014-11-07 22:04:27',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415387','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(270,'Class-beng12-3years - coe - Copy_1415388','admin','2014-11-07 22:33:42',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415388','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(271,'Class-beng12-3years - coe - Copy_1415389','admin','2014-11-07 22:42:36',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415389','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(272,'Class-beng12-3years - coe - Copy_1415390','admin','2014-11-07 22:55:36',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415390','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(273,'Class-beng12-3years - coe - Copy_1415390','admin','2014-11-07 22:56:17',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415390','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(274,'Class-beng12-3years - coe - Copy_1415437','admin','2014-11-08 12:07:50',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415437','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(275,'Class-beng12-3years - coe - Copy_1415458','admin','2014-11-08 18:02:08',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415458','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(276,'Class-beng12-3years - coe - Copy_1415479','admin','2014-11-08 23:53:13',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415479','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(277,'Class-beng12-3years - coe - Copy_1415490','admin','2014-11-09 02:53:58',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415490','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(278,'Class-beng12-3years - coe - Copy_1415492','admin','2014-11-09 03:28:05',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng12-3years - coe - Copy_1415492','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng12-3years - coe - C',0),(279,'Class-OD12coe.xls','admin','2014-11-09 03:47:00',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe.xls',0),(280,'Class-beng13-3-4years - coe.xls','admin','2014-11-09 04:06:18',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng13-3-4years - coe.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng13-3-4years - coe.x',0),(281,'Class-beng13-3-4years - coe_1415495244.x','admin','2014-11-09 04:07:24',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng13-3-4years - coe_1415495244.x','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng13-3-4years - coe_1',0),(282,'class-beng14 3yr & new 4years.xls','admin','2014-11-09 04:16:41',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(283,'class-beng14 3yr & new 4years_1415496810','admin','2014-11-09 04:33:31',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1415496810','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(284,'Class-beng13-3-4years - coe_1415496927.x','admin','2014-11-09 04:35:27',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-beng13-3-4years - coe_1415496927.x','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-beng13-3-4years - coe_1',0),(285,'class-beng14 3yr & new 4years_1415514578','admin','2014-11-09 09:29:38',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1415514578','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(286,'d41d8cd98f00b204e9800998ecf8427e/2560.jp','BENG414-COE-10001','2014-11-18 18:29:02',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/d41d8cd98f00b204e9800998ecf8427e/2560.jpg','http://cores.oau.com/upload_file/download_file?type=students_list&file=d41d8cd98f00b204e9800998ecf84',0),(287,'d41d8cd98f00b204e9800998ecf8427e/1245127','BENG414-COE-10001','2014-11-18 18:31:13',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/d41d8cd98f00b204e9800998ecf8427e/124512718_ae82235dc6_o','http://cores.oau.com/upload_file/download_file?type=students_list&file=d41d8cd98f00b204e9800998ecf84',0),(288,'a3344a8377b625bd2ec0a447b3788e9d/DSC0082','BENG414-COE-10001','2014-11-18 18:42:04',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/DSC00827.JPG','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(289,'a3344a8377b625bd2ec0a447b3788e9d/1245127','BENG414-COE-10001','2014-11-18 18:43:06',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/124512718_ae82235dc6_o','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(290,'a3344a8377b625bd2ec0a447b3788e9d/2557531','BENG414-COE-10001','2014-11-18 18:45:43',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/255753113190.jpg','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(291,'a3344a8377b625bd2ec0a447b3788e9d/2014100','BENG414-COE-10001','2014-11-18 18:54:21',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/20141003_153752_474.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(292,'a3344a8377b625bd2ec0a447b3788e9d/IMG_201','BENG414-COE-10001','2014-11-18 18:55:55',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/IMG_20141003_154151.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(293,'a3344a8377b625bd2ec0a447b3788e9d/IMG_201','BENG414-COE-10001','2014-11-18 18:56:04',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/IMG_20141003_163931.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(294,'a3344a8377b625bd2ec0a447b3788e9d/IMG_201','BENG414-COE-10001','2014-11-18 18:56:13',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/IMG_20141003_154258.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(295,'a3344a8377b625bd2ec0a447b3788e9d/IMG_201','BENG414-COE-10001','2014-11-18 18:58:15',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/a3344a8377b625bd2ec0a447b3788e9d/IMG_20141003_154231.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=a3344a8377b625bd2ec0a447b3788',0),(296,'8e270cb40dd985a754169db061ced94d/2014100','BENG314-COE-10004','2014-11-19 13:52:34',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/8e270cb40dd985a754169db061ced94d/20141003_153743_429.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=8e270cb40dd985a754169db061ced',0),(297,'8e270cb40dd985a754169db061ced94d/IMG_201','BENG314-COE-10004','2014-11-19 13:52:49',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/8e270cb40dd985a754169db061ced94d/IMG_20141003_164031.jp','http://cores.oau.com/upload_file/download_file?type=students_list&file=8e270cb40dd985a754169db061ced',0),(298,'8e270cb40dd985a754169db061ced94d/DIT.pdf','BENG314-COE-10004','2014-11-19 15:14:26',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/8e270cb40dd985a754169db061ced94d/DIT.pdf','http://cores.oau.com/upload_file/download_file?type=students_list&file=8e270cb40dd985a754169db061ced',0),(299,'8e270cb40dd985a754169db061ced94d/complet','BENG314-COE-10004','2014-11-19 15:24:47',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/8e270cb40dd985a754169db061ced94d/completed_first_time_a','http://cores.oau.com/upload_file/download_file?type=students_list&file=8e270cb40dd985a754169db061ced',0),(300,'8e270cb40dd985a754169db061ced94d/1245127','BENG314-COE-10004','2014-11-19 15:30:49',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/8e270cb40dd985a754169db061ced94d/124512718_ae82235dc6_o','http://cores.oau.com/upload_file/download_file?type=students_list&file=8e270cb40dd985a754169db061ced',0),(301,'8e270cb40dd985a754169db061ced94d/DSC0082','BENG314-COE-10004','2014-11-19 23:13:46',0,'students_list','','/mnt/hgfs/www/cis/application/files/students/8e270cb40dd985a754169db061ced94d/DSC00827.JPG','http://cores.oau.com/upload_file/download_file?type=students_list&file=8e270cb40dd985a754169db061ced',0),(302,'class-beng14 3yr & new 4years_1416524100','admin','2014-11-21 01:55:00',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1416524100','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(303,'class-beng14 3yr & new 4years_1416527941','admin','2014-11-21 02:59:01',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1416527941','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(304,'class-beng14 3yr & new 4years_1416528597','admin','2014-11-21 03:09:57',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1416528597','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(305,'Class-OD12coe_1416666310.xls','admin','2014-11-22 17:25:10',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/Class-OD12coe_1416666310.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=Class-OD12coe_1416666310.xls',0),(306,'class-beng14 3yr & new 4years_1416666420','admin','2014-11-22 17:27:00',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1416666420','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(307,'class-beng14 3yr & new 4years_1416666635','admin','2014-11-22 17:30:35',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1416666635','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(308,'class-beng14 3yr & new 4years_1417114426','admin','2014-11-27 21:53:46',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/class-beng14 3yr & new 4years_1417114426','http://cores.oau.com/upload_file/download_file?type=students_list&file=class-beng14 3yr & new 4years',0),(309,'students_template_list-1.xls','admin','2014-11-27 22:00:31',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list-1.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list-1.xls',0),(310,'students_template_list-1_1417115101.xls','admin','2014-11-27 22:05:01',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list-1_1417115101.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list-1_1417',0),(311,'students_template_list-1_1417115376.xls','admin','2014-11-27 22:09:36',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/students_template_list-1_1417115376.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=students_template_list-1_1417',0),(312,'od-computer first year compilatiion.xls',NULL,'2014-12-18 00:32:04',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/od-computer first year compilatiion.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=od-computer first year compil',0),(313,'od-computer first year compilatiion_1418','4','2014-12-18 00:37:08',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/od-computer first year compilatiion_1418','http://cores.oau.com/upload_file/download_file?type=students_list&file=od-computer first year compil',0),(314,'od12 civil class list.xls','4','2014-12-18 13:02:23',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/od12 civil class list.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=od12 civil class list.xls',0),(315,'od12 civil class list_1418897581.xls','4','2014-12-18 13:13:01',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/od12 civil class list_1418897581.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=od12 civil class list_1418897',0),(316,'od12 civil class list_1418897762.xls','4','2014-12-18 13:16:02',0,'students_list','','/mnt/hgfs/www/cis/application/files/administration/students/od12 civil class list_1418897762.xls','http://cores.oau.com/upload_file/download_file?type=students_list&file=od12 civil class list_1418897',0);
/*!40000 ALTER TABLE `cis_user_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_user_print_columns`
--

DROP TABLE IF EXISTS `cis_user_print_columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_user_print_columns` (
  `id` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `display_name` varchar(65) DEFAULT NULL,
  `table` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_user_print_columns`
--

LOCK TABLES `cis_user_print_columns` WRITE;
/*!40000 ALTER TABLE `cis_user_print_columns` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_user_print_columns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_user_print_template`
--

DROP TABLE IF EXISTS `cis_user_print_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_user_print_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_title` text,
  `name` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cis_user_print_template_cis_sys_user1_idx` (`user_id`),
  CONSTRAINT `fk_cis_user_print_template_cis_sys_user1` FOREIGN KEY (`user_id`) REFERENCES `cis_sys_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_user_print_template`
--

LOCK TABLES `cis_user_print_template` WRITE;
/*!40000 ALTER TABLE `cis_user_print_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_user_print_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_user_print_template_column`
--

DROP TABLE IF EXISTS `cis_user_print_template_column`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_user_print_template_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columns_id` int(11) NOT NULL DEFAULT '0',
  `template_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`columns_id`,`template_id`),
  KEY `fk_cis_user_print_columns_has_cis_user_print_template_cis_u_idx` (`template_id`),
  KEY `fk_cis_user_print_columns_has_cis_user_print_template_cis_u_idx1` (`columns_id`),
  CONSTRAINT `fk_cis_user_print_columns_has_cis_user_print_template_cis_use1` FOREIGN KEY (`columns_id`) REFERENCES `cis_user_print_columns` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cis_user_print_columns_has_cis_user_print_template_cis_use2` FOREIGN KEY (`template_id`) REFERENCES `cis_user_print_template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_user_print_template_column`
--

LOCK TABLES `cis_user_print_template_column` WRITE;
/*!40000 ALTER TABLE `cis_user_print_template_column` DISABLE KEYS */;
/*!40000 ALTER TABLE `cis_user_print_template_column` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cis_user_session`
--

DROP TABLE IF EXISTS `cis_user_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cis_user_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cis_user_session`
--

LOCK TABLES `cis_user_session` WRITE;
/*!40000 ALTER TABLE `cis_user_session` DISABLE KEYS */;
INSERT INTO `cis_user_session` VALUES ('d31d52e7808b060ca606adafc0840375','192.168.1.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0',1419064066,'a:8:{s:9:\"user_data\";s:0:\"\";s:10:\"form_token\";s:32:\"68c20172b436dfee3cb9a6bf5b490cd4\";s:3:\"uid\";i:34;s:12:\"login_status\";b:1;s:12:\"is_logged_in\";b:1;s:10:\"login_mode\";s:7:\"student\";s:11:\"xhr_session\";s:32:\"68c20172b436dfee3cb9a6bf5b490cd4\";s:12:\"access_level\";s:7:\"student\";}'),('24563e2c137dd105addff4f5745dab9a','192.168.1.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0',1419075533,'a:8:{s:9:\"user_data\";s:0:\"\";s:10:\"form_token\";s:32:\"68c20172b436dfee3cb9a6bf5b490cd4\";s:3:\"uid\";i:34;s:12:\"login_status\";b:1;s:12:\"is_logged_in\";b:1;s:10:\"login_mode\";s:7:\"student\";s:11:\"xhr_session\";s:32:\"68c20172b436dfee3cb9a6bf5b490cd4\";s:12:\"access_level\";s:7:\"student\";}');
/*!40000 ALTER TABLE `cis_user_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `class_streams`
--

DROP TABLE IF EXISTS `class_streams`;
/*!50001 DROP VIEW IF EXISTS `class_streams`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `class_streams` (
  `id` tinyint NOT NULL,
  `semester_id` tinyint NOT NULL,
  `stream_id` tinyint NOT NULL,
  `academic_year_id` tinyint NOT NULL,
  `ref_course_id` tinyint NOT NULL,
  `dp_course_id` tinyint NOT NULL,
  `department_id` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `faculty_id` tinyint NOT NULL,
  `semester_structure_id` tinyint NOT NULL,
  `programs_id` tinyint NOT NULL,
  `ref_pg_sem_structure_id` tinyint NOT NULL,
  `class_name` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `is_enabled` tinyint NOT NULL,
  `class_monitor_id` tinyint NOT NULL,
  `class_year` tinyint NOT NULL,
  `class_master_id` tinyint NOT NULL,
  `capacity` tinyint NOT NULL,
  `class_alias` tinyint NOT NULL,
  `code_name` tinyint NOT NULL,
  `stream` tinyint NOT NULL,
  `stream_code` tinyint NOT NULL,
  `stream_name` tinyint NOT NULL,
  `start_year` tinyint NOT NULL,
  `year_status` tinyint NOT NULL,
  `start_date` tinyint NOT NULL,
  `end_date` tinyint NOT NULL,
  `academic_year` tinyint NOT NULL,
  `course_code` tinyint NOT NULL,
  `course_name` tinyint NOT NULL,
  `sem_name` tinyint NOT NULL,
  `sem_dname` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `courses_list`
--

DROP TABLE IF EXISTS `courses_list`;
/*!50001 DROP VIEW IF EXISTS `courses_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `courses_list` (
  `id` tinyint NOT NULL,
  `department_id` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `faculty_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `code_name` tinyint NOT NULL,
  `date_started` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `deleted` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `last_modify` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `cat_name` tinyint NOT NULL,
  `join_name` tinyint NOT NULL,
  `cat_description` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `facult_list`
--

DROP TABLE IF EXISTS `facult_list`;
/*!50001 DROP VIEW IF EXISTS `facult_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `facult_list` (
  `id` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `facult_name` tinyint NOT NULL,
  `head` tinyint NOT NULL,
  `date_added` tinyint NOT NULL,
  `campus` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `main_course_list`
--

DROP TABLE IF EXISTS `main_course_list`;
/*!50001 DROP VIEW IF EXISTS `main_course_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `main_course_list` (
  `id` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `cat_name` tinyint NOT NULL,
  `join_name` tinyint NOT NULL,
  `cat_description` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `code_name` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `date_started` tinyint NOT NULL,
  `department_id` tinyint NOT NULL,
  `dp_name` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `cm_name` tinyint NOT NULL,
  `faculty_id` tinyint NOT NULL,
  `fc_name` tinyint NOT NULL,
  `last_modify` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `other_departments_list`
--

DROP TABLE IF EXISTS `other_departments_list`;
/*!50001 DROP VIEW IF EXISTS `other_departments_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `other_departments_list` (
  `dp_id` tinyint NOT NULL,
  `removed` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `head` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `campus_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `print_student_info`
--

DROP TABLE IF EXISTS `print_student_info`;
/*!50001 DROP VIEW IF EXISTS `print_student_info`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `print_student_info` (
  `id` tinyint NOT NULL,
  `app_id` tinyint NOT NULL,
  `c_timestamp` tinyint NOT NULL,
  `first_name` tinyint NOT NULL,
  `middle_name` tinyint NOT NULL,
  `last_name` tinyint NOT NULL,
  `gender` tinyint NOT NULL,
  `nationality` tinyint NOT NULL,
  `birth_country` tinyint NOT NULL,
  `religion` tinyint NOT NULL,
  `dob` tinyint NOT NULL,
  `place_of_birth` tinyint NOT NULL,
  `sas_app_status` tinyint NOT NULL,
  `marital_status` tinyint NOT NULL,
  `mobile_number` tinyint NOT NULL,
  `email_address` tinyint NOT NULL,
  `permanent_address` tinyint NOT NULL,
  `contact_address` tinyint NOT NULL,
  `preffered_session` tinyint NOT NULL,
  `disabilities` tinyint NOT NULL,
  `fee_payment` tinyint NOT NULL,
  `birth_certificate` tinyint NOT NULL,
  `photo` tinyint NOT NULL,
  `std_id` tinyint NOT NULL,
  `dependants` tinyint NOT NULL,
  `current_loc` tinyint NOT NULL,
  `permanent_loc` tinyint NOT NULL,
  `kin_name` tinyint NOT NULL,
  `kin_phone` tinyint NOT NULL,
  `kin_email` tinyint NOT NULL,
  `kin_address` tinyint NOT NULL,
  `kin_location` tinyint NOT NULL,
  `par_name` tinyint NOT NULL,
  `par_email` tinyint NOT NULL,
  `par_phone` tinyint NOT NULL,
  `par_address` tinyint NOT NULL,
  `par_location` tinyint NOT NULL,
  `details` tinyint NOT NULL,
  `programme_id` tinyint NOT NULL,
  `course_id` tinyint NOT NULL,
  `academic_year_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `programmeCourses`
--

DROP TABLE IF EXISTS `programmeCourses`;
/*!50001 DROP VIEW IF EXISTS `programmeCourses`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `programmeCourses` (
  `id` tinyint NOT NULL,
  `department_id` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `faculty_id` tinyint NOT NULL,
  `programs_id` tinyint NOT NULL,
  `code_name` tinyint NOT NULL,
  `parent_program_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `display_name` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `nta_level` tinyint NOT NULL,
  `is_stop_level` tinyint NOT NULL,
  `level_year` tinyint NOT NULL,
  `programme_year` tinyint NOT NULL,
  `year_started` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `programme_list`
--

DROP TABLE IF EXISTS `programme_list`;
/*!50001 DROP VIEW IF EXISTS `programme_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `programme_list` (
  `id` tinyint NOT NULL,
  `parent_program_id` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `display_name` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `dt_added` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `deleted` tinyint NOT NULL,
  `year_started` tinyint NOT NULL,
  `nta_level` tinyint NOT NULL,
  `code_no` tinyint NOT NULL,
  `is_stop_level` tinyint NOT NULL,
  `level_year` tinyint NOT NULL,
  `pg_parent` tinyint NOT NULL,
  `campus_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `registration_sys_config`
--

DROP TABLE IF EXISTS `registration_sys_config`;
/*!50001 DROP VIEW IF EXISTS `registration_sys_config`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `registration_sys_config` (
  `sys_name` tinyint NOT NULL,
  `code_name` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `version` tinyint NOT NULL,
  `display_name` tinyint NOT NULL,
  `sys_id` tinyint NOT NULL,
  `support_email` tinyint NOT NULL,
  `org_details_id` tinyint NOT NULL,
  `org_display_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sas_applicant_acc`
--

DROP TABLE IF EXISTS `sas_applicant_acc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_acc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `application_status` int(1) NOT NULL DEFAULT '1',
  `login_status` int(1) NOT NULL,
  `token` varchar(100) NOT NULL,
  `last_logout` datetime NOT NULL,
  `registered_date` datetime DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `form_four_index` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `app_type` varchar(20) NOT NULL,
  `comments` text,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `form_downloads` int(2) NOT NULL DEFAULT '0',
  `dld_date` datetime NOT NULL,
  `lock_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_add_uniq` (`email_address`),
  UNIQUE KEY `form_four_index_UNIQUE` (`form_four_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_acc`
--

LOCK TABLES `sas_applicant_acc` WRITE;
/*!40000 ALTER TABLE `sas_applicant_acc` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_acc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_back_a_level`
--

DROP TABLE IF EXISTS `sas_applicant_back_a_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_back_a_level` (
  `applicant_a_level_back` int(11) NOT NULL,
  `a_level_year` year(4) NOT NULL,
  `a_level_country` varchar(40) NOT NULL,
  `a_level_centerno` varchar(6) NOT NULL,
  `a_level_school` varchar(60) NOT NULL,
  `a_level_exam_authority` varchar(40) NOT NULL,
  `a_level_indexno` varchar(14) NOT NULL,
  `a_level_status` varchar(1) DEFAULT NULL,
  `a_level_leaving` varchar(60) DEFAULT NULL,
  `a_level_certificate` varchar(60) DEFAULT NULL,
  `a_level_physics` varchar(2) DEFAULT NULL,
  `a_level_maths` char(1) DEFAULT NULL,
  `a_level_qualification` tinytext NOT NULL,
  `a_level_major` varchar(100) NOT NULL,
  `a_level_division` int(11) NOT NULL,
  `applicant_details_id` int(11) NOT NULL,
  `applicant_details_form_four_index_id` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`applicant_a_level_back`,`applicant_details_id`,`applicant_details_form_four_index_id`),
  KEY `fk_applicant_back_a_level_applicant_details1_idx` (`applicant_details_id`,`applicant_details_form_four_index_id`),
  CONSTRAINT `fk_applicant_back_a_level_applicant_details1` FOREIGN KEY (`applicant_details_id`, `applicant_details_form_four_index_id`) REFERENCES `sas_applicant_details` (`id`, `form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_back_a_level`
--

LOCK TABLES `sas_applicant_back_a_level` WRITE;
/*!40000 ALTER TABLE `sas_applicant_back_a_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_back_a_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_back_foreign`
--

DROP TABLE IF EXISTS `sas_applicant_back_foreign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_back_foreign` (
  `foreign_ed_certificate` varchar(50) NOT NULL,
  `foreign_year` year(4) NOT NULL,
  `equivalent_year` year(4) NOT NULL,
  `applicant_details_id` int(11) NOT NULL,
  `applicant_details_form_four_index` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`applicant_details_id`,`applicant_details_form_four_index`),
  KEY `fk_applicant_back_foreign_applicant_details1` (`applicant_details_id`,`applicant_details_form_four_index`),
  CONSTRAINT `fk_applicant_back_foreign_applicant_details1` FOREIGN KEY (`applicant_details_id`, `applicant_details_form_four_index`) REFERENCES `sas_applicant_details` (`id`, `form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_back_foreign`
--

LOCK TABLES `sas_applicant_back_foreign` WRITE;
/*!40000 ALTER TABLE `sas_applicant_back_foreign` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_back_foreign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_back_o_level`
--

DROP TABLE IF EXISTS `sas_applicant_back_o_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_back_o_level` (
  `o_level_leaving` varchar(60) DEFAULT NULL,
  `o_level_certificate` varchar(60) DEFAULT NULL,
  `o_level_physics` varchar(2) DEFAULT NULL,
  `o_level_maths` varchar(2) DEFAULT NULL,
  `o_level_biology` varchar(2) DEFAULT NULL,
  `o_level_chemistry` varchar(2) DEFAULT NULL,
  `o_level_language` varchar(2) DEFAULT NULL,
  `o_level_div` varchar(2) DEFAULT NULL,
  `o_level_school` varchar(60) NOT NULL,
  `o_level_exam_authority` varchar(40) NOT NULL,
  `o_level_indexno` varchar(14) NOT NULL,
  `o_level_centerno` varchar(6) NOT NULL,
  `o_level_country` varchar(40) NOT NULL,
  `o_level_year` year(4) NOT NULL,
  `applicant_details_id` int(11) NOT NULL,
  `applicant_details_form_four_index_id` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`applicant_details_id`,`applicant_details_form_four_index_id`),
  KEY `fk_applicant_back_o_level_applicant_details1` (`applicant_details_id`,`applicant_details_form_four_index_id`),
  CONSTRAINT `fk_applicant_back_o_level_applicant_details1` FOREIGN KEY (`applicant_details_id`, `applicant_details_form_four_index_id`) REFERENCES `sas_applicant_details` (`id`, `form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_back_o_level`
--

LOCK TABLES `sas_applicant_back_o_level` WRITE;
/*!40000 ALTER TABLE `sas_applicant_back_o_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_back_o_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_back_tech`
--

DROP TABLE IF EXISTS `sas_applicant_back_tech`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_back_tech` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_details_id` int(11) NOT NULL DEFAULT '0',
  `applicant_details_form_four_index_id` varchar(30) NOT NULL DEFAULT '',
  `w_shop` char(1) DEFAULT '',
  `w_draw` char(1) DEFAULT '',
  `w_elect` char(1) DEFAULT '',
  `w_math` char(1) DEFAULT NULL,
  `w_eng` char(1) DEFAULT NULL,
  `exam_index` varchar(45) DEFAULT NULL,
  `authority` varchar(45) DEFAULT NULL,
  `center_name` varchar(45) DEFAULT NULL,
  `cente_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`,`applicant_details_id`,`applicant_details_form_four_index_id`),
  KEY `fk_applicant_back_tech_applicant_details1` (`applicant_details_id`,`applicant_details_form_four_index_id`),
  CONSTRAINT `fk_applicant_back_tech_applicant_details1` FOREIGN KEY (`applicant_details_id`, `applicant_details_form_four_index_id`) REFERENCES `sas_applicant_details` (`id`, `form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_back_tech`
--

LOCK TABLES `sas_applicant_back_tech` WRITE;
/*!40000 ALTER TABLE `sas_applicant_back_tech` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_back_tech` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_back_veta`
--

DROP TABLE IF EXISTS `sas_applicant_back_veta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_back_veta` (
  `veta_center` varchar(60) NOT NULL,
  `veta_year` year(4) NOT NULL,
  `veta_course` varchar(100) NOT NULL,
  `veta_grade` varchar(2) NOT NULL,
  `veta_certificate` varchar(100) NOT NULL,
  `veta_cert_type` int(1) NOT NULL DEFAULT '0',
  `applicant_details_id` int(11) NOT NULL,
  `applicant_details_form_four_index_id` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`applicant_details_id`,`applicant_details_form_four_index_id`),
  KEY `fk_applicant_back_veta_applicant_details1` (`applicant_details_id`,`applicant_details_form_four_index_id`),
  CONSTRAINT `fk_applicant_back_veta_applicant_details1` FOREIGN KEY (`applicant_details_id`, `applicant_details_form_four_index_id`) REFERENCES `sas_applicant_details` (`id`, `form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_back_veta`
--

LOCK TABLES `sas_applicant_back_veta` WRITE;
/*!40000 ALTER TABLE `sas_applicant_back_veta` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_back_veta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_choices`
--

DROP TABLE IF EXISTS `sas_applicant_choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_choices` (
  `c_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicant_id` varchar(30) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `priority` int(1) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `entry_mode` int(11) NOT NULL,
  `selected` int(1) unsigned DEFAULT '0',
  PRIMARY KEY (`applicant_id`,`course_code`,`priority`),
  KEY `fk_applicants_choices_applicant_acc1_idx` (`applicant_id`),
  KEY `fk_coursecode` (`course_code`),
  KEY `applicant_id` (`applicant_id`),
  CONSTRAINT `fk_applicants_choices_applicant_acc1` FOREIGN KEY (`applicant_id`) REFERENCES `sas_applicant_acc` (`form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_applicants_choices_courses1` FOREIGN KEY (`course_code`) REFERENCES `sas_courses` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_choices`
--

LOCK TABLES `sas_applicant_choices` WRITE;
/*!40000 ALTER TABLE `sas_applicant_choices` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_choices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_details`
--

DROP TABLE IF EXISTS `sas_applicant_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_four_index` varchar(30) NOT NULL,
  `app_id` varchar(12) DEFAULT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(40) DEFAULT NULL,
  `birth_country` varchar(40) NOT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `place_of_birth` varchar(30) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `mobile_number` varchar(13) DEFAULT NULL,
  `email_address` varchar(30) DEFAULT NULL,
  `permanent_address` varchar(60) DEFAULT NULL,
  `contact_address` varchar(60) DEFAULT NULL,
  `preffered_session` varchar(60) NOT NULL,
  `disabilities` varchar(60) NOT NULL,
  `attach_birthcertificate` varchar(60) DEFAULT NULL,
  `attach_payinslip` varchar(100) NOT NULL,
  `attach_photo` varchar(60) DEFAULT NULL,
  `registered_id` varchar(30) DEFAULT '-',
  `fee_payment` varchar(60) NOT NULL,
  `ed_level` int(11) NOT NULL,
  `credit_points` int(4) NOT NULL DEFAULT '0',
  `certificates_status` int(1) DEFAULT '0',
  `paid_fee` int(1) NOT NULL,
  `applied_entry` int(1) DEFAULT NULL,
  `foreign_student` int(1) NOT NULL,
  `attended_veta` int(1) NOT NULL DEFAULT '0',
  `technical_ed` int(1) DEFAULT '0',
  `manual_qualify` int(1) DEFAULT '1',
  `sas_grading_system_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`form_four_index`,`sas_grading_system_id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `app_id_unique` (`app_id`),
  KEY `applicant_details_ibfk_1` (`form_four_index`),
  KEY `ed_level` (`ed_level`),
  KEY `fk_sas_applicant_details_sas_grading_system1_idx` (`sas_grading_system_id`),
  CONSTRAINT `applicant_details_ibfk_1` FOREIGN KEY (`form_four_index`) REFERENCES `sas_applicant_acc` (`form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sas_applicant_details_sas_grading_system1` FOREIGN KEY (`sas_grading_system_id`) REFERENCES `sas_grading_system` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_details`
--

LOCK TABLES `sas_applicant_details` WRITE;
/*!40000 ALTER TABLE `sas_applicant_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_issues`
--

DROP TABLE IF EXISTS `sas_applicant_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_issues` (
  `app_id` varchar(30) NOT NULL,
  `personal` int(1) NOT NULL DEFAULT '0',
  `education` int(1) NOT NULL DEFAULT '0',
  `selection` int(1) NOT NULL DEFAULT '0',
  `attachment` int(1) NOT NULL DEFAULT '0',
  `bcert` int(1) NOT NULL DEFAULT '0',
  `photo` int(1) NOT NULL DEFAULT '0',
  `payinslip` int(1) NOT NULL DEFAULT '0',
  `ocert` int(1) NOT NULL DEFAULT '0',
  `acert` int(1) NOT NULL DEFAULT '0',
  `vcert` int(1) NOT NULL DEFAULT '0',
  `equicert` int(1) NOT NULL DEFAULT '0',
  `Comments` text NOT NULL,
  `verification_date` datetime NOT NULL,
  `correction_date` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `issue_repeat` int(2) NOT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `publish_online` int(1) DEFAULT '0',
  PRIMARY KEY (`app_id`),
  CONSTRAINT `applicant_issues_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `sas_applicant_acc` (`form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_issues`
--

LOCK TABLES `sas_applicant_issues` WRITE;
/*!40000 ALTER TABLE `sas_applicant_issues` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_applicant_qualifications`
--

DROP TABLE IF EXISTS `sas_applicant_qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_applicant_qualifications` (
  `form_four_index` varchar(30) NOT NULL,
  `gender` int(1) NOT NULL,
  `a_level_status` int(1) NOT NULL,
  `veta_status` int(1) NOT NULL,
  `o_math` int(1) NOT NULL,
  `o_phy` int(1) NOT NULL,
  `o_chem` int(1) NOT NULL,
  `o_eng` int(1) NOT NULL,
  `o_bio` int(1) NOT NULL,
  `a_math` int(1) NOT NULL,
  `a_phy` int(1) NOT NULL,
  `points` int(2) NOT NULL,
  `applied_entry` int(1) DEFAULT '0',
  `form_status` int(1) NOT NULL DEFAULT '0',
  `selected` int(11) DEFAULT '0',
  `c_timestamp` datetime NOT NULL,
  `valid_applicant` int(11) NOT NULL DEFAULT '0',
  `technical_ed` int(1) DEFAULT '0',
  `w_shop` int(1) DEFAULT '0',
  `w_draw` int(1) DEFAULT '0',
  `w_elect` int(1) DEFAULT '0',
  `sel_batch` int(1) DEFAULT '0',
  PRIMARY KEY (`form_four_index`),
  UNIQUE KEY `form_four_index` (`form_four_index`),
  CONSTRAINT `app_qualification_id` FOREIGN KEY (`form_four_index`) REFERENCES `sas_applicant_acc` (`form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_applicant_qualifications`
--

LOCK TABLES `sas_applicant_qualifications` WRITE;
/*!40000 ALTER TABLE `sas_applicant_qualifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_applicant_qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_application_grades_requirements`
--

DROP TABLE IF EXISTS `sas_application_grades_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_application_grades_requirements` (
  `id` int(11) NOT NULL,
  `min_o_physics` char(1) NOT NULL DEFAULT 'c',
  `min_o_chemistry` char(1) NOT NULL DEFAULT 'c',
  `min_o_maths` char(1) NOT NULL DEFAULT 'c',
  `min_o_biology` char(1) NOT NULL DEFAULT 'f',
  `min_o_language` char(1) NOT NULL DEFAULT 'd',
  `p_math` char(1) NOT NULL,
  `p_phy` char(1) NOT NULL,
  `p_chem` char(1) NOT NULL,
  `p_bio` char(1) NOT NULL,
  `p_eng` char(1) NOT NULL,
  `min_a_physics` char(1) NOT NULL DEFAULT 'f',
  `min_a_maths` char(1) NOT NULL DEFAULT 'f',
  `min_preEntry_points` int(11) NOT NULL DEFAULT '12',
  `min_diEntry_points` int(11) DEFAULT '9',
  `grading_system` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `sas_grading_system_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`sas_grading_system_id`),
  KEY `fk_sas_application_grades_requirements_sas_grading_system1_idx` (`sas_grading_system_id`),
  CONSTRAINT `fk_sas_application_grades_requirements_sas_grading_system1` FOREIGN KEY (`sas_grading_system_id`) REFERENCES `sas_grading_system` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_application_grades_requirements`
--

LOCK TABLES `sas_application_grades_requirements` WRITE;
/*!40000 ALTER TABLE `sas_application_grades_requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_application_grades_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_ci_sessions`
--

DROP TABLE IF EXISTS `sas_ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_ci_sessions`
--

LOCK TABLES `sas_ci_sessions` WRITE;
/*!40000 ALTER TABLE `sas_ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_courses`
--

DROP TABLE IF EXISTS `sas_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_course_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `campus_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `semester_structure_id` int(11) NOT NULL DEFAULT '0',
  `course_programs_id` int(11) NOT NULL DEFAULT '0',
  `pg_sem_structure_id` int(11) NOT NULL DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  `sel_status` int(1) DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `description` text,
  `capacity` int(10) DEFAULT NULL,
  `capacity_pre` int(11) DEFAULT '0',
  `selected_count` int(11) DEFAULT NULL,
  `select_history` text,
  `min_division` int(11) DEFAULT NULL,
  `o_level_physics_req` char(1) DEFAULT NULL,
  `o_level_biology_req` char(1) DEFAULT NULL,
  `o_level_math_req` char(1) DEFAULT NULL,
  `o_level_chemistry_req` char(1) DEFAULT NULL,
  `o_level_lang_req` char(1) DEFAULT NULL,
  `a_level_math_req` char(1) DEFAULT NULL,
  `a_level_physics_req` char(1) DEFAULT NULL,
  `min_credits` int(11) DEFAULT NULL,
  `lock_status` int(1) DEFAULT '0',
  `application_lock` int(1) DEFAULT '0',
  PRIMARY KEY (`id`,`ref_course_id`,`course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`course_programs_id`,`pg_sem_structure_id`),
  UNIQUE KEY `coursecode` (`code`,`deleted`),
  KEY `fk_sas_courses_cis_department_program_course1_idx` (`ref_course_id`,`course_id`,`department_id`,`campus_id`,`faculty_id`,`semester_structure_id`,`course_programs_id`,`pg_sem_structure_id`),
  CONSTRAINT `fk_sas_courses_cis_department_program_course1` FOREIGN KEY (`ref_course_id`, `course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `course_programs_id`, `pg_sem_structure_id`) REFERENCES `cis_department_program_course` (`id`, `course_id`, `department_id`, `campus_id`, `faculty_id`, `semester_structure_id`, `programs_id`, `pg_sem_structure_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_courses`
--

LOCK TABLES `sas_courses` WRITE;
/*!40000 ALTER TABLE `sas_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_ed_levels`
--

DROP TABLE IF EXISTS `sas_ed_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_ed_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbreviation` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authority_abb` varchar(30) NOT NULL,
  `authority_name` varchar(120) NOT NULL,
  `country` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `certifications` (`abbreviation`,`country`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_ed_levels`
--

LOCK TABLES `sas_ed_levels` WRITE;
/*!40000 ALTER TABLE `sas_ed_levels` DISABLE KEYS */;
INSERT INTO `sas_ed_levels` VALUES (1,'acsee','Advanced Certificate of Secondar Education Examination','NECTA','Natioanal Examination Council of Tanzania','Tanzania',0),(3,'gce','General Certificate of Engineering','NACTE','National Accredited Certificate of Technical Education','Tanzania',0),(4,'veta','VETA','VETA','VETA','Tanzania',0),(5,'csee','Certificate of Secondary Education Examination','NECTA','Natioanal Examination Council of Tanzania','Tanzania',0),(9,'ucse','Uganda Certificate of Secondary Education','UNEC','Uganda national Examination Council','Uganda',0),(13,'igcse','Cambridge Intrnational General Certificate of secondary education','UCIE','University of Cambridge International Examinations','United_Kingdom',0),(14,'kcse','Kenya Certificate of SEcondary education','KNEP','Kenyha National Examinations Council','Kenya',0),(15,'sc','SCHOOLCERTIFICATE','ECZ','EXAMINATION COUNCIL OF ZAMBIA','Zambia',0),(16,'dip','Ordinary Diploma','NACTE','','',1),(17,'degree','Bachelor Degree','NECTA/NACTE/TCU','','',1),(18,'adp','Higher National Diploma/ Advanced Diploma','','','',1),(19,'pse','Certificate of Primary School Examinations','','','',0);
/*!40000 ALTER TABLE `sas_ed_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_grading_system`
--

DROP TABLE IF EXISTS `sas_grading_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_grading_system` (
  `id` int(11) NOT NULL,
  `year` date DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `start_year` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_grading_system`
--

LOCK TABLES `sas_grading_system` WRITE;
/*!40000 ALTER TABLE `sas_grading_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_grading_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_grading_system_has_sas_grading_value`
--

DROP TABLE IF EXISTS `sas_grading_system_has_sas_grading_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_grading_system_has_sas_grading_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sas_grading_system_id` int(11) NOT NULL DEFAULT '0',
  `sas_grading_value_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`sas_grading_system_id`,`sas_grading_value_id`),
  KEY `fk_sas_grading_system_has_sas_grading_value_sas_grading_val_idx` (`sas_grading_value_id`),
  KEY `fk_sas_grading_system_has_sas_grading_value_sas_grading_sys_idx` (`sas_grading_system_id`),
  CONSTRAINT `fk_sas_grading_system_has_sas_grading_value_sas_grading_system1` FOREIGN KEY (`sas_grading_system_id`) REFERENCES `sas_grading_system` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sas_grading_system_has_sas_grading_value_sas_grading_value1` FOREIGN KEY (`sas_grading_value_id`) REFERENCES `sas_grading_value` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_grading_system_has_sas_grading_value`
--

LOCK TABLES `sas_grading_system_has_sas_grading_value` WRITE;
/*!40000 ALTER TABLE `sas_grading_system_has_sas_grading_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_grading_system_has_sas_grading_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_grading_value`
--

DROP TABLE IF EXISTS `sas_grading_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_grading_value` (
  `id` int(11) NOT NULL,
  `name` char(2) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_grading_value`
--

LOCK TABLES `sas_grading_value` WRITE;
/*!40000 ALTER TABLE `sas_grading_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_grading_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_help_manual`
--

DROP TABLE IF EXISTS `sas_help_manual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_help_manual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_loc` varchar(200) NOT NULL,
  `Title` text NOT NULL,
  `contents` longtext NOT NULL,
  `image` varchar(200) NOT NULL,
  `c_timestamp` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_help_manual`
--

LOCK TABLES `sas_help_manual` WRITE;
/*!40000 ALTER TABLE `sas_help_manual` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_help_manual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_payment_transactions`
--

DROP TABLE IF EXISTS `sas_payment_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_payment_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transc_id` varchar(50) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `app_id` varchar(30) DEFAULT NULL,
  `checkin_date` datetime NOT NULL,
  `payin_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `app_transc_id` (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_payment_transactions`
--

LOCK TABLES `sas_payment_transactions` WRITE;
/*!40000 ALTER TABLE `sas_payment_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_payment_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_payment_transactions_post`
--

DROP TABLE IF EXISTS `sas_payment_transactions_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_payment_transactions_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `payin_date` datetime NOT NULL,
  `check_in` datetime NOT NULL,
  `trans_id` varchar(60) NOT NULL,
  `amount` int(11) NOT NULL,
  `applicant_id` varchar(40) NOT NULL,
  `deleted` int(1) DEFAULT '0',
  `checked_by` int(11) NOT NULL,
  `payinslip_file` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicant_id` (`applicant_id`),
  KEY `applicant_id_2` (`applicant_id`),
  CONSTRAINT `payment_transactions_post_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `sas_applicant_acc` (`form_four_index`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_payment_transactions_post`
--

LOCK TABLES `sas_payment_transactions_post` WRITE;
/*!40000 ALTER TABLE `sas_payment_transactions_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_payment_transactions_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_sas_config`
--

DROP TABLE IF EXISTS `sas_sas_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_sas_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `system_name` varchar(45) DEFAULT 'Online Students Admission System',
  `creators` varchar(45) DEFAULT 'Hosea Shimwela, Ombeni Aidani',
  `creators_contacts` varchar(200) NOT NULL DEFAULT '{0713317333-0684317333|hosea@yahoo.com},{0716761983-0768429698|(ombeniaidani@gmail.com)}","065656565656',
  `help_support_contacts` varchar(200) NOT NULL DEFAULT '0768429698m0716761983',
  `system_status` int(1) DEFAULT '1',
  `system_version` varchar(30) DEFAULT '1.0.2013',
  `sas_configcol` varchar(45) DEFAULT 'system',
  `system_description` tinytext,
  `application_status` varchar(45) NOT NULL DEFAULT '0',
  `permit_newapplicant` int(1) NOT NULL DEFAULT '0',
  `application_closedate` datetime NOT NULL,
  `application_opendate` datetime NOT NULL,
  `min_o_level_year` year(4) NOT NULL DEFAULT '2000',
  `choices` int(11) NOT NULL DEFAULT '4',
  `min_a_level_year` year(4) NOT NULL DEFAULT '2000',
  `min_applicant_age` int(11) NOT NULL DEFAULT '14',
  `max_applicants` int(11) NOT NULL DEFAULT '0',
  `current_sel_phase` int(11) NOT NULL DEFAULT '0',
  `current_sel_phase_pre` int(1) DEFAULT '0',
  `selected_applicants` int(11) NOT NULL DEFAULT '0',
  `select_history` text NOT NULL,
  `decration_statement` mediumtext NOT NULL,
  `max_female` int(11) NOT NULL DEFAULT '0',
  `max_male` int(11) NOT NULL DEFAULT '0',
  `application_price` int(11) NOT NULL DEFAULT '10000',
  `application_price_foreign` int(11) NOT NULL DEFAULT '20',
  `bankaccount` varchar(50) NOT NULL,
  `pre_entrydeadline` datetime DEFAULT NULL,
  `direct_deadline` datetime DEFAULT NULL,
  `publish_selected` int(1) DEFAULT '0',
  `publish_selected_direct` int(1) DEFAULT '0',
  `publish_issues` int(1) DEFAULT '0',
  `publish_unqualified` int(1) DEFAULT '0',
  `publish_notselected` int(1) DEFAULT '0',
  `sys_mail` varchar(60) DEFAULT 'ombeniaidani@gmail.com',
  `sys_mail_return` varchar(60) DEFAULT 'ombeniaidani@gmail.com',
  `mail_send_title` varchar(60) DEFAULT NULL,
  `mail_password` varchar(50) DEFAULT NULL,
  `smtp_server` varchar(60) DEFAULT NULL,
  `smtp_port` int(8) DEFAULT NULL,
  `mailds_type` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_sas_config`
--

LOCK TABLES `sas_sas_config` WRITE;
/*!40000 ALTER TABLE `sas_sas_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_sas_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_secondary_schools`
--

DROP TABLE IF EXISTS `sas_secondary_schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_secondary_schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_prefix` char(1) NOT NULL DEFAULT '',
  `indexno` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(150) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `school_type` int(1) DEFAULT '1',
  PRIMARY KEY (`id`,`type_prefix`,`indexno`),
  UNIQUE KEY `unique_school` (`type_prefix`,`indexno`),
  KEY `sch_id` (`type_prefix`,`indexno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_secondary_schools`
--

LOCK TABLES `sas_secondary_schools` WRITE;
/*!40000 ALTER TABLE `sas_secondary_schools` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_secondary_schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_sys_long_data`
--

DROP TABLE IF EXISTS `sas_sys_long_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_sys_long_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `sys_type` int(11) NOT NULL DEFAULT '0',
  `flag_level` int(1) NOT NULL DEFAULT '1',
  `hits` int(11) NOT NULL,
  `helpfull_count` int(11) NOT NULL,
  `content` longblob NOT NULL,
  `heading` text NOT NULL,
  `publish_status` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_sys_long_data`
--

LOCK TABLES `sas_sys_long_data` WRITE;
/*!40000 ALTER TABLE `sas_sys_long_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_sys_long_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_system_survey`
--

DROP TABLE IF EXISTS `sas_system_survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_system_survey` (
  `year` year(4) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `easy` int(11) NOT NULL DEFAULT '0',
  `medium` int(11) NOT NULL DEFAULT '0',
  `hard` int(11) NOT NULL DEFAULT '0',
  `problematic` int(11) NOT NULL DEFAULT '0',
  `noproblem` int(11) NOT NULL DEFAULT '0',
  `commented` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`year`),
  UNIQUE KEY `year` (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_system_survey`
--

LOCK TABLES `sas_system_survey` WRITE;
/*!40000 ALTER TABLE `sas_system_survey` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_system_survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_visitor_count`
--

DROP TABLE IF EXISTS `sas_visitor_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_visitor_count` (
  `date` int(11) NOT NULL,
  `home_pg` int(11) NOT NULL,
  `site_hits` int(11) NOT NULL,
  `total_visitors` int(11) NOT NULL,
  `help_pg` int(11) NOT NULL,
  `app_procedures` int(11) NOT NULL,
  `forgot_password` int(11) NOT NULL,
  `app_requirements` int(11) NOT NULL,
  `reg_foreign` int(11) NOT NULL,
  `reg_local` int(11) NOT NULL,
  `reg_todate_local` int(11) NOT NULL,
  `reg_todate_foreign` int(11) NOT NULL,
  `ie_visits` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `del_foreign` int(11) NOT NULL DEFAULT '0',
  `del_local` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_visitor_count`
--

LOCK TABLES `sas_visitor_count` WRITE;
/*!40000 ALTER TABLE `sas_visitor_count` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_visitor_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_visitor_question`
--

DROP TABLE IF EXISTS `sas_visitor_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_visitor_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `date_posted` datetime NOT NULL,
  `total_asked` int(11) NOT NULL,
  `ans_status` int(1) NOT NULL,
  `replied_via` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `publish_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_visitor_question`
--

LOCK TABLES `sas_visitor_question` WRITE;
/*!40000 ALTER TABLE `sas_visitor_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_visitor_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_visitor_question_answers`
--

DROP TABLE IF EXISTS `sas_visitor_question_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_visitor_question_answers` (
  `id` varchar(45) NOT NULL,
  `qn_id` int(11) NOT NULL DEFAULT '0',
  `reply_id` int(11) NOT NULL DEFAULT '0',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`qn_id`,`reply_id`),
  UNIQUE KEY `unique_questions` (`qn_id`,`reply_id`),
  KEY `qn_id` (`qn_id`,`reply_id`),
  KEY `reply_id` (`reply_id`),
  CONSTRAINT `qn_repy_src` FOREIGN KEY (`reply_id`) REFERENCES `sas_visitor_replies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `qn_src` FOREIGN KEY (`qn_id`) REFERENCES `sas_visitor_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_visitor_question_answers`
--

LOCK TABLES `sas_visitor_question_answers` WRITE;
/*!40000 ALTER TABLE `sas_visitor_question_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_visitor_question_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_visitor_replies`
--

DROP TABLE IF EXISTS `sas_visitor_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_visitor_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_replied` datetime NOT NULL,
  `reply_contents` longtext NOT NULL,
  `reply_by` varchar(100) NOT NULL,
  `visitors` int(11) NOT NULL,
  `helpfull_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_visitor_replies`
--

LOCK TABLES `sas_visitor_replies` WRITE;
/*!40000 ALTER TABLE `sas_visitor_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_visitor_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sas_visitor_session`
--

DROP TABLE IF EXISTS `sas_visitor_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sas_visitor_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sas_visitor_session`
--

LOCK TABLES `sas_visitor_session` WRITE;
/*!40000 ALTER TABLE `sas_visitor_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_visitor_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `trash_programme_list`
--

DROP TABLE IF EXISTS `trash_programme_list`;
/*!50001 DROP VIEW IF EXISTS `trash_programme_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `trash_programme_list` (
  `id` tinyint NOT NULL,
  `parent_program_id` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `display_name` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `dt_added` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `deleted` tinyint NOT NULL,
  `year_started` tinyint NOT NULL,
  `nta_level` tinyint NOT NULL,
  `code_no` tinyint NOT NULL,
  `is_stop_level` tinyint NOT NULL,
  `level_year` tinyint NOT NULL,
  `pg_parent` tinyint NOT NULL,
  `campus_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `trashed_departments_list`
--

DROP TABLE IF EXISTS `trashed_departments_list`;
/*!50001 DROP VIEW IF EXISTS `trashed_departments_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `trashed_departments_list` (
  `dp_id` tinyint NOT NULL,
  `removed` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `head` tinyint NOT NULL,
  `campus_id` tinyint NOT NULL,
  `facult_id` tinyint NOT NULL,
  `faculty` tinyint NOT NULL,
  `facult_head` tinyint NOT NULL,
  `campus_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_session`
--

DROP TABLE IF EXISTS `user_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_session`
--

LOCK TABLES `user_session` WRITE;
/*!40000 ALTER TABLE `user_session` DISABLE KEYS */;
INSERT INTO `user_session` VALUES ('8525af020cf483e2ab9757a32bf644cf','192.168.1.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0',1416919514,'a:3:{s:9:\"user_data\";s:0:\"\";s:5:\"ldata\";a:24:{s:8:\"login_id\";s:8:\"Develper\";s:12:\"login_status\";s:1:\"d\";s:12:\"is_logged_in\";b:1;s:12:\"access_level\";i:1;s:2:\"id\";i:1;s:22:\"registration_number_id\";N;s:6:\"gender\";s:1:\"d\";s:7:\"deleted\";s:1:\"0\";s:13:\"dt_registered\";s:1:\"d\";s:11:\"last_active\";s:1:\"d\";s:10:\"last_login\";s:1:\"d\";s:10:\"is_student\";s:1:\"d\";s:17:\"acc_activate_code\";s:1:\"d\";s:13:\"email_address\";s:1:\"d\";s:7:\"profile\";s:9:\"developer\";s:18:\"is_department_user\";s:1:\"0\";s:19:\"is_other_department\";s:1:\"0\";s:13:\"department_id\";s:1:\"0\";s:5:\"fname\";s:8:\"Develper\";s:5:\"lname\";s:11:\"User Normal\";s:5:\"mname\";s:7:\"My Name\";s:13:\"profile_photo\";s:13:\"developer.png\";s:14:\"account_status\";i:1;s:9:\"user_info\";a:1:{i:0;s:4:\"none\";}}s:10:\"form_token\";s:32:\"f131ae903380a2c0ff774a5015cecfce\";}'),('8744e75f54371ca2ec43f28d47111672','192.168.1.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0 FirePHP/0.7.4',1416923985,'a:3:{s:9:\"user_data\";s:0:\"\";s:5:\"ldata\";a:24:{s:8:\"login_id\";s:8:\"Develper\";s:12:\"login_status\";s:1:\"d\";s:12:\"is_logged_in\";b:1;s:12:\"access_level\";i:1;s:2:\"id\";i:1;s:22:\"registration_number_id\";N;s:6:\"gender\";s:1:\"d\";s:7:\"deleted\";s:1:\"0\";s:13:\"dt_registered\";s:1:\"d\";s:11:\"last_active\";s:1:\"d\";s:10:\"last_login\";s:1:\"d\";s:10:\"is_student\";s:1:\"d\";s:17:\"acc_activate_code\";s:1:\"d\";s:13:\"email_address\";s:1:\"d\";s:7:\"profile\";s:9:\"developer\";s:18:\"is_department_user\";s:1:\"0\";s:19:\"is_other_department\";s:1:\"0\";s:13:\"department_id\";s:1:\"0\";s:5:\"fname\";s:8:\"Develper\";s:5:\"lname\";s:11:\"User Normal\";s:5:\"mname\";s:7:\"My Name\";s:13:\"profile_photo\";s:13:\"developer.png\";s:14:\"account_status\";i:1;s:9:\"user_info\";a:1:{i:0;s:4:\"none\";}}s:10:\"form_token\";s:32:\"f2277e0382f51d91c6190db2dd10c3ba\";}'),('8b4f71981762e77e4f5cc56281f502f5','192.168.1.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0',1416928436,'a:3:{s:9:\"user_data\";s:0:\"\";s:5:\"ldata\";a:24:{s:8:\"login_id\";s:8:\"Develper\";s:12:\"login_status\";s:1:\"d\";s:12:\"is_logged_in\";b:1;s:12:\"access_level\";i:1;s:2:\"id\";i:1;s:22:\"registration_number_id\";N;s:6:\"gender\";s:1:\"d\";s:7:\"deleted\";s:1:\"0\";s:13:\"dt_registered\";s:1:\"d\";s:11:\"last_active\";s:1:\"d\";s:10:\"last_login\";s:1:\"d\";s:10:\"is_student\";s:1:\"d\";s:17:\"acc_activate_code\";s:1:\"d\";s:13:\"email_address\";s:1:\"d\";s:7:\"profile\";s:9:\"developer\";s:18:\"is_department_user\";s:1:\"0\";s:19:\"is_other_department\";s:1:\"0\";s:13:\"department_id\";s:1:\"0\";s:5:\"fname\";s:8:\"Develper\";s:5:\"lname\";s:11:\"User Normal\";s:5:\"mname\";s:7:\"My Name\";s:13:\"profile_photo\";s:13:\"developer.png\";s:14:\"account_status\";i:1;s:9:\"user_info\";a:1:{i:0;s:4:\"none\";}}s:10:\"form_token\";s:32:\"7e20d3355d837a1a43edd9d012023266\";}'),('e46737f80b589a9762bad57786aa4fd5','192.168.1.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0',1416927604,'a:3:{s:9:\"user_data\";s:0:\"\";s:5:\"ldata\";a:24:{s:8:\"login_id\";s:8:\"Develper\";s:12:\"login_status\";s:1:\"d\";s:12:\"is_logged_in\";b:1;s:12:\"access_level\";i:1;s:2:\"id\";i:1;s:22:\"registration_number_id\";N;s:6:\"gender\";s:1:\"d\";s:7:\"deleted\";s:1:\"0\";s:13:\"dt_registered\";s:1:\"d\";s:11:\"last_active\";s:1:\"d\";s:10:\"last_login\";s:1:\"d\";s:10:\"is_student\";s:1:\"d\";s:17:\"acc_activate_code\";s:1:\"d\";s:13:\"email_address\";s:1:\"d\";s:7:\"profile\";s:9:\"developer\";s:18:\"is_department_user\";s:1:\"0\";s:19:\"is_other_department\";s:1:\"0\";s:13:\"department_id\";s:1:\"0\";s:5:\"fname\";s:8:\"Develper\";s:5:\"lname\";s:11:\"User Normal\";s:5:\"mname\";s:7:\"My Name\";s:13:\"profile_photo\";s:13:\"developer.png\";s:14:\"account_status\";i:1;s:9:\"user_info\";a:1:{i:0;s:4:\"none\";}}s:10:\"form_token\";s:32:\"2d60de5bc2fad8284fddce7ed3a0d82c\";}');
/*!40000 ALTER TABLE `user_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `course_department_id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `c_timestamp` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_logout` datetime NOT NULL,
  `login_status` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `dp_users` (`username`,`course_department_id`),
  UNIQUE KEY `login_id` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_role`
--

DROP TABLE IF EXISTS `users_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_role` (
  `uid` int(11) NOT NULL,
  `view_selection` int(11) NOT NULL DEFAULT '0',
  `change_roles` int(11) NOT NULL DEFAULT '0',
  `run_selection` int(11) NOT NULL DEFAULT '0',
  `help_support` int(11) NOT NULL,
  `change_settings` int(11) NOT NULL,
  `verify_students` int(11) NOT NULL,
  `delete_command` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `user_roles` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_role`
--

LOCK TABLES `users_role` WRITE;
/*!40000 ALTER TABLE `users_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cis_cmanagerDboAdvancedVer_02'
--

--
-- Final view structure for view `academic_departments_list`
--

/*!50001 DROP TABLE IF EXISTS `academic_departments_list`*/;
/*!50001 DROP VIEW IF EXISTS `academic_departments_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `academic_departments_list` AS select `cdl`.`id` AS `dp_id`,`cdl`.`type` AS `dp_type`,`cdl`.`removed` AS `removed`,`cdl`.`code` AS `code`,`cdl`.`code_no` AS `code_no`,`cdl`.`name` AS `name`,`cdl`.`description` AS `description`,`cdl`.`head` AS `head`,`cdl`.`campus_id` AS `campus_id`,`cdl`.`facult_id` AS `facult_id`,`ccf`.`facult_name` AS `faculty`,`ccf`.`head` AS `facult_head`,`ccl`.`name` AS `campus_name` from ((`cis_department_list` `cdl` left join `cis_campus_faculty` `ccf` on((`cdl`.`facult_id` = `ccf`.`id`))) join `cis_campus_list` `ccl` on(((`cdl`.`campus_id` = `ccl`.`id`) and (`cdl`.`removed` = 0)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `callender_event_category`
--

/*!50001 DROP TABLE IF EXISTS `callender_event_category`*/;
/*!50001 DROP VIEW IF EXISTS `callender_event_category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `callender_event_category` AS select `cis_college_callender_event_category`.`id` AS `id`,`cis_college_callender_event_category`.`title` AS `title`,`cis_college_callender_event_category`.`description` AS `description`,`cis_college_callender_event_category`.`parent_event_id` AS `parent_event_id` from `cis_college_callender_event_category` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `campus_list`
--

/*!50001 DROP TABLE IF EXISTS `campus_list`*/;
/*!50001 DROP VIEW IF EXISTS `campus_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `campus_list` AS select `cis_campus_list`.`id` AS `id`,`cis_campus_list`.`code_name` AS `code_name`,`cis_campus_list`.`name` AS `name`,`cis_campus_list`.`location` AS `location`,`cis_campus_list`.`details` AS `details`,`cis_campus_list`.`head` AS `head`,`cis_campus_list`.`campus_type` AS `campus_type`,`cis_campus_list`.`year_created` AS `year_created`,`cis_campus_list`.`doc_links` AS `doc_links`,`cis_campus_list`.`removed` AS `removed` from `cis_campus_list` where (`cis_campus_list`.`removed` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `class_streams`
--

/*!50001 DROP TABLE IF EXISTS `class_streams`*/;
/*!50001 DROP VIEW IF EXISTS `class_streams`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `class_streams` AS select `class`.`id` AS `id`,`class`.`semester_id` AS `semester_id`,`class`.`stream_id` AS `stream_id`,`class`.`academic_year_id` AS `academic_year_id`,`class`.`ref_course_id` AS `ref_course_id`,`class`.`dp_course_id` AS `dp_course_id`,`class`.`department_id` AS `department_id`,`class`.`campus_id` AS `campus_id`,`class`.`faculty_id` AS `faculty_id`,`class`.`semester_structure_id` AS `semester_structure_id`,`class`.`programs_id` AS `programs_id`,`class`.`ref_pg_sem_structure_id` AS `ref_pg_sem_structure_id`,`class`.`class_name` AS `class_name`,`class`.`status` AS `status`,`class`.`is_enabled` AS `is_enabled`,`class`.`class_monitor_id` AS `class_monitor_id`,`class`.`class_year` AS `class_year`,`class`.`class_master_id` AS `class_master_id`,`class`.`capacity` AS `capacity`,`class`.`class_alias` AS `class_alias`,`class`.`code_name` AS `code_name`,`stream`.`display_name` AS `stream`,`stream`.`code` AS `stream_code`,`stream`.`name` AS `stream_name`,`acy`.`start_year` AS `start_year`,`acy`.`status` AS `year_status`,`acy`.`start_date` AS `start_date`,`acy`.`end_date` AS `end_date`,`acy`.`notation` AS `academic_year`,`pgcz`.`code_name` AS `course_code`,`pgcz`.`display_name` AS `course_name`,`sem`.`name` AS `sem_name`,`sem`.`display_name` AS `sem_dname` from ((((`cis_student_class_stream` `class` join `cis_department_program_course` `pgcz` on(((`pgcz`.`programs_id` = `class`.`programs_id`) and (`pgcz`.`id` = `class`.`ref_course_id`)))) join `cis_semester` `sem` on((`sem`.`id` = `class`.`semester_id`))) join `cis_college_academic_years` `acy` on((`acy`.`id` = `class`.`academic_year_id`))) join `cis_department_program_class_stream` `stream` on((`stream`.`id` = `class`.`stream_id`))) order by `acy`.`start_date`,`class`.`class_year`,`sem`.`numeric_value`,`stream`.`code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `courses_list`
--

/*!50001 DROP TABLE IF EXISTS `courses_list`*/;
/*!50001 DROP VIEW IF EXISTS `courses_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `courses_list` AS select `cz`.`id` AS `id`,`cz`.`department_id` AS `department_id`,`cz`.`campus_id` AS `campus_id`,`cz`.`faculty_id` AS `faculty_id`,`cz`.`name` AS `name`,`cz`.`code_name` AS `code_name`,`cz`.`date_started` AS `date_started`,`cz`.`status` AS `status`,`cz`.`deleted` AS `deleted`,`cz`.`description` AS `description`,`cz`.`last_modify` AS `last_modify`,`cz`.`category_id` AS `category_id`,`cat`.`name` AS `cat_name`,`cat`.`join_name` AS `join_name`,`cat`.`comments` AS `cat_description` from (`cis_department_course` `cz` left join `cis_department_course_category` `cat` on((`cz`.`category_id` = `cat`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `facult_list`
--

/*!50001 DROP TABLE IF EXISTS `facult_list`*/;
/*!50001 DROP VIEW IF EXISTS `facult_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `facult_list` AS select `cf`.`id` AS `id`,`cf`.`campus_id` AS `campus_id`,`cf`.`facult_name` AS `facult_name`,`cf`.`head` AS `head`,`cf`.`date_added` AS `date_added`,`cm`.`name` AS `campus` from (`cis_campus_faculty` `cf` join `cis_campus_list` `cm` on((`cf`.`campus_id` = `cm`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `main_course_list`
--

/*!50001 DROP TABLE IF EXISTS `main_course_list`*/;
/*!50001 DROP VIEW IF EXISTS `main_course_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `main_course_list` AS select `cz`.`id` AS `id`,`cz`.`category_id` AS `category_id`,`cat`.`name` AS `cat_name`,`cat`.`join_name` AS `join_name`,`cat`.`comments` AS `cat_description`,`cz`.`name` AS `name`,`cz`.`code_name` AS `code_name`,`cz`.`description` AS `description`,`cz`.`date_started` AS `date_started`,`cz`.`department_id` AS `department_id`,`cd`.`name` AS `dp_name`,`cz`.`campus_id` AS `campus_id`,`cc`.`name` AS `cm_name`,`cz`.`faculty_id` AS `faculty_id`,`fc`.`facult_name` AS `fc_name`,`cz`.`last_modify` AS `last_modify` from ((((`cis_department_course` `cz` join `cis_department_list` `cd` on((`cz`.`department_id` = `cd`.`id`))) join `cis_campus_list` `cc` on((`cc`.`id` = `cz`.`campus_id`))) join `cis_campus_faculty` `fc` on((`fc`.`id` = `cz`.`faculty_id`))) left join `cis_department_course_category` `cat` on((`cz`.`category_id` = `cat`.`id`))) where (`cz`.`deleted` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `other_departments_list`
--

/*!50001 DROP TABLE IF EXISTS `other_departments_list`*/;
/*!50001 DROP VIEW IF EXISTS `other_departments_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `other_departments_list` AS select `cdl`.`id` AS `dp_id`,`cdl`.`removed` AS `removed`,`cdl`.`name` AS `name`,`cdl`.`description` AS `description`,`cdl`.`head` AS `head`,`cdl`.`campus_id` AS `campus_id`,`ccl`.`name` AS `campus_name` from (`cis_department_other_list` `cdl` join `cis_campus_list` `ccl` on(((`cdl`.`campus_id` = `ccl`.`id`) and (`cdl`.`removed` = 0)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `print_student_info`
--

/*!50001 DROP TABLE IF EXISTS `print_student_info`*/;
/*!50001 DROP VIEW IF EXISTS `print_student_info`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `print_student_info` AS select `sd`.`id` AS `id`,`sd`.`app_id` AS `app_id`,`sd`.`c_timestamp` AS `c_timestamp`,`sd`.`first_name` AS `first_name`,`sd`.`middle_name` AS `middle_name`,`sd`.`last_name` AS `last_name`,`sd`.`gender` AS `gender`,`sd`.`nationality` AS `nationality`,`sd`.`birth_country` AS `birth_country`,`sd`.`religion` AS `religion`,`sd`.`dob` AS `dob`,`sd`.`place_of_birth` AS `place_of_birth`,`sd`.`sas_app_status` AS `sas_app_status`,`sd`.`marital_status` AS `marital_status`,`sd`.`mobile_number` AS `mobile_number`,`sd`.`email_address` AS `email_address`,`sd`.`permanent_address` AS `permanent_address`,`sd`.`contact_address` AS `contact_address`,`sd`.`preffered_session` AS `preffered_session`,`sd`.`disabilities` AS `disabilities`,`sd`.`fee_payment` AS `fee_payment`,`sd`.`birth_certificate` AS `birth_certificate`,`sd`.`photo` AS `photo`,`sd`.`std_id` AS `std_id`,`sd`.`dependants` AS `dependants`,`sd`.`current_loc` AS `current_loc`,`sd`.`permanent_loc` AS `permanent_loc`,`sd`.`kin_name` AS `kin_name`,`sd`.`kin_phone` AS `kin_phone`,`sd`.`kin_email` AS `kin_email`,`sd`.`kin_address` AS `kin_address`,`sd`.`kin_location` AS `kin_location`,`sd`.`par_name` AS `par_name`,`sd`.`par_email` AS `par_email`,`sd`.`par_phone` AS `par_phone`,`sd`.`par_address` AS `par_address`,`sd`.`par_location` AS `par_location`,`sd`.`details` AS `details`,`reginfo`.`programme_id` AS `programme_id`,`reginfo`.`course_id` AS `course_id`,`reginfo`.`academic_year_id` AS `academic_year_id` from (`cis_student_registration_id` `reginfo` left join `cis_students_details` `sd` on((`reginfo`.`details_id` = `sd`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `programmeCourses`
--

/*!50001 DROP TABLE IF EXISTS `programmeCourses`*/;
/*!50001 DROP VIEW IF EXISTS `programmeCourses`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `programmeCourses` AS select `dp_cz`.`id` AS `id`,`dp_cz`.`department_id` AS `department_id`,`dp_cz`.`campus_id` AS `campus_id`,`dp_cz`.`faculty_id` AS `faculty_id`,`dp_cz`.`programs_id` AS `programs_id`,`dp_cz`.`code_name` AS `code_name`,`dp_pg`.`parent_program_id` AS `parent_program_id`,`dp_pg`.`name` AS `name`,`dp_pg`.`display_name` AS `display_name`,`dp_pg`.`code` AS `code`,`dp_pg`.`nta_level` AS `nta_level`,`dp_pg`.`is_stop_level` AS `is_stop_level`,`dp_pg`.`level_year` AS `level_year`,`dp_pg`.`year_started` AS `programme_year`,`dp_cz`.`year_started` AS `year_started` from (`cis_department_program_course` `dp_cz` left join `cis_department_programs` `dp_pg` on(((`dp_cz`.`programs_id` = `dp_pg`.`id`) and `dp_cz`.`course_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `programme_list`
--

/*!50001 DROP TABLE IF EXISTS `programme_list`*/;
/*!50001 DROP VIEW IF EXISTS `programme_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `programme_list` AS select `cdp`.`id` AS `id`,`cdp`.`parent_program_id` AS `parent_program_id`,`cdp`.`campus_id` AS `campus_id`,`cdp`.`name` AS `name`,`cdp`.`display_name` AS `display_name`,`cdp`.`code` AS `code`,`cdp`.`description` AS `description`,`cdp`.`dt_added` AS `dt_added`,`cdp`.`status` AS `status`,`cdp`.`deleted` AS `deleted`,`cdp`.`year_started` AS `year_started`,`cdp`.`nta_level` AS `nta_level`,`cdp`.`code_no` AS `code_no`,`cdp`.`is_stop_level` AS `is_stop_level`,`cdp`.`level_year` AS `level_year`,`pg`.`code` AS `pg_parent`,`cm`.`name` AS `campus_name` from ((`cis_department_programs` `cdp` left join `cis_campus_list` `cm` on((`cm`.`id` = `cdp`.`campus_id`))) left join `cis_department_programs` `pg` on((`pg`.`id` = `cdp`.`parent_program_id`))) where (`cdp`.`deleted` = 0) order by `cdp`.`nta_level`,`cdp`.`base_program_id`,`cdp`.`code_no`,`cdp`.`level_year`,`cm`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `registration_sys_config`
--

/*!50001 DROP TABLE IF EXISTS `registration_sys_config`*/;
/*!50001 DROP VIEW IF EXISTS `registration_sys_config`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `registration_sys_config` AS select `cisCg`.`name` AS `sys_name`,`cisCg`.`code_name` AS `code_name`,`cisCg`.`company` AS `company`,`cisCg`.`version` AS `version`,`cisCg`.`display_name` AS `display_name`,`cisCg`.`id` AS `sys_id`,`cisCg`.`support_email` AS `support_email`,`cisCg`.`org_details_id` AS `org_details_id`,`cisOrg`.`display_name` AS `org_display_name` from (`cis_sys_config` `cisCg` join `cis_org_details` `cisOrg` on((`cisOrg`.`id` = `cisCg`.`org_details_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `trash_programme_list`
--

/*!50001 DROP TABLE IF EXISTS `trash_programme_list`*/;
/*!50001 DROP VIEW IF EXISTS `trash_programme_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `trash_programme_list` AS select `cdp`.`id` AS `id`,`cdp`.`parent_program_id` AS `parent_program_id`,`cdp`.`campus_id` AS `campus_id`,`cdp`.`name` AS `name`,`cdp`.`display_name` AS `display_name`,`cdp`.`code` AS `code`,`cdp`.`description` AS `description`,`cdp`.`dt_added` AS `dt_added`,`cdp`.`status` AS `status`,`cdp`.`deleted` AS `deleted`,`cdp`.`year_started` AS `year_started`,`cdp`.`nta_level` AS `nta_level`,`cdp`.`code_no` AS `code_no`,`cdp`.`is_stop_level` AS `is_stop_level`,`cdp`.`level_year` AS `level_year`,`pg`.`code` AS `pg_parent`,`cm`.`name` AS `campus_name` from ((`cis_department_programs` `cdp` left join `cis_campus_list` `cm` on((`cm`.`id` = `cdp`.`campus_id`))) left join `cis_department_programs` `pg` on((`pg`.`id` = `cdp`.`parent_program_id`))) where (`cdp`.`deleted` = 1) order by `cdp`.`nta_level`,`cdp`.`level_year`,`cdp`.`code_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `trashed_departments_list`
--

/*!50001 DROP TABLE IF EXISTS `trashed_departments_list`*/;
/*!50001 DROP VIEW IF EXISTS `trashed_departments_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `trashed_departments_list` AS select `cdl`.`id` AS `dp_id`,`cdl`.`removed` AS `removed`,`cdl`.`code` AS `code`,`cdl`.`name` AS `name`,`cdl`.`description` AS `description`,`cdl`.`head` AS `head`,`cdl`.`campus_id` AS `campus_id`,`cdl`.`facult_id` AS `facult_id`,`ccf`.`facult_name` AS `faculty`,`ccf`.`head` AS `facult_head`,`ccl`.`name` AS `campus_name` from ((`cis_department_list` `cdl` left join `cis_campus_faculty` `ccf` on((`cdl`.`facult_id` = `ccf`.`id`))) left join `cis_campus_list` `ccl` on(((`cdl`.`campus_id` = `ccl`.`id`) and (`cdl`.`removed` = 1)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-21 14:09:28
