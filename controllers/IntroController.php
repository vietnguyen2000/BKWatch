<?php

namespace Controllers;

use Views\IntroView;

class IntroController extends BaseController
{
    public function index($url)
    {
        $view = new IntroView();
        $view->render(['url' => $url, 'nav' => '/intro']);
    }
}
