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
    $this->processRenderHeader($data);
    $this->processRenderDetails($data);
    $this->processRenderFooter($data);
  }

  protected function processRenderDetails($data)
  {
    $product = $data['product'];
    require('pages/watchDetails/watchDetails.php');
  }
}
