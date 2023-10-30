CREATE DATABASE tbl_member;

USE tbl_member;

CREATE TABLE tbl_member (
  idx int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id varchar(50) NOT NULL UNIQUE,
  user_name varchar(50) NOT NULL,
  user_email varchar(100) NOT NULL UNIQUE,
  user_password varchar(100) NOT NULL,
  user_register datetime NOT NULL,
  user_birth date DEFAULT NULL,
  user_gender enum('m', 'f') DEFAULT NULL,
  user_age int DEFAULT NULL,
  user_level tinyint unsigned DEFAULT '0',
  user_point int DEFAULT NULL
);

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