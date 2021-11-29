<?php

namespace Views;

abstract class cmsBaseView
{
  public function render(array $data = [])
  {
    if (isset($_GET['onlyBody'])) {
      return $this->processRenderBody($data);
    }
    $this->processRenderHeaderHTML($data);
    $this->processRenderHeader($data);
    $this->processRenderBody($data);
    $this->processRenderFooter($data);
    $this->processRenderFooterHTML($data);
  }

  public function renderStaticAlert(string $title = "Alert!", string $text = "alert", string $type = "primary")
  {
    $alert = [];
    $alert['title'] = $title;
    $alert['text'] = $text;
    $alert['type'] = $type;
    require 'components/alert/staticAlert.php';
  }

  protected function processRenderHeader(array $data = [])
  {
    require 'admin/header.php';
  }

  protected function processRenderFooter(array $data = [])
  {
    require 'admin/footer.php';
  }

  protected function processRenderBody(array $data = [])
  {
    // implement in children
  }
  protected function processRenderHeaderHTML(array $data = [])
  {
    require 'admin/headerHTML.php';
  }

  protected function processRenderFooterHTML(array $data = [])
  {
    require 'admin/footerHTML.php';
  }
}
