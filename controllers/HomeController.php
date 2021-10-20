<?php

namespace Controllers;

use Views\HomeView;

class HomeController
{
    public function index($url)
    {
        $view = new HomeView();
        $view->render(['url' => $url]);
    }

    // example
    public function homepage($url, $id)
    {
        $view = new HomeView();
        $view->render(['url' => $url, 'id' => $id]);
    }
}
