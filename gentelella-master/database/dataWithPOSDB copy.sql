-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: GM MIS
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `﻿BranchID` int(11) NOT NULL,
  `BranchCode` text,
  PRIMARY KEY (`﻿BranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (0,'MAIN'),(1,'CALAMBA');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businessdays`
--

DROP TABLE IF EXISTS `businessdays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businessdays` (
  `﻿BusinessDayID` bigint(20) NOT NULL,
  `BusinessDate` datetime DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  `IsActive` text,
  `PreviousGrandTotal` double DEFAULT NULL,
  `GrandTotal` double DEFAULT NULL,
  `BranchID` bigint(20) DEFAULT NULL,
  `GUID` text,
  PRIMARY KEY (`﻿BusinessDayID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businessdays`
--

LOCK TABLES `businessdays` WRITE;
/*!40000 ALTER TABLE `businessdays` DISABLE KEYS */;
/*!40000 ALTER TABLE `businessdays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cancelledtransactions`
--

DROP TABLE IF EXISTS `cancelledtransactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cancelledtransactions` (
  `﻿CancelledTransactionID` bigint(20) NOT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `ReferenceID` bigint(20) DEFAULT NULL,
  `ReferenceType` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿CancelledTransactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cancelledtransactions`
--

LOCK TABLES `cancelledtransactions` WRITE;
/*!40000 ALTER TABLE `cancelledtransactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cancelledtransactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `﻿CategoryID` bigint(20) NOT NULL,
  `DepartmentID` bigint(20) DEFAULT NULL,
  `CategoryCode` text,
  `CategoryName` text,
  `IsDeleted` text,
  `GUID` text,
  `TerminalID` bigint(20) DEFAULT NULL,
  `LastModified` datetime DEFAULT NULL,
  PRIMARY KEY (`﻿CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checks`
--

DROP TABLE IF EXISTS `checks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checks` (
  `﻿CheckID` bigint(20) NOT NULL,
  `PaymentDetailID` bigint(20) DEFAULT NULL,
  `BankID` bigint(20) DEFAULT NULL,
  `CheckNumber` text,
  `CheckDate` datetime DEFAULT NULL,
  `Amount` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿CheckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checks`
--

LOCK TABLES `checks` WRITE;
/*!40000 ALTER TABLE `checks` DISABLE KEYS */;
/*!40000 ALTER TABLE `checks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(45) DEFAULT NULL,
  `client_address` varchar(45) DEFAULT NULL,
  `client_contactno` varchar(45) DEFAULT NULL,
  `client_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concessionaire`
--

DROP TABLE IF EXISTS `concessionaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concessionaire` (
  `concess_id` int(11) NOT NULL,
  `concess_name` varchar(45) DEFAULT NULL,
  `concess_address` varchar(45) DEFAULT NULL,
  `concess_contactno` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`concess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concessionaire`
--

LOCK TABLES `concessionaire` WRITE;
/*!40000 ALTER TABLE `concessionaire` DISABLE KEYS */;
INSERT INTO `concessionaire` VALUES (1,'Darda','7872 Anniversary Circle','(190) 5703683'),(2,'Meg','58648 Columbus Plaza','(706) 6928842'),(3,'Carrie','74 Commercial Alley','(934) 4272345'),(4,'Leora','6 Mendota Parkway','(982) 1333707'),(5,'Kenyon','5713 Northview Street','(178) 3826959'),(6,'Roana','853 Debra Way','(867) 7104611'),(7,'Benoit','329 South Point','(364) 7325104'),(8,'Nesta','939 Kingsford Park','(372) 5243573'),(9,'Hilde','2362 Prentice Road','(527) 1973667'),(10,'Lucila','2 Heath Court','(740) 7782095');
/*!40000 ALTER TABLE `concessionaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creditmemodistributions`
--

DROP TABLE IF EXISTS `creditmemodistributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creditmemodistributions` (
  `﻿CreditMemoDistributionID` bigint(20) NOT NULL,
  `CreditMemoID` bigint(20) DEFAULT NULL,
  `UsedReferenceID` bigint(20) DEFAULT NULL,
  `ReferenceType` bigint(20) DEFAULT NULL,
  `ShiftID` bigint(20) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿CreditMemoDistributionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditmemodistributions`
--

LOCK TABLES `creditmemodistributions` WRITE;
/*!40000 ALTER TABLE `creditmemodistributions` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditmemodistributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creditmemos`
--

DROP TABLE IF EXISTS `creditmemos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creditmemos` (
  `﻿CreditMemoID` bigint(20) NOT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `ReferenceID` bigint(20) DEFAULT NULL,
  `ReferenceType` bigint(20) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `ShiftID` bigint(20) DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  `Remarks` text,
  `GUID` text,
  PRIMARY KEY (`﻿CreditMemoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditmemos`
--

LOCK TABLES `creditmemos` WRITE;
/*!40000 ALTER TABLE `creditmemos` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditmemos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `﻿CustomerID` bigint(20) NOT NULL,
  `CustomerName` text,
  `Address` text,
  `TelNo` text,
  `FaxNo` text,
  `IsDeleted` text,
  `ContactPerson` text,
  `GUID` text,
  `TerminalID` bigint(20) DEFAULT NULL,
  `LastModified` datetime DEFAULT NULL,
  PRIMARY KEY (`﻿CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gm_users`
--

DROP TABLE IF EXISTS `gm_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gm_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `contactno` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `usertype_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_gm_users_gm_usertype1_idx` (`usertype_id`),
  CONSTRAINT `fk_gm_users_gm_usertype1` FOREIGN KEY (`usertype_id`) REFERENCES `gm_usertype` (`usertype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gm_users`
--

LOCK TABLES `gm_users` WRITE;
/*!40000 ALTER TABLE `gm_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `gm_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gm_usertype`
--

DROP TABLE IF EXISTS `gm_usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gm_usertype` (
  `usertype_id` int(11) NOT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gm_usertype`
--

LOCK TABLES `gm_usertype` WRITE;
/*!40000 ALTER TABLE `gm_usertype` DISABLE KEYS */;
/*!40000 ALTER TABLE `gm_usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorydistributions`
--

DROP TABLE IF EXISTS `inventorydistributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorydistributions` (
  `﻿InventoryDistributionID` bigint(20) NOT NULL,
  `InventoryOutDetailID` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `InventoryInDetailID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿InventoryDistributionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorydistributions`
--

LOCK TABLES `inventorydistributions` WRITE;
/*!40000 ALTER TABLE `inventorydistributions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventorydistributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryindetails`
--

DROP TABLE IF EXISTS `inventoryindetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryindetails` (
  `﻿InventoryInDetailID` bigint(20) NOT NULL,
  `ReferenceID` bigint(20) DEFAULT NULL,
  `ReferenceType` bigint(20) DEFAULT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `SupplierID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `CostingType` bigint(20) DEFAULT NULL,
  `Cost` double DEFAULT NULL,
  `Discount` text,
  `Quantity` bigint(20) DEFAULT NULL,
  `GUID` text,
  PRIMARY KEY (`﻿InventoryInDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryindetails`
--

LOCK TABLES `inventoryindetails` WRITE;
/*!40000 ALTER TABLE `inventoryindetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventoryindetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryoutdetails`
--

DROP TABLE IF EXISTS `inventoryoutdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryoutdetails` (
  `﻿InventoryOutDetailID` bigint(20) NOT NULL,
  `ReferenceID` bigint(20) DEFAULT NULL,
  `ReferenceType` bigint(20) DEFAULT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `GUID` text,
  PRIMARY KEY (`﻿InventoryOutDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryoutdetails`
--

LOCK TABLES `inventoryoutdetails` WRITE;
/*!40000 ALTER TABLE `inventoryoutdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventoryoutdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorystocks`
--

DROP TABLE IF EXISTS `inventorystocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorystocks` (
  `﻿InventoryStockID` bigint(20) NOT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `StockOnHand` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿InventoryStockID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorystocks`
--

LOCK TABLES `inventorystocks` WRITE;
/*!40000 ALTER TABLE `inventorystocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventorystocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_depot`
--

DROP TABLE IF EXISTS `items_depot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_depot` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `itemtype_id` int(11) NOT NULL,
  `item_count` varchar(45) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `last_restock` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `threshold_amt` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `concessionaire_concess_id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_items_ref_itemtype1_idx` (`itemtype_id`),
  KEY `fk_items_ref_brands1_idx` (`brand_id`),
  KEY `fk_items_warehouses1_idx` (`warehouse_id`),
  KEY `fk_items_depot_concessionaire1_idx` (`concessionaire_concess_id`),
  CONSTRAINT `fk_items_depot_concessionaire1` FOREIGN KEY (`concessionaire_concess_id`) REFERENCES `concessionaire` (`concess_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_ref_brands10` FOREIGN KEY (`brand_id`) REFERENCES `ref_brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_ref_itemtype10` FOREIGN KEY (`itemtype_id`) REFERENCES `ref_itemtype` (`itemtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_warehouses10` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_depot`
--

LOCK TABLES `items_depot` WRITE;
/*!40000 ALTER TABLE `items_depot` DISABLE KEYS */;
INSERT INTO `items_depot` VALUES (1,'Slab A',1,'100',1,'2018-07-31 07:45:50','2019-09-01 06:00:00',10,1,1,1),(2,'Slab B',2,'100',2,'2018-08-01 07:45:00','2019-09-02 06:00:00',10,2,2,2),(3,'Slab C',3,'100',3,'2018-08-02 07:44:10','2019-09-03 06:00:00',10,3,3,3),(4,'Granite A',4,'100',4,'2018-08-03 07:43:20','2019-09-04 06:00:00',10,1,4,4),(5,'Granite B',5,'100',5,'2018-08-04 07:42:30','2019-09-05 06:00:00',10,2,5,5),(6,'Granite C',6,'100',6,'2018-08-05 07:41:40','2019-09-06 06:00:00',10,3,1,6),(7,'Granite D',7,'100',7,'2018-08-06 07:40:50','2019-09-07 06:00:00',10,1,2,7),(8,'Granite E',8,'100',8,'2018-08-07 07:40:00','2019-09-08 06:00:00',10,2,3,8),(9,'Granite F',9,'100',9,'2018-08-08 07:39:10','2019-09-09 06:00:00',10,3,4,9),(10,'Granite G',10,'100',10,'2018-08-09 07:38:20','2019-09-10 06:00:00',10,1,5,10),(11,'Slab D',1,'100',1,'2018-08-10 07:37:30','2019-09-11 06:00:00',10,2,1,11),(12,'Slab E',2,'100',2,'2018-08-11 07:36:40','2019-09-12 06:00:00',10,3,2,12),(13,'Slab F',3,'100',3,'2018-08-12 07:35:50','2019-09-13 06:00:00',10,1,3,13),(14,'Slab G',4,'100',4,'2018-08-13 07:35:00','2019-09-14 06:00:00',10,2,4,14),(15,'Granite H',5,'100',5,'2018-08-14 07:34:10','2019-09-15 06:00:00',10,3,5,15),(16,'Granite I',6,'100',6,'2018-08-15 07:33:20','2019-09-16 06:00:00',10,1,1,16),(17,'Granite J',7,'100',7,'2018-08-16 07:32:30','2019-09-17 06:00:00',10,2,2,17),(18,'Granite K',8,'100',8,'2018-08-17 07:31:40','2019-09-18 06:00:00',10,3,3,18),(19,'Slab H',9,'100',9,'2018-08-18 07:30:50','2019-09-19 06:00:00',10,1,4,19),(20,'Slab I',10,'100',10,'2018-08-19 07:30:00','2019-09-20 06:00:00',10,2,5,20);
/*!40000 ALTER TABLE `items_depot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_trading`
--

DROP TABLE IF EXISTS `items_trading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_trading` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) DEFAULT NULL,
  `itemtype_id` int(11) NOT NULL,
  `item_count` varchar(45) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `last_restock` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `threshold_amt` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_trading`
--

LOCK TABLES `items_trading` WRITE;
/*!40000 ALTER TABLE `items_trading` DISABLE KEYS */;
/*!40000 ALTER TABLE `items_trading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `ordernumber` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`ordernumber`),
  KEY `fk_order_details_clients1_idx` (`client_id`),
  KEY `fk_order_details_items_trading1_idx` (`item_id`),
  CONSTRAINT `fk_order_details_clients1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_details_items_trading1` FOREIGN KEY (`item_id`) REFERENCES `items_trading` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_details_orders1` FOREIGN KEY (`ordernumber`) REFERENCES `orders` (`ordernumber`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `ordernumber` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `orderscol` varchar(45) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `totalamt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ordernumber`),
  KEY `fk_orders_clients1_idx` (`client_id`),
  KEY `fk_orders_ref_payment1_idx` (`payment_id`),
  CONSTRAINT `fk_orders_clients1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_ref_payment1` FOREIGN KEY (`payment_id`) REFERENCES `ref_payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentdetails`
--

DROP TABLE IF EXISTS `paymentdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentdetails` (
  `﻿PaymentDetailID` bigint(20) NOT NULL,
  `PaymentID` bigint(20) DEFAULT NULL,
  `PaymentTypeID` bigint(20) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`﻿PaymentDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentdetails`
--

LOCK TABLES `paymentdetails` WRITE;
/*!40000 ALTER TABLE `paymentdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentdistributions`
--

DROP TABLE IF EXISTS `paymentdistributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentdistributions` (
  `﻿PaymentDistributionID` bigint(20) NOT NULL,
  `PaymentID` bigint(20) DEFAULT NULL,
  `ReceivableID` bigint(20) DEFAULT NULL,
  `AmountPaid` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿PaymentDistributionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentdistributions`
--

LOCK TABLES `paymentdistributions` WRITE;
/*!40000 ALTER TABLE `paymentdistributions` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentdistributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `﻿PaymentID` bigint(20) NOT NULL,
  `ShiftID` bigint(20) DEFAULT NULL,
  `SalesID` bigint(20) DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  `TenderedAmount` double DEFAULT NULL,
  `Change` double DEFAULT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `CustomerID` bigint(20) DEFAULT NULL,
  `Remarks` text,
  `PaymentType` bigint(20) DEFAULT NULL,
  `CustomerName` text,
  `ORNumber` bigint(20) DEFAULT NULL,
  `GUID` text,
  `TraceNumber` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿PaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymenttypes`
--

DROP TABLE IF EXISTS `paymenttypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymenttypes` (
  `﻿PaymentTypeID` bigint(20) NOT NULL,
  `Description` text,
  `IsDeleted` binary(1) DEFAULT NULL,
  `PaymentCode` text,
  PRIMARY KEY (`﻿PaymentTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymenttypes`
--

LOCK TABLES `paymenttypes` WRITE;
/*!40000 ALTER TABLE `paymenttypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymenttypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `physicalinventories`
--

DROP TABLE IF EXISTS `physicalinventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `physicalinventories` (
  `PhysicalInventoryID` bigint(20) NOT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `Remarks` text,
  `TargetBusinessDayID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`PhysicalInventoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `physicalinventories`
--

LOCK TABLES `physicalinventories` WRITE;
/*!40000 ALTER TABLE `physicalinventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `physicalinventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `physicalinventorydetails`
--

DROP TABLE IF EXISTS `physicalinventorydetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `physicalinventorydetails` (
  `PhysicalInventoryDetailID` bigint(20) NOT NULL,
  `PhysicalInventoryID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`PhysicalInventoryDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `physicalinventorydetails`
--

LOCK TABLES `physicalinventorydetails` WRITE;
/*!40000 ALTER TABLE `physicalinventorydetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `physicalinventorydetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` bigint(20) NOT NULL,
  `SKU` text,
  `ItemCode` text,
  `Description` text,
  `UnitName` text,
  `DepartmentID` bigint(20) DEFAULT NULL,
  `CategoryID` bigint(20) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `IsDeleted` binary(1) DEFAULT NULL,
  `ProductType` bigint(20) DEFAULT NULL,
  `PercentTax` bigint(20) DEFAULT NULL,
  `SupplierID` bigint(20) DEFAULT NULL,
  `ShortDescription` text,
  `CostingType` bigint(20) DEFAULT NULL,
  `Cost` text,
  `IsLocal` binary(1) DEFAULT NULL,
  `GUID` text,
  `TerminalID` bigint(20) DEFAULT NULL,
  `LastModified` datetime DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_brands`
--

DROP TABLE IF EXISTS `ref_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_brands` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_brands`
--

LOCK TABLES `ref_brands` WRITE;
/*!40000 ALTER TABLE `ref_brands` DISABLE KEYS */;
INSERT INTO `ref_brands` VALUES (1,'Schultz, Prosacco and Wolf'),(2,'Nolan-Satterfield'),(3,'Maggio-Abshire'),(4,'Towne and Sons'),(5,'Spinka Group'),(6,'Casper and Sons'),(7,'Gulgowski, Reichel and Dare'),(8,'Hintz, Harber and Rau'),(9,'Ward, King and Schimmel'),(10,'Gaylord-Dare');
/*!40000 ALTER TABLE `ref_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_itemtype`
--

DROP TABLE IF EXISTS `ref_itemtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_itemtype` (
  `itemtype_id` int(11) NOT NULL,
  `itemtype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`itemtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_itemtype`
--

LOCK TABLES `ref_itemtype` WRITE;
/*!40000 ALTER TABLE `ref_itemtype` DISABLE KEYS */;
INSERT INTO `ref_itemtype` VALUES (1,'Tools'),(2,'Security'),(3,'Toilet'),(4,'Tiles'),(5,'Granite'),(6,'Faucet'),(7,'Shower'),(8,'Lights'),(9,'Paint'),(10,'Door');
/*!40000 ALTER TABLE `ref_itemtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_payment`
--

DROP TABLE IF EXISTS `ref_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_payment` (
  `payment_id` int(11) NOT NULL,
  `paymenttype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_payment`
--

LOCK TABLES `ref_payment` WRITE;
/*!40000 ALTER TABLE `ref_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refunds`
--

DROP TABLE IF EXISTS `refunds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refunds` (
  `RefundID` bigint(20) NOT NULL,
  `CreditMemoID` bigint(20) DEFAULT NULL,
  `ShiftID` bigint(20) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`RefundID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refunds`
--

LOCK TABLES `refunds` WRITE;
/*!40000 ALTER TABLE `refunds` DISABLE KEYS */;
/*!40000 ALTER TABLE `refunds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `SalesID` bigint(20) NOT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `ShiftID` bigint(20) DEFAULT NULL,
  `Status` bigint(20) DEFAULT NULL,
  `PercentDiscount` text,
  `DiscountTypeID` bigint(20) DEFAULT NULL,
  `IsTaxIncluded` binary(1) DEFAULT NULL,
  `VoucherDiscount` text,
  `Remarks` text,
  `SalesType` bigint(20) DEFAULT NULL,
  `CustomerID` bigint(20) DEFAULT NULL,
  `Terms` bigint(20) DEFAULT NULL,
  `Reference` text,
  `PercentTax` bigint(20) DEFAULT NULL,
  `GUID` text,
  `TaxExcempt` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SalesID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_depot`
--

DROP TABLE IF EXISTS `sales_depot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_depot` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `item_price` varchar(45) DEFAULT NULL,
  `total_sold` varchar(45) DEFAULT NULL,
  `qty_sold` varchar(45) DEFAULT NULL,
  KEY `fk_sales_depot_items_depot1_idx` (`item_id`),
  CONSTRAINT `fk_sales_depot_items_depot1` FOREIGN KEY (`item_id`) REFERENCES `items_depot` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_depot`
--

LOCK TABLES `sales_depot` WRITE;
/*!40000 ALTER TABLE `sales_depot` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_depot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_trading`
--

DROP TABLE IF EXISTS `sales_trading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_trading` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `total_sold` double DEFAULT NULL,
  `qty_sold` int(11) DEFAULT NULL,
  KEY `fk_sales_trading_items_trading1_idx` (`item_id`),
  CONSTRAINT `fk_sales_trading_items_trading1` FOREIGN KEY (`item_id`) REFERENCES `items_trading` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_trading`
--

LOCK TABLES `sales_trading` WRITE;
/*!40000 ALTER TABLE `sales_trading` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_trading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesdetails`
--

DROP TABLE IF EXISTS `salesdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesdetails` (
  `SalesDetailID` bigint(20) NOT NULL,
  `SalesID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `ItemDiscount` text,
  `Status` bigint(20) DEFAULT NULL,
  `VoucherDiscount` text,
  `PercentTax` bigint(20) DEFAULT NULL,
  `IsTaxIncluded` binary(1) DEFAULT NULL,
  `CostingType` bigint(20) DEFAULT NULL,
  `Cost` text,
  `TransactionSupplierDiscount` text,
  `TransactionVoucherDiscount` text,
  `GUID` text,
  `TaxExcempt` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SalesDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesdetails`
--

LOCK TABLES `salesdetails` WRITE;
/*!40000 ALTER TABLE `salesdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesreturndetails`
--

DROP TABLE IF EXISTS `salesreturndetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesreturndetails` (
  `SalesReturnDetailID` bigint(20) NOT NULL,
  `SalesReturnID` bigint(20) DEFAULT NULL,
  `SalesDetailID` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `ItemDiscount` text,
  `VoucherDiscount` text,
  PRIMARY KEY (`SalesReturnDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesreturndetails`
--

LOCK TABLES `salesreturndetails` WRITE;
/*!40000 ALTER TABLE `salesreturndetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesreturndetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesreturns`
--

DROP TABLE IF EXISTS `salesreturns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesreturns` (
  `SalesReturnID` bigint(20) NOT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `ShiftID` bigint(20) DEFAULT NULL,
  `SalesID` bigint(20) DEFAULT NULL,
  `IsVoid` binary(1) DEFAULT NULL,
  `Remarks` text,
  `SalesReturnType` bigint(20) DEFAULT NULL,
  `CustomerID` bigint(20) DEFAULT NULL,
  `TotalAmount` bigint(20) DEFAULT NULL,
  `GUID` text,
  PRIMARY KEY (`SalesReturnID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesreturns`
--

LOCK TABLES `salesreturns` WRITE;
/*!40000 ALTER TABLE `salesreturns` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesreturns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocktransferdetails`
--

DROP TABLE IF EXISTS `stocktransferdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocktransferdetails` (
  `StockTransferDetailID` bigint(20) NOT NULL,
  `StockTransferID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `Cost` text,
  `CostingType` bigint(20) DEFAULT NULL,
  `Discount` text,
  PRIMARY KEY (`StockTransferDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocktransferdetails`
--

LOCK TABLES `stocktransferdetails` WRITE;
/*!40000 ALTER TABLE `stocktransferdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocktransferdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocktransfers`
--

DROP TABLE IF EXISTS `stocktransfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocktransfers` (
  `StockTransferID` bigint(20) NOT NULL,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `Remarks` text,
  `FromBranchID` bigint(20) DEFAULT NULL,
  `ToBranchID` bigint(20) DEFAULT NULL,
  `GUID` text,
  `StockTransferType` bigint(20) DEFAULT NULL,
  `TerminalID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`StockTransferID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocktransfers`
--

LOCK TABLES `stocktransfers` WRITE;
/*!40000 ALTER TABLE `stocktransfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocktransfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplierreturndetails`
--

DROP TABLE IF EXISTS `supplierreturndetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplierreturndetails` (
  `SupplierReturnDetailID` bigint(20) NOT NULL,
  `SupplierReturnID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `Cost` text,
  `CostingType` bigint(20) DEFAULT NULL,
  `Discount` text,
  PRIMARY KEY (`SupplierReturnDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplierreturndetails`
--

LOCK TABLES `supplierreturndetails` WRITE;
/*!40000 ALTER TABLE `supplierreturndetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplierreturndetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplierreturns`
--

DROP TABLE IF EXISTS `supplierreturns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplierreturns` (
  `SupplierReturnID` bigint(20) NOT NULL,
  `SupplierID` bigint(20) DEFAULT NULL,
  `RecordDate` datetime DEFAULT NULL,
  `Remarks` text,
  `BusinessDayID` bigint(20) DEFAULT NULL,
  `TerminalID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SupplierReturnID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplierreturns`
--

LOCK TABLES `supplierreturns` WRITE;
/*!40000 ALTER TABLE `supplierreturns` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplierreturns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `﻿SupplierID` bigint(20) NOT NULL,
  `SupplierName` text,
  `SupplierCode` text,
  `Address` text,
  `TelNo` text,
  `FaxNo` text,
  `IsDeleted` binary(1) DEFAULT NULL,
  `SupplierTypeID` bigint(20) DEFAULT NULL,
  `ContactPerson` text,
  `GUID` text,
  `TerminalID` bigint(20) DEFAULT NULL,
  `LastModified` datetime DEFAULT NULL,
  `Terms` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`﻿SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliertypes`
--

DROP TABLE IF EXISTS `suppliertypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliertypes` (
  `SupplierTypeID` int(11) NOT NULL,
  `Description` text,
  `IsDeleted` binary(1) DEFAULT NULL,
  PRIMARY KEY (`SupplierTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliertypes`
--

LOCK TABLES `suppliertypes` WRITE;
/*!40000 ALTER TABLE `suppliertypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliertypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouses` (
  `warehouse_id` int(11) NOT NULL,
  `warehouse` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (1,'BULACAN'),(2,'EDSA DEPOT'),(3,'LAGUNA');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'GM MIS'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-29 16:13:13
