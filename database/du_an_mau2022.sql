-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 29, 2023 lúc 07:38 PM
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
-- Cơ sở dữ liệu: `du_an_mau2022`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'Thắt Lưng Da'),
(2, 'Túi Đeo Chéo'),
(20, 'Ví cầm tay nam'),
(21, 'Ví Da Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` double(10,2) DEFAULT 0.00,
  `pro_image` varchar(255) DEFAULT NULL,
  `pro_desc` text DEFAULT NULL,
  `chat_lieu` varchar(255) NOT NULL,
  `pro_view` int(11) DEFAULT 0,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_image`, `pro_desc`, `chat_lieu`, `pro_view`, `cate_id`) VALUES
(11, 'Túi sách nam cực chất', 11111.00, '../upload/tui_cheo2.webp', 'Túi đeo chéo ngực, sau lưng, đeo trước bụng hoặc hông, phù hợp đi đường dễ lấy đồ, tiện dụng đi du lịch, chứa đựng điện thoại, ví nhỏ, vật dụng nhỏ', 'Da bò', 9, 2),
(21, 'Túi đeo chéo nam khóa số Rb02', 123123.00, '../upload/tui_cheo4.webp', 'Túi đeo chéo, túi đeo ngang vai, đựng điện thoại, ví nhỏ, phụ kiện.v.v.', 'Da bò chà bá', 20, 2),
(22, 'Túi Đeo Chéo Nam Da Bò Thô Sáp TM59', 123123.00, '../upload/tui_cheo.webp', 'Túi đeo chéo, túi đeo ngang vai, đựng điện thoại, ví nhỏ, phụ kiện.v.v.', 'Da bò thô sáp', 16, 2),
(23, 'Túi Đeo Chéo Nam Da Bò Thô Sáp TM59', 1212.00, '../upload/tui_cheo5.webp', 'Túi đeo chéo, túi đeo ngang vai, đựng điện thoại, ví nhỏ, phụ kiện.v.v.', ' Da bò mill hạt nhỏ', 90, 2),
(24, 'Ví da', 123123.00, '../upload/vi_da1.jpg', 'Clutch cầm tay, đeo tay cho nam, form dáng công sở vừa điện thoại giấy tờ (không vừa ipab mini).', ' Da bò Epsom', 15, 21),
(25, 'Ví da', 2323.00, '../upload/vi_da2.jpg', 'Túi đeo chéo ngực, sau lưng, đeo trước bụng hoặc hông, phù hợp đi đường dễ lấy đồ, tiện dụng đi du lịch, chứa đựng điện thoại, ví nhỏ, vật dụng nhỏ', 'Da bò Mill', 5, 21),
(26, 'Ví da cầm tay nam khóa số', 1230000.00, '../upload/vi_da4.jpg', 'HÌnh ảnh sản phẩm 100% chụp bằng sản phẩm thật, do ánh sáng môi trường xung quanh', ' Da bò mill hạt nhỏ', 100, 21),
(27, 'Thắt lưng nam công sở da bò', 500000.00, '../upload/that_lung_nam.webp', 'Mặt khóa trượt linh hoạt với các size quần. Dễ dàng kết hợp với các trang phục công sở, lịch sự.', 'Da bò nhập khẩu, Mặt khóa hợp kim không gỉ', 0, 1),
(28, 'Thắt lưng da nam công sở vàng', 500000.00, '../upload/that_lung_nam1.webp', 'Mặt khóa trượt linh hoạt với các size quần. Dễ dàng kết hợp với các trang phục công sở, lịch sự.', ' Da bò Mastrotto, Mặt khóa hợp kim không gỉ', 0, 1),
(30, 'Ví da cầm tay nam khóa số RB07', 1300000.00, '../upload/vi_cam_tay.webp', ' Clutch cầm tay, đeo tay cho nam', 'Da bò mill hạt nhỏ', 0, 20),
(31, 'Ví da nam Gence da bò Taiga dáng ngang C04', 450000.00, '../upload/vi_da_bo.webp', ' Đựng tiền 10-20 tờ, thẻ card các loại thêm 2 ngăn đựng tiền', 'Da Bò Taiga', 0, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_repass` varchar(20) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_repass`, `user_role`) VALUES
(37, 'dungzboo@gmail.com', 'Dung 1', '123', '123', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `FK_pro_cate` (`cate_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_pro_cate` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
