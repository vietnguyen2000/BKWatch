<?php

namespace Views;

class cmsOrderView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminOrder.php");
  }
}