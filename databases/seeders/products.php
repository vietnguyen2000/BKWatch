<?php

use Models\ProductImageModel;
use Models\ProductModel;

$product = new ProductModel();
$productImage = new ProductImageModel();

// product brand Rolex
$product->insert([
  "id" => 1,
  "productBrandId" => 1,
  "productCategoryId" => 12,
  "productCode" => "Rolex 228396tbr-0004",
  "title" => "Rolex Day-Date 40",
  "content" => "Ra mắt tại BaselWorld 2015, Day-Date 40 đại diện cho một chương mới trong lịch sử của một trong những mẫu đồng hồ mang tính biểu tượng nhất của Rolex. Nó được cung cấp năng lượng bởi bộ máy có độ sáng tạo cao (14 bằng sáng chế!) Cỡ nòng 3255. Mẫu đồng hồ hiện tại, tham chiếu 228206, có vỏ bằng bạch kim và gờ bằng kim cương hình baguette. Nó được trang bị vòng đeo tay kiểu Tổng thống và mặt số màu xanh lam 'Ice' với họa tiết 'Quadrant' và các chữ số La Mã.",
  "price" => 1100000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 0,
  "isNew" => 0,
  "isBestSale" => 0,
  "quantity" => 2,
  "material" => "Platinum",
  "glass" => "Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "40.00 mm",
  "height" => "12.00 mm",
  "lugWidth" => "20.00mm",
  "color" => "Xanh Dương"
]);
$productImage->insert([
  "productId" => 1,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/rolex/day-date/228396tbr-0004-87.webp",
]);
$productImage->insert([
  "productId" => 1,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/rolex/day-date/228396tbr-0004-0.webp",
]);


// ref: https://watchbase.com/rolex/day-date-40/228235-0005
$product->insert([
  "id" => 2,
  "productBrandId" => 1,
  "productCategoryId" => 12,
  "productCode" => "Rolex - 228235-0005",
  "title" => "Rolex Day-Date 40",
  "content" => "Ra mắt tại BaselWorld 2015, Day-Date 40 đại diện cho một chương mới trong lịch sử của một trong những mẫu đồng hồ mang tính biểu tượng nhất của Rolex. Nó được trang bị bộ máy có độ sáng tạo cao (14 bằng sáng chế!) Cỡ nòng 3255. Mẫu đồng hồ hiện tại, tham chiếu 228235, có vỏ Everose (vàng hồng). Mặt số 'Sundust' có họa tiết sọc dọc.",
  "price" => 2500000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 0,
  "isNew" => 0,
  "isBestSale" => 0,
  "quantity" => 2,
  "material" => "RoseGold",
  "glass" => "Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "40.00 mm",
  "height" => "12.00 mm",
  "lugWidth" => "20.00mm",
  "color" => "Hồng"
]);
$productImage->insert([
  "productId" => 2,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/rolex/day-date/228235-0005-5b.webp",
]);
$productImage->insert([
  "productId" => 2,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/rolex/day-date/228235-0005-d4.webp",
]);
$productImage->insert([
  "productId" => 2,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/rolex/day-date/228235-e8.webp",
]);
$productImage->insert([
  "productId" => 2,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/rolex/day-date/228235-35.webp",
]);

// ref: https://watchbase.com/rolex/datejust/116200-0084
$product->insert([
  "id" => 3,
  "productBrandId" => 1,
  "productCategoryId" => 12,
  "productCode" => "Rolex - 116200-0084",
  "title" => "Rolex Datejust 36",
  "content" => "Rolex Datejust là một trong những biểu tượng không thể tranh cãi của Rolex. Trong phiên bản hiện tại, vỏ của nó có kích thước 36mm truyền thống. Nó có sẵn với một số lượng lớn cấu hình, từ các phiên bản hoàn toàn bằng thép không gỉ với độ chính xác thấp cho đến các mẫu hoàn toàn bằng vàng và kim cương. 
  Reference 116200-0084 có Thép không gỉ với gờ bằng thép không gỉ hình vòm và mặt số màu trắng.",
  "price" => 730000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 0,
  "isNew" => 0,
  "isBestSale" => 0,
  "quantity" => 2,
  "material" => "Stainless Steel",
  "glass" => "Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "36.00  mm",
  "height" => "12.00 mm",
  "lugWidth" => "20.00mm",
  "color" => "Trắng"
]);
$productImage->insert([
  "productId" => 3,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/rolex/datejust/116200-0084-40.webp",
]);
$productImage->insert([
  "productId" => 3,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/rolex/datejust/116200-0084-5c.webp",
]);
$productImage->insert([
  "productId" => 3,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/rolex/datejust/116200-silver-61.webp",
]);


