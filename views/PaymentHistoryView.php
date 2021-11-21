<?php

namespace Views;

class PaymentHistoryView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("pages/paymentHistory/index.php");
  }
}
