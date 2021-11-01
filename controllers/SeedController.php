<?php

namespace Controllers;

class SeedController extends BaseController
{
  public function index($url)
  {
    require 'databases/seeders/index.php';
    print_r('seed successfully!');
  }
}
