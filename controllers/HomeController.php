<?php

namespace Controllers;

use Views\HomeView;

class HomeController extends BaseController
{
    public function index($url)
    {
        $view = new HomeView();
        $view->render(['url' => $url, 'nav' => '/']);
    }

    // example
    public function homepage($url, $id)
    {
        $view = new HomeView();
        $view->render(['url' => $url, 'id' => $id, 'nav' => '/']);
    }
}
