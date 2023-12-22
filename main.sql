-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2023 lúc 02:12 PM
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
  `table_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reservation_list`
--

INSERT INTO `reservation_list` (`reservation_id`, `customer_id`, `table_id`, `datetime`, `status`, `date_created`) VALUES
(11, '1', 1, '2023-12-13 22:00:00', 0, '2023-12-13 20:14:23'),
(12, '1', 2, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:27'),
(13, '1', 3, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:30'),
(14, '1', 4, '2023-12-13 22:00:00', 0, '2023-12-13 20:15:31'),
(25, '1', 6, '0000-00-00 00:00:00', 0, '2023-12-22 12:56:46'),
(26, '17', 6, '2023-11-28 12:56:00', 0, '2023-12-22 13:07:38');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_list`
--

INSERT INTO `table_list` (`table_id`, `tbl_no`, `table_name`, `description`, `status`, `date_created`, `size`) VALUES
(6, 1, 'T101', NULL, 1, '2023-12-21 14:40:05', 8),
(7, 2, 'T102', NULL, 1, '2023-12-21 14:40:05', 8),
(8, 3, 'T103', NULL, 1, '2023-12-21 14:40:05', 8),
(9, 4, 'T104', NULL, 1, '2023-12-21 14:40:05', 2),
(10, 5, 'T105', NULL, 1, '2023-12-21 14:40:05', 2),
(11, 6, 'T106', NULL, 1, '2023-12-21 14:40:05', 2),
(12, 7, 'T107', NULL, 1, '2023-12-21 14:40:05', 4),
(13, 8, 'T108', NULL, 1, '2023-12-21 14:40:05', 4),
(14, 9, 'T109', NULL, 1, '2023-12-21 14:40:05', 4),
(15, 10, 'T1010', NULL, 1, '2023-12-21 14:40:05', 4),
(16, 11, 'T1011', NULL, 1, '2023-12-21 14:40:05', 2),
(17, 12, 'T1012', NULL, 1, '2023-12-21 14:40:05', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`, `role`, `verify_token`, `verify_status`) VALUES
(1, 'Song Cat', 'admin123@gmail.com', '$2y$10$E6PpQm2UUUNB6M5XZ7vhzOxuLmdsPiGIZz58Zyq95x3lsidBSq8im', '0901281211', 'Admin', '', 1),
(7, 'qeqweqe', 'admin@mail.eqewqe', '123', '0376966096', 'Customer', 'a5c8076885b40f5221cf45507178a05d', 0),
(9, 'HIIIIII', 'admin@mail', '123', '0192121311', 'Customer', 'c3324ec68667865d3ee68390e9fa76f1', 0),
(10, 'Anh Chi', 'nlachi21@clc.fitus.edu.vn', '123456', '0376966096', 'Customer', '5479e3b77042d6eb05b92e532a95c8cb', 0),
(11, 'Song Cat', 'lnscat21@clc.fitus.edu.vn', '123', '11212121', 'Customer', '014d5fce729ecbb08496f0d6d60c9d1c', 0),
(14, 'Song Cat', 'songcatlengo.learning@gmail.com', '$2y$10$E6PpQm2UUUNB6M5XZ7vhzOxuLmdsPiGIZz58Zyq95x3lsidBSq8im', '0123456789', 'Customer', 'e95bbe0c2844af3f1cf08f3209c0a3f9', 1),
(17, 'Staff21', 'staff12345@gmail.com', '$2y$10$FUML9jrQPf2a0j4/90IY4uMrKMi9QWATBzRBxtRM0zNSRkXw/9SRi', '0921821274', 'Staff', '', 1),
(18, 'Staff SC', 'staffSC@gmail.com', '$2y$10$1iypvtIR786lQ404yZtRq.8Yv8zEFLSToPv1aWlMetKAh5sODu6v6', '0912123761', 'Staff', '', 1),
(19, 'Staff Nhi', 'staffNhi@gmail.com', '$2y$10$JwdAlaEeq3Ei94GW8O1W4eEKYEMIG44DfGu5cfgIbhXyHVIFsEz9.', '0903228329', 'Staff', '', 1),
(20, 'Staff15', 'staff15@gmail.com', '123', '0903333333', 'Staff', '', 1),
(21, 'Staff16', 'staff16@gmail.com', '123', '0903333333', 'Staff', '', 1),
(22, 'Staff17', 'staff17@gmail.com', '123', '0903333333', 'Staff', '', 1),
(23, 'Staff18', 'staff18@gmail.com', '123', '0903333333', 'Staff', '', 1),
(24, 'Staff19', 'staff19@gmail.com', '123', '0903333333', 'Staff', '', 1),
(25, 'Staff20', 'staff20@gmail.com', '123', '0903333333', 'Staff', '', 1),
(26, 'Staff21', 'staff21@gmail.com', '123', '0903333333', 'Staff', '', 1),
(27, 'Staff22', 'staff22@gmail.com', '123', '0903333333', 'Staff', '', 1),
(28, 'Staff23', 'staff23@gmail.com', '123', '0903333333', 'Staff', '', 1),
(29, 'Staff24', 'staff24@gmail.com', '123', '0903333333', 'Staff', '', 1),
(30, 'Staff25', 'staff25@gmail.com', '123', '0903333333', 'Staff', '', 1),
(31, 'Staff26', 'staff26@gmail.com', '123', '0903333333', 'Staff', '', 1),
(32, 'Tai Nguyen', 'npt5767@gmail.com', '$2y$10$2gx95HW57EjfqbxtQbqylO5JLsNmxSCyINJiGK6mm5d/hq1LfSrzC', '+84377457651', 'Customer', '9c7e1dac7e4fad7860f078cf5a4ca803', 0);

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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `reservation_list`
--
ALTER TABLE `reservation_list`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `table_list`
--
ALTER TABLE `table_list`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
