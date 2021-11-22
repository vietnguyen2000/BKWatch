<?php

namespace Views;

class cmsAdminView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/admin.php");
  }
}