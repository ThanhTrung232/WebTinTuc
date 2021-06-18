-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th1 04, 2021 lúc 07:00 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `News`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(255) NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FullName` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `Username`, `Password`, `FullName`) VALUES
(1, 'admin', 'admin', 'Trần Văn Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ads`
--

CREATE TABLE `ads` (
  `IdAds` int(10) UNSIGNED NOT NULL,
  `AdsDescription` varchar(255) DEFAULT NULL,
  `Url` varchar(255) DEFAULT NULL,
  `UrlAdsPics` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ads`
--

INSERT INTO `ads` (`IdAds`, `AdsDescription`, `Url`, `UrlAdsPics`) VALUES
(1, 'bongda', '111', 'uploads/quangcao/2020/12/30/1506341437-sdfasfsdf.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `IdNews` int(10) UNSIGNED NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Overview` text NOT NULL,
  `Detail` text NOT NULL,
  `UrlPics` varchar(255) NOT NULL,
  `Day` date NOT NULL,
  `Views` int(11) NOT NULL,
  `NewsAppear` tinyint(4) DEFAULT NULL,
  `Keyword` varchar(255) NOT NULL,
  `IdNewsType` int(11) NOT NULL,
  `HotNews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`IdNews`, `IdUser`, `Title`, `Overview`, `Detail`, `UrlPics`, `Day`, `Views`, `NewsAppear`, `Keyword`, `IdNewsType`, `HotNews`) VALUES
(1, 11, 'What is Lorem Ipsum ?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'uploads/noidung/2020/12/25/olongtea.jpg', '2020-12-04', 11, 1, 'Lorem Ipsum', 1, 0),
(3, 22, 'Lần đầu ĐH FPT cấp học bổng tiến sĩ ', 'Bên cạnh 400 suất học bổng Nguyễn Văn Đạo, ĐH FPT lần đầu tiên chọn ra 30 học sinh xuất sắc nhất để cấp học bổng toàn phần đào tạo từ cử nhân lên thẳng tiến sĩ, với tổng giá trị quỹ lên tới 5 triệu USD.', 'Bên cạnh 400 suất học bổng Nguyễn Văn Đạo, ĐH FPT lần đầu tiên chọn ra 30 học sinh xuất sắc nhất để cấp học bổng toàn phần đào tạo từ cử nhân lên thẳng tiến sĩ, với tổng giá trị quỹ lên tới 5 triệu USD.', 'uploads/noidung/2020/12/25/olongtea.jpg', '2020-12-28', 11, 1, 'Lần đầu ĐH FPT', 2, 1),
(4, 11, 'tieu dê', '1', '1', 'uploads/noidung/2020/12/25/olongtea.jpg', '2020-12-02', 11, 1, '1', 8, 1),
(11, 22, 'Thủ tướng chủ trì Hội nghị trực tuyến Chính phủ với địa phương', 'VOV.VN - Hội nghị Chính phủ với các địa phương chính thức khai mạc sáng nay (28/12) với quy mô toàn quốc. Tổng Bí thư, Chủ tịch nước Nguyễn Phú Trọng dự và phát biểu chỉ đạo Hội nghị.', 'Được tổ chức thường niên vào dịp cuối năm, Hội nghị trực tuyến Chính phủ với địa phương lần này có ý nghĩa đặc biệt hơn bởi diễn ra vào cuối nhiệm kỳ và chuẩn bị bước vào năm đầu của giai đoạn mới khi kinh tế đất nước bị ảnh hưởng bởi dịch Covid-19. Hội nghị sẽ bàn về những cơ hội, thách thức và sẽ đưa ra những quyết sách quan trọng để đưa đất nước vững bước vào thời kỳ phát triển mới.\r\n\r\nHội nghị dự kiến diễn ra trong 1,5 ngày, tổng kết lại 1 năm đã qua và đề ra nhiệm vụ, giải pháp chủ yếu để hoàn thành các mục tiêu phát triển trong năm 2021 cũng như các năm tiếp theo.\r\n\r\nTheo chương trình dự kiến, sáng nay (28/12), sau khi Thủ tướng Chính phủ Nguyễn Xuân Phúc phát biểu khai mạc, Hội nghị sẽ nghe Phó Thủ tướng Thường trực Chính phủ Trương Hòa Bình trình bày Báo cáo tóm tắt về  tình hình thực hiện kế  hoạch phát triển kinh tế  -  xã hội năm 2020 và 5 năm 2016-2020; dự kiến phương hướng, nhiệm vụ thời gian tới.\r\nTiếp đó, Phó Thủ tướng Phạm Bình Minh trình bày Báo cáo tóm tắt kiểm điểm công tác chỉ đạo, điều hành của Chính phủ năm 2020 và 5 năm 2016-2020.\r\n\r\nPhó Thủ tướng Trịnh Đình Dũng giới thiệu Dự  thảo Nghị quyết 01 của Chính phủ về nhiệm vụ, giải pháp chủ yếu chỉ đạo, điều hành kế hoạch phát triển kinh tế - xã hội và dự toán ngân sách Nhà nước năm 2021.\r\n\r\nPhó Thủ tướng Vũ Đức Đam giới thiệu Dự thảo Nghị quyết 02 của Chính phủ  thực hiện nhiệm vụ, giải pháp chủ yếu cải thiện môi  trường kinh doanh, nâng cao năng lực cạnh tranh quốc gia năm 2021.\r\n\r\nSau khi nghe các báo cáo nói trên và ý kiến phát biểu của lãnh đạo một số địa  phương, Tổng Bí thư, Chủ tịch nước Nguyễn Phú Trọng sẽ phát biểu chỉ đạo Hội nghị.\r\n\r\nHội nghị cũng xem xét các Báo cáo đánh giá tình hình thực hiện Nghị quyết số 35/NQ-CP về hỗ trợ phát triển doanh nghiệp đến năm 2020 và đề xuất, kiến nghị giải pháp hỗ trợ, phát triển doanh nghiệp đến năm 2025, tầm nhìn 2030; Báo cáo kết quả thực hiện cơ cấu lại nền kinh tế, đổi mới mô hình tăng trưởng năm 2020; Báo cáo công tác thanh tra, giải quyết khiếu nại, tố cáo và đấu tranh phòng, chống tham nhũng năm 2020; Báo cáo tình hình thực hiện Nghị quyết số 17/NQ-CP về một số nhiệm vụ, giải pháp trọng tâm phát triển Chính phủ điện tử 2019 - 2021, định hướng 2025…\r\n\r\nChính phủ sẽ tiếp thu các ý kiến tại Hội nghị, hoàn thiện các văn bản, báo cáo, nhất là dự thảo Nghị quyết 01 để ban hành và tập trung thực hiện ngay từ ngày đầu tiên của năm 2021 với quyết tâm đạt kết quả cao nhất, tạo cơ sở, nền tảng cho cả giai đoạn 5 năm tới (2021-2025).\r\n\r\nHội nghị sẽ nghe ý kiến của nhiều ngành, địa phương, trong đó tập trung đi thẳng vào những thành quả nổi bật và những khó khăn, vướng mắc; những vấn đề lớn có tính liên ngành, liên vùng, tăng cường phối hợp để phát huy được tiềm năng, lợi thế, nâng cao được hiệu quả trong phân bổ và sử dụng nguồn lực; làm rõ những mô hình tốt, cách làm hay; tập trung bàn về cách làm, phương pháp chỉ đạo, tổ chức thực hiện nhằm tạo được chuyển biến rõ nét, hiệu quả trong thực hiện những nhiệm vụ, giải pháp đề ra cho năm 2021 cũng như các năm tiếp theo.', 'uploads/noidung/2020/12/25/olongtea.jpg', '2020-12-24', 1, 1, 'thu-tuong-chu-tri-hoi', 1, 0),
(16, 22, 'Hoàn thành tốt đẹp đại hội đảng bộ các cấp- Bài 2: Phát huy tâm huyết, trí tuệ và trách nhiệm', 'Việc thảo luận, quyết định đường lối, nhiệm vụ chính trị (công tác văn kiện) tại Đại hội là một trong hai nội dung quan trọng nhất, đã được các đảng bộ chuẩn bị kỹ lưỡng và thực hiện nghiêm túc, góp phần làm nên thành công của đại hội đảng bộ các cấp nhiệm kỳ 2020-2025.', 'Khẳng định vai trò lãnh đạo toàn diện của Đảng\r\n\r\nTổng Bí thư, Chủ tịch nước chỉ rõ: Văn kiện Đại hội rất quan trọng, không phải là nghị quyết bình thường mà là văn kiện 5 năm mới có một lần, vừa mang tính lý luận, vừa mang tính thực tiễn, tính chính trị, mang tầm chiến lược đồng thời phải có tính quần chúng, dễ hiểu, dễ nhớ, dễ làm, dễ kiểm tra. Nhìn lại đại hội đảng bộ các cấp có thể thấy công tác xây dựng, thảo luận văn kiện - một trong hai nội dung quan trọng nhất của đại hội đã được các đảng bộ đặc biệt quan tâm. Việc xây dựng dự thảo báo cáo chính trị đã được các cấp ủy chú trọng, đầu tư nhiều công sức với cách làm khoa học và thái độ nghiêm túc, tập hợp được trí tuệ của đông đảo cán bộ, đảng viên và các tầng lớp nhân dân.\r\n\r\nTrên cơ sở tiếp thu các định hướng lớn, tinh thần đổi mới trong công tác xây dựng văn kiện Đại hội XIII của Đảng, báo cáo chính trị của hầu hết các cấp ủy đã đánh giá khách quan, toàn diện, nhìn thẳng vào sự thật, đánh giá đúng về những kết quả đạt được cũng như hạn chế, khuyết điểm, nguyên nhân, nhất là nguyên nhân chủ quan. Đặc biệt, các báo cáo chính trị đã phân tích khá sâu sắc thời cơ và thách thức, điểm mạnh, điểm yếu, tiềm năng, cơ hội nổi trội và lợi thế cạnh tranh của địa phương mình để đề ra phương hướng, nhiệm vụ, giải pháp phù hợp, sát thực tế, có tính khả thi cao cho nhiệm kỳ tới, thậm chí cho cả giai đoạn đến năm 2030, tầm nhìn đến năm 2045.\r\n\r\nTổng Bí thư, Chủ tịch nước Nguyễn Phú Trọng đánh giá: Điểm nổi bật của các báo cáo chính trị lần này đều nhấn mạnh vai trò lãnh đạo toàn diện của Đảng; làm sâu sắc, đầy đủ hơn công tác xây dựng, chỉnh đốn Đảng, công tác đấu tranh phòng, chống tham nhũng, lãng phí, tiêu cực. Báo cáo kiểm điểm của các cấp ủy đã thể hiện bản lĩnh chính trị, tính chiến đấu, tinh thần tự phê bình và phê bình, tự soi, tự sửa, ý thức cầu thị, thẳng thắn, khiêm tốn, trung thực, trách nhiệm, hạn chế tình trạng nể nang, né tránh; tăng cường sự đoàn kết, thống nhất trong nội bộ; cơ bản khắc phục được tình trạng chỉ chủ yếu đề cập ưu điểm, ít dám nói khuyết điểm; và các nội dung còn trùng lặp với báo cáo chính trị.\r\n\r\nCác đảng bộ đã quán triệt sâu sắc các chỉ đạo của Trung ương trong công tác tổ chức Đại hội. Việc thảo luận, góp ý vào dự thảo văn kiện trình Đại hội được thực hiện bài bản, đúng quy định, trong đó thảo luận vào dự thảo báo cáo chính trị, xác định đường hướng phát triển cho 5 năm tiếp theo đã được các đại biểu tham gia góp ý tâm huyết, trách nhiệm. Nhiều ý kiến đã góp ý cụ thể vào dự thảo báo cáo chính trị của cấp ủy và dự thảo nghị quyết trình đại hội đảng bộ, tập trung đánh giá thành tựu, kết quả đạt được trên các lĩnh vực nhiệm kỳ vừa qua, những tồn tại, hạn chế và bài học kinh nghiệm; xác định phương hướng, mục tiêu, nhiệm vụ, giải pháp lớn; đóng góp ý kiến vào các dự thảo văn kiện trình Đại hội XIII của Đảng, nhất là những nội dung có liên quan trực tiếp đến đảng bộ.', 'uploads/noidung/2020/12/25/olongtea.jpg', '2020-12-25', 1, 1, 'Khẳng đinh vai trò', 1, 0),
(22, 22, 'Trà sữa', 'olong', 'ngon giá rẻ', 'uploads/noidung/2020/12/25/olongtea.jpg', '2020-12-25', 1, 1, 'ô long tea', 4, 0),
(27, 22, 'Vượt mặt Messi, Ronaldo được bầu là Cầu thủ xuất sắc nhất thế kỷ', 'TPO - Đêm qua tại gala trao giải Globe Soccer Awards tổ chức tại Dubai (UAE), Ronaldo đã được xướng tên với phần thưởng dành cho Cầu thủ xuất sắc nhất thế kỷ 21.', 'Ronaldo rất vinh dự khi nhận giải. Anh chia sẻ: “Cảm ơn tất cả đã dành tình cảm cho tôi. Điều này sẽ giúp tôi có thêm động lực để tiếp bước trên hành trình sự nghiệp của mình. Và tôi mong năm sau, bệnh dịch sẽ kết thúc.\r\n\r\nĐây là phần thưởng xứng đáng với Ronaldo, người đã có mọi vinh quang ở cấp độ đội tuyển quốc gia lẫn CLB. Anh giành 5 Champions League, 1 EURO, 1 UEFA Nations League, hàng chục danh hiệu quốc nội và không biết bao nhiêu phần thưởng cá nhân. Nếu như Messi chỉ thăng hoa với danh hiệu tại CLB thì Ronaldo vẹn toàn hơn. Do đó, chiến thắng của siêu sao 35 tuổi là không phải bàn cãi.\r\n\r\nTrong khi đó ở hạng mục Cầu thủ xuất sắc nhất năm, Robert Lewandowski cũng thắng giải ấn tượng. Thành tích trong năm 2020 của anh vượt qua mọi đối thủ khác với 47 trận nhưng ghi tới 55 bàn, là đầu tàu đưa Bayern đến chức vô địch Champions League danh giá. Với tiền đạo 32 tuổi, anh chia sẻ đã “hoàn thành giấc mơ” khi nhận giải thưởng của Globe Soccer.\r\n\r\nNhờ những bàn thắng liên tục của Lewandowski mà Bayern đoạt chức vô địch Bundesliga, Cúp QG, Champions League và cuối cùng, họ nhận danh hiệu CLB xuất sắc nhất năm 2020 từ Globe Soccer Awards. Trong khi đó, Iker Casillas và Gerard Pique nhận danh hiệu “Player Career Awards” để tôn vinh sự đóng góp thầm lặng và lòng trung thành của hai ngôi sao này cho các CLB. Real Madrid về nhất ở hạng mục CLB xuất sắc nhất thế kỷ, khi đội bóng này có 5 Champions League, 7 danh hiệu La Liga cùng nhiều chiếc cúp lớn nhỏ khác trong thế kỷ 21.', 'uploads/noidung/2020/12/28/ar_201229000_jbhm.jpg', '2020-12-28', 0, 1, 'Vượt mặt Messi', 4, 1),
(28, 22, 'Tổng thống Mỹ Trump ký ban hành gói cứu trợ đại dịch COVID-19 trị giá gần 900 tỷ USD', 'Ngày 27/12 (sáng 28/12 theo giờ Việt Nam), Tổng thống Mỹ Donald Trump đã ký ban hành gói cứu trợ đại dịch COVID-19 trị giá 900 tỷ USD, qua đó giúp tránh nguy cơ chính phủ phải đóng cửa vì hết ngân sách và khép lại cuộc tranh cãi kéo dài mấy tháng qua tại Washington D.C liên quan tới vấn đề này.', 'Theo tuyên bố của giới chức Nhà Trắng được các hãng truyền thông Mỹ dẫn lại lời, Tổng thống Trump đã ký thành luật gói cứu trợ đại dịch COVID-19 trị giá hơn 892 tỷ USD song song với một gói ngân sách thường niên ngay trước thời hạn chót vào đêm 27/12, qua đó tránh nguy cơ chính phủ Mỹ phải đóng cửa.', 'uploads/noidung/2020/12/28/trump-corona-cuutro-2812.jpg', '2020-12-28', 0, 1, 'Trump', 6, 1),
(29, 22, 'Kinh tế giao thông đang bị lãng quên?', 'Kinhtedothi - Giao thông là huyết mạch, là tiền đề phát triển cho mọi lĩnh vực của nền kinh tế. Bên cạnh đó, giao thông cũng chính là một lĩnh vực có thể khai thác hiệu quả khía cạnh kinh tế, thậm chí có thể trở thành điểm nhấn nổi bật trong “túi tiền” của các đô thị lớn.', 'Chi như thác, thu nhỏ giọt\r\nTheo thống kê của Sở Tài chính Hà Nội, mỗi năm, TP đang phải chi hàng chục nghìn tỷ đồng cho phát triển kết cấu hạ tầng giao thông; khoảng 2.000 tỷ đồng trợ giá cho xe buýt và không ít kinh phí cho công tác tuyên truyền, xây dựng văn hoá giao thông. Tất cả đều hướng đến mục tiêu giảm thiểu ùn tắc, tai nạn giao thông, ô nhiễm môi trường không khí. Nhưng chỉ riêng việc duy tu, sửa chữa nhỏ, thường xuyên hệ thống hạ tầng đã tiêu tốn gấp 2 lần kinh phí thu được từ quỹ bảo trì đường bộ. Nửa còn lại, và quan trọng hơn là nguồn vốn xây dựng hạ tầng mới đang phải trông chờ vào ngân sách, các khoản vay và kêu gọi đầu tư xã hội hóa.\r\nĐiều đáng nói, dù chi cả núi tiền như vậy, tình trạng ùn tắc giao thông vẫn chưa thể được giải quyết, văn hóa giao thông vẫn chưa ăn sâu bén rễ vào ý thức người dân, đặc biệt, nguồn lợi thu được từ hạ tầng giao thông để tái đầu tư cho chính nó còn quá nhỏ bé.\r\nTS giao thông đô thị Đặng Minh Tân nhận định: “Trước nay, chúng ta nghe nhiều đến kinh tế vận tải, đây cũng là một chuyên ngành được đào tạo bài bản trong nhiều trường đại học. Nhưng kinh tế giao thông thì gần như bị quên lãng, dù nó có hiện hữu và cũng đầy tiềm năng”. TS Đặng Minh Tân phân tích, kinh tế giao thông có thể hiểu nôm na là chi tiền đầu tư cho lĩnh vực giao thông và có thu lại, thậm chí sinh lãi. Bên cạnh những lợi ích nền tảng như kết nối giao thương, văn hóa, xã hội… tự bản thân lĩnh vực giao thông cũng có thể “đẻ ra tiền”.\r\nĐồng quan điểm, Thạc sĩ giao thông đô thị Vũ Hoàng Chung chia sẻ: “Để duy trì, phát triển mạng lưới giao thông cần nguốn vốn đầu tư rất lớn. Chúng ta đang phải chạy vạy, vay mượn ngược xuôi để đắp đổi. Trong khi đó nguồn thu từ hạ tầng giao thông khá dồi dào lại hầu như chưa có cách nào khai thác được”. Nguồn thu đó có thể từ thu phí dừng đỗ xe; phí ra vào nội đô các TP lớn không khuyến khích xe cơ giới lưu thông; lợi tức từ cho thuê quảng cáo trên các công trình giao thông…\r\nĐơn cử như tại Hà Nội, khả năng đáp ứng nhu cầu giao thông tĩnh của các bến bãi được cấp phép mới chỉ đạt khoảng 10%. Nhiều chuyên gia đặt câu hỏi: Vậy 90% còn lại đi đâu? Nguồn thu từ trông giữ phương tiện chỉ có 1/10 được TP kiểm soát, còn tới 9/10 lại đang chảy vào túi các cá nhân mà TP không thể thu thuế hay bất kỳ loại phí nào. Trong khi đó, hàng năm, TP phải chi biết bao nhiêu tiền để mở rộng đường sá, tôn tạo vỉa hè, và không ít trong số đó đang biến thành bãi đỗ xe, kiếm lợi của các cá nhân riêng lẻ.', 'uploads/noidung/2020/12/28/kinhtegiaothogn.jpg', '2020-12-28', 0, 1, 'Kinh tế giao thông ', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newssave`
--

CREATE TABLE `newssave` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_news` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newstype`
--

CREATE TABLE `newstype` (
  `IdNewsType` int(10) NOT NULL,
  `NewsTypeName` varchar(255) NOT NULL,
  `NewsTypeNumber` int(11) DEFAULT NULL,
  `NewsTypeAppear` tinyint(4) DEFAULT NULL,
  `IdType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `newstype`
--

INSERT INTO `newstype` (`IdNewsType`, `NewsTypeName`, `NewsTypeNumber`, `NewsTypeAppear`, `IdType`) VALUES
(1, 'Giáo Dục', 1, 1, 2),
(2, 'Nhịp Điệu Trẻ', 1, 1, 1),
(4, 'Du Lịch cuộc sống', 0, 0, 7),
(5, 'Du Học', 1, 1, 1),
(6, 'Cuộc Sống Đó Đây', 1, 1, 8),
(7, 'Người Việt 5 Châu', 1, 1, 8),
(8, 'Bất Động Sản', 1, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `IdPer` int(11) NOT NULL,
  `Name_per` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`IdPer`, `Name_per`) VALUES
(1, 'CREATE'),
(2, 'EDIT'),
(3, 'DELETE'),
(4, 'VIEW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `IdPlan` int(10) UNSIGNED NOT NULL,
  `PlanDescription` varchar(255) NOT NULL,
  `PlanChoseNumber` int(11) NOT NULL,
  `IdVote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positionads`
--

CREATE TABLE `positionads` (
  `IdPosAds` int(11) NOT NULL,
  `PosAdsName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position_news`
--

CREATE TABLE `position_news` (
  `idpos` int(10) NOT NULL,
  `Name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdNews` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `IdType` int(11) NOT NULL,
  `TypeName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TypeNumber` int(11) NOT NULL,
  `TypeAppear` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`IdType`, `TypeName`, `TypeNumber`, `TypeAppear`) VALUES
(1, 'Xã hội', 2, 1),
(2, 'Khoa học', 2, 1),
(3, 'Kinh doanh', 3, 1),
(4, 'Văn Hoá', 1, 1),
(5, 'Pháp Luật', 1, 1),
(6, 'Thể Thao', 1, 1),
(7, 'Đời Sống', 1, 1),
(8, 'Thế Giới', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `IdUser` int(255) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `RegisterDay` date NOT NULL,
  `IdGroup` tinyint(4) NOT NULL,
  `BirthDay` date NOT NULL,
  `Gender` text NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `privileges` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`IdUser`, `FullName`, `Username`, `Password`, `Email`, `RegisterDay`, `IdGroup`, `BirthDay`, `Gender`, `Avatar`, `privileges`, `token`) VALUES
(11, 'Nam admin', '191919', '123', 'tnasd@gmail.com', '2020-12-04', 1, '2000-02-02', 'Nam', 'http://localhost:8080/lab-03public/user/images/image.JPG', 1, '470793e036b9db245ac460dc89b15913LV1'),
(22, 'Trần Văn Nam', 'admin', '1', 'MinhNhut@gmail.com', '2020-12-05', 1, '2000-02-02', 'Nam', 'http://localhost:8080/lab-03public/user/images/image.JPG', 1, '21232f297a57a5a743894a0e4a801fc3LV1'),
(23, 'Nguễn Văn A', 'user0', '1', 'user0@gmail.com', '2020-12-06', 0, '2020-12-01', 'Nữ', 'koco', 4, '3d517fe6ebab7b8cfcf98db6259c8a59LV0'),
(25, '1', '18521133', '1', '1', '2020-12-06', 1, '0000-00-00', '1', 'http://localhost:8080/lab-03public/user/images/image.JPG', 1, '12eb000c1b2225dab9e9d843393e4f87LV0'),
(26, 'test_lab', 'test', '1', 'test_lab@gmail.com', '2020-12-07', 0, '2000-02-02', 'Nam', 'http://localhost:8080/lab-03public/user/images/image.JPG', 4, '098f6bcd4621d373cade4e832627b4f6LV0'),
(27, 'Nguyễn Văn A', 'ngyenA', '1', 'ngyenA@gmail.com', '2020-12-01', 1, '2000-02-01', 'Nam', 'Nam', 1, '19f6d82df96c91b79ef3f8e2a0a35163LV1'),
(28, 'Nguyễn Văn B', 'NguyenB', '1', 'NguyenB@gmail.com', '2020-12-03', 1, '2020-12-08', '1', '1', 1, 'def1a3334aef2257a75f4ab37d6e305dLV1'),
(31, 'Truong Xuan Nhi', 'xuannhi', '1', 'xuannhixuan@gmail.com', '2020-12-18', 0, '2000-03-01', 'Nam', 'http://localhost:8080/lab-04public/user/images/image.JPG', 4, 'd520c9e8db81bde8fd61f8c1c0e68b01LV0'),
(32, 'Truong Xuan Nhi1', 'xuannhi1', '1', 'tnasd2507@gmail.com', '2020-12-18', 0, '2002-03-01', 'Nữ', 'http://localhost:8080/lab-04public/user/images/image.JPG', 4, '83dd317cd9a7f924a370e174de4608abLV0'),
(33, 'nhutnguyen haha', 'nhutnguyen', 'nhutnguyen', 'nhutnguyen@gmail.com', '2020-12-19', 0, '2000-08-11', 'Nam', 'http://localhost:8080/lab-04public/user/images/image.JPG', 1, '5ab5ef1774166445e9677e287cb9101fLV0'),
(38, '100@gmail.com', 'admin1', '1', '1000@gmail.com', '2020-12-20', 0, '1999-12-03', 'Nam', 'http://localhost:8080/lab-04public/user/images/image.JPG', 1, 'e00cf25ad42683b3df678c61f42c6bdaLV0'),
(39, 'Truong Xuan Nhi', 'XuanNhi2507', '1', 'XuanNhi2507@gmail.com', '2020-12-22', 0, '2008-06-22', 'Nữ', 'http://localhost:8080/lab-04public/user/images/image.JPG', 1, '3ee836aa44172766b6715fd7a8940d23LV0'),
(40, 'xuannhi0103', 'xuannhi0103', 'xuannhi0103', 'xuannhi0103@gmail.com', '2020-12-22', 0, '1983-02-22', 'Nam', 'http://localhost:8080/lab-04public/user/images/image.JPG', 1, '8c1ea20c8ac04d891ed6588f95d005ecLV0'),
(41, 'NguyenNhut', 'NguyenNhut', '123', 'NguyenNhut@gmail.com', '2020-12-22', 0, '1999-01-11', 'Nam', 'http://localhost:8080/lab-04public/user/images/image.JPG', 1, '6d0a5c66c2944ecbb4f47b62acc2e108LV0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vote`
--

CREATE TABLE `vote` (
  `IdVote` int(11) NOT NULL,
  `VoteDescription` varchar(255) NOT NULL,
  `VoteChoseNumber` int(11) NOT NULL,
  `VoteAppear` tinyint(4) DEFAULT NULL,
  `VoteNumber` int(11) NOT NULL,
  `IdNewsType` int(11) NOT NULL,
  `idUser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `weblinks`
--

CREATE TABLE `weblinks` (
  `IdWeb` int(11) NOT NULL,
  `WebName` varchar(255) NOT NULL,
  `UrlWeb` varchar(255) NOT NULL,
  `WebLinkNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Chỉ mục cho bảng `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`IdAds`) USING BTREE;

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`IdNews`) USING BTREE,
  ADD KEY `IdNewsType` (`IdNewsType`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Chỉ mục cho bảng `newssave`
--
ALTER TABLE `newssave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_news` (`id_news`);

--
-- Chỉ mục cho bảng `newstype`
--
ALTER TABLE `newstype`
  ADD PRIMARY KEY (`IdNewsType`) USING BTREE,
  ADD KEY `IdType` (`IdType`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`IdPer`);

--
-- Chỉ mục cho bảng `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`IdPlan`) USING BTREE,
  ADD KEY `IdVote` (`IdVote`);

--
-- Chỉ mục cho bảng `positionads`
--
ALTER TABLE `positionads`
  ADD PRIMARY KEY (`IdPosAds`);

--
-- Chỉ mục cho bảng `position_news`
--
ALTER TABLE `position_news`
  ADD PRIMARY KEY (`idpos`),
  ADD KEY `IdNews` (`IdNews`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`IdType`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `privileges` (`privileges`);

--
-- Chỉ mục cho bảng `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`IdVote`) USING BTREE,
  ADD KEY `IdNewsType` (`IdNewsType`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `weblinks`
--
ALTER TABLE `weblinks`
  ADD PRIMARY KEY (`IdWeb`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ads`
--
ALTER TABLE `ads`
  MODIFY `IdAds` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `IdNews` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `newssave`
--
ALTER TABLE `newssave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `newstype`
--
ALTER TABLE `newstype`
  MODIFY `IdNewsType` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `IdPer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `positionads`
--
ALTER TABLE `positionads`
  MODIFY `IdPosAds` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `position_news`
--
ALTER TABLE `position_news`
  MODIFY `idpos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `IdType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `weblinks`
--
ALTER TABLE `weblinks`
  MODIFY `IdWeb` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`IdNewsType`) REFERENCES `newstype` (`IdNewsType`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`);

--
-- Các ràng buộc cho bảng `newssave`
--
ALTER TABLE `newssave`
  ADD CONSTRAINT `newssave_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`IdUser`),
  ADD CONSTRAINT `newssave_ibfk_2` FOREIGN KEY (`id_news`) REFERENCES `news` (`IdNews`);

--
-- Các ràng buộc cho bảng `newstype`
--
ALTER TABLE `newstype`
  ADD CONSTRAINT `newstype_ibfk_1` FOREIGN KEY (`IdType`) REFERENCES `type` (`IdType`);

--
-- Các ràng buộc cho bảng `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`IdVote`) REFERENCES `vote` (`IdVote`);

--
-- Các ràng buộc cho bảng `position_news`
--
ALTER TABLE `position_news`
  ADD CONSTRAINT `position_news_ibfk_1` FOREIGN KEY (`IdNews`) REFERENCES `news` (`IdNews`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`privileges`) REFERENCES `permission` (`IdPer`);

--
-- Các ràng buộc cho bảng `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`IdNewsType`) REFERENCES `newstype` (`IdNewsType`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
