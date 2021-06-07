-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 09:10 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boba_tea`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_ID` varchar(32) NOT NULL,
  `Branch_Name` varchar(64) NOT NULL,
  `Branch_Address` varchar(200) NOT NULL,
  `Branch_Tel` varchar(13) NOT NULL,
  `Number_Theater` int(2) NOT NULL,
  `OC_Time` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_ID`, `Branch_Name`, `Branch_Address`, `Branch_Tel`, `Number_Theater`, `OC_Time`) VALUES
('0001', 'KMUTT_CINEPLEX', 'KMUTT', '029798000', 4, '10.00-22.00'),
('0002', 'KMUTT(RC)_CINEPLEX', 'KMUTT(RC)', '029232341', 3, '12.00-22.00'),
('0003', 'KMUTT(Bang Khun Tian)_CINEPLEX', 'Bang Khun Tian', '021231234', 7, '10.00-22.00');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `Discount_ID` varchar(32) NOT NULL,
  `Discount_detail` varchar(256) NOT NULL,
  `Discount_Fee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`Discount_ID`, `Discount_detail`, `Discount_Fee`) VALUES
('Dummy', 'N/A', 0),
('gd', 'None', 10),
('pt', 'None', 20),
('sl', 'None', 5);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` varchar(32) NOT NULL,
  `Member_NO` int(6) NOT NULL,
  `First_Name` varchar(64) NOT NULL,
  `Last_Name` varchar(64) NOT NULL,
  `Tel` varchar(32) NOT NULL,
  `Member_Address` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `ID_NO` varchar(32) NOT NULL,
  `Discount_ID` varchar(32) NOT NULL,
  `Member_Exp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Member_NO`, `First_Name`, `Last_Name`, `Tel`, `Member_Address`, `Email`, `ID_NO`, `Discount_ID`, `Member_Exp`) VALUES
('gd000003', 3, 'Boat', 'naja', '+66876543210', 'home', 'boat@gmail.com', '1000000000002', 'gd', '2022-05-02'),
('gd000005', 5, 'Thanapat', 'Jaipram', '+66887810514', '888/122 The Parque condo à¸–ฟหกà¸™à¸™à¸žà¸¸à¸—à¸˜à¸šà¸¹à¸Šà¸² à¹à¸‚à¸§à¸‡à¸šà¸²à¸‡à¸¡à¸”à¹€à¸‚à¸•à¸—à¸¸à¹ˆà¸‡à¸„à¸£à¸¸ 10140', 'Thanapat.24@mail.kmutt.ac.th', '1000000000010', 'gd', '2022-05-09'),
('gd000007', 7, 'aa', 'bb', '897654321', 'qw', '', '1231231231236', 'gd', '2022-06-02'),
('gd000009', 9, 'ax', 'ax', '987654321', '123', 'a@gmail.com', '1231231231237', 'gd', '2022-06-02'),
('gd000010', 10, 'test10', 'ax', '987654321', '123', 'a@gmail.com', '1231231231235', 'gd', '2022-06-02'),
('gd000014', 14, 'A', 'Teddy', '893333333', '123', 'a.teddy@gmail.com', '1231231231287', 'gd', '2022-06-04'),
('gd000015', 15, 'ads', 'asdf', '0876543219', '123', 'a.teddy@gmail.com', '1231231231209', 'gd', '2022-06-05'),
('gd000020', 20, 'Here', 'Here', '0987654321', 'Here', 'Here@Here', '9999999999998', 'gd', '2022-06-06'),
('gd000023', 23, 'asd', 'asd', '0987654321', 'asd', 'asd@321', '1234567890322', 'gd', '2022-06-06'),
('gd000027', 27, 'FinalTest', 'FinalTest', '0236541523', 'FinalTest', 'FinalTest@FinalTest', '1100401036524', 'gd', '2022-06-07'),
('ki000001', 0, 'Kiosk', 'Dummy', 'Undefined', 'Undefined', 'Undefined', 'Undefined', 'Dummy', '2100-01-01'),
('pt000001', 1, 'Golf', 'za', '+66887810513', 'Home', 'Gq@hotmail.com', '1234567890123', 'pt', '2022-05-01'),
('pt000004', 4, 'Danny', 'Eiei', '+66876543211', 'Home', 'danny@gmail.com', '1000000000005', 'pt', '2022-05-02'),
('pt000006', 6, 'abc', 'dee', '899999999', '175/14', 'thanapat2402@gmail.com', '1231231231231', 'pt', '2022-06-02'),
('pt000008', 8, 'asd', 'asd', '897654321', '123', 't@gmail.com', '1231231231234', 'pt', '2022-06-02'),
('pt000011', 11, 'test11', 'aa', '987654321', '1', '1@a', '1231231231212', 'pt', '2022-06-02'),
('pt000012', 12, 'test11', 'asd', '987654321', '1', 'a@gmail.com', '1231231231290', 'pt', '2022-06-02'),
('pt000013', 13, 'test12', 'test12', '987654321', '123', 'a@e.com', '1231231231789', 'pt', '2022-06-02'),
('pt000016', 18, 'test15', '123', '0899999999', '123', 'thanapat2402@gmail.com', '1231231231207', 'pt', '2022-06-05'),
('pt000021', 21, ' Your ', ' Your ', '1234567890', ' Your ', 'Your@Your', '1234567890098', 'pt', '2022-06-06'),
('pt000022', 22, 'Please', 'Please', '0987654321', 'Please', 'Please@Please', '1000000000045', 'pt', '2022-06-06'),
('pt000026', 26, 'Phone', 'Phone', '0987654321', 'Phone', 'Phone@Phone', '1121111111111', 'pt', '2022-06-06'),
('sl000002', 2, 'A', 'Teddy', '+66893333333', '123', 'a.teddy@gmail.com', '1000000000001', 'sl', '2022-05-02'),
('sl000019', 19, 'Here', 'Here', '0987654321', 'Here', 'Here@Here', '1234567890122', 'sl', '2022-06-06'),
('sl000024', 24, 'Information', 'Information', '0987654321', 'Information', 'Information@a', '1000005000005', 'sl', '2022-06-06'),
('sl000025', 25, 'Phone', 'Phone', '0987654321', 'Phone', 'Phone@Phone', '1111111111123', 'sl', '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Movie_ID` int(5) NOT NULL,
  `Movie_Name` char(64) NOT NULL,
  `Movie_Image` char(100) NOT NULL,
  `Date_In` char(64) NOT NULL,
  `Date_Out` char(64) NOT NULL,
  `Movie_Duration` int(32) NOT NULL,
  `Movie_Rating` double NOT NULL,
  `Movie_Fund` double NOT NULL,
  `Rating_Age` int(32) NOT NULL,
  `Movie_status` int(1) NOT NULL,
  `Movie_Description` varchar(600) NOT NULL,
  `Movie_Trailer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Movie_ID`, `Movie_Name`, `Movie_Image`, `Date_In`, `Date_Out`, `Movie_Duration`, `Movie_Rating`, `Movie_Fund`, `Rating_Age`, `Movie_status`, `Movie_Description`, `Movie_Trailer`) VALUES
