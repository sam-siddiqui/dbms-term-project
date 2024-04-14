CREATE DATABASE IF NOT EXISTS term_project CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE term_project;

DROP TABLE IF EXISTS db_book;
CREATE TABLE db_book(
   BookID     INTEGER  NOT NULL PRIMARY KEY 
  ,Title      VARCHAR(20) NOT NULL
  ,UnitPrice  NUMERIC(5,2) NOT NULL
  ,Author     VARCHAR(20) NOT NULL
  ,Quantity   INTEGER  NOT NULL
  ,SupplierID INTEGER  NOT NULL
  ,SubjectID  INTEGER  NOT NULL
);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (1,'book1',12.34,'author1',5,3,1);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (2,'book2',56.78,'author2',2,3,1);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (3,'book3',90.12,'author3',10,2,1);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (4,'book4',34.56,'author4',12,3,2);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (5,'book5',78.90,'author5',5,2,2);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (6,'book6',12.34,'author6',30,1,3);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (7,'book7',56.90,'author2',17,3,4);
INSERT INTO db_book(BookID,Title,UnitPrice,Author,Quantity,SupplierID,SubjectID) VALUES (8,'book8',33.44,'author7',2,1,3);

DROP TABLE IF EXISTS db_customer;
CREATE TABLE db_customer(
   CustomerID INTEGER  NOT NULL PRIMARY KEY 
  ,LastName   VARCHAR(20) NOT NULL
  ,FirstName  VARCHAR(20) NOT NULL
  ,Phone      VARCHAR(11) NOT NULL
);
INSERT INTO db_customer(CustomerID,LastName,FirstName,Phone) VALUES (1,'lastname1','firstname1','334-001-001');
INSERT INTO db_customer(CustomerID,LastName,FirstName,Phone) VALUES (2,'lastname2','firstname2','334-002-002');
INSERT INTO db_customer(CustomerID,LastName,FirstName,Phone) VALUES (3,'lastname3','firstname3','334-003-003');
INSERT INTO db_customer(CustomerID,LastName,FirstName,Phone) VALUES (4,'lastname4','firstname4','334-004-004');

DROP TABLE IF EXISTS db_employee;
CREATE TABLE db_employee(
   EmployeeID INTEGER  NOT NULL PRIMARY KEY 
  ,LastName   VARCHAR(20) NOT NULL
  ,FirstName  VARCHAR(20) NOT NULL
);
INSERT INTO db_employee(EmployeeID,LastName,FirstName) VALUES (1,'lastname5','firstname5');
INSERT INTO db_employee(EmployeeID,LastName,FirstName) VALUES (2,'lastname6','firstname6');
INSERT INTO db_employee(EmployeeID,LastName,FirstName) VALUES (3,'lastname6','firstname9');

DROP TABLE IF EXISTS db_order_detail;
CREATE TABLE db_order_detail(
   BookID   INTEGER  NOT NULL PRIMARY KEY 
  ,OrderID  INTEGER  NOT NULL
  ,Quantity INTEGER  NOT NULL
);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (1,1,2);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (4,1,1);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (6,2,2);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (7,2,3);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (5,3,1);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (3,4,2);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (4,4,1);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (7,4,1);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (1,5,1);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (1,6,2);
INSERT INTO db_order_detail(BookID,OrderID,Quantity) VALUES (1,7,1);

DROP TABLE IF EXISTS db_order;
CREATE TABLE db_order(
   OrderID     INTEGER  NOT NULL PRIMARY KEY 
  ,CustomerID  INTEGER  NOT NULL
  ,EmployeeID  INTEGER  NOT NULL
  ,OrderDate   DATE  NOT NULL
  ,ShippedDate DATE 
  ,ShipperID   INTEGER 
);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (1,1,1,'8/1/2016','8/3/2016',1);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (2,1,2,'8/4/2016',NULL,NULL);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (3,2,1,'8/1/2016','8/4/2016',2);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (4,4,2,'8/4/2016','8/4/2016',1);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (5,1,1,'8/4/2016','8/5/2016',1);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (6,4,2,'8/4/2016','8/5/2016',1);
INSERT INTO db_order(OrderID,CustomerID,EmployeeID,OrderDate,ShippedDate,ShipperID) VALUES (7,3,1,'8/4/2016','8/4/2016',1);

DROP TABLE IF EXISTS db_shipper;
CREATE TABLE db_shipper(
   ShipperID  INTEGER  NOT NULL PRIMARY KEY 
  ,ShpperName VARCHAR(20) NOT NULL
);
INSERT INTO db_shipper(ShipperID,ShpperName) VALUES (1,'shipper1');
INSERT INTO db_shipper(ShipperID,ShpperName) VALUES (2,'shipper2');
INSERT INTO db_shipper(ShipperID,ShpperName) VALUES (3,'shipper3');
INSERT INTO db_shipper(ShipperID,ShpperName) VALUES (4,'shipper4');

DROP TABLE IF EXISTS db_subject;
CREATE TABLE db_subject(
   SubjectID    INTEGER  NOT NULL PRIMARY KEY 
  ,CategoryName VARCHAR(20) NOT NULL
);
INSERT INTO db_subject(SubjectID,CategoryName) VALUES (1,'category1');
INSERT INTO db_subject(SubjectID,CategoryName) VALUES (2,'category2');
INSERT INTO db_subject(SubjectID,CategoryName) VALUES (3,'category3');
INSERT INTO db_subject(SubjectID,CategoryName) VALUES (4,'category4');
INSERT INTO db_subject(SubjectID,CategoryName) VALUES (5,'category5');

DROP TABLE IF EXISTS db_supplier;
CREATE TABLE db_supplier(
   SupplierID       INTEGER  NOT NULL PRIMARY KEY 
  ,CompanyName      VARCHAR(20) NOT NULL
  ,ContactLastName  VARCHAR(20) NOT NULL
  ,ContactFirstName VARCHAR(20)
  ,Phone            INTEGER  NOT NULL
);
INSERT INTO db_supplier(SupplierID,CompanyName,ContactLastName,ContactFirstName,Phone) VALUES (1,'supplier1','company1','company1',1111111111);
INSERT INTO db_supplier(SupplierID,CompanyName,ContactLastName,ContactFirstName,Phone) VALUES (2,'supplier2','company2','company2',2222222222);
INSERT INTO db_supplier(SupplierID,CompanyName,ContactLastName,ContactFirstName,Phone) VALUES (3,'supplier3','company3','company3',3333333333);
INSERT INTO db_supplier(SupplierID,CompanyName,ContactLastName,ContactFirstName,Phone) VALUES (4,'supplier4','company4',NULL,4444444444);