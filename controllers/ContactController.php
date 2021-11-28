<?php

namespace Controllers;

use Views\ContactView;
use Models\ContactModel;

class ContactController extends BaseController
{
    public function index($url)
    {
        $view = new ContactView();
        $contactModel = new ContactModel();
        $data = $contactModel->getContact();
        print_r($data);
        $view->render(['url' => $url, 'nav' => '/contact']);
    }
}
