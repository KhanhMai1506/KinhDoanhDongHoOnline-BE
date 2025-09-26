<?php

namespace Database\Seeders;

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
        // DB::table('san_phams')->truncate();
        DB::table('san_phams')->insert([
            $this->sanPham(
    1,
    'Đồng Hồ Casio Nam MTP-1374L-1AVDF',
    30,
    'https://cdn.tgdd.vn/Products/Images/7264/313967/casio-mtp-1374l-1avdf-nam-1-750x500.jpg',
    'Đồng hồ nam Casio MTP-1374L-1AVDF được làm từ chất liệu cao cấp, dây da thật màu đen, mặt số dễ nhìn, tích hợp lịch ngày.',
    2270000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Series 8 830 Mechanical NA1015-81Z 40mm',
    30,
    'https://donghotantan.vn/images/products/2023/11/01/resized/citizen-na1015-81z-1_1698819981.jpg.webp',
    'Đồng hồ Citizen nam Series 8 máy cơ, size 40mm',
    55185000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Series 8 870 Mechanical NA1004-87E 40.8mm',
    30,
    'https://donghotantan.vn/images/products/2023/11/01/resized/citizen-na1004-87e-4_1698815244.jpg.webp',
    'Đồng hồ Citizen nam Series 8 máy cơ, size 40.8mm',
    56885000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Series 8 GMT NB6030-59L',
    30,
    'https://donghotantan.vn/images/products/2023/09/25/resized/dong-ho-citizen-series8-gmt-nb6030-59l-1-_1695626974.jpg.webp',
    'Đồng hồ Citizen Series 8 GMT, tiện ích theo dõi múi giờ',
    47285000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Movado Museum Classic 0607199 40mm',
    30,
    'https://donghotantan.vn/images/products/2018/10/11/resized/dong-ho-movado-0607199-.jpg.webp',
    'Movado Museum Classic sang trọng, mặt tối tối giản, phù hợp công sở.',
    21285000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Longines Automatic L4.960.4.92.6 38.5mm Nam',
    30,
    'https://donghotantan.vn/images/products/2018/09/11/resized/dong-ho-longines-l4-960-4-92-6-.jpg.webp',
    'Longines Automatic lịch lãm, máy tự động, kích thước 38.5mm.',
    40250000,
    1,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Bulova Marine Star Automatic 98A225 45mm',
    30,
    'https://donghotantan.vn/images/products/2019/04/11/resized/bulova-98a225-.jpg.webp',
    'Bulova Marine Star Automatic, thiết kế thể thao, size 45mm.',
    14485000,
    0,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Movado Museum Classic 0607200 40mm',
    30,
    'https://donghotantan.vn/images/products/2018/10/11/resized/dong-ho-movado-0607200-.jpg.webp',
    'Movado Museum Classic phiên bản khác, mặt mỏng thanh lịch.',
    26185000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Movado Bold Fusion Chronograph 3600894 44.5mm',
    30,
    'https://donghotantan.vn/images/products/2022/11/11/resized/3600894_1668158845.jpg.webp',
    'Movado Bold Fusion Chronograph, nhiều chức năng bấm giờ, size 44.5mm.',
    29785000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Movado Museum Classic 0607202 40mm',
    30,
    'https://donghotantan.vn/images/products/2021/11/12/resized/dong-ho-movado-0607202_1636691878.jpg.webp',
    'Movado Museum Classic, thiết kế tối giản, phù hợp mặc thường ngày.',
    43085000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Setbox 2770213 40mm',
    30,
    'https://donghotantan.vn/images/products/2025/09/13/resized/bulova-96a330-1_1757760148.jpg.webp',
    'Tommy Hilfiger Setbox phong cách trẻ trung, phù hợp làm quà tặng.',
    5685000,
    0,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Oceanic 1792201 42mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-2770213-6_1755169498.jpg.webp',
    'Tommy Hilfiger Oceanic mặt lớn, phong cách thể thao, size 42mm.',
    3285000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Oceanic 1792200 42mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1792201-1_1755165981.jpg.webp',
    'Tommy Hilfiger Oceanic phiên bản khác, thiết kế năng động.',
    3285000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Denim 1791483 44mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1792200-1_1755165834.jpg.webp',
    'Tommy Hilfiger Denim phong cách denim, size 44mm mạnh mẽ.',
    3885000,
    0,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Denim 1791381 42mm',
    30,
    'https://donghotantan.vn/images/products/2023/11/01/resized/tommy-1791381-1.jpg',
    'Tommy Hilfiger Denim, thiết kế thanh lịch với mặt số 42mm.',
    3885000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Denim 1791326 44mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1791483-1_1755165189.jpg.webp',
    'Tommy Hilfiger Denim phiên bản 44mm, thiết kế nam tính.',
    3885000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Bruce 1710677 43mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1791381-1_1755165042.jpg.webp',
    'Tommy Hilfiger Bruce mặt tròn 43mm, phong cách công sở.',
    3885000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Bruce 1710670 43mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1791326-1_1755164782.jpg.webp',
    'Tommy Hilfiger Bruce phiên bản màu khác, mặt 43mm.',
    3885000,
    0,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Tommy Hilfiger Griffin 1710458 43mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1710677-1_1755147539.jpg.webp',
    'Tommy Hilfiger Griffin, thiết kế trẻ trung, mặt 43mm.',
    3885000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Zenshin Mechanical NK5020-58X 40.5mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1710670-1_1755147475.jpg.webp',
    'Citizen Zenshin NK5020-58X máy cơ, size 40.5mm.',
    26185000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Zenshin Mechanical NK5020-58P 40.5mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/14/resized/tommy-hilfiger-1710458-1_1755146548.jpg.webp',
    'Citizen Zenshin NK5020-58P máy cơ, thiết kế hiện đại.',
    26185000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Zenshin Mechanical NK5020-58M 40.5mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/12/resized/citizen-nk5020-58x-1_1754993878.jpg.webp',
    'Citizen Zenshin NK5020-58M, hoàn thiện tinh xảo, size 40.5mm.',
    26185000,
    0,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Zenshin Mechanical NK5020-58L 40.5mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/12/resized/citizen-nk5020-58p-1_1754993057.jpg.webp',
    'Citizen Zenshin NK5020-58L, phong cách thanh lịch cho nam.',
    26185000,
    1,
    0
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Satellite Wave GPS CC3031-51E 44mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/12/resized/citizen-nk5020-58m-1_1754992891.jpg.webp',
    'Citizen Satellite Wave GPS CC3031-51E, chuẩn GPS, size 44mm.',
    31085000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen Satellite Wave GPS CC3030-53L 44mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/12/resized/citizen-nk5020-58l-1_1754992801.jpg.webp',
    'Citizen Satellite Wave GPS CC3030-53L, tính năng GPS, thiết kế mạnh mẽ.',
    31085000,
    1,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen The Citizen Limited AQ4100-65W 38.3mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/11/resized/citizen-aq4100-65w-1_1754909035.jpg.webp',
    'Citizen The Citizen Limited AQ4100-65W phiên bản giới hạn, hoàn thiện cao cấp.',
    161585000,
    1,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen The Citizen Limited AQ4100-57M 38.3mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/11/resized/citizen-aq4100-57m-1_1754908657.jpg.webp',
    'Citizen The Citizen Limited AQ4100-57M, thiết kế thanh lịch, phiên bản giới hạn.',
    178485000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen The Citizen Iconic Nature Limited AQ4106-18X 38.3mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/11/resized/citizen-aq4106-18x-1_1754905937.jpg.webp',
    'Citizen Iconic Nature Limited AQ4106-18X, cảm hứng thiên nhiên, phiên bản giới hạn.',
    148685000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen The Citizen Iconic Nature Limited AQ4100-65H 38.3mm',
    30,
    'https://donghotantan.vn/images/products/2025/08/11/resized/citizen-aq4106-00w-1_1754887338.jpg.webp',
    'Citizen Iconic Nature Limited AQ4100-65H, thiết kế tinh tế, chất lượng The Citizen.',
    180185000,
    0,
    1
),

$this->sanPham(
    1,
    'Đồng Hồ Nam Citizen The Citizen Iconic Nature Limited AQ4106-00W 38.3mm',
    30,
    'https://donghotantan.vn/images/products/2025/07/08/resized/longines-flagship-heritage-l4-815-4-62-2-1_1751973384.jpg.webp',
    'Citizen Iconic Nature Limited AQ4106-00W, phiên bản giới hạn, mặt 38.3mm.',
    167285000,
    1,
    0
),
                $this->sanPham(
                2,
                'Đồng Hồ Casio Nữ LTP-V300L-1AUDF',
                30,
                'https://cdn.tgdd.vn/Products/Images/7264/208631/casio-ltp-v300l-1audf-nu-2-750x500.jpg',
                'Đồng hồ Casio LTP-V300L-1AUDF có thiết kế độc đáo với mặt số tròn lớn, được trang bị các chức năng hiển thị lịch riêng biệt tại vị trí 3 giờ, tạo nên kiểu dáng đồng hồ 6 kim thời trang và tiện ích cho người dùng.',
                1752000,
                1,
                0,
            ),
            $this->sanPham(
                2,
                'Đồng Hồ Casio Nữ LTP-1303D-7AVDF',
                26,
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/LTP-1303D-7AVDF.jpg',
                'Đồng hồ Casio LTP-1303D-7AVDF là một mẫu đồng hồ nữ với thiết kế tinh tế. Mặt số có nền trắng, được trang trí bằng các vạch đơn giản và 3 kim chỉ giờ, tạo nên đẹp thanh lịch và trang nhã. Vỏ đồng hồ được làm bằng chất liệu thép không gỉ cao cấp, đảm bảo độ bền và độ bóng bền vững với thời gian.',
                1356000,
                0,
                1,
            ),
            $this->sanPham(
                2,
                'Đồng Hồ Seiko Nữ SUR785P1',
                11,
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/SUR785P1.jpg',
                'Seiko SUR785P1 là một mẫu đồng hồ thời trang dành cho nữ với mặt số tròn nhỏ nhắn. Vỏ và dây đeo được làm từ kim loại mạ bạc, tạo nên vẻ đẹp sang trọng. Kim chỉ và vạch số mỏng tinh tế nổi bật trên nền số màu đen, tạo ra một sự hấp dẫn quyến rũ.',
                3690000,
                1,
                0,
            ),
            $this->sanPham(
                2,
                'Đồng Hồ Seiko Nữ SUP304P1',
                28,
                'https://image.donghohaitrieu.com/wp-content/uploads/2023/09/SUP304P1-1.jpg',
                'Đồng hồ Seiko SUP304P1 là một chiếc đồng hồ nữ đẳng cấp với mặt số tròn nhỏ nhắn. Kim chỉ và các vạch số La Mã được phủ màu đen tạo điểm nhấn rất nổi bật trên nền số màu trắng trang nhã. Dây đeo bằng chất liệu da màu đen có vân giúp tạo nên một phong cách thanh lịch và quyến rũ cho phái nữ.',
                3930000,
                0,
                1,
            ),
            $this->sanPham(
                2,
                'Đồng Hồ Pierre Lannier Nữ NOVA 023L928',
                22,
                'https://cdn.pierrelannier.vn/2024/08/pierre-lannier-023L928.jpg',
                'Đồng hồ nữ Nova 023L928 Milanese bằng thép mạ vàng hồng được trang trí bằng đá pha lê, tạo nên một chiếc đồng hồ vừa nhỏ gọn lại vô cùng quyến rũ nhờ các chi tiết hoàn thiện. Khám phá tất cả những ưu điểm của mẫu đồng hồ này và để mình bị cuốn hút bởi nó!',
                5170000,
                1,
                0,
            ),
            $this->sanPham(
                2,
                'Đồng Hồ Pierre Lannier Nữ NOVA 014J938',
                18,
                'https://cdn.vuahanghieu.com/unsafe/0x500/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/03/dong-ho-nu-pierre-lannier-048k658-mau-bac-6400614ec2975-02032023154150.jpg',
                'Mê mẩn với bộ sưu tập Nova của Pierre Lannier: những chiếc đồng hồ đẹp và tinh tế, mang đến sự sang trọng cho mọi cổ tay. Chiếc đồng hồ nữ 014J938 thép không gỉ mạ vàng hồng là hoàn toàn hiện đại và tinh tế, với mặt số đen có hiệu ứng nắng.',
                3670000,
                0,
                1,
            ),
            $this->sanPham(
                3,
                'Đồng hồ định vị trẻ em Oaxis myFirst Fone R1S',
                14,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2022/07/18/image-removebg-preview-5_637937563970551957.png',
                'Sản phẩm đồng hồ định vị trẻ em Oaxis myFirst Fone R1S đi kèm với thiết kế trẻ trung cùng tính năng theo dõi nhịp tim và thúc đẩy trẻ em tập thể dục thường xuyên hơn. Đồng hồ được trang bị nhiều bộ nhớ hơn so với thế hệ tiền nhiệm, lưu trữ được nhiều nhạc hơn và xếp hạng chống thấm nước được cải thiện.',
                2650000,
                1,
                0,
            ),
            $this->sanPham(
                3,
                'Đồng hồ thông minh MyKID 4G LITE',
                19,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2023/08/31/mykid4glite-d.png',
                'Đồng hồ thông minh MyKid 4G LITE là mẫu đồng hồ dành cho trẻ em được phụ huynh ưa chuộng trong năm 2023 khi sở hữu nhiều tính năng hữu ích cho cả phụ huynh và con trẻ. Phụ huynh có thể quan sát và quản lý con nhanh chóng hơn với tính năng gọi video, nghe lén, chụp lén từ xa,...',
                1390000,
                0,
                1,
            ),
            $this->sanPham(
                3,
                'Đồng hồ trẻ em Huawei Watch Kids 4 Pro',
                14,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2022/05/13/aslan-1.png',
                'Hiện nay, đồng hồ thông minh cho trẻ em trở nên khá phổ biến. Và dòng đồng hồ Huawei Watch Kids 4 Pro là một trong số đó. Với thiết kế hiện đại, đẹp mắt, chắc chắn đây sẽ là món đồ được nhiều các em nhỏ yêu thích.',
                3990000,
                1,
                0,
            ),
            $this->sanPham(
                3,
                'Đồng hồ định vị trẻ em myALO K74',
                28,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2023/11/29/myalo-k74-1.png',
                'Đồng hồ định vị trẻ em myALO K74 là một thiết bị thông minh có thể giúp bố mẹ theo dõi và bảo vệ trẻ từ xa. Đây cũng là một công cụ thông minh với nhiều tính năng hữu ích đồng hành cùng trẻ học tập và giải trí hàng ngày.',
                2490000,
                0,
                1,
            ),
            $this->sanPham(
                3,
                'Đồng hồ trẻ em Goly K10',
                24,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2024/08/26/goly-k10-den-3.png',
                'Đồng hồ trẻ em Goly K10 sẽ là một lựa chọn đáng để cân nhắc nếu phụ huynh vẫn còn đang lăn tăn không biết mua thiết bị nào, khi việc trang bị cho con trẻ một thiết bị công nghệ bên mình, giúp ba mẹ có thể dễ dàng theo dõi từ xa, phòng trừ các trường hợp rủi ro là điều cần thiết.',
                1190000,
                1,
                0,
            ),
            $this->sanPham(
                3,
                'Đồng hồ trẻ em Masstel Super Hero 4G',
                18,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2021/01/27/masstel-super-hero-4g-xanh.png',
                'Mẫu đồng hồ định vị Masstel Super Hero 4G chính hãng đang là một trong những sự lựa chọn được nhiều bậc phụ huynh quan tâm. Với thiết kế thân thiện và hỗ trợ nhiều tính năng hữu ích, đây sẽ là người bạn đồng hành cùng con bạn mỗi ngày.',
                1950000,
                0,
                1,
            ),
            $this->sanPham(
                4,
                'Đồng hồ thông minh Huawei Watch Fit 4',
                23,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2025/05/16/fit-4-blk-3.png',
                'Đồng hồ thông minh Huawei Watch Fit 4 là lựa chọn lý tưởng cho những ai tìm kiếm sự kết hợp giữa công nghệ hiện đại và thiết kế thời trang. Sở hữu màn hình AMOLED 1.82 inch với độ phân giải 480x408 pixel, thiết bị mang đến chất lượng hiển thị sắc nét và sống động.',
                2730000,
                1,
                0,
            ),
            $this->sanPham(
                4,
                'Đồng hồ thông minh Huawei Watch Fit 4 Pro',
                30,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2025/05/16/fit-4-pro-blk-3.png',
                'Đồng hồ thông minh Huawei Watch Fit 4 Pro là lựa chọn lý tưởng cho những ai tìm kiếm sự kết hợp giữa công nghệ hiện đại và thiết kế thời trang. Hoạt động trên nền hệ điều hành HarmonyOS, Watch Fit 4 Pro đem lại trải nghiệm mượt mà, linh hoạt cùng khả năng tương thích cao.',
                5380000,
                0,
                1,
            ),
            $this->sanPham(
                4,
                'Đồng hồ thông minh Garmin Approach S50',
                28,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2025/02/12/garmin-approach-s50-43mm-4.png',
                'Garmin Approach S50 - 43MM là một mẫu đồng hồ thông minh cao cấp, được thiết kế dành riêng cho những người yêu thích công nghệ và quan tâm đến việc chăm sóc sức khỏe.',
                10990000,
                1,
                0,
            ),
            $this->sanPham(
                4,
                'Apple Watch Series 10',
                20,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2024/09/11/series-10-tu-nhien-1.png',
                'Apple Watch Series 10 - GPS + Cellular, 42mm - Viền Titan Dây Thép là phiên bản mới nhất của dòng đồng hồ thông minh Apple, mang đến sự kết hợp hoàn hảo giữa công nghệ tiên tiến và thiết kế sang trọng.',
                21290000,
                1,
                0,
            ),
            $this->sanPham(
                4,
                'Samsung Galaxy Watch7 40mm LTE',
                26,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2024/07/10/watch7-40mm-xanh-2.png',
                'Samsung Galaxy Watch 7 là chiếc đồng hồ thế hệ mới nhất của Samsung Watch, mang đến sự kết hợp hoàn hảo giữa thiết kế thời trang, hiệu năng mạnh mẽ và các tính năng sức khỏe tiên tiến.',
                8990000,
                1,
                0,
            ),
            $this->sanPham(
                4,
                'Đồng hồ thông minh Realme Band 2',
                27,
                'https://cdn.hoanghamobile.vn/i/preview-h-V2/Uploads/2021/10/20/realme-band-2-4.png',
                'Realme Band 2 chính hãng là đồng hồ thông minh thế hệ thứ 2 với những cải tiến từ thế hệ trước.',
                460000,
                1,
                0,
                ),
            ]);

    }
    private function sanPham($idDanhMuc, $ten, $soLuong, $hinhAnh, $moTa, $giaBan, $isNoiBat, $isFlashSale)
    {
        $phanTram = null;
        $giaKhuyenMai = null;

        if ($isFlashSale == 1) {
            $phanTram = random_int(10, 30);
            $giaKhuyenMai = $giaBan * (100 - $phanTram) / 100;
        }

        return [
            'id_danh_muc'       =>$idDanhMuc,
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
        ];
    }
}
