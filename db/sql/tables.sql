CREATE TABLE `Aircraft` (
  `reg_number` varchar(6) NOT NULL,
  `cost` decimal(15,2) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`reg_number`)
);

CREATE TABLE `Pilot` (
  `username` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`username`)
);

CREATE TABLE `Rental` (
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `reg_number` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`rid`)
);

CREATE TABLE `Type` (
  `manf` varchar(40) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `common_name` varchar(40) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tid`)
);

CREATE TABLE `can_rent` (
  `username` varchar(20) DEFAULT NULL,
  `reg_number` varchar(6) DEFAULT NULL
);
