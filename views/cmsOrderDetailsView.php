<?php

namespace Views;

class cmsOrderDetailsView extends cmsBaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("admin/adminOrderDetails.php");
  }
}
