-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2020 lúc 07:23 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fl_center`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tên đăng nhập - email',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'họ và tên',
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số điện thoại',
  `sex` tinyint(1) DEFAULT NULL COMMENT 'giới tính',
  `dob` date DEFAULT NULL COMMENT 'ngày sinh',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh đại diện',
  `role` int(11) NOT NULL DEFAULT 2 COMMENT 'phân quyền cấp từ 0-2, mặc định là 2(thành viên)',
  `district_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id quận huyện',
  `branch_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id quận huyện',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày cập nhật',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'ngày xóa tạm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Thông tin một người dùng';

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`, `tel`, `sex`, `dob`, `avatar`, `role`, `district_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$d4s0xzV1zUZN4tQlw/coyeUyAmgjzcIk1KDw9Lp6EQqn/gh73N9eO', 'Admin', '0123456789', 1, NULL, NULL, 1, 59, NULL, '2020-06-17 01:54:03', '2020-06-19 15:09:47', NULL),
(2, 'congtacvien1', 'congtacvien1@gmail.com', '$2y$10$VicDN0DkoHCgg0YHWCQ9euE/VQ06zHX5sLcVS1OOpDlzdd6fwqR56', 'CTV1', '0123456788', 0, NULL, NULL, 1, 59, 1, '2020-06-17 01:54:03', '2020-06-19 15:09:51', NULL),
(3, 'congtacvien2', 'congtacvien2@gmail.com', '$2y$10$1MGubd7EHNJvKGERoro.2ev/fCnCQFocBfHWwkdUfHn2mT3R4wfui', 'CTV2', '0123456787', NULL, NULL, NULL, 1, 59, 2, '2020-06-17 01:54:03', '2020-06-19 14:54:28', NULL),
(4, 'congtacvien3', 'congtacvien3@gmail.com', '$2y$10$n2TH/Ea7cLGLhqtgvBJmb.2D9Sy6g1MqeCRkomLexXKzp.wNGx7pu', 'CTV3', '0123456786', NULL, NULL, NULL, 1, 62, 3, '2020-06-17 01:54:03', '2020-06-19 14:54:33', NULL),
(5, 'thanhvien1', 'thanhvien1@gmail.com', '$2y$10$aYRY8hEbzvsfbQIe/D/M4uXxk9ntY8Gj7c24e4O6OFqtnN0f1tUY6', 'TV1', '0123456785', NULL, NULL, NULL, 2, 59, NULL, '2020-06-17 01:54:03', '2020-06-19 15:11:02', NULL),
(6, 'thanhvien2', 'thanhvien2@gmail.com', '$2y$10$EhvXMm42FH6ue3kaWBmXoO8TX9xp36T0aczl5pnnE56XWytQ7f5Ku', 'TV2', '0123456784', NULL, NULL, NULL, 2, 59, NULL, '2020-06-17 01:54:03', '2020-06-19 14:55:03', NULL),
(7, 'thanhvien3', 'thanhvien3@gmail.com', '$2y$10$9bxdfMtcvj8Tp9UeOptK8.V.4iIZoGH3MZgeBe2Hyvfu0fZD4Jy4i', 'TV3', '012345673', NULL, NULL, NULL, 2, 62, NULL, '2020-06-17 01:54:03', '2020-06-19 14:55:00', NULL),
(8, 'b1605280', 'khoado@gmail.com', '$2y$10$C6lfgIhsfDEGfcuSfX2wSuLmwUJ9SoFmamYJfzuzk9bKvzdBdl7ee', 'Khoa Đỗ', '123456789', NULL, NULL, NULL, 0, 59, 0, '2020-06-17 13:53:45', '2020-06-19 14:54:05', NULL),
(11, 'chauanh', NULL, '$2y$10$mgGQSy8/QB1Wr2lqcj4yOOZNRDrp7u35zDbg3di8irGcrZ3xtxbP.', 'Châu anh', NULL, NULL, NULL, NULL, 1, NULL, 6, '2020-06-19 15:41:58', '2020-06-19 15:41:58', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
