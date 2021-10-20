<?php

namespace Views;

abstract class BaseView
{
  public function render(array $bodyData = [], array $headerData = [], array $footerData = [])
  {
    $this->processRenderHeader($headerData);
    $this->processRenderBody($bodyData);
    $this->processRenderFooter($footerData);
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
