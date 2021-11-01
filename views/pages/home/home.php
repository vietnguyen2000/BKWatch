<div class=".container">
    <?php
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/banner/bannerHome.php');
    ?>
    <?php
    $title = [
        "ĐỒNG HỒ NAM",
        "ĐỒNG HỒ NỮ"
    ];
    $bg = [
        "https://images3.alphacoders.com/874/thumb-1920-874739.jpg",
        "https://images8.alphacoders.com/492/thumb-1920-492436.jpg"
    ];
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/trending/trendingHome.php');
    ?>
    <?php
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/productDisplay/sellingProducts.php');
    ?>
    <?php
    $title = [
        "CỔ ĐIỂN",
        "SMART WATCH"
    ];
    $content = [
        "Đa dạng về phong cách, kiểu dáng, màu sắc, kích cỡ...",
        "Đa dạng về phong cách, kiểu dáng, màu sắc, kích cỡ..."
    ];
    $bg = [
        "https://images4.alphacoders.com/573/thumb-1920-573096.jpg",
        "https://wallpaperaccess.com/full/2067364.jpg"
    ];
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/category/categoryHome.php');
    ?>
    <?php
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/productDisplay/listProductDisplay.php');
    ?>
</div>