<?php

namespace Views;

class cmsProductView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminProducts.php");
  }
}