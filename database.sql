DROP DATABASE IF EXISTS `db3lm`;
CREATE DATABASE IF NOT EXISTS `db3lm`;

USE `db3lm`;

CREATE TABLE IF NOT EXISTS `db3lm`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `db3lm`.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `birthDate` DATE NOT NULL,
  `role` INT NOT NULL,
  `salary` DECIMAL(10,2) NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`role`) REFERENCES `db3lm`.`role` (`id`)
);


INSERT INTO role (description) values ('TI');
INSERT INTO role (description) values ('RH');
INSERT INTO role (description) values ('Financeiro');
INSERT INTO role (description) values ('Administrativo');
INSERT INTO role (description) values ('Comercial');

INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES ('João', 'Silva', '1990-10-10', 1, 1000.00);
INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES ('Pedro', 'Silva', '1990-11-11', 3, 1000.00);
INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES ('Maria', 'Santos', '1990-09-09', 1, 1000.00);
INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES ('José', 'Silva', '1990-08-08', 2, 1000.00);
INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES ('Paula', 'Santos', '1990-07-07', 3, 1000.00);
INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES ('Ana', 'Silva', '1990-06-06', 1, 1000.00);

