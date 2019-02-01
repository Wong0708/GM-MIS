#
# DUMP FILE
#
# Database is ported from MS Access
#------------------------------------------------------------------
# Created using "MS Access to MySQL" form http://www.bullzip.com
# Program Version 5.5.282
#
# OPTIONS:
#   sourcefilename=D:/Downloads/POSData.dat.mdb
#   sourceusername=
#   sourcepassword=
#   sourcesystemdatabase=
#   destinationdatabase=movedb
#   storageengine=InnoDB
#   dropdatabase=0
#   createtables=1
#   unicode=1
#   autocommit=1
#   transferdefaultvalues=1
#   transferindexes=1
#   transferautonumbers=1
#   transferrecords=1
#   columnlist=1
#   tableprefix=GM_
#   negativeboolean=0
#   ignorelargeblobs=0
#   memotype=LONGTEXT
#   datetimetype=DATETIME
#

CREATE DATABASE IF NOT EXISTS `movedb`;
USE `movedb`;

#
# Table structure for table 'GM_BankAccounts'
#

DROP TABLE IF EXISTS `GM_BankAccounts`;

CREATE TABLE `GM_BankAccounts` (
  `BankAccountID` INTEGER NOT NULL, 
  `AccountNo` VARCHAR(50), 
  `AccountName` VARCHAR(100), 
  `BankID` INTEGER, 
  `Branch` VARCHAR(50), 
  `GUID` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'BankAccounts'
#

INSERT INTO `GM_BankAccounts` (`BankAccountID`, `AccountNo`, `AccountName`, `BankID`, `Branch`, `GUID`, `IsDeleted`) VALUES (1, '12345', 'Test Account', 0, 'Del Monte', 'E07C3C48-CE72-47AF-8859-1DCD28EB8D4C', 0);
# 1 records

#
# Table structure for table 'GM_Branches'
#

DROP TABLE IF EXISTS `GM_Branches`;

CREATE TABLE `GM_Branches` (
  `BranchID` INTEGER NOT NULL, 
  `BranchCode` VARCHAR(50)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Branches'
#

INSERT INTO `GM_Branches` (`BranchID`, `BranchCode`) VALUES (0, 'MAIN');
INSERT INTO `GM_Branches` (`BranchID`, `BranchCode`) VALUES (1, 'CALAMBA');
# 2 records

#
# Table structure for table 'GM_BusinessDays'
#

DROP TABLE IF EXISTS `GM_BusinessDays`;

CREATE TABLE `GM_BusinessDays` (
  `BusinessDayID` INTEGER NOT NULL DEFAULT 0, 
  `BusinessDate` DATETIME, 
  `UserID` INTEGER DEFAULT 0, 
  `IsActive` TINYINT(1) NOT NULL, 
  `PreviousGrandTotal` DECIMAL(19,4), 
  `GrandTotal` DECIMAL(19,4), 
  `BranchID` INTEGER, 
  `GUID` VARCHAR(50), 
  PRIMARY KEY (`BusinessDayID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'BusinessDays'
#

# 0 records

#
# Table structure for table 'GM_CancelledTransactions'
#

DROP TABLE IF EXISTS `GM_CancelledTransactions`;

CREATE TABLE `GM_CancelledTransactions` (
  `CancelledTransactionID` INTEGER NOT NULL DEFAULT 0, 
  `BusinessDayID` INTEGER DEFAULT 0, 
  `RecordDate` DATETIME, 
  `ReferenceID` INTEGER DEFAULT 0, 
  `ReferenceType` INTEGER DEFAULT 0, 
  INDEX (`BusinessDayID`), 
  INDEX (`CancelledTransactionID`), 
  PRIMARY KEY (`CancelledTransactionID`), 
  INDEX (`ReferenceID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CancelledTransactions'
#

# 0 records

#
# Table structure for table 'GM_CashFloats'
#

DROP TABLE IF EXISTS `GM_CashFloats`;

CREATE TABLE `GM_CashFloats` (
  `CashFloatID` DECIMAL(18,0) NOT NULL, 
  `ShiftID` DECIMAL(18,0), 
  `Amount` DECIMAL(19,4), 
  `Remarks` VARCHAR(100)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CashFloats'
#

# 0 records

#
# Table structure for table 'GM_CashPullouts'
#

DROP TABLE IF EXISTS `GM_CashPullouts`;

CREATE TABLE `GM_CashPullouts` (
  `CashPulloutID` DECIMAL(18,0) NOT NULL, 
  `ShiftID` DECIMAL(18,0), 
  `Amount` DECIMAL(19,4), 
  `Remarks` VARCHAR(100)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CashPullouts'
#

# 0 records

#
# Table structure for table 'GM_Categories'
#

DROP TABLE IF EXISTS `GM_Categories`;

CREATE TABLE `GM_Categories` (
  `CategoryID` INTEGER NOT NULL DEFAULT 0, 
  `DepartmentID` INTEGER DEFAULT 0, 
  `CategoryCode` VARCHAR(50), 
  `CategoryName` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `GUID` VARCHAR(50), 
  `TerminalID` INTEGER, 
  `LastModified` DATETIME, 
  PRIMARY KEY (`CategoryID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Categories'
#

# 0 records

#
# Table structure for table 'GM_Checks'
#

DROP TABLE IF EXISTS `GM_Checks`;

CREATE TABLE `GM_Checks` (
  `CheckID` INTEGER NOT NULL, 
  `PaymentDetailID` INTEGER, 
  `BankID` INTEGER, 
  `CheckNumber` VARCHAR(50), 
  `CheckDate` DATETIME, 
  `Amount` DECIMAL(18,4), 
  PRIMARY KEY (`CheckID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Checks'
#

# 0 records

#
# Table structure for table 'GM_CreditCardInfo'
#

DROP TABLE IF EXISTS `GM_CreditCardInfo`;

CREATE TABLE `GM_CreditCardInfo` (
  `CreditCardInfoID` INTEGER NOT NULL DEFAULT 0, 
  `PaymentDetailID` INTEGER DEFAULT 0, 
  `CardNumber` VARCHAR(50), 
  `ApprovalNumber` VARCHAR(50), 
  `CreditCardTypeID` INTEGER, 
  PRIMARY KEY (`CreditCardInfoID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CreditCardInfo'
#

# 0 records

#
# Table structure for table 'GM_CreditCardTypes'
#

DROP TABLE IF EXISTS `GM_CreditCardTypes`;

CREATE TABLE `GM_CreditCardTypes` (
  `CreditCardTypeID` INTEGER NOT NULL, 
  `Description` VARCHAR(50), 
  `CreditCardTypeCode` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CreditCardTypes'
#

INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (1, 'MasterCard', 'MASTERCARD', 0);
INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (2, 'VISA', 'VISA', 0);
INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (3, 'AMEXCO', 'AMEXCO', 0);
INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (4, 'Far East', 'FAREAST', 0);
INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (5, 'Unicard', 'UNICARD', 0);
INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (6, 'Bancard', 'BANCARD', 0);
INSERT INTO `GM_CreditCardTypes` (`CreditCardTypeID`, `Description`, `CreditCardTypeCode`, `IsDeleted`) VALUES (7, 'Diners', 'DINERS', 0);
# 7 records

#
# Table structure for table 'GM_CreditMemoDistributions'
#

DROP TABLE IF EXISTS `GM_CreditMemoDistributions`;

CREATE TABLE `GM_CreditMemoDistributions` (
  `CreditMemoDistributionID` INTEGER NOT NULL DEFAULT 0, 
  `CreditMemoID` INTEGER DEFAULT 0, 
  `UsedReferenceID` INTEGER DEFAULT 0, 
  `ReferenceType` TINYINT(3) UNSIGNED DEFAULT 0, 
  `ShiftID` INTEGER DEFAULT 0, 
  `Amount` DECIMAL(18,4) DEFAULT 0, 
  INDEX (`CreditMemoDistributionID`), 
  INDEX (`CreditMemoID`), 
  PRIMARY KEY (`CreditMemoDistributionID`), 
  INDEX (`UsedReferenceID`), 
  INDEX (`ShiftID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CreditMemoDistributions'
#

# 0 records

#
# Table structure for table 'GM_CreditMemos'
#

DROP TABLE IF EXISTS `GM_CreditMemos`;

CREATE TABLE `GM_CreditMemos` (
  `CreditMemoID` INTEGER NOT NULL DEFAULT 0, 
  `RecordDate` DATETIME, 
  `ReferenceID` INTEGER DEFAULT 0, 
  `ReferenceType` TINYINT(3) UNSIGNED, 
  `Amount` DECIMAL(19,4), 
  `ShiftID` INTEGER DEFAULT 0, 
  `UserID` INTEGER DEFAULT 0, 
  `Remarks` VARCHAR(100), 
  `GUID` VARCHAR(50), 
  INDEX (`GUID`), 
  PRIMARY KEY (`CreditMemoID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'CreditMemos'
#

# 0 records

#
# Table structure for table 'GM_Customers'
#

DROP TABLE IF EXISTS `GM_Customers`;

CREATE TABLE `GM_Customers` (
  `CustomerID` INTEGER NOT NULL, 
  `CustomerName` VARCHAR(100), 
  `Address` VARCHAR(200), 
  `TelNo` VARCHAR(50), 
  `FaxNo` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `ContactPerson` VARCHAR(100), 
  `GUID` VARCHAR(50), 
  `TerminalID` INTEGER, 
  `LastModified` DATETIME, 
  PRIMARY KEY (`CustomerID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Customers'
#

# 0 records

#
# Table structure for table 'GM_DateDiscountPromos'
#

DROP TABLE IF EXISTS `GM_DateDiscountPromos`;

CREATE TABLE `GM_DateDiscountPromos` (
  `DateDiscountPromoID` DECIMAL(18,0) NOT NULL, 
  `PromoID` DECIMAL(18,0), 
  `ProductID` DECIMAL(18,0), 
  `SupplierDiscount` VARCHAR(50), 
  `VoucherDiscount` VARCHAR(50), 
  `ProductGUID` VARCHAR(50), 
  PRIMARY KEY (`DateDiscountPromoID`), 
  INDEX (`ProductGUID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'DateDiscountPromos'
#

# 0 records

#
# Table structure for table 'GM_Departments'
#

DROP TABLE IF EXISTS `GM_Departments`;

CREATE TABLE `GM_Departments` (
  `DepartmentID` INTEGER NOT NULL DEFAULT 0, 
  `DepartmentCode` VARCHAR(50), 
  `DepartmentName` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `GUID` VARCHAR(50), 
  `TerminalID` INTEGER DEFAULT 0, 
  `LastModified` DATETIME, 
  PRIMARY KEY (`DepartmentID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Departments'
#

# 0 records

#
# Table structure for table 'GM_DisbursementDetails'
#

DROP TABLE IF EXISTS `GM_DisbursementDetails`;

CREATE TABLE `GM_DisbursementDetails` (
  `DisbursementDetailID` INTEGER NOT NULL, 
  `DisbursementID` INTEGER, 
  `PayableID` INTEGER, 
  `AmountPaid` DECIMAL(18,4), 
  PRIMARY KEY (`DisbursementDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'DisbursementDetails'
#

# 0 records

#
# Table structure for table 'GM_Disbursements'
#

DROP TABLE IF EXISTS `GM_Disbursements`;

CREATE TABLE `GM_Disbursements` (
  `DisbursementID` INTEGER NOT NULL, 
  `DisbursementType` INTEGER, 
  `RecipientID` INTEGER, 
  `BankAccountID` INTEGER, 
  `Amount` DECIMAL(18,4), 
  `CheckNo` VARCHAR(50), 
  `CheckDate` DATETIME, 
  `BusinessDayID` INTEGER, 
  `PaymentType` INTEGER, 
  `Remarks` VARCHAR(100), 
  `Discount` DECIMAL(18,4), 
  PRIMARY KEY (`DisbursementID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Disbursements'
#

# 0 records

#
# Table structure for table 'GM_DiscountTypes'
#

DROP TABLE IF EXISTS `GM_DiscountTypes`;

CREATE TABLE `GM_DiscountTypes` (
  `DiscountTypeID` DECIMAL(18,0) NOT NULL, 
  `Description` VARCHAR(50), 
  `PercentDiscount` DECIMAL(18,4), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `DiscountCode` VARCHAR(20)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'DiscountTypes'
#

INSERT INTO `GM_DiscountTypes` (`DiscountTypeID`, `Description`, `PercentDiscount`, `IsDeleted`, `DiscountCode`) VALUES (0, 'Senior Citizen', 10, 0, 'SENIOR');
INSERT INTO `GM_DiscountTypes` (`DiscountTypeID`, `Description`, `PercentDiscount`, `IsDeleted`, `DiscountCode`) VALUES (1, 'Member Discount', 15, 0, 'MEMBER');
INSERT INTO `GM_DiscountTypes` (`DiscountTypeID`, `Description`, `PercentDiscount`, `IsDeleted`, `DiscountCode`) VALUES (100, 'Other Discount', 0, 0, 'OTHERDISC');
# 3 records

#
# Table structure for table 'GM_IDMaps'
#

DROP TABLE IF EXISTS `GM_IDMaps`;

CREATE TABLE `GM_IDMaps` (
  `IDMapID` INTEGER NOT NULL AUTO_INCREMENT, 
  `ReferenceID` INTEGER DEFAULT 0, 
  `ReferenceType` INTEGER DEFAULT 0, 
  `GUID` VARCHAR(50), 
  INDEX (`GUID`), 
  INDEX (`IDMapID`), 
  PRIMARY KEY (`IDMapID`), 
  INDEX (`ReferenceID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'IDMaps'
#

# 0 records

#
# Table structure for table 'GM_InventoryDistributions'
#

DROP TABLE IF EXISTS `GM_InventoryDistributions`;

CREATE TABLE `GM_InventoryDistributions` (
  `InventoryDistributionID` INTEGER NOT NULL, 
  `InventoryOutDetailID` INTEGER, 
  `Quantity` DECIMAL(18,4), 
  `BusinessDayID` INTEGER, 
  `InventoryInDetailID` INTEGER, 
  PRIMARY KEY (`InventoryDistributionID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'InventoryDistributions'
#

# 0 records

#
# Table structure for table 'GM_InventoryInDetails'
#

DROP TABLE IF EXISTS `GM_InventoryInDetails`;

CREATE TABLE `GM_InventoryInDetails` (
  `InventoryInDetailID` INTEGER NOT NULL, 
  `ReferenceID` INTEGER, 
  `ReferenceType` TINYINT(3) UNSIGNED, 
  `BusinessDayID` INTEGER, 
  `SupplierID` INTEGER, 
  `ProductID` INTEGER, 
  `CostingType` TINYINT(3) UNSIGNED, 
  `Cost` VARCHAR(50), 
  `Discount` VARCHAR(50), 
  `Quantity` DECIMAL(18,4), 
  `GUID` VARCHAR(50), 
  INDEX (`GUID`), 
  PRIMARY KEY (`InventoryInDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'InventoryInDetails'
#

# 0 records

#
# Table structure for table 'GM_InventoryOutDetails'
#

DROP TABLE IF EXISTS `GM_InventoryOutDetails`;

CREATE TABLE `GM_InventoryOutDetails` (
  `InventoryOutDetailID` INTEGER NOT NULL, 
  `ReferenceID` INTEGER, 
  `ReferenceType` TINYINT(3) UNSIGNED, 
  `BusinessDayID` INTEGER, 
  `ProductID` INTEGER, 
  `Quantity` DECIMAL(10,4), 
  `GUID` VARCHAR(50), 
  INDEX (`GUID`), 
  PRIMARY KEY (`InventoryOutDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'InventoryOutDetails'
#

# 0 records

#
# Table structure for table 'GM_InventoryStocks'
#

DROP TABLE IF EXISTS `GM_InventoryStocks`;

CREATE TABLE `GM_InventoryStocks` (
  `InventoryStockID` INTEGER NOT NULL, 
  `ProductID` INTEGER, 
  `BusinessDayID` INTEGER, 
  `StockOnHand` DECIMAL(18,4), 
  PRIMARY KEY (`InventoryStockID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'InventoryStocks'
#

# 0 records

#
# Table structure for table 'GM_Payables'
#

DROP TABLE IF EXISTS `GM_Payables`;

CREATE TABLE `GM_Payables` (
  `PayableID` INTEGER NOT NULL, 
  `BusinessDayID` INTEGER, 
  `SupplierID` INTEGER, 
  `Description` VARCHAR(100), 
  `Amount` DECIMAL(18,4), 
  `ReferenceID` INTEGER, 
  `ReferenceType` TINYINT(3) UNSIGNED, 
  `GUID` VARCHAR(50), 
  `Terms` INTEGER DEFAULT 0, 
  `StartDate` DATETIME, 
  INDEX (`GUID`), 
  PRIMARY KEY (`PayableID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Payables'
#

# 0 records

#
# Table structure for table 'GM_PaymentDetails'
#

DROP TABLE IF EXISTS `GM_PaymentDetails`;

CREATE TABLE `GM_PaymentDetails` (
  `PaymentDetailID` INTEGER NOT NULL DEFAULT 0, 
  `PaymentID` INTEGER DEFAULT 0, 
  `PaymentTypeID` INTEGER DEFAULT 0, 
  `Amount` DECIMAL(19,4), 
  PRIMARY KEY (`PaymentDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'PaymentDetails'
#

# 0 records

#
# Table structure for table 'GM_PaymentDistributions'
#

DROP TABLE IF EXISTS `GM_PaymentDistributions`;

CREATE TABLE `GM_PaymentDistributions` (
  `PaymentDistributionID` INTEGER NOT NULL, 
  `PaymentID` INTEGER, 
  `ReceivableID` INTEGER, 
  `AmountPaid` DECIMAL(18,4), 
  PRIMARY KEY (`PaymentDistributionID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'PaymentDistributions'
#

# 0 records

#
# Table structure for table 'GM_Payments'
#

DROP TABLE IF EXISTS `GM_Payments`;

CREATE TABLE `GM_Payments` (
  `PaymentID` INTEGER NOT NULL DEFAULT 0, 
  `ShiftID` INTEGER DEFAULT 0, 
  `SalesID` INTEGER DEFAULT 0, 
  `TotalAmount` DECIMAL(19,4), 
  `TenderedAmount` DECIMAL(19,4), 
  `Change` DECIMAL(19,4), 
  `RecordDate` DATETIME, 
  `CustomerID` INTEGER, 
  `Remarks` VARCHAR(100), 
  `PaymentType` TINYINT(3) UNSIGNED, 
  `CustomerName` VARCHAR(100), 
  `ORNumber` INTEGER, 
  `GUID` VARCHAR(50), 
  `TraceNumber` INTEGER, 
  INDEX (`GUID`), 
  PRIMARY KEY (`PaymentID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Payments'
#

# 0 records

#
# Table structure for table 'GM_PaymentTypes'
#

DROP TABLE IF EXISTS `GM_PaymentTypes`;

CREATE TABLE `GM_PaymentTypes` (
  `PaymentTypeID` DECIMAL(18,0) NOT NULL, 
  `Description` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `PaymentCode` VARCHAR(20)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'PaymentTypes'
#

INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (1, 'Cash', 0, 'CASH');
INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (2, 'Gift Cheque', 0, 'GC');
INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (3, 'House Account', 0, 'HOUSE');
INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (4, 'Credit Memo', 0, 'CREDITMEMO');
INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (5, 'Other Income', 0, 'OTHERINCOME');
INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (6, 'Credit Card', 0, 'CREDITCARD');
INSERT INTO `GM_PaymentTypes` (`PaymentTypeID`, `Description`, `IsDeleted`, `PaymentCode`) VALUES (7, 'Check', 0, 'CHECK');
# 7 records

#
# Table structure for table 'GM_PhysicalInventories'
#

DROP TABLE IF EXISTS `GM_PhysicalInventories`;

CREATE TABLE `GM_PhysicalInventories` (
  `PhysicalInventoryID` INTEGER NOT NULL, 
  `BusinessDayID` INTEGER, 
  `Remarks` VARCHAR(100), 
  `TargetBusinessDayID` INTEGER, 
  PRIMARY KEY (`PhysicalInventoryID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'PhysicalInventories'
#

# 0 records

#
# Table structure for table 'GM_PhysicalInventoryDetails'
#

DROP TABLE IF EXISTS `GM_PhysicalInventoryDetails`;

CREATE TABLE `GM_PhysicalInventoryDetails` (
  `PhysicalInventoryDetailID` INTEGER NOT NULL, 
  `PhysicalInventoryID` INTEGER, 
  `ProductID` INTEGER, 
  `Quantity` DECIMAL(18,4), 
  PRIMARY KEY (`PhysicalInventoryDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'PhysicalInventoryDetails'
#

# 0 records

#
# Table structure for table 'GM_POSORCounter'
#

DROP TABLE IF EXISTS `GM_POSORCounter`;

CREATE TABLE `GM_POSORCounter` (
  `POSORCounterID` INTEGER NOT NULL
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'POSORCounter'
#

INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (1);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (2);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (3);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (4);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (5);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (6);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (7);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (8);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (9);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (10);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (11);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (12);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (13);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (14);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (15);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (16);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (17);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (18);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (19);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (20);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (21);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (22);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (23);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (24);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (25);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (26);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (27);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (28);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (29);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (30);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (31);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (32);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (33);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (34);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (35);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (36);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (37);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (38);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (39);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (40);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (41);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (42);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (43);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (44);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (45);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (46);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (47);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (48);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (49);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (50);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (51);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (52);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (53);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (54);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (55);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (56);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (57);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (58);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (59);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (60);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (61);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (62);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (63);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (64);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (65);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (66);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (67);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (68);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (69);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (70);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (71);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (72);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (73);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (74);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (75);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (76);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (77);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (78);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (79);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (80);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (81);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (82);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (83);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (84);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (85);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (86);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (87);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (88);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (89);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (90);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (91);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (92);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (93);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (94);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (95);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (96);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (97);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (98);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (99);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (100);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (101);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (102);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (103);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (104);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (105);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (106);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (107);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (108);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (109);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (110);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (111);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (112);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (113);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (114);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (115);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (116);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (117);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (118);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (119);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (120);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (121);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (122);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (123);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (124);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (125);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (126);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (127);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (128);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (129);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (130);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (131);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (132);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (133);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (134);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (135);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (136);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (137);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (138);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (139);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (140);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (141);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (142);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (143);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (144);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (145);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (146);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (147);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (148);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (149);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (150);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (151);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (152);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (153);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (154);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (155);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (156);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (157);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (158);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (159);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (160);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (161);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (162);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (163);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (164);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (165);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (166);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (167);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (168);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (169);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (170);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (171);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (172);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (173);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (174);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (175);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (176);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (177);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (178);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (179);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (180);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (181);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (182);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (183);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (184);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (185);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (186);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (187);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (188);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (189);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (190);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (191);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (192);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (193);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (194);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (195);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (196);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (197);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (198);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (199);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (200);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (201);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (202);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (203);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (204);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (205);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (206);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (207);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (208);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (209);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (210);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (211);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (212);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (213);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (214);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (215);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (216);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (217);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (218);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (219);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (220);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (221);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (222);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (223);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (224);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (225);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (226);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (227);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (228);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (229);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (230);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (231);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (232);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (233);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (234);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (235);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (236);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (237);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (238);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (239);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (240);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (241);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (242);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (243);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (244);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (245);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (246);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (247);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (248);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (249);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (250);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (251);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (252);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (253);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (254);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (255);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (256);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (257);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (258);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (259);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (260);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (261);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (262);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (263);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (264);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (265);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (266);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (267);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (268);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (269);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (270);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (271);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (272);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (273);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (274);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (275);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (276);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (277);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (278);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (279);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (280);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (281);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (282);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (283);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (284);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (285);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (286);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (287);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (288);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (289);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (290);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (291);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (292);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (293);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (294);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (295);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (296);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (297);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (298);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (299);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (300);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (301);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (302);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (303);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (304);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (305);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (306);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (307);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (308);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (309);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (310);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (311);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (312);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (313);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (314);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (315);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (316);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (317);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (318);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (319);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (320);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (321);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (322);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (323);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (324);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (325);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (326);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (327);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (328);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (329);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (330);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (331);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (332);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (333);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (334);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (335);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (336);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (337);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (338);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (339);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (340);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (341);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (342);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (343);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (344);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (345);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (346);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (347);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (348);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (349);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (350);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (351);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (352);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (353);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (354);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (355);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (356);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (357);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (358);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (359);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (360);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (361);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (362);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (363);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (364);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (365);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (366);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (367);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (368);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (369);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (370);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (371);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (372);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (373);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (374);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (375);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (376);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (377);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (378);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (379);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (380);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (381);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (382);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (383);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (384);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (385);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (386);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (387);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (388);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (389);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (390);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (391);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (392);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (393);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (394);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (395);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (396);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (397);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (398);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (399);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (400);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (401);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (402);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (403);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (404);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (405);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (406);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (407);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (408);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (409);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (410);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (411);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (412);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (413);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (414);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (415);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (416);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (417);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (418);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (419);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (420);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (421);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (422);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (423);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (424);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (425);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (426);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (427);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (428);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (429);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (430);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (431);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (432);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (433);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (434);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (435);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (436);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (437);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (438);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (439);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (440);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (441);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (442);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (443);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (444);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (445);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (446);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (447);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (448);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (449);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (450);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (451);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (452);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (453);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (454);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (455);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (456);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (457);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (458);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (459);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (460);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (461);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (462);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (463);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (464);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (465);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (466);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (467);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (468);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (469);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (470);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (471);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (472);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (473);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (474);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (475);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (476);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (477);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (478);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (479);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (480);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (481);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (482);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (483);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (484);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (485);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (486);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (487);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (488);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (489);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (490);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (491);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (492);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (493);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (494);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (495);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (496);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (497);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (498);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (499);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (500);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (501);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (502);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (503);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (504);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (505);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (506);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (507);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (508);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (509);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (510);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (511);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (512);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (513);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (514);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (515);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (516);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (517);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (518);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (519);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (520);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (521);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (522);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (523);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (524);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (525);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (526);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (527);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (528);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (529);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (530);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (531);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (532);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (533);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (534);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (535);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (536);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (537);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (538);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (539);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (540);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (541);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (542);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (543);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (544);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (545);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (546);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (547);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (548);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (549);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (550);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (551);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (552);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (553);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (554);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (555);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (556);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (557);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (558);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (559);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (560);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (561);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (562);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (563);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (564);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (565);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (566);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (567);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (568);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (569);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (570);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (571);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (572);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (573);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (574);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (575);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (576);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (577);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (578);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (579);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (580);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (581);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (582);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (583);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (584);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (585);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (586);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (587);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (588);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (589);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (590);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (591);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (592);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (593);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (594);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (595);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (596);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (597);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (598);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (599);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (600);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (601);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (602);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (603);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (604);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (605);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (606);
INSERT INTO `GM_POSORCounter` (`POSORCounterID`) VALUES (607);
# 607 records

#
# Table structure for table 'GM_Products'
#

DROP TABLE IF EXISTS `GM_Products`;

CREATE TABLE `GM_Products` (
  `ProductID` INTEGER NOT NULL DEFAULT 0, 
  `SKU` VARCHAR(50), 
  `ItemCode` VARCHAR(50), 
  `Description` VARCHAR(100), 
  `UnitName` VARCHAR(20), 
  `DepartmentID` INTEGER DEFAULT 0, 
  `CategoryID` INTEGER DEFAULT 0, 
  `Price` DECIMAL(19,4), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `ProductType` INTEGER, 
  `PercentTax` DECIMAL(18,4), 
  `SupplierID` INTEGER DEFAULT 0, 
  `ShortDescription` VARCHAR(50), 
  `CostingType` TINYINT(3) UNSIGNED, 
  `Cost` VARCHAR(50), 
  `IsLocal` TINYINT(1) NOT NULL, 
  `GUID` VARCHAR(50), 
  `TerminalID` INTEGER, 
  `LastModified` DATETIME, 
  PRIMARY KEY (`ProductID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Products'
#

# 0 records

#
# Table structure for table 'GM_Promos'
#

DROP TABLE IF EXISTS `GM_Promos`;

CREATE TABLE `GM_Promos` (
  `PromoID` INTEGER NOT NULL DEFAULT 0, 
  `RecordDate` DATETIME, 
  `StartDate` DATETIME, 
  `EndDate` DATETIME, 
  `PromoType` INTEGER, 
  `UserID` DECIMAL(18,0), 
  `Description` VARCHAR(100), 
  `GUID` VARCHAR(50), 
  `IsActive` TINYINT(1), 
  `LastModified` DATETIME, 
  INDEX (`GUID`), 
  PRIMARY KEY (`PromoID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Promos'
#

# 0 records

#
# Table structure for table 'GM_Receivables'
#

DROP TABLE IF EXISTS `GM_Receivables`;

CREATE TABLE `GM_Receivables` (
  `ReceivableID` INTEGER NOT NULL, 
  `ShiftID` INTEGER, 
  `CustomerID` INTEGER, 
  `Description` VARCHAR(100), 
  `Amount` DECIMAL(18,4), 
  `ReferenceID` INTEGER, 
  `ReferenceType` TINYINT(3) UNSIGNED, 
  `GUID` VARCHAR(50), 
  INDEX (`GUID`), 
  PRIMARY KEY (`ReceivableID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Receivables'
#

# 0 records

#
# Table structure for table 'GM_ReceiveOrderDetails'
#

DROP TABLE IF EXISTS `GM_ReceiveOrderDetails`;

CREATE TABLE `GM_ReceiveOrderDetails` (
  `ReceiveOrderDetailID` INTEGER NOT NULL, 
  `ReceiveOrderID` INTEGER, 
  `ProductID` INTEGER, 
  `Quantity` DECIMAL(18,0), 
  `Cost` VARCHAR(50), 
  `CostingType` TINYINT(3) UNSIGNED, 
  `Discount` VARCHAR(50), 
  PRIMARY KEY (`ReceiveOrderDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'ReceiveOrderDetails'
#

# 0 records

#
# Table structure for table 'GM_ReceiveOrders'
#

DROP TABLE IF EXISTS `GM_ReceiveOrders`;

CREATE TABLE `GM_ReceiveOrders` (
  `ReceiveOrderID` INTEGER NOT NULL, 
  `SupplierID` INTEGER, 
  `InvoiceNo` VARCHAR(50), 
  `InvoiceDate` DATETIME, 
  `BusinessDayID` INTEGER, 
  `TerminalID` INTEGER, 
  `Terms` INTEGER, 
  `Remarks` VARCHAR(100), 
  `DeliveryDate` DATETIME, 
  PRIMARY KEY (`ReceiveOrderID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'ReceiveOrders'
#

# 0 records

#
# Table structure for table 'GM_Refunds'
#

DROP TABLE IF EXISTS `GM_Refunds`;

CREATE TABLE `GM_Refunds` (
  `RefundID` INTEGER NOT NULL DEFAULT 0, 
  `CreditMemoID` INTEGER DEFAULT 0, 
  `ShiftID` INTEGER DEFAULT 0, 
  `Amount` DECIMAL(19,4), 
  `RecordDate` DATETIME, 
  `UserID` INTEGER DEFAULT 0, 
  PRIMARY KEY (`RefundID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Refunds'
#

# 0 records

#
# Table structure for table 'GM_Sales'
#

DROP TABLE IF EXISTS `GM_Sales`;

CREATE TABLE `GM_Sales` (
  `SalesID` INTEGER NOT NULL DEFAULT 0, 
  `RecordDate` DATETIME, 
  `ShiftID` INTEGER DEFAULT 0, 
  `Status` INTEGER, 
  `PercentDiscount` VARCHAR(50), 
  `DiscountTypeID` INTEGER DEFAULT 0, 
  `IsTaxIncluded` TINYINT(1) NOT NULL, 
  `VoucherDiscount` VARCHAR(50), 
  `Remarks` VARCHAR(50), 
  `SalesType` TINYINT(3) UNSIGNED, 
  `CustomerID` INTEGER, 
  `Terms` INTEGER, 
  `Reference` VARCHAR(50), 
  `PercentTax` DECIMAL(18,4), 
  `GUID` VARCHAR(50), 
  `TaxExcempt` DECIMAL(18,4) DEFAULT 0, 
  INDEX (`GUID`), 
  PRIMARY KEY (`SalesID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Sales'
#

# 0 records

#
# Table structure for table 'GM_SalesDetails'
#

DROP TABLE IF EXISTS `GM_SalesDetails`;

CREATE TABLE `GM_SalesDetails` (
  `SalesDetailID` INTEGER NOT NULL DEFAULT 0, 
  `SalesID` INTEGER DEFAULT 0, 
  `ProductID` INTEGER DEFAULT 0, 
  `RecordDate` DATETIME, 
  `Price` DECIMAL(19,4), 
  `Quantity` DECIMAL(18,4), 
  `ItemDiscount` VARCHAR(50), 
  `Status` INTEGER, 
  `VoucherDiscount` VARCHAR(50), 
  `PercentTax` DECIMAL(18,4), 
  `IsTaxIncluded` TINYINT(1) NOT NULL, 
  `CostingType` TINYINT(3) UNSIGNED, 
  `Cost` VARCHAR(50), 
  `TransactionSupplierDiscount` VARCHAR(50), 
  `TransactionVoucherDiscount` VARCHAR(50), 
  `GUID` VARCHAR(50), 
  `TaxExcempt` DECIMAL(18,4) DEFAULT 0, 
  INDEX (`GUID`), 
  PRIMARY KEY (`SalesDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'SalesDetails'
#

# 0 records

#
# Table structure for table 'GM_SalesReturnDetails'
#

DROP TABLE IF EXISTS `GM_SalesReturnDetails`;

CREATE TABLE `GM_SalesReturnDetails` (
  `SalesReturnDetailID` INTEGER NOT NULL DEFAULT 0, 
  `SalesReturnID` INTEGER DEFAULT 0, 
  `SalesDetailID` INTEGER DEFAULT 0, 
  `Quantity` DECIMAL(18,4), 
  `Price` DECIMAL(19,4), 
  `ProductID` INTEGER DEFAULT 0, 
  `ItemDiscount` VARCHAR(50), 
  `VoucherDiscount` VARCHAR(50), 
  PRIMARY KEY (`SalesReturnDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'SalesReturnDetails'
#

# 0 records

#
# Table structure for table 'GM_SalesReturns'
#

DROP TABLE IF EXISTS `GM_SalesReturns`;

CREATE TABLE `GM_SalesReturns` (
  `SalesReturnID` INTEGER NOT NULL DEFAULT 0, 
  `RecordDate` DATETIME, 
  `ShiftID` INTEGER DEFAULT 0, 
  `SalesID` INTEGER DEFAULT 0, 
  `IsVoid` TINYINT(1) NOT NULL, 
  `Remarks` VARCHAR(100), 
  `SalesReturnType` TINYINT(3) UNSIGNED, 
  `CustomerID` INTEGER, 
  `TotalAmount` DECIMAL(18,4), 
  `GUID` VARCHAR(50), 
  INDEX (`GUID`), 
  PRIMARY KEY (`SalesReturnID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'SalesReturns'
#

# 0 records

#
# Table structure for table 'GM_Settings'
#

DROP TABLE IF EXISTS `GM_Settings`;

CREATE TABLE `GM_Settings` (
  `SettingsID` INTEGER NOT NULL DEFAULT 0, 
  `DBVersion` DECIMAL(18,4) DEFAULT 0, 
  `IsComplete` TINYINT(1), 
  PRIMARY KEY (`SettingsID`), 
  INDEX (`SettingsID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Settings'
#

INSERT INTO `GM_Settings` (`SettingsID`, `DBVersion`, `IsComplete`) VALUES (0, .899, 0);
# 1 records

#
# Table structure for table 'GM_Shifts'
#

DROP TABLE IF EXISTS `GM_Shifts`;

CREATE TABLE `GM_Shifts` (
  `ShiftID` INTEGER NOT NULL DEFAULT 0, 
  `BusinessDayID` INTEGER DEFAULT 0, 
  `UserID` INTEGER DEFAULT 0, 
  `ShiftNumber` INTEGER DEFAULT 0, 
  `TerminalID` INTEGER DEFAULT 0, 
  `IsActive` TINYINT(1) NOT NULL, 
  `RecordDate` DATETIME, 
  `CashierID` INTEGER DEFAULT 0, 
  `StartCashOnHand` DECIMAL(19,4), 
  `EndCashOnHand` DECIMAL(19,4), 
  PRIMARY KEY (`ShiftID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Shifts'
#

# 0 records

#
# Table structure for table 'GM_StockTransferDetails'
#

DROP TABLE IF EXISTS `GM_StockTransferDetails`;

CREATE TABLE `GM_StockTransferDetails` (
  `StockTransferDetailID` INTEGER NOT NULL, 
  `StockTransferID` INTEGER, 
  `ProductID` INTEGER, 
  `Quantity` DECIMAL(18,4), 
  `Cost` VARCHAR(50), 
  `CostingType` TINYINT(3) UNSIGNED, 
  `Discount` VARCHAR(50), 
  PRIMARY KEY (`StockTransferDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'StockTransferDetails'
#

# 0 records

#
# Table structure for table 'GM_StockTransfers'
#

DROP TABLE IF EXISTS `GM_StockTransfers`;

CREATE TABLE `GM_StockTransfers` (
  `StockTransferID` INTEGER NOT NULL, 
  `BusinessDayID` INTEGER, 
  `RecordDate` DATETIME, 
  `Remarks` VARCHAR(100), 
  `FromBranchID` INTEGER, 
  `ToBranchID` INTEGER, 
  `GUID` VARCHAR(50), 
  `StockTransferType` TINYINT(3) UNSIGNED, 
  `TerminalID` INTEGER, 
  PRIMARY KEY (`StockTransferID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'StockTransfers'
#

# 0 records

#
# Table structure for table 'GM_SupplierReturnDetails'
#

DROP TABLE IF EXISTS `GM_SupplierReturnDetails`;

CREATE TABLE `GM_SupplierReturnDetails` (
  `SupplierReturnDetailID` INTEGER NOT NULL, 
  `SupplierReturnID` INTEGER, 
  `ProductID` INTEGER, 
  `Quantity` DECIMAL(18,0), 
  `Cost` VARCHAR(50), 
  `CostingType` TINYINT(3) UNSIGNED, 
  `Discount` VARCHAR(50), 
  PRIMARY KEY (`SupplierReturnDetailID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'SupplierReturnDetails'
#

# 0 records

#
# Table structure for table 'GM_SupplierReturns'
#

DROP TABLE IF EXISTS `GM_SupplierReturns`;

CREATE TABLE `GM_SupplierReturns` (
  `SupplierReturnID` INTEGER NOT NULL, 
  `SupplierID` INTEGER, 
  `RecordDate` DATETIME, 
  `Remarks` VARCHAR(100), 
  `BusinessDayID` INTEGER, 
  `TerminalID` INTEGER, 
  PRIMARY KEY (`SupplierReturnID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'SupplierReturns'
#

# 0 records

#
# Table structure for table 'GM_Suppliers'
#

DROP TABLE IF EXISTS `GM_Suppliers`;

CREATE TABLE `GM_Suppliers` (
  `SupplierID` INTEGER NOT NULL DEFAULT 0, 
  `SupplierName` VARCHAR(100), 
  `SupplierCode` VARCHAR(50), 
  `Address` VARCHAR(200), 
  `TelNo` VARCHAR(50), 
  `FaxNo` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `SupplierTypeID` INTEGER DEFAULT 0, 
  `ContactPerson` VARCHAR(100), 
  `GUID` VARCHAR(50), 
  `TerminalID` INTEGER, 
  `LastModified` DATETIME, 
  `Terms` INTEGER DEFAULT 0, 
  PRIMARY KEY (`SupplierID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Suppliers'
#

# 0 records

#
# Table structure for table 'GM_SupplierTypes'
#

DROP TABLE IF EXISTS `GM_SupplierTypes`;

CREATE TABLE `GM_SupplierTypes` (
  `SupplierTypeID` DECIMAL(18,0) NOT NULL, 
  `Description` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'SupplierTypes'
#

INSERT INTO `GM_SupplierTypes` (`SupplierTypeID`, `Description`, `IsDeleted`) VALUES (0, 'Outright', 0);
INSERT INTO `GM_SupplierTypes` (`SupplierTypeID`, `Description`, `IsDeleted`) VALUES (1, 'Concessionaire', 0);
# 2 records

#
# Table structure for table 'GM_UsedBusinessDays'
#

DROP TABLE IF EXISTS `GM_UsedBusinessDays`;

CREATE TABLE `GM_UsedBusinessDays` (
  `UsedBusinessDayID` INTEGER NOT NULL AUTO_INCREMENT, 
  `GUID` VARCHAR(50), 
  `BusinessDate` DATETIME, 
  INDEX (`GUID`), 
  PRIMARY KEY (`UsedBusinessDayID`), 
  INDEX (`UsedBusinessDayID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'UsedBusinessDays'
#

# 0 records

#
# Table structure for table 'GM_UserRights'
#

DROP TABLE IF EXISTS `GM_UserRights`;

CREATE TABLE `GM_UserRights` (
  `UserRightID` INTEGER NOT NULL DEFAULT 0, 
  `UserRoleID` INTEGER DEFAULT 0, 
  `TaskID` INTEGER DEFAULT 0, 
  `TaskValue` VARCHAR(50), 
  `TaskValueType` INTEGER, 
  PRIMARY KEY (`UserRightID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'UserRights'
#

# 0 records

#
# Table structure for table 'GM_UserRoles'
#

DROP TABLE IF EXISTS `GM_UserRoles`;

CREATE TABLE `GM_UserRoles` (
  `UserRoleID` INTEGER NOT NULL DEFAULT 0, 
  `Description` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `GUID` VARCHAR(50), 
  `LastModified` DATETIME, 
  PRIMARY KEY (`UserRoleID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'UserRoles'
#

# 0 records

#
# Table structure for table 'GM_Users'
#

DROP TABLE IF EXISTS `GM_Users`;

CREATE TABLE `GM_Users` (
  `UserID` INTEGER NOT NULL DEFAULT 0, 
  `UserRoleID` INTEGER DEFAULT 0, 
  `UserName` VARCHAR(100), 
  `Password` VARCHAR(50), 
  `IsDeleted` TINYINT(1) NOT NULL, 
  `GUID` VARCHAR(50), 
  `LastModified` DATETIME, 
  PRIMARY KEY (`UserID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Users'
#

# 0 records

