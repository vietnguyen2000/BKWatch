<?php

namespace Views;

class cmsProductCommentView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminProductComment.php");
  }
}