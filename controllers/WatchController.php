<?php

namespace Controllers;

use Models\ProductModel;
use Views\WatchView;

class WatchController extends BaseController
{
    public function index($url)
    {
        $view = new WatchView();
        $view->render(['url' => $url, 'nav' => '/watch']);
    }

    public function detail($url, $id)
    {
        $watchModel = new ProductModel();
        $watchDetail = $watchModel->getById($id);
        $view = new WatchView();
        $view->renderDetails([
            'url' => $url,
            'nav' => '/watch',
            'product' => $watchDetail
        ]);
    }
}
