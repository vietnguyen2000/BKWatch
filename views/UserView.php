<?php

namespace Views;

class UserView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    //
    require 'components/loginForm/loginForm.php';
  }
}
