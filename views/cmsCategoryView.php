<?php

namespace Views;

class cmsCategoryView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminCategory.php");
  }
}
