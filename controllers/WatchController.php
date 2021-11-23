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
        $searchCond = [];
        $view = new WatchView();
        $watchModel = new ProductModel();
        $watchAll = $watchModel->getAll();
        $userModel = new UserModel();
        $userAll = $userModel->getAllUser();
        $view = new WatchView();
        $page = 1;
        $sort = "";
        if (isset($_GET)) {
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }
            if (isset($_GET['search'])) {
                $temp = ['search' => $_GET['search']];
                $searchCond += $temp;
            }
            if (isset($_GET['tag'])) {
                $temp = ['tag' => $_GET['tag']];
                $searchCond += $temp;
            }
            if (isset($_GET['brandTitle'])) {
                $temp = ['brandTitle' => $_GET['brandTitle']];
                $searchCond += $temp;
            }
            if (isset($_GET['categoryTitle'])) {
                $temp = ['categoryTitle' => $_GET['categoryTitle']];
                $searchCond += $temp;
            }
            if (isset($_GET['sort'])) {
                $sort = (int)$_GET['sort'];
                // $temp = ['sort' => (int)$_GET['sort']];
                // $searchCond += $temp;
            }
        }
        $data = $watchModel->getProductByCondition($searchCond, $sort);
        $view->render([
            'url' => $url,
            'nav' => '/watch',
            'products' => $data,
            'page' => $page,
            'length' => 3,
            'productAll' => $watchAll,
            'userAll' => $userAll,
            'searchCondition' => $searchCond,
            'sort' => $sort,
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
