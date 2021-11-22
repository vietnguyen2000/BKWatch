<?php

namespace Views;

class cmsBlogView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/blogImage.php");
  }
}