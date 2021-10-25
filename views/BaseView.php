<?php

namespace Views;

abstract class BaseView
{
  public function render(array $data = [])
  {
    $this->processRenderHeader($data);
    $this->processRenderBody($data);
    $this->processRenderFooter($data);
  }
  protected function processRenderHeader(array $data = [])
  {
    require 'components/header/header.php';
  }

  protected function processRenderFooter(array $data = [])
  {
    require 'components/footer/footer.php';
  }

  protected function processRenderBody(array $data = [])
  {
    // implement in children
  }
}
