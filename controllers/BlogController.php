<?php

namespace Controllers;

use Views\BlogView;

class BlogController extends BaseController
{
    var $ItemPerPage = 3;
    var $data = [
        0 => [
            'title' => "Title 0",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        11 => [
            'title' => "Title 11",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        21 => [
            'title' => "Title 21",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        32 => [
            'title' => "Title 32",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        14 => [
            'title' => "Title 14",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        15 => [
            'title' => "Title 15",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        6 => [
            'title' => "Title 6",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        7 => [
            'title' => "Title 7",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        8 => [
            'title' => "Title 8",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
    ];
    public function index($url)
    {
        $page = 1;
        if (!empty($_GET)) {
            $page = (int)$_GET['page'];
        }
        $view = new BlogView();
        $view->renderBody(['url' => $url, 'nav' => '/blog', 'data' => $this->data, 'page' => $page, 'length' => $this->ItemPerPage]);
    }
    public function detail($url, $id)
    {
        $view = new BlogView();
        $view->renderDetails(['url' => $url, 'nav' => '/blog', 'data' => $this->data, 'id' => $id]);
    }
}
