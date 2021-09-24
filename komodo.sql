-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`products` (
  `idproducts` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `cost` INT NOT NULL,
  `keywords` VARCHAR(200) NOT NULL,
  `color` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idproducts`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`payment` (
  `id_payment` INT NOT NULL AUTO_INCREMENT,
  `sympe` VARCHAR(50) NOT NULL,
  `bank_deposit` VARCHAR(50) NOT NULL,
  `paypal` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_payment`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`clients` (
  `idclients` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `surnames` VARCHAR(100) NOT NULL,
  `cellphone` VARCHAR(50) NOT NULL,
  `province` VARCHAR(50) NOT NULL,
  `canton` VARCHAR(50) NOT NULL,
  `district` VARCHAR(50) NOT NULL,
  `postal_code` INT NOT NULL,
  `direction_street` TEXT NOT NULL,
  `car_products` VARCHAR(200) NOT NULL,
  `id_payment` INT NOT NULL,
  PRIMARY KEY (`idclients`),
  CONSTRAINT `fk_clients_payment1`
    FOREIGN KEY (`id_payment`)
    REFERENCES `mydb`.`payment` (`id_payment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invoice` (
  `id_invoice` INT NOT NULL AUTO_INCREMENT,
  `code` INT NOT NULL,
  `date` DATE NOT NULL,
  `id_clients` INT NOT NULL,
  PRIMARY KEY (`id_invoice`),
  CONSTRAINT `fk_invoice_clients1`
    FOREIGN KEY (`id_clients`)
    REFERENCES `mydb`.`clients` (`idclients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invoice_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invoice_details` (
  `idinvoice_details` INT NOT NULL AUTO_INCREMENT,
  `amount` INT NOT NULL,
  `total` INT NOT NULL,
  `id_products` INT NOT NULL,
  `id_invoice` INT NOT NULL,
  PRIMARY KEY (`idinvoice_details`),
  CONSTRAINT `fk_invoice_details_products`
    FOREIGN KEY (`id_products`)
    REFERENCES `mydb`.`products` (`idproducts`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_details_invoice1`
    FOREIGN KEY (`id_invoice`)
    REFERENCES `mydb`.`invoice` (`id_invoice`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
