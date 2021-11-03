<?php

namespace Controllers;

use Models\ProductCommentModel;
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
