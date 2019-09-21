CREATE DATABASE /*!32312 IF NOT EXISTS*/`classicmodels` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `classicmodels`;

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `contactLastName` varchar(50) NOT NULL,
  `contactFirstName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postalCode` varchar(15) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `creditLimit` decimal(10,2) DEFAULT NULL,
   PRIMARY KEY (`customerNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `productScale` varchar(10) NOT NULL,
  `productVendor` varchar(50) NOT NULL,
  `productDescription` text NOT NULL,
  `quantityInStock` smallint(6) NOT NULL,
  `buyPrice` decimal(10,2) NOT NULL,
  `MSRP` decimal(10,2) NOT NULL,
PRIMARY KEY (`productCode`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNumber` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `requiredDate` date NOT NULL,
  `shippedDate` date DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `comments` text,
  `customerNumber` int(11) NOT NULL,
PRIMARY KEY (`orderNumber`),
KEY `customerNumber` (`customerNumber`),
CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerNumber`) REFERENCES `customers` (`customerNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderNumber` int(11) NOT NULL,
  `productCode` varchar(15) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `priceEach` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderNumber`,`productCode`),
  KEY `productCode` (`productCode`),
CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderNumber`) REFERENCES `orders` (`orderNumber`),
CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productCode`) REFERENCES `products` (`productCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerNumber`, `customerName`, `contactLastName`, `contactFirstName`, `phone`, `addressLine1`, `addressLine2`, `city`, `state`, `postalCode`, `country`, `creditLimit`) VALUES
(103, 'Atelier graphique', 'Schmitt', 'Carine ', '40.32.2555', '54, rue Royale', NULL, 'Nantes', NULL, '44000', 'France', '21000.00'),
(112, 'Signal Gift Stores', 'King', 'Jean', '7025551838', '8489 Strong St.', NULL, 'Las Vegas', 'NV', '83030', 'USA', '71800.00'),
(114, 'Australian Collectors, Co.', 'Ferguson', 'Peter', '03 9520 4555', '636 St Kilda Road', 'Level 3', 'Melbourne', 'Victoria', '3004', 'Australia', '117300.00'),
(119, 'La Rochelle Gifts', 'Labrune', 'Janine ', '40.67.8555', '67, rue des Cinquante Otages', NULL, 'Nantes', NULL, '44000', 'France', '118200.00'),
(121, 'Baane Mini Imports', 'Bergulfsen', 'Jonas ', '07-98 9555', 'Erling Skakkes gate 78', NULL, 'Stavern', NULL, '4110', 'Norway', '81700.00'),
(124, 'Mini Gifts Distributors Ltd.', 'Nelson', 'Susan', '4155551450', '5677 Strong St.', NULL, 'San Rafael', 'CA', '97562', 'USA', '210500.00'),
(125, 'Havel & Zbyszek Co', 'Piestrzeniewicz', 'Zbyszek ', '(26) 642-7555', 'ul. Filtrowa 68', NULL, 'Warszawa', NULL, '01-012', 'Poland', '0.00'),
(128, 'Blauer See Auto, Co.', 'Keitel', 'Roland', '+49 69 66 90 2555', 'Lyonerstr. 34', NULL, 'Frankfurt', NULL, '60528', 'Germany', '59700.00'),
(129, 'Mini Wheels Co.', 'Murphy', 'Julie', '6505555787', '5557 North Pendale Street', NULL, 'San Francisco', 'CA', '94217', 'USA', '64600.00'),
(131, 'Land of Toys Inc.', 'Lee', 'Kwai', '2125557818', '897 Long Airport Avenue', NULL, 'NYC', 'NY', '10022', 'USA', '114900.00'),
(141, 'Euro+ Shopping Channel', 'Freyre', 'Diego ', '(91) 555 94 44', 'C/ Moralzarzal, 86', NULL, 'Madrid', NULL, '28034', 'Spain', '227600.00'),
(144, 'Volvo Model Replicas, Co', 'Berglund', 'Christina ', '0921-12 3555', 'Berguvsvägen  8', NULL, 'Luleå', NULL, 'S-958 22', 'Sweden', '53100.00'),
(145, 'Danish Wholesale Imports', 'Petersen', 'Jytte ', '31 12 3555', 'Vinbæltet 34', NULL, 'Kobenhavn', NULL, '1734', 'Denmark', '83400.00'),
(146, 'Saveley & Henriot, Co.', 'Saveley', 'Mary ', '78.32.5555', '2, rue du Commerce', NULL, 'Lyon', NULL, '69004', 'France', '123900.00'),
(148, 'Dragon Souveniers, Ltd.', 'Natividad', 'Eric', '+65 221 7555', 'Bronz Sok.', 'Bronz Apt. 3/6 Tesvikiye', 'Singapore', NULL, '079903', 'Singapore', '103800.00'),
(151, 'Muscle Machine Inc', 'Young', 'Jeff', '2125557413', '4092 Furth Circle', 'Suite 400', 'NYC', 'NY', '10022', 'USA', '138500.00'),
(157, 'Diecast Classics Inc.', 'Leong', 'Kelvin', '2155551555', '7586 Pompton St.', NULL, 'Allentown', 'PA', '70267', 'USA', '100600.00'),
(161, 'Technics Stores Inc.', 'Hashimoto', 'Juri', '6505556809', '9408 Furth Circle', NULL, 'Burlingame', 'CA', '94217', 'USA', '84600.00'),
(166, 'Handji Gifts& Co', 'Victorino', 'Wendy', '+65 224 1555', '106 Linden Road Sandown', '2nd Floor', 'Singapore', NULL, '069045', 'Singapore', '97900.00'),
(167, 'Herkku Gifts', 'Oeztan', 'Veysel', '+47 2267 3215', 'Brehmen St. 121', 'PR 334 Sentrum', 'Bergen', NULL, 'N 5804', 'Norway  ', '96800.00')
;

