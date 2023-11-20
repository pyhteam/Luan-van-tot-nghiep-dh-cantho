-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2023 lúc 05:23 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc_php_noithat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'doitac@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'giangvien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `tags_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `detail_header` text DEFAULT NULL,
  `detail_body` text DEFAULT NULL,
  `detail_footer` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `cat_id`, `tags_id`, `title`, `status`, `detail_header`, `detail_body`, `detail_footer`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 'Khám phá sức hấp dẫn kỳ lạ của phong cách nội thất Moroccan', 1, 'Bên cạnh các phong cách thiết kế nội thất Scandinavian, Bohemian, phong cách hiện đại, cổ điển v.v…Chúng ta còn có một phong cách ít được biết đến: phong cách Moroccan (Maroc). Một lối thiết kế khá phổ biến tại các khu vực Bắc Phi và Ả Rập.', 'Moroccan phiên âm tiếng Việt có nghĩa là Ma Rốc. Đây là phong cách được thiết kế dựa trên sự hòa trộn của nhiều nền văn hóa khác nhau. Điển hình là từ Châu Âu, Châu Phi và Địa Trung Hải.\r\n\r\nNhắc đến phong cách Moroccan, ta liên tưởng đến những đường nét chạm trổ tinh xảo. Sự mộc mạc đậm chất Châu Phi. Những sắc màu sặc sỡ. Các chất liệu tự nhiên với hơi thở gần gũi. Hệt như phong cách Scandinavian hay phong cách Hy Lạp, Địa Trung Hải.                        ', 'Sự kết hợp giữa các nền văn hóa làm cho phong cách Moroccan trở nên nổi bật hơn. Moroccan Như một làn gió lạ, tô điểm thêm nhiều sắc màu cho các công trình kiến trúc, nội thất.                        ', 'blog1476jpg', '2022-10-09 16:09:39', '2022-11-11 15:50:44'),
(2, 1, 4, 'Cách phối màu hiệu quả và ý nghĩa của màu sắc trong nội thất', 1, 'Màu sắc luôn hiện hữu ở mọi khía cạnh trong cuộc sống của chúng ta. Một số màu sắc khiến chúng ta vui vẻ, và có những màu sắc mà chúng ta buồn bả, thờ ơ, v.v…Chúng ta có xu hướng bị thu hút bởi một số màu sắc nhất định, nhưng lại cảm thấy khó khăn để “kết hợp các màu sắc với nhau”.', ' Không có gì là ngẫu nhiên trong cách mà các nhà thiết kế nội thất sử dụng màu sắc. Trên thực tế, các nhà thiết kế nội thất đều sử dụng màu sắc có chủ ý để gợi lên những tâm trạng và cảm xúc nhất định. Do đó, hiểu về cách màu sắc ảnh hưởng đến cảm xúc, tâm trạng, có thể giúp bạn phối màu trong nội thất một cách hiệu quả.                                               ', 'Là một màu trung tính linh hoạt và có nhiều sắc độ xám khác nhau. Nội thất màu xám có thể gợi lên cảm giác tinh tế, nhưng nếu sử dụng nhiều quá có thể khiến căn phòng trở nên tẻ nhạt hoặc dễ gây trầm cảm.                                                ', 'blog2996jpg', '2022-10-09 16:10:29', '0000-00-00 00:00:00'),
(3, 2, 6, 'KHI NỘI THẤT LÀ NIỀM ĐAM MÊ BẤT TẬN', 1, 'Mỗi lần bước vào Nhà Xinh, nhiều vị khách đều thấy thoải mái và thích thú với những không gian nội thất đa dạng. Những đôi tay khéo léo, chăm chút từng chi tiết tại Nhà Xinh đã góp phần không nhỏ để tạo nên những không gian đầy cảm hứng này.', 'Từ việc chỉnh lại vị trí của những món đồ trang trí, xếp lại những chiếc ghế sofa, căn chỉnh lại cho tất cả sản phẩm thật hài hòa, vừa vặn trong không gian. Đội ngũ nhân viên tại Nhà Xinh thông thuộc từng góc nhỏ, hiểu rõ từng sản phẩm với muôn vàn màu sắc, chất liệu đa dạng. Khi được đắm chìm trong không gian nội thất, bạn sẽ tinh tế cảm nhận rõ từng đường nét thiết kế, sự mềm mại của chất liệu cho đến những ý tưởng phối hợp độc đáo.', 'Lần tới khi ghé thăm Nhà Xinh, hy vọng mọi người sẽ luôn có trải nghiệm thú vị và được hỗ trợ tận tình nhất từ khi bước vào cho đến tận lúc về nhà với những sản phẩm ưng ý.                        ', 'Noi-that-la-niem-dam-me-bat-tan789.jpg', '2022-11-15 16:08:52', '2022-11-15 16:08:52'),
(4, 6, 5, 'PHÒNG KHÁCH CABO THỜI THƯỢNG ĐỘC ĐÁO', 1, 'Phá cách cùng sofa Cabo 3 chỗ mang phong cách hiện đại, cách phối màu sắc thời trang cùng với sự đa dạng công năng. Sofa Cabo khoác lên mình bởi chất liệu vải cao cấp màu xanh dương tươi mới tạo ra sự mềm mại của lớp đệm ngồi được hoàn thiện sắc xảo và tinh tế ở mọi chi tiết giúp tựa lưng êm ái. Khung ghế được làm từ gỗ, điểm nhấn của sự hòa hợp 2 màu đen và gold ở phần chân kim loại chắc chắn trở nên ấn tượng, sang trọng hơn.', 'Ghế sofa có thể linh động thay đổi vị trí sẽ phù hợp với không gian phòng khách khiêm tốn bởi kiểu dáng nhỏ nhắn và gọn nhẹ. Sự kết hợp tuyệt vời cùng armchair với chiếc bàn nước nhỏ xinh cùng tên là một lựa chọn hoàn hảo cho phòng khách của căn hộ hay nhà riêng.                        ', 'Khi sofa được thiết kế tỉ mỉ, nhấn mạnh vào từng đường nét, tối ưu sự tinh gọn và công năng theo phong cách tối giản, bạn đã có một góc tiếp đãi bạn bè cực kỳ thoải mái, cảm giác nhẹ nhàng ', 'Sofa-Cabo-3-cho-vai-MB2041-9-PMA170078-1-1-1293x800805.jpg', '2022-11-15 16:09:48', '2022-11-15 16:09:48'),
(5, 5, 6, 'BRIDGE – NÉT TINH TẾ CỦA GỖ SỒI', 1, 'Bộ sưu tập Bridge sáng tạo bởi nhà thiết kế Đan Mạch – Hans Sandgren Jakobsen, khéo léo kết hợp hai chất liệu được ưa chuộng từ gỗ sồi Mỹ và da bò tự nhiên Ý.', 'Được chế tác thủ công vô cùng tinh xảo, tạo nên đường nét liền mạch uyển chuyển, thể hiện sự gần gũi thanh lịch cho lối sống tối giản, hiện đại. Với thiết kế vượt thời gian, chạm đến tâm hồn yêu giá trị bền vững và đề cao giá trị tinh thần gắn kết sự hạnh phúc từ lối sống vùng Bắc Âu.\r\n\r\nVới tone màu gỗ nâu và da bò màu cognac, phiên bản Bridge này mang đến sự thanh lịch và ấm cúng cho căn phòng.                        ', 'Điều làm nên sự khác biệt của Bridge đó chính là vật liệu, bên cạnh chất liệu da cao cấp nhật khẩu từ Ý, chất liệu gỗ sồi Mỹ được chọn lựa vô cùng khắt khe. Những vân gỗ phải được sàng lọc để có vân đẹp và đồng đều nhất có thể. Bên cạnh đó, nếu bạn chạm vào Bridge, đó là cảm giác vô cùng mềm mại, tự nhiên và gần gũi.                        ', 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513.jpg', '2022-11-15 16:10:52', '2022-11-15 16:10:52'),
(6, 5, 5, 'PHÒNG KHÁCH COMBO – ĐIỂM DỪNG CHÂN ÊM ÁI', 1, 'Những chiếc sofa góc với kích thước rộng rãi, kiểu dáng sang trọng luôn tạo nên điểm nhấn ấn tượng cho không gian phòng khách hiện đại. Sofa góc Combo mới là một thiết kế mang những ưu điểm vượt trội, dễ dàng phối hợp trong không gian.', 'Với phiên bản bọc da mới này, càng làm nổi bật đường nét mềm mại cũng như phần chân ghế thanh mảnh nhấn chút sắc ánh kim. Bạn có thể kết hợp cùng những chiếc bàn nước mặt đá, kiểu dáng đa dạng tại Nhà Xinh để tạo nên một góc nghỉ chân cho cả gia đình cùng trò chuyện hay xem ti vi, cũng như nơi tiếp đón những vị khách ghé thăm nhà.                        ', 'Sofa góc Combo mới là một thiết kế mang những ưu điểm vượt trội, dễ dàng phối hợp trong không gian.                        ', 'Sofa-goc-combo-04739.jpg', '2022-11-15 16:11:53', '2022-11-15 16:11:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_categoryofblog`
--

