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

  public function renderProfile(array $data = [])
  {
    $this->processRenderHeader($data);

    print_r($_SESSION['user']);

    print_r('<a href="/logout" class="btn btn-primary"> Logout</a>');

    $this->processRenderFooter($data);
  }
}
