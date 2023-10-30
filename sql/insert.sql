-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        8.0.34 - MySQL Community Server - GPL
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- tbl_member 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `tbl_member` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tbl_member`;

-- 테이블 tbl_member.tbl_member 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_member` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_register` datetime NOT NULL,
  `user_birth` date DEFAULT NULL,
  `user_gender` enum('m','f') DEFAULT NULL,
  `user_age` int DEFAULT NULL,
  `user_level` tinyint unsigned DEFAULT '0',
  `user_point` int DEFAULT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  CONSTRAINT `tbl_member_chk_1` CHECK ((`user_age` >= 19))
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 테이블 데이터 tbl_member.tbl_member:~5 rows (대략적) 내보내기
INSERT INTO `tbl_member` (`idx`, `user_id`, `user_name`, `user_email`, `user_password`, `user_register`, `user_birth`, `user_gender`, `user_age`, `user_level`, `user_point`) VALUES
	(1, 'admin', '관리자', 'admin@lacalhost.com', '1234', '2023-10-14 09:51:10', '1993-05-10', 'f', 30, 9, NULL),
	(6, 'hongD', '다다다', 'hongd@hanmail.net', '1234567', '2023-10-15 12:29:57', NULL, NULL, NULL, 0, NULL),
	(7, 'mr.k', '콩콩', 'kong@daum.net', '1234', '2023-10-15 12:32:19', NULL, NULL, NULL, 0, NULL),
	(8, '홍길동', '윗윗', 'kildong@hong.com', '1234', '2023-10-15 12:39:52', NULL, NULL, NULL, 0, NULL),
	(9, 'hello', '다다', 'zz@hanmail.net', '1234', '2023-10-15 12:51:38', NULL, NULL, NULL, 0, NULL),
	(21, 'sadfsdf', 'asdfsadf', 'asdfsdf', '1234', '2023-10-24 20:45:53', NULL, NULL, NULL, 0, NULL),
	(22, 'sdafasdf', 'asdfasdf', 'fasdasdf', '1234', '2023-10-24 20:45:58', NULL, NULL, NULL, 0, NULL),
	(23, 'zzz', 'zz', 'zz', '1234', '2023-10-24 20:46:09', NULL, NULL, NULL, 0, NULL),
	(24, 'z', 'z', 'z', '1234', '2023-10-24 20:46:13', NULL, NULL, NULL, 0, NULL),
	(25, 'gggxxx', 'gg', 'gggg', '1234', '2023-10-24 20:46:19', NULL, NULL, NULL, 0, NULL),
	(26, 'gg', 'gg', 'gg', '1234', '2023-10-24 20:46:22', NULL, NULL, NULL, 0, NULL),
	(27, 'asdfsdf', 'sdfsfd', 'sdfsfd', '1234', '2023-10-24 20:46:26', NULL, NULL, NULL, 0, NULL),
	(28, 'sadfsf', 'asdfasdf', 'sfsf', '1234', '2023-10-24 20:46:30', NULL, NULL, NULL, 0, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
