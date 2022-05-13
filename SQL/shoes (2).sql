-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2020 lúc 12:59 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AdminName` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdminName`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `BraID` int(5) NOT NULL,
  `BraName` text NOT NULL,
  `IsShow` tinyint(1) NOT NULL,
  `CreateDate` date NOT NULL,
  `ModifyDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`BraID`, `BraName`, `IsShow`, `CreateDate`, `ModifyDate`) VALUES
(1, 'Nike', 1, '2020-10-27', '2020-10-27'),
(2, 'Adidas', 1, '2020-10-27', '2020-10-27'),
(3, 'Jordan', 1, '2020-10-27', '2020-10-27'),
(4, 'Yeezy', 1, '2020-10-27', '2020-10-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CateId` int(5) NOT NULL,
  `CateName` text NOT NULL,
  `IsShow` tinyint(1) NOT NULL,
  `CreateDate` date NOT NULL,
  `ModifyDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CateId`, `CateName`, `IsShow`, `CreateDate`, `ModifyDate`) VALUES
(1, 'Man', 1, '2020-10-27', '2020-10-27'),
(2, 'Woman', 1, '2020-10-27', '2020-10-27'),
(3, 'Kids', 1, '2020-10-27', '2020-10-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CusID` int(5) NOT NULL,
  `CusName` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CusID`, `CusName`, `Email`, `Phone`, `Address`, `RegDate`) VALUES
(1, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-03 04:06:18'),
(2, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '1234567890', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-03 06:05:27'),
(3, '', 'tdhieu23@gmail.com', '', '', '2020-11-03 14:02:18'),
(4, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-03 14:02:28'),
(5, '', 'tdhieu23@gmail.com', '', '', '2020-11-03 14:03:08'),
(6, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-03 14:03:11'),
(7, '', 'tdhieu23@gmail.com', '', '', '2020-11-03 14:03:13'),
(8, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '', '', '2020-11-03 14:03:15'),
(9, '', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-03 14:03:17'),
(10, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '', '', '2020-11-03 14:03:20'),
(11, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-03 14:03:26'),
(12, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-04 14:02:47'),
(13, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-04 14:02:57'),
(14, 'Trần Đức Hiếu', 'tdhieu23@gmail.com', '123456789', 'Hẻm 27 Lê Hồng Phong, 3', '2020-11-04 14:21:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `OrdID` int(5) NOT NULL,
  `CusID` int(5) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderCostTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`OrdID`, `CusID`, `OrderDate`, `OrderCostTotal`) VALUES
(2, 1, '2020-11-03', 0),
(3, 1, '2020-11-03', 0),
(4, 14, '2020-11-05', 1620);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `OrdID` int(5) NOT NULL,
  `ProID` int(5) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `OrderDetailCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ordersdetail`
--

INSERT INTO `ordersdetail` (`OrdID`, `ProID`, `Quantity`, `OrderDetailCost`) VALUES
(4, 1, 1, 220),
(4, 3, 1, 300),
(4, 6, 1, 400),
(4, 7, 1, 300),
(4, 8, 1, 400);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProID` int(5) NOT NULL,
  `ProCateID` int(5) NOT NULL,
  `ProBarID` int(5) NOT NULL,
  `ProImage` text NOT NULL,
  `ProName` text NOT NULL,
  `ProColor` text NOT NULL,
  `ProPrice` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `IsShow` tinyint(1) NOT NULL,
  `CreateDate` date NOT NULL,
  `ModifyDate` date NOT NULL,
  `Size` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProID`, `ProCateID`, `ProBarID`, `ProImage`, `ProName`, `ProColor`, `ProPrice`, `Number`, `IsShow`, `CreateDate`, `ModifyDate`, `Size`) VALUES
(1, 1, 3, 'Jordan 1 Mid Chicago Toe.png', 'Jordan 1 Mid Chicago Toe', 'RED/WHITE', 220, 12, 1, '2020-10-31', '2020-10-31', 10),
(2, 1, 3, 'Jordan 1 Retro High Lucky Green.png', 'Jordan 1 Retro High Lucky Green', 'GREEN/WHITE', 400, 12, 1, '2020-11-02', '2020-11-02', 15),
(3, 1, 2, 'adidas Ultra Boost 1.0 Triple Black.png', 'adidas Ultra Boost 1.0 Triple Black', 'BLACK', 300, 50, 1, '2020-10-27', '2020-10-27', 18),
(4, 1, 2, 'adidas Ultra Boost 4.0 Running White.png', 'adidas Ultra Boost 4.0 Running White', 'WHITE', 300, 50, 1, '2020-10-27', '2020-10-27', 18),
(5, 2, 4, 'adidas Yeezy Boost 350 V2 Carbon.png', 'adidas Yeezy Boost 350 V2 Carbon', 'CARBON', 221, 80, 1, '2020-10-27', '2020-10-27', 15),
(6, 1, 1, 'adidas Yeezy Boost 350 V2 Zyon.png', 'adidas Yeezy Boost 350 V2 Zyon', 'Zyon', 400, 12, 1, '2020-10-31', '2020-10-31', 15),
(7, 2, 1, 'Nike Air Force 1 Low Supreme Black.png', 'Nike Air Force 1 Low Supreme Black', 'BLACK', 300, 12, 1, '2020-10-31', '2020-10-31', 15),
(8, 2, 1, 'Nike Air Force 1 Low Supreme White.png', 'Nike Air Force 1 Low Supreme White', 'WHITE', 400, 12, 1, '2020-10-31', '2020-10-31', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Email`, `Password`) VALUES
('tdhieu23@gmail.com', '123123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BraID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CusID`),
  ADD KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrdID`),
  ADD KEY `CusID` (`CusID`);

--
-- Chỉ mục cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`OrdID`,`ProID`),
  ADD KEY `ProID` (`ProID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProID`),
  ADD KEY `product_ibfk_1` (`ProCateID`),
  ADD KEY `ProBarID` (`ProBarID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CusID`);

--
-- Các ràng buộc cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `ordersdetail_ibfk_1` FOREIGN KEY (`OrdID`) REFERENCES `order` (`OrdID`),
  ADD CONSTRAINT `ordersdetail_ibfk_2` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ProCateID`) REFERENCES `category` (`CateId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`ProBarID`) REFERENCES `brand` (`BraID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
