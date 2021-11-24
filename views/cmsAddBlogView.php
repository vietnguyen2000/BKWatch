<?php

namespace Views;

class cmsAddBlogView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminAddBlog.php");
  }
}