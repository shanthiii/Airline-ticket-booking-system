-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 07:42 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_reservation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`Harry`@`localhost` PROCEDURE `GetFlightStatistics` (IN `j_date` DATE)  BEGIN
 select flight_no,departure_date,IFNULL(no_of_passengers, 0) as no_of_passengers,total_capacity from (
select f.flight_no,f.departure_date,sum(t.no_of_passengers) as no_of_passengers,j.total_capacity 
from flight_details f left join ticket_details t 
on t.booking_status='CONFIRMED' 
and t.flight_no=f.flight_no 
and f.departure_date=t.journey_date 
inner join jet_details j on j.jet_id=f.jet_id
group by flight_no,journey_date) k where departure_date=j_date;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `staff_id` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `pwd`, `staff_id`, `name`, `email`) VALUES
('charitha', 'charitha@6789', '101', 'charitha', 'charithae@gmail.com'),
('harshith', 'mss@harshith', '102', 'mss harshith', 'mavilla@gmail.com'),
('praharsha', 'harsha123', '103', 'Naga Praharsha', 'nagapraharshag@gmail.com'),
('prashanthi', 'shanthi@2811', '104', 'prashanthi v', 'shanthi2811@gmail.com'),
('srinadh', 'sri@1104', '105', 'Srinadh Reddy', 'srinadhreddye@gmail.com'),
('vishwa', 'vishu', '106', 'bhanu vishwa', 'bhanuvishwa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(20) NOT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `pwd`, `name`, `email`, `phone_no`, `address`) VALUES
('chadi', 'hamara', 'ashok', 'ashok@gmail.com', '9493592298', 'mumbai'),
('customer', 'customer', 'customer', 'customer@gmail.com', '8790837000', 'ernakulam'),
('javi', 'javi07', 'javid', 'javid@gmail.com', '8790837098', 'vizag'),
('prassana malli', 'prassu123', 'Prassana N B S V', 'prassana@gmail.com', '8460865093', 'chennai'),
('rakhi', 'rakhi45', 'rakesh', 'rakeshbandi@gmail.com', '8445566379', 'piduguralla'),
('ramki', 'me and mine', 'rama krishna', 'ramakrishna@gmail.com', '8464953842', 'delhi'),
('rishi', 'rishi@5482', 'rishitha', 'rishithareddy@gmail.com', '9381996138', 'kokata'),
('shalam', 'shalamsaga', 'shalam raju', 'shalamraju@gmai', '8688921612', 'bangalore'),
('sindhu', 'sindhu07', 'Sindhu', 'sindhu@gmail.com', '6303512128', 'hydrabad'),
('sri', 'sri@0311', 'Sri Lakshmi', 'srilakshmi@gmail.com', '7386222286', 'delhi'),
('vikki', 'vikki18', 'vivek', 'vivekarikatla@gmail.com', '7396976464', 'guntur');

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `flight_details` (
  `flight_no` varchar(10) NOT NULL,
  `from_city` varchar(20) DEFAULT NULL,
  `to_city` varchar(20) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `seats_economy` int(5) DEFAULT NULL,
  `seats_business` int(5) DEFAULT NULL,
  `price_economy` int(10) DEFAULT NULL,
  `price_business` int(10) DEFAULT NULL,
  `jet_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`flight_no`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `seats_economy`, `seats_business`, `price_economy`, `price_business`, `jet_id`) VALUES
('AA101', 'bangalore', 'mumbai', '2021-03-20', '2021-03-21', '21:00:00', '01:00:00', 200, 100, 5000, 7500, '10001'),
('AA102', 'bangalore', 'mumbai', '2021-03-20', '2021-03-20', '10:00:00', '12:00:00', 200, 75, 2500, 3000, '10002'),
('AA103', 'bangalore', 'mumbai', '2021-03-21', '2021-03-22', '21:00:00', '01:00:00', 200, 100, 4000, 6500, '10001'),
('AA104', 'bangalore', 'mumbai', '2021-03-21', '2021-02-21', '10:00:00', '10:00:00', 200, 75, 4000, 6500, '10002'),
('AA105', 'bangalore', 'chennai', '2021-03-20', '2021-03-20', '09:00:00', '11:00:00', 150, 75, 1500, 2500, '10004'),
('AA106', 'bangalore', 'chennai', '2021-03-21', '2021-03-21', '09:00:00', '11:00:00', 150, 75, 1500, 2500, '10004'),
('AA107', 'bangalore', 'hyderabad', '2021-03-21', '2021-03-21', '13:00:00', '14:00:00', 150, 75, 3000, 3750, '10004'),
('AA108', 'bangalore', 'delhi', '2021-03-21', '2021-03-21', '06:30:00', '10:30:00', 150, 100, 3000, 5000, '10005'),
('AA109', 'mumbai', 'bangalore', '2021-03-21', '2021-03-21', '12:00:00', '14:00:00', 150, 100, 2500, 3000, '10005'),
('AA110', 'mumbai', 'delhi', '2021-03-21', '2021-03-21', '10:00:00', '11:30:00', 100, 150, 2000, 3500, '10005'),
('AA111', 'delhi', 'bangalore', '2021-03-21', '2021-03-21', '11:00:00', '14:00:00', 150, 125, 4000, 7000, '10002'),
('AA112', 'hydrabad', 'delhi', '2021-03-21', '2021-03-21', '12:00:00', '03:00:00', 10, 40, 3000, 5000, '10003');

-- --------------------------------------------------------

--
-- Table structure for table `frequent_flier_details`
--

CREATE TABLE `frequent_flier_details` (
  `frequent_flier_no` varchar(20) NOT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `mileage` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequent_flier_details`
--

INSERT INTO `frequent_flier_details` (`frequent_flier_no`, `customer_id`, `mileage`) VALUES
('10001000', 'rakhi', 375),
('20002000', 'shalam', 150);

-- --------------------------------------------------------

--
-- Table structure for table `jet_details`
--

CREATE TABLE `jet_details` (
  `jet_id` varchar(10) NOT NULL,
  `jet_type` varchar(20) DEFAULT NULL,
  `total_capacity` int(5) DEFAULT NULL,
  `active` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jet_details`
--

INSERT INTO `jet_details` (`jet_id`, `jet_type`, `total_capacity`, `active`) VALUES
('10001', 'Dreamliner', 300, 'Yes'),
('10002', 'Airbus A380', 275, 'Yes'),
('10003', 'ATR', 50, 'Yes'),
('10004', 'Boeing 737', 225, 'Yes'),
('10005', 'Test_Model', 250, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `myblob`
--

CREATE TABLE `myblob` (
  `id` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `size` int(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `det_customer_id` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(10) NOT NULL,
  `pnr` varchar(15) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `meal_choice` varchar(5) DEFAULT NULL,
  `frequent_flier_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `pnr`, `name`, `age`, `gender`, `meal_choice`, `frequent_flier_no`) VALUES
(1, '1246135', 'sri', 19, 'male', 'yes', NULL),
(1, '1427255', 'prabhavathi', 35, 'female', 'yes', NULL),
(1, '1669050', 'Harry Roshan', 20, 'male', 'yes', '20002000'),
(1, '2369143', 'blah', 20, 'male', 'yes', NULL),
(1, '3027167', 'aadith_name', 10, 'male', 'yes', NULL),
(1, '3773951', 'harry', 51, 'male', 'yes', NULL),
(1, '4797983', 'pass1', 34, 'male', 'yes', NULL),
(1, '5421865', 'pass1', 10, 'male', 'yes', NULL),
(1, '5672604', 'prashanthi', 20, 'female', 'no', NULL),
(1, '6980157', 'roshan', 20, 'male', 'yes', NULL),
(1, '8503285', 'aadith_name', 10, 'male', 'yes', '10001000'),
(2, '1246135', 'prashanthi', 19, 'female', 'yes', NULL),
(2, '1669050', 'berti harry', 45, 'female', 'yes', NULL),
(2, '2369143', 'blah', 51, 'male', 'yes', NULL),
(2, '3027167', 'roshan', 20, 'male', 'yes', NULL),
(2, '3773951', 'berti', 42, 'female', 'yes', NULL),
(2, '4797983', 'Harry Roshan', 20, 'male', 'yes', '20002000'),
(2, '5421865', 'pass2', 20, 'female', 'yes', NULL),
(2, '6980157', 'aadith', 9, 'male', 'yes', NULL),
(2, '8503285', 'roshan_name', 20, 'male', 'yes', NULL),
(3, '1669050', 'aadith_name', 10, 'male', 'yes', NULL),
(3, '2369143', 'blah', 10, 'male', 'yes', NULL),
(3, '3773951', 'aadith', 11, 'male', 'yes', '10001000'),
(3, '4797983', 'aadith_name', 10, 'male', 'yes', '10001000'),
(3, '5421865', 'pass3', 30, 'male', 'yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` varchar(20) NOT NULL,
  `pnr` varchar(15) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` int(6) DEFAULT NULL,
  `payment_mode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `pnr`, `payment_date`, `payment_amount`, `payment_mode`) VALUES
('120000248', '4797983', '2021-03-12', 4200, 'credit card'),
('142539461', '3773951', '2020-12-25', 4050, 'credit card'),
('165125569', '8503285', '2021-01-25', 7500, 'net banking'),
('252222738', '1427255', '2021-03-19', 3350, 'net banking'),
('342615800', '5672604', '2021-02-21', 5600, 'credit card'),
('467972527', '2369143', '2021-02-26', 33400, 'debit card'),
('557778944', '6980157', '2021-01-15', 11700, 'credit card'),
('620041544', '1669050', '2021-03-18', 4800, 'debit card'),
('665360715', '5421865', '2021-01-01', 15750, 'net banking'),
('862686553', '3027167', '2021-01-25', 10700, 'debit card');

--
-- Triggers `payment_details`
--
DELIMITER $$
CREATE TRIGGER `update_ticket_after_payment` AFTER INSERT ON `payment_details` FOR EACH ROW UPDATE ticket_details
     SET booking_status='CONFIRMED', payment_id= NEW.payment_id
   WHERE pnr = NEW.pnr
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `pnr` varchar(15) NOT NULL,
  `date_of_reservation` date DEFAULT NULL,
  `flight_no` varchar(10) DEFAULT NULL,
  `journey_date` date DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `no_of_passengers` int(5) DEFAULT NULL,
  `lounge_access` varchar(5) DEFAULT NULL,
  `priority_checkin` varchar(5) DEFAULT NULL,
  `insurance` varchar(5) DEFAULT NULL,
  `payment_id` varchar(20) DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`pnr`, `date_of_reservation`, `flight_no`, `journey_date`, `class`, `booking_status`, `no_of_passengers`, `lounge_access`, `priority_checkin`, `insurance`, `payment_id`, `customer_id`) VALUES
('1246135', '2021-03-19', 'AA108', '2021-03-21', 'economy', 'PENDING', 2, 'yes', 'yes', 'yes', NULL, 'customer'),
('1427255', '2021-03-19', 'AA106', '2021-03-21', 'business', 'CANCELED', 1, 'yes', 'yes', 'yes', '252222738', 'customer'),
('1669050', '2021-03-18', NULL, NULL, 'business', 'CONFIRMED', 3, 'yes', 'yes', 'yes', '620041544', 'shalam'),
('2369143', '2021-02-26', 'AA101', '2021-03-20', 'business', 'CANCELED', 4, 'yes', 'yes', 'yes', '467972527', 'chadi'),
('3027167', '2021-01-25', 'AA101', '2021-03-20', 'economy', 'CONFIRMED', 2, 'no', 'no', 'yes', '862686553', 'rakhi'),
('3773951', '2020-12-25', NULL, NULL, 'economy', 'CONFIRMED', 3, 'yes', 'yes', 'yes', '142539461', 'rakhi'),
('4797983', '2021-03-12', NULL, NULL, 'business', 'CONFIRMED', 3, 'yes', 'no', 'yes', '120000248', 'shalam'),
('5421865', '2021-01-01', 'AA101', '2021-03-20', 'economy', 'CONFIRMED', 3, 'no', 'no', 'no', '665360715', 'shalam'),
('5672604', '2021-02-21', 'AA101', '2021-03-20', 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '342615800', 'chadi'),
('6980157', '2021-01-15', 'AA101', '2021-03-20', 'economy', 'CANCELED', 2, 'yes', 'yes', 'yes', '557778944', 'rakhi'),
('8503285', '2021-01-25', 'AA102', '2021-03-20', 'business', 'CONFIRMED', 2, 'yes', 'yes', 'no', '165125569', 'rakhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`flight_no`,`departure_date`),
  ADD KEY `jet_id` (`jet_id`);

--
-- Indexes for table `frequent_flier_details`
--
ALTER TABLE `frequent_flier_details`
  ADD PRIMARY KEY (`frequent_flier_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `jet_details`
--
ALTER TABLE `jet_details`
  ADD PRIMARY KEY (`jet_id`);

--
-- Indexes for table `myblob`
--
ALTER TABLE `myblob`
  ADD PRIMARY KEY (`id`),
  ADD KEY `det_customer_id` (`det_customer_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`,`pnr`),
  ADD KEY `pnr` (`pnr`),
  ADD KEY `frequent_flier_no` (`frequent_flier_no`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pnr` (`pnr`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `journey_date` (`journey_date`),
  ADD KEY `flight_no` (`flight_no`),
  ADD KEY `flight_no_2` (`flight_no`,`journey_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myblob`
--
ALTER TABLE `myblob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD CONSTRAINT `flight_details_ibfk_1` FOREIGN KEY (`jet_id`) REFERENCES `jet_details` (`jet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frequent_flier_details`
--
ALTER TABLE `frequent_flier_details`
  ADD CONSTRAINT `frequent_flier_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `myblob`
--
ALTER TABLE `myblob`
  ADD CONSTRAINT `det_customer_id` FOREIGN KEY (`det_customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `ticket_details` (`pnr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passengers_ibfk_2` FOREIGN KEY (`frequent_flier_no`) REFERENCES `frequent_flier_details` (`frequent_flier_no`) ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `ticket_details` (`pnr`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_details_ibfk_3` FOREIGN KEY (`flight_no`,`journey_date`) REFERENCES `flight_details` (`flight_no`, `departure_date`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
