-- MySQL Workbench Synchronization
-- Generated: 2019-01-22 15:20
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Jake Gratil

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `mydb`.`concessionaire` (
  `concess_id` INT(11) NOT NULL,
  `concess_name` VARCHAR(45) NULL DEFAULT NULL,
  `concess_address` VARCHAR(45) NULL DEFAULT NULL,
  `concess_contactno` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`concess_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`gm_users` (
  `user_id` INT(11) NOT NULL,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `middle_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `contactno` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `address` VARCHAR(45) NULL DEFAULT NULL,
  `usertype_id` INT(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_gm_users_gm_usertype1_idx` (`usertype_id` ASC),
  CONSTRAINT `fk_gm_users_gm_usertype1`
    FOREIGN KEY (`usertype_id`)
    REFERENCES `mydb`.`gm_usertype` (`usertype_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`suppliers` (
  `supplier_id` INT(11) NOT NULL,
  `supplier_name` VARCHAR(45) NULL DEFAULT NULL,
  `supplier_address` VARCHAR(45) NULL DEFAULT NULL,
  `supplier_contactno` VARCHAR(45) NULL DEFAULT NULL,
  `supplier_email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`supplier_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`clients` (
  `client_id` INT(11) NOT NULL,
  `client_name` VARCHAR(45) NULL DEFAULT NULL,
  `client_address` VARCHAR(45) NULL DEFAULT NULL,
  `client_contactno` VARCHAR(45) NULL DEFAULT NULL,
  `client_email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`client_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`warehouses` (
  `warehouse_id` INT(11) NOT NULL,
  `warehouse` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`warehouse_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`items_trading` (
  `item_id` INT(11) NOT NULL,
  `item_name` VARCHAR(45) NULL DEFAULT NULL,
  `itemtype_id` INT(11) NOT NULL,
  `item_count` VARCHAR(45) NULL DEFAULT NULL,
  `brand_id` INT(11) NOT NULL,
  `last_restock` DATETIME NULL DEFAULT NULL,
  `last_update` DATETIME NULL DEFAULT NULL,
  `threshold_amt` INT(11) NULL DEFAULT NULL,
  `warehouse_id` INT(11) NOT NULL,
  `supplier_id` INT(11) NOT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_items_ref_itemtype1_idx` (`itemtype_id` ASC),
  INDEX `fk_items_ref_brands1_idx` (`brand_id` ASC),
  INDEX `fk_items_warehouses1_idx` (`warehouse_id` ASC),
  INDEX `fk_items_trading_suppliers1_idx` (`supplier_id` ASC),
  CONSTRAINT `fk_items_ref_itemtype1`
    FOREIGN KEY (`itemtype_id`)
    REFERENCES `mydb`.`ref_itemtype` (`itemtype_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_ref_brands1`
    FOREIGN KEY (`brand_id`)
    REFERENCES `mydb`.`ref_brands` (`brand_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_warehouses1`
    FOREIGN KEY (`warehouse_id`)
    REFERENCES `mydb`.`warehouses` (`warehouse_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_trading_suppliers1`
    FOREIGN KEY (`supplier_id`)
    REFERENCES `mydb`.`suppliers` (`supplier_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`gm_usertype` (
  `usertype_id` INT(11) NOT NULL,
  `usertype` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`usertype_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`orders` (
  `ordernumber` INT(11) NOT NULL,
  `client_id` INT(11) NOT NULL,
  `order_date` DATETIME NULL DEFAULT NULL,
  `delivery_date` DATETIME NULL DEFAULT NULL,
  `orderscol` VARCHAR(45) NULL DEFAULT NULL,
  `payment_id` INT(11) NOT NULL,
  `totalamt` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ordernumber`),
  INDEX `fk_orders_clients1_idx` (`client_id` ASC),
  INDEX `fk_orders_ref_payment1_idx` (`payment_id` ASC),
  CONSTRAINT `fk_orders_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `mydb`.`clients` (`client_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_ref_payment1`
    FOREIGN KEY (`payment_id`)
    REFERENCES `mydb`.`ref_payment` (`payment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`order_details` (
  `ordernumber` INT(11) NOT NULL,
  `client_id` INT(11) NOT NULL,
  `item_id` INT(11) NOT NULL,
  `item_name` VARCHAR(45) NULL DEFAULT NULL,
  `item_price` DOUBLE NULL DEFAULT NULL,
  `item_qty` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ordernumber`),
  INDEX `fk_order_details_clients1_idx` (`client_id` ASC),
  INDEX `fk_order_details_items_trading1_idx` (`item_id` ASC),
  CONSTRAINT `fk_order_details_orders1`
    FOREIGN KEY (`ordernumber`)
    REFERENCES `mydb`.`orders` (`ordernumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_details_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `mydb`.`clients` (`client_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_details_items_trading1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`items_trading` (`item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`ref_itemtype` (
  `itemtype_id` INT(11) NOT NULL,
  `itemtype` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`itemtype_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`ref_brands` (
  `brand_id` INT(11) NOT NULL,
  `brand` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`items_depot` (
  `item_id` INT(11) NOT NULL,
  `item_name` VARCHAR(45) NULL DEFAULT NULL,
  `itemtype_id` INT(11) NOT NULL,
  `item_count` VARCHAR(45) NULL DEFAULT NULL,
  `brand_id` INT(11) NOT NULL,
  `last_restock` DATETIME NULL DEFAULT NULL,
  `last_update` DATETIME NULL DEFAULT NULL,
  `threshold_amt` INT(11) NULL DEFAULT NULL,
  `warehouse_id` INT(11) NOT NULL,
  `concessionaire_concess_id` INT(11) NOT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_items_ref_itemtype1_idx` (`itemtype_id` ASC),
  INDEX `fk_items_ref_brands1_idx` (`brand_id` ASC),
  INDEX `fk_items_warehouses1_idx` (`warehouse_id` ASC),
  INDEX `fk_items_depot_concessionaire1_idx` (`concessionaire_concess_id` ASC),
  CONSTRAINT `fk_items_ref_itemtype10`
    FOREIGN KEY (`itemtype_id`)
    REFERENCES `mydb`.`ref_itemtype` (`itemtype_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_ref_brands10`
    FOREIGN KEY (`brand_id`)
    REFERENCES `mydb`.`ref_brands` (`brand_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_warehouses10`
    FOREIGN KEY (`warehouse_id`)
    REFERENCES `mydb`.`warehouses` (`warehouse_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_depot_concessionaire1`
    FOREIGN KEY (`concessionaire_concess_id`)
    REFERENCES `mydb`.`concessionaire` (`concess_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`ref_payment` (
  `payment_id` INT(11) NOT NULL,
  `paymenttype` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

CREATE TABLE IF NOT EXISTS `mydb`.`sales_trading` (
  `item_id` INT(11) NOT NULL,
  `item_name` VARCHAR(45) NULL DEFAULT NULL,
  `item_price` DOUBLE NULL DEFAULT NULL,
  `total_sold` DOUBLE NULL DEFAULT NULL,
  `qty_sold` INT(11) NULL DEFAULT NULL,
  INDEX `fk_sales_trading_items_trading1_idx` (`item_id` ASC),
  CONSTRAINT `fk_sales_trading_items_trading1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`items_trading` (`item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`sales_depot` (
  `item_id` INT(11) NOT NULL,
  `item_name` VARCHAR(45) NULL DEFAULT NULL,
  `item_price` VARCHAR(45) NULL DEFAULT NULL,
  `total_sold` VARCHAR(45) NULL DEFAULT NULL,
  `qty_sold` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_sales_depot_items_depot1_idx` (`item_id` ASC),
  CONSTRAINT `fk_sales_depot_items_depot1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`items_depot` (`item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
