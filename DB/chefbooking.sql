-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 06:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chefbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(18, 'Firos', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `booking_fordate` varchar(100) NOT NULL,
  `booking_amount` int(100) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_fordate`, `booking_amount`, `booking_status`, `user_id`, `chef_id`) VALUES
(17, '2023-11-04', '', 0, 0, 13, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(4, 'korean'),
(5, 'Indian'),
(6, 'Chineese'),
(7, 'French'),
(8, 'Spanish'),
(9, 'Arabic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chef`
--

CREATE TABLE `tbl_chef` (
  `chef_id` int(100) NOT NULL,
  `chef_name` varchar(30) NOT NULL,
  `chef_email` varchar(30) NOT NULL,
  `chef_password` varchar(30) NOT NULL,
  `chef_address` varchar(50) NOT NULL,
  `chef_contact` varchar(30) NOT NULL,
  `chef_photo` varchar(255) NOT NULL,
  `chef_vstatus` int(11) NOT NULL DEFAULT 0,
  `chef_proof` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chef`
--

INSERT INTO `tbl_chef` (`chef_id`, `chef_name`, `chef_email`, `chef_password`, `chef_address`, `chef_contact`, `chef_photo`, `chef_vstatus`, `chef_proof`, `place_id`) VALUES
(17, 'Saeed ', 'saeed898@gmail.com', 'saeedika', 'Oonnukal P O Pareekanni', '7810785695', '', 1, '', 24),
(18, 'Ansal Aluva', 'ansal898@gmail.com', 'ansalikka', 'Aluva PO Aluva', '9564534221', '', 1, '', 31),
(19, 'Ansif kovalloor', 'ansif898@gmail.com', 'ansifikka', 'kovalloor P O kovalloor', '9564534221', '', 1, '', 24),
(20, 'Meenkashi', 'meen898@gmail.com', 'meenikki', 'Thudupuzha', '9564534221', '', 2, '', 22),
(21, '63969', '', '', '', '', '', 0, '', 0),
(22, 'uoy585', '', '', '', '', '', 0, '', 0),
(23, 'Swift', 'swift@gmail.com', 'hehehe', 'Thekady', '9564534221', '', 2, '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(100) NOT NULL,
  `chef_id` int(100) NOT NULL,
  `complaint_title` varchar(30) NOT NULL,
  `complaint_content` varchar(200) NOT NULL,
  `complaint_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_reply` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `chef_id`, `complaint_title`, `complaint_content`, `complaint_date`, `user_id`, `complaint_reply`) VALUES
(1, 16, 'Hai', 'sugano', '2023-10-27', 11, 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(100) NOT NULL,
  `district_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(19, 'Idukki'),
(20, 'Ernakulam'),
(21, 'kannur'),
(22, 'Kozhikode'),
(23, 'kollam'),
(24, 'Kasargod'),
(25, 'Kottayam'),
(26, 'Thrissur'),
(27, 'Pathanamthitta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `food_id` int(100) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `foodtype_id` int(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `food_name`, `foodtype_id`, `category_id`) VALUES
(3, 'kimchi pancakes', 8, 4),
(4, 'Chicken Biriyani', 9, 4),
(5, 'Chicken Kuzhimandhi', 9, 9),
(6, 'Beef Biriyani', 9, 5),
(7, 'Alfaham', 9, 9),
(8, 'Noodles', 8, 6),
(9, 'Chicken Noodles', 9, 6),
(10, 'Laddu', 12, 5),
(11, 'Falooda', 12, 5),
(12, 'Gulab Jam', 12, 5),
(13, 'Lime Juice', 13, 5),
(14, 'Mojito', 13, 5),
(15, 'Shakes', 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodcart`
--

CREATE TABLE `tbl_foodcart` (
  `foodcart_id` int(100) NOT NULL,
  `booking_id` int(100) NOT NULL,
  `menu_id` int(100) NOT NULL,
  `foodcart_qty` int(200) NOT NULL DEFAULT 1,
  `foodcart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_foodcart`
--

INSERT INTO `tbl_foodcart` (`foodcart_id`, `booking_id`, `menu_id`, `foodcart_qty`, `foodcart_status`) VALUES
(17, 17, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodtype`
--

CREATE TABLE `tbl_foodtype` (
  `foodtype_id` int(100) NOT NULL,
  `foodtype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_foodtype`
--

INSERT INTO `tbl_foodtype` (`foodtype_id`, `foodtype_name`) VALUES
(8, 'Veg'),
(9, 'Non Veg'),
(12, 'Deserts'),
(13, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(100) NOT NULL,
  `chef_id` int(100) NOT NULL,
  `food_id` int(100) NOT NULL,
  `menu_rate` int(200) NOT NULL,
  `menu_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `chef_id`, `food_id`, `menu_rate`, `menu_photo`) VALUES
(5, 17, 5, 150, 'kuzhimandhi.png'),
(6, 18, 9, 200, 'noodles.png'),
(7, 19, 12, 5, 'Gulab_jam'),
(8, 19, 14, 100, 'mojito.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(100) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(22, 'Thodupuzha', 19),
(24, 'Kothamangalam', 20),
(25, 'Muvatupuzha', 20),
(26, 'Kattappady', 20),
(27, 'Adimali', 19),
(28, 'Perumbavoor', 20),
(29, 'Munnar', 19),
(30, 'Wagamon', 19),
(31, 'Aluva', 20),
(32, 'Mittay Theriv', 22),
(33, 'Chalakudy', 26),
(34, 'Kalamassery', 20),
(35, 'Neriamangalam', 19),
(36, 'Kuttaampuzha', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `chef_id`, `user_review`, `user_rating`, `user_name`) VALUES
(1, '2023-10-27 07:21:25', 16, 'Good Food', '5', 'Nandu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_contact` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_address`, `place_id`, `user_photo`) VALUES
(13, 'Dulquer Salmaan', 'dqorginal@gmail.com', '7810785695', 'dqikkichi', 'kotha', 31, ''),
(14, 'Vijayan', 'vijumessi898@gmail.com', '9564534221', 'vijuikki', 'Mavudy', 24, ''),
(15, 'Basil Kottappady', 'basilbas898@gmail.com', '7810785695', 'basiliki', 'Kottappady', 26, ''),
(16, 'dqorginal@gmail.com', '', '', '', '', 0, ''),
(17, '25', 'garou@gmail.com', '7810785695', '', '5u4k5ykimik', 0, ''),
(18, '56398', '', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chef`
--
ALTER TABLE `tbl_chef`
  ADD PRIMARY KEY (`chef_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `tbl_foodcart`
--
ALTER TABLE `tbl_foodcart`
  ADD PRIMARY KEY (`foodcart_id`);

--
-- Indexes for table `tbl_foodtype`
--
ALTER TABLE `tbl_foodtype`
  ADD PRIMARY KEY (`foodtype_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_chef`
--
ALTER TABLE `tbl_chef`
  MODIFY `chef_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `food_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_foodcart`
--
ALTER TABLE `tbl_foodcart`
  MODIFY `foodcart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_foodtype`
--
ALTER TABLE `tbl_foodtype`
  MODIFY `foodtype_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
