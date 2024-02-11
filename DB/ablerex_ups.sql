-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2023 at 08:12 PM
-- Server version: 10.5.21-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ablerex_ups`
--
CREATE DATABASE IF NOT EXISTS `ablerex_ups` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ablerex_ups`;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `d_id` int(8) NOT NULL COMMENT 'ไอดีออโต้',
  `d_upsname` varchar(255) NOT NULL COMMENT 'ชื่อUPS',
  `d_model` varchar(255) NOT NULL COMMENT 'ชื่อรุ่นUPS',
  `d_company` varchar(255) NOT NULL COMMENT 'ชื่อบริษัทหรือหน่วยงาน',
  `d_token` varchar(255) NOT NULL COMMENT 'โทเคน',
  `d_location` varchar(255) NOT NULL COMMENT 'สถานที่ตั้ง',
  `d_remark` text NOT NULL COMMENT 'หมายเหตุ',
  `d_record` datetime NOT NULL COMMENT 'วันเวลาที่บันทึก',
  `d_idemp` int(8) NOT NULL COMMENT 'พนักงานบันทึกข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`d_id`, `d_upsname`, `d_model`, `d_company`, `d_token`, `d_location`, `d_remark`, `d_record`, `d_idemp`) VALUES
(1, 'upsname', '650LS', 'ABC Company', 'abc1234', 'อุดรธานี', 'หมายเหตุ', '2023-11-13 13:42:33', 1),
(2, '800Name', '800LS', 'Rich Company', '59ea299e164979037a0eaa543baf3da60360480040973a66', 'ขอนแก่น', '--', '2023-11-14 17:41:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(11) NOT NULL COMMENT 'ไอดี',
  `input_voltage` float(6,2) DEFAULT NULL COMMENT 'แรงดันไฟฟ้าขาเข้า',
  `output_voltage` float(6,2) DEFAULT NULL COMMENT 'แรงดันไฟฟ้าขาออก',
  `input_frequency` float(6,2) DEFAULT NULL COMMENT 'ระดับความถี่ไฟขาเข้า',
  `ups_temperature` float(6,2) DEFAULT NULL COMMENT 'ระดับอุณหภูมิในตัว ups',
  `battery_charge` float(6,2) DEFAULT NULL COMMENT 'ระดับความจุแบตเตอรี่',
  `output_load` float(6,2) DEFAULT NULL COMMENT 'ระดับการใช้ไฟฟ้า',
  `battery_voltage` float(6,2) DEFAULT NULL COMMENT 'ระดับแรงดันของแบตเตอรี่',
  `ac_indicator` varchar(200) DEFAULT NULL COMMENT 'การเชื่อมต่อไฟ AC',
  `ups_connection` varchar(200) DEFAULT NULL COMMENT 'สถานะการเชื่อมต่อupsกับbox',
  `temp_room` float(6,2) DEFAULT NULL COMMENT 'อุณหภูมิห้อง',
  `humid_room` float(6,2) DEFAULT NULL COMMENT 'ความชื้นห้อง',
  `device_id` varchar(100) NOT NULL,
  `recordwhen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `input_voltage`, `output_voltage`, `input_frequency`, `ups_temperature`, `battery_charge`, `output_load`, `battery_voltage`, `ac_indicator`, `ups_connection`, `temp_room`, `humid_room`, `device_id`, `recordwhen`) VALUES
(1, 234.40, 234.10, 49.90, 25.00, 100.00, 22.00, 13.60, 'OL', '1', 25.00, 67.00, '2', '2023-11-14 17:58:56'),
(2, 234.40, 234.50, 49.90, 25.00, 100.00, 55.00, 13.60, 'OL', '1', 29.00, 60.00, '1', '2023-11-14 18:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `o_id` int(8) NOT NULL,
  `o_name` varchar(200) NOT NULL,
  `o_phone` varchar(200) NOT NULL,
  `o_address` text NOT NULL,
  `o_usr` varchar(200) NOT NULL,
  `o_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`o_id`, `o_name`, `o_phone`, `o_address`, `o_usr`, `o_pwd`) VALUES
(1, 'admin', '089555xxxx', 'bangkok', 'admin01', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_token` (`d_token`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `d_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีออโต้', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `o_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
