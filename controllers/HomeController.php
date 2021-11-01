<?php

namespace Controllers;

use Models\ProductModel;
use Views\HomeView;

class HomeController extends BaseController
{
    public function index($url)
    {
        $view = new HomeView();
        $productModel = new ProductModel();
        $products = $productModel->getAll();
        $view->render(['url' => $url, 'nav' => '/', "products" => $products]);
    }

    // example
    public function homepage($url, $id)
    {
        $view = new HomeView();
        $view->render(['url' => $url, 'id' => $id, 'nav' => '/']);
    }
}
