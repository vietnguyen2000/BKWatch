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
        $watchCategory = $watchModel->getAllCategory();
        $watchBrand = $watchModel->getAllBrand();
        $userModel = new UserModel();
        $userAll = $userModel->getAllUser();
        $view = new WatchView();
        $page = 1;
        $sort = "";
        $search_normal = "";
        $search_brand = [];
        $search_category = [];
        if (isset($_GET)) {
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }
            if (isset($_GET['search'])) {
                $search_normal = $_GET['search'];
            }
            if (isset($_GET['brand'])) {
                $search_brand = $_GET['brand'];
            }
            if (isset($_GET['category'])) {
                $search_category = $_GET['category'];
            }
            if (isset($_GET['sort'])) {
                $sort = (int)$_GET['sort'];
            }
        }
        // print_r($search_brand);
        // print_r("</br>");
        // print_r($search_category);
        $data = $watchModel->getProductByCondition($search_normal, $sort);
        $view->render([
            'url' => $url,
            'nav' => '/watch',
            'products' => $data,
            'length' => 12,
            'productAll' => $watchAll,
            'userAll' => $userAll,
            'categoryAll' => $watchCategory,
            'brandAll' => $watchBrand,
            'page' => $page,
            'sort' => $sort,
            'search_normal' => $search_normal,
            'search_brand' => $search_brand,
            'search_category' => $search_category,
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
