<?php

namespace Controllers;

use Views\ContactView;

class ContactController
{
    public function index($url)
    {
        $view = new ContactView();
        $view->render(['url' => $url, 'nav' => '/contact']);
    }
}
