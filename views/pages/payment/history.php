<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}

function mapStatus($status)
{
  switch ($status) {
    case 0:
      return '<button class="btn btn-primary">Thanh toán ngay</button>';
    case 1:
      return 'Đã thanh toán, chờ giao hàng';
    case 2:
      return 'Đang giao hàng';
    case 3:
      return 'Hoàn thành';
    default:
      return 'Đơn hàng lỗi';
  }
}
?>
<div class="container my-5" style="max-width: 960px;">
  <h2>Lịch sử mua hàng của bạn</h2>
  <?php
  $_countOrders = count($listOrders);
  for ($i = 0; $i < $_countOrders; $i++) {
    $order = $listOrders[$i];
  ?>
    <div class="card mb-3 hover-overlay ripple ripple-surface ripple-surface-dark" style="cursor: pointer;" onclick="showOrderDetails(<?= $order['id'] ?>)" data-mdb-toggle="modal" data-mdb-target="#orderDetails">
      <div class="card-body">
        <div class="row g-0">
          <div class="row g-0">
            <div class="col-6">
              <h5>Mã đơn hàng: <?= $order['id'] ?></h5>
            </div>
            <div class="col-6" style="text-align: right;">
              <span class="text-primary"> <?= mapStatus($order['status']) ?></span>
            </div>
          </div>
          <div>
            <span>Ngày tạo đơn hàng: <?= $order['createdAt'] ?></span>
          </div>
          <div>
            <span>Địa chỉ nhận hàng: <?= $order['address'] ?></span>
          </div>
          <div class="my-3">
            <div class="progress" style="height: 6px; border-radius: 16px;">
              <div class="progress-bar" role="progressbar" style="width: <?= ($order['status']) * 100 / 3 ?>%; border-radius: 16px; background-color: #c89979;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <p class="text-muted mt-1 mb-0 small ms-xl-5">Khởi tạo</p>
              <p class="text-muted mt-1 mb-0 small ms-xl-5">Đã thanh toán</p>
              <p class="text-muted mt-1 mb-0 small ms-xl-5">Đang giao hàng</p>
              <p class="text-muted mt-1 mb-0 small ms-xl-5">Hoàn thành</p>
            </div>
          </div>
          <div class="row g-0">
            <div class="col-6">
              <span><?= $order['count'] ?> sản phẩm</span>
            </div>
            <div class="col-6" style="text-align: right;">
              <span class="text-primary"><?= currency_format($order['total']) ?></span>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="orderDetails" tabindex="-1" aria-labelledby="orderDetails" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="orderDetailsTitle">Chi tiết đơn hàng</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status" id="orderDetailsLoading">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div id="orderDetailsBody">

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  <?php }
  ?>
  <script>
    function showOrderDetails(id) {
      $('#orderDetailsTitle').html('Chi tiết đơn hàng ' + id);
      $('#orderDetailsLoading').show();
      $.ajax({
        type: "POST",
        url: '/payment/orderDetails',
        data: {
          orderId: id
        },
        success: (data) => {
          $('#orderDetailsLoading').hide();
          $('#orderDetailsBody').html(data)
        }
      })
    }
  </script>
</div>