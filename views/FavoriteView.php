<?php

namespace Views;

class FavoriteView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("pages/favorite/index.php");
  }
}
