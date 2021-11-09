<?php

namespace Controllers;

use Models\BlogModel;
use Views\BlogView;

class BlogController extends BaseController
{
    var $ItemPerPage = 5;
    var $data = [];
    // var $data = [
    //     0 => [
    //         'title' => "Title 0",
    //         'content' => '<p>Piaget l&agrave; một trong những nh&agrave; sản xuất đồng hồ Thụy Sĩ ưu t&uacute; với sự vượt trội trong kỹ nghệ chế t&aacute;c. Tuy nhi&ecirc;n, điểm đặc biệt để giới mộ điệu lu&ocirc;n phải ph&aacute;t cuồng với những chiếc đồng hồ Piaget chắc chắn l&agrave; v&igrave; những đột ph&aacute; thiết kế si&ecirc;u mỏng. Vậy, b&iacute; ẩn đằng sau những cỗ m&aacute;y thời thượng đ&oacute; l&agrave; g&igrave;?</p><h2><strong>Khởi đầu khi&ecirc;m tốn của thương hiệu lừng danh</strong></h2><p>Piaget, nh&agrave; sản xuất Haute Horlogerie, l&agrave; một trong những thương hiệu l&acirc;u đời nhất ở Thụy Sĩ, được th&agrave;nh lập v&agrave;o năm 1874 bởi Georges &Eacute;douard Piaget tại ng&ocirc;i nh&agrave; của gia đ&igrave;nh &ocirc;ng ở La C&ocirc;te-aux-F&eacute;es, thuộc bang Neuch&acirc;tel.&nbsp;</p><p>Nh&agrave; s&aacute;ng lập thương hiệu vốn c&oacute; đam m&ecirc; đối với lĩnh vực chế t&aacute;c đồng hồ từ khi c&ograve;n trẻ, v&agrave;o năm 1874 khi mới 19 tuổi, &ocirc;ng đ&atilde; th&agrave;nh lập xưởng sản xuất đầu ti&ecirc;n trong trang trại của gia đ&igrave;nh. Tại đ&acirc;y, người thanh ni&ecirc;n n&agrave;y đ&atilde; d&agrave;nh hết t&acirc;m huyết để tạo ra c&aacute;c bộ chuyển động v&agrave; linh kiện c&oacute; độ ch&iacute;nh x&aacute;c cao.&nbsp;</p><p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://dailywatchvietnam.com/wp-content/uploads/2021/10/lich-su-dong-ho-Piaget-1.jpg" alt="Xưởng sản xuất của Piaget - Ảnh 1" /></p><p style="text-align: center;">Xưởng sản xuất của Piaget tại La C&ocirc;te-aux-F&eacute;es</p><p>Ch&iacute;nh v&igrave; vậy, tương tự như nhiều c&ocirc;ng ty kh&aacute;c ở Thụy Sĩ, Piaget bắt đầu hoạt động như một nh&agrave; sản xuất chuyển động. Danh tiếng về chất lượng cao đ&atilde; khiến c&ocirc;ng ty trở th&agrave;nh nh&agrave; cung cấp bộ m&aacute;y cho một số thương hiệu đồng hồ đẳng cấp giai đoạn n&agrave;y.</p><p>Tuy nhi&ecirc;n, phải đến năm 1943, t&ecirc;n thương hiệu Piaget mới được đăng k&yacute; v&agrave; v&agrave; c&oacute; ph&aacute;p danh ch&iacute;nh thức. Từ thời điểm đ&oacute;, Piaget trở th&agrave;nh nh&agrave; sản xuất đồng hồ ho&agrave;n chỉnh, đ&aacute;nh dấu bước khởi đầu của một thương hiệu danh tiếng tr&ecirc;n bản đồ đồng hồ thế giới.</p><p>Ng&agrave;y nay, Piaget c&oacute; một cơ sở sản xuất hiện đại ở Plan-les-Pollen, ngoại &ocirc; Geneva. Tại đ&acirc;y chuy&ecirc;n chế t&aacute;c vỏ v&agrave; d&acirc;y đeo, cũng như ho&agrave;n thiện c&aacute;c kh&acirc;u lắp r&aacute;p cuối c&ugrave;ng của c&ocirc;ng ty. Tuy nhi&ecirc;n, hoạt động sản xuất chuyển động vẫn tiếp tục diễn ra tại nơi khai sinh của c&ocirc;ng ty &ndash; La C&ocirc;te-aux-F&eacute;es.&nbsp;</p>',
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 4,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     11 => [
    //         'title' => "Title 11",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     21 => [
    //         'title' => "Title 21",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     32 => [
    //         'title' => "Title 32",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     14 => [
    //         'title' => "Title 14",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     15 => [
    //         'title' => "Title 15",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     6 => [
    //         'title' => "Title 6",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     7 => [
    //         'title' => "Title 7",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    //     8 => [
    //         'title' => "Title 8",
    //         'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
    //         'author' => "Linh",
    //         'date' => "17:40 08/11/2021",
    //         'cmt' => [
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //             [
    //                 "userID" => 1,
    //                 "userName" => "Natsu Dragneel",
    //                 "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
    //                 "rate" => 5,
    //                 "date" => "2021-11-08 20:30:00",
    //                 "content" => "blog này hay vcl!",
    //             ],
    //         ],
    //         'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
    //     ],
    // ];
    public function index($url)
    {
        $blogModel = new BlogModel();
        $this->data = $blogModel->getAll();
        $dataHeader = $blogModel->getBlogHeader();
        $page = 1;
        if (!empty($_GET)) {
            $page = (int)$_GET['page'];
        }
        $view = new BlogView();
        $view->renderBody([
            'url' => $url,
            'nav' => '/blog',
            'header' => $dataHeader,
            'data' => $this->data,
            'page' => $page,
            'length' => $this->ItemPerPage
        ]);
    }
    public function detail($url, $id)
    {
        $view = new BlogView();
        $blogModel = new BlogModel();
        $dataHeader = $blogModel->getBlogHeader();
        $view->renderDetails([
            'url' => $url,
            'nav' => '/blog',
            'header' => $dataHeader,
            'data' => $this->data,
            'id' => $id
        ]);
    }
}
