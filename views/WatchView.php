<?php

namespace Views;

class WatchView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require('pages/watch/watch.php');
  }

  public function renderDetails(array $data = [])
  {
    if (isset($_GET['onlyBody'])) {
      return $this->processRenderDetails($data);
    }
    $this->processRenderHeaderHTML();
    $this->processRenderHeader($data);
    $this->processRenderDetails($data);
    $this->processRenderFooter($data);
    $this->processRenderFooterHTML();
  }

  protected function processRenderDetails($data)
  {
    $product = $data['product'];
    require('pages/watchDetails/watchDetails.php');
  }
}
