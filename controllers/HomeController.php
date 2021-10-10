<?php

namespace Controllers;

class HomeController
{
    function __construct()
    {
        echo "Home page construct";
    }
    public function index()
    {
        echo 'Home page';
    }
}
