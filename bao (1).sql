-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 03:09 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `paragraph` text NOT NULL,
  `id_article` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baigioithieu`
--

CREATE TABLE `baigioithieu` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagraph` text NOT NULL,
  `id_blog` int(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`id`, `image`, `title`, `pagraph`, `id_blog`, `status`) VALUES
(71, 'baiviet.jpg', 'Câu Chuyện Thương Hiệu', 'Dream Si được khai sinh từ tình yêu với những hương vị tự nhiên và mong muốn tạo ra không gian thư giãn cho mỗi khách hàng. Cái tên \"Dream Si\" mang ý nghĩa đồng hành cùng bạn trong những khoảnh khắc tạo nên giấc mơ và câu chuyện đẹp trong cuộc sống. Tại đây, chúng tôi không chỉ mang đến những ly đồ uống ngon, mà còn là sự kết nối đặc biệt giữa con người và những giây phút thư giãn.\r\nGiá Trị Cốt Lõi', 13, 1),
(72, '', '1. CHẤT LƯỢNG TIN CẬY', 'Dream Si luôn đặt tiêu chí chất lượng lên hàng đầu. Chúng tôi tuyệt đối sử dụng nguyên liệu tươi ngon, được chọn lọc kỹ càng, đảm bảo sự tươi ngon và an toàn. Mỗi sản phẩm đều được thực hiện với quy trình pha chế chuyên nghiệp, tâm huyết và tận tâm để mang đến những ly đồ uống ngon miệng và đáng nhớ. Hương vị độc đáo của từng ly đồ uống là một bản giao hưởng, đem lại trải nghiệm khó quên.', 13, 1),
(73, '', '2. DỊCH VỤ CHUYÊN NGHIỆP & TẬN TÂM', 'Tại Dream Si, chúng tôi luôn lắng nghe để hiểu rõ nhu cầu và mong muốn của từng khách hàng. Đội ngũ nhân viên thân thiện, được đào tạo bài bản luôn sẵn sàng phục vụ với phong cách chuyên nghiệp. Không gian ấm cúng và được trang trí đẹp mắt chính là nơi bạn có thể tận hưởng những khoảnh khắc bình yên nhất.', 13, 1),
(74, '', '3. THƯƠNG HIỆU ĐÁNG TIN CẬY', 'Dream Si luôn nỗ lực xây dựng hình ảnh thương hiệu đáng tin cậy trong lòng khách hàng. Với cam kết từ chất lượng đồ uống đến dịch vụ chuyên nghiệp, chúng tôi không ngừng khẳng định vị thế là điểm đến lý tưởng và đáng tin cậy cho mọi người.', 13, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`) VALUES
(1, 'banner.png'),
(2, 'banner1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagaph` text NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `image`, `title`, `pagaph`, `day`) VALUES
(13, 'baiviet.jpg', 'Câu Chuyện Thương Hiệu', 'Dream Si được khai sinh từ tình yêu với những hương vị tự nhiên và mong muốn tạo ra không gian......', '2024-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cà Phê'),
(2, 'Trà Sữa'),
(3, 'Sinh Tố'),
(6, 'Nước Ép');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories_items`
--

CREATE TABLE `categories_items` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`id`, `image`) VALUES
(1, 'banner1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`id`, `image`) VALUES
(1, 'banner.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `haianh`
--

CREATE TABLE `haianh` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `haianh`
--

INSERT INTO `haianh` (`id`, `image`) VALUES
(1, 'banner5.jpg'),
(2, 'banner4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `pagraph` text NOT NULL,
  `id_info` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `image`, `name`, `price`, `pagraph`, `id_info`, `status`) VALUES
(8, 'bot-ca-cao.jpg', 'Bột Ca Cao', 120.000, 'Bột Ca Cao nguyên chất được chế biến từ hạt ca cao tươi ngon, không qua xử lý hóa học, đảm bảo giữ trọn hương vị đắng nhẹ đặc trưng. Sản phẩm giàu chất chống oxy hóa, tốt cho tim mạch và giúp cải thiện tâm trạng. Phù hợp để làm bánh, đồ uống hoặc các món tráng miệng. Đóng gói tiện lợi, dễ dàng bảo quản và sử dụng trong nhiều công thức nấu ăn đa dạng.', 1, 1),
(9, 'Botcarot.jpg', 'Bột Cà Rốt', 90.000, 'Bột Cà Rốt được làm từ cà rốt tươi được sấy khô và xay nhuyễn, giữ lại tối đa vitamin A và các chất dinh dưỡng thiết yếu. Sản phẩm không chứa chất bảo quản hay phẩm màu, thích hợp cho các bữa ăn lành mạnh. Có thể sử dụng trong sinh tố, súp, bánh mì hoặc các món ăn khác để tăng hương vị và bổ sung dinh dưỡng. Đóng gói kín, bảo quản lâu dài mà không mất đi giá trị dinh dưỡng.', 2, 1),
(10, 'Bot-ot.jpg', 'Bột Ớt', 70.000, 'Bột Ớt tự nhiên được chế biến từ ớt tươi, không thêm bất kỳ phẩm màu hay chất bảo quản nào, giữ được hương vị cay nồng đặc trưng. Sản phẩm thích hợp để làm gia vị cho các món ăn như mì, súp, thịt nướng, và các món ăn truyền thống khác. Độ cay vừa phải, phù hợp với nhiều khẩu vị. Đóng gói tiện lợi, dễ dàng sử dụng và bảo quản, giúp bạn thêm phần nóng hổi cho các bữa ăn hàng ngày.', 4, 1),
(11, 'Botgaochin.jpg', 'Bột Gạo Chín', 85.000, 'Bột Gạo Chín được làm từ gạo chín rang vàng, mang lại hương vị thơm ngon và mùi thơm đặc trưng của gạo rang. Sản phẩm giàu carbohydrate, cung cấp năng lượng cho cơ thể, phù hợp để làm bánh, bánh xốp, bánh crepe, hoặc các món ăn truyền thống như xôi, chè. Đóng gói kín để bảo quản độ tươi ngon và giữ được chất lượng lâu dài. Thích hợp cho cả người lớn và trẻ em.', 5, 1),
(12, 'bot-nhan-sam.jpg', 'Bột Ca Cao Nhân Sâm', 150.000, 'Kết hợp giữa hương vị đậm đà của Bột Ca Cao nguyên chất và lợi ích sức khỏe từ nhân sâm, sản phẩm Bột Ca Cao Nhân Sâm giúp tăng cường sức đề kháng, cải thiện sức khỏe tổng thể. Thích hợp để pha chế các loại đồ uống bổ dưỡng, sinh tố, hoặc các món tráng miệng. Đóng gói tiện lợi, dễ dàng bảo quản và sử dụng hàng ngày để duy trì sức khỏe và năng lượng. Không chứa chất bảo quản hay phẩm màu.', 7, 1),
(13, 'bot-ca-chua.jpg', 'Bột Cà Chua', 95.000, 'Bột Cà Chua tự nhiên được làm từ cà chua chín mọng, sấy khô và xay nhuyễn, giữ lại hương vị ngọt thanh và màu đỏ hấp dẫn. Sản phẩm giàu lycopene, một chất chống oxy hóa mạnh mẽ, tốt cho tim mạch và da. Thích hợp để sử dụng trong các món nước sốt, súp, nước ép, hoặc làm gia vị cho các món ăn hàng ngày. Đóng gói kín, bảo quản lâu dài mà không mất đi hương vị và chất dinh dưỡng.', 8, 1),
(14, 'bot-cai-bo-xoi.jpg', 'Bột Cải Bó Xôi', 110.000, 'Bột Cải Bó Xôi được chế biến từ cải bó xôi tươi ngon, giữ lại nhiều chất xơ, vitamin và khoáng chất cần thiết cho cơ thể. Sản phẩm không chứa chất bảo quản, phù hợp cho các bữa ăn lành mạnh, sinh tố, hoặc các món ăn chay. Giúp cải thiện hệ tiêu hóa, tăng cường sức khỏe tim mạch và hỗ trợ giảm cân. Đóng gói tiện lợi, dễ dàng bảo quản và sử dụng trong nhiều công thức nấu ăn đa dạng.', 9, 1),
(15, 'bot-cai-xoan.jpg', 'Bột Cải Xoăn', 120.000, 'Bột Cải Xoăn hữu cơ được làm từ cải xoăn tươi, giàu vitamin K, C và các chất chống oxy hóa. Sản phẩm giúp hỗ trợ sức khỏe xương, cải thiện hệ miễn dịch và giảm viêm nhiễm trong cơ thể. Thích hợp để thêm vào sinh tố, nước ép, súp hoặc các món ăn khác để tăng cường dinh dưỡng. Đóng gói kín, bảo quản dễ dàng và giữ được chất lượng dinh dưỡng lâu dài. Không chứa chất bảo quản hay phẩm màu.', 10, 1),
(16, 'bot-collagen-ca.jpg', 'Bột Collagen Cá', 300.000, 'Bột Collagen Cá được chiết xuất từ da và xương cá biển sâu, giàu collagen tự nhiên giúp cải thiện độ đàn hồi của da, giảm nếp nhăn và hỗ trợ sức khỏe tóc và móng. Sản phẩm dễ dàng hòa tan trong nước, sữa hoặc sinh tố, phù hợp để bổ sung hàng ngày cho cả nam và nữ. Đóng gói tiện lợi, đảm bảo chất lượng cao và không chứa các chất phụ gia độc hại. Giúp duy trì vẻ đẹp và sức khỏe từ bên trong.', 11, 1),
(17, 'bot-dau-nanh-nhan-sam.jpg', 'Bột Đậu Nành Nhân Sâm', 130.000, 'Bột Đậu Nành Nhân Sâm kết hợp giữa đậu nành giàu protein và nhân sâm bổ dưỡng, hỗ trợ sức khỏe toàn diện, tăng cường năng lượng và cải thiện chức năng não bộ. Sản phẩm thích hợp để làm sinh tố, đồ uống bổ dưỡng, hoặc thêm vào các món ăn hàng ngày để tăng cường dinh dưỡng. Đóng gói kín, dễ dàng bảo quản và sử dụng, không chứa chất bảo quản hay phẩm màu, phù hợp cho cả người lớn và trẻ em.', 12, 1),
(18, 'bot-gao-lut.jpg', 'Bột Gạo Lứt', 70.000, 'Bột Gạo Lứt nguyên chất được làm từ gạo lứt rang xay nhuyễn, giàu chất xơ và các vitamin nhóm B. Sản phẩm giúp hỗ trợ hệ tiêu hóa, tốt cho tim mạch và thích hợp cho người ăn kiêng. Có thể sử dụng để làm bánh, cháo hoặc sinh tố. Đóng gói tiện lợi, dễ bảo quản và đảm bảo chất lượng lâu dài. Không chứa phẩm màu hay chất bảo quản.', 13, 1),
(19, 'bot-hoa-dau-biec-txk9mivr.jpg', 'Bột Hoa Dầu Biếc', 95.000, 'Bột Hoa Đậu Biếc tự nhiên được làm từ hoa đậu biếc sấy khô và xay nhuyễn, mang màu xanh tím đẹp mắt và giàu chất chống oxy hóa. Sản phẩm giúp cải thiện sức khỏe tim mạch, tăng cường miễn dịch và làm đẹp da. Dễ dàng pha chế đồ uống, làm bánh, hoặc sử dụng trong nấu ăn. Đóng gói kín, bảo quản lâu dài mà không mất đi hương vị và màu sắc tự nhiên.', 14, 1),
(20, 'bot-hung-que-nguyen-chat.jpg', 'Bột Húng Quế Nguyên Chất', 85.000, 'Bột Húng Quế Nguyên Chất được làm từ lá húng quế tươi, giữ nguyên hương thơm đặc trưng và các dưỡng chất thiết yếu. Sản phẩm thích hợp để làm gia vị cho các món ăn như salad, nước sốt, mì Ý, hoặc các món chay. Bột không chứa phẩm màu, chất bảo quản, giúp tăng hương vị cho các bữa ăn hàng ngày. Đóng gói nhỏ gọn, tiện lợi, dễ bảo quản và sử dụng.', 15, 1),
(21, 'bot-la-mo.jpg', 'Bột Lá Mơ', 80.000, 'Bột Lá Mơ tự nhiên được chế biến từ lá mơ tươi, giàu chất xơ và các chất dinh dưỡng tốt cho hệ tiêu hóa. Sản phẩm hỗ trợ giảm viêm, làm mát cơ thể và tăng cường sức khỏe. Có thể sử dụng trong sinh tố, nước ép, hoặc làm gia vị cho các món ăn. Đóng gói tiện lợi, không chứa chất bảo quản hay phụ gia, phù hợp cho mọi đối tượng sử dụng.', 16, 1),
(23, 'bot-ngai-cuu-nguyen-cha.jpg', 'Bột Ngải Cứu Nguyên Chất', 75.000, 'Bột Ngải Cứu Nguyên Chất được làm từ lá ngải cứu tươi, giàu dưỡng chất giúp tăng cường sức khỏe, giảm căng thẳng và hỗ trợ hệ tiêu hóa. Sản phẩm thích hợp để pha trà, làm bánh, hoặc làm gia vị cho các món ăn truyền thống. Đóng gói kín, bảo quản tiện lợi và sử dụng dễ dàng. Không chứa phẩm màu hay hóa chất độc hại, an toàn cho mọi đối tượng sử dụng.', 18, 1),
(24, 'bot-nghe-vang-sdtvyfzp.jpg', 'Bột Nghệ Vàng', 80.000, 'Bột Nghệ Vàng nguyên chất được chế biến từ củ nghệ tươi, giàu curcumin giúp giảm viêm, hỗ trợ tiêu hóa và làm đẹp da. Thích hợp để pha trà, làm mặt nạ hoặc dùng trong nấu ăn. Đóng gói kín, dễ dàng bảo quản và sử dụng, không chứa chất bảo quản hay phụ gia.', 19, 1),
(25, 'bot-ngu-coc-nhan-sam.jpg', 'Bột Ngũ Cốc Nhân Sâm', 200.000, 'Bột Ngũ Cốc Nhân Sâm là sự kết hợp giữa ngũ cốc nguyên chất và nhân sâm, giúp bổ sung năng lượng và tăng cường sức khỏe tổng thể. Sản phẩm thích hợp để làm bữa sáng, sinh tố hoặc đồ ăn nhẹ. Đóng gói kín, bảo quản dễ dàng và sử dụng tiện lợi.', 20, 1),
(26, 'bot-oc-cho.jpg', 'Bột Óc Chó', 180.000, 'Bột Óc Chó được làm từ hạt óc chó nguyên chất, giàu omega-3 và các dưỡng chất tốt cho tim mạch, não bộ và da. Sản phẩm thích hợp để thêm vào sữa, bánh hoặc các món ăn lành mạnh. Đóng gói kín, bảo quản lâu dài và an toàn cho người dùng.', 21, 1),
(27, 'bot-rau-ma-nguyen-chat-4roaiwhm.jpg', 'Bột Rau Má Nguyên Chất', 90.000, 'Bột Rau Má Nguyên Chất được chế biến từ rau má tươi, giúp làm mát cơ thể, tăng cường sức khỏe và cải thiện làn da. Sản phẩm thích hợp để pha nước uống, làm mặt nạ hoặc dùng trong các món ăn. Đóng gói kín, không chứa chất bảo quản hay phụ gia.', 22, 1),
(28, 'bot-rong-bien-u5qlz1zw.jpg', 'Bột Rong Biển', 120.000, 'Bột Rong Biển làm từ rong biển tự nhiên, giàu i-ốt và các khoáng chất cần thiết, giúp hỗ trợ sức khỏe tuyến giáp và tăng cường miễn dịch. Sản phẩm dễ sử dụng trong súp, cháo hoặc làm gia vị. Đóng gói tiện lợi, bảo quản lâu dài mà không mất đi dinh dưỡng.', 23, 1),
(29, 'bot-rong-nho-wyqnpfpd.jpg', 'Bột Rong Nho', 150.000, 'Bột Rong Nho được làm từ rong nho tươi, giàu collagen và các chất chống oxy hóa, giúp làm đẹp da và tăng cường sức khỏe. Sản phẩm thích hợp để pha chế đồ uống, sinh tố hoặc làm gia vị. Đóng gói kín, dễ dàng bảo quản và sử dụng hàng ngày.', 24, 1),
(30, 'bot-sachi-f3pbtkqz.png', 'Bột Sachi', 250.000, 'Bột Sachi được chế biến từ hạt sachi nguyên chất, giàu omega-3, omega-6 và protein thực vật, giúp cải thiện sức khỏe tim mạch và hỗ trợ giảm cân. Sản phẩm thích hợp để pha chế sinh tố, nước uống hoặc làm bánh. Đóng gói tiện lợi, không chứa chất bảo quản.', 25, 1),
(31, 'bot-sam-ngoc-linh.jpg', 'Bột Sâm Ngọc Linh', 400.000, 'Bột Sâm Ngọc Linh là sản phẩm cao cấp được làm từ củ sâm Ngọc Linh tươi, giàu dưỡng chất giúp tăng cường sức khỏe, giảm căng thẳng và cải thiện miễn dịch. Thích hợp để pha trà, sử dụng trực tiếp hoặc làm quà tặng. Đóng gói kín, bảo quản lâu dài và dễ sử dụng.', 26, 1),
(32, 'bot-sam-to-nu.jpg', 'Bột Sâm Tố Nữ', 350.000, 'Bột Sâm Tố Nữ được chế biến từ củ sâm Tố Nữ, giàu phytoestrogen tự nhiên, giúp cân bằng nội tiết tố, làm đẹp da và hỗ trợ sức khỏe sinh lý nữ. Sản phẩm thích hợp để pha trà, sinh tố hoặc dùng trực tiếp. Đóng gói tiện lợi, bảo quản dễ dàng.', 27, 1),
(33, 'bot-san-day-n5cvdbks.jpg', 'Bột Sắn Dây', 50.000, 'Bột Sắn Dây nguyên chất được làm từ củ sắn dây tự nhiên, giúp thanh nhiệt, giải độc và hỗ trợ tiêu hóa. Sản phẩm dễ dàng pha chế thành đồ uống mát lạnh hoặc sử dụng trong nấu ăn. Đóng gói tiện lợi, dễ bảo quản.', 28, 1),
(34, 'bot-trai-dua-bloobsuf.jpg', 'Bột Trái Dứa', 60.000, 'Bột Trái Dứa tự nhiên, giữ nguyên hương vị và dưỡng chất của trái dứa tươi. Sản phẩm giúp tăng cường miễn dịch, hỗ trợ tiêu hóa và làm đẹp da. Thích hợp để pha chế sinh tố, nước ép hoặc làm gia vị nấu ăn.', 29, 1),
(35, 'bot-trai-nhau-qrcu5ed7.jpg', 'Bột Trái Nhàu', 80.000, 'Bột Trái Nhàu được làm từ trái nhàu chín, giàu chất chống oxy hóa và các dưỡng chất tốt cho sức khỏe. Sản phẩm thích hợp để pha trà, làm sinh tố hoặc sử dụng trực tiếp. Đóng gói tiện lợi, dễ bảo quản.', 30, 1),
(36, 'bot-xuyen-tam-lien.png', 'Bột Xuyên Tâm Li', 90.000, 'Bột Xuyên Tâm Li là sản phẩm tự nhiên giúp hỗ trợ thanh nhiệt, giải độc và tăng cường sức khỏe tổng thể. Thích hợp để pha trà hoặc sử dụng làm gia vị trong nấu ăn. Đóng gói kín, dễ dàng bảo quản và sử dụng.', 31, 1),
(37, 'tinh-bot-dau-ha-lan-f012nsdr.png', 'Tinh Bột Hà Lan', 70.000, 'Tinh Bột Hà Lan được chiết xuất từ các loại hạt tự nhiên, giàu dinh dưỡng và phù hợp để chế biến các món ăn hoặc làm nguyên liệu trong công nghiệp thực phẩm. Đóng gói kín, bảo quản lâu dài.', 32, 1),
(38, 'tinh-bot-khoai-mi-dang-hat.png', 'Tinh Bột Khoai Mì', 55.000, 'Tinh Bột Khoai Mì nguyên chất, giàu năng lượng, thích hợp để làm bánh, chè hoặc các món ăn truyền thống. Sản phẩm không chứa chất bảo quản, dễ bảo quản và sử dụng.', 33, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` text NOT NULL,
  `note` text DEFAULT NULL,
  `total_amount` decimal(10,3) NOT NULL,
  `status` enum('Pending','Processing','Completed','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `quantity` decimal(10,3) NOT NULL DEFAULT 0.000,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `status`, `id_category`) VALUES
(1, 'Bạc Sĩu', 'bacsiu.jpg', 25.00, 100.000, 1, 2),
(2, 'Sinh Tố Xoài', 'cach-lam-sinh-to-xoai.jpg', 30.00, 100.000, 1, 3),
(4, 'Cafe Hạt Nguyên Chất', 'cafe.jpg', 16.00, 100.000, 1, 1),
(5, 'Cafe Sữa', 'caphebotbien.jpg', 20.00, 100.000, 1, 1),
(7, 'Cafe Đen', 'capheden.jpg', 25.00, 100.000, 1, 1),
(8, 'Cafe dừa', 'caphedua.jpg', 35.00, 100.000, 1, 1),
(9, 'Cafe Hạnh Nhân', 'caphehanhnhan.jpg', 25.00, 100.000, 1, 1),
(10, 'Cafe Nóng', 'ca-phe-mocha-nong.jpg', 45.00, 100.000, 1, 1),
(11, 'Cafe Muối', 'caphemuoi.jpg', 50.00, 100.000, 1, 1),
(12, 'Cafe Phin', 'caphephin.jpg', 40.00, 100.000, 1, 1),
(13, 'Cafe sữa đá', 'caphesuada.jpg', 20.00, 100.000, 1, 1),
(14, 'Cafe trà', 'caphetra.jpg', 55.00, 100.000, 1, 1),
(15, 'Cafe trứng', 'caphetrung.jpg', 15.00, 100.000, 1, 1),
(16, 'Cafe ColdBrew', 'ColdBrew.jpg', 35.00, 100.000, 1, 1),
(18, 'Nước Ép Cam', 'epcam.jpg', 16.00, 100.000, 1, 6),
(19, 'Nước Ép Cà Rốt', 'epcarot.jpg', 19.00, 100.000, 1, 6),
(20, 'Nước Ép Dâu', 'epdau.jpg.jpg', 25.00, 100.000, 1, 6),
(21, 'Nước Ép Kiwi', 'epkiwi.jpg', 19.00, 100.000, 1, 6),
(22, 'Nước Ép Táo', 'eptao.jpg', 23.00, 100.000, 1, 6),
(23, 'Nước Ép Chanh Dâu', 'nuoc-ep-chanh-day-.jpg', 25.00, 100.000, 1, 6),
(24, 'Nước Ép Dứa', 'nuoc-ep-dua.jpg', 26.00, 100.000, 1, 6),
(25, 'Nước Ép Lựu', 'nuoc-ep-luu-.jpg', 26.00, 100.000, 1, 6),
(26, 'Nước Ép Xoài', 'nuoc-ep-xoai.jpg', 36.00, 100.000, 1, 6),
(27, 'Sinh Tố Bơ', 'sinhtobo.png', 25.00, 100.000, 1, 3),
(28, 'Sinh Tố Chuối', 'Sinh-To-Chuoi.jpg', 45.00, 100.000, 1, 3),
(29, 'Sinh Tố Yến Mạch', 'sinhtochuoiyenmach.jpeg', 65.00, 100.000, 1, 3),
(30, 'Sinh Tố Dâu', 'sinh-to-dau.jpg', 35.00, 100.000, 1, 3),
(31, 'Sinh Tố Dưa Hậu', 'sinhtoduahau.jpg', 55.00, 100.000, 1, 3),
(32, 'Sinh Tố kiwi', 'sinhtokiwi.jpg', 65.00, 100.000, 1, 3),
(33, 'Sinh Tố Rau Má', 'sinhtomasoi.jpg', 25.00, 100.000, 1, 3),
(67, 'Sinh Tố Nha Đam', 'sinh-to-nha-dam-2.jpg', 50.00, 0.000, 1, 3),
(68, 'Sịnh Tố Nho', 'sinhtonhojpg.jpg', 45.00, 0.000, 1, 3),
(69, 'Sinh Tố Việt Quất', 'sinh-to-viet-quat.jpg', 45.00, 0.000, 1, 3),
(70, 'Sinh Tố Chanh Dây', 'sinhtoxoaichanhday.jpg', 45.00, 0.000, 1, 3),
(71, 'Socola', 'socola.jpg', 30.00, 0.000, 1, 2),
(72, 'Thái Xanh', 'thaixanh.jpg', 30.00, 0.000, 1, 2),
(73, 'Trân Châu', 'tranchau.jpg', 18.00, 0.000, 1, 2),
(74, 'Trà Sữa Đào', 'Tra-Sua-Dao.jpg', 45.00, 0.000, 1, 2),
(75, 'Trà Sữa Dâu Tây', 'Tra-sua-dau-tay.jpg', 19.00, 0.000, 1, 2),
(76, 'Trà sữa ô long', 'tra-sua-olong-.jpg', 30.00, 0.000, 1, 2),
(77, 'Trà Sữa Hoa Hồng', 'TS-HOA-HONG.jpg', 34.00, 0.000, 1, 2),
(78, 'Trà Sữa Khoai Môn', 'tskhoaimon.jpg', 34.00, 0.000, 1, 2),
(79, 'Trà Sữa Xoài', 'tsxoai.jpg', 35.00, 0.000, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `role`) VALUES
(1, 'Phụng ', '123456789', '', 'admin'),
(15, 'Lê Văn Hậu', '0367722389', '123', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_baigioithieu` (`id_article`);

--
-- Chỉ mục cho bảng `baigioithieu`
--
ALTER TABLE `baigioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_baiviet` (`id_blog`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories_items`
--
ALTER TABLE `categories_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `haianh`
--
ALTER TABLE `haianh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_info_products` (`id_info`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `baigioithieu`
--
ALTER TABLE `baigioithieu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories_items`
--
ALTER TABLE `categories_items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `haianh`
--
ALTER TABLE `haianh`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_baigioithieu` FOREIGN KEY (`id_article`) REFERENCES `baigioithieu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `fk_blog_baiviet` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `fk_products_info` FOREIGN KEY (`id_info`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_orders_order_items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_order_items` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