// ref: https://watchbase.com/omega/aqua-terra/231-10-30-61-06-001
$product->insert([
  "id" => 4,
  "productBrandId" => 2,
  "productCategoryId" => 5,
  "productCode" => "Omega - 231.10.30.61.06.001",
  "title" => "Seamaster Aqua Terra 150M",
  "content" => "Khi Omega tạo ra Seamaster Aqua Terra Chronometer, nó đã bị ảnh hưởng bởi một số yếu tố thiết kế đặc trưng cho một số đồng hồ đeo tay Omega tuyệt vời trong quá khứ. Một trong số đó là chiếc Seamaster tự động năm 1960. Aqua Terra là một sự tôn kính phù hợp với thiết kế vượt thời gian của nó nhưng những gì bên trong vỏ của nó sẽ khiến tổ tiên của nó tự hào.
  Giống như chiếc Seamaster tự động năm 1960, nó có vỏ bằng thép không gỉ và dây đeo bằng thép không gỉ. Các vấu của nó gợi nhớ đến những thứ trên tổ tiên của nó và mặt số bạc opaline của Teak Concept cũng gợi nhớ đến mặt số tráng bạc của người tiền nhiệm. Nhưng Seamaster Aqua Terra Chronometer cũng đại diện cho sự tiến hóa và cải tiến kỹ thuật. Nó được trang bị bộ máy Omega Co-Axial cỡ 8500 độc quyền mang lại độ chính xác và độ bền vượt trội. Tinh thể sapphire chống xước hình vòm của nó để lộ mặt số với các đường dọc đã xác định dòng Aqua Terra vừa thể thao vừa thời trang. Giống như chiếc Seamaster tự động năm 1960, nó có cửa sổ ngày ở 3 giờ đồng hồ. Mặt sau trong suốt giúp bạn có thể quan sát chuyển động chính xác của bộ máy đồng trục. Đồng hồ 41,5 mm có khả năng chống nước ở độ sâu 150 mét (500 feet).
  Bằng chứng cho độ chính xác của đồng hồ tự lên dây là chứng nhận COSC của nó như một máy đo thời gian. Sự giống nhau trong gia đình là không thể phủ nhận và không có gì phải bàn cãi: chiếc Seamaster tự động năm 1960 sẽ phải ghen tị với hậu duệ tài năng của nó.",
  "price" => 30000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 1,
  "isNew" => 0,
  "isBestSale" => 0,
  "quantity" => 2,
  "material" => "Stainless Steel",
  "glass" => "Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "30.00 mm",
  "height" => "12.00 mm",
  "lugWidth" => "20.00mm",
  "color" => "Xám"
]);
$productImage->insert([
  "productId" => 4,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:jpg/omega/aqua-terra/23110306106001-27.webp",
]);
$productImage->insert([
  "productId" => 4,
  "imageURL" => "https://cdn2.jomashop.com/media/catalog/product/cache/fde19e4197824625333be074956e7640/o/m/omega-seamaster-ladies-watch-231.10.30.61.06.001_2.jpg?width=546&height=546",
]);


