-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2019 at 02:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `describe` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `describe`) VALUES
(1, 'MSI', 'MSI, short for Micro-Star International, is a multinational technology company headquartered in Xinbei, Taiwan. Founded in 1986, MSI has been present in more than 120 countries across the continent, famous for its hardware products including: motherboard, graphics card, gaming laptop, server ...\r\nIn 2015, MSI laptop received a rating of 4 among the best quality laptop brands in the world, including product quality, design, support services, software ...'),
(2, 'ASUS', NULL),
(3, 'HP', NULL),
(4, 'DELL', 'Dell is an American multinational computer technology company based in Round Rock, Texas, United States, that develops, sells, repairs, and supports computers and related products and services. Named after its founder, Michael Dell, the company is one of the largest technological corporations in the world, employing more than 145,000 people in the U.S. and around the world (Annual report 2018).\r\nDell sells personal computers (PCs), servers, data storage devices, network switches, software, computer peripherals, HDTVs, cameras, printers, MP3 players, and electronics built by other manufacturers. The company is well known for its innovations in supply chain management and electronic commerce, particularly its direct-sales model and its \"build-to-order\" or \"configure to order\" approach to manufacturing—delivering individual PCs configured to customer specifications. Dell was a pure hardware vendor for much of its existence, but with the acquisition in 2009 of Perot Systems, Dell entered the market for IT services. The company has since made additional acquisitions in storage and networking systems, with the aim of expanding their portfolio from offering computers only to delivering complete solutions for enterprise customers.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Opinion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_id`, `Name`, `Email`, `Subject`, `Opinion`) VALUES
(1, 'as', 'jiawei.4127@gmail.com', 'df', 'ádfghjk'),
(2, 'name', 'lehieu123@gmail.com', 'subject contact', 'contact content'),
(3, 'asdasd', 'fgdfg@gmail.com', 'fgd', 'lkjlkjsdlgkfjsldf');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `idbrands` int(11) DEFAULT NULL,
  `price` varchar(256) NOT NULL,
  `specification` varchar(256) DEFAULT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `name`, `idbrands`, `price`, `specification`, `img`) VALUES
