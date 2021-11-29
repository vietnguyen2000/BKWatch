<?php

namespace Views;

class cmsAddProductView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminAddProduct.php");
  }
}
