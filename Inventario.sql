SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `inventario` ;

-- -----------------------------------------------------
-- Table `inventario`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`role` (
  `idRole` INT NOT NULL,
  `roleName` VARCHAR(45) NOT NULL,
  `roleDescription` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRole`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`user` (
  `idUser` VARCHAR(20) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `Role_idRole` INT NOT NULL,
  PRIMARY KEY (`idUser`),
  INDEX `fk_User_Role_idx` (`Role_idRole` ASC),
  CONSTRAINT `fk_User_Role`
    FOREIGN KEY (`Role_idRole`)
    REFERENCES `inventario`.`role` (`idRole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`brand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`brand` (
  `idBrand` INT NOT NULL AUTO_INCREMENT,
  `brandName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBrand`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`model`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`model` (
  `idModel` INT NOT NULL AUTO_INCREMENT,
  `modelName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idModel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`type` (
  `idtype` VARCHAR(2) NOT NULL,
  `typeDescription` VARCHAR(45) NULL,
  PRIMARY KEY (`idtype`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`subType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`subType` (
  `idsubType` VARCHAR(2) NOT NULL,
  `subTypeDescription` VARCHAR(45) NULL,
  PRIMARY KEY (`idsubType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`inventory` (
  `type_idtype` VARCHAR(2) NOT NULL,
  `subType_idsubType` VARCHAR(2) NOT NULL,
  `idinventroy` VARCHAR(3) NOT NULL,
  `RESA` VARCHAR(45) NULL,
  `serialNumber` VARCHAR(45) NULL,
  `descrption` VARCHAR(140) NOT NULL,
  `lastChange` DATETIME NOT NULL,
  `model_idModel` INT NOT NULL,
  `brand_idBrand` INT NOT NULL,
  `user_idUser` VARCHAR(20) NOT NULL,
  INDEX `fk_inventory_type1_idx` (`type_idtype` ASC),
  INDEX `fk_inventory_subType1_idx` (`subType_idsubType` ASC),
  INDEX `fk_inventory_brand1_idx` (`brand_idBrand` ASC),
  INDEX `fk_inventory_model1_idx` (`model_idModel` ASC),
  PRIMARY KEY (`type_idtype`, `subType_idsubType`, `idinventroy`),
  INDEX `fk_inventory_user1_idx` (`user_idUser` ASC),
  CONSTRAINT `fk_inventory_type1`
    FOREIGN KEY (`type_idtype`)
    REFERENCES `inventario`.`type` (`idtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_subType1`
    FOREIGN KEY (`subType_idsubType`)
    REFERENCES `inventario`.`subType` (`idsubType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_brand1`
    FOREIGN KEY (`brand_idBrand`)
    REFERENCES `inventario`.`brand` (`idBrand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_model1`
    FOREIGN KEY (`model_idModel`)
    REFERENCES `inventario`.`model` (`idModel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_user1`
    FOREIGN KEY (`user_idUser`)
    REFERENCES `inventario`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`statusComputer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`statusComputer` (
  `inventory_type_idtype` VARCHAR(2) NOT NULL,
  `inventory_subType_idsubType` VARCHAR(2) NOT NULL,
  `inventory_idinventroy` VARCHAR(3) NOT NULL,
  `display` TINYINT(1) NOT NULL,
  `mouse` TINYINT(1) NOT NULL,
  `keyboard` TINYINT(1) NOT NULL,
  `usb1` TINYINT(1) NOT NULL,
  `usb2` TINYINT(1) NOT NULL,
  `usb3` TINYINT(1) NULL,
  `ethernet` TINYINT(1) NOT NULL,
  `wifi` TINYINT(1) NOT NULL,
  `earphones` TINYINT(1) NOT NULL,
  `mic` TINYINT(1) NOT NULL,
  `battery` TINYINT(1) NOT NULL,
  `charger` TINYINT(1) NOT NULL,
  `hdd` TINYINT(1) NOT NULL,
  `ram` TINYINT(1) NOT NULL,
  `observations` VARCHAR(140) NULL,
  INDEX `fk_statusComputer_inventory1_idx` (`inventory_type_idtype` ASC, `inventory_subType_idsubType` ASC, `inventory_idinventroy` ASC),
  PRIMARY KEY (`inventory_type_idtype`, `inventory_subType_idsubType`, `inventory_idinventroy`),
  CONSTRAINT `fk_statusComputer_inventory1`
    FOREIGN KEY (`inventory_type_idtype` , `inventory_subType_idsubType` , `inventory_idinventroy`)
    REFERENCES `inventario`.`inventory` (`type_idtype` , `subType_idsubType` , `idinventroy`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`statusInventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`statusInventory` (
  `inventory_type_idtype` VARCHAR(2) NOT NULL,
  `inventory_subType_idsubType` VARCHAR(2) NOT NULL,
  `inventory_idinventroy` VARCHAR(3) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `observations` VARCHAR(140) NULL,
  INDEX `fk_statusFurniture_inventory1_idx` (`inventory_type_idtype` ASC, `inventory_subType_idsubType` ASC, `inventory_idinventroy` ASC),
  PRIMARY KEY (`inventory_type_idtype`, `inventory_subType_idsubType`, `inventory_idinventroy`),
  CONSTRAINT `fk_statusFurniture_inventory1`
    FOREIGN KEY (`inventory_type_idtype` , `inventory_subType_idsubType` , `inventory_idinventroy`)
    REFERENCES `inventario`.`inventory` (`type_idtype` , `subType_idsubType` , `idinventroy`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`damageReport`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`damageReport` (
  `iddamageReport` INT NOT NULL AUTO_INCREMENT,
  `openReportDate` DATETIME NOT NULL,
  `outDate` DATETIME NULL,
  `outStatus` VARCHAR(140) NULL,
  `inDate` DATETIME NULL,
  `inStatus` VARCHAR(140) NULL,
  `closeReportDate` DATETIME NULL,
  `inttelmexStaff` VARCHAR(45) NULL,
  `supplierStaff` VARCHAR(45) NULL,
  `inventory_type_idtype` VARCHAR(2) NOT NULL,
  `inventory_subType_idsubType` VARCHAR(2) NOT NULL,
  `inventory_idinventroy` VARCHAR(3) NOT NULL,
  `user_idUser` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`iddamageReport`),
  INDEX `fk_damageReport_inventory1_idx` (`inventory_type_idtype` ASC, `inventory_subType_idsubType` ASC, `inventory_idinventroy` ASC),
  INDEX `fk_damageReport_user1_idx` (`user_idUser` ASC),
  CONSTRAINT `fk_damageReport_inventory1`
    FOREIGN KEY (`inventory_type_idtype` , `inventory_subType_idsubType` , `inventory_idinventroy`)
    REFERENCES `inventario`.`inventory` (`type_idtype` , `subType_idsubType` , `idinventroy`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_damageReport_user1`
    FOREIGN KEY (`user_idUser`)
    REFERENCES `inventario`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`login` (
  `idlogin` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `user_idUser` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idlogin`),
  INDEX `fk_login_user1_idx` (`user_idUser` ASC),
  CONSTRAINT `fk_login_user1`
    FOREIGN KEY (`user_idUser`)
    REFERENCES `inventario`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
