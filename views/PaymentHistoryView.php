<?php

namespace Views;

class PaymentHistoryView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    $listOrders = $data['listOrders'];
    require("pages/payment/history.php");
  }

  public function renderDetails(array $data = [])
  {
    if (isset($_GET['onlyBody'])) {
      return $this->processRenderDetailsBody($data);
    }
    $this->processRenderHeaderHTML($data);
    $this->processRenderHeader($data);
    $this->processRenderDetailsBody($data);
    $this->processRenderFooter($data);
    $this->processRenderFooterHTML($data);
  }

  public function processRenderDetailsBody(array $data = [])
  {
    $order = $data['order'];
    require("pages/payment/orderDetails.php");
  }
}
