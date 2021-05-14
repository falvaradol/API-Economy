-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema economy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema economy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `economy` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema economy
-- -----------------------------------------------------
USE `economy` ;

-- -----------------------------------------------------
-- Table `economy`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `estado` CHAR(1) NOT NULL,
  `email` VARCHAR(45) NULL,
  `validado` TINYINT(1) NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `fecha_modificacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `economy`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`persona` (
  `id` INT NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NULL,
  `usuario_id` INT NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_persona_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `economy`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `economy`.`concepto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`concepto` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `usuario_registro` INT NULL,
  `tipo` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `economy`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`contacto` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `persona_id` INT NOT NULL,
  `persona_contacto_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contacto_persona1_idx` (`persona_id` ASC),
  INDEX `fk_contacto_persona2_idx` (`persona_contacto_id` ASC),
  CONSTRAINT `fk_contacto_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `economy`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contacto_persona2`
    FOREIGN KEY (`persona_contacto_id`)
    REFERENCES `economy`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `economy`.`egreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`egreso` (
  `id` INT NOT NULL,
  `monto` DECIMAL(7,2) NOT NULL,
  `concepto_id` INT NOT NULL,
  `contacto_id` INT NOT NULL,
  `comentario` VARCHAR(45) NULL,
  `comprobante` VARBINARY(255) NULL,
  `fecha` DATETIME NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `fecha_modificacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_egreso_concepto1_idx` (`concepto_id` ASC),
  INDEX `fk_egreso_contacto1_idx` (`contacto_id` ASC),
  CONSTRAINT `fk_egreso_concepto1`
    FOREIGN KEY (`concepto_id`)
    REFERENCES `economy`.`concepto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_egreso_contacto1`
    FOREIGN KEY (`contacto_id`)
    REFERENCES `economy`.`contacto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `economy`.`ingreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`ingreso` (
  `id` INT NOT NULL,
  `monto` DECIMAL(7,2) NOT NULL,
  `concepto_id` INT NOT NULL,
  `comentario` VARCHAR(45) NULL,
  `fecha` DATETIME NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `fecha_modificacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ingreso_concepto1_idx` (`concepto_id` ASC),
  CONSTRAINT `fk_ingreso_concepto1`
    FOREIGN KEY (`concepto_id`)
    REFERENCES `economy`.`concepto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `economy`.`frecuente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `economy`.`frecuente` (
  `id` INT NOT NULL,
  `concepto_id` INT NOT NULL,
  `persona_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_frecuente_concepto1_idx` (`concepto_id` ASC),
  INDEX `fk_frecuente_persona1_idx` (`persona_id` ASC),
  CONSTRAINT `fk_frecuente_concepto1`
    FOREIGN KEY (`concepto_id`)
    REFERENCES `economy`.`concepto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_frecuente_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `economy`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
