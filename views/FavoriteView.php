<?php

namespace Views;

class FavoriteView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {    
    require("pages/favorite/index.php");
  }

  public function renderIndex(array $data = [])
  {
    $this->processRenderHeader($data);
    $this->processRenderBody($data);
    $this->processRenderFooter($data);
  }
}