-- --------------------------------------------------------

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productCode`, `productName`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`) VALUES
('S10_1678', '1969 Harley Davidson Ultimate Chopper', '1:10', 'Min Lin Diecast', 'This replica features working kickstand, front suspension, gear-shift lever, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.', 7933, '48.81', '95.70'),
('S10_1949', '1952 Alpine Renault 1300', '1:10', 'Classic Metal Creations', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 7305, '98.58', '214.30'),
('S10_2016', '1996 Moto Guzzi 1100i', '1:10', 'Highway 66 Mini Classics', 'Official Moto Guzzi logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand, diecast metal with plastic parts and baked enamel finish.', 6625, '68.99', '118.94'),
('S10_4698', '2003 Harley-Davidson Eagle Drag Bike', '1:10', 'Red Start Diecast', 'Model features, official Harley Davidson logos and insignias, detachable rear wheelie bar, heavy diecast metal with resin parts, authentic multi-color tampo-printed graphics, separate engine drive belts, free-turning front fork, rotating tires and rear racing slick, certificate of authenticity, detailed engine, display stand\r\n, precision diecast replica, baked enamel finish, 1:10 scale model, removable fender, seat and tank cover piece for displaying the superior detail of the v-twin engine', 5582, '91.02', '193.66'),
('S10_4757', '1972 Alfa Romeo GTA', '1:10', 'Motor City Art Classics', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 3252, '85.68', '136.00'),
('S10_4962', '1962 LanciaA Delta 16V',  '1:10', 'Second Gear Diecast', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6791, '103.42', '147.74'),
('S12_1099', '1968 Ford Mustang', '1:12', 'Autoart Studio Design', 'Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color dark green.', 68, '95.34', '194.57'),
('S12_1108', '2001 Ferrari Enzo',  '1:12', 'Second Gear Diecast', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 3619, '95.59', '207.80'),
('S12_1666', '1958 Setra Bus', '1:12', 'Welly Diecast Productions', 'Model features 30 windows, skylights & glare resistant glass, working steering system, original logos', 1579, '77.90', '136.67'),
('S12_2823', '2002 Suzuki XREO', '1:12', 'Unimax Art Galleries', 'Official logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand, diecast metal with plastic parts and baked enamel finish.', 9997, '66.27', '150.62'),
('S12_3148', '1969 Corvair Monza', '1:18', 'Welly Diecast Productions', '1:18 scale die-cast about 10\" long doors open, hood opens, trunk opens and wheels roll', 6906, '89.14', '151.08'),
('S12_3380', '1968 Dodge Charger','1:12', 'Welly Diecast Productions', '1:12 scale model of a 1968 Dodge Charger. Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color black', 9123, '75.16', '117.44'),
('S12_3891', '1969 Ford Falcon', '1:12', 'Second Gear Diecast', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 1049, '83.05', '173.02'),
('S12_3990', '1970 Plymouth Hemi Cuda', '1:12', 'Studio M Art Models', 'Very detailed 1970 Plymouth Cuda model in 1:12 scale. The Cuda is generally accepted as one of the fastest original muscle cars from the 1970s. This model is a reproduction of one of the orginal 652 cars built in 1970. Red color.', 5663, '31.92', '79.80'),
('S12_4473', '1957 Chevy Pickup',  '1:12', 'Exoto Designs', '1:12 scale die-cast about 20\" long Hood opens, Rubber wheels', 6125, '55.70', '118.50'),
('S12_4675', '1969 Dodge Charger',  '1:12', 'Welly Diecast Productions', 'Detailed model of the 1969 Dodge Charger. This model includes finely detailed interior and exterior features. Painted in red and white.', 7323, '58.73', '115.16'),
('S18_1097', '1940 Ford Pickup Truck',  '1:18', 'Studio M Art Models', 'This model features soft rubber tires, working steering, rubber mud guards, authentic Ford logos, detailed undercarriage, opening doors and hood,  removable split rear gate, full size spare mounted in bed, detailed interior with opening glove box', 2613, '58.33', '116.67'),
('S18_1129', '1993 Mazda RX-7', '1:18', 'Highway 66 Mini Classics', 'This model features, opening hood, opening doors, detailed engine, rear spoiler, opening trunk, working steering, tinted windows, baked enamel finish. Color red.', 3975, '83.51', '141.54'),
('S18_1342', '1937 Lincoln Berline', '1:18', 'Motor City Art Classics', 'Features opening engine cover, doors, trunk, and fuel filler cap. Color black', 8693, '60.62', '102.74'),
('S18_1367', '1936 Mercedes-Benz 500K Special Roadster', '1:18', 'Studio M Art Models', 'This 1:18 scale replica is constructed of heavy die-cast metal and has all the features of the original: working doors and rumble seat, independent spring suspension, detailed interior, working steering system, and a bifold hood that reveals an engine so accurate that it even includes the wiring. All this is topped off with a baked enamel finish. Color white.', 8635, '24.26', '53.91');


