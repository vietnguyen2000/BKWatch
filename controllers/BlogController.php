<?php

namespace Controllers;

use Views\BlogView;

class BlogController extends BaseController
{
    public function index($url)
    {
        $view = new BlogView();
        $view->render(['url' => $url, 'nav' => '/blog']);
    }
}
