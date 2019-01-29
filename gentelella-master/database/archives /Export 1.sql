-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: mydb
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
/*!40000 ALTER TABLE `concessionaire` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `items_depot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_trading`
--

DROP TABLE IF EXISTS `items_trading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_trading` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `itemtype_id` int(11) NOT NULL,
  `item_count` varchar(45) DEFAULT NULL,
  `last_restock` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `threshold_amt` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_items_ref_itemtype1_idx` (`itemtype_id`),
  KEY `fk_items_warehouses1_idx` (`warehouse_id`),
  KEY `fk_items_trading_suppliers1_idx` (`supplier_id`),
  CONSTRAINT `fk_items_ref_itemtype1` FOREIGN KEY (`itemtype_id`) REFERENCES `ref_itemtype` (`itemtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_trading_suppliers1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_warehouses1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_trading`
--

LOCK TABLES `items_trading` WRITE;
/*!40000 ALTER TABLE `items_trading` DISABLE KEYS */;
INSERT INTO `items_trading` VALUES (1,'Slab A',1,'100','2018-07-31 07:45:50','2019-09-01 06:00:00',10,1,1,1000),(2,'Slab B',2,'100','2018-08-01 07:45:00','2019-09-02 06:00:00',10,2,2,850),(3,'Slab C',3,'100','2018-08-02 07:44:10','2019-09-03 06:00:00',10,3,3,700),(4,'Granite A',4,'100','2018-08-03 07:43:20','2019-09-04 06:00:00',10,1,4,200),(5,'Granite B',5,'100','2018-08-04 07:42:30','2019-09-05 06:00:00',10,2,5,1000),(6,'Granite C',6,'100','2018-08-05 07:41:40','2019-09-06 06:00:00',10,3,1,850),(7,'Granite D',7,'100','2018-08-06 07:40:50','2019-09-07 06:00:00',10,1,2,700),(8,'Granite E',8,'100','2018-08-07 07:40:00','2019-09-08 06:00:00',10,2,3,200),(9,'Granite F',9,'100','2018-08-08 07:39:10','2019-09-09 06:00:00',10,3,4,1000),(10,'Granite G',10,'100','2018-08-09 07:38:20','2019-09-10 06:00:00',10,1,5,850),(11,'Slab D',1,'100','2018-08-10 07:37:30','2019-09-11 06:00:00',10,2,1,700),(12,'Slab E',2,'100','2018-08-11 07:36:40','2019-09-12 06:00:00',10,3,2,200),(13,'Slab F',3,'100','2018-08-12 07:35:50','2019-09-13 06:00:00',10,1,3,1000),(14,'Slab G',4,'100','2018-08-13 07:35:00','2019-09-14 06:00:00',10,2,4,850),(15,'Granite H',5,'100','2018-08-14 07:34:10','2019-09-15 06:00:00',10,3,5,700),(16,'Granite I',6,'100','2018-08-15 07:33:20','2019-09-16 06:00:00',10,1,1,200),(17,'Granite J',7,'100','2018-08-16 07:32:30','2019-09-17 06:00:00',10,2,2,1000),(18,'Granite K',8,'100','2018-08-17 07:31:40','2019-09-18 06:00:00',10,3,3,850),(19,'Slab H',9,'100','2018-08-18 07:30:50','2019-09-19 06:00:00',10,1,4,700),(20,'Slab I',10,'100','2018-08-19 07:30:00','2019-09-20 06:00:00',10,2,5,200);
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
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `supplier_address` varchar(45) DEFAULT NULL,
  `supplier_contactno` varchar(45) DEFAULT NULL,
  `supplier_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Langworth LLC','9438 Eggendart Pass','208-307-1074','sshiel0@newsvine.com'),(2,'Gutkowski LLC','76115 Maywood Trail','726-204-1274','mwaulker1@nature.com'),(3,'Medhurst-Kertzmann','41 Lakewood Alley','417-765-5401','rlindner2@theglobeandmail.com'),(4,'Kshlerin-Ryan','809 Menomonie Park','843-560-7318','mlangthorn3@google.it'),(5,'Keebler, Blanda and Parker','8 Dunning Hill','416-682-8282','bvanderbrugge4@noaa.gov'),(6,'Mueller-Jones','05 Maple Wood Lane','613-606-5256','rbowley5@aol.com'),(7,'Bogisich-Watsica','14870 Spohn Way','300-689-9375','acorlett6@issuu.com'),(8,'Macejkovic, Bednar and Stiedemann','876 Declaration Hill','768-786-2129','ewhitfield7@addthis.com'),(9,'Vandervort and Sons','8907 Lakeland Park','332-784-4116','alongshaw8@ebay.co.uk'),(10,'Ankunding, Shanahan and Williamson','057 Manitowish Circle','931-129-4887','mduiguid9@privacy.gov.au');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
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
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-22 16:59:39