// ref: https://watchbase.com/omega/globemaster/130-33-39-21-03-001
$product->insert([
  "id" => 5,
  "productBrandId" => 2,
  "productCategoryId" => 4,
  "productCode" => "Omega - 130.33.39.21.03.001",
  "title" => "Globemaster Stainless Steel",
  "content" => "Được giới thiệu tại BaselWorld 2015, Globemaster là chiếc đồng hồ đầu tiên được gắn nhãn 'Master Chronometer' mới được hình thành, cho thấy rằng mỗi chiếc đồng hồ từ bộ sưu tập này đều đã vượt qua quy trình chứng nhận mà Omega hợp tác với METAS phát triển. 
  Bộ máy của nó là các bộ máy mới 8900 và 8901, với bộ máy sau được hoàn thiện sang trọng hơn để sử dụng cho các mẫu kim loại quý. Để thiết kế Globemaster, Omega đã nhìn lại lịch sử của họ và lấy các dấu hiệu từ các máy đo thời gian đáng chú ý khác nhau. Mặt số 'pie-pan' là một trong những tính năng được yêu thích nhất trên các mẫu Constellation từ những năm 50 và đầu những năm 60. Viền có gờ cũng xuất hiện trên các mẫu được sản xuất vào những năm 60 và 70. Cái tên Globemaster cũng xuất phát từ quá khứ giàu có của Omega: nó được sử dụng vào những năm 50 để tiếp thị thế hệ đầu tiên của bộ sưu tập Constellation tại Hoa Kỳ. 
  Mô hình hiện tại, ref. 130.33.39.21.03.001, có vỏ bằng thép không gỉ và mặt số màu xanh lam với lớp hoàn thiện mặt trời và được trang bị trên dây đeo bằng da cá sấu. Gờ trên phiên bản này được làm bằng cacbua vonfram.",
  "price" => 80000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 1,
  "isNew" => 0,
  "isBestSale" => 0,
  "quantity" => 2,
  "material" => "Tungsten, Stainless Steel",
  "glass" => "Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "39.00 mm",
  "height" => "12.00 mm",
  "lugWidth" => "20.00mm",
  "color" => "Xanh Dương"
]);
$productImage->insert([
  "productId" => 5,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/omega/globemaster/130-33-39-21-03-001-86.webp",
]);
$productImage->insert([
  "productId" => 5,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/omega/globemaster/130-33-39-21-03-001-be.webp",
]);
$productImage->insert([
  "productId" => 5,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/omega/globemaster/130-33-39-21-03-001-ad.webp",
]);
$productImage->insert([
  "productId" => 5,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/omega/globemaster/130-33-39-21-03-001-22.webp",
]);


// ref: https://watchbase.com/omega/speedmaster/311-30-42-30-01-002
$product->insert([
  "id" => 6,
  "productBrandId" => 2,
  "productCategoryId" => 9,
  "productCode" => "Omega - 311.30.42.30.01.002",
  "title" => "Speedmaster Professional Moonwatch Apollo",
  "content" => "Tham chiếu Omega Speedmaster 311.30.42.30.01.002 được giới thiệu vào năm 2009 dưới dạng 'phiên bản giới hạn' gồm 7969 chiếc nhân kỷ niệm 40 năm sứ mệnh Apollo 11. Nó có vỏ 'Moonwatch' không gỉ thông thường với tinh thể hesalite và một mặt sau đóng; mặt số màu đen có bản vá Apollo 11 ở mặt số phụ 9 giờ.",
  "price" => 100000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 0,
  "isNew" => 0,
  "isBestSale" => 0,
  "quantity" => 2,
  "material" => "Stainless Steel",
  "glass" => "Plexi",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "42.00 mm",
  "height" => "12.00 mm",
  "lugWidth" => "20.00mm",
  "color" => "Đen"
]);
$productImage->insert([
  "productId" => 6,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/omega/speedmaster/311-30-42-30-01-002-61.webp",
]);
$productImage->insert([
  "productId" => 6,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/omega/speedmaster/31130423001002-b5.webp",
]);
$productImage->insert([
  "productId" => 6,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/omega/speedmaster/31130423001002-63.webp",
]);
$productImage->insert([
  "productId" => 6,
  "imageURL" => "https://cdn.watchbase.com/watch/md/origin:jpg/omega/speedmaster/31130423001002-70.webp",
]);


