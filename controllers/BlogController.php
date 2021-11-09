<?php

namespace Controllers;

use Models\BlogCommentModel;
use Models\BlogModel;
use Views\BlogView;

class BlogController extends BaseController
{
    var $ItemPerPage;
    var $dataHeader;
    var $blogModel;
    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->dataHeader = $this->blogModel->getBlogHeader();
        $this->ItemPerPage = 6;
        $this->data = [];
    }
    public function index($url)
    {
        $data = $this->blogModel->getAllBlog();
        $hotBlog = $this->blogModel->getHotBlog();
        $page = 1;
        if (!empty($_GET)) {
            $page = (int)$_GET['page'];
        }
        $view = new BlogView();
        $view->renderBody([
            'url' => $url,
            'nav' => '/blog',
            'header' => $this->dataHeader,
            'hotBlog' => $hotBlog,
            'data' => $data,
            'page' => $page,
            'length' => $this->ItemPerPage
        ]);
    }
    public function detail($url, $id)
    {
        $view = new BlogView();
        $this->dataHeader = $this->blogModel->getBlogById($id);
        $data = $this->blogModel->getBlogById($id);
        $view->renderDetails([
            'url' => $url,
            'nav' => '/blog',
            'header' => $this->dataHeader,
            'data' => $data,
            'id' => $id
        ]);
    }
    public function addComment($url, $id)
    {
        $commentModel = new BlogCommentModel();
        $commentModel->insert([
            "blogId" => $id,
            "rating" => $_POST['rate'],
            "userId" => $_SESSION['user']['id'],
            "content" => $_POST['content'],
        ]);
        $this->redirect("/blog/$id");
    }
}
