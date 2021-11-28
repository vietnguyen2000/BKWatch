<?php

namespace Views;

class cmsImageView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminImage.php");
  }
}