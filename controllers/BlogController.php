<?php

namespace Controllers;

use Views\BlogView;

class BlogController extends BaseController
{
    var $ItemPerPage = 3;
    var $data = [
        [
            'id' => 1,
            'title' => "Title 1",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        [
            'id' => 2,
            'title' => "Title 2",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        [
            'id' => 3,
            'title' => "Title 3",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ],
        [
            'id' => 4,
            'title' => "Title 4",
            'content' => "Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.",
            'author' => "Linh",
            'date' => "17:40 08/11/2021",
            'cmtCount' => 10,
            'img' => "https://mdbootstrap.com/img/new/slides/080.jpg"
        ]
    ];
    public function index($url)
    {
        $page = 1;
        $view = new BlogView();
        $view->renderBody(['url' => $url, 'nav' => '/blog', 'data' => $this->data, 'page' => $page, 'length' => $this->ItemPerPage]);
    }
    public function page($url, $page)
    {
        $view = new BlogView();
        $view->renderBody(['url' => $url, 'nav' => '/blog/page=' . $page, 'data' => $this->data, 'page' => $page, 'length' => $this->ItemPerPage]);
    }
    public function detail($url, $id)
    {
        $view = new BlogView();
        $view->renderDetails(['url' => $url, 'nav' => '/blog/blogID=' . $id, 'data' => $this->data, 'id' => $id]);
    }
}