(1, 'MSI GT75 Titan 17', 1, '4,299.98', '{\"VGA\":\"NVIDIA GeForce RTX 2080 8GB GDDR6\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i9 9980HK 8 Core 14 Threads 2.4 GHz - 5.0 GHz\",\"HW\":\"HDD 1TB - SSD 128GB\",\"model\":\"GT75 Titan 9SG-294\",\"display\":\"17.3\",\"weight\":\"4.6\"}', '[\"imglaptop/1.1.jpg\",\"imglaptop/1.2 .jpg\",\"imglaptop/1.3.jpg\",\"imglaptop/1.4.jpg\"]'),
(2, 'Alienware ALW17', 4, '2,199.99', '{\"VGA\":\"NVIDIA GeForce GTX 860M\",\"Ram\":\"8 GB DDR3L SDRAM\",\"CPU\":\"2.5 GHz Intel Core i7\",\"HW\":\"2.5 GHz Intel Core i7\",\"model\":\"ALW17-5312sLV\",\"display\":\"17.3\",\"weight\":\"15.9 pounds\"}', '[\"imglaptop/dell1.1.1.jpg\",\"imglaptop/dell1.2.jpg\",\"imglaptop/dell1.3.jpg\",\"imglaptop/dell1.4.jpg\"]'),
(3, 'MSI GS75 Stealth 17', 1, '3,399.98', '{\"VGA\":\"NVIDIA GeForce RTX 2080 8GB GDDR6\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 9750H 6 Core 12 Threads 2.6 GHz - 4.5 GHz\",\"HW\":\"SSD 1024 (512 x2 in RAID) GB\",\"model\":\"GS75 Stealth 9SG-415\",\"display\":\"17.3\",\"weight\":\"4.6\"}', '[\"imglaptop/3.1.jpg\",\"imglaptop/3.2.jpg\",\"imglaptop/3.3.jpg\",\"imglaptop/3.4.jpg\"]'),
(4, 'MSI GT75 Titan 17', 1, '3,498.98', '{\"VGA\":\"NVIDIA GeForce RTX 2080 8GB GDDR6\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 9750H 6 Core 12 Threads 2.6 GHz - 4.5 GHz\",\"HW\":\" SSD (M.2 PCIe NVMe) 512GB & HDD (SATA) 1TB\",\"model\":\"GT75 Titan 9SG-296\",\"display\":\"17.3\",\"weight\":\"4.56kg\"}', '[\"imglaptop/2.1.jpg\",\"imglaptop/2.2.jpg\",\"imglaptop/2.3.jpg\",\"imglaptop/2.4.jpg\"]'),
(5, 'MSI GE65 Raider 15', 1, '2,098.99', '{\"VGA\":\"NVIDIA GeForce GTX 860M\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 9750H  2.6 GHz - 4.5 GHz\",\"HW\":\"HDD 1TB - SSD 128GB\",\"model\":\"GE65 Raider 9SF-012\",\"display\":\"17.3\",\"weight\":\"4.56kg\"}', '[\"imglaptop/4.1.jpg\",\"imglaptop/4.2.jpg\",\"imglaptop/4.3.jpg\",\"imglaptop/4.4.jpg\"]'),
(6, 'Alienware 15 R3 2017 ', 4, '999', '{\"VGA\":\"NVIDIA GeForce GTX1060 6GB GDDR5\",\"Ram\":\"16GB DDR4 2400MHz\",\"CPU\":\"Intel Core i7-7700HQ (Quad-Core, 6MB Cache, up to 3.8GHz w/ Turbo Boost)\",\"HW\":\"1TB HDD SATA III 7200rpm \",\"model\":\"Alienware 15 R3\",\"display\":\"15.6 inch \",\"weight\":\"3.9kg\"}', '[\"imglaptop/dell2.1.jpg\",\"imglaptop/dell2.2.jpg\",\"imglaptop/dell2.3.jpg\",\"imglaptop/dell2.4.jpg\"]'),
(7, 'Alienware M17 2019', 4, '2600', '{\"VGA\":\"8GB NVidia RTX 2070\",\"Ram\":\"16GB DDR4 2666MHz\",\"CPU\":\"Intel Core i7 8750H Processor 2.2GHz - 4.10 GHz 9Mb Cache \",\"HW\":\"1TB HDD SSD 512GB 7200rpm\",\"model\":\"M17 2019\",\"display\":\"IPS Anti Glare 300 nits Display 17.3 inch\",\"weight\":\"3.9kg\"}', '[\"imglaptop/dell3.1.jpg\",\"imglaptop/dell3.2.jpg\",\"imglaptop/dell3.3.jpg\",\"imglaptop/dell3.4.jpg\"]'),
(8, 'Alienware 15 N14 2018 ', 4, '1800', '{\"VGA\":\"6GB NVIDIA GeFore GTX 1060\",\"Ram\":\"8GB DDR4 2400MHz\",\"CPU\":\"Intel Core i7 8750H Processor 2.20 GHz - 4.10GHz 9MB Cache\",\"HW\":\"HDD 1TB SSD 128GB\",\"model\":\"Alienware\",\"display\":\"IPS Anti-glare LED backlight 15.6 inch\",\"weight\":\"4.3kg\"}', '[\"imglaptop/dell4.1.jpg\",\"imglaptop/dell4.2.jpg\",\"imglaptop/dell4.3.jpg\",\"imglaptop/dell4.4.jpg\"]'),
(9, 'Asus ROG Strix SCAR II GL704GW-EV048T', 2, '3000', '{\"VGA\":\"NVIDIA GeForce RTX 2070 8GB GDDR6\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 9750H 6 Core 12 Threads 2.6 GHz - 4.5 GHz\",\"HW\":\"1TB HDD SATA III 7200rpm \",\"model\":\"ROG Strix SCAR II\",\"display\":\"17.3\",\"weight\":\"3.9kg\"}', '[\"imglaptop/asus1.1.jpg\",\"imglaptop/Asus1.2.jpg\",\"imglaptop/Asus1.3.jpg\",\"imglaptop/Asus1.4.jpg\"]'),
(10, 'ASUS ROG Zephyrus G GA502DU-AL024T ', 2, '1500', '{\"VGA\":\"NVIDIA GeForce GTX1060 6GB GDDR5\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 9750H 6 Core 12 Threads 2.6 GHz - 4.5 GHz\",\"HW\":\"1TB HDD SATA III 7200rpm \",\"model\":\"ROG Zephyrus G\",\"display\":\"17.3\",\"weight\":\"3.9kg\"}', '[\"imglaptop/asus2.1.jpg\",\"imglaptop/asus2.2.jpg\",\"imglaptop/asus2.3.jpg\",\"imglaptop/asus2.4.jpg\"]'),
(11, 'ASUS TUF Gaming FX705GM-EV113T', 2, '1500', '{\"VGA\":\"NVIDIAu00ae GeForceu00ae GTX 1060 6GB GDDR5\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 8750H 6 Core 12 Threads 2.6 GHz - 4.5 GHz\",\"HW\":\"HDD 1TB - SSD 128GB\",\"model\":\" TUF Gaming\",\"display\":\"17.3\",\"weight\":\"4.56kg\"}', '[\"imglaptop/asus3.1.jpg\",\"imglaptop/asus3.2.jpg\",\"imglaptop/asus3.3.jpg\",\"imglaptop/asus3.4.jpg\"]'),
(12, 'ASUS ROG Zephyrus M GU502GU-ES014T', 2, '1300', '{\"VGA\":\"NVIDIA GeForce GTX1060 6GB GDDR5\",\"Ram\":\"32GB (2x16GB) DDR4 \",\"CPU\":\"Intel Core i7 9750H 6 Core 12 Threads 2.6 GHz - 4.5 GHz\",\"HW\":\"HDD 1TB - SSD 128GB\",\"model\":\"ROG Zephyrus\",\"display\":\"17.3\",\"weight\":\"3.9kg\"}', '[\"imglaptop/asus4.1.jpg\",\"imglaptop/asus4.2.jpg\",\"imglaptop/asus4.3.jpg\",\"imglaptop/asus4.4.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `role`, `avatar`) VALUES
(10, 'Lê Trần Hữu Nghị', 'ngondzai@gmail.com', '11111111', '', '', 0, 1, 'avatar-user/avatar-default-avatar.jpg'),
(6, 'Chế Gia Huyy', 'jiawei.4127@gmail.com', '11111111', '0334555687', '125 Vạn Kiếp', 0, 0, 'avatar-user/avatar-default-avatar.jpg'),
(11, 'Lê Công Hiêu', 'lehieu123@gmail.com', '11111111', '', '', 0, 1, 'avatar-user/default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbrands` (`idbrands`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`idbrands`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