--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNumber`, `orderDate`, `requiredDate`, `shippedDate`, `status`, `comments`, `customerNumber`) VALUES
(10100, '2003-01-06', '2003-01-13', '2003-01-10', 'Shipped', NULL, 103),
(10101, '2003-01-09', '2003-01-18', '2003-01-11', 'Shipped', 'Check on availability.', 128),
(10102, '2003-01-10', '2003-01-18', '2003-01-14', 'Shipped', NULL, 121),
(10103, '2003-01-29', '2003-02-07', '2003-02-02', 'Shipped', NULL, 121),
(10104, '2003-01-31', '2003-02-09', '2003-02-01', 'Shipped', NULL, 141),
(10105, '2003-02-11', '2003-02-21', '2003-02-12', 'Shipped', NULL, 145),
(10106, '2003-02-17', '2003-02-24', '2003-02-21', 'Shipped', NULL, 167),
(10107, '2003-02-24', '2003-03-03', '2003-02-26', 'Shipped', 'Difficult to negotiate with customer. We need more marketing materials', 131),
(10108, '2003-03-03', '2003-03-12', '2003-03-08', 'Shipped', NULL, 166),
(10109, '2003-03-10', '2003-03-19', '2003-03-11', 'Shipped', 'Customer requested that FedEx Ground is used for this shipping', 161),
(10110, '2003-03-18', '2003-03-24', '2003-03-20', 'Shipped', NULL, 167),
(10111, '2003-03-25', '2003-03-31', '2003-03-30', 'Shipped', NULL, 129),
(10112, '2003-03-24', '2003-04-03', '2003-03-29', 'Shipped', 'Customer requested that ad materials (such as posters, pamphlets) be included in the shippment', 144),
(10113, '2003-03-26', '2003-04-02', '2003-03-27', 'Shipped', NULL, 124),
(10114, '2003-04-01', '2003-04-07', '2003-04-02', 'Shipped', NULL, 119),
(10115, '2003-04-04', '2003-04-12', '2003-04-07', 'Shipped', NULL, 157),
(10116, '2003-04-11', '2003-04-19', '2003-04-13', 'Shipped', NULL, 148),
(10117, '2003-04-16', '2003-04-24', '2003-04-17', 'Shipped', NULL, 148),
(10118, '2003-04-21', '2003-04-29', '2003-04-26', 'Shipped', 'Customer has worked with some of our vendors in the past and is aware of their MSRP', 124),
(10119, '2003-04-28', '2003-05-05', '2003-05-02', 'Shipped', NULL, 144);


--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderNumber`, `productCode`, `quantityOrdered`, `priceEach`) VALUES
(10100, 'S10_1678', 30, '136.00'),
(10100, 'S10_1949', 50, '55.09'),
(10100, 'S10_2016', 22, '75.46'),
(10100, 'S10_4698', 49, '35.29'),
(10101, 'S10_4757', 25, '108.06'),
(10101, 'S10_4962', 26, '167.06'),
(10101, 'S12_1099', 45, '32.53'),
(10101, 'S12_1108', 46, '44.35'),
(10102, 'S12_1666', 39, '95.55'),
(10102, 'S12_2823', 41, '43.13'),
(10103, 'S12_3148', 26, '214.30'),
(10103, 'S12_3380', 42, '119.67'),
(10103, 'S12_1666', 27, '121.64'),
(10103, 'S12_3891', 35, '94.50'),
(10103, 'S12_3990', 22, '58.34'),
(10103, 'S18_1367', 27, '92.19'),
(10103, 'S18_1342', 35, '61.84'),
(10103, 'S18_1129', 25, '86.92'),
(10103, 'S18_1097', 46, '86.31'),
(10103, 'S12_4675', 36, '98.07');



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ordersview`  AS  select `c`.`productCode` AS `productCode`,`c`.`quantityOrdered` AS `quantityOrdered`,`c`.`priceEach` AS `priceEach`,(select group_concat(distinct `p`.`productName` separator ',') from `products` `p` where (`p`.`productCode` = `c`.`productCode`)) AS `Product_Name`,`orders`.`orderNumber` AS `orderNumber`,`orders`.`orderDate` AS `orderDate`,`orders`.`requiredDate` AS `requiredDate`,`orders`.`shippedDate` AS `shippedDate`,`orders`.`status` AS `status`,`orders`.`comments` AS `comments`,`orders`.`customerNumber` AS `customerNumber` from (`orderdetails` `c` join `orders` on((`orders`.`orderNumber` = `c`.`orderNumber`))) ;
