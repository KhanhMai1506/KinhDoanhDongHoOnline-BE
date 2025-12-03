<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_phams')->delete();
        DB::table('san_phams')->insert([
            // Đồng Hồ Nam

            $this->sanPham(
                4,
                'Đồng Hồ Nam Casio MTP-1374L-1AVDF',
                'https://cdn.tgdd.vn/Products/Images/7264/313967/casio-mtp-1374l-1avdf-nam-1-750x500.jpg',
                'Đồng hồ nam Casio MTP-1374L-1AVDF được làm từ chất liệu cao cấp, dây da thật màu đen, mặt số dễ nhìn, tích hợp lịch ngày.',
                14780000
            ),
            $this->sanPham(
                4,
                'Đồng Hồ Nam Casio AE-1200WHD-1AVDF',
                'https://cdn.tgdd.vn/Products/Images/7264/199485/casio-ae-1200whd-1avdf-bac-up-1-750x500.jpg',
                'Đồng hồ nam Casio AE-1200WHD-1AVDF sở hữu mặt vuông thể thao, màn hình điện tử sắc nét và dây đeo kim loại bền bỉ. Thiết kế mạnh mẽ, phù hợp cho nam giới năng động.',
                1506000
            ),
            $this->sanPham(
                4,
                'Đồng Hồ Nam Casio MTP-VT01L-1BUDF',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/80_MTP-VT01L-1BUDF.jpg',
                'Đồng hồ nam Casio MTP-VT01L-1BUDF với phần dây da tone đen tạo hình vân cá sấu, kết hợp với các chi tiết vỏ máy mạ bạc và kiểu thiết kế mỏng độ dày chỉ 8mm. Với thiết kế đơn giản nhưng đầy phong cách, mẫu đồng hồ này trở thành một lựa chọn tuyệt vời cho những quý ông yêu thích phong cách thanh lịch.',
                1182000
            ),
            $this->sanPham(
                5,
                'Đồng Hồ Nam Seiko Presage Cocktail Grasshopper SSA441J1',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/SSA441J1.jpg',
                'Seiko Presage Cocktail Grasshopper SSA441J1 là mẫu đồng hồ sang trọng đáng sở hữu bởi: Thiết kế Open Heart (Trải nghiệm chuyển động cơ học đẳng cấp) – Bộ máy in-house 4R38 ổn định, chính xác cao – Màu sắc xanh lá (Grasshopper Cocktail).',
                2343400
            ),
            $this->sanPham(
                5,
                "Đồng Hồ Nam Seiko 5 Sports SSK045K1",
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/04/3-seiko-5-sports-ssk045k1.jpg',
                'Seiko 5 Sports GMT SSK045K1 lấy cảm hứng từ những chiếc xe đua cổ điển. Đặc trưng bởi mặt số xanh dương sunburst, bộ máy automatic mạnh mẽ và độ chính xác cao. Phong cách thể thao sang trọng thời thượng mới.',
                14884000
            ),
            $this->sanPham(
                5,
                "Đồng Hồ Nam Seiko Presage Style 60's SSA425J1",
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/SSA425J1.jpg',
                'Seiko SSA425J1, đồng hồ cơ Nhật Bản sang trọng lấy cảm hứng từ phong cách cổ điển thập niên 60. Trang bị máy 4R39 độc quyền cho thời gian trữ cót 41 giờ.',
                17970000
            ),
            $this->sanPham(
                5,
                'Đồng Hồ Nam Seiko SNZG15K1',
                'https://xwatch.vn/images/products/2020/04/28/large/dong-ho-seiko-snzg15k1-1_1588064606.jpg',
                'Mẫu Seiko SNZG15K1 là phiên bản thuộc dòng Seiko 5 với dây vải, kết hợp cùng phần vỏ máy cơ được thiết kế dày dặn và khả năng chống nước lên đến 10ATM. Kim chỉ và cọc vạch số được phủ dạ quang, giúp dễ dàng nhìn rõ trên mặt số của đồng hồ.',
                6640000
            ),
            $this->sanPham(
                5,
                'Đồng Hồ Nam Seiko SSB205P1',
                'https://xshipimage.s3-ap-southeast-1.amazonaws.com/Seiko/SSB205P1/SSB205P1.jpg',
                'Đồng hồ Seiko SSB205P1 dành cho nam có kiểu dáng thể thao và vỏ máy bằng thép không gỉ màu bạc sang trọng. Nó đi kèm với 3 ô phụ và chức năng Chronograph, đồng hồ nam tính này còn có dây đeo kim loại mang đến phong cách mạnh mẽ và nam tính.',
                5510000
            ),
            $this->sanPham(
                6,
                'Đồng Hồ Nam Orient Bambino Sun & Moon RA-AK0806L30B',
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/03/Orient-RA-AK0806L-3.jpg',
                'Đồng hồ nam Orient Bambino Sun And Moon RA-AK0806L30B ra mắt năm 2025 nằm trong BST 75th Anniversary Day/Night editions. Đĩa xoay mặt trời – mặt trăng độc đáo liên tưởng đến thiết kế nổi tiếng của hãng. Vẻ ngoài thanh lịch kết hợp bộ máy cơ uy tín của hãng.',
                11510000
            ),
            $this->sanPham(
                6,
                "Đồng Hồ Nam Orient Star Layered Skeleton RE-AV0B01S00B",
                'https://image.donghohaitrieu.com/wp-content/uploads/2024/10/Orient-Star-RE-AV0B01S00B.jpg',
                'Lấy cảm hứng từ các lớp vải xếp chồng lên nhau trong may đo Veston hiện đại, Orient Star RE-AV0B01S00B hoàn thiện mặt số theo dạng xếp lớp 2 Layer Skeleton độc đáo, kim nung xanh cùng thang đo dự trữ năng lượng hữu ích cho người dùng.',
                27930000
            ),
            $this->sanPham(
                6,
                'Đồng Hồ Nam Orient RA-AR0003L10B',
                'https://cdn.tgdd.vn/Products/Images/7264/202689/orient-ra-ar0003l10b-nam-co-tu-dong-5-1-750x500.jpg',
                'Chiếc đồng hồ nam Orient RA-AR003L10B mang thiết kế thanh lịch, mặt số màu xanh độc đáo cùng chất lượng bền bỉ, chắc chắn sẽ khiến phái mạnh không khỏi ao ước được sở hữu.',
                10400000
            ),
            $this->sanPham(
                6,
                'Đồng Hồ Nam Orient Vietnam Special Edition RA-AS0106L30B',
                'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/7264/332552/orient-ra-as0106l30b-nam-1-638684901280757694-750x500.jpg',
                'Đồng hồ Orient Vietnam Special Edition 41.5 mm Nam RA-AS0106L30B là một sản phẩm mang trong mình tinh thần tự hào dân tộc với thiết kế đậm chất cổ điển, sang trọng. Mẫu đồng hồ này được phát triển dựa trên dòng Classic Semi Skeleton - một trong những bộ sưu tập ăn khách nhất của Orient Star.',
                16000000
            ),
            $this->sanPham(
                6,
                'Đồng Hồ Nam Orient Contemporary 40 mm RA-TX0302S10B',
                'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/7264/331121/orient-ra-tx0302s10b-nam-1-638654688640004251-750x500.jpg',
                'Đồng hồ Orient Contemporary 40 mm Nam RA-TX0302S10B là một biểu tượng của sự tinh tế và hiện đại, mang đến phong cách lịch lãm cho những quý ông yêu thích sự sang trọng. Với thiết kế kết hợp giữa hai tông màu bạc và vàng kim, chiếc đồng hồ này không chỉ thể hiện sự đẳng cấp mà còn tạo điểm nhấn đầy cuốn hút trên cổ tay người đeo.',
                9400000
            ),
            $this->sanPham(
                7,
                "Đồng Hồ Nam Citizen NH9130-84L",
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/NH9130-84L.jpg',
                'Đồng hồ nam Citizen NH9130-84L thiết kế Open heart cùng họa tiết Guilloche hoàn toàn mới mang đến diện mạo nam tính, lịch lãm. Trang bị bộ máy cơ Japan Movt trữ cót 40 giờ, tự động lên cót khi đeo liên tục mỗi ngày.',
                10585000
            ),
            $this->sanPham(
                7,
                "Đồng Hồ Nam Citizen Sport Chronograph AN8210-56E",
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/11/dong-ho-Citizen-Chronograph-AN8210-56E-1.jpg',
                'Đồng hồ nam Citizen Chronograph AN8210-56E phiên bản đồng hồ thể thao mặt đen 6 kim độc đáo. Trang bị chức năng hữu ích như Chronograph, hiển thị 24 giờ và lịch ngày. Độ chính xác cao từ bộ máy quartz Nhật Bản.',
                5585000
            ),

            $this->sanPham(
                7,
                'Đồng Hồ Nam Citizen BI5124-50L',
                'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/7264/333114/citizen-bi5124-50l-nam-1-638702014050674289-750x500.jpg',
                'Đồng hồ Citizen 40 mm Nam BI5124-50L là mẫu đồng hồ nam được thiết kế với phong cách cổ điển và sang trọng, phù hợp để mang khi đi làm, đi chơi hoặc các buổi tiệc cần sự chỉn chu.',
                4585000
            ),


            // Đồng Hồ Nữ
            $this->sanPham(
                8,
                'Đồng Hồ Nữ Casio LTP-V006L-4BUDF',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/45_LTP-V006L-4BUDF.jpg',
                'Mẫu Casio LTP-V006L-4BUDF mặt số tròn nhỏ nữ tính size 25mm thiết kế đơn giản trẻ trung chức năng 3 kim, phối cùng bộ dây da phiên bản da trơn phối tone màu hồng.',
                1050000
            ),
            $this->sanPham(
                8,
                'Đồng Hồ Nữ Casio LTP-VT02D-1AUDF',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/LTP-VT02D-1AUDF.jpg',
                'Mẫu Casio LTP-VT02D-1AUDF thiết kế mỏng thời trang trên phần vỏ máy pin chỉ dày 7mm cùng với kiểu dáng đơn giản chức năng 3 kim trên nền mặt số kích thước 30mm.',
                1386000
            ),
            $this->sanPham(
                8,
                'Đồng Hồ Nữ Casio LTP-V300L-1AUDF',
                'https://cdn.tgdd.vn/Products/Images/7264/208631/casio-ltp-v300l-1audf-nu-2-750x500.jpg',
                'Đồng hồ Casio LTP-V300L-1AUDF có thiết kế độc đáo với mặt số tròn lớn, được trang bị các chức năng hiển thị lịch riêng biệt tại vị trí 3 giờ, tạo nên kiểu dáng đồng hồ 6 kim thời trang và tiện ích cho người dùng.',
                1752000
            ),
            $this->sanPham(
                8,
                'Đồng Hồ Nữ Casio LTP-1303D-7AVDF',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/LTP-1303D-7AVDF.jpg',
                'Đồng hồ Casio LTP-1303D-7AVDF là một mẫu đồng hồ nữ với thiết kế tinh tế. Mặt số có nền trắng, được trang trí bằng các vạch đơn giản và 3 kim chỉ giờ, tạo nên đẹp thanh lịch và trang nhã. Vỏ đồng hồ được làm bằng chất liệu thép không gỉ cao cấp, đảm bảo độ bền và độ bóng bền vững với thời gian.',
                1356000
            ),
            $this->sanPham(
                9,
                'Đồng Hồ Nữ Seiko SUR785P1',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/SUR785P1.jpg',
                'Seiko SUR785P1 là một mẫu đồng hồ thời trang dành cho nữ với mặt số tròn nhỏ nhắn. Vỏ và dây đeo được làm từ kim loại mạ bạc, tạo nên vẻ đẹp sang trọng. Kim chỉ và vạch số mỏng tinh tế nổi bật trên nền số màu đen, tạo ra một sự hấp dẫn quyến rũ.',
                3690000
            ),
            $this->sanPham(
                9,
                'Đồng Hồ Nữ Seiko SUP304P1',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/SUP304P1-1.jpg',
                'Đồng hồ Seiko SUP304P1 là một chiếc đồng hồ nữ đẳng cấp với mặt số tròn nhỏ nhắn. Kim chỉ và các vạch số La Mã được phủ màu đen tạo điểm nhấn rất nổi bật trên nền số màu trắng trang nhã. Dây đeo bằng chất liệu da màu đen có vân giúp tạo nên một phong cách thanh lịch và quyến rũ cho phái nữ.',
                3930000
            ),
            $this->sanPham(
                10,
                'Đồng Hồ Nữ Citizen EM0505-88L',
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/11/dong-ho-Citizen-L-EM0505-88L-1.jpg',
                'Mẫu đồng hồ Citizen EM0505-88L tạo điểm nhấn nổi bật với vỏ máy cùng dây đeo mạ màu đen thời trang, sang trọng cho các phái nữ. Trang bị bộ máy công nghệ Eco-Drive năng lượng ánh sáng, loại bỏ việc phải thay pin định kỳ.',
                7485000
            ),
            $this->sanPham(
                10,
                'Đồng Hồ Nữ Citizen L Round EM1060-87N',
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/09/dong-ho-Citizen-L-EM1060-87N-1.jpg',
                'Đồng hồ Citizen L EM1060-87N sở hữu hữu nét đẹp thanh lịch, dây đeo kim loại bền bỉ. Mặt kính Sapphire chống trầy, khảm xà cừ thiên nhiên. Bộ kim và núm vặn màu xanh dương độc đáo.',
                16685000
            ),
            $this->sanPham(
                10,
                'Đồng Hồ Nữ Citizen L 32 mm EM0814-83A',
                'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/7264/330016/citizen-em0814-83a-nu-1-638629702702822863-750x500.jpg',
                'CITIZEN EM0814-83A - mẫu nữ xuất xứ từ Nhật Bản, sử dụng bộ máy Eco-Drive độc quyền của hãng Citizen, chuyển hóa mọi nguồn sáng thành năng lượng, không cần thay pin thường xuyên. Vỏ và dây được làm bằng thép không gỉ 316L dạng lưới cao cấp chắc chắn, bền bỉ.',
                8050000
            ),
            $this->sanPham(
                11,
                'Đồng Hồ Nữ Orient Contemporary RA-NR2002P10B',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/RA-NR2002P10B.jpg',
                'Mẫu Orient RA-NR2002P10B với sắc hồng pastel làm siêu lòng biết bao phái đẹp bởi sự dễ thương nhưng cũng không kém phần thanh lịch và sang trọng.',
                7600000
            ),
            $this->sanPham(
                11,
                'Đồng Hồ Nữ Orient Bambino RA-AC0008S10B',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/16_RA-AC0008S10B.jpg',
                'Mẫu Orient RA-AC0008S10B vàng hồng thời trang với mẫu dây đeo demi cùng các chi tiết vạch số kim chỉ được tạo nét mỏng trẻ trung trên nền mặt trắng size 36mm.',
                9700000
            ),
            $this->sanPham(
                11,
                'Đồng Hồ Nữ Orient Vietnam Special Edition RA-AG0729S30B',
                'https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/7264/332553/orient-ra-ag0729s30b-nu-1-638684902078341204-700x467.jpg',
                'Orient Vietnam Special Edition RA-AG0729S30B mang đến thiết kế đầy ý nghĩa với mặt số lộ cơ tinh tế tại vị trí 9 giờ. Điểm nhấn đặc biệt là con số 50 và ngôi sao vàng năm cánh ở mốc 3 giờ, biểu tượng kỷ niệm 50 năm ngày thống nhất đất nước.',
                12800000
            ),
            $this->sanPham(
                12,
                'Đồng Hồ Nữ Saga Stella Chance 53578-SVPKSV-2',
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/02/saga-53578-svpksv-2.jpg',
                'Saga 53578-SVPKSV-2 sở hữu thiết kế thanh lịch nhưng vẫn giữ được nét trẻ trung, mặt số hồng baby nổi bật được chải tia sunray, viền đính đá pha lê cùng bộ máy Ronda bền bỉ từ Thụy Sĩ, tôn lên sự nữ tính của các Nàng!',
                5340000
            ),
            $this->sanPham(
                12,
                'Đồng Hồ Nữ Saga 53375-SVMWBK-2',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/53375-SVMWBK-2.jpg',
                'Mẫu Saga 53375-SVMWBK-2 với viền đồng hồ đính đá pha lê mô phỏng đóa hoa chớm nở về đêm, cùng lớp xà cừ óng ánh như mặt hồ yên ả giữa vườn xanh, tất cả tạo nên một diện mạo nên thơ và kiêu sa cho nàng.',
                14230000
            ),
            $this->sanPham(
                12,
                'Đồng Hồ Nữ Saga Triangle 80746-RGLBLB-2',
                'https://image.donghohaitrieu.com/wp-content/uploads/2025/10/dong-ho-Saga-80746-RGLBLB-2-1.jpg',
                'Saga Triangle 80746-RGLBLB-2 thiết kế mặt số tam giác phá cách và bộ máy pin Ronda từ Thụy Sĩ thượng hạng, kết hợp với nghệ thuật phối màu hài hòa cùng chất liệu xà cừ thiên nhiên, đem lại diện mạo nữ tính và đài cát cho các Nàng thơ!',
                8670000
            ),

            // Đồng Hồ Cặp Đôi
            $this->sanPham(
                13,
                'Đồng Hồ Đôi Casio MTP-1303SG-7AVDF – LTP-1303SG-7AVDF',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/10_MTP-1303SG-7AVDF-LTP-1303SG-7AVDF.jpg',
                'Mẫu Casio đôi phiên bản dây đeo vàng demi thời trang, thiết kế đơn giản 3 kim với chi tiết vạch số mạ vàng sang trọng trên mặt số.',
                2139000
            ),
            $this->sanPham(
                13,
                'Đồng Hồ Đôi Casio MTP-V002GL-7B2UDF – LTP-V002GL-7B2UDF',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/16_MTP-V002GL-7B2UDF-LTP-V002GL-7B2UDF.jpg',
                'Mẫu Casio đôi dây da tạo hình vân lịch lãm sang trọng với phần vỏ máy pin mạ vàng, thiết kế đơn giản chức năng 3 kim 1 lịch trên nền mặt số.',
                961000
            ),
            $this->sanPham(
                14,
                'Đồng Hồ Đôi Seiko SRPK75J1 – SRE014J1',
                'https://image.donghohaitrieu.com/wp-content/uploads/2024/06/SRPK75J1-SRE014J1.jpg',
                'Mẫu Seiko đôi dây da phiên bản giới hạn Star Bar tái hiện hoàng hôn lãng mạn. Sử dụng bộ máy automatic bền bỉ do Seiko sản xuất cho giúp cho tình yêu đôi lứa thêm thăng hoa, bền chặt.',
                17063000
            ),
            $this->sanPham(
                14,
                'Đồng Hồ Đôi Seiko SUP860P1 – SUP370P1',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/7_SUP860P1-SUP370P1.jpg',
                'Mẫu Seiko Solar đôi nền cọc số học trò tạo hình cách điệu trẻ trung trên nền mặt số trắng, kiểu máy pin phiên bản Solar.',
                5020000
            ),
            $this->sanPham(
                15,
                'Đồng Hồ Đôi Citizen BI5072-01A – EU6092-08A',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/21_BI5072-01A-EU6092-08A.jpg',
                'Mẫu Citizen đôi vỏ máy pin mạ vàng tone màu sang trọng không kém cạnh trẻ trung với cọc vạch số lẫn kim chỉ tạo hình mỏng.',
                3685000
            ),
            $this->sanPham(
                15,
                'Đồng Hồ Đôi Citizen BI5074-56A – EU6094-53A',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/23_BI5074-56A-EU6094-53A.jpg',
                'Mẫu Citizen đôi phiên bản trẻ trung với chi tiết kim chỉ cùng cọc vạch số mỏng mạ vàng nổi bật trên nền mặt số kiểu dáng sang trọng.',
                4185000
            ),
            $this->sanPham(
                16,
                'Đồng Hồ Đôi Doxa D155RBL – D156RBL',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/1_D155RBL-D156RBL.jpg',
                'Mẫu Doxa đôi phiên bản vỏ máy pin mạ vàng hồng tone màu thời trang cùng với thiết kế siêu mỏng chỉ 6mm.',
                23920000
            ),
            $this->sanPham(
                16,
                'Đồng Hồ Đôi Doxa D183TSV – D184TSV',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/5_D183TSV-D184TSV.jpg',
                'Mẫu Doxa đôi với chi tiết núm vặn cùng kim chỉ mạ vàng nổi bật, nền mặt số trắng với thiết kế họa tiết trải tia tạo nên vẻ trẻ trung.',
                47200000
            ),
            $this->sanPham(
                16,
                'Đồng Hồ Đôi Doxa D155SSV – D156SSV',
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/4_D155SSV-D156SSV.jpg',
                'Mẫu Doxa đôi phiên bản kim giây với thiết kế không đồng trục tạo nên vẻ độc đáo trên mặt số, vỏ máy mạ bạc sang trọng kiểu máy pin mỏng chỉ 6mm.',
                24510000
            ),
        ]);
    }
    private function sanPham($idDanhMuc, $ten, $hinhAnh, $moTa, $giaBan)
    {
        // Random số lượng
        $soLuong = random_int(5, 50);

        // Random nổi bật & flash sale
        $isNoiBat = random_int(0, 1);
        $isFlashSale = random_int(0, 1);

        // Khuyến mãi nếu flash sale
        $phanTram = null;
        $giaKhuyenMai = null;

        if ($isFlashSale == 1) {
            $phanTram = random_int(10, 30);
            $giaKhuyenMai = $giaBan * (100 - $phanTram) / 100;
        }

        // Random ngày tạo từ 2025-01-01 đến hiện tại
        $startDate = Carbon::create(2025, 1, 1);
        $endDate   = Carbon::now();

        return [
            'id_danh_muc'       => $idDanhMuc,
            'ten_san_pham'      => $ten,
            'so_luong'          => $soLuong,
            'hinh_anh'          => $hinhAnh,
            'tinh_trang'        => 1,
            'mo_ta_ngan'        => $moTa,
            'gia_ban'           => $giaBan,
            'phan_tram'         => $phanTram,
            'gia_khuyen_mai'    => $giaKhuyenMai,
            'is_noi_bat'        => $isNoiBat,
            'is_flash_sale'     => $isFlashSale,
            'created_at'        => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            'updated_at'        => Carbon::now(),
        ];
    }
}