// ref: https://watchbase.com/casio/g-shock-ga-100/ga-100-1a1
$product->insert([
  "id" => 7,
  "productBrandId" => 3,
  "productCategoryId" => 3,
  "productCode" => "Casio - GA-100-1A1",
  "title" => "G-Shock GA-100",
  "content" => "Ana-Digi, con quái vật “ba mắt” này có kích thước khổng lồ 55 x 51,2 x 16,9mm, chú ý đến từng chi tiết, không ai sánh kịp. Các nút chống trượt lớn giúp thao tác dễ dàng, các chỉ số được in nổi mang lại giao diện 3-D và thiết kế gờ có đinh tán tăng thêm sức mạnh cho vẻ ngoài tổng thể của nó. Có sẵn trong nhiều loại cấu hình, mô hình hiện tại có vỏ, mặt số và dây đeo màu đen; bàn tay được thực hiện bằng màu trắng.",
  "price" => 2200000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 1,
  "isNew" => 0,
  "isBestSale" => 1,
  "quantity" => 2,
  "material" => "Resin",
  "glass" => "Mineral",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "55.00 mm",
  "height" => "16.90 mm",
  "lugWidth" => "20.00mm",
  "color" => "Đen"
]);
$productImage->insert([
  "productId" => 7,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:jpg/casio/g-shock-ga-100/ga1001a1er-ac.webp",
]);
$productImage->insert([
  "productId" => 7,
  "imageURL" => "https://bizweb.dktcdn.net/100/283/593/products/casio-ga-100-1a1-military-series-watch-in-black-01.jpg?v=1532093004287",
]);
$productImage->insert([
  "productId" => 7,
  "imageURL" => "https://salt.tikicdn.com/ts/product/c6/e0/a8/c52cab114d3a10b655037c7182792350.jpg",
]);

// ref: https://watchbase.com/casio/mtg/mtg-g1000bs-1a
$product->insert([
  "id" => 8,
  "productBrandId" => 3,
  "productCategoryId" => 3,
  "productCode" => "Casio - MTG-G1000BS-1A",
  "title" => "G-Shock MT-G G1000",
  "content" => "MT-G là một sản phẩm tinh tế và cao cấp của Casio G-Shock. gờ và nắp sau. Chiếc vòng được làm theo kiểu tương tự, với các phần nhựa nhẹ và thoải mái được bao phủ bởi kim loại. Tham khảo MTG-G1000BS-1AER là phiên bản giới hạn gồm 500 chiếc với lớp mạ ion vàng và đen tạo thêm hương vị cổ điển cho một thiết kế công nghệ cao.",
  "price" => 1500000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 1,
  "isNew" => 0,
  "isBestSale" => 1,
  "quantity" => 2,
  "material" => "Titanium",
  "glass" => "	Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "54.70 mm",
  "height" => "16.90 mm",
  "lugWidth" => "20.00mm",
  "color" => "Vàng"
]);
$productImage->insert([
  "productId" => 8,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/casio/mtg/mtg-g1000bs-1aer-3c.webp",
]);
$productImage->insert([
  "productId" => 8,
  "imageURL" => "https://y3p9n5g8.rocketcdn.me/wp-content/uploads/2015/12/G-Shock-MTG-G1000BS-1A-Aged-Gold%C3%97Black-2.jpg",
]);
$productImage->insert([
  "productId" => 8,
  "imageURL" => "https://www.g-central.com/wp-content/uploads/MTG-G1000BS-1A_angle.jpg",
]);

