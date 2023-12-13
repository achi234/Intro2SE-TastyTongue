-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2023 lúc 09:20 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `main`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation_list`
--

CREATE TABLE `reservation_list` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `table_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reservation_list`
--

INSERT INTO `reservation_list` (`reservation_id`, `customer_id`, `contact`, `email`, `table_id`, `datetime`, `status`, `date_created`) VALUES
(11, '1', '123', 'npt5767@gmail.com', 1, '2023-12-13 22:00:00', 0, '2023-12-13 20:14:23'),
(12, '1', '123', 'npt5767@gmail.com', 2, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:27'),
(13, '1', '123', 'npt5767@gmail.com', 3, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:30'),
(14, '1', '123', 'npt5767@gmail.com', 4, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:31'),
(15, '1', '123', 'npt5767@gmail.com', 5, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_list`
--

CREATE TABLE `table_list` (
  `table_id` int(11) NOT NULL,
  `tbl_no` int(11) NOT NULL,
  `table_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_list`
--

INSERT INTO `table_list` (`table_id`, `tbl_no`, `table_name`, `description`, `status`, `date_created`) VALUES
(1, 1, 'Table 1', 'Description for Table 1', 1, '2023-12-12 15:32:25'),
(2, 2, 'Table 2', 'Description for Table 2', 1, '2023-12-12 15:34:57'),
(3, 3, 'Table 3', 'Description for Table 3', 1, '2023-12-12 15:34:57'),
(4, 4, 'Table 4', 'Description for Table 4', 1, '2023-12-12 15:34:57'),
(5, 5, 'Table 5', 'Description for Table 5', 1, '2023-12-12 15:34:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `reservation_list`
--
ALTER TABLE `reservation_list`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Chỉ mục cho bảng `table_list`
--
ALTER TABLE `table_list`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `reservation_list`
--
ALTER TABLE `reservation_list`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `table_list`
--
ALTER TABLE `table_list`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