CREATE TABLE `blog_categoryofblog` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_categoryofblog`
--

INSERT INTO `blog_categoryofblog` (`id`, `blog_id`, `cat_id`) VALUES
(1, 1, 5),
(2, 1, 4),
(3, 1, 2),
(7, 2, 5),
(8, 2, 4),
(9, 2, 1),
(10, 3, 2),
(11, 4, 6),
(12, 4, 1),
(13, 5, 5),
(14, 5, 1),
(15, 6, 5),
(16, 6, 4),
(17, 6, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tags_id`) VALUES
(1, 1, 4),
(2, 1, 2),
(6, 2, 5),
(7, 2, 4),
(8, 3, 6),
(9, 3, 5),
(10, 3, 4),
(11, 4, 5),
(12, 4, 4),
(13, 5, 6),
(14, 5, 5),
(15, 6, 5),
(16, 6, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Tự túc', 'cit176404.jpg', 1, '2022-11-06 19:30:50', '2023-11-13 19:39:04'),
(4, 'Chương trình dài hạn', 'cit176729.jpg', 1, '2022-11-06 19:31:21', '2023-11-13 19:39:37'),
(5, 'Chương trình ngắn hạn', 'cit176191.jpg', 1, '2022-11-06 19:31:47', '2023-11-13 19:39:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_of_blog`
--

CREATE TABLE `category_of_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category_of_blog`
--

INSERT INTO `category_of_blog` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Y tế, sức khỏe', 1, '2022-10-09 16:05:27', '2022-10-09 16:05:27'),
(2, 'Kinh tế', 1, '2022-10-09 16:05:34', '2022-10-09 16:05:34'),
(3, 'Giáo dục', 1, '2022-10-09 16:05:40', '2022-10-09 16:05:40'),
(4, 'Chính trị', 1, '2022-10-09 16:06:01', '2022-10-09 16:06:01'),
(5, 'Khoa học công nghệ', 1, '2022-10-09 16:06:08', '2022-10-09 16:06:08'),
(6, 'Thế giới', 1, '2022-10-09 16:06:18', '2022-11-11 15:50:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_pro`
--

CREATE TABLE `comment_pro` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_pro`
--

INSERT INTO `comment_pro` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(6, 2, 1659702929, 'Hello ca nha yeu ca kem', '2022-09-29 07:28:29', '2022-09-29 14:28:29'),
(10, 5, 1667752228, 'hello', '2022-11-15 06:17:13', '2022-11-15 13:17:13'),
(11, 5, 1667752228, 'hello', '2022-11-15 06:18:58', '2022-11-15 13:18:58'),
(12, 5, 1667752228, 'Hello ca nha yeu cua ken', '2022-11-15 06:19:10', '2022-11-15 13:19:10'),
(14, 5, 1667752228, 'Sản phẩm rất tuyệt vời, nên dùng thử ', '2022-11-15 06:53:13', '2022-11-15 13:53:13'),
(20, 5, 1667752108, 'Very good', '2022-11-15 07:09:06', '2022-11-15 14:09:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner`
--

CREATE TABLE `partner` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `partner`
--

INSERT INTO `partner` (`id`, `user_name`, `name`, `email`, `password`, `country`, `image`, `created_at`, `updated_at`, `address`) VALUES
(2, 'Đại học Châu Á Thái Bình Dương', 'Đại học Châu Á Thái Bình Dương', 'apu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nhật Bản', NULL, '2023-11-13 19:55:25', '2023-11-13 19:55:25', '1-1 Jumonjibaru, Beppu, Oita, 874-8577 Nhật Bản'),
(3, 'Đại học Chiang Mai', 'Đại học Chiang Mai', 'chiangmai@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Thái Lan', NULL, '2023-11-14 15:36:38', '2023-11-14 15:36:38', ' Amphoe Muang, tỉnh Chiang Mai, Thái Lan'),
(4, 'Đại học Quốc gia Đài Loan', 'Đại học Quốc gia Đài Loan (NTU)', 'ntu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đài Loan', NULL, '2023-11-14 15:38:27', '2023-11-14 15:38:27', 'National Taiwan University, No. 1, Sec 4, Roosevelt Road, Taipei City, 10617 Taiwan'),
(5, 'Đại học Soongsil (Hàn Quốc)', 'Đại học Soongsil', 'soongsil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hàn Quốc', NULL, '2023-11-14 15:39:47', '2023-11-14 15:39:47', '369 Sangdo-ro, Dongjak-gu, Seoul, Hàn Quốc'),
(6, 'Đại học Khoa học và Công Nghệ Trung Quốc (USTC)', 'Đại học Khoa học và Công Nghệ Trung Quốc', 'ustc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Trung Quốc', NULL, '2023-11-14 15:41:08', '2023-11-14 15:41:08', 'No. 245號, Section 3, Yanjiuyuan Road, Nangang District, Taipei City, Đài Loan 115');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productes`
--

CREATE TABLE `productes` (
  `id` bigint(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price_unit` bigint(20) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `thoi_gian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productes`
--

INSERT INTO `productes` (`id`, `name`, `price_unit`, `description`, `status`, `quantity`, `pdf`, `image`, `cat_id`, `created_at`, `updated_at`, `thoi_gian`) VALUES
(1667749806, 'Trao đổi sinh viên nghiên cứu 18 tháng kết hợp học bổng MEXT tại Trường Đại học Hosei-Nhật Bản', 20000000, '- Thời gian trao đổi: 9/2023 - 3/2024 (18 tháng) <br>\r\n- Số lượng: 1<br>\r\n- Tình trạng sinh viên: nghiên cứu sinh (không cấp bằng)<br>\r\n- Quyền lợi:<br>\r\n+ Miễn học phí<br>\r\n+ Sinh hoạt phí và chi phí di chuyển<br>\r\n+ Hỗ trợ tìm chỗ ở (sinh viên tự thanh toán)<br>\r\n- Hạn cuối nộp hồ sơ: 28/1/2022<br>', 1, 1, 'file_pdf625112.pdf', 'Array', 4, '2022-11-06 22:50:06', '2023-11-13 21:37:50', '9/2023 - 3/2024'),
(1667752108, 'Trao đổi sinh viên học tập tại Malaysia từ ngày 18 - 22/7/2023', 12000000, 'Trường CNTT&TT sẽ tổ chức cho sinh viên đi học tại Đại học Châu Á Thái Bình Dương về Công nghệ và Đổi mới sáng tạo. <br>\r\n- Thời gian dự kiến: 18/7/2023 - 22/7/2023 <br>\r\n- Dự kiến chi phí cho toàn bộ chuyến đi: 12 triệu/1 sinh viên.<br>\r\n- Dự kiến số lượng sinh viên: 20 người.<br>\r\nNếu sinh viên được trường ĐHCT cấp học bổng khuyến khích thì sẽ được Trường hỗ trợ tối đa 12 triệu đồng cho mỗi sinh viên. Nếu sinh viên không có học bổng thì tự chi toàn bộ chi phí cho chuyến đi. Không xét cấp học bổng cho sinh viên đã được hỗ trợ trong những năm trước.', 1, 20, 'file_pdf706.pdf', 'Array', 5, '2022-11-06 23:28:28', '2023-11-13 19:40:46', '18/7/2023 - 22/7/2023'),
(1699880738, 'Trao đổi sinh viên học tập tại Đại học Á Châu - Đài Loan', 100000000, '- Thời gian trao đổi: 09/2024 – 03/2025 (18 tháng)<br>\r\n- Số lượng: 5 sinh viên<br>\r\n- Tình trạng sinh viên: nghiên cứu sinh (không cấp bằng)<br>\r\n- Quyền lợi:<br>\r\n+ Miễn học phí (tương đương 100 triệu đồng).<br>\r\n+ Sinh hoạt phí và chi phí di chuyển.<br>\r\n+ Hỗ trợ tìm chỗ ở.<br>\r\n- Hạn cuối nộp hồ sơ: 29/01/2024.', 1, 5, 'asia265.pdf', 'Array', 4, '2023-11-13 20:05:38', '2023-11-13 21:35:40', '09/2024 – 03/2025'),
(1699948102, 'Trao đổi sinh viên học tập tại Indonesia', 12000000, 'Trường CNTT&TT sẽ tổ chức cho sinh viên đi học tại đất nước Indonesia.<br>\r\n- Thời gian trao đổi: 20/5/2023 đến 27/5/2023.<br>\r\n- Số lượng: 10 sinh viên.<br>\r\n- Tình trạng sinh viên: là sinh viên đang theo học tại trường Đại học Cần Thơ.<br>\r\n- Chi phí chuyến đi: Tự túc (khoảng 12 triệu đồng).<br>\r\n- Hạn cuối nộp hồ sơ: 04/05/2023.<br>', 1, 10, 'singapore1164.pdf', 'indonesia170509.jpg', 3, '2023-11-14 14:48:22', '2023-11-14 14:51:33', '20/5/2023 đến 27/5/2023'),
(1699949379, 'Trao đổi sinh viên học tập tại Đại học Khoa học và Công Nghệ Trung Quốc', 15000000, 'Trường CNTT&TT sẽ tổ chức cho sinh viên đi học tại Đại học Khoa học và Công Nghệ Trung Quốc.<br>\r\n- Thời gian trao đổi dự kiến: 08/2024.<br>\r\n- Số lượng: 20 sinh viên.<br>\r\n- Tình trạng sinh viên: là sinh viên đang theo học tại trường Đại học Cần Thơ.<br>\r\n- Chi phí chuyến đi: Tự túc (khoảng 15 triệu đồng).<br>\r\n- Hạn cuối nộp hồ sơ: 12/12/2023.<br>', 1, 20, 'trungquoc156.pdf', 'trungquoc689.jpg', 3, '2023-11-14 15:09:39', '2023-11-14 15:09:39', '08/2024'),
(1699949529, 'Trao đổi sinh viên học tập tại Đại học Soongsil (Hàn Quốc)', 20000000, 'Trường CNTT&TT sẽ tổ chức cho sinh viên đi học tại Đại học Soongsil (Hàn Quốc).<br>\r\n- Thời gian trao đổi dự kiến: 08/2024.<br>\r\n- Số lượng: 20 sinh viên.<br>\r\n- Tình trạng sinh viên: là sinh viên đang theo học tại trường Đại học Cần Thơ.<br>\r\n- Chi phí chuyến đi: Tự túc (khoảng 20 triệu đồng).<br>\r\n- Hạn cuối nộp hồ sơ: 12/12/2023.', 1, 20, 'hanquoc173.pdf', 'Array', 5, '2023-11-14 15:12:09', '2023-11-14 15:19:48', '08/2024'),
(1699949770, 'Trao đổi sinh viên học tập tại Đại học Chiang Mai (Thái Lan)', 12000000, 'Trường CNTT&TT sẽ tổ chức cho sinh viên đi học tại Đại học Chiang Mai (Thái Lan).<br>\r\n- Thời gian trao đổi dự kiến: 19/05/2024 – 19/06/2024.<br>\r\n- Số lượng: 10 sinh viên.<br>\r\n- Tình trạng sinh viên: là sinh viên đang theo học tại trường Đại học Cần Thơ.<br>\r\n- Chi phí chuyến đi: 12 triệu đồng.<br>\r\n- Hạn cuối nộp hồ sơ: 12/12/2023.', 1, 10, 'hanquoc236.pdf', 'Array', 4, '2023-11-14 15:16:10', '2023-11-14 15:16:36', '19/05/2024 – 19/06/2024'),
(1699949960, 'Trao đổi sinh viên học tập tại Đại học Quốc gia Đài Loan (NTU)', 13000000, 'Trường CNTT&TT sẽ tổ chức cho sinh viên đi học tạiĐại học Quốc gia Đài Loan (NTU).<br>\r\n- Thời gian trao đổi dự kiến: 04/2024.<br>\r\n- Số lượng: 15 sinh viên.<br>\r\n- Tình trạng sinh viên: là sinh viên đang theo học tại trường Đại học Cần Thơ.<br>\r\n- Chi phí chuyến đi: 13 triệu đồng.<br>\r\n- Hạn cuối nộp hồ sơ: 12/12/2023.', 0, 15, 'NTU455.pdf', 'dailoan458.jpg', 4, '2023-11-14 15:19:20', '2023-11-18 15:17:27', '04/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(67, 1665236909, 'banner-style-2-img-2.jpg'),
(68, 1665236909, 'banner-style-2-img-3.jpg'),
(69, 1665236909, 'banner-style-2-img-4.jpg'),
(70, 1665236954, 'banner-style-2-img-2988jpg'),
(71, 1665236954, 'banner-style-2-img-3569jpg'),
(72, 1665236954, 'banner-style-2-img-4414jpg'),
(79, 1665245794, 'banner-style-2-img-3478jpg'),
(80, 1665245794, 'banner-style-2-img-4568jpg'),
(81, 1665245794, 'banner-style-3-img-1847jpg'),
(82, 1665245820, 'banner-style-4-img-5850jpg'),
(83, 1665245820, 'banner-style-4-img-6172jpg'),
(84, 1665245820, 'banner-style-4-img-7640jpg'),
(85, 1665245820, 'banner-style-4-img-8990jpg'),
(86, 1665241662, 'banner-style-2-img-1831jpg'),
(87, 1665241662, 'banner-style-2-img-2836jpg'),
(88, 1665241662, 'banner-style-2-img-3681jpg'),
(94, 1665391297, 'default-1501.jpg'),
(95, 1665391297, 'default-2323.jpg'),
(96, 1665391297, 'default-3120.jpg'),
(97, 1665391297, 'default-454.jpg'),
(98, 1665391297, 'default-5845.jpg'),
(99, 1665391297, 'default-6244.jpg'),
(104, 1667745387, 'pro_mau_tu_nhien_noi_that_moho_ban_sofa__ban_tra_go_cao_su_milan_601_2_d28fde4149e54fc7af02903cd6998081_master389.jpg'),
(105, 1667745387, 'pro_mau_tu_nhien_noi_that_moho_ban_sofa__ban_tra_go_cao_su_milan_601_3_5a7dd5037ac24566bc8fe457b7586de1_master60.jpg'),
(106, 1667745387, 'pro_mau_tu_nhien_noi_that_moho_ban_sofa__ban_tra_go_cao_su_milan_601_4_b643623e75934fa88b8681754c11eebc_master551.jpg'),
(107, 1667745387, 'pro_mau_tu_nhien_noi_that_moho_ban_sofa__ban_tra_go_cao_su_milan_601_5530fe0428d64d1aac342df6ed735e21_master437.jpg'),
(108, 1667745387, 'pro_mau_tu_nhien_noi_that_moho_ban_sofa_ban_tra_go_cao_su_milan_601_1_dae76a6cc83841a28e7f99d424098f0c_master463.jpg'),
(278, 1667752108, 'malaysia653.jpg'),
(279, 1667749806, 'Du-hoc-dai-hoc-Hosei-Nhạt-ban231.jpg'),
(284, 1697290522, 'banner-style-2-img-2378.jpg'),
(285, 1697290566, 'banner-style-2-img-2426.jpg'),
(286, 1697290611, 'banner-style-2-img-2500.jpg'),
(287, 1697290647, 'banner-style-2-img-2887.jpg'),
(288, 1697290661, 'banner-style-2-img-2688.jpg'),
(289, 1697290713, 'banner-style-2-img-2666.jpg'),
(290, 1697290730, 'banner-style-2-img-297.jpg'),
(291, 1697290864, 'banner-style-2-img-1830.jpg'),
(294, 1697723948, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513344.jpg'),
(295, 1697723948, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513765785.jpg'),
(296, 1697724002, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513207.jpg'),
(297, 1697724007, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513181.jpg'),
(298, 1697724045, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513904.jpg'),
(299, 1697724045, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach51376563.jpg'),
(300, 1697724081, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513636.jpg'),
(301, 1697724081, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513765774.jpg'),
(302, 1697724112, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513493.jpg'),
(303, 1697724112, 'Armchair-Bridge-Go-Nau-Da-cognac-phong-khach513765229.jpg'),
(305, 1699880480, 'achau758.jpg'),
(306, 1699880522, 'achau656.jpg'),
(307, 1699880554, 'achau967.jpg'),
(308, 1699880582, 'achau412.jpg'),
(309, 1699880594, 'achau69.jpg'),
(310, 1699880604, 'achau466.jpg'),
(311, 1699880731, 'achau725.jpg'),
(312, 1699880738, 'achau326.jpg'),
(313, 1699948102, 'indonesia170509.jpg'),
(314, 1699949379, 'trungquoc689.jpg'),
(315, 1699949529, 'dai-hoc-soong-sil112.jpg'),
(316, 1699949770, 'thailan582.jpg'),
(317, 1699949960, 'dailoan458.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `image`, `status`) VALUES
(6, 'hero-slider-2.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Sức khỏe ', 1, '2022-10-09 16:06:51', '2022-11-16 13:45:08'),
(4, 'Thiết kế nội thất', 1, '2022-10-09 16:07:06', '2022-10-09 16:07:06'),
(5, 'Cuộc sống', 1, '2022-10-09 16:07:14', '2022-10-09 16:07:14'),
(6, 'Du lịch', 1, '2022-10-09 16:07:22', '2022-10-20 01:34:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `passport` int(255) NOT NULL,
  `av` varchar(255) NOT NULL,
  `hoc_bong` varchar(255) NOT NULL,
  `diemtb` float NOT NULL,
  `diemtl` float NOT NULL,
  `trao_doi` varchar(255) NOT NULL,
  `nckh` varchar(255) NOT NULL,
  `ma_lop` varchar(255) NOT NULL,
  `nganh` varchar(255) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `hinh_thuc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `full_name`, `phone`, `email`, `status`, `created_at`, `updated_at`, `passport`, `av`, `hoc_bong`, `diemtb`, `diemtl`, `trao_doi`, `nckh`, `ma_lop`, `nganh`, `ngay_sinh`, `hinh_thuc`, `image`, `name`, `product_id`) VALUES
(164, 56, 'Ma Seo  Sen', '034234233344', 'senms9x@gmail.com', 2, '2023-11-20 16:02:11', '2023-11-20 22:19:50', 2147483647, '0', '0', 8, 8, '2022', '0', 'L00001', 'Ngành công nghệ thông tin', '2023-11-17', '0', 'malaysia653.jpg', 'Trao đổi sinh viên học tập tại Malaysia từ ngày 18 - 22/7/2023', 1667752108);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistical`
--

CREATE TABLE `tbl_statistical` (
  `id_statistical` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id_statistical`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(1, '2022-11-08', '20000000', '7000000', 90, 10),
(2, '2022-11-07', '68000000', '9000000', 60, 8),
(3, '2022-11-06', '30000000', '3000000', 45, 7),
(4, '2022-11-05', '45000000', '3800000', 30, 9),
(5, '2022-11-04', '30000000', '1500000', 15, 12),
(6, '2022-11-03', '8000000', '700000', 65, 30),
(7, '2022-11-02', '28000000', '23000000', 32, 20),
(8, '2020-11-01', '25000000', '20000000', 7, 6),
(9, '2022-10-31', '36000000', '28000000', 40, 15),
(10, '2022-10-30', '50000000', '13000000', 89, 19),
(11, '2022-10-29', '20000000', '15000000', 63, 11),
(12, '2022-10-28', '25000000', '16000000', 94, 14),
(13, '2022-10-27', '32000000', '17000000', 16, 10),
(14, '2022-10-26', '33000000', '19000000', 14, 5),
(15, '2022-10-25', '36000000', '18000000', 22, 12),
(16, '2022-10-24', '34000000', '20000000', 33, 20),
(17, '2022-10-23', '25000000', '16000000', 94, 14),
(18, '2022-10-22', '12000000', '7000000', 16, 10),
(19, '2022-10-21', '63000000', '19000000', 14, 5),
(20, '2022-10-20', '66000000', '18000000', 22, 12),
(21, '2022-10-19', '74000000', '20000000', 33, 20),
(22, '2022-10-18', '63000000', '19000000', 14, 5),
(23, '2022-10-17', '66000000', '18000000', 23, 12),
(24, '2022-10-16', '74000000', '20000000', 32, 20),
(25, '2022-10-15', '63000000', '19000000', 14, 5),
(26, '2020-10-14', '66000000', '18000000', 23, 12),
(27, '2020-10-13', '74000000', '20000000', 33, 20),
(28, '2020-10-12', '66000000', '18000000', 23, 12),
(29, '2020-10-11', '74000000', '20000000', 10, 20),
(30, '2020-10-10', '63000000', '19000000', 14, 5),
(31, '2020-10-09', '66000000', '18000000', 23, 12),
(32, '2020-10-08', '74000000', '20000000', 15, 20),
(33, '2020-10-07', '66000000', '18000000', 23, 12),
(34, '2020-10-06', '74000000', '20000000', 30, 22),
(35, '2020-10-05', '66000000', '18000000', 23, 12),
(36, '2020-10-04', '74000000', '20000000', 32, 20),
(37, '2020-10-03', '63000000', '19000000', 14, 5),
(38, '2020-10-02', '66000000', '18000000', 23, 12),
(39, '2020-10-01', '74000000', '20000000', 32, 20),
(40, '2020-09-30', '63000000', '19000000', 14, 5),
(41, '2020-09-29', '66000000', '18000000', 23, 12),
(42, '2020-09-28', '74000000', '20000000', 15, 20),
(43, '2020-09-27', '66000000', '18000000', 23, 12),
(44, '2020-09-26', '74000000', '20000000', 30, 22),
(45, '2020-09-25', '66000000', '18000000', 23, 12),
(46, '2020-09-24', '74000000', '20000000', 32, 20),
(47, '2020-09-23', '63000000', '19000000', 14, 5),
(48, '2020-09-22', '66000000', '18000000', 23, 12),
(49, '2020-09-21', '74000000', '20000000', 32, 20),
(50, '2020-09-20', '63000000', '19000000', 14, 5),
(51, '2020-09-19', '66000000', '18000000', 23, 12),
(52, '2020-09-18', '74000000', '20000000', 15, 20),
(53, '2020-09-17', '66000000', '18000000', 23, 12),
(54, '2020-09-16', '74000000', '20000000', 30, 22),
(55, '2020-09-15', '66000000', '18000000', 23, 12),
(56, '2020-09-14', '74000000', '20000000', 32, 20),
(57, '2020-09-13', '63000000', '19000000', 14, 5),
(58, '2020-09-12', '66000000', '18000000', 23, 12),
(59, '2020-09-11', '74000000', '20000000', 32, 20),
(60, '2020-09-10', '63000000', '19000000', 14, 5),
(61, '2020-09-09', '66000000', '18000000', 23, 12),
(62, '2020-09-08', '74000000', '20000000', 15, 20),
(63, '2020-09-07', '66000000', '18000000', 23, 12),
(64, '2020-09-06', '74000000', '20000000', 30, 22),
(65, '2020-09-05', '66000000', '18000000', 23, 12),
(66, '2020-09-04', '74000000', '20000000', 32, 20),
(67, '2020-09-03', '63000000', '19000000', 14, 5),
(68, '2020-09-02', '66000000', '18000000', 23, 12),
(69, '2020-09-01', '74000000', '20000000', 32, 20),
(71, '2022-11-15', '356530000', '35653000', 26, 6),
(73, '2022-11-16', '99368000', '8687800', 12, 3),
(74, '2022-12-03', '12980000', '649000', 2, 1),
(75, '2023-04-13', '63430000', '5120000', 7, 4),
(76, '2023-10-05', '36970000', '2448000', 3, 2),
(77, '2023-10-14', '0', '0', 0, 1),
(78, '2023-11-13', '0', '0', 0, 2),
(79, '2023-11-14', '0', '0', 0, 2),
(80, '2023-11-18', '0', '0', 0, 1),
(81, '2023-11-20', '0', '0', 0, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `conscious` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `commune` varchar(100) DEFAULT NULL,
  `address_detail` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `ma_lop` varchar(255) NOT NULL,
  `nganh` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `khoa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `full_name`, `email`, `phone`, `country`, `conscious`, `district`, `commune`, `address_detail`, `password`, `created_at`, `updated_at`, `image`, `ma_lop`, `nganh`, `ngay_sinh`, `khoa`) VALUES
(15, 'B1910003', 'Dương Minh Minh', 'b1910003@gmail.com', '02356987425', 'Việt Nam', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'Hẻm 51, đường 3/2', 'e10adc3949ba59abbe56e057f20f883e', '2023-10-17 07:46:03', '2023-10-17 07:46:03', NULL, 'DI19V7A5\n', 'Công nghệ thông tin', '2001-03-05', 'Trường CNTT&TT'),
(23, 'B1910010', 'Nguyễn Cao Ngân', 'b1910010@gmail.com', '0842002365', 'Việt Nam', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'KTX B - ĐHCT, đường 3/2', '193df35db8e40c4bacd7148dd33fbc76', '2023-11-13 12:42:32', '2023-11-13 12:42:32', NULL, 'DI19V7A1', '0', '2001-12-12', '0'),
(24, 'B1910011', 'Phan Cộng Hòa', 'b1910011@gmail.com', '0845632569', 'Việt Nam', 'Cần Thơ', 'Ninh Kiều', 'Xuân Khánh', 'KTX A - ĐHCT, đường 3/2', 'f04036f834e6931d67ab6caca6e9bf2d', '2023-11-13 14:18:48', '2023-11-13 14:18:48', NULL, 'DI19K7A1', '1', '2001-02-05', '1'),
(50, 'nguyenvan_1', NULL, 'nguyenvan_1@gmail.com', '034234234234', NULL, NULL, NULL, NULL, NULL, '38ad85ecfc4d8503b90581f7ed1f54a3', '2023-11-18 08:08:48', NULL, NULL, 'L00001', 'Ngành công nghệ thông tin', '0000-00-00', '2017'),
(51, 'nguyenvan_2', NULL, 'nguyenvan_2@gmail.com', '034234235435', NULL, NULL, NULL, NULL, NULL, '4888871a4f1850f22fcd202102a91b74', '2023-11-18 08:08:50', NULL, NULL, 'L00001', 'Ngành công nghệ thông tin', '0000-00-00', '2017'),
(52, 'nguyenvan_3', NULL, 'nguyenvan_3@gmail.com', '034234236454', NULL, NULL, NULL, NULL, NULL, '439a47b29afad0417bd3d24260baf398', '2023-11-18 08:08:53', NULL, NULL, 'L00001', 'Ngành công nghệ thông tin', '0000-00-00', '2017'),
(56, 'senms9x', NULL, 'senms9x@gmail.com', '034234233344', NULL, NULL, NULL, NULL, NULL, '86ac0b0a2320fcee0bb14a38192d86f9', '2023-11-18 08:16:19', NULL, NULL, 'L00001', 'Ngành công nghệ thông tin', '0000-00-00', '2017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 20, 1659490882, '2022-10-28 11:41:17', '2022-10-28 11:41:17'),
(2, 20, 1659491472, '2022-10-28 11:45:31', '2022-10-28 11:45:31'),
(3, 20, 1659494328, '2022-10-28 11:45:43', '2022-10-28 11:45:43'),
(4, 20, 1659702929, '2022-10-28 11:54:01', '2022-10-28 11:54:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_categoryofblog`
--
ALTER TABLE `blog_categoryofblog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_of_blog`
--
ALTER TABLE `category_of_blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_pro`
--
ALTER TABLE `comment_pro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  ADD PRIMARY KEY (`id_statistical`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blog_categoryofblog`
--
ALTER TABLE `blog_categoryofblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category_of_blog`
--
ALTER TABLE `category_of_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comment_pro`
--
ALTER TABLE `comment_pro`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `productes`
--
ALTER TABLE `productes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1699949961;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  MODIFY `id_statistical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
