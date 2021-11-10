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
-- Table `mydb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product` (
  `id_product` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `cost` DOUBLE NOT NULL,
  `keywords` VARCHAR(250) NOT NULL,
  `color` VARCHAR(200) NOT NULL,
  `stock` INT NOT NULL,
  `url` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`client` (
  `id_client` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `first_surname` VARCHAR(50) NOT NULL,
  `second_surname` VARCHAR(50) NOT NULL,
  `cellphone` VARCHAR(50) NOT NULL,
  `province` VARCHAR(50) NOT NULL,
  `canton` VARCHAR(50) NOT NULL,
  `district` VARCHAR(50) NOT NULL,
  `postal_code` INT NOT NULL,
  `direction_street` TEXT NOT NULL,
  `cart_products` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_client`))
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
-- Table `mydb`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invoice` (
  `id_invoice` INT NOT NULL AUTO_INCREMENT,
  `id_client` INT NOT NULL,
  `code` INT NOT NULL,
  `date` DATE NOT NULL,
  `total` DOUBLE NOT NULL,
  `id_payment` INT NOT NULL,
  PRIMARY KEY (`id_invoice`),
  INDEX `fk_invoice_clients1_idx` (`id_client` ASC),
  UNIQUE INDEX `id_clients_UNIQUE` (`id_client` ASC),
  INDEX `fk_invoice_payment1_idx` (`id_payment` ASC),
  CONSTRAINT `fk_invoice_clients1`
    FOREIGN KEY (`id_client`)
    REFERENCES `mydb`.`client` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_payment1`
    FOREIGN KEY (`id_payment`)
    REFERENCES `mydb`.`payment` (`id_payment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invoice_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invoice_detail` (
  `id_invoice_detail` INT NOT NULL AUTO_INCREMENT,
  `id_product` INT NOT NULL,
  `id_invoice` INT NOT NULL,
  `subtotal` DOUBLE NOT NULL,
  PRIMARY KEY (`id_invoice_detail`),
  INDEX `fk_invoice_details_products_idx` (`id_product` ASC),
  INDEX `fk_invoice_details_invoice1_idx` (`id_invoice` ASC),
  CONSTRAINT `fk_invoice_details_products`
    FOREIGN KEY (`id_product`)
    REFERENCES `mydb`.`product` (`id_product`)
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
