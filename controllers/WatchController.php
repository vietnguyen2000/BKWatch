<?php

namespace Controllers;

use Views\WatchView;

class WatchController extends BaseController
{
    public function index($url)
    {
        $view = new WatchView();
        $view->render(['url' => $url, 'nav' => '/watch']);
    }
}
