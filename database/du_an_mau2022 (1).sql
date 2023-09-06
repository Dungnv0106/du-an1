-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 06, 2023 lúc 07:53 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

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
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(20) NOT NULL,
  `bill_email` varchar(50) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. Thanh toán khi nhận hàng, 2. Thanh toán online',
  `order_date` varchar(50) NOT NULL,
  `bill_total` int(11) NOT NULL DEFAULT 0,
  `bill_status` int(11) DEFAULT 6 COMMENT '0. Đơn hàng mới\r\n1. Đang chờ xác nhận\r\n2. Đang giao hàng\r\n3. Đã giao hàng\r\n4. Đã Hủy\r\n5. Đã thanh toán\r\n6. Thanh toán khi nhận hàng',
  `receive_name` varchar(255) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `order_date`, `bill_total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`, `user_id`) VALUES
(91, 'Dung Nguyen', '22 Đức Diễn Hà Nội, 23 Đức Diễn Hà Nội', '0393900328', 'dungnvph18102@fpt.edu.vn', 1, '06/09/2023 05:28 pm', 1600000, 6, NULL, NULL, NULL, 17),
(92, 'Dũng Xì Boo', 'nam dinh', '0393900328', 'dungnvph18102@fpt.edu.vn', 1, '06/09/2023 06:35 pm', 1600000, 6, NULL, NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_image` varchar(255) DEFAULT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` int(11) NOT NULL DEFAULT 0,
  `pro_quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `pro_id`, `pro_image`, `pro_name`, `pro_price`, `pro_quantity`, `total`, `bill_id`) VALUES
(58, 17, 36, '../upload/cap-da-nam-cao-cap-khoa-so-cgl08-den-1.webp', 'Cặp da nam cao cấp khóa số CGL08', 3200000, 1, 3200000, 90),
(59, 17, 41, '../upload/tui-xach-tay-nu-gence-cao-cap-tx11-xanh-1.webp', 'Túi xách tay nữ Gence cao cấp TX11 xanh blue', 1600000, 1, 1600000, 91),
(60, 17, 42, '../upload/tui-xach-tay-nu-gence-cao-cap-tx08-den-1.webp', 'Túi xách tay nữ Gence cao cấp TX08 đen', 1600000, 1, 1600000, 92);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_image`) VALUES
(52, 'Cặp Xách Da', '../upload/cap_xach_da.webp'),
(53, 'Ví Cầm Tay', '../upload/vi_cam_tay.webp'),
(54, 'Túi Đeo Chéo', '../upload/tui_deo_cheo.webp'),
(55, 'Túi Xách Nữ', '../upload/tui_xach_nu.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `user_id`, `pro_id`, `comment_date`) VALUES
(7, 'Túi đẹp lắm anh ơi', 17, 35, '06/09/2023 05:51 pm'),
(8, 'Thắt lưng ưng quá anh ơi ^^', 17, 35, '06/09/2023 05:51 pm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` int(10) DEFAULT 0,
  `pro_image` varchar(255) DEFAULT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_desc` text DEFAULT NULL,
  `chat_lieu` varchar(255) NOT NULL,
  `pro_view` int(11) DEFAULT 0,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_image`, `pro_quantity`, `pro_desc`, `chat_lieu`, `pro_view`, `cate_id`) VALUES
(35, 'Cặp da nam cao cấp khóa số CGL07 xanh', 3200000, '../upload/cap1.webp', 6, 'Cặp da nam công sở CGL07 với khóa số nhân đôi cấp độ bảo mật mang “nguồn sinh khí mới” đến thị trường đồ da nam. Công nghệ hiện đại được Gence áp dụng để tạo nên sản phẩm thời đại mới. Phái mạnh theo phong cách hiện đại, thời thượng không nên bỏ qua CGL07.\r\nVào ngày thời tiết nóng bức, áo phông với jean cùng cặp da nam CGL07 là outfit yêu thích của phó phòng kinh doanh khi đi cafe với bạn bè. Họ vẫn có thể tận dụng CGL07 mang báo cáo kinh doanh, hồ sơ khách hàng,... Hình ảnh cá tính, trẻ trung nhưng vẫn lịch sự của họ khiến hội chị em phải điêu đứng. \r\nGence thiết kế khóa số hình bánh răng đối với CGL07 màu xanh. Khi các số đươc xoay đúng mật khẩu thì cặp sẽ được mở ra.', ' Da bò vân Taiga', 0, 52),
(36, 'Cặp da nam cao cấp khóa số CGL08', 3200000, '../upload/cap-da-nam-cao-cap-khoa-so-cgl08-den-1.webp', 100, 'Cặp da doanh nhân CGL08 Gence là sự lựa chọn hàng đầu của quý ông hiện đại. Từ kiểu dáng thiết kế cho tới công năng sử dụng, CGL08 đều “ăn đứt” các sản phẩm cặp da nam khác. CGL08 không chỉ là một chiếc cặp da nam đơn thuần, nó còn là “người trợ lý” đáng tin cậy trong công việc và cuộc sống.', 'Da bò vân Taiga', 0, 52),
(37, 'Cặp xách nam khóa số cao cấp da bò Taiga CGL10 ghi', 3200000, '../upload/cap-xach-nam-khoa-so-cao-cap-da-bo-taiga-cgl10-ghi-1.webp', 20, 'CGL10 với thiết kế hình chữ nhật nằm ngang nhanh chóng chiếm được thiện cảm của phái mạnh. Với form dáng này, khoảng chứa đồ vật sẽ được tận dụng một cách tối đa.\r\n\r\nLà một trong số ít sản phẩm có màu xám, CGL10 được chủ tịch, giám đốc bệnh viện mệnh Mộc, mệnh Kim “săn đón”. Màu xám thể hiện sự tối cao, công lý, mang đến cho họ sự bình an và tài lộc trong công việc, cuộc sống.', '	Da bò Taiga', 0, 52),
(38, 'Cặp xách nam khóa số cao cấp da bò Taiga CGL09 đen', 3400000, '../upload/cap-xach-nam-khoa-so-cao-cap-da-bo-taiga-cgl09-1.webp', 50, 'Những đường gân lá kim tạo nên sự khác biệt trên bề mặt da CGL09. Vẻ đẹp thời thượng của CGL09 nhờ những đường gân độc đáo này được phái mạnh đánh giá cao.\r\n\r\nLogo Gence với màu sắc sáng bóng nằm nổi bật trên nền đen chủ đạo. Logo làm từ hợp kim không gỉ như họa tiết trang trí làm CGL09 khác biệt với những thương hiệu khác. Nó cũng như một lời cam kết chất lượng đến tay khách hàng tin tưởng sử dụng.', 'Da bò Taiga', 0, 52),
(39, 'Cặp xách nam khóa số cao cấp da bò Nappa CTS11', 3200000, '../upload/cap-xach-nam-khoa-so-da-bo-nappa-cts11-1.webp', 15, 'Cặp da công sở có khóa số CTS11 thiết kế đơn giản nhưng vẫn toát lên vẻ sang trọng. Được chế tác bằng chất xám của các nhà thiết kế tài hoa Việt Nam mang kiểu sáng Âu - Á hài hòa.\r\n\r\nĐường khâu ngay ngắn, đều đặn không chỉ thừa chứng tỏ sự chuyên nghiệp, tỉ mỉ trong khâu sản xuất. Đặc biệt các mũi chỉ chắc chắn, dầy dặn ở các mép cạnh đảm bảo sự bền chắc theo thời gian.', '	Da bò Nappa', 0, 52),
(40, 'Túi xách tay nữ Gence cao cấp TX12 vàng', 1600000, '../upload/tui-xach-tay-nu-gence-cao-cap-tx12-vang-1.webp', 26, 'Dây đeo có thể dễ dàng điều chỉnh ngắn dài để phù hợp với nhu cầu của phái đẹp. Mối nối giữa dây đeo và thân túi mạ vàng sáng bóng được làm cẩn thận bởi những người thợ tài hoa. Vì thế, tình trạng đứt dây khi sử dụng TX12 là điều hầu như không xảy ra.\r\n\r\nTay cầm TX12 với bản ngang vừa đủ đảm bảo sự chắc chắn, vừa tôn lên vẻ đẹp của người dùng. Tay cầm và dây đeo được linh hoạt sử dụng tùy theo trang phục phối cùng.', '	Da Bò Clemence', 0, 55),
(41, 'Túi xách tay nữ Gence cao cấp TX11 xanh blue', 1600000, '../upload/tui-xach-tay-nu-gence-cao-cap-tx11-xanh-1.webp', 56, 'Chất liệu da dùng làm thân túi cũng được sử dụng làm dây đeo và tay cầm. Bởi Gence coi trọng từng chi tiết để tạo nên túi xách đi làm công sở hoàn mỹ nhất.\r\n\r\nDây đeo có thể dễ dàng điều chỉnh độ dài để phù hợp với kích cỡ cơ thể mỗi người phụ nữ. Mối nối dây đeo và thân túi được mạ vàng sáng bóng bởi những nghệ nhân tài ba. Nhờ thế, tình trạng đứt dây rất hiếm khi xảy ra khi sử dụng TX11.', 'Da Bò Clemence', 0, 55),
(42, 'Túi xách tay nữ Gence cao cấp TX08 đen', 1600000, '../upload/tui-xach-tay-nu-gence-cao-cap-tx08-den-1.webp', 24, 'Dây đeo vai TX08 cũng được làm từ chất liệu da hài hòa với thân túi. Thiết kế dây đeo dễ dàng điều chỉnh độ dài phù hợp với chiều cao, sở thích của người dùng. Dây đeo và quai xách có thể linh hoạt sử dụng tùy hoàn cảnh.\r\n\r\nMối nối gắn dây đeo và tay cầm được làm từ hợp kim không gỉ mạ vàng sáng bóng. Mối nối được làm chắc chắn bởi những nghệ nhân tài ba. Các quý cô không cần lo lắng khi mang theo nhiều đồ dùng mà dây đeo có thể bị đứt.', 'Da Bò Clemence', 0, 55);

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
(4, 'dungzboo@gmail.com', 'dungxibo', '1234567', '1234567', 0),
(17, 'dungnvph18102@fpt.edu.vn', 'Dũng Xì Boo', '1234', '1234', 0),
(18, 'dungnvph18102@fpt.edu.vn', 'Dũng Xì Boo', '1234', '1234', 0),
(19, 'dungnvph18102@fpt.edu.vn', 'Dũng Xì Boo', '1234', '1234', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

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
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
