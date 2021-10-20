<?php

namespace Controllers;

use Views\IntroView;

class IntroController
{
    public function index($url)
    {
        $view = new IntroView();
        $view->render(['url' => $url, 'nav' => '/intro']);
    }
}
