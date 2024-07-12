-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 08:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 1234567890, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-06-25 07:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `ID` int(10) NOT NULL,
  `BrandName` varchar(200) DEFAULT NULL,
  `Status` int(2) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `ID` int(10) NOT NULL,
  `ProductId` int(5) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `ProductQty` int(11) DEFAULT NULL,
  `IsCheckOut` int(5) DEFAULT NULL,
  `CartDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Status` int(2) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `Status`, `CreationDate`) VALUES
(1, 'Electrical', 1, '2020-06-25 14:38:43'),
(2, 'Medical Supplies', 1, '2020-06-25 14:39:23'),
(3, 'Toys', 1, '2020-06-25 14:39:48'),
(4, 'Baby Products', 0, '2020-06-25 14:41:14'),
(5, 'Cosmetic', 1, '2020-06-25 14:41:33'),
(6, 'Groceries', 1, '2020-06-25 14:41:50'),
(7, 'Lab Supplies', 1, '2020-06-25 14:41:59'),
(8, 'Hand Tools', 1, '2020-06-25 14:51:50'),
(9, 'Bathroom Supplies', 1, '2020-06-25 15:27:20'),
(10, 'Essential Goods', 1, '2020-06-26 04:33:35'),
(11, 'Stationery', 1, '2020-06-26 04:34:05'),
(12, 'Kitchen Supplies', 1, '2020-06-26 04:34:27'),
(13, 'Home Appliances', 1, '2020-06-26 04:34:41'),
(14, 'Game Products', 1, '2020-06-26 04:34:55'),
(15, 'Stationery', 1, '2020-08-31 05:29:07'),
(16, 'Test Category', 1, '2020-10-03 14:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `ID` int(10) NOT NULL,
  `BillingNumber` varchar(120) DEFAULT NULL,
  `CustomerName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `ModeofPayment` varchar(50) DEFAULT NULL,
  `BillingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `CategoryID` int(5) DEFAULT NULL,
  `SubcategoryID` int(5) DEFAULT NULL,
  `BrandName` varchar(200) DEFAULT NULL,
  `ModelNumber` varchar(200) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Barcode` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Stock` int(10) DEFAULT NULL,
  `CostPrice` decimal(10,2) DEFAULT NULL,
  `Margin` decimal(5,2) DEFAULT NULL,
  `Discount` decimal(5,2) DEFAULT NULL,
  `DiscountedPrice` decimal(10,2) GENERATED ALWAYS AS (`Price` - `Price` * `Discount` / 100) STORED,
  `Status` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdatedDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IsFeatured` tinyint(1) DEFAULT 0,
  `Weight` decimal(10,2) DEFAULT NULL,
  `Dimensions` varchar(50) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `SupplierID` int(5) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`ProductID`, `ProductName`, `CategoryID`, `SubcategoryID`, `BrandName`, `ModelNumber`, `Description`, `Barcode`, `Price`, `Stock`, `CostPrice`, `Margin`, `Discount`, `Status`, `CreationDate`, `LastUpdatedDate`, `IsFeatured`, `Weight`, `Dimensions`, `Color`, `Size`, `SupplierID`, `ImageURL`) VALUES
(1, 'Acne Cream', 1, 1, 'Brand A', 'Model 001', 'Effective acne treatment cream', '123456789012', 585.00, 100, 450.00, 30.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.50, '10x5x5', 'White', '50g', 1, 'http://example.com/images/acne_cream.jpg'),
(2, 'After sun Cream', 1, 2, 'Brand B', 'Model 002', 'Soothing after sun cream', '123456789013', 410.00, 100, 300.00, 36.67, 10.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '100ml', 2, 'http://example.com/images/after_sun_cream.jpg'),
(3, 'Aloevera Gel', 1, 3, 'Brand C', 'Model 003', 'Refreshing aloevera gel', '123456789014', 380.00, 100, 250.00, 52.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 1, 0.40, '10x5x5', 'Green', '150ml', 3, 'http://example.com/images/aloevera_gel.jpg'),
(4, 'Be Bright', 2, 1, 'Brand D', 'Model 004', 'Skin brightening cream', '123456789015', 650.00, 100, 500.00, 30.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.60, '12x6x6', 'White', '50g', 1, 'http://example.com/images/be_bright.jpg'),
(5, 'Calamine Cream', 2, 2, 'Brand E', 'Model 005', 'Calamine cream for skin relief', '123456789016', 275.00, 100, 200.00, 37.50, 5.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Pink', '100g', 2, 'http://example.com/images/calamine_cream.jpg'),
(6, 'Calamine Lotion', 2, 3, 'Brand F', 'Model 006', 'Calamine lotion for skin', '123456789017', 210.00, 100, 150.00, 40.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Pink', '100ml', 3, 'http://example.com/images/calamine_lotion.jpg'),
(7, 'Calamine Powder', 3, 1, 'Brand G', 'Model 007', 'Calamine powder for skin relief', '123456789018', 200.00, 100, 120.00, 66.67, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.20, '6x3x3', 'White', '50g', 1, 'http://example.com/images/calamine_powder.jpg'),
(8, 'Diapper Rash- No rash', 3, 2, 'Brand H', 'Model 008', 'Diaper rash cream', '123456789019', 275.00, 100, 180.00, 52.78, 5.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.20, '6x3x3', 'White', '50g', 2, 'http://example.com/images/diaper_rash_cream.jpg'),
(9, 'Face Wash', 3, 3, 'Brand I', 'Model 009', 'Refreshing face wash', '123456789020', 468.00, 100, 300.00, 56.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 1, 0.30, '8x4x4', 'Blue', '100ml', 3, 'http://example.com/images/face_wash.jpg'),
(10, 'Foot Cream - crack out', 4, 1, 'Brand J', 'Model 010', 'Foot cream for cracked heels', '123456789021', 279.00, 100, 200.00, 39.50, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 1, 'http://example.com/images/foot_cream_crack_out.jpg'),
(11, 'Foot Cream- Diabetic', 4, 2, 'Brand K', 'Model 011', 'Foot cream for diabetic patients', '123456789022', 560.00, 100, 400.00, 40.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 2, 'http://example.com/images/foot_cream_diabetic.jpg'),
(12, 'Methyl Salycilate Cream- Relaxx', 4, 3, 'Brand L', 'Model 012', 'Pain relief cream', '123456789023', 200.00, 100, 120.00, 66.67, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.20, '6x3x3', 'White', '50g', 3, 'http://example.com/images/methyl_salycilate_cream.jpg'),
(13, 'Moisturizing Cream- Dry nil', 5, 1, 'Brand M', 'Model 013', 'Moisturizing cream for dry skin', '123456789024', 285.00, 100, 200.00, 42.50, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 1, 'http://example.com/images/moisturizing_cream_dry_nil.jpg'),
(14, 'Moisturizing cream-Dry nil kids', 5, 2, 'Brand N', 'Model 014', 'Moisturizing cream for kids', '123456789025', 350.00, 100, 250.00, 40.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 2, 'http://example.com/images/moisturizing_cream_dry_nil_kids.jpg'),
(15, 'Mosquito Lotion', 5, 3, 'Brand O', 'Model 015', 'Mosquito repellent lotion', '123456789026', 500.00, 100, 350.00, 42.86, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Green', '100ml', 3, 'http://example.com/images/mosquito_lotion.jpg'),
(16, 'Mosquito Spray', 6, 1, 'Brand P', 'Model 016', 'Mosquito repellent spray', '123456789027', 450.00, 100, 300.00, 50.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 1, 0.30, '8x4x4', 'Green', '100ml', 1, 'http://example.com/images/mosquito_spray.jpg'),
(17, 'Salicylic acid Coaltar Cream- Sallycol', 6, 2, 'Brand Q', 'Model 017', 'Salicylic acid cream', '123456789028', 825.00, 100, 600.00, 37.50, 10.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 2, 'http://example.com/images/salicylic_acid_coaltar_cream.jpg'),
(18, 'Skin Glow cream', 6, 3, 'Brand R', 'Model 018', 'Skin glow cream', '123456789029', 950.00, 100, 700.00, 35.71, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 3, 'http://example.com/images/skin_glow_cream.jpg'),
(19, 'Sun juniour', 7, 1, 'Brand S', 'Model 019', 'Sun protection for kids', '123456789030', 430.00, 100, 300.00, 43.33, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Yellow', '100ml', 1, 'http://example.com/images/sun_juniour.jpg'),
(20, 'Sun Lotion 50Plus', 7, 2, 'Brand T', 'Model 020', 'Sun protection lotion SPF 50', '123456789031', 580.00, 100, 400.00, 45.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Yellow', '100ml', 2, 'http://example.com/images/sun_lotion_50plus.jpg'),
(21, 'Sunscreen 30Plus', 7, 3, 'Brand U', 'Model 021', 'Sunscreen lotion SPF 30', '123456789032', 430.00, 100, 300.00, 43.33, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 1, 0.30, '8x4x4', 'Yellow', '100ml', 3, 'http://example.com/images/sunscreen_30plus.jpg'),
(22, 'Sunscreen 50Plus', 8, 1, 'Brand V', 'Model 022', 'Sunscreen lotion SPF 50', '123456789033', 485.00, 100, 350.00, 38.57, 5.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Yellow', '100ml', 1, 'http://example.com/images/sunscreen_50plus.jpg'),
(23, 'Surf Guard - ZnO Cream', 8, 2, 'Brand W', 'Model 023', 'Zinc oxide cream', '123456789034', 475.00, 100, 320.00, 48.44, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '50g', 2, 'http://example.com/images/surf_guard_zno_cream.jpg'),
(24, 'UV Care gel', 8, 3, 'Brand X', 'Model 024', 'UV protection gel', '123456789035', 700.00, 100, 500.00, 40.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'Transparent', '100ml', 3, 'http://example.com/images/uv_care_gel.jpg'),
(25, 'Vaginal Wash- Be relax', 9, 1, 'Brand Y', 'Model 025', 'Vaginal wash', '123456789036', 380.00, 100, 250.00, 52.00, 0.00, 'In Stock', '2024-07-09 18:41:24', '2024-07-09 18:41:24', 0, 0.30, '8x4x4', 'White', '100ml', 1, 'http://example.com/images/vaginal_wash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `ID` int(10) NOT NULL,
  `CatID` int(5) DEFAULT NULL,
  `SubCategoryname` varchar(200) DEFAULT NULL,
  `Status` int(2) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`ID`, `CatID`, `SubCategoryname`, `Status`, `CreationDate`) VALUES
(26, 5, 'Grooming', 1, '2020-08-27 07:12:39'),
(27, 16, 'Test  subCat', 1, '2020-10-03 14:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BillingNumber` (`BillingNumber`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
