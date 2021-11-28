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
        if (isset($_GET['page'])) {
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
        $getData = $this->blogModel->getByCondition([
            "id" => $id
        ]);
        $countView = (int)$getData[0]["countView"];
        $this->blogModel->updateById(
            $id,
            [
                "countView" => $countView + 1
            ]
        );
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
    public function addLike($url, $id)
    {
        header('Content-Type: application/json; charset=utf-8');
        $getData = $this->blogModel->getByCondition([
            "id" => $id
        ]);
        $like = (int)$getData[0]["countLike"];
        $this->blogModel->updateById(
            $id,
            [
                "countLike" => $like + 1
            ]
        );
        echo json_encode(['success' => true]);
        flush();
    }
}
