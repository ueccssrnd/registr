CREATE DATABASE `registr_database`;


CREATE TABLE `registered_people` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` char(50) NOT NULL,
  `middle_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `university` char(150) NOT NULL,
  `college` char(150) NOT NULL,
  PRIMARY KEY (`id`)
);