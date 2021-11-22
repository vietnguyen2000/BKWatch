<?php

namespace Controllers;

use Models\ProductCommentModel;
use Models\ProductModel;
use Models\UserModel;
use Views\WatchView;

class WatchController extends BaseController
{
    public function index($url)
    {
        $view = new WatchView();
        $watchModel = new ProductModel();
        $watchAll = $watchModel->getAll();
        $userModel = new UserModel();
        $userAll = $userModel->getAllUser();
        $data = $watchModel->getAll();
        $view = new WatchView();
        $page = 1;
        if (isset($_GET)) {
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }
            if (isset($_GET['search'])) {
                $data = $watchModel->getProductByValue($_GET['search']);
            }
        }
        $view->render([
            'url' => $url,
            'nav' => '/watch',
            'products' => $data,
            'page' => $page,
            'length' => 8,
            'productAll' => $watchAll,
            'userAll' => $userAll
        ]);
    }

    public function detail($url, $id)
    {
        $watchModel = new ProductModel();
        $watchDetail = $watchModel->getById((int)$id);
        $view = new WatchView();
        $view->renderDetails([
            'url' => $url,
            'nav' => '/watch',
            'product' => $watchDetail
        ]);
    }

    public function addComment($url, $id)
    {
        $commentModel = new ProductCommentModel();
        $commentModel->insert([
            "productId" => $id,
            "rating" => $_POST['rate'],
            "userId" => $_SESSION['user']['id'],
            "content" => $_POST['content'],
        ]);
        $this->redirect("/watch/$id");
    }
}
