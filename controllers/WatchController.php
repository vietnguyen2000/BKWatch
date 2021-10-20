<?php

namespace Controllers;

use Views\WatchView;

class WatchController
{
    public function index($url)
    {
        $view = new WatchView();
        $view->render(['url' => $url, 'nav' => '/watch']);
    }
}