// ref: https://watchbase.com/casio/mtg/mtg-g1000d-1a
$product->insert([
  "id" => 9,
  "productBrandId" => 3,
  "productCategoryId" => 3,
  "productCode" => "Casio - MTG-G1000D-1A",
  "title" => "G-Shock MT-G G1000",
  "content" => "MT-G là một sản phẩm tinh tế và cao cấp của Casio G-Shock. gờ và nắp sau. Chiếc vòng được làm theo kiểu tương tự, với các phần nhựa nhẹ và thoải mái được bao phủ bởi kim loại. Tham chiếu MTG-G1000D-1A có vỏ bằng thép không gỉ. Mặt đồng hồ màu đen có các điểm nhấn màu bạc.",
  "price" => 1700000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 1,
  "isNew" => 0,
  "isBestSale" => 1,
  "quantity" => 2,
  "material" => "Stainless Steel",
  "glass" => "	Sapphire",
  "back" => "Đóng",
  "shape" => "Tròn",
  "diameter" => "54.70 mm",
  "height" => "16.90 mm",
  "lugWidth" => "20.00mm",
  "color" => "Đen"
]);
$productImage->insert([
  "productId" => 9,
  "imageURL" => "https://cdn.watchbase.com/watch/lg/origin:png/casio/mtg/mtg-g1000d-1a-6e.webp",
]);
$productImage->insert([
  "productId" => 9,
  "imageURL" => "https://lh3.googleusercontent.com/proxy/HrOoKHbKQ26Ov8kFu5yS6dof3JQ5IoLp4sS2KfE5gPKOnfy1RJQo2QPctvjsy7vN1OuOBClznWoKQvMfguP5QKjk9mwlSV4mni1ykQqZ7dY",
]);
$productImage->insert([
  "productId" => 9,
  "imageURL" => "https://www.europastar.com/local/cache-vignettes/L560xH420/g-shock-mtg-g1000d-1a2_1-8a822.jpg?1617878487",
]);

// ref: https://www.thegioididong.com/dong-ho-thong-minh/apple-watch-s7-lte-45mm-day-thep?src=osp#top-tskt
$product->insert([
  "id" => 10,
  "productBrandId" => 4,
  "productCategoryId" => 11,
  "productCode" => "",
  "title" => "Apple Watch Series 7 LTE 45mm",
  "content" => "Apple Watch S7 LTE 45 mm sở hữu khung viền thép không gỉ cứng cáp, sang trọng cùng thiết kế bo cong mềm mại ở phần góc và mặt kính Sapphire có kích thước 1.77 inch (diện tích màn hình tăng 20% so với phiên bản cũ), bảo vệ tốt mặt kính trước những va đập. Phần viền đồng hồ được được làm mỏng nhẹ chỉ 1.7 mm, tạo cảm giác tràn viền nhiều hơn (phần viền mỏng hơn 60% so với Apple Watch S6).

  Bên cạnh đó ở phiên bản này người dùng sẽ được trải nghiệm diện tích màn hình lớn 50% so với các thế hệ tiền nhiệm trước, giúp người dùng có thể nhìn được nhiều thông tin hơn khi đọc một đoạn văn bản bình thường trên màn hình mà không phải lướt nhiều như trước đây.",
  "price" => 23000000,
  "discount" => 0,
  "warranty" => 3,
  "isHot" => 1,
  "isNew" => 1,
  "isBestSale" => 1,
  "quantity" => 2,
  "material" => "Stainless Steel",
  "glass" => "	Sapphire",
  "back" => "Đóng",
  "shape" => "Vuông",
  "diameter" => "45.00 mm",
  "height" => "10.70 mm",
  "lugWidth" => "20.00mm",
  "color" => "Bạc"
]);
$productImage->insert([
  "productId" => 10,
  "imageURL" => "https://cdn.tgdd.vn/Products/Images/7077/250656/apple-watch-series-7-lte-45mm-day-thep-bac-1.jpg",
]);
$productImage->insert([
  "productId" => 10,
  "imageURL" => "https://cdn.tgdd.vn/Products/Images/7077/250656/apple-watch-series-7-lte-45mm-day-thep-bac-2.jpg",
]);
