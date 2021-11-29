<?php

namespace Views;

class cmsBrandView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminBrand.php");
  }
}
