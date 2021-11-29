<?php

namespace Views;

class cmsUserView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminUser.php");
  }
}