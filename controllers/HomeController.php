<?php

namespace Controllers;

class HomeController
{
    public function index()
    {
        echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/views/pages/home/home.php');
    }
    public function homepage()
    {
        echo '/Home page';
        echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/views/pages/home/home.php');
    }
}
