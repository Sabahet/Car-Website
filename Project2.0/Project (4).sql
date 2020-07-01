-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2020 at 08:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars_for_sale`
--

CREATE TABLE `cars_for_sale` (
  `car_for_Sale_ID` int(11) NOT NULL COMMENT 'unique to each car',
  `manufacturer_ShortName` char(15) NOT NULL COMMENT 'Buick (short name) for General Motors',
  `model_Name` varchar(255) NOT NULL COMMENT 'Cutlass, Challenger, etc',
  `car_Category` char(15) NOT NULL COMMENT 'Compact, Convertible, Minivan, Truck',
  `car_Price` char(12) NOT NULL COMMENT 'how much is the car on the market?',
  `car_Mileage` char(12) NOT NULL COMMENT 'how many miles does the car have?',
  `registration_Year` year(4) NOT NULL,
  `car_Availability` enum('Available','Not Available') NOT NULL COMMENT '1=not available 2=available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars_for_sale`
--

INSERT INTO `cars_for_sale` (`car_for_Sale_ID`, `manufacturer_ShortName`, `model_Name`, `car_Category`, `car_Price`, `car_Mileage`, `registration_Year`, `car_Availability`) VALUES
(4, 'Buick', 'Cascada', 'Convertible', '$21,990', '21,839', 2017, 'Available'),
(5, 'Jeep', 'Wrangler', 'SUV', '$35,990', '4,411', 2018, 'Available'),
(6, 'Ram', '1500 SLT', 'Truck', '$27,000', '21,450', 2017, 'Available'),
(7, 'Ram', '1500 Limited', 'Truck', '$43,256', '42,442', 2019, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `cars_sold`
--

CREATE TABLE `cars_sold` (
  `car_Sold_ID` int(11) NOT NULL COMMENT 'unique identifier of car sold',
  `car_for_Sale_ID` int(11) NOT NULL COMMENT 'FK from our Cars_for_Sale',
  `customer_ID` int(11) NOT NULL COMMENT 'FK from our unique customer indentifier',
  `final_Price` float NOT NULL COMMENT 'Final price. It is double to include tax',
  `date_Sold` datetime NOT NULL COMMENT 'date and time item was sold',
  `monthly_Financing` tinyint(1) NOT NULL COMMENT 'is buyer paying in full upfront or are they doing a finance plan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_categories`
--

CREATE TABLE `car_categories` (
  `car_Category` varchar(15) NOT NULL COMMENT 'Convertible, SUV, Sedan, etc',
  `category_Information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_categories`
--

INSERT INTO `car_categories` (`car_Category`, `category_Information`) VALUES
('Convertible', 'A convertible, a.k.a. a cabriolet or roadster, is a car with a roof structure that can be \'converted\' to allow open-air or enclosed driving. They feature either a retractable hardtop roof or soft folding top.'),
('Coupe', 'A coupe is classically defined as a closed two-door car with a fixed roof. Considered sporty by nature, it generally gets just 2 seats or with a smaller-than-average rear. The typical definition of a coupe has evolved over time and differs across manufacturers and now is also ascribed to cars with four doors and coupe-like proportions, chiefly for their sporty appeal instead of number of doors.'),
('Sedan', 'Out of the different types of cars, a sedan is traditionally defined as a car with four doors and a typical trunk.'),
('SUV', 'Conventionally, a sports utility vehicle (SUV) is a big car built on a body-on-frame chassis, sports increased ground clearance and offers off-roading capabilities to a certain extent. With that said, the aforementioned definition of an SUV has blurred over time and often includes both off-roaders and soft-roaders.'),
('Truck', 'You don\'t need to be a cattle rancher to enjoy the benefits of pickup trucks. Any man, be he an outdoorsman or a suburbanite, can enjoy the toughness, power and utility of these machines.');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `car_Feature_ID` int(11) NOT NULL COMMENT 'primary key for our multi-relationships',
  `car_Feature_Name` varchar(255) NOT NULL COMMENT 'an example of feature would be Air-Conditioning',
  `car_Feature_Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`car_Feature_ID`, `car_Feature_Name`, `car_Feature_Description`) VALUES
(1, 'Cameras', 'Most new cars now come equipped with special cameras installed. If you’re a Subaru fan, for example, you can buy a model with their EyeSight system. Your ride will come equipped with a pair of cameras that sit over your rear view mirror for extra eyes on the road. This EyeSight system can warn you if you start to veer into the next lane or get too close to another vehicle. And it can even stop the car if it looks like you’re headed for a collision.'),
(2, 'Sensors', 'Mercedes developed a safety feature called Collision Prevention Assist, a sensor that monitors your ride’s distance from vehicles in front of you. If you accidentally get too close to the car ahead, you’ll be warned by several noisy beeps and a flashing light so you can apply the brakes.\r\n\r\nThere are also sensors that monitor driver fatigue, and if they sense you’re getting drowsy, they’ll kick in to wake you up. Depending on the sensor, you might hear an alarm, feel your seat vibrate, or get a sudden nudge from your seat belt.'),
(3, 'Back-up assistance', 'One of the coolest inventions is back-up assistance. This feature detects when anything from a skipping child to another vehicle is approaching you from behind, warning you so you can hit the brakes. And some models even apply the brakes for you in case you’re not quick enough.'),
(4, 'Self-parking devices', 'For those of you who dread parallel parking, there are new cars that will take care of this with just the push of a button.'),
(5, 'Adaptable air bags', 'Featured air bags that can sense your body size and vent unneeded air during a crash so you’ll get just the right amount of protection.'),
(6, 'Adaptable headlights', 'Driving at night can be challenging, but several car models showcase adaptable headlights that turn along with the car, allowing you to better see upcoming hazards when taking curves. Adaptable headlights may also amplify light production, making it easier to drive at night.'),
(7, 'Tire pressure alert system', 'Get ready to toss that handheld tire gauge in the trash. Nissan’s Easy-Fill system not only alerts you when your tire pressure needs a little adjusting, but it also offers guidance when you’re adding air — once you reach the ideal psi, your car’s horn will honk.');

-- --------------------------------------------------------

--
-- Table structure for table `car_manufacturers`
--

CREATE TABLE `car_manufacturers` (
  `manufacturer_ShortName` char(15) NOT NULL COMMENT 'FK from Cars_for_Sale',
  `manufacturer_FullName` varchar(255) NOT NULL COMMENT 'Buick short name would correlate to General Motors'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_manufacturers`
--

INSERT INTO `car_manufacturers` (`manufacturer_ShortName`, `manufacturer_FullName`) VALUES
('Buick', 'General Motors'),
('Jeep', 'Fiat Chrysler Automobiles'),
('Nissan', 'Renault-Nissan-Mitsubishi Alliance'),
('Porsche', 'Volkswagen Group'),
('Ram', 'Fiat Chrysler Automobiles');

-- --------------------------------------------------------

--
-- Table structure for table `car_pictures`
--

CREATE TABLE `car_pictures` (
  `car_for_Sale_ID` int(11) NOT NULL COMMENT 'one to one relationship',
  `image_description` varchar(255) NOT NULL COMMENT 'image description on hover',
  `featured_image_dir` varchar(255) DEFAULT NULL COMMENT 'preview image that is displayed on home page',
  `image1_dir` varchar(255) DEFAULT NULL COMMENT 'first product image',
  `image2_dir` varchar(255) DEFAULT NULL COMMENT 'second product image',
  `image3_dir` varchar(255) NOT NULL COMMENT 'third product image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_pictures`
--

INSERT INTO `car_pictures` (`car_for_Sale_ID`, `image_description`, `featured_image_dir`, `image1_dir`, `image2_dir`, `image3_dir`) VALUES
(4, '2017 Buick Cascada', 'buick_featured.jpg', 'buick_front.png', 'buick_side.png', 'buick_rear_side.png'),
(5, '2018 Wrangler Sahara', 'wrangler_featured.png', 'wrangler_front.png', 'wrangler_side.png', 'wrangler_rear_side.png'),
(6, '2017 Ram 1500 SLT', 'ram2017_featured.png', 'ram2017_front.png', 'ram2017_side.png', 'ram2017_rear_side.png'),
(7, '2019 Ram 1500 Limited', 'ram2019_featured.png', 'ram2019_front.png', 'ram2019_rear_side.png', 'ram2019_side.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `phone`, `created`, `updated`) VALUES
(1, 'Manoj', 'Kumar', 'mk@gmail.com', '115489652', '2020-05-08 19:33:27', '0000-00-00 00:00:00'),
(2, 'ram', 'singh', 'ram@gmail.com', '762518467', '2020-05-08 19:35:24', '0000-00-00 00:00:00'),
(3, 'Manojkr ', 'Singh', 'mkah@gmail.com', '07398781421', '2020-05-08 19:36:04', '0000-00-00 00:00:00'),
(4, 'aman ', 'singh', 'aman@gmail.com', '898987980867', '2020-05-08 19:41:07', '0000-00-00 00:00:00'),
(0, 'Sabahet', 'Alovic', 'sabaheta@yahoo.com', '9175651270', '2020-05-12 21:02:22', '0000-00-00 00:00:00'),
(0, 'Sabahet', 'Alovic', 'sabaheta@yahoo.com', '9175651270', '2020-05-12 21:03:48', '0000-00-00 00:00:00'),
(0, 'Sabahet', 'Alovic', 'sabaheta@yahoo.com', '9175651270', '2020-05-12 21:03:55', '0000-00-00 00:00:00'),
(0, 'Enver', 'Jahovic', 'asabahet@yahoo.com', '9175651270', '2020-05-12 21:04:42', '0000-00-00 00:00:00'),
(0, 'Enver', 'Jahovic', 'asabahet@yahoo.com', '9175651270', '2020-05-12 21:05:55', '0000-00-00 00:00:00'),
(0, 'Enver', 'Jahovic', 'asabahet@yahoo.com', '9175651270', '2020-05-12 21:06:19', '0000-00-00 00:00:00'),
(0, 'Enver', 'Jahovic', 'asabahet@yahoo.com', '9175651270', '2020-05-12 21:08:01', '0000-00-00 00:00:00'),
(0, 'Sabahet', 'Alovic', 'sabaheta@yahoo.com', '9175651270', '2020-05-14 17:32:28', '0000-00-00 00:00:00'),
(0, 'Sabahet', 'Alovic', 'sabaheta@yahoo.com', '9175651270', '2020-05-14 17:47:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `features_on_cars_for_sale`
--

CREATE TABLE `features_on_cars_for_sale` (
  `tableID` int(11) NOT NULL,
  `car_for_Sale_ID` int(11) NOT NULL,
  `car_Feature_ID` int(11) NOT NULL COMMENT '1 - Cameras\r\n2 - Sensors\r\n3 - Back-Up Assistance\r\n4 - Self-parking\r\n5 - Adaptable Air Bags\r\n6 - Adaptable headlight\r\n7 - Tire pressure alert system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features_on_cars_for_sale`
--

INSERT INTO `features_on_cars_for_sale` (`tableID`, `car_for_Sale_ID`, `car_Feature_ID`) VALUES
(1, 4, 2),
(2, 4, 1),
(3, 4, 3),
(4, 4, 7),
(5, 5, 3),
(6, 5, 5),
(7, 5, 6),
(8, 5, 7),
(9, 6, 6),
(10, 7, 6),
(13, 6, 7),
(14, 7, 7),
(15, 6, 3),
(16, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(16, 'Sabahet123', 'sabaheta@yahoo.com', '$2y$10$sLM/BUyNWsbQ1zMgFV1qQe22W3RXYLQOhb2/NtxI/jhiVPD7rUekS'),
(17, 'Ganije', 'sabaheta@yahoo.com', '$2y$10$39k9ESt.9g/qDwYn2OOpcexm8R8O3Nbl0WqA9nOtzUbvnvSj9qS4i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars_for_sale`
--
ALTER TABLE `cars_for_sale`
  ADD PRIMARY KEY (`car_for_Sale_ID`),
  ADD KEY `manufacturer_ShortName` (`manufacturer_ShortName`),
  ADD KEY `car_Category` (`car_Category`);

--
-- Indexes for table `cars_sold`
--
ALTER TABLE `cars_sold`
  ADD PRIMARY KEY (`car_Sold_ID`),
  ADD KEY `car_for_Sale_ID` (`car_for_Sale_ID`);

--
-- Indexes for table `car_categories`
--
ALTER TABLE `car_categories`
  ADD PRIMARY KEY (`car_Category`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`car_Feature_ID`);

--
-- Indexes for table `car_manufacturers`
--
ALTER TABLE `car_manufacturers`
  ADD PRIMARY KEY (`manufacturer_ShortName`);

--
-- Indexes for table `car_pictures`
--
ALTER TABLE `car_pictures`
  ADD KEY `car_for_Sale_ID` (`car_for_Sale_ID`) USING BTREE;

--
-- Indexes for table `features_on_cars_for_sale`
--
ALTER TABLE `features_on_cars_for_sale`
  ADD PRIMARY KEY (`tableID`),
  ADD KEY `sale` (`car_for_Sale_ID`),
  ADD KEY `feature` (`car_Feature_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars_for_sale`
--
ALTER TABLE `cars_for_sale`
  MODIFY `car_for_Sale_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique to each car', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars_sold`
--
ALTER TABLE `cars_sold`
  MODIFY `car_Sold_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique identifier of car sold';

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `car_Feature_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key for our multi-relationships', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `features_on_cars_for_sale`
--
ALTER TABLE `features_on_cars_for_sale`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars_for_sale`
--
ALTER TABLE `cars_for_sale`
  ADD CONSTRAINT `cars_for_sale_ibfk_1` FOREIGN KEY (`manufacturer_ShortName`) REFERENCES `car_manufacturers` (`manufacturer_ShortName`),
  ADD CONSTRAINT `cars_for_sale_ibfk_2` FOREIGN KEY (`car_Category`) REFERENCES `car_categories` (`car_Category`);

--
-- Constraints for table `features_on_cars_for_sale`
--
ALTER TABLE `features_on_cars_for_sale`
  ADD CONSTRAINT `feature` FOREIGN KEY (`car_Feature_ID`) REFERENCES `car_features` (`car_Feature_ID`),
  ADD CONSTRAINT `sale` FOREIGN KEY (`car_for_Sale_ID`) REFERENCES `cars_for_sale` (`car_for_Sale_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