(1, 'GEOSTORM', 'test.jpg', '2021-05-10', '2021-05-17', 60, 4.8, 89, 5, 1, 'When the network of satellites designed to control the global climate starts to attack Earth, it\'s a race against the clock for its creator to uncover the real threat before a worldwide Geostorm wipes out everything and everyone.', 'v=raUghGHrSTg'),
(2, 'Fast and Furious 7', 'test2.jpg', '12345', '1234', 90, 4.2, 40, 12, 1, 'The sins of the past seem to be catching up with Dominic Toretto, Brian O\'Conner and his crew, when Deckard Shaw shows up to seek revenge for the travails of his younger brother. When a young unknown hacker who claims to have developed \'God\'s Eye\' is also thrown into the mix, things go haywire, and Toretto and his crew need to save the hacker and also settle their scores with Shaw.\r\n\r\n', 'v=GKjWNsicFUM'),
(3, 'Mission impossible', 'test3.jpg', '2021-5-12', '2021-05-19', 90, 5, 33, 12, 1, 'Two years after Ethan Hunt had successfully captured Solomon Lane, the remnants of the Syndicate have reformed into another organization called the Apostles. Under the leadership of a mysterious fundamentalist known only as John Lark, the organization is planning on acquiring three plutonium cores. Ethan and his team are sent to Berlin to intercept them, but the mission fails when Ethan saves Luther and the Apostles escape with the plutonium. With CIA agent August Walker joining the team, Ethan and his allies must now find the plutonium cores before it\'s too late.', 'v=wb49-oV0F78'),
(6, 'Godzilla vs. Kong', 'test4.jpg', '2021-06-04', '2021-06-12', 120, 3, 123, 20, 1, 'Legends collide as Godzilla and Kong, the two most powerful forces of nature, clash on the big screen in a spectacular battle for the ages. As a squadron embarks on a perilous mission into fantastic uncharted terrain, unearthing clues to the Titans\' very origins and mankind\'s survival, a conspiracy threatens to wipe the creatures, both good and bad, from the face of the earth forever.', 'v=odM92ap8_c0'),
(7, 'Sultan 2020', 'test6.jpg', '2021-06-01', '2021-06-01', 90, 5, 100, 20, 1, 'Vikram a.k.a. Sulthan, (Karthi) a motherless child is raised by a group of hardened criminals who work for his father Sethupathi. He loves these 100 men as brothers but despises their taste for violence. Following the death of his father, the responsibility to take care of these men falls on the shoulders of Sulthan. That is when he decides to transform them and teach them to live as civilized people. It is a Herculean task, but the loyalty and the love that these men have towards him, gives Sulthan a fighting chance.', 'v=hF3Cw6i6gqI'),
(8, 'Riam Fighting Angel', 'test5.jpg', '2021-06-04', '2021-06-12', 120, 5, 55, 10, 1, 'After her darling family got kidnapped by group of brutal gangsters, with the objective of forcing her to marry their boss, so Riam has to find the way to rescue her family members and to get herself out from this crazy / deadly circumstance.', 'v=wAi5w9k6v5E');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(6) NOT NULL,
  `Member_ID` varchar(32) NOT NULL,
  `Payment_method` varchar(32) NOT NULL,
  `Amount_Paid` double NOT NULL,
  `Payment_Date` datetime NOT NULL,
  `Description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Member_ID`, `Payment_method`, `Amount_Paid`, `Payment_Date`, `Description`) VALUES
