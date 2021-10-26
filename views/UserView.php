<?php

namespace Views;

class UserView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    if (isset($data['alert'])) {
      $alert = $data['alert'];
      $this->renderStaticAlert($alert['title'], $alert['text'], $alert['type']);
    }
    require 'components/loginForm/loginForm.php';
  }
}
