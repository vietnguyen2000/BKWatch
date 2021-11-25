<?php

namespace Views;

class cmsBlogCommentView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminBlogComment.php");
  }
}