(25, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(26, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(27, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(28, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(29, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(30, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(31, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(32, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(33, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(34, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(35, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(36, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(37, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(38, 'ki000001', 'Cash', 0, '0000-00-00 00:00:00', 'Product'),
(39, 'ki000001', 'Cash', 300, '0000-00-00 00:00:00', 'Product'),
(40, 'ki000001', 'Cash', 300, '0000-00-00 00:00:00', 'Product'),
(41, 'ki000001', 'Cash', 300, '0000-00-00 00:00:00', 'Product'),
(42, 'ki000001', 'Credit', 300, '2021-06-06 11:04:57', 'Product'),
(43, 'ki000001', 'Credit', 1500, '2021-06-06 23:06:37', 'Product'),
(44, 'ki000001', 'Cash', 30, '2021-07-06 02:24:19', 'Product'),
(45, 'ki000001', 'Cash', 70, '2021-07-06 02:42:11', 'Product'),
(46, 'ki000001', 'Cash', 90, '2021-07-06 02:42:25', 'Product'),
(47, 'ki000001', 'Cash', 150, '2021-07-06 02:56:20', 'Product'),
(48, 'pt000001', 'Cash', 496, '2021-06-07 03:15:09', ''),
(81, 'gd000027', 'Cash', 200, '2021-07-06 12:03:00', 'Register'),
(82, 'pt000001', 'Credit Card', 360, '2021-06-07 12:04:07', ''),
(83, 'ki000001', 'Credit', 610, '2021-07-06 12:04:37', 'Product'),
(84, 'ki000001', 'Cash', 30, '2021-07-06 12:05:34', 'Product'),
(85, 'ki000001', 'Credit', 200, '2021-07-06 12:06:48', 'Product'),
(86, 'pt000001', 'Credit Card', 336, '2021-06-07 13:17:02', ''),
(87, 'sl000002', 'Cash', 247, '2021-06-07 13:24:57', ''),
(88, 'pt000001', 'Credit Card', 392, '2021-06-07 13:30:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(32) NOT NULL,
  `Product_Count` int(6) NOT NULL,
  `Price` int(6) NOT NULL,
  `Product_Type` varchar(32) NOT NULL,
  `Branch_ID` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`Product_ID`, `Product_Name`, `Product_Count`, `Price`, `Product_Type`, `Branch_ID`) VALUES
(1, 'sCola', 9999, 30, 'cola', '0001'),
(2, 'mCola', 10000, 50, 'cola', '0001'),
(3, 'lCola', 9999, 70, 'cola', '0001'),
(4, 'sPop', 9999, 30, 'popcorn', '0001'),
(5, 'mPop', 10000, 50, 'popcorn', '0001'),
(6, 'lPop', 9999, 70, 'popcorn', '0001'),
(7, 'sCola', 10000, 30, 'cola', '0002'),
(8, 'mCola', 10000, 50, 'cola', '0002'),
(9, 'lCola', 10000, 70, 'cola', '0002'),
(10, 'sPop', 10000, 30, 'popcorn', '0002'),
(11, 'mPop', 10000, 50, 'popcorn', '0002'),
(12, 'lPop', 10000, 70, 'popcorn', '0002'),
(13, 'sCola', 10000, 30, 'cola', '0003'),
(14, 'mCola', 10000, 50, 'cola', '0003'),
(15, 'lCola', 10000, 70, 'cola', '0003'),
(16, 'sPop', 10000, 30, 'popcorn', '0003'),
(17, 'mPop', 10000, 50, 'popcorn', '0003'),
(18, 'lPop', 10000, 70, 'popcorn', '0003');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `Seat_Number` varchar(32) NOT NULL,
  `Seat_Type` varchar(32) NOT NULL,
  `Theater_ID` varchar(32) NOT NULL,
  `Seat_Status` int(1) NOT NULL,
  `Showtime_ID` int(11) NOT NULL,
  `Seat_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`Seat_Number`, `Seat_Type`, `Theater_ID`, `Seat_Status`, `Showtime_ID`, `Seat_ID`) VALUES
('3', 'Premium', '00010001', 1, 1, 1),
('12', 'Premium', '00010002', 1, 2, 2),
('3', 'Premium', '00010002', 1, 1, 3),
('21', 'Premium', '00010001', 1, 1, 4),
('68', 'Regular', '00010001', 1, 2, 5),
('56', 'Regular', '00010001', 1, 2, 6),
('46', 'Premium', '00010001', 1, 2, 7),
('19', 'Luxury', '00010001', 1, 2, 8),
('34', 'Premium', '00010001', 1, 2, 9),
('24', 'Premium', '00010001', 1, 2, 10),
('79', 'Regular', '00010001', 1, 1, 11),
('44', 'Premium', '00010001', 1, 1, 12),
('34', 'Premium', '00010001', 1, 1, 13),
('63', 'Regular', '00030003', 1, 9, 14),
('55', 'Regular', '00030003', 1, 9, 15),
('44', 'Premium', '00030003', 1, 9, 16),
('67', 'Regular', '00030003', 1, 9, 17),
('66', 'Regular', '00030003', 1, 9, 18),
('80', 'Regular', '00010002', 1, 2, 19),
('41', 'Premium', '00010002', 1, 2, 20),
('7', 'Luxury', '00010002', 1, 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `seatprice`
--

CREATE TABLE `seatprice` (
  `Seat_Type` varchar(32) NOT NULL,
  `Seat_Price` int(4) NOT NULL,
  `SeatType_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seatprice`
--

INSERT INTO `seatprice` (`Seat_Type`, `Seat_Price`, `SeatType_ID`) VALUES
('Luxury', 200, 3),
('Premium', 160, 2),
('Regular', 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `Showtime_ID` int(5) NOT NULL,
  `Movie_ID` int(5) NOT NULL,
  `Theater_ID` varchar(32) NOT NULL,
  `Showtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`Showtime_ID`, `Movie_ID`, `Theater_ID`, `Showtime`) VALUES
(1, 1, '00010001', '12:00:00'),
(2, 1, '00010002', '16:00:00'),
(3, 2, '00010002', '15:00:00'),
(4, 3, '00020001', '15:00:00'),
(5, 6, '00020001', '13:00:00'),
(6, 7, '00030001', '10:00:00'),
(7, 8, '00030002', '13:00:00'),
(8, 8, '00030002', '17:00:00'),
(9, 3, '00030003', '11:00:00'),
(10, 2, '00030004', '13:00:00'),
(11, 2, '00030004', '16:00:00'),
(12, 2, '00030004', '19:00:00'),
(13, 6, '00030005', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Role` varchar(32) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Branch_ID` varchar(32) NOT NULL,
  `Firstname` varchar(64) NOT NULL,
  `Lastname` varchar(64) NOT NULL,
  `ID_NO` varchar(13) NOT NULL,
  `Staff_Tel` varchar(32) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Staff_DoB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Password`, `Role`, `Salary`, `Branch_ID`, `Firstname`, `Lastname`, `ID_NO`, `Staff_Tel`, `Address`, `Staff_DoB`) VALUES
(1, '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 20000, '0001', 'Thanapat', 'Jaipram', '1', '0911234567', 'home', '1999-02-24'),
(2, '81dc9bdb52d04dc20036dbd8313ed055', 'Kiosk', 6000, '0001', 'anajaeiei', 'teddy', '12', '0911234565', 'a', '2021-02-14'),
(3, 'ec6a6536ca304edf844d1d248a4f08dc', 'Ticket_Saleman', 7000, '0001', 'Boat', 'Muttha', '1231231231', '091123456', 'boat\'home asd', '2021-06-02'),
(5, '81dc9bdb52d04dc20036dbd8313ed055', 'Theater_Staff', 10000, '0001', 'Anaja', 'Teddy', 'test123', '+10893333333', '123', '2021-05-30'),
(7, '81dc9bdb52d04dc20036dbd8313ed055', 'Theater_Staff', 8000, '0001', 'facebook2', 'asd', 'test123', '0887810514', 'asd', '2021-05-31'),
(8, '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 9000, '0003', 'facebook3', 'asd', 'test123', '0887810514', 'asd', '2021-05-31'),
(9, '81dc9bdb52d04dc20036dbd8313ed055', 'Kiosk', 10000, '0002', 'facebook7', 'asd', 'test123', '0887810514', 'asd', '2021-05-31'),
(18, '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 18000, '0001', 'asd', 'asd', 'test123', '0987654321', 'asd', '2021-06-06'),
(30, '81dc9bdb52d04dc20036dbd8313ed055', 'Kiosk', 8000, '0001', 'asdasd', 'fgdfgdfgdf', '1133333456789', '0541233145', 'sdasd', '2021-06-17'),
(31, '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 12000, '0002', 'hgbfd', 'bfgbfg', '4211455565467', '0999999999', 'sdfsf', '2017-06-14'),
(33, '81dc9bdb52d04dc20036dbd8313ed055', 'Ticket_Saleman', 12000, '0001', 'asdasd', 'fgdfgdfgdf', '1133333456789', '0541233145', 'sdasd', '2021-06-17'),
(34, '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 15000, '0002', 'hgbfd', 'bfgbfg', '4211455565467', '0999999999', 'sdfsf', '2017-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `Theater_ID` varchar(32) NOT NULL,
  `Movie_ID` int(5) NOT NULL,
  `Branch_ID` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`Theater_ID`, `Movie_ID`, `Branch_ID`) VALUES
('00010001', 1, '0001'),
('00010002', 2, '0001'),
('00010003', 3, '0001'),
('00010004', 2, '0001'),
('00020001', 3, '0002'),
('00020002', 1, '0002'),
('00020003', 2, '0002'),
('00030001', 7, '0003'),
('00030002', 3, '0003'),
('00030003', 7, '0003'),
('00030004', 2, '0003'),
('00030005', 1, '0003');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Transaction_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `PaymentID` int(6) NOT NULL,
  `Product_Count` int(6) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Transaction_ID`, `Product_ID`, `PaymentID`, `Product_Count`, `Timestamp`) VALUES
(1, 1, 25, 1, '2021-06-06 10:15:28'),
(2, 1, 27, 1, '2021-06-06 10:18:06'),
(3, 1, 37, 1, '2021-06-06 10:46:17'),
(4, 1, 38, 1, '2021-06-06 10:50:33'),
(5, 4, 38, 1, '2021-06-06 10:50:33'),
(6, 5, 38, 1, '2021-06-06 10:50:33'),
(7, 6, 38, 1, '2021-06-06 10:50:33'),
(8, 1, 39, 1, '2021-06-06 10:53:30'),
(9, 2, 39, 1, '2021-06-06 10:53:30'),
(10, 3, 39, 1, '2021-06-06 10:53:30'),
(11, 4, 39, 1, '2021-06-06 10:53:30'),
(12, 5, 39, 1, '2021-06-06 10:53:30'),
(13, 6, 39, 1, '2021-06-06 10:53:30'),
(14, 7, 40, 1, '2021-06-06 10:57:10'),
(15, 8, 40, 1, '2021-06-06 10:57:10'),
(16, 9, 40, 1, '2021-06-06 10:57:10'),
(17, 10, 40, 1, '2021-06-06 10:57:10'),
(18, 11, 40, 1, '2021-06-06 10:57:10'),
(19, 12, 40, 1, '2021-06-06 10:57:10'),
(20, 7, 41, 1, '2021-06-06 10:59:23'),
(21, 8, 41, 1, '2021-06-06 10:59:23'),
(22, 9, 41, 1, '2021-06-06 10:59:23'),
(23, 10, 41, 1, '2021-06-06 10:59:23'),
(24, 11, 41, 1, '2021-06-06 10:59:23'),
(25, 12, 41, 1, '2021-06-06 10:59:23'),
(26, 7, 42, 1, '2021-06-06 11:04:57'),
(27, 8, 42, 1, '2021-06-06 11:04:57'),
(28, 9, 42, 1, '2021-06-06 11:04:57'),
(29, 10, 42, 1, '2021-06-06 11:04:57'),
(30, 11, 42, 1, '2021-06-06 11:04:57'),
(31, 12, 42, 1, '2021-06-06 11:04:57'),
(32, 7, 43, 10, '2021-06-06 23:06:37'),
(33, 8, 43, 10, '2021-06-06 23:06:37'),
(34, 9, 43, 10, '2021-06-06 23:06:37'),
(35, 1, 44, 1, '2021-07-06 02:24:19'),
(36, 3, 45, 1, '2021-07-06 02:42:11'),
(37, 3, 46, 1, '2021-07-06 02:42:25'),
(38, 1, 46, 3, '2021-07-06 02:55:27'),
(39, 2, 47, 3, '2021-07-06 02:56:20'),
(40, 1, 83, 2, '2021-07-06 12:04:37'),
(41, 2, 83, 5, '2021-07-06 12:04:37'),
(42, 3, 83, 3, '2021-07-06 12:04:37'),
(43, 4, 83, 1, '2021-07-06 12:04:37'),
(44, 5, 83, 1, '2021-07-06 12:04:37'),
(45, 6, 83, 1, '2021-07-06 12:04:37'),
(46, 4, 84, 1, '2021-07-06 12:05:34'),
(47, 1, 85, 1, '2021-07-06 12:06:48'),
(48, 3, 85, 1, '2021-07-06 12:06:48'),
(49, 4, 85, 1, '2021-07-06 12:06:48'),
(50, 6, 85, 1, '2021-07-06 12:06:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_ID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`Discount_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`),
  ADD KEY `FK` (`Discount_ID`) USING BTREE;

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Movie_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `FK` (`Member_ID`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`Seat_ID`),
  ADD KEY `Theater_ID` (`Theater_ID`),
  ADD KEY `Seat_Type` (`Seat_Type`) USING BTREE,
  ADD KEY `Showtime_ID` (`Showtime_ID`);

--
-- Indexes for table `seatprice`
--
ALTER TABLE `seatprice`
  ADD PRIMARY KEY (`Seat_Type`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`Showtime_ID`),
  ADD KEY `Movie_ID` (`Movie_ID`),
  ADD KEY `Theater_ID` (`Theater_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`Theater_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `PaymentID` (`PaymentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `Movie_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `Seat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `Showtime_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `Discount_ID` FOREIGN KEY (`Discount_ID`) REFERENCES `discount` (`Discount_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`);

--
-- Constraints for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD CONSTRAINT `product_stock_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `F` FOREIGN KEY (`Seat_Type`) REFERENCES `seatprice` (`Seat_Type`),
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`Theater_ID`) REFERENCES `theater` (`Theater_ID`),
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`Showtime_ID`) REFERENCES `showtime` (`Showtime_ID`);

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `showtime_ibfk_1` FOREIGN KEY (`Movie_ID`) REFERENCES `movie` (`Movie_ID`),
  ADD CONSTRAINT `showtime_ibfk_2` FOREIGN KEY (`Theater_ID`) REFERENCES `theater` (`Theater_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `theater_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`Payment_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
