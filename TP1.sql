CREATE DATABASE TP1;

USE TP1;

CREATE TABLE `user` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastName` VARCHAR(50) NOT NULL,
  `firstName` VARCHAR(50) NOT NULL,
  `birthDate` DATE NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `postalCode` INT(5) UNSIGNED,
  `phone` INT(10) UNSIGNED,
  `service` INT UNSIGNED,
  PRIMARY KEY (Id)
);


CREATE TABLE `service` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `serviceName` VARCHAR(50) NOT NULL,
  `description` VARCHAR(100) NOT NULL,
  PRIMARY KEY (Id)
);

INSERT INTO `service` (`serviceName`,`description`)
VALUES ('Maintenance', 'Les spécialistes du Hardware'),
('Web Developer', 'Pour eux tout est code'),
('Web Designer', 'Y a que le CSS dans la vie'),
('Reférenceur', 'Regarde les Serps Google du matin au soir et du soir au matin');